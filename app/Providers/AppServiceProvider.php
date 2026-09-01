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
        if (str_contains(config('app.url'), 'https://')) {
            \Illuminate\Support\Facades\URL::forceScheme('https');
        }

        \Illuminate\Support\Facades\View::composer(['partials.navbar', 'partials.footer', 'pages.*'], function ($view) {
            $contact = \App\Models\Contact::where('is_active', 1)
                ->where(function ($query) {
                    $query->where('title', 'like', '%whatsapp%')
                        ->orWhere('title', 'like', '%wa%')
                        ->orWhere('title', 'like', '%phone%')
                        ->orWhere('title', 'like', '%telp%')
                        ->orWhere('description', 'like', '%whatsapp%')
                        ->orWhere('description', 'like', '%wa.me%');
                })
                ->first();

            $text = trim(($contact->title ?? '') . ' ' . ($contact->description ?? ''));
            $number = preg_replace('/\D+/', '', $text);

            if (str_starts_with($number, '0')) {
                $number = '62' . substr($number, 1);
            }

            $view->with('whatsappLink', strlen($number) >= 9 ? 'https://wa.me/' . $number : route('contact.index'));
        });

        \Illuminate\Support\Facades\View::composer('partials.footer', function ($view) {
            $view->with('footerContacts', \App\Models\Contact::where('is_active', 1)->get());
            $view->with('siteSettings', \App\Models\SiteSetting::first());
        });
    }
}
