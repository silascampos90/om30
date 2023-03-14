<?php

namespace App\Providers;

use App\Services\ViaCep\ViaCepService;
use Illuminate\Support\ServiceProvider;
use App\Services\ViaCep\ViaCepServiceContracts;

class ViaCepServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(
            ViaCepServiceContracts::class,
            ViaCepService::class
        );
    }

    public function provides()
    {
        return [
            ViaCepServiceContracts::class,
        ];
    }
}
