<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontendController;

Route::get('/', [FrontendController::class, 'index'])->name('home');
Route::get('/tentang', [FrontendController::class, 'about'])->name('about');
Route::get('/berita', [FrontendController::class, 'news'])->name('news.index');
Route::get('/berita/{slug}', [FrontendController::class, 'newsShow'])->name('news.show');
Route::get('/galeri', [FrontendController::class, 'gallery'])->name('gallery');
Route::get('/kemitraan', [FrontendController::class, 'partnership'])->name('partnership');
Route::get('/unduhan', [FrontendController::class, 'download'])->name('download');
