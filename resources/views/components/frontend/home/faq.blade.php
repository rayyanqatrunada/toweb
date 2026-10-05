@php
    $faqsJson = $settings->get('homepage_faqs');
    $faqs = $faqsJson ? json_decode($faqsJson, true) : null;
    if (empty($faqs)) {
        $faqs = \App\Filament\Pages\ManageHeroSlider::getDefaultFaqs();
    }
    // Filter active items
    $activeFaqs = collect($faqs)->filter(fn($item) => ($item['is_active'] ?? true))->values();
    $faqBadge = $settings->get('faq_badge', 'TANYA JAWAB UMUM');
    $faqTitle = $settings->get('faq_title', 'Pertanyaan yang Sering Diajukan');
    $faqSubtitle = $settings->get('faq_subtitle', 'Temukan jawaban lengkap seputar kurikulum, fasilitas praktik, kemitraan Astra Honda Motor, dan prospek karir di TBSM SMKN 1 Bangsri.');
@endphp

@push('json-ld')
@if($activeFaqs->isNotEmpty())
<script type="application/ld+json">
{
  "@@context": "https://schema.org",
  "@@type": "FAQPage",
  "mainEntity": [
    @foreach($activeFaqs as $i => $item)
    {
      "@@type": "Question",
      "name": {{ json_encode($item['question']) }},
      "acceptedAnswer": {
        "@@type": "Answer",
        "text": {{ json_encode($item['answer']) }}
      }
    }{{ $loop->last ? '' : ',' }}
    @endforeach
  ]
}
</script>
@endif
@endpush

@if($activeFaqs->isNotEmpty())
    <section id="section-faq" class="w-full bg-[#FBF8FC] py-8 sm:py-10 md:py-12 lg:py-12 border-t border-[#E4E1E5] relative overflow-hidden scroll-mt-20">
        <!-- Subtle Background Decorative Grid & Accents -->
        <div class="absolute inset-0 pointer-events-none opacity-40 bg-[linear-gradient(90deg,#E4E4E7_4.17%,transparent_4.17%),linear-gradient(180deg,#E4E4E7_4.17%,transparent_4.17%)] bg-[length:24px_24px]"></div>
        <div class="absolute top-0 right-0 w-96 h-96 bg-red-500/5 rounded-full blur-3xl pointer-events-none -mr-32 -mt-32"></div>
        <div class="absolute bottom-0 left-0 w-96 h-96 bg-charcoal-500/5 rounded-full blur-3xl pointer-events-none -ml-32 -mb-32"></div>

        <div class="max-w-[1440px] mx-auto px-5 sm:px-8 md:px-12 lg:px-16 relative z-10">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 lg:gap-8 xl:gap-10 items-start">
                
                <!-- Left Column: Section Title & Help Card -->
                <div class="lg:col-span-5 reveal-on-scroll reveal-up">
                    <div class="sticky top-24">
                        <div class="flex items-center gap-2 sm:gap-2.5 mb-2 sm:mb-2.5">
                            <div class="w-6 sm:w-8 h-[2px] bg-figma-red"></div>
                            <span class="font-sans font-bold text-[11px] sm:text-xs leading-none tracking-[1.5px] sm:tracking-[2px] text-figma-red uppercase">
                                {{ $faqBadge }}
                            </span>
                        </div>

                        <h2 class="font-heading font-extrabold text-xl sm:text-2xl lg:text-[30px] xl:text-[32px] leading-tight tracking-tight text-charcoal-900 mb-2.5 sm:mb-3">
                            {{ $faqTitle }}
                        </h2>

                        <p class="font-sans text-xs sm:text-sm text-charcoal-600 leading-relaxed mb-4 sm:mb-5">
                            {{ $faqSubtitle }}
                        </p>

                        <!-- Help Box Card -->
                        <div class="p-4 sm:p-4.5 bg-white border border-[#E4E1E5] rounded-[2px] shadow-xs relative overflow-hidden">
                            <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-primary-600 to-red-500"></div>
                            
                            <div class="flex items-start gap-3 sm:gap-3.5 mb-3 sm:mb-3.5">
                                <div class="w-8 h-8 sm:w-9 sm:h-9 rounded-full bg-red-50 text-primary-600 flex items-center justify-center shrink-0">
                                    <svg class="w-4 h-4 sm:w-4.5 sm:h-4.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="font-heading font-bold text-sm sm:text-base text-charcoal-900 mb-0.5">
                                        Punya Pertanyaan Lain?
                                    </h3>
                                    <p class="font-sans text-xs text-charcoal-600 leading-normal sm:leading-relaxed">
                                        Tim instruktur dan administrasi jurusan TBSM siap membantu memberikan informasi lebih lanjut.
                                    </p>
                                </div>
                            </div>

                            <div class="flex flex-col sm:flex-row items-center gap-2 sm:gap-2.5 pt-1">
                                <a href="{{ route('contact.index') }}" class="w-full sm:w-auto inline-flex items-center justify-center px-4 py-2 bg-charcoal-900 hover:bg-primary-600 text-white font-sans font-bold text-[11px] sm:text-xs uppercase tracking-wider rounded-[2px] transition-colors duration-200">
                                    <span>Kirim Pesan</span>
                                    <svg class="w-3 h-3 sm:w-3.5 sm:h-3.5 ml-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                                    </svg>
                                </a>
                                @if($settings->get('contact_phone'))
                                    @php
                                        $cleanPhone = preg_replace('/[^0-9]/', '', $settings->get('contact_phone'));
                                        if (str_starts_with($cleanPhone, '0')) {
                                            $cleanPhone = '62' . substr($cleanPhone, 1);
                                        }
                                    @endphp
                                    <a href="https://wa.me/{{ $cleanPhone }}?text=Halo%20Admin%20TBSM%20SMKN%201%20Bangsri,%20saya%20ingin%20bertanya%20seputar%20jurusan." target="_blank" rel="noopener noreferrer" class="w-full sm:w-auto inline-flex items-center justify-center px-3.5 py-2 bg-emerald-50 hover:bg-emerald-100 text-emerald-700 font-sans font-bold text-[11px] sm:text-xs uppercase tracking-wider rounded-[2px] border border-emerald-200 transition-colors duration-200">
                                        <svg class="w-3.5 h-3.5 mr-1.5 text-emerald-600" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.711 2.598 2.664-.698c.995.545 1.968.835 2.802.835 3.181 0 5.767-2.586 5.768-5.766 0-3.18-2.587-5.766-5.768-5.766zm3.376 8.205c-.141.396-.714.729-1.021.777-.308.047-.698.077-1.127-.061-.322-.104-.737-.247-1.282-.483-2.285-.989-3.771-3.324-3.886-3.477-.114-.153-.929-1.236-.929-2.357 0-1.121.587-1.673.796-1.902.209-.23.456-.288.608-.288.152 0 .304.002.437.008.141.006.329-.054.515.392.193.466.66 1.611.718 1.728.058.117.097.254.02.408-.076.153-.114.249-.228.383-.114.134-.24.299-.343.402-.114.114-.233.238-.101.465.132.227.587.969 1.258 1.567.863.769 1.592 1.008 1.82 1.122.228.114.362.096.496-.057.134-.153.573-.669.726-.899.153-.23.305-.192.514-.115.209.077 1.332.628 1.56.743.228.115.38.172.437.269.057.096.057.556-.084.952z"/>
                                        </svg>
                                        <span>WhatsApp</span>
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Column: Accordion Items with Silky Smooth Animation -->
                <div class="lg:col-span-7 reveal-on-scroll reveal-up delay-100">
                    <div x-data="{ activeFaq: 0 }" class="space-y-2.5 sm:space-y-3">
                        @foreach($activeFaqs as $index => $faq)
                            <div 
                                class="border rounded-[2px] transition-all duration-300 overflow-hidden bg-white"
                                :class="activeFaq === {{ $index }} 
                                    ? 'border-primary-500/50 shadow-md ring-1 ring-primary-500/20' 
                                    : 'border-[#E4E1E5] hover:border-charcoal-300 shadow-xs'"
                            >
                                <button 
                                    type="button"
                                    @click="activeFaq = (activeFaq === {{ $index }} ? null : {{ $index }})"
                                    :aria-expanded="activeFaq === {{ $index }} ? 'true' : 'false'"
                                    aria-controls="faq-collapse-{{ $index }}"
                                    class="w-full flex items-center justify-between py-3 px-4 sm:py-3.5 sm:px-5 lg:py-3.5 lg:px-4.5 text-left transition-colors duration-200 group focus:outline-none focus-visible:ring-2 focus-visible:ring-primary-500"
                                >
                                    <div class="flex flex-col sm:flex-row sm:items-center gap-1.5 sm:gap-3 pr-3 flex-1">
                                        @if(!empty($faq['badge']))
                                            <span 
                                                class="inline-flex items-center px-2 py-0.5 rounded-[2px] text-[10px] sm:text-[10.5px] font-bold uppercase tracking-wider w-fit shrink-0 transition-all duration-300"
                                                :class="activeFaq === {{ $index }} 
                                                    ? 'bg-primary-600 text-white font-black shadow-xs' 
                                                    : 'bg-charcoal-100 text-charcoal-600 group-hover:bg-charcoal-200'"
                                            >
                                                {{ $faq['badge'] }}
                                            </span>
                                        @endif
                                        <span 
                                            class="font-heading font-bold text-sm sm:text-[15px] lg:text-base text-charcoal-900 transition-colors duration-200 leading-snug"
                                            :class="activeFaq === {{ $index }} ? 'text-primary-700' : 'group-hover:text-primary-600'"
                                        >
                                            {{ $faq['question'] }}
                                        </span>
                                    </div>
                                    
                                    <!-- Smooth Rotating Indicator Icon -->
                                    <span 
                                        class="shrink-0 ml-2 w-7 h-7 sm:w-7.5 sm:h-7.5 rounded-full flex items-center justify-center transition-all duration-300 ease-[cubic-bezier(0.4,0,0.2,1)]"
                                        :class="activeFaq === {{ $index }} 
                                            ? 'rotate-180 bg-primary-50 text-primary-600 ring-2 ring-primary-500/20' 
                                            : 'rotate-0 bg-charcoal-100 text-charcoal-500 group-hover:bg-charcoal-200 group-hover:text-charcoal-800'"
                                    >
                                        <svg class="w-3.5 h-3.5 transition-transform duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7" />
                                        </svg>
                                    </span>
                                </button>

                                <!-- Silky Smooth Expanding Content via CSS Grid Transition -->
                                <div 
                                    id="faq-collapse-{{ $index }}"
                                    class="grid transition-all duration-300 ease-[cubic-bezier(0.4,0,0.2,1)] overflow-hidden"
                                    :class="activeFaq === {{ $index }} 
                                        ? 'grid-rows-[1fr] opacity-100' 
                                        : 'grid-rows-[0fr] opacity-0'"
                                >
                                    <div class="overflow-hidden min-h-0">
                                        <div class="px-4 pb-4 pt-2.5 sm:px-5 sm:pb-4 sm:pt-2.5 lg:px-4.5 text-charcoal-700 text-xs sm:text-[13.5px] lg:text-sm leading-relaxed border-t border-dashed border-charcoal-200 font-sans">
                                            {{ $faq['answer'] }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>
    </section>
@endif
