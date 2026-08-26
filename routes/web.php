<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\NewsController;
use App\Http\Controllers\Frontend\AcademicController;
use App\Http\Controllers\Frontend\AchievementController;
use App\Http\Controllers\Frontend\GalleryController;
use App\Http\Controllers\Frontend\PartnershipController;
use App\Http\Controllers\Frontend\InternshipController;
use App\Http\Controllers\Frontend\JobController;
use App\Http\Controllers\Frontend\AlumniController;
use App\Http\Controllers\Frontend\DownloadController;
use App\Http\Controllers\Frontend\SearchController;
use App\Http\Controllers\Frontend\SitemapController;

Route::get('/sitemap.xml', [SitemapController::class, 'index'])->name('sitemap');
Route::get('/robots.txt', function () {
    return response("User-agent: *\nAllow: /\nDisallow: /admin\nDisallow: /search\n\nSitemap: " . url('/sitemap.xml'), 200)
        ->header('Content-Type', 'text/plain');
});
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/search', [SearchController::class, 'index'])->middleware('throttle:60,1')->name('search');
Route::get('/tentang', [HomeController::class, 'about'])->name('about');

Route::get('/kontak', [App\Http\Controllers\Frontend\ContactController::class, 'index'])->name('contact.index');
Route::post('/kontak', [App\Http\Controllers\Frontend\ContactController::class, 'store'])->name('contact.store');
Route::get('/berita', [NewsController::class, 'index'])->name('news.index');
Route::get('/berita/{slug}', [NewsController::class, 'show'])->name('news.show');

Route::get('/pengumuman', [NewsController::class, 'announcements'])->name('announcements.index');
Route::get('/pengumuman/{slug}', [NewsController::class, 'announcementShow'])->name('announcements.show');

Route::get('/akademik/program', [AcademicController::class, 'programs'])->name('academic.programs');
Route::get('/akademik/guru', [AcademicController::class, 'teachers'])->name('academic.teachers');
Route::get('/akademik/fasilitas', [AcademicController::class, 'facilities'])->name('academic.facilities');

Route::get('/prestasi', [AchievementController::class, 'index'])->name('achievements.index');
Route::get('/prestasi/{slug}', [AchievementController::class, 'show'])->name('achievements.show');

Route::get('/galeri', [GalleryController::class, 'index'])->name('gallery.index');
Route::get('/galeri/{slug}', [GalleryController::class, 'show'])->name('gallery.show');

Route::get('/mitra-industri', [PartnershipController::class, 'index'])->name('partnership.index');
Route::get('/mitra-industri/{slug}', [PartnershipController::class, 'show'])->name('partnership.show');

Route::get('/pkl', [InternshipController::class, 'index'])->name('internships.index');
Route::get('/pkl/{id}', [InternshipController::class, 'show'])->name('internships.show');

Route::get('/lowongan', [JobController::class, 'index'])->name('jobs.index');
Route::get('/lowongan/{slug}', [JobController::class, 'show'])->name('jobs.show');

Route::get('/alumni', [AlumniController::class, 'index'])->name('alumni.index');
Route::get('/alumni/{slug}', [AlumniController::class, 'show'])->name('alumni.show');

Route::get('/unduhan', [DownloadController::class, 'index'])->name('download.index');
Route::get('/download/{slug}/file', [DownloadController::class, 'download'])->name('download.file');
