<x-layouts.app title="Teknik Otomotif & Sepeda Motor (TBSM) SMKN 1 Bangsri - Binaan Resmi AHM" :no-padding-top="true">
    @push('json-ld')
    <script type="application/ld+json">
    {
      "@@context": "https://schema.org",
      "@@graph": [
        {
          "@@type": "EducationalOrganization",
          "@@id": "{{ url('/') }}#organization",
          "name": "{{ $settings->get('site_name', 'Teknik dan Bisnis Sepeda Motor SMKN 1 Bangsri') }}",
          "alternateName": [
            "Teknik Otomotif SMKN 1 Bangsri",
            "Teknik Sepeda Motor SMKN 1 Bangsri",
            "TBSM SMKN 1 Bangsri",
            "TSM SMKN 1 Bangsri",
            "TBSM SMK Negeri 1 Bangsri"
          ],
          "url": "{{ url('/') }}",
          "logo": {
            "@@type": "ImageObject",
            "url": "{{ $settings->get('site_logo') ? Storage::url($settings->get('site_logo')) : url('/logo.png') }}"
          },
          "description": "{{ $settings->get('site_description') }}",
          "address": {
            "@@type": "PostalAddress",
            "streetAddress": "{{ $settings->get('contact_address', 'JL. KH. Achmad Fauzan No. 17') }}",
            "addressLocality": "Bangsri",
            "addressRegion": "Jawa Tengah",
            "postalCode": "59453",
            "addressCountry": "ID"
          },
          "telephone": "{{ $settings->get('contact_phone', '082323429052') }}",
          "email": "{{ $settings->get('contact_email', 'smkn1bangsri@yahoo.co.id') }}",
          "sameAs": [
            "{{ $settings->get('social_instagram') ?: 'https://instagram.com/' }}",
            "{{ $settings->get('social_youtube') ?: 'https://youtube.com/' }}",
            "{{ $settings->get('social_facebook') ?: 'https://facebook.com/' }}"
          ],
          "parentOrganization": {
            "@@type": "School",
            "name": "SMK Negeri 1 Bangsri",
            "url": "https://smkn1bangsri.sch.id"
          },
          "sponsor": {
            "@@type": "Organization",
            "name": "PT Astra Honda Motor",
            "alternateName": "AHM"
          }
        },
        {
          "@@type": "WebSite",
          "@@id": "{{ url('/') }}#website",
          "url": "{{ url('/') }}",
          "name": "{{ $settings->get('site_short_name', 'TBSM SMKN 1 Bangsri') }}",
          "description": "{{ $settings->get('site_description') }}",
          "publisher": {
            "@@id": "{{ url('/') }}#organization"
          },
          "inLanguage": "id-ID"
        }
      ]
    }
    </script>
    @endpush

    <!-- Main Auto Layout Wrapper -->
    <div class="flex flex-col items-center w-full overflow-hidden relative">
        <h1 class="sr-only">Teknik Otomotif &amp; Sepeda Motor (TBSM) SMK Negeri 1 Bangsri - Binaan Resmi PT Astra Honda Motor</h1>
        
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

        <!-- 13. Frequently Asked Questions (FAQ) -->
        <x-frontend.home.faq />

        <!-- 14. Final CTA -->
        <x-frontend.home.final-cta />

    </div>

    <!-- Floating Scroll To Top Button (Homepage Only) -->
    <x-frontend.home.scroll-to-top />

    @push('scripts')
    <!-- The hero slider logic is included in app.js via Vite -->
    @endpush
</x-layouts.app>
