<?php

namespace App\Providers;

use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    public function getLang() {
        return Cookie::get('lang', 'ru');
    }

    public function boot()
    {
        View::composer('pages.layouts.main', function ($view) {
            return $view->with('data',
                DB::table('footer_content')
                    ->where('lang', '=', $this->getLang())
                    ->select(['position', 'type', 'text'])
                    ->orderBy('id')->get());
        });
    }
}
