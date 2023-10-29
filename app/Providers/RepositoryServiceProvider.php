<?php

namespace App\Providers;

use App\Interfaces\RegisterRepositoryInterface;
use App\Repositories\RegisterRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(RegisterRepositoryInterface::class, RegisterRepository::class);
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
