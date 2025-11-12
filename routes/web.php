<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\PostController;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Facades\Route;
use Carbon\Carbon;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/portfolio', function() {
    return view('portfolio');
})->name('portfolio');
Route::get('/portfolio/{category:slug}', [PortfolioController::class, 'index'])->name('portfolio.category');

Route::get('/about', function() {
    return view('about');
})->name('about');

Route::get('/blog', [PostController::class, 'index'])->name('blog.index');
Route::get('/blog/{slug}', [PostController::class, 'show'])->name('blog.show');

Route::get('/contact', function() {
    return view('contact');
})->name('contact');