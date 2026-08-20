# Phase L5.0 Academic Frontend Audit

## 1. Executive Summary
This document outlines the frontend audit for the Academic domain (Programs, Teachers, Facilities) on the TOWEB platform. The audit verifies available routes, database schema, Filament CMS controls, seeded data, and the current frontend rendering logic. The goal is to provide a solid foundation for the Phase L5 UI redesign without introducing missing data dependencies.

## 2. Route Inventory
Based on `routes/web.php` and `AcademicController`:
| Route | Name | Controller | Method | Parameter | View |
|-------|------|------------|--------|-----------|------|
| `/akademik/program` | `academic.programs` | `AcademicController` | `programs` | None | `frontend.academic.programs` |
| `/akademik/guru` | `academic.teachers` | `AcademicController` | `teachers` | None | `frontend.academic.teachers` |
| `/akademik/fasilitas` | `academic.facilities` | `AcademicController` | `facilities` | None | `frontend.academic.facilities` |

**Finding**: There are **NO** detail routes for academic resources (e.g., `/akademik/program/{slug}`). The redesign must handle all content on the index pages.

## 3. Controller Audit
| Controller | Method | Query | Relations | Variables | Findings |
|------------|--------|-------|-----------|-----------|----------|
| `AcademicController` | `programs` | `Program::with('competencies')->get()` | `competencies` | `$programs` | No caching. Eager loading is present. |
| `AcademicController` | `teachers` | `Teacher::where('is_active', true)->get()` | None | `$teachers` | No ordering by `is_head_of_department`. No caching. |
| `AcademicController` | `facilities` | `Facility::all()` | None | `$facilities` | No ordering. No caching. |

## 4. Model Audit
- **Program**: `id`, `name`, `slug`, `description` (text/HTML), `thumbnail` (image path).
- **Competency**: `id`, `program_id`, `name`, `slug`, `description`.
- **Teacher**: `id`, `user_id`, `name`, `nip`, `position`, `is_head_of_department` (bool), `is_active` (bool), `phone`, `photo`.
- **Facility**: `id`, `name`, `slug`, `description`, `photo`, `quantity` (int), `condition` (enum: 'good', 'fair', 'poor').

## 5. Migration / Final Schema Audit
All required fields are present in the final schema. 
*Note on Enums*: `facilities.condition` strictly uses `'good', 'fair', 'poor'`.

## 6. Filament CMS Audit
- **ProgramResource**: Uses RichEditor for `description`, FileUpload for `thumbnail`.
- **CompetencyResource**: Linked to Program via Select relationship. Uses RichEditor.
- **TeacherResource**: `is_active` and `is_head_of_department` are manageable toggles.
- **FacilityResource**: `condition` is a Select dropdown mapping to the database enum.

## 7. Seeder/Data Audit
Based on `AcademicDataSeeder`:
- **Programs**: 3 records (TKR, TSM, TBO). All have thumbnails.
- **Competencies**: 12 records (4 per program).
- **Teachers**: 6 records. 1 is Head of Department (Budi Santoso). All have photos. Phone numbers exist but are intentionally not displayed on the old frontend for privacy.
- **Facilities**: 8 records. Conditions are all defaulted to `good`. Quantities vary. All have photos.

## 8. Frontend View Audit
Current files in `resources/views/frontend/academic/`:
- `programs.blade.php`: Alternating layout for programs. Renders competencies in a grid list. Uses generic `<x-empty-state>`.
- `teachers.blade.php`: Symmetrical card grid. Uses red rings to highlight the Head of Department. 
- `facilities.blade.php`: Card grid. Uses `emerald/amber/rose` badges to map the `condition` enum.

## 9. L1/L2 Component Audit
The L5 redesign **MUST** utilize the following L1 components:
- `x-frontend.layout.container`
- `x-frontend.layout.section`
- `x-frontend.ui.eyebrow`
- `x-frontend.ui.button`
- `x-frontend.ui.badge`
- `x-frontend.ui.empty-state` (to replace the old generic `x-empty-state`)

## 10. Data Flow
- **Program**: DB → `Program` → `AcademicController@programs` → `frontend.academic.programs`
- **Competency**: Fetched via `$program->competencies` relationship.
- **Teacher**: DB → `Teacher` (active only) → `AcademicController@teachers` → `frontend.academic.teachers`
- **Facility**: DB → `Facility` → `AcademicController@facilities` → `frontend.academic.facilities`

## 11. Findings
- **[LOW] Ordering**: Teachers are not ordered. Head of Department should appear first. Facilities are not ordered by condition or quantity.
- **[LOW] Caching**: Static academic data is not cached, unlike the homepage.
- **[MEDIUM] Component Mismatch**: Old views use `<x-empty-state>`, which should be updated to `<x-frontend.ui.empty-state>`.
- **[LOW] Hardcoded Texts**: Some helper texts like "Fasilitas Jurusan" are hardcoded, but this is acceptable for structural layouts.

## 12. Design Direction
- **Program**: "Program as an Academic Identity". Use an editorial layout with large titles and featured visuals. Competencies act as technical specifications attached to each program.
- **Competency**: Displayed as a stacked specification list inside the Program view, avoiding a generic 12-box card grid.
- **Teacher**: "People Behind the Workshop". Feature the Head of Department prominently, followed by supporting teachers in an organized editorial grid.
- **Facility**: "Workshop / Facility Showcase". Image-led composition. Condition statuses mapped to L1 badges.

## 13. Mobile Design Strategy
- **Vertical-First**: Do not simply shrink grids. Restructure content to flow vertically (Image → Title → Metadata → Content).
- **Touch Targets**: Ensure competency lists and facility cards have large, comfortable touch targets.
- **Hierarchy**: Maintain clear visual boundaries between different programs on mobile to prevent scrolling fatigue.

## 14. Animation Strategy
- Utilize `reveal-on-scroll`, `reveal-up`, and `reveal-fade` classes exclusively.
- Use `delay-100/200` to stagger grids (like Teachers and Facilities).
- Respect `prefers-reduced-motion`.

## 15. Accessibility Strategy
- Ensure proper semantic heading hierarchy (H1 for page title, H2 for Programs, H3 for Competencies).
- Apply `aria-label` where visual icons convey meaning (e.g., Head of Department badge).
- Maintain high color contrast (using Charcoal and Primary Red from L1).

## 16. SEO Strategy
- Use semantic `<section>` and `<article>` tags.
- Ensure all program and facility images utilize descriptive `alt` tags fed from the `$model->name`.

## 17. Performance Strategy
- Keep eager loading (`Program::with('competencies')`) to prevent N+1 queries.
- Add `Cache::remember` in controllers (during implementation) to optimize response times.
- Ensure `loading="lazy"` on below-the-fold images.

## 18. Recommended Implementation Sequence
1. L5.1 — Program & Competency Redesign
2. L5.2 — Teacher Redesign
3. L5.3 — Facility Redesign
4. L5.4 — Controller Optimization (Caching & Ordering)
5. L5.5 — Academic Integration QA

## 19. Risks
- Restructuring the Programs layout might cause excessively long pages on mobile if descriptions are too verbose. (Mitigation: Use line clamps or compact UI for competencies).

## 20. Final Audit Status
**STATUS**: AUDIT COMPLETE. Ready for Implementation Plan execution.
