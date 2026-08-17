# QUEUE & BACKGROUND JOBS — PRODUCTION SOP

## 1. Queue Architecture
Sistem antrian pada aplikasi TOWEB dikonfigurasi secara stabil menggunakan _Database Queue_. Ini berarti Anda tidak perlu meng-_install_ servis *Redis* ataupun *Horizon*. Semua *Job* akan bersandar pada tabel `jobs`, `job_batches`, dan `failed_jobs`.

## 2. Local Development
Di lingkungan lokal, pastikan parameter di dalam file `.env` bernilai:
```env
QUEUE_CONNECTION=database
```
Untuk menguji jalannya *Jobs* saat koding:
```bash
php artisan queue:work
```

## 3. Production Configuration
Pastikan `.env` server _Production_ menggunakan _database driver_:
```env
QUEUE_CONNECTION=database
```
Jangan menggunakan driver `sync` di _Production_ agar pengguna tidak mengalami penurunan performa / interupsi kecepatan.

## 4. Queue Worker Command
Menjalankan *Worker Daemon* secara terus-menerus dan aman (*safe backoff*):
```bash
php artisan queue:work --tries=3 --backoff=5,10,20
```

## 5. Deployment & Restart
Ketika Anda mendeploy kode terbaru ke server, jangan lupa me-_restart_ antrian agar memori PHP terbaru dimuat:
```bash
php artisan queue:restart
```
> [!TIP]
> Pekerjakan daemon manager seperti *Supervisor* (`supervisord`) di server Ubuntu/Linux Anda agar worker otomatis hidup lagi setelah *crash* atau *restart*.

## 6. Failed Jobs
Jika ada Job yang gagal (melebihi batas `tries`), ia akan dicatat ke dalam tabel `failed_jobs`.
Untuk mengecek siapa yang gagal:
```bash
php artisan queue:failed
```
Untuk menjalankan ulang seluruh Job yang gagal:
```bash
php artisan queue:retry all
```
Untuk menghapus yang tidak bisa diselamatkan lagi (setelah berbulan-bulan):
```bash
php artisan queue:flush
```

## 7. Retry Behavior (Idempotency)
Operasi *Database Analytics* (seperti `download_count` increment) bersifat _atomic_. Jika _job worker crash_ sebelum koneksi selesai, ia bisa men-_trigger_ duplikasi penambahan satu *count*. Ini adalah risiko kecil (*approximate analytics*), namun _trade-off_ ini jauh lebih baik ketimbang performa situs utamanya yang lambat.

## 8. Monitoring & Backup
- Tidak perlu mencadangkan tabel `jobs` secara rutin karena isinya _ephemeral_ (singgah sementara).
- Hapus *failed jobs* berkala jika tidak lagi di- *maintain* untuk menghindari obesitas ukuran *database*.
