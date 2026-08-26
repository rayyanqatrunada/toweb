# Homepage Audit Report
**Project:** TOWEB - SMK Negeri 1 Bangsri
**Target:** Redesign Full Landing Page for TBSM

## 1. Existing Architecture
- **Framework:** Laravel (v11/v10-based architecture).
- **Frontend Stack:** Blade + Tailwind CSS (via Vite) + JavaScript (minimal).
- **Backend/CMS:** Filament PHP is used as the administration panel.
- **Data Caching:** High use of `Cache::remember` with specific model-booted invalidation logic in `HomeController` (e.g., `homepage:stats:alumni`, `homepage:programs`).
- **Optimization Strategy:** Already heavily optimized for TTFB and memory usage. Selects only needed columns (`select('id', 'title', 'slug', ...)`).

## 2. Existing Design System
- **Colors (Current):** Uses a palette based on Figma references (`bg-figma-bg-light`, `bg-figma-bg-alt`, `text-figma-dark`, `text-figma-gray`, `bg-figma-red`, `bg-figma-dark-red`).
- **Typography:** Custom fonts likely mapped in Tailwind configuration (`font-heading`, `font-sans`).
- **Layout Patterns:** Large hero images, text split layouts, reveal-on-scroll animations (`reveal-on-scroll`, `reveal-up`, `reveal-left`), and custom box models (`border-[#E4E1E5]`, `rounded-[4px]`).
- **Accessibility:** Some keyboard navigability exists (`focus-ring`).

## 3. Existing Reusable Components
- **Layouts:** `<x-layouts.app>` serves as the main wrapper, handling `<head>`, SEO meta, JSON-LD, navbar, and footer.
- **UI Primitives:** Found in `resources/views/components/frontend/ui/` (`badge`, `button`, `divider`, `empty-state`, `eyebrow`).
- **Sections:** `resources/views/components/frontend/hero/` provides some hero logic, but the current `home.blade.php` manually constructs the hero.
- **Navbar/Footer:** Located in `resources/views/components/navbar.blade.php` and `footer.blade.php`.

## 4. Existing Homepage Structure (`home.blade.php`)
- **Main Wrapper:** `<main class="flex flex-col items-center bg-figma-bg-light w-full overflow-hidden">`
- **Section 01:** Hero Section (Static split text/image layout, no slider currently).
- **Section 02:** Identity / Introduction (3 cards with icons).
- **Section 03:** Program & Competency (Grid of competencies with hardcoded text).
- **Section 04:** Why TBSM (Asymmetric alternating text & image layout).
- **Section 05:** Facilities (Large featured image and 3 small thumbnails).
- **Section 06:** Industry Connection (Logo row of partners).
- **Section 07:** Achievements (Featured achievement + timeline list).
- **Section 08:** Final CTA (Dark background, two buttons).

## 5. Existing Data Sources (via `HomeController`)
- `$programs` (with `$program->competencies`)
- `$facilities`
- `$partners` (IndustryPartner, currently fetched as collection of 8)
- `$jobVacancies` (with Partner)
- `$alumnis`
- `$latestNews` (Post with Category)
- `$agendas` (Announcement)
- `$galleries` (GalleryAlbum with items)
- `$headOfDepartment` (Teacher)
- `$alumniCount`, `$partnerCount`, `$achievementCount`, `$facilityCount` (scalar stats)

## 6. Existing Routes
- All required frontend routes exist: `/`, `/tentang`, `/akademik/*`, `/prestasi`, `/mitra-industri`, `/berita`, `/galeri`.
- Route namespace mapped to `App\Http\Controllers\Frontend\*`.

## 7. Existing Performance Constraints
- Eager loading images issue: Must ensure `fetchpriority="high"` and `loading="eager"` on first hero slide.
- Avoid large component renders inside loops.
- Do not increase TTFB by over-querying.
- The `HomeController` currently restricts select queries efficiently. This must be preserved.
- JS must remain minimal (use IntersectionObserver).

## 8. Files that should be modified
- `resources/views/frontend/home.blade.php` (Complete structural overhaul).
- `resources/views/components/navbar.blade.php` (Implement sticky, active menu indicator, mobile menu).
- `resources/views/components/footer.blade.php` (Refinement based on identity).
- `app/Http/Controllers/Frontend/HomeController.php` (To ensure only 1 partner is fetched, or to optimize query selections for the new layout logic).
- `resources/views/components/frontend/hero/` (May need to create or refactor a slider component).
- Tailwind/CSS configuration (if any new custom classes for slider/animations are needed, though existing ones may suffice).

## 9. Files that should NOT be modified
- Database Schema / Migrations (no new tables).
- Models (`IndustryPartner`, `Post`, `Achievement`, etc. - existing scopes and relationships are sufficient).
- Backend Admin Controllers / Filament resources.
- Views for internal pages like `/prestasi/{slug}`, `/mitra-industri/{slug}`, unless explicitly adjusting "Teknik Otomotif" to "TBSM" (which was already done in previous tasks).
- `AppServiceProvider` / Core Laravel setups.

## 10. Implementation Strategy
1. **Foundation & Theme Check:** Review `tailwind.config.js` to ensure the requested palette (White, Soft White, Light Gray, Charcoal, Black, Primary Red, Bright Red, Dark Red) can be seamlessly integrated using custom utility classes (e.g. `bg-[#C8102E]`) or extending Tailwind config.
2. **Component Abstraction:** Instead of a 500-line `home.blade.php`, we will split sections into Blade components (e.g., `<x-frontend.home.hero-slider>`, `<x-frontend.home.statistics>`, `<x-frontend.home.competencies>`, etc.) to keep the presentation layer modular and maintainable.
3. **Hero Slider:** Implement a vanilla JS slider using `IntersectionObserver` or simple `setInterval` logic. No heavy libraries like Swiper.js unless strictly necessary.
4. **Data Mapping:**
   - Partner Section: Query `IndustryPartner::published()->first()` instead of an array.
   - Statistics: Feed actual counts from `$alumniCount`, `$achievementCount`, etc., into the statistics UI.
5. **Animation & A11y:** Ensure `prefers-reduced-motion` is respected in CSS. Use lightweight CSS classes for scroll-reveals (already present `reveal-on-scroll`, but we will refine).
6. **Testing & QA:** Run optimization commands, clear caches, and visually inspect responsive breakpoints.
