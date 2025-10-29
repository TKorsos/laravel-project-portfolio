<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    function index(Category $category) {
        // limit vagy inradnomorder ha random jelenítetném meg
        $portfolios = $category->portfolios()->where('status', 1)->get();
        return view('includes.portfolios', compact('category', 'portfolios'));
    }
}
