<?php

namespace App\Providers;

use App\Services\Cns\CnsService;
use Illuminate\Support\ServiceProvider;
use App\Services\Cns\CnsServiceContracts;

class CnsProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(
            CnsServiceContracts::class,
            CnsService::class
        );
    }

    public function provides()
    {
        return [
            CnsServiceContracts::class,
        ];
    }
}
