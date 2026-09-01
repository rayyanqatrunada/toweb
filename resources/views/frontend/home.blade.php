<x-layouts.app title="Beranda" :no-padding-top="true">
    @push('json-ld')
    <script type="application/ld+json">
    {
      "@@context": "https://schema.org",
      "@type": "EducationalOrganization",
      "name": "{{ $settings->get('site_name', 'TBSM') }}",
      "url": "{{ url('/') }}",
      "logo": "{{ url('/logo.png') }}"
    }
    </script>
    @endpush

    <!-- Main Auto Layout Wrapper -->
    <main class="flex flex-col items-center w-full overflow-hidden relative">
        
        <!-- 01. Hero Section -->
        <x-frontend.home.hero-slider :slides-json="$settings->get('hero_slides')" />

        <!-- 02. Introduction -->
        <x-frontend.home.intro />
        
        <!-- 03. Statistics -->
        <x-frontend.home.statistics 
            :alumni-count="$alumniCount ?? 0"
            :partner-count="$partnerCount ?? 0"
            :achievement-count="$achievementCount ?? 0"
            :facility-count="$facilityCount ?? 0"
        />

        <!-- 04. Why TBSM -->
        <x-frontend.home.why-tbsm />

        <!-- 05. Academic / Programs -->
        <x-frontend.home.academic :programs="$programs" />

        <!-- 06. Facilities -->
        <x-frontend.home.facilities :facilities="$facilities" />

        <!-- 07. Industry Partnership -->
        <x-frontend.home.partnership :partner="$partner" />

        <!-- 08. Achievements -->
        <x-frontend.home.achievements :achievements="$achievements" />

        <!-- 09. Teachers / Instructors -->
        <x-frontend.home.teachers :head-of-department="$headOfDepartment" :teachers="$teachers" />

        <!-- 10. News / Information -->
        <x-frontend.home.news :latest-news="$latestNews" />

        <!-- 11. Gallery -->
        <x-frontend.home.gallery :galleries="$galleries" />

        <!-- 12. Career / Future -->
        <x-frontend.home.career :job-vacancies="$jobVacancies" />

        <!-- 13. Final CTA -->
        <x-frontend.home.final-cta />

    </main>

    @push('scripts')
    <!-- The hero slider logic is included in app.js via Vite -->
    @endpush
</x-layouts.app>
