<?php

namespace App\Services\Address;

use App\Models\Patient;
use App\Repositories\Address\AddressRepositoryContracts;

class AddressService implements AddressServiceContracts
{
    /**
     * @var AddressRepositoryContracts
     */
    protected $patientRepository;

    public function __construct(AddressRepositoryContracts $patientRepository)
    {
        $this->patientRepository = $patientRepository;
    }

    /**
     * @inheritdoc
     */
    public function store(array $data, Patient $patient)
    {
        $data['patient_id'] = $patient->id;
        return $this->patientRepository->store($data);
    }
}
