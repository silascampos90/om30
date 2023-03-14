<?php

namespace App\Providers;

use App\Services\ViaCep\ViaCepService;
use App\Services\ViaCep\ViaCepServiceContracts;
use GuzzleHttp\Client;
use GuzzleHttp\HandlerStack;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class ViaCepClientProvider extends ServiceProvider implements DeferrableProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            ViaCepServiceContracts::class,
            function () {
                $stack = HandlerStack::create();
                return new ViaCepService(
                    new Client(
                        [
                            'verify' => false,
                            'base_uri' => 'https://viacep.com.br/',
                            'Accept' => 'application/json',
                            'handler' => $stack
                        ]
                    )
                );
            }
        );
    }

    public function provides()
    {
        return [
            ViaCepServiceContracts::class,
        ];
    }
}
