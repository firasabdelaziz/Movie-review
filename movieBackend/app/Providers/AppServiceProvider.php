<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use App\Repositories\MovieRepository;
use App\Repositories\MovieRepositoryInterface;
use Illuminate\Support\Facades\App;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(MovieRepositoryInterface::class, MovieRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Schema::defaultStringLength(191);
        // Get the user's preferred locale from the request (assuming it's provided in the request header)
        $locale = $this->app->getLocale(); // You can implement this based on your specific use case

        // Set the application locale
        App::setLocale($locale);
    }
}
