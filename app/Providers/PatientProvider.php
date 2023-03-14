<?php

namespace App\Providers;

use App\Repositories\Patient\PatientRepository;
use App\Repositories\Patient\PatientRepositoryContracts;
use App\Services\Patient\PatientService;
use Illuminate\Support\ServiceProvider;
use App\Services\Patient\PatientServiceContracts;

class PatientProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(
            PatientServiceContracts::class,
            PatientService::class
        );

        $this->app->bind(
            PatientRepositoryContracts::class,
            PatientRepository::class
        );
    }

    public function provides()
    {
        return [
            PatientServiceContracts::class,
            PatientRepositoryContracts::class,
        ];
    }
}
