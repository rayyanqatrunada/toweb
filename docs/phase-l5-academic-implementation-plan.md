# Phase L5.0 Academic Implementation Plan

This implementation plan acts as the blueprint for the Phase L5 Academic Frontend Redesign. It is divided into sequential steps to ensure stable execution without disrupting existing functionality.

## L5.1 — Program & Competency Redesign

### Objective
Redesign `/akademik/program` to reflect the "Academic Identity" concept, presenting programs and their competencies in a premium, editorial format.

### Files Likely Affected
- `resources/views/frontend/academic/programs.blade.php`

### Components Reused
- `x-layouts.app`
- `x-frontend.layout.container`
- `x-frontend.layout.section`
- `x-frontend.ui.eyebrow`
- `x-frontend.ui.empty-state`

### Backend & Data Dependencies
- Relies on `Program::with('competencies')`. Data must exist in CMS (name, description, thumbnail). No new database fields required.

### Design Strategy
- **Desktop**: Editorial hero section for the page. Each program acts as a distinct horizontal block with an asymmetric image and content split. Competencies displayed as a structured, numbered list.
- **Mobile**: Vertical stacking. The program image appears first, followed by the title and a compact list of competencies.
- **Animation**: `reveal-up` staggered for each program block.

### Validation
- Ensure `$program->description` renders safely using `HtmlSanitizer`.
- Verify no horizontal scrollbars on mobile.

---

## L5.2 — Teacher Redesign

### Objective
Redesign `/akademik/guru` to portray the "People Behind the Workshop," emphasizing professional hierarchy.

### Files Likely Affected
- `resources/views/frontend/academic/teachers.blade.php`

### Components Reused
- `x-frontend.layout.container`
- `x-frontend.ui.badge`

### Backend & Data Dependencies
- Relies on `Teacher::where('is_active', true)`. Requires `photo`, `name`, `position`, `nip`, `is_head_of_department`.

### Design Strategy
- **Desktop**: Highlight the Head of Department in a featured, larger card or top-tier position. Other teachers follow in a clean, high-contrast grid (e.g., charcoal backgrounds or minimal white cards with red accents).
- **Mobile**: 1-column grid. Prioritize the portrait and name.
- **Animation**: `reveal-fade` with `delay-*` based on grid index.

### Validation
- Ensure fallback images render correctly for teachers without photos.

---

## L5.3 — Facility Redesign

### Objective
Redesign `/akademik/fasilitas` into a "Workshop Showcase" that clearly communicates infrastructure quality.

### Files Likely Affected
- `resources/views/frontend/academic/facilities.blade.php`

### Components Reused
- `x-frontend.layout.container`
- `x-frontend.ui.badge`

### Backend & Data Dependencies
- Relies on `Facility::all()`. Requires `name`, `photo`, `quantity`, `condition`.

### Design Strategy
- **Desktop**: Image-led composition. Cards focus heavily on the photography of the facility. Map the `condition` enum to L1 design system badges (e.g., Green for 'good', Yellow for 'fair', Red for 'poor').
- **Mobile**: Edge-to-edge images inside cards, creating a smooth vertical scroll experience.
- **Animation**: Scale images on hover (`group-hover:scale-105`) combined with `reveal-up` on entry.

### Validation
- Ensure all 3 enum states for `condition` are handled without throwing exceptions.

---

## L5.4 — Controller Optimization

### Objective
Update `AcademicController` to improve performance and logical ordering, addressing findings from the L5.0 audit.

### Files Likely Affected
- `app/Http/Controllers/Frontend/AcademicController.php`

### Backend & Data Dependencies
- Utilizes `Illuminate\Support\Facades\Cache`.

### Design Strategy
- Wrap `Program`, `Teacher`, and `Facility` queries in `Cache::remember` (e.g., 60 minutes TTL).
- Update `teachers` query to order by `is_head_of_department` (descending), then by `name`.
- Update `facilities` query to order by `condition` (good first), then by `quantity` (descending).

### Validation
- Run `php artisan test` to ensure caching logic does not break existing routes.

---

## L5.5 — Academic Integration QA

### Objective
Final validation of the entire L5 phase.

### Execution
1. Run `php artisan view:clear` and `php artisan optimize:clear`.
2. Run `npm run build` to compile Tailwind utility classes.
3. Run `php artisan test` to confirm backend integrity.
4. Run `php scratch/uat_frontend_check.php` to ensure no 500/404 errors.
5. Review accessibility (`prefers-reduced-motion`, `aria-label`, contrast).
6. Provide final Phase L5 summary report.
