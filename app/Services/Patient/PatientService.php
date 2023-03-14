<?php

namespace App\Services\Patient;

use App\Repositories\Patient\PatientRepositoryContracts;

class PatientService implements PatientServiceContracts
{
    /**
     * @var PatientRepositoryContracts
     */
    protected $addressRepository;

    public function __construct(PatientRepositoryContracts $addressRepository)
    {
        $this->addressRepository = $addressRepository;
    }

    /**
     * @inheritdoc
     */
    public function store(array $date)
    {
        return $this->addressRepository->store($date);
    }
}
