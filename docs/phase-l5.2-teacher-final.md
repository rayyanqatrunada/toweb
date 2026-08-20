# Phase L5.2 Teacher & Teaching Staff Redesign Final Report

## Objective
Redesign the `/akademik/guru` route and its view to reflect the "PEOPLE BEHIND THE WORKSHOP" concept, transforming generic teacher cards into an editorial, hierarchical staff profile page.

## Audit Summary
- **Source Files**: Verified `AcademicController@teachers` which queries `Teacher::where('is_active', true)`.
- **Model Fields**: The `Teacher` model includes `name`, `nip`, `position`, `phone`, `photo`, `is_head_of_department`, and `is_active`. 
- **Expertise Field**: Verified during the L5.0 audit and re-checked: there is no `expertise` field or relation on the `Teacher` model. Therefore, the expertise framing section was safely excluded to prevent showing fake data.

## Files Modified
- `resources/views/frontend/academic/teachers.blade.php`: Entirely rewritten.

## Files Created
- `docs/phase-l5.2-teacher-final.md`

## Data Fields Verified
- `name`, `nip`, `position`, `photo`, and `is_head_of_department` are all utilized accurately.
- `phone` was intentionally ignored to preserve privacy parity with the original view.

## Design Structure
- **Section A (Hero)**: Asymmetrical layout with an eyebrow ("ACADEMIC STAFF") and large typography. Highlights the total number of teachers cleanly.
- **Section B (Head of Department Treatment)**: Extracted via inline PHP (`$teachers->where('is_head_of_department', true)->first()`). Showcased using an `image-led composition` inside a charcoal block to differentiate them from the rest of the teaching staff. The portrait is dominant, accompanied by large typography and subtle NIP metadata.
- **Section C (Teacher Listing Treatment)**: Displayed as the "Teaching Team". The remaining staff is sorted alphabetically by name. They are rendered in an editorial 3-column grid featuring a large numbered index overlay, thin dividers on hover, and strict whitespace rules instead of a heavy box-shadow card.
- **Section E (Academic Ecosystem CTA)**: Footer CTA providing navigation links back to `/akademik/program` and `/akademik/fasilitas`.

## Mobile Strategy
- Designed mobile-first. 
- Head of Department transforms into a vertical block where the image acts as a full-width visual anchor above the profile content.
- The Teaching Team flows naturally into a 1-column layout without forced horizontal scrolling.
- Generous padding applied for comfortable touch targets.

## Animation Strategy
- Standard L1 animation classes applied: `reveal-on-scroll`, `reveal-up`, and `reveal-fade` with staggered delays (`delay-[Xms]`).
- Added a subtle `scale-[1.02]` and `grayscale-0` transition on image hover.
- Respected `prefers-reduced-motion` inherently through the L1 animation definitions.

## Accessibility
- Proper `<section>` tags and `<h2>`/`<h3>` hierarchy established.
- `aria-label` / `alt` attributes correctly mapped to teacher names.
- Good contrast ensured by using `charcoal-900` text on light backgrounds and `white` text on the dark Head of Department block.
- Fallback empty states included if there are no teachers or no Head of Department.

## Performance
- No heavy JS or external libraries were added.
- In-view data sorting using Collections (`$teachers->where(...)->sortBy(...)`) is extremely lightweight and prevents the need for complex, multiple database queries.
- Utilized native `loading="lazy"` on all teacher photos.

## QA Results
- **View/Optimize Clear**: Done.
- **NPM Build**: PASS.
- **PHPUnit Tests**: 64 tests / 150 assertions - PASS.
- **UAT Check**: Route `/akademik/guru` returns HTTP 200 with all valid data rendered properly.

## Known Limitations
- The `Teacher` entity does not have an `expertise` field in the database, preventing the display of a rich skills/expertise matrix.
- `AcademicController` doesn't cache the teachers query.

## Next Recommendation
Proceed to **PHASE L5.3 — FACILITIES REDESIGN**.
