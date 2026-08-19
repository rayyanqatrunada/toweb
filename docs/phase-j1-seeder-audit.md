# PHASE J1 — PRE-SEED AUDIT

## 1. Active Models Inventory
1. **User**: `name`, `email`, `password` (Admin)
2. **Setting**: `key`, `value`, `type`
3. **Category**: `name`, `slug`, `description`
4. **Tag**: `name`, `slug`
5. **Post**: `category_id`, `user_id`, `title`, `slug`, `excerpt`, `content`, `thumbnail`, `status`, `published_at`
6. **Program**: `name`, `slug`, `description`, `thumbnail`
7. **Competency**: `program_id`, `name`, `slug`, `description`
8. **Teacher**: `user_id` (nullable), `name`, `nip`, `position`, `phone`, `photo`, `is_head_of_department`, `is_active`
9. **Facility**: `name`, `slug`, `description`, `photo`, `quantity`, `condition`
10. **Achievement**: `category_id`, `title`, `slug`, `level`, `rank`, `organizer`, `date`, `description`, `photo`, `status`
11. **GalleryAlbum**: `title`, `slug`, `description`, `thumbnail`, `event_date`, `location`, `status`
12. **GalleryItem**: `gallery_album_id`, `file_path`, `type`, `description`, `title`, `alt_text`, `sort_order`, `is_featured`
13. **DownloadCategory**: `name`, `slug`, `description`
14. **Download**: `download_category_id`, `title`, `slug`, `description`, `file_path`, `is_public`, `file_type`, `file_size`, `status`
15. **IndustryPartner**: `name`, `slug`, `industry_type`, `description`, `address`, `phone`, `email`, `website`, `logo`, `status`
16. **Partnership**: `industry_partner_id`, `type`, `title`, `start_date`, `end_date`, `description`, `document_file`, `status`
17. **Internship**: `industry_partner_id`, `partnership_id` (nullable), `title`, `start_date`, `end_date`, `status`, `description`
18. **JobVacancy**: `industry_partner_id`, `title`, `slug`, `position`, `description`, `requirements`, `responsibilities`, `location`, `work_type`, `employment_type`, `salary_min`, `salary_max`, `salary_text`, `application_deadline`, `status`
19. **Alumni**: `user_id` (nullable), `name`, `slug`, `student_id`, `graduation_year`, `photo`, `city`, `education`, `current_occupation`, `current_company`, `bio`, `achievements`, `is_public`, `status`
20. **Announcement**: `title`, `slug`, `content`, `file_attachment`, `is_active`

## 2. Table Relationships (Foreign Keys)
- `Post` -> `category_id` (Category), `user_id` (User)
- `Competency` -> `program_id` (Program)
- `Teacher` -> `user_id` (User) - Nullable
- `Achievement` -> `category_id` (Category)
- `GalleryItem` -> `gallery_album_id` (GalleryAlbum)
- `Download` -> `download_category_id` (DownloadCategory)
- `Partnership` -> `industry_partner_id` (IndustryPartner)
- `Internship` -> `industry_partner_id` (IndustryPartner), `partnership_id` (Partnership - nullable)
- `JobVacancy` -> `industry_partner_id` (IndustryPartner)
- `Alumni` -> `user_id` (User) - Nullable

## 3. Dependency Order
Untuk memastikan relasi berjalan lancar (tanpa orphan FK constraint errors) dan idempotency terjamin, eksekusi seeder harus diurutkan:
1. `RoleAndUserSeeder` (Admin User & Role)
2. `SettingSeeder`
3. `AcademicDataSeeder` (Program -> Competency, Teacher, Facility)
4. `IndustryDataSeeder` (IndustryPartner -> Partnership -> Internship, JobVacancy)
5. `ContentDataSeeder` (Category -> Tag -> Post, Announcement, Achievement)
6. `MediaDataSeeder` (GalleryAlbum -> GalleryItem)
7. `AlumniDataSeeder` (Alumni)
8. `DownloadDataSeeder` (DownloadCategory -> Download)

## 4. Nullable & Required Fields Insights
- Sebagian besar CMS relation (seperti `category_id`) bersifat required.
- `user_id` pada `Teacher` dan `Alumni` bersifat nullable, dapat dibiarkan `null` untuk memisahkan akun pengguna dengan profil data statis.
- Field `status` (enums: 'published', 'draft', 'open', 'closed') harus mengikuti aturan model.
- Field media/photo bervariasi (`photo`, `thumbnail`, `file_path`, `logo`). Diperlukan aset placeholder.

## 5. Enum/Status Fields
- **Post, GalleryAlbum, Achievement**: `published`, `draft`
- **IndustryPartner, Alumni, Download**: `published`, `draft` (atau ekuivalen)
- **JobVacancy**: `open`, `closed`, `draft`
- **Internship**: `planned`, `ongoing`, `completed`, `cancelled` (Sesuai schema aktual)
- **Partnership**: `active`, `completed`, `cancelled`

*(Seluruh skema di atas telah diverifikasi dengan schema di `app/Models` dan aman untuk diimplementasikan tanpa perlu migration tambahan).*
