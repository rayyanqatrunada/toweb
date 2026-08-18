# Panduan UI/UX (Design System) & Interaksi Frontend

Dokumen ini menjadi pedoman utama dalam menjaga konsistensi antarmuka pengguna (UI) dan pengalaman pengguna (UX) pada seluruh sistem Frontend TOWEB. Segala penambahan fitur dan komponen baru harus mematuhi aturan berikut.

## 1. Design System & Hierarchy
Sistem desain dibangun dengan arsitektur utilitas Tailwind CSS dengan mengutamakan hierarki visual yang bersih dan minimalis:
- **Primary Color:** `red-600` (hover: `red-700`).
- **Surface/Background:** Dominan `bg-slate-50` dipadukan dengan `bg-white` untuk area konten (Cards, Modals), dan `bg-slate-900` untuk kontras bagian *Hero/Footer/Stats*.
- **Container Maximum Width:** Komponen wrapper utama selalu menggunakan `max-w-7xl mx-auto px-4 sm:px-6 lg:px-8` agar margin halaman selalu konsisten di layar lebar.

## 2. Typography
- **Font Stack:** Inter (system sans-serif fallback).
- **H1 (Hero):** `text-4xl md:text-5xl lg:text-6xl font-extrabold tracking-tight`.
- **H2 (Section Header):** `text-3xl md:text-4xl lg:text-5xl font-extrabold tracking-tight`.
- **Body Text:** `text-slate-600` dengan ukuran `text-base` atau `text-lg`.

## 3. Cards & Buttons
- **Cards:** Gunakan `rounded-2xl` dengan `border border-slate-100` dan `shadow-sm`. Pada interaksi hover, transisikan ke `hover:shadow-lg transition-all duration-300`.
- **Primary Button:** `bg-red-600 text-white rounded-xl font-bold px-6 py-3`.
- **Focus State (Accessibility):** Seluruh input, tautan, dan button wajib menggunakan `focus:outline-none focus:ring-4 focus:ring-red-300` (atau `focus:ring-red-500`) untuk penanda navigasi keyboard.

## 4. Animasi & Aksesibilitas (Reduced Motion)
- Tidak semua elemen bergerak secara independen. Animasi hanya diperuntukkan untuk bagian yang memperkuat *storytelling* (contoh: Hero entrance, counter).
- **Scroll Reveal:** Elemen menggunakan API IntersectionObserver dan menambahkan kelas `.is-revealed`.
- **Reduced Motion:** Seluruh animasi JS maupun CSS dibungkus dengan pencegahan bagi pengguna disabilitas visual dan vertigo menggunakan `prefers-reduced-motion: reduce`. Animasi JS (seperti counter angka) menggunakan `requestAnimationFrame` untuk efisiensi CPU dan dapat dinonaktifkan sepenuhnya.

## 5. Mobile & Responsive Layout
- Tidak diperkenankan memaksakan tag `overflow-x-hidden` di `body` sebagai solusi "malas" jika terdapat elemen yang meluber keluar layar. Selesaikan _root cause_ (seperti width container absolut atau min-width).
- **Navbar Mobile:** Memiliki _body lock_ (`overflow: hidden`) ketika modal menu terbuka agar pengguna tidak bisa menggulir halaman ganda saat berada di dalam navigasi mobile.
- **Empty States:** Halaman tanpa data wajib menampilkan komponen statis `<x-empty-state>` yang ramah dan konsisten.

## 6. Image Fallbacks
Setiap pemanggilan _thumbnail_ dari *database* harus menyediakan gambar fallback (melalui Unsplash API atau logo placeholder internal) serta menerapkan aspek rasio konstan (`aspect-video`, `aspect-[4/3]`) dengan `object-cover`.
