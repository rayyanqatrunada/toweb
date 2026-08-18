# TOWEB Frontend Performance & Asset Optimization S.O.P
*Dokumen ini merupakan panduan dan catatan performa pada STEP 10F.*

## 1. Font Consolidation (Mengurangi Multiple Font Requests)
Sebelumnya, sistem memanggil font `Inter` dan `Instrument Sans` dari Google Fonts dan Bunny Fonts secara bersamaan, sehingga menghasilkan request duplikat.
* **Solusi**: Hanya menggunakan `Inter` secara lokal via Vite plugin `laravel-vite-plugin/fonts` (Bunny fonts).
* **Konfigurasi (`vite.config.js`)**:
  ```javascript
  import { bunny } from 'laravel-vite-plugin/fonts';
  // ...
  fonts: [
      bunny('Inter', {
          weights: [400, 500, 600, 700, 800],
      }),
  ],
  ```
* **Cleanup**: Semua referensi eksternal `<link>` di `app.blade.php` dan `@import url()` di `app.css` dihapus, karena Vite secara otomatis menyuntikkan aset lokal ke dalam CSS.

## 2. Animation Performance (CPU vs GPU)
Sebelumnya: Statistik angka di Homepage menggunakan `setInterval`, yang diproses dalam sinkronisasi UI Thread sehingga memberatkan CPU di perangkat *mobile* rendah.
* **Solusi**: Menggunakan `window.requestAnimationFrame()` untuk animasi transisi angka (counter) sehingga menyesuaikan *refresh rate* perangkat (biasanya 60fps) dan jauh lebih efisien untuk baterai/CPU ponsel.

## 3. Core Web Vitals: LCP & Image Optimization
Sebelumnya: Gambar yang merupakan **Largest Contentful Paint (LCP)** di _Hero Section_ dimuat secara reguler. Sementara gambar pendukung tidak memiliki atribut asinkronus yang kuat.
* **Solusi**:
  * Menambahkan `fetchpriority="high"` dan `decoding="async"` pada komponen Hero: `resources/views/components/frontend/hero/layout-full.blade.php` dan `layout-split.blade.php`.
  * Seluruh gambar di luar Hero diberikan proteksi _native lazy-loading_ (`loading="lazy"`) dan *asynchronous decoding* (`decoding="async"`) agar tidak *render-blocking*.

## 4. CSS Size & Tailwind v4
Versi Tailwind v4 terbukti sangat efisien:
* Ukuran CSS Bundled (Uncompressed): ~97 kB
* Ukuran CSS Bundled (Gzip/Brotli): ~15 kB
* JS size: 0 kB (Karena 100% didorong menggunakan Alpine/Blade script lokal).

Semua modul berjalan dengan sukses dan melewati 51 unit/feature test.
