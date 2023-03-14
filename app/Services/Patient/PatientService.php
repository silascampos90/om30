<?php

namespace App\Services\Patient;

use App\Repositories\Patient\PatientRepositoryContracts;

class PatientService implements PatientServiceContracts
{
    /**
     * @var PatientRepositoryContracts
     */
    protected $PatientRepository;

    public function __construct(PatientRepositoryContracts $PatientRepository)
    {
        $this->PatientRepository = $PatientRepository;
    }
}
