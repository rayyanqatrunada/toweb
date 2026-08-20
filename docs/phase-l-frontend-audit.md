# Phase L Frontend Audit

## A. Public Routes & Controllers
- `/` (Home) -> `HomeController@index`
- `/tentang` (About) -> `AboutController@index`
- `/akademik/program` (Programs) -> `ProgramController@index`
- `/akademik/guru` (Teachers) -> `TeacherController@index`
- `/akademik/fasilitas` (Facilities) -> `FacilityController@index`
- `/berita` (News) -> `NewsController@index`
- `/berita/{slug}` -> `NewsController@show`
- `/pengumuman` (Announcements) -> `AnnouncementController@index`
- `/pengumuman/{slug}` -> `AnnouncementController@show`
- `/prestasi` (Achievements) -> `AchievementController@index`
- `/prestasi/{slug}` -> `AchievementController@show`
- `/galeri` (Gallery) -> `GalleryController@index`
- `/pkl` (Internships) -> `InternshipController@index`
- `/pkl/{id}` -> `InternshipController@show`
- `/lowongan` (Job Vacancies) -> `JobVacancyController@index`
- `/lowongan/{slug}` -> `JobVacancyController@show`
- `/alumni` (Alumni) -> `AlumniController@index`
- `/unduhan` (Downloads) -> `DownloadController@index`

## B. Models Used
- `Post` (Category, Tag)
- `Announcement`
- `Achievement`
- `Teacher`
- `Facility`
- `Program`, `Competency`
- `Internship`, `IndustryPartner`
- `JobVacancy`
- `GalleryAlbum`, `GalleryItem`
- `Alumni`
- `Download`, `DownloadCategory`
- `Setting`

## C. Existing Blade Components
Located in `resources/views/components/frontend/`:
- `breadcrumbs.blade.php` (Refactored array syntax)
- Added in L1: `layout/container`, `layout/section`, `ui/eyebrow`, `ui/button`, `ui/badge`, `ui/empty-state`, `ui/divider`
- Layout: `resources/views/components/layouts/app.blade.php`

## D. CSS & JS
- `resources/css/app.css` (Tailwind V4 tokens implemented in L1)
- `resources/js/app.js` (Vanilla JS)
- `vite.config.js` (TailwindCSS Vite Plugin v4)

## E. SEO & JSON-LD
- `breadcrumbs.blade.php` uses JSON-LD (Schema.org).
- `news/show.blade.php` and `achievements/show.blade.php` use `@@context` to prevent Blade syntax collision in Laravel 11.
- Open Graph tags present in `layouts/app.blade.php`.

## F. Existing File Handling
- Images use `Storage::url()` mapping to `/storage/`.

## G. Pagination
- Handled via Laravel's default Tailwind paginator or custom Blade template.

## H. Navbar & Footer
- Currently inside `layouts/app.blade.php` or included partials. Will be refactored in L2.

## Conclusion
The backend integration is perfectly stable. Routes return HTTP 200, tests pass. Ready for visual component redesigns in Phase L.
