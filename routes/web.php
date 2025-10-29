<?php

use App\Http\Controllers\PortfolioController;
use App\Models\Category;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // index oldalon megjelenítendő elemek ha lesz ilyen
    return view('index');
})->name('home');

// ha lesz külön ilyen oldal
Route::get('/portfolio', function() {
    return view('portfolio');
})->name('portfolio');

Route::get('/portfolio/{category:slug}', [PortfolioController::class, 'index'])->name('portfolio.category');

Route::get('/about', function() {
    return view('about');
})->name('about');

Route::get('/blog', function() {
    return view('blog');
})->name('blog');

Route::get('/contact', function() {
    return view('contact');
})->name('contact');