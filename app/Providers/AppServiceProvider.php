<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\View\Composers\CategoryComposer;
use App\View\Composers\OrganizerComposer;

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
        Gate::before(function ($user, $ability) {
            return $user->hasRole('super-admin') ? true : null;
        });

        View::composer(['livewire.event.create-event', 'livewire.event.update-event'],  CategoryComposer::class);
        View::composer(['livewire.event.create-event', 'livewire.event.update-event'],  OrganizerComposer::class);
    }
}
