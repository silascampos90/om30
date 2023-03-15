<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\File\FileServiceContracts;
use App\Services\File\FileService;

class FileProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(
            FileServiceContracts::class,
            FileService::class
        );
    }

    public function provides()
    {
        return [
            FileServiceContracts::class,
        ];
    }
}
