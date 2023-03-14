<?php

namespace App\Services\ViaCep;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Log;

class ViaCepService implements ViaCepServiceContracts
{
    private const CONTENT_TYPE_JSON = 'application/json';

    private Client $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * @param string $cep
     * @throws GuzzleException
     */
    public function get(string $cep): mixed
    {
        $logMessage = 'Failed in ' . self::class;
        try {
            return json_decode(
                $this->client->get("ws/$cep/")->getBody()->getContents(),
                true
            );
        } catch (\GuzzleHttp\Exception\RequestException $exception) {
            return $this->buildClientExceptionMessage($exception);
        } catch (\Exception $exception) {
            Log::critical($logMessage, [
                'code' => $exception->getCode(),
                'exception' => $exception,
            ]);

            return $this->buildClientExceptionMessage($exception);
        }
    }

    /**
     * @param  mixed  $exception
     * @param  bool  $useADefaultMessage
     * @return array
     */
    private function buildClientExceptionMessage(mixed $exception, bool $useADefaultMessage = true): array
    {
        if ($useADefaultMessage) {
            return [
                'message' => 'Erro inesperado',
                'errors' => App::environment('local') ? [$exception->getMessage()] : true,
            ];
        }

        return [
            'errors' => true,
        ];
    }
}
