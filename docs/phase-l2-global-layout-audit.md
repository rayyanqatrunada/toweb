# Phase L2 Global Layout Audit

## 1. Objective
Redesign the Global Shell (Navbar desktop, Navbar mobile, Footer, Body Layout) to be modern, professional, and accessible. Integration with `SettingsService` for dynamic content.

## 2. Existing Architecture
- **Navbar**: Currently inside `resources/views/components/navbar.blade.php`. Uses Alpine.js for basic toggle but lacks proper mobile-web feel. Has `mobileMenuOpen` and dropdowns.
- **Footer**: Inside `resources/views/components/footer.blade.php`. Static structure, lacks dynamic data mapping for social media.
- **Layout Shell**: `resources/views/components/layouts/app.blade.php`.
- **Settings Keys**:
  - `site_name`, `site_description`, `site_tagline`
  - `contact_address`, `contact_phone`, `contact_email`
  - `social_youtube`, `social_instagram`, `social_facebook`, `social_linkedin`

## 3. Current Problems
- Mobile navbar is just a shrunk version of the desktop menu with basic vertical links.
- Submenus on mobile are just standard dropdowns (accordion) but UX is not optimized for touch (too small padding, basic UI).
- Footer is generic and not fully utilizing the `SettingsService` for social links or proper descriptions.
- Missing clear hierarchy for active states.
- Missing semantic structure and proper transitions.

## 4. Proposed Implementation
- **Desktop Navbar**: Clean design, subtle underline for active states, semantic `<nav>`, better dropdowns using absolute positioning with fade/translate transitions.
- **Mobile Navbar**: Full screen sliding panel for the mobile menu. Nested accordion or back-button style for sub-menus. Clear touch targets.
- **Footer**: Proper grid layout for desktop, stacked layout for mobile. Use `SettingsService` for dynamic links.
- **Layout**: Keep `app.blade.php` clean. Ensure body scroll lock works properly on mobile.
- **Dependencies**: Use existing Tailwind v4 and Alpine.js. No new JS libraries.
