<?php

namespace App\Providers;

use App\Repositories\BaseRepository;
use App\Repositories\BaseRepositoryContract;
use Illuminate\Support\ServiceProvider;

class BaseProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(
            BaseRepositoryContract::class,
            BaseRepository::class
        );
    }

    public function provides()
    {
        return [
            BaseRepositoryContract::class
        ];
    }
}
