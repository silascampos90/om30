<?php

namespace App\Services\Patient;

use App\Repositories\Patient\PatientRepositoryContracts;

class PatientService implements PatientServiceContracts
{
    /**
     * @var PatientRepositoryContracts
     */
    protected $patientRepository;

    public function __construct(PatientRepositoryContracts $patientRepository)
    {
        $this->patientRepository = $patientRepository;
    }

    /**
     * @inheritdoc
     */
    public function store(array $date)
    {
        return $this->patientRepository->store($date);
    }
}
