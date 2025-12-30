<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

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
        \Illuminate\Support\Facades\View::composer('*', function ($view) {
            $view->with('footerContacts', \App\Models\Contact::where('is_active', 1)->get());
            $view->with('siteSettings', \App\Models\SiteSetting::first());
        });
    }
}
