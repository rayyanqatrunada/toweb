# PHASE K — IMPLEMENTATION PLAN

## OVERVIEW
Fase K (User Acceptance Testing) telah dieksekusi untuk memverifikasi data dan fungsi CMS. Audit K1 menemukan kegagalan pengisian data seeder pada 13 tabel (Berita, Unduhan, Galeri, Lowongan, dll.) karena eksekusi seeder terhenti secara paksa oleh `QueryException`. 

## CRITICAL FINDINGS (MUST FIX)
**1. Enum Type Mismatch di `IndustryDataSeeder`**
- **Masalah:** Saat mengeksekusi `Partnership::updateOrCreate`, `IndustryDataSeeder` memberikan nilai string `'Penyaluran Lulusan'`, `'Tempat PKL'`, dan `'Guru Tamu'` untuk kolom `type`, dan `'completed'` untuk kolom `status`. Padahal, skema database mensyaratkan *strict enum*:
  - `type` hanya boleh: `'mou'`, `'internship'`, `'recruitment'`.
  - `status` hanya boleh: `'active'`, `'expired'`, `'terminated'`.
- **Dampak:** Eksekusi DatabaseSeeder terhenti. Sisa data untuk konten, galeri, alumni, dan unduhan tidak masuk. Frontend Route untuk data tersebut menampilkan *Empty State*.

## PROPOSED CHANGES

### 1. `database/seeders/IndustryDataSeeder.php`
- [MODIFY] `database/seeders/IndustryDataSeeder.php`
- Ubah array data `partnerships` agar menggunakan enum yang valid.

```php
// Sebelum:
$partnerships = [
    ['partner' => $partnerModels[0], 'type' => 'Penyaluran Lulusan', 'status' => 'active'],
    ['partner' => $partnerModels[1], 'type' => 'Tempat PKL', 'status' => 'active'],
    ['partner' => $partnerModels[2], 'type' => 'Guru Tamu', 'status' => 'completed'],
    ['partner' => $partnerModels[3], 'type' => 'Tempat PKL', 'status' => 'active'],
];

// Menjadi:
$partnerships = [
    ['partner' => $partnerModels[0], 'type' => 'recruitment', 'status' => 'active'],
    ['partner' => $partnerModels[1], 'type' => 'internship', 'status' => 'active'],
    ['partner' => $partnerModels[2], 'type' => 'mou', 'status' => 'expired'],
    ['partner' => $partnerModels[3], 'type' => 'internship', 'status' => 'active'],
];
```

## USER REVIEW REQUIRED
> [!IMPORTANT]
> Mengingat Fase K mensyaratkan untuk tidak membuat perubahan tanpa persetujuan (Implementation Plan), kami memohon persetujuan (*Approval*) dari Anda untuk memodifikasi `IndustryDataSeeder.php`. 
> Setelah Seeder diperbaiki, kami akan dapat menjalankan ulang re-seed secara idempotent untuk mengisi tabel yang kosong dan melanjutkan UAT antarmuka publik (Frontend) secara nyata.

## VERIFICATION PLAN
### Automated Tests
- Menjalankan `php scratch/run_seed_checks.php` untuk memverifikasi bahwa seeding selesai secara idempotent tanpa exception.
- Memastikan `php scratch/uat_checks.php` menampilkan jumlah record `> 0` untuk semua tabel konten.

### Manual Verification
- Melakukan *refresh* pada Frontend (`/berita`, `/galeri`, `/pkl`, dll) untuk memverifikasi hilangnya *Empty States* dan munculnya data riil.
