<x-layouts.app title="Beranda" :no-padding-top="true">
    @push('json-ld')
    <script type="application/ld+json">
    {
      "@@context": "https://schema.org",
      "@type": "EducationalOrganization",
      "name": "{{ $settings->get('site_name', 'Teknik Sepeda Motor') }}",
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
        <div id="section-profil" class="w-full scroll-mt-20 lg:scroll-mt-28">
            <x-frontend.home.intro />
        </div>
        
        <!-- 03. Statistics -->
        <x-frontend.home.statistics 
            :alumni-count="$alumniCount ?? 0"
            :partner-count="$partnerCount ?? 0"
            :achievement-count="$achievementCount ?? 0"
            :facility-count="$facilityCount ?? 0"
        />

        <!-- 04. Why TBSM -->
        <div id="section-keunggulan" class="w-full scroll-mt-20 lg:scroll-mt-28">
            <x-frontend.home.why-tbsm />
        </div>

        <!-- 05. Academic / Programs -->
        <div id="section-program" class="w-full scroll-mt-20 lg:scroll-mt-28">
            <x-frontend.home.academic :programs="$programs" />
        </div>

        <!-- 06. Facilities -->
        <div id="section-fasilitas" class="w-full scroll-mt-20 lg:scroll-mt-28">
            <x-frontend.home.facilities :facilities="$facilities" />
        </div>

        <!-- 07. Industry Partnership -->
        <div id="section-kemitraan" class="w-full scroll-mt-20 lg:scroll-mt-28">
            <x-frontend.home.partnership :partner="$partner" />
        </div>

        <!-- 08. Achievements -->
        <div id="section-prestasi" class="w-full scroll-mt-20 lg:scroll-mt-28">
            <x-frontend.home.achievements :achievements="$achievements" />
        </div>

        <!-- 09. Teachers / Instructors -->
        <div id="section-guru" class="w-full scroll-mt-20 lg:scroll-mt-28">
            <x-frontend.home.teachers :head-of-department="$headOfDepartment" :teachers="$teachers" />
        </div>

        <!-- 10. News / Information -->
        <x-frontend.home.news :latest-news="$latestNews" />

        <!-- 11. Gallery -->
        <x-frontend.home.gallery :galleries="$galleries" />

        <!-- 12. Career / Future -->
        <x-frontend.home.career :job-vacancies="$jobVacancies" />

        <!-- 13. Final CTA -->
        <x-frontend.home.final-cta />

    </main>

    <!-- Floating Scroll To Top Button (Homepage Only) -->
    <x-frontend.home.scroll-to-top />

    @push('scripts')
    <!-- The hero slider logic is included in app.js via Vite -->
    @endpush
</x-layouts.app>
