<?php

namespace App\Repositories;


use Carbon\Laravel\ServiceProvider;

class BackendServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind([
            'App\Repositories\RepositoryInterface',
            'App\Repositories\UserRepository',
            'App\Repositories\CompanyRepository',
        ]);

    }
}
