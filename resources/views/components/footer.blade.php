<footer class="bg-slate-900 border-t border-slate-800">
    <div class="mx-auto w-full max-w-screen-xl p-4 py-8 lg:py-12">
        <div class="md:flex md:justify-between">
          <div class="mb-6 md:mb-0 max-w-md">
              <a href="{{ route('home') }}" class="flex items-center mb-4">
                  <div class="w-8 h-8 bg-red-600 rounded flex items-center justify-center text-white font-bold mr-3 shadow-inner shadow-white/20">TO</div>
                  <span class="self-center text-2xl font-bold whitespace-nowrap text-white">{{ $settings->get('site_name', 'Teknik Otomotif') }}</span>
              </a>
              <p class="text-slate-400 text-sm leading-relaxed mb-4">
                {{ $settings->get('site_description', 'Program Keahlian Teknik Otomotif berdedikasi untuk mencetak mekanik dan ahli otomotif masa depan yang kompeten, disiplin, dan siap kerja di dunia industri modern.') }}
              </p>
          </div>
          <div class="grid grid-cols-2 gap-8 sm:gap-6 sm:grid-cols-3">
              <div>
                  <h2 class="mb-6 text-sm font-semibold text-white uppercase tracking-wider">Tautan Cepat</h2>
                  <ul class="text-slate-400 font-medium space-y-3 text-sm">
                      <li>
                          <a href="{{ route('about') }}" class="hover:text-red-400 transition-colors">Profil Akademik</a>
                      </li>
                      <li>
                          <a href="{{ route('news.index') }}" class="hover:text-red-400 transition-colors">Berita & Informasi</a>
                      </li>
                      <li>
                          <a href="{{ route('gallery.index') }}" class="hover:text-red-400 transition-colors">Galeri Kegiatan</a>
                      </li>
                  </ul>
              </div>
              <div>
                  <h2 class="mb-6 text-sm font-semibold text-white uppercase tracking-wider">Layanan</h2>
                  <ul class="text-slate-400 font-medium space-y-3 text-sm">
                      <li>
                          <a href="{{ route('jobs.index') }}" class="hover:text-red-400 transition-colors">Lowongan Kerja (BKK)</a>
                      </li>
                      <li>
                          <a href="{{ route('download.index') }}" class="hover:text-red-400 transition-colors">Unduh Dokumen</a>
                      </li>
                      <li>
                          <a href="/admin" class="hover:text-red-400 transition-colors">Portal Login</a>
                      </li>
                  </ul>
              </div>
              <div>
                  <h2 class="mb-6 text-sm font-semibold text-white uppercase tracking-wider">Kontak</h2>
                  <ul class="text-slate-400 font-medium space-y-3 text-sm">
                      <li class="flex items-start">
                          <span class="mr-2">📍</span> {{ $settings->get('contact_address', 'Jl. Pendidikan No. 1, Kota Belajar') }}
                      </li>
                      <li class="flex items-center">
                          <span class="mr-2">📞</span> {{ $settings->get('contact_phone', '(021) 123-4567') }}
                      </li>
                      <li class="flex items-center">
                          <span class="mr-2">✉️</span> {{ $settings->get('contact_email', 'info@otomotif.sch.id') }}
                      </li>
                  </ul>
              </div>
          </div>
      </div>
      <hr class="my-6 border-slate-800 sm:mx-auto lg:my-8" />
      <div class="sm:flex sm:items-center sm:justify-between">
          <span class="text-sm text-slate-500 sm:text-center">© {{ date('Y') }} <a href="/" class="hover:underline text-slate-400">{{ $settings->get('site_name', 'Teknik Otomotif') }}</a>. Hak Cipta Dilindungi.
          </span>
      </div>
    </div>
</footer>
