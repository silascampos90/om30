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
    protected $patientRepository;

    /**
     * @var PatientRepositoryContracts
     */
    protected $viaCepClient;

    /**
     * @param PatientRepositoryContracts
     * @param ViaCepServiceContracts
     */
    public function __construct(
        PatientRepositoryContracts $patientRepository,
        ViaCepServiceContracts $viaCepClient
    ) {
        $this->patientRepository = $patientRepository;
        $this->viaCepClient = $viaCepClient;
    }

    /**
     * @inheritdoc
     */
    public function store(array $date)
    {
        if (request()->has('foto')) {
            $avatar = request()->file('foto');
            $avatarName = time() . '.' . $avatar->getClientOriginalExtension();
            $avatarPath = public_path('/images/patient');
            $avatar->move($avatarPath, $avatarName);
        }
        $date['foto'] = '/images/patient/' . $avatarName;

        return $this->patientRepository->store($date);
    }

    /**
     * @inheritdoc
     */
    public function getWithRelation(string $relation)
    {
        return $this->patientRepository->getWithRelation($relation);
    }

    /**
     * @inheritdoc
     */
    public function getByIdAndWithRelations(int $id, array $relation)
    {
        return $this->patientRepository->getByIdAndWithRelations($id, $relation);
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
