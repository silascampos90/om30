<?php

namespace App\Services\Patient;

use App\Repositories\Patient\PatientRepositoryContracts;
use App\Services\ViaCep\ViaCepServiceContracts;
use Illuminate\Support\Facades\Cache;

class PatientService implements PatientServiceContracts
{
    /**
     * @var PatientRepositoryContracts
     */
    protected $addressRepository;

    /**
     * @var PatientRepositoryContracts
     */
    protected $viaCepClient;

    /**
     * @param PatientRepositoryContracts
     * @param ViaCepServiceContracts
     */
    public function __construct(
        PatientRepositoryContracts $addressRepository,
        ViaCepServiceContracts $viaCepClient
    ) {
        $this->addressRepository = $addressRepository;
        $this->viaCepClient = $viaCepClient;
    }

    /**
     * @inheritdoc
     */
    public function store(array $date)
    {
        return $this->addressRepository->store($date);
    }

    public function findPatientCep(array $cep)
    {
        $cep = $cep['cep'];
        $cacheKey = 'viaCep';

        return Cache::store('redis')
            ->remember($cacheKey, 86400, function () use ($cep) {
                return $this->viaCepClient->get("{$cep}/json/");
            });
    }
}
