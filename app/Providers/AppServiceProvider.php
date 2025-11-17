<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Setting;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class MyClass {
    function __get($a){
        
    }
}

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $globalSettings= new MyClass;

        $globalSettings = Cache::remember('global_settings', 60, function () {
            // Objektum helyett inkább tömböt készítünk, így könnyebb felülírni a configot
            return Setting::all()->pluck('value', 'key')->toArray();
        });

        /*
        if(isset($globalSettings['listing_perpage'])) {
            $perpageValue = $globalSettings['listing_perpage'];
            config([
                'listing.category' => $perpageValue,
                'listing.search' => $perpageValue,
            ]);
        }
        */

        View::share('globalSettings', (object) $globalSettings);

        View::share('globalCategories', Category::get());


        $menuItems = [
            (object) ['title' => 'home', 'route' => 'home'],
            (object) ['title' => 'portfolio', 'route' => 'portfolio'],
            (object) ['title' => 'about', 'route' => 'about'],
            (object) ['title' => 'blog', 'route' => 'blog.index'],
            (object) ['title' => 'contact', 'route' => 'contact'],
        ];

        View::share('menuItems', $menuItems);
    }
}
