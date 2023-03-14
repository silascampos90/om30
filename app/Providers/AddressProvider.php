<?php

namespace App\Providers;

use App\Repositories\Address\AddressRepository;
use App\Repositories\Address\AddressRepositoryContracts;
use App\Services\Address\AddressService;
use Illuminate\Support\ServiceProvider;
use App\Services\Address\AddressServiceContracts;

class AddressProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(
            AddressServiceContracts::class,
            AddressService::class
        );

        $this->app->bind(
            AddressRepositoryContracts::class,
            AddressRepository::class
        );
    }

    public function provides()
    {
        return [
            AddressServiceContracts::class,
            AddressRepositoryContracts::class,
        ];
    }
}
