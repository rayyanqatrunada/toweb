# PHASE P0 — PERFORMANCE BASELINE (AUDIT)

## 1. Executive Summary
Berdasarkan audit awal terhadap *source code* dan lingkungan eksekusi (tanpa melakukan pengeditan *code*), kami menemukan beberapa *bottleneck* performa yang sangat signifikan. Masalah terbesar bukanlah pada *query* lambat (slow query), melainkan pada **penggunaan *cache* yang berlebihan (over-caching) dan *serialization overhead***. 

**Root Cause Paling Mungkin:**
1. **Database Cache Serialization Overhead:** Aplikasi menyimpan *Object Eloquent Collection* beserta seluruh relasinya (contoh: `Program::with('competencies')->get()`) secara utuh ke dalam tabel `cache` (karena `CACHE_STORE=database`). Membaca dan men-*unserialize* obyek masif tersebut dari tabel *database* justru memakan memori, waktu, dan siklus CPU yang berlipat ganda jauh lebih besar daripada melakukan *query* SQL sederhana sebesar 2-5ms.
2. **Global View Composer Overhead:** `View::composer('*')` dieksekusi pada *setiap* komponen Blade yang di-*render*. Jika satu halaman merender 50 komponen/sub-view, maka *closure* tersebut dieksekusi 50 kali per halaman, menyebabkan *overhead* memori di *presentation layer*.

## 2. Environment Audit (Step P0.1)
- **APP_ENV**: local (development)
- **APP_DEBUG**: true (Menambah *overhead* waktu eksekusi)
- **CACHE_STORE**: database (Sangat lambat untuk menyimpan Obyek/Collection yang besar)
- **SESSION_DRIVER**: database
- **Route Cache**: Tidak Aktif
- **View Cache**: Tidak Aktif

## 3. Controller & Query Audit (Step P0.3 - P0.6)
Sebagian besar *Controller* seperti `HomeController` memiliki pengambilan data seperti berikut:

```php
$programs = Cache::remember('homepage:programs', now()->addMinutes(60), fn() => Program::with('competencies')->get());
```

**Temuan:**
- **Tidak ada N+1 *query*** secara langsung karena pengembang sebelumnya sudah menggunakan `with()` untuk *eager loading*. 
- **Overhead**: *Query* ini memang tidak dipanggil setiap saat ke tabel `programs`, **tetapi** tabel `cache` menyimpan representasi *string* (serialize) raksasa dari data tersebut. Proses membacanya (*unserialize*) memblokir I/O yang membuat pindah halaman terasa "ngelag" atau butuh sekian detik.

## 4. Blade & Presentation Audit (Step P0.9 & P0.18)
Di dalam `AppServiceProvider`:
```php
\Illuminate\Support\Facades\View::composer('*', function ($view) {
    $view->with('settings', app(\App\Services\SettingsService::class));
});
```
- Penggunaan `*` (wildcard) berarti setiap kali tag komponen `x-navbar`, `x-footer`, atau parsial apa pun dipanggil, *service container* kembali dipanggil, dan variabel diinjeksikan. Hal ini menyebabkan **Blade Render Time** membengkak secara tidak proporsional saat melakukan rendering struktur UI kompleks seperti halaman Beranda.

## 5. Asset & Image Audit (Step P0.10 - P0.15)
- **Ukuran File CSS/JS**: Relatif kecil karena menggunakan Vite dan Tailwind purging. 
- **Ukuran Gambar**: Sangat aman. Audit ke `/storage` menunjukkan bahwa rata-rata *dummy image* berukuran sekitar ~10 KB. Tidak ada aset dengan resolusi raksasa (2MB+) yang memblokir *First Contentful Paint* (FCP).

## 6. Kesimpulan & Urutan Optimasi yang Direkomendasikan (P1 Plan)

Karena masalah utama ada pada eksekusi CPU saat menata ulang *cache* dan merender Blade, berikut adalah *Recommended Optimization Order* untuk tahap P1 nanti:

1. **Cache Re-Architecture (Critical)**: Menghapus `Cache::remember` untuk *query* sederhana yang membengkak karena proses *serialization*. Mengganti *driver* cache jika memungkinkan atau me-return format *Array/Data Transfer Object* yang ringan alih-alih `Eloquent Collection`.
2. **View Composer Optimization (High)**: Menghapus `View::composer('*')` dan menggantinya dengan pemanggilan langsung spesifik pada komponen utama/layout saja, atau me-register *singleton helper*.
3. **Database Query Refinement (Medium)**: Menggunakan `.select('id', 'name', '...')` untuk menghindari pengambilan memori (overfetching) pada kolom *text* besar seperti artikel berita saat me-render *card/thumbnail* di Beranda.

---
**Status P0**: Audit Selesai.
*Saya siap menunggu instruksi Anda untuk melangkah ke eksekusi PHASE P1.*
