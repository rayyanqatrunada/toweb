# Phase L4 About Page Audit

## 1. Route & Controller
- **Route**: `Route::get('/tentang', [HomeController::class, 'about'])->name('about')`
- **Controller**: `HomeController@about`. Currently, it only returns `view('frontend.about')` without passing any variables.

## 2. Blade & Layout
- **Blade File**: `resources/views/frontend/about.blade.php`
- **Existing Layout**: A simple layout with a generic dark header, breadcrumbs, History (Prose), Vision (Card), Mission (Card), and quick links to Teachers and Facilities. It feels like a standard generic template rather than an institutional profile.

## 3. Data Sources & Available CMS Fields
- The view entirely relies on globally injected `$settings`.
- Available settings from `SettingSeeder`:
  - `site_name`, `site_description`, `site_tagline`
  - `profile_history` (HTML)
  - `profile_vision` (Text)
  - `profile_mission` (HTML List)
- Missing data in the view:
  - To display Head of Department, Programs, and Facilities, the controller needs to pass `$headOfDepartment`, `$programs`, and `$facilities`. (These are currently only loaded in `HomeController@index`).

## 4. Problems & Missing Data
- **Missing Data**: The `HomeController@about` needs to query `Teacher::where('is_head_of_department', true)` and `Program::all()` and `Facility::latest()->take(...)` if we want to fulfill the required Information Architecture (IA).
- **Layout**: The vision and mission are presented side-by-side in identical cards with heavy shadows, which violates the L3 design language (which emphasizes editorial layouts, asymmetric design, and minimal heavy shadows).
- **History**: Currently just a generic `prose` block. It could be formatted more beautifully, though we only have a single `profile_history` block (not a structured array of timeline events). Thus, we will use a long-form editorial layout for it.

## 5. Reusable Components
- `x-frontend.layout.container`
- `x-frontend.layout.section`
- `x-frontend.ui.eyebrow`
- `x-frontend.ui.button`
- `x-frontend.breadcrumbs`
- Homepage's L3 layout approach (charcoal backgrounds, asymmetric grids, subtle red accents).

## 6. Action Plan
1. **Controller Modification**: Update `HomeController@about` to fetch `$headOfDepartment`, `$programs`, and `$facilities` (using `Cache::remember` to maintain performance).
2. **View Rewrite**: Redesign `about.blade.php` applying the "Modern Automotive Technical Institution" visual identity. 
3. **Information Architecture**:
   - Page Hero (Editorial style)
   - Introduction & History (Long-form editorial)
   - Vision & Mission (Asymmetric typographic approach)
   - Head of Department Profile (Large portrait + quote)
   - Identity Principles (Technical, Discipline, Industry, etc. as static typographic points)
   - Program Snapshot
   - Facility Snapshot
   - Final CTA
