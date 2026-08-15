<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontendController;

Route::get('/', [FrontendController::class, 'index'])->name('home');
Route::get('/search', [FrontendController::class, 'search'])->middleware('throttle:60,1')->name('search');
Route::get('/tentang', [FrontendController::class, 'about'])->name('about');

Route::get('/berita', [FrontendController::class, 'news'])->name('news.index');
Route::get('/berita/{slug}', [FrontendController::class, 'newsShow'])->name('news.show');

Route::get('/pengumuman', [FrontendController::class, 'announcements'])->name('announcements.index');
Route::get('/pengumuman/{slug}', [FrontendController::class, 'announcementShow'])->name('announcements.show');

Route::get('/akademik/program', [FrontendController::class, 'programs'])->name('academic.programs');
Route::get('/akademik/guru', [FrontendController::class, 'teachers'])->name('academic.teachers');
Route::get('/akademik/fasilitas', [FrontendController::class, 'facilities'])->name('academic.facilities');

Route::get('/prestasi', [FrontendController::class, 'achievements'])->name('achievements.index');
Route::get('/prestasi/{slug}', [FrontendController::class, 'achievementShow'])->name('achievements.show');

Route::get('/galeri', [FrontendController::class, 'gallery'])->name('gallery.index');
Route::get('/galeri/{slug}', [FrontendController::class, 'galleryShow'])->name('gallery.show');

Route::get('/mitra-industri', [FrontendController::class, 'partnership'])->name('partnership.index');
Route::get('/mitra-industri/{slug}', [FrontendController::class, 'partnershipShow'])->name('partnership.show');

Route::get('/pkl', [FrontendController::class, 'internships'])->name('internships.index');
Route::get('/pkl/{slug}', [FrontendController::class, 'internshipShow'])->name('internships.show');

Route::get('/lowongan', [FrontendController::class, 'jobVacancies'])->name('jobs.index');
Route::get('/lowongan/{slug}', [FrontendController::class, 'jobVacancyShow'])->name('jobs.show');

Route::get('/alumni', [FrontendController::class, 'alumni'])->name('alumni.index');
Route::get('/alumni/{slug}', [FrontendController::class, 'alumniShow'])->name('alumni.show');

Route::get('/unduhan', [FrontendController::class, 'download'])->name('download.index');
Route::get('/download/{slug}/file', [FrontendController::class, 'downloadFile'])->name('download.file');
