# PHASE L6 IMPLEMENTATION PLAN

## L6.1 — News Archive Redesign
- **Target**: Redesign the News index page (`/berita`).
- **Files Modified**: `resources/views/frontend/news/index.blade.php`.
- **Data Used**: `$news` (Paginated `Post` models with eager loaded `category`).
- **Design Direction**: "Institutional Knowledge". Replace generic card grids with an asymmetric editorial layout. Use `x-frontend.layout.container`, `x-frontend.ui.eyebrow`, and strict typography matching the L1 Design System.
- **Backend Dependency**: Relies on `NewsController@index`.
- **Responsive Requirement**: Stacked mobile layout (vertical-first). Hide complex layout decorations on screens < 768px. No horizontal overflow.
- **Accessibility Requirement**: Ensure color contrast for category badges. Maintain proper heading hierarchy (H1 for page title, H2/H3 for article titles).
- **Performance Requirement**: Use `loading="eager"` for the first post's thumbnail to improve LCP.
- **QA Requirement**: Pass PHPUnit, build assets, and ensure HTTP 200 on `/berita`.
- **Definition of Done**: The News index page is fully integrated into the L1 Design System and visually distinct from academic pages.

## L6.2 — News Detail Redesign
- **Target**: Redesign the single News page (`/berita/{slug}`).
- **Files Modified**: `resources/views/frontend/news/show.blade.php`.
- **Data Used**: `$post` (Single `Post` model with eager loaded `category` and `tags`).
- **Design Direction**: Maximize readability. Clean header with metadata (Date, Category). Fluid typography for article content. Include consistent L1 breadcrumbs.
- **Backend Dependency**: Relies on `NewsController@show`.
- **Responsive Requirement**: Comfortable reading width on mobile. Optimal font scaling.
- **Accessibility Requirement**: Maintain correct semantic tags within the prose content.
- **Performance Requirement**: Featured image uses `loading="eager"`.
- **QA Requirement**: Pass PHPUnit, build assets, and ensure HTTP 200 on `/berita/{slug}`.
- **Definition of Done**: News detail page offers a premium, distraction-free reading experience integrated with the L1 Design System.

## L6.3 — Achievement Archive Redesign
- **Target**: Redesign the Achievement index page (`/prestasi`).
- **Files Modified**: `resources/views/frontend/achievements/index.blade.php`.
- **Data Used**: `$achievements` (Paginated `Achievement` models with eager loaded `category`).
- **Design Direction**: "Proof of Competence". Design should feel like an institutional trophy room or record log. Emphasize visual data points (`level`, `rank`, `date`). Do NOT use generic blog cards.
- **Backend Dependency**: Relies on `AchievementController@index`.
- **Responsive Requirement**: Ensure complex metadata (rank/level) wraps cleanly on mobile screens without overflowing.
- **Accessibility Requirement**: Clear visual distinction between different achievement levels.
- **Performance Requirement**: `loading="eager"` for the leading achievement image.
- **QA Requirement**: Pass PHPUnit, build assets, and ensure HTTP 200 on `/prestasi`.
- **Definition of Done**: Achievements index page highlights institutional success with a distinct, premium visual identity.

## L6.4 — Achievement Detail Redesign
- **Target**: Redesign the single Achievement page (`/prestasi/{slug}`).
- **Files Modified**: `resources/views/frontend/achievements/show.blade.php`.
- **Data Used**: `$achievement` (Single `Achievement` model).
- **Design Direction**: Structured presentation of achievement metadata (`rank`, `level`, `organizer`, `date`). Large, proud typography. Clean presentation of the `description` text.
- **Backend Dependency**: Relies on `AchievementController@show`.
- **Responsive Requirement**: Metadata grid must collapse into a readable vertical list on mobile devices.
- **Accessibility Requirement**: Ensure decorative icons don't confuse screen readers.
- **Performance Requirement**: Fast rendering of the hero image (`loading="eager"`).
- **QA Requirement**: Pass PHPUnit, build assets, and ensure HTTP 200 on `/prestasi/{slug}`.
- **Definition of Done**: Single achievement page serves as a high-quality showcase of student/teacher success.

## L6.5 — News & Achievement Performance/SEO QA
- **Target**: Validate performance metrics and SEO integrity across the L6 domain.
- **Files Modified**: None (Verification only, unless fixes are needed).
- **Design Direction**: N/A
- **Backend Dependency**: N/A
- **Responsive Requirement**: N/A
- **Accessibility Requirement**: N/A
- **Performance Requirement**: Confirm LCP optimization. Verify JSON-LD schemas correctly compile using `@@context` without throwing Blade compilation errors.
- **QA Requirement**: Run all automated tests and UAT scripts.
- **Definition of Done**: LCP metrics are optimal, zero N+1 queries exist, and JSON-LD renders flawlessly in production.

## L6.6 — Final Cross-Page Review
- **Target**: Holistic review of L1-L6 domains.
- **Files Modified**: None (Verification only).
- **Design Direction**: Ensure News and Achievements feel like part of the same TOWEB universe but maintain their unique identities (Editorial vs. Trophies vs. Academic).
- **Backend Dependency**: N/A
- **Responsive Requirement**: Verify consistent mobile-first behaviors across the entire site.
- **Accessibility Requirement**: Universal compliance check.
- **Performance Requirement**: Holistic check.
- **QA Requirement**: Full test suite pass.
- **Definition of Done**: Phase L6 is officially concluded, and the system is ready for Phase L7 (Student Life & Services).
