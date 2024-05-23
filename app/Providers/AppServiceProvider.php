<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

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
    public function boot()
    {
        View::composer('*', function ($view) {
            $user_id = Session::get('id');
            $count = DB::table('carts')->where('user_id', $user_id)->count();
            $view->with('count', $count);
        });
    }

    // public function catrgory()
    // {
    //     $category = DB::table('categories')->get();
    //     View::share('category', $category);
    // }

}
