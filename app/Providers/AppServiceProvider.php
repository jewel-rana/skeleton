<?php

namespace App\Providers;

use App\Services\OptionService;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Nwidart\Modules\LaravelModulesServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(LaravelModulesServiceProvider::class);
        $this->app->register(BladeServiceProvider::class);
        $this->app->register(RepositoryServiceProvider::class);
        $this->app->register(ViewServiceProvider::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
    }
}
