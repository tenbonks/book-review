<?php

namespace App\Providers;

use Illuminate\Http\Request;
use Illuminate\Support\ServiceProvider;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Support\Facades\RateLimiter;

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

        // Limit the rate a user/ip address can create a review - this is applied in web.php on the store action
        RateLimiter::for('reviews', function (Request $request) {
            return Limit::perHour(20)->by(optional($request->user())->id ?: $request->ip());
        });

    }
}
