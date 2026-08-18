# SEO & Accessibility Optimization Report

## Overview
This document summarizes the changes made during STEP 10G to improve the Search Engine Optimization (SEO) and web accessibility (A11y) for the TOWEB project. The goal was to ensure the website is easily discoverable by search engines and fully accessible to all users without compromising the existing UI/UX and backend structures.

## 1. SEO Enhancements

### Dynamic Meta Tags
- Introduced customizable Open Graph (`og:*`) and Twitter Card (`twitter:*`) metadata tags into the main layout (`resources/views/components/layouts/app.blade.php`).
- Pages like News Detail (`news.show`) and Achievement Detail (`achievements.show`) now inject their specific titles, descriptions, and feature images into the global layout component.

### Structured Data (JSON-LD)
- Added a `@stack('json-ld')` to the `<head>` in `app.blade.php` to allow pages to inject structured data dynamically.
- Implemented `EducationalOrganization` and `WebSite` JSON-LD schemas in `home.blade.php`.
- Implemented `NewsArticle` schema for news details and `Article` schema for achievements details.

### Sitemap & Robots.txt
- Created `SitemapController` to dynamically generate a `/sitemap.xml` listing public pages, including dynamic routes like published news articles and achievements. Draft items are intentionally excluded.
- The `robots.txt` specifies `Disallow: /admin` and `Disallow: /search`, ensuring internal administrative areas and global search result pages remain unindexed.
- Applied `<meta name="robots" content="noindex, nofollow">` for the search results page to prevent duplication and indexing of query strings.

## 2. Web Accessibility (A11y) Improvements

### Semantic Layouts & Navigation
- Added a "Skip to main content" link on the `app.blade.php` layout for screen reader users to jump directly to the `#main-content` section.
- Embedded reusable breadcrumbs (`resources/views/components/frontend/breadcrumbs.blade.php`) to enhance navigational clarity. These breadcrumbs utilize the `<nav aria-label="Breadcrumb">` wrapper and provide accessible structural hints.

### Interactive Components
- **Global Search Modal:** Applied `aria-hidden`, `aria-labelledby`, and `aria-expanded` attributes on the search dialog (`global-search-modal.blade.php`) to correctly announce its state to screen readers.
- **Navbar:** The mobile menu toggle button was augmented with `aria-expanded` and `aria-controls` properties for improved mobile usability.

## 3. Testing & Verification
- Developed `tests/Feature/SeoTest.php` to programmatically assert the accessibility of `robots.txt` and `sitemap.xml`.
- Tests assert the correct exclusion of draft statuses in XML generation.
- Full regression suite was executed successfully (56 tests passed, 140 assertions).

All changes are fully backward-compatible with the pre-existing logic and routing.
