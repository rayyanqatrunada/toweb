<x-layouts.app title="Kontak & Lokasi">
    <div class="w-full min-h-screen bg-[#FBF8FC] pt-20 flex flex-col items-center">
        <!-- Hero Section -->
        <section class="relative w-full bg-white border-b border-[#E4E1E5] flex flex-col px-16 py-32 isolation-auto">
            <!-- Gradient Overlay -->
            <div class="absolute inset-0 bg-gradient-to-tr from-[#E4E1E5] to-transparent opacity-5 pointer-events-none"></div>
            
            <div class="max-w-[1152px] mx-auto w-full flex flex-col gap-4 relative z-10">
                <div class="flex items-center gap-2">
                    <div class="w-8 h-1 bg-[#DC2626]"></div>
                    <span class="font-['Hanken_Grotesk'] font-bold text-xs leading-none tracking-[1.2px] uppercase text-[#5F5E5E]">
                        Pusat Layanan
                    </span>
                </div>
                
                <h1 class="font-['Chivo'] font-bold text-[40px] leading-[48px] tracking-tight text-[#1B1B1E]">
                    Kontak & Lokasi
                </h1>
                
                <p class="font-['Hanken_Grotesk'] text-lg leading-[29px] text-[#5C403C] max-w-[672px] mt-1">
                    Hubungi departemen Teknik dan Bisnis Sepeda Motor SMK Negeri 1 Bangsri untuk informasi akademik, kemitraan industri, atau pertanyaan umum. Kami siap membantu Anda.
                </p>
            </div>
        </section>

        <!-- Main Content Grid -->
        <section class="max-w-[1152px] w-full mx-auto py-24 px-16 lg:px-0">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">
                
                <!-- Left Column (Contact Info & Map) - 7 cols on LG -->
                <div class="lg:col-span-7 flex flex-col gap-12">
                    
                    <!-- Contact Details Card -->
                    <div class="bg-white border border-[#E4E1E5] p-8 flex flex-col gap-8 shadow-sm">
                        <!-- Heading -->
                        <div class="flex items-center gap-3">
                            <div class="w-[17px] h-[20px] text-[#DC2626]">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-full h-full"><path d="M11.645 20.91l-.007-.003-.022-.012a15.247 15.247 0 01-.383-.218 25.18 25.18 0 01-4.244-3.17C4.688 15.36 2.25 12.174 2.25 8.25 2.25 5.322 4.714 3 8.25 3c3.536 0 6 2.322 6 5.25 0 3.924-2.438 7.111-4.739 9.256a25.175 25.175 0 01-4.244 3.17 15.247 15.247 0 01-.383.219l-.022.012-.007.004-.003.001a.752.752 0 01-.704 0l-.003-.001z" /><path fill-rule="evenodd" d="M8.25 10.5a2.25 2.25 0 100-4.5 2.25 2.25 0 000 4.5z" clip-rule="evenodd" /></svg>
                            </div>
                            <h2 class="font-['Chivo'] font-bold text-2xl text-[#1B1B1E]">Informasi Kontak</h2>
                        </div>
                        
                        <!-- List -->
                        <div class="flex flex-col">
                            
                            <!-- Address -->
                            <div class="flex items-start gap-4 pb-6 border-b border-[#E4E1E5]">
                                <div class="mt-1 text-[#5F5E5E]">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" /></svg>
                                </div>
                                <div class="flex flex-col gap-2">
                                    <span class="font-['Hanken_Grotesk'] font-bold text-xs tracking-[1.2px] uppercase text-[#5F5E5E]">Alamat Kantor</span>
                                    <span class="font-['Hanken_Grotesk'] text-base leading-6 text-[#1B1B1E]">Jl. KH. Achmad Fauzan No. 17<br>Bangsri, Jepara<br>Jawa Tengah, 59453</span>
                                </div>
                            </div>
                            
                            <!-- Phone -->
                            <div class="flex items-start gap-4 py-6 border-b border-[#E4E1E5]">
                                <div class="mt-1 text-[#5F5E5E]">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-2.896-1.596-5.48-4.08-7.074-6.97l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z" /></svg>
                                </div>
                                <div class="flex flex-col gap-2">
                                    <span class="font-['Hanken_Grotesk'] font-bold text-xs tracking-[1.2px] uppercase text-[#5F5E5E]">Telepon</span>
                                    <span class="font-['Hanken_Grotesk'] text-base leading-6 text-[#1B1B1E]">0291 771337</span>
                                </div>
                            </div>
                            
                            <!-- Email -->
                            <div class="flex items-start gap-4 py-6 border-b border-[#E4E1E5]">
                                <div class="mt-1 text-[#5F5E5E]">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" /></svg>
                                </div>
                                <div class="flex flex-col gap-2 relative">
                                    <span class="font-['Hanken_Grotesk'] font-bold text-xs tracking-[1.2px] uppercase text-[#5F5E5E]">Email</span>
                                    <a href="mailto:otomotif@smkn1bangsri.sch.id" class="font-['Hanken_Grotesk'] text-base leading-6 text-[#B70011] relative inline-block group">
                                        otomotif@smkn1bangsri.sch.id
                                        <span class="absolute left-0 -bottom-1 w-full h-[2px] bg-[#DC2626] transform scale-x-0 group-hover:scale-x-100 transition-transform origin-left"></span>
                                    </a>
                                </div>
                            </div>

                            <!-- Jam Operasional -->
                            <div class="flex items-start gap-4 pt-6">
                                <div class="mt-1 text-[#5F5E5E]">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                                </div>
                                <div class="flex flex-col gap-2">
                                    <span class="font-['Hanken_Grotesk'] font-bold text-xs tracking-[1.2px] uppercase text-[#5F5E5E]">Jam Operasional</span>
                                    <span class="font-['Hanken_Grotesk'] text-base leading-6 text-[#1B1B1E]">Senin - Jumat: 07:00 - 15:30 WIB</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Location Map -->
                    <div class="flex flex-col gap-6">
                        <div class="flex items-center gap-3">
                            <div class="w-[18px] h-[18px] text-[#DC2626]">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-full h-full"><path d="M11.645 20.91l-.007-.003-.022-.012a15.247 15.247 0 01-.383-.218 25.18 25.18 0 01-4.244-3.17C4.688 15.36 2.25 12.174 2.25 8.25 2.25 5.322 4.714 3 8.25 3c3.536 0 6 2.322 6 5.25 0 3.924-2.438 7.111-4.739 9.256a25.175 25.175 0 01-4.244 3.17 15.247 15.247 0 01-.383.219l-.022.012-.007.004-.003.001a.752.752 0 01-.704 0l-.003-.001z" /><path fill-rule="evenodd" d="M8.25 10.5a2.25 2.25 0 100-4.5 2.25 2.25 0 000 4.5z" clip-rule="evenodd" /></svg>
                            </div>
                            <h2 class="font-['Chivo'] font-bold text-2xl text-[#1B1B1E]">Lokasi Kami</h2>
                        </div>

                        <div class="w-full h-[320px] bg-[#F0EDF1] border border-[#E4E1E5] relative p-[1px]">
                            <!-- Google Maps iframe -->
                            <iframe 
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3963.8115664421886!2d110.72856427499308!3d-6.532853293459958!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e71239c0fa46445%3A0xc3910c0e5a6104f2!2sSMK%20Negeri%201%20Bangsri!5e0!3m2!1sen!2sid!4v1700000000000!5m2!1sen!2sid" 
                                class="w-full h-full grayscale-[20%] opacity-90 contrast-125" 
                                style="border:0;" 
                                allowfullscreen="" 
                                loading="lazy" 
                                referrerpolicy="no-referrer-when-downgrade">
                            </iframe>
                            
                            <!-- Custom Pin Overlay (Optional, keeping simple iframe for true functionality) -->
                            <!-- <div class="absolute inset-0 flex items-center justify-center pointer-events-none">
                                <div class="bg-white border border-[#DC2626] shadow-sm flex flex-col items-center p-3 w-[106px]">
                                    <div class="text-[#DC2626] w-4 h-5"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-full h-full"><path fill-rule="evenodd" d="M11.54 22.351l.07.04.028.016a.76.76 0 00.723 0l.028-.015.071-.041a16.975 16.975 0 001.144-.742 19.58 19.58 0 002.683-2.282c1.944-1.99 3.963-4.98 3.963-8.827a8.25 8.25 0 00-16.5 0c0 3.846 2.02 6.837 3.963 8.827a19.58 19.58 0 002.682 2.282 16.975 16.975 0 001.145.742zM12 13.5a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd" /></svg></div>
                                    <span class="font-['Hanken_Grotesk'] font-bold text-[10px] leading-snug tracking-wider text-[#1B1B1E] uppercase text-center mt-1">SMKN 1 Bangsri</span>
                                </div>
                            </div> -->
                        </div>
                    </div>
                </div>

                <!-- Right Column (Contact Form) - 5 cols on LG -->
                <div class="lg:col-span-5">
                    <div class="bg-white border border-[#E4E1E5] p-8 shadow-sm">
                        
                        <div class="flex flex-col gap-2 mb-8 relative z-10">
                            <h2 class="font-['Chivo'] font-bold text-2xl text-[#1B1B1E]">Kirim Pesan</h2>
                            <p class="font-['Hanken_Grotesk'] text-base leading-6 text-[#5C403C]">
                                Silakan isi formulir di bawah ini untuk mengirimkan pertanyaan atau masukan.
                            </p>
                            <!-- Background decoration -->
                            <div class="absolute -right-8 -top-8 w-24 h-24 bg-[#E4E1E5] opacity-30 transform rotate-45 -z-10 overflow-hidden hidden sm:block"></div>
                        </div>

                        <!-- Alerts -->
                        @if (session('success'))
                            <div class="mb-6 bg-green-50 border border-green-200 text-green-700 px-4 py-3 relative" role="alert">
                                <span class="block sm:inline font-['Hanken_Grotesk']">{{ session('success') }}</span>
                            </div>
                        @endif

                        <form action="{{ route('contact.store') }}" method="POST" class="flex flex-col gap-6 relative z-10">
                            @csrf
                            
                            <!-- Name -->
                            <div class="flex flex-col gap-2">
                                <label for="name" class="font-['Hanken_Grotesk'] font-bold text-xs uppercase tracking-[1.2px] text-[#1B1B1E]">Nama Lengkap</label>
                                <input type="text" name="name" id="name" required placeholder="Masukkan nama Anda" 
                                    class="w-full bg-[#F5F3F6] border border-[#E4E1E5] p-3 text-base font-['Hanken_Grotesk'] text-[#1B1B1E] placeholder:text-[#6B7280] focus:outline-none focus:border-[#DC2626] focus:bg-white transition-colors"
                                    value="{{ old('name') }}">
                                @error('name') <span class="text-xs text-red-500 font-['Hanken_Grotesk']">{{ $message }}</span> @enderror
                            </div>

                            <!-- Email -->
                            <div class="flex flex-col gap-2">
                                <label for="email" class="font-['Hanken_Grotesk'] font-bold text-xs uppercase tracking-[1.2px] text-[#1B1B1E]">Email Aktif</label>
                                <input type="email" name="email" id="email" required placeholder="contoh@email.com" 
                                    class="w-full bg-[#F5F3F6] border border-[#E4E1E5] p-3 text-base font-['Hanken_Grotesk'] text-[#1B1B1E] placeholder:text-[#6B7280] focus:outline-none focus:border-[#DC2626] focus:bg-white transition-colors"
                                    value="{{ old('email') }}">
                                @error('email') <span class="text-xs text-red-500 font-['Hanken_Grotesk']">{{ $message }}</span> @enderror
                            </div>

                            <!-- Subject -->
                            <div class="flex flex-col gap-2">
                                <label for="subject" class="font-['Hanken_Grotesk'] font-bold text-xs uppercase tracking-[1.2px] text-[#1B1B1E]">Subjek / Keperluan</label>
                                <div class="relative">
                                    <select name="subject" id="subject" 
                                        class="w-full bg-[#F5F3F6] border border-[#E4E1E5] p-3 text-base font-['Hanken_Grotesk'] text-[#1B1B1E] focus:outline-none focus:border-[#DC2626] focus:bg-white transition-colors appearance-none cursor-pointer">
                                        <option value="" disabled {{ old('subject') ? '' : 'selected' }}>Pilih Keperluan</option>
                                        <option value="Informasi Akademik" {{ old('subject') == 'Informasi Akademik' ? 'selected' : '' }}>Informasi Akademik</option>
                                        <option value="Kemitraan Industri" {{ old('subject') == 'Kemitraan Industri' ? 'selected' : '' }}>Kemitraan Industri</option>
                                        <option value="Pertanyaan Umum" {{ old('subject') == 'Pertanyaan Umum' ? 'selected' : '' }}>Pertanyaan Umum</option>
                                        <option value="Lainnya" {{ old('subject') == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                                    </select>
                                    <div class="absolute inset-y-0 right-0 flex items-center px-4 pointer-events-none text-[#6B7280]">
                                        <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" fill-rule="evenodd"></path></svg>
                                    </div>
                                </div>
                                @error('subject') <span class="text-xs text-red-500 font-['Hanken_Grotesk']">{{ $message }}</span> @enderror
                            </div>

                            <!-- Message -->
                            <div class="flex flex-col gap-2">
                                <label for="message" class="font-['Hanken_Grotesk'] font-bold text-xs uppercase tracking-[1.2px] text-[#1B1B1E]">Pesan</label>
                                <textarea name="message" id="message" required rows="5" placeholder="Tuliskan pesan Anda di sini..." 
                                    class="w-full bg-[#F5F3F6] border border-[#E4E1E5] p-3 text-base font-['Hanken_Grotesk'] text-[#1B1B1E] placeholder:text-[#6B7280] focus:outline-none focus:border-[#DC2626] focus:bg-white transition-colors resize-y min-h-[120px]"
                                >{{ old('message') }}</textarea>
                                @error('message') <span class="text-xs text-red-500 font-['Hanken_Grotesk']">{{ $message }}</span> @enderror
                            </div>

                            <!-- Submit Button -->
                            <button type="submit" class="w-full bg-[#DC2626] hover:bg-[#B70011] transition-colors py-4 flex flex-row items-center justify-center gap-2 mt-2 group">
                                <span class="font-['Hanken_Grotesk'] font-bold text-xs uppercase tracking-[1.2px] text-white">Kirim Pesan</span>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4 text-white transform group-hover:translate-x-1 transition-transform">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75" />
                                </svg>
                            </button>
                        </form>
                    </div>
                </div>
                
            </div>
        </section>

        <!-- Social Media Banner -->
        <section class="w-full bg-[#F5F3F6] border-t border-[#E4E1E5]">
            <div class="max-w-[1280px] mx-auto py-12 px-16 flex flex-col md:flex-row justify-between items-center gap-8">
                <div class="flex flex-col gap-2">
                    <h3 class="font-['Chivo'] font-bold text-2xl text-[#1B1B1E]">Terhubung dengan Kami</h3>
                    <p class="font-['Hanken_Grotesk'] text-base text-[#5C403C]">Ikuti perkembangan terbaru departemen Teknik dan Bisnis Sepeda Motor (TBSM).</p>
                </div>
                
                <div class="flex items-center gap-4">
                    <!-- Instagram -->
                    <a href="#" class="w-12 h-12 bg-white border border-[#E4E1E5] flex items-center justify-center text-[#1B1B1E] hover:bg-gray-50 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg>
                    </a>
                    <!-- Facebook -->
                    <a href="#" class="w-12 h-12 bg-white border border-[#E4E1E5] flex items-center justify-center text-[#1B1B1E] hover:bg-gray-50 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path></svg>
                    </a>
                    <!-- Youtube -->
                    <a href="#" class="w-12 h-12 bg-white border border-[#E4E1E5] flex items-center justify-center text-[#1B1B1E] hover:bg-gray-50 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22.54 6.42a2.78 2.78 0 0 0-1.94-2C18.88 4 12 4 12 4s-6.88 0-8.6.46a2.78 2.78 0 0 0-1.94 2A29 29 0 0 0 1 11.75a29 29 0 0 0 .46 5.33A2.78 2.78 0 0 0 3.4 19c1.72.46 8.6.46 8.6.46s6.88 0 8.6-.46a2.78 2.78 0 0 0 1.94-2 29 29 0 0 0 .46-5.25 29 29 0 0 0-.46-5.33z"></path><polygon points="9.75 15.02 15.5 11.75 9.75 8.48 9.75 15.02"></polygon></svg>
                    </a>
                </div>
            </div>
        </section>
    </div>
</x-layouts.app>
