<?php

namespace App\Providers;

use App\Models\Study;
 use App\Observers\StudyObserve;
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
        Study::observe(StudyObserve::class);
    }
}
