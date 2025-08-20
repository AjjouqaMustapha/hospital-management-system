<?php

namespace App\Providers;

use App\Livewire\CreateGroupServices;
use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;

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
         Livewire::setUpdateRoute(function ($handle) {
            return \Illuminate\Support\Facades\Route::post('/livewire/update', $handle)
                ->middleware(['web', 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath']);
        });

        Livewire::setScriptRoute(function ($handle) {
            return \Illuminate\Support\Facades\Route::get('/livewire/livewire.js', $handle)
                ->middleware(['web']);
        });
    }
}
