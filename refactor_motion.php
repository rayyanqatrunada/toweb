<?php
$file = 'resources/views/frontend/home.blade.php';
$content = file_get_contents($file);

// 1. Hero Text Reveal
$content = preg_replace('/<h1 class="(.*?)"(.*?)>/', '<h1 class="$1 reveal-on-scroll reveal-up"$2>', $content);
$content = preg_replace('/<p class="text-lg md:text-xl text-red-100 mb-8 max-w-2xl"/', '<p class="text-lg md:text-xl text-red-100 mb-8 max-w-2xl reveal-on-scroll reveal-up delay-100"', $content);

// 2. Section Headers Reveal
$content = str_replace('<h2 class="text-3xl md:text-5xl font-extrabold text-slate-900', '<h2 class="text-3xl md:text-5xl font-extrabold text-slate-900 reveal-on-scroll reveal-up', $content);
$content = preg_replace('/<p class="text-lg text-slate-500(.*?)">/', '<p class="text-lg text-slate-500 reveal-on-scroll reveal-up delay-100$1">', $content);

// 3. Stagger on common grids (e.g., Alumni cards, News cards)
// Let's add hover styles to cards if not present
$content = str_replace('group flex flex-col sm:flex-row lg:flex-col gap-4 bg-slate-800/80 hover:bg-slate-800 rounded-2xl p-4 transition-colors', 'group flex flex-col sm:flex-row lg:flex-col gap-4 bg-slate-800/80 hover:bg-slate-800 rounded-2xl p-4 transition-all duration-300 hover:-translate-y-1', $content);

$content = str_replace('block bg-white p-5 rounded-xl shadow-sm border border-slate-200 hover:border-red-300 hover:shadow-md transition-all group', 'block bg-white p-5 rounded-xl shadow-sm border border-slate-200 hover:border-red-300 hover:shadow-md transition-all duration-300 hover:-translate-y-1 group reveal-on-scroll reveal-up', $content);

file_put_contents($file, $content);
echo "Updated home.blade.php\n";
