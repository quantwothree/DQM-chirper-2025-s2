<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Events\ChirpCreated;
use App\Listeners\SendChirpCreatedNotifications;
class AppServiceProvider extends ServiceProvider
{

    protected $listen = [
        ChirpCreated::class => [
            SendChirpCreatedNotifications::class,
        ],
        // Other event listeners...
    ];
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
        //
    }
}
