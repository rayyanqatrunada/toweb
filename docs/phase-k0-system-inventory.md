# PHASE K0 — SYSTEM INVENTORY

## 1. Models (20)
- User
- Setting
- Program
- Competency
- Teacher
- Facility
- IndustryPartner
- Partnership
- Internship
- JobVacancy
- Category
- Tag
- Post
- Announcement
- Achievement
- GalleryAlbum
- GalleryItem
- Alumni
- DownloadCategory
- Download

## 2. Controllers (Frontend)
- HomeController
- AcademicController
- NewsController
- AchievementController
- GalleryController
- PartnershipController
- InternshipController
- JobController
- AlumniController
- DownloadController
- SearchController
- SitemapController

## 3. Filament Resources
- Achievements
- Alumnis
- Announcements
- Categories
- Competencies
- DownloadCategories
- Downloads
- Facilities
- GalleryAlbums
- GalleryItems
- IndustryPartners
- Internships
- JobVacancies
- Partnerships
- Posts
- Programs
- Tags
- Teachers

## 4. Custom Pages
- ManageSettings (Sistem > Pengaturan Web)

## 5. Seeders
- DatabaseSeeder
- RoleAndUserSeeder
- SettingSeeder
- AcademicDataSeeder
- IndustryDataSeeder
- ContentDataSeeder
- MediaDataSeeder
- AlumniDataSeeder
- DownloadDataSeeder
- Support/SeedAssetGenerator

## 6. Shared Components / Traits
- CleansUpFiles (Trait untuk file auto-deletion)
- HtmlSanitizer (Service kelas statis untuk RichText)
- SettingsService (Cache layer untuk pengaturan website)

## 7. Security Layer
- Spatie Laravel Permission (Digunakan dengan role tunggal 'admin')
- HTML Purifier / native regex sanitizer di level blade components
- CSRF Token aktif di seluruh form.
