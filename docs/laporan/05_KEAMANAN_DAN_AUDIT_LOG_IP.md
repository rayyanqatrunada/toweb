# LAPORAN 05: KEAMANAN SISTEM DAN AUDIT LOG ALAMAT IP
## Arsitektur Pertahanan Berlapis (*Defense-in-Depth*) dan Pelacakan Forensik

---

## 1. Pendekatan Keamanan Berlapis (*Defense-in-Depth*)

Keamanan aplikasi **TBSM WEB** dirancang dengan prinsip pertahanan berlapis untuk mengantisipasi potensi ancaman umum terhadap aplikasi web sekolah, mulai dari serangan brute force, pengunggahan backdoor/shell oleh peretas, pembajakan sesi, clickjacking, hingga penyalahgunaan akun bersama (*shared credentials*).

```
  ┌─────────────────────────────────────────────────────────────┐
  │ 1. LAYER JARINGAN & WEB SERVER (.htaccess & Headers)        │
  │    • Anti-Clickjacking (X-Frame-Options: SAMEORIGIN)        │
  │    • Anti-MIME Sniffing (X-Content-Type-Options: nosniff)   │
  │    • Permissions-Policy (Blokir akses kamera/mic/lokasi)    │
  └──────────────────────────────┬──────────────────────────────┘
                                 │
  ┌──────────────────────────────▼──────────────────────────────┐
  │ 2. LAYER AKSES & AUTENTIKASI (Panel & Deployment Utility)   │
  │    • Kustomisasi URL Admin (ADMIN_PANEL_PATH via .env)      │
  │    • Pengecualian Mesin Pencari via robots.txt dinamis      │
  │    • Anti-Brute Force File-Lock 5 Percobaan Gagal (15 mnt)  │
  │    • Password Kuat (8 char, Kombinasi, Uncompromised HIBP)  │
  └──────────────────────────────┬──────────────────────────────┘
                                 │
  ┌──────────────────────────────▼──────────────────────────────┐
  │ 3. LAYER PENYIMPANAN & UPLOAD (Anti-Webshell)               │
  │    • php_flag engine off di storage/app/public & public     │
  │    • Deny all untuk ekstensi .php, .phtml, .phar, .sh, dll  │
  │    • Penolakan format SVG (Anti-Stored XSS)                 │
  └──────────────────────────────┬──────────────────────────────┘
                                 │
  ┌──────────────────────────────▼──────────────────────────────┐
  │ 4. LAYER AUDIT & FORENSIK (ActivityLog IP & Device)         │
  │    • Perekaman otomatis IP Klien (Cloudflare & Proxy Aware) │
  │    • Identifikasi tipe perangkat (HP/Mobile, OS Desktop)    │
  │    • Tampilan badge monospaced pada RecentActivityWidget    │
  └─────────────────────────────────────────────────────────────┘
```

---

## 2. Perekaman Audit Log Aktivitas dengan Deteksi Alamat IP & Perangkat

### A. Latar Belakang Masalah
Dalam lingkungan organisasi sekolah, akun administrator terkadang digunakan bersama oleh lebih dari satu orang (misal: Kepala Bengkel, Guru Tim IT, dan Staf Tata Usaha). Kondisi ini menimbulkan kerentanan: jika terjadi kesalahan penghapusan data atau perubahan sepihak, sulit untuk membuktikan siapa dan dari mana perubahan tersebut dilakukan.

### B. Mekanisme Teknis Implementasi
Melalui [app/Providers/AppServiceProvider.php](../../app/Providers/AppServiceProvider.php), sistem menyematkan event listener global pada pustaka `Spatie\Activitylog\Models\Activity`:

```php
Activity::saving(function (Activity $activity) {
    if (app()->runningInConsole()) {
        return;
    }

    $request = request();
    
    // 1. Ekstraksi Alamat IP Nyata (Cloudflare / Proxy / Direct)
    $ip = $request->header('CF-Connecting-IP')
        ?? $request->header('X-Forwarded-For')
        ?? $request->ip();

    if ($ip && str_contains($ip, ',')) {
        $ip = trim(explode(',', $ip)[0]);
    }

    // 2. Deteksi Klasifikasi Perangkat Klien
    $userAgent = (string) $request->userAgent();
    $deviceInfo = 'Desktop';
    if (preg_match('/(iPhone|iPad|Android|Mobile|Phone)/i', $userAgent)) {
        $deviceInfo = 'HP/Mobile';
    } elseif (preg_match('/(Windows)/i', $userAgent)) {
        $deviceInfo = 'Windows';
    } elseif (preg_match('/(Macintosh|Mac OS)/i', $userAgent)) {
        $deviceInfo = 'Mac';
    } elseif (preg_match('/(Linux)/i', $userAgent)) {
        $deviceInfo = 'Linux';
    }

    // 3. Simpan sebagai Properti Terstruktur di Database
    $properties = $activity->properties ? $activity->properties->toArray() : [];
    $properties['ip_address'] = $ip ?: '127.0.0.1';
    $properties['device_info'] = $deviceInfo;
    $activity->properties = collect($properties);
});
```

### C. Tampilan Visual pada Dasbor Admin
Di dalam widget [recent-activity.blade.php](../../resources/views/filament/widgets/recent-activity.blade.php), setiap baris riwayat aktivitas menampilkan badge IP monospaced:
```html
<span class="inline-flex items-center gap-1 rounded bg-zinc-100 px-1.5 py-0.5 font-mono text-[10px] text-zinc-600">
    IP: 180.252.12.34 (HP/Mobile)
</span>
```
**Manfaat Nyata:**
- Jika Admin A mengubah data dari jaringan WiFi Bengkel Sekolah (`IP: 192.168.1.50 (Windows)`), kemudian Admin B mengubah data dari rumah menggunakan ponsel (`IP: 180.252.12.34 (HP/Mobile)`), perbedaannya tercatat secara presisi dan dapat diverifikasi kapan saja.

---

## 3. Proteksi Direktori Penyimpanan Anti-Shell / Backdoor

Direktori `storage/app/public` (dan tautan `public/storage`) merupakan folder publik yang dapat diakses langsung oleh browser untuk menampilkan foto guru, fasilitas, dan berita. Jika tidak dikonfigurasi dengan benar, celah ini kerap dimanfaatkan peretas untuk mengunggah file skrip PHP jahat (*webshell*) berkedok file gambar.

Untuk menutup celah ini secara permanen:
1. **Pemasangan Aturan `.htaccess` Khusus:**
   Pada berkas [storage/app/public/.htaccess](../../storage/app/public/.htaccess) dan [public/storage/.htaccess](../../public/storage/.htaccess):
   ```apache
   # TBSM SECURITY: BLOCK SCRIPT EXECUTION IN STORAGE
   <IfModule mod_php.c>
       php_flag engine off
   </IfModule>
   <IfModule mod_php7.c>
       php_flag engine off
   </IfModule>
   <IfModule mod_php8.c>
       php_flag engine off
   </IfModule>
   <FilesMatch "(?i)\.(php|phtml|php3|php4|php5|php7|php8|phar|inc|cgi|pl|py|sh|bash|exe|jsp|asp|aspx)$">
       Order Deny,Allow
       Deny from all
   </FilesMatch>
   Options -ExecCGI -Indexes
   ```
2. **Efek Perlindungan:**
   - Mesin PHP dimatikan total di dalam folder storage.
   - Akses HTTP langsung ke berkas berekstensi skrip manapun otomatis ditolak dengan status HTTP 403 Forbidden.
   - Penjelajahan direktori (*directory browsing*) dinonaktifkan.
3. **Pemberlakuan Otomatis pada Utilitas Deployment:**
   Skrip [public/update-repo.php](../../public/update-repo.php) secara otomatis meregenerasi file `.htaccess` ini setiap kali fungsi perbaikan izin storage dijalankan.

---

## 4. Perlindungan Anti-Brute Force pada `update-repo.php`

Skrip `update-repo.php` menyediakan fungsionalitas kritis (menjalankan git pull, migrate, cache clear). Oleh karena itu, pengamanannya diperketat:

1. **Kunci Akses Rahasia (*Deployment Key*):**
   Sandi otentikasi dibaca langsung dari variabel lingkungan server `DEPLOY_KEY` di file `.env`.
2. **Pencatatan Percobaan Gagal Berbasis Berkas Server (*File-Lock Rate Limiting*):**
   - Berbeda dengan pembatasan berbasis sesi browser yang mudah diakali peretas dengan menghapus cookie, sistem ini menyimpan jumlah percobaan gagal di direktori server: `storage/framework/cache/tbsm_locks/deploy_ip_{hash_ip}.json`.
   - **Aturan Penguncian:**
     Jika sebuah alamat IP gagal memasukkan sandi sebanyak **5 kali berturut-turut**, IP tersebut otomatis dikunci total selama **15 menit**.
   - Setiap upaya akses selama masa penguncian langsung memunculkan pesan peringatan penolakan akses beserta sisa waktu tunggu.

---

## 5. Kebijakan Kata Sandi Ketat (*Strong Password Policy*)

Pada halaman profil admin [EditProfile.php](../../app/Filament/Pages/Auth/EditProfile.php), pengubahan kata sandi diwajibkan memenuhi standar keamanan tinggi:
```php
Password::min(8)
    ->letters()
    ->mixedCase()
    ->numbers()
    ->symbols()
    ->uncompromised()
```
- **Minimal 8 Karakter.**
- **Wajib Kombinasi Huruf Besar dan Huruf Kecil.**
- **Wajib Mengandung Karakter Angka.**
- **Wajib Mengandung Karakter Simbol/Tanda Baca.**
- **Pengecekan Kebocoran Global (*HaveIBeenPwned*):** Pustaka Laravel otomatis memeriksa hash kata sandi ke database global untuk memastikan sandi yang dipilih belum pernah bocor dalam insiden peretasan publik di internet.

---

## 6. HTTP Security Headers dan Kustomisasi URL Admin

1. **Header Keamanan Standar Industri:**
   Middleware [SecurityHeaders.php](../../app/Http/Middleware/SecurityHeaders.php) didaftarkan pada panel admin dan rute publik untuk menyuntikkan header perlindungan:
   - `X-Frame-Options: SAMEORIGIN`: Mencegah situs dibungkus dalam `<iframe>` berbahaya oleh pihak luar (Anti-Clickjacking).
   - `X-Content-Type-Options: nosniff`: Memaksa browser mematuhi MIME-type asli berkas (Anti-MIME Sniffing).
   - `Referrer-Policy: strict-origin-when-cross-origin`: Melindungi data rute sensitif dari kebocoran ke pihak ketiga.
2. **Kustomisasi URL Admin & Proteksi Robot:**
   - Jalur URL admin dapat diubah sewaktu-waktu tanpa mengubah kode program dengan menambahkan baris di `.env`:
     ```env
     ADMIN_PANEL_PATH=portal-khusus-tbsm
     ```
   - Berkas dinamis `routes/web.php` pada rute `/robots.txt` secara otomatis memblokir jalur admin kustom tersebut dan berkas `update-repo.php` agar tidak diindeks oleh bot mesin pencari:
     ```
     User-agent: *
     Allow: /
     Disallow: /portal-khusus-tbsm
     Disallow: /update-repo.php
     ```
