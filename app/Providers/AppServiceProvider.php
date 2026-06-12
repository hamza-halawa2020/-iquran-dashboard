<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
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
        RateLimiter::for('contact-form', function (Request $request) {
            $email = Str::lower((string) $request->input('email', ''));
            $key = $request->ip().'|'.$email;

            return [
                Limit::perMinute(3)->by($key),
                Limit::perHour(10)->by($key),
            ];
        });

        RateLimiter::for('review-form', function (Request $request) {
            return [
                Limit::perMinute(3)->by($request->ip()),
                Limit::perHour(10)->by($request->ip()),
            ];
        });

        RateLimiter::for('teacher-application-form', function (Request $request) {
            $email = Str::lower((string) $request->input('email', ''));
            $key = $request->ip().'|'.$email;

            return [
                Limit::perMinute(2)->by($key),
                Limit::perDay(5)->by($key),
            ];
        });
    }
}
