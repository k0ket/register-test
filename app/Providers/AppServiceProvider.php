<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind("App\Services\User\UserServiceInterface",
            "App\Services\User\UserService");
        $this->app->bind("App\Services\User\UserCreatorInterface",
            "App\Services\User\UserCreator");

        $this->app->bind("App\Services\Client\ClientServiceInterface",
            "App\Services\Client\ClientService");
        $this->app->bind("App\Services\Client\ClientCreatorInterface",
            "App\Services\Client\ClientCreator");

        $this->app->bind("App\Repositories\Interfaces\ClientRepositoryInterface",
            "App\Repositories\ClientRepository");
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
