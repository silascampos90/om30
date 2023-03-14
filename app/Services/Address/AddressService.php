<?php

namespace App\Services\Address;

use App\Models\Patient;
use App\Repositories\Address\AddressRepositoryContracts;
use Illuminate\Support\Arr;

class AddressService implements AddressServiceContracts
{
    /**
     * @var AddressRepositoryContracts
     */
    protected $addressRepository;

    public function __construct(AddressRepositoryContracts $addressRepository)
    {
        $this->addressRepository = $addressRepository;
    }

    /**
     * @inheritdoc
     */
    public function store(array $data, Patient $patient)
    {
        $data['patient_id'] = $patient->id;
        return $this->addressRepository->store($data);
    }

    /**
     * @inheritdoc
     */
    public function updateWithRelation(array $data)
    {
        return $this->addressRepository->updateById($data, $data['id']);
    }

    /**
     * @inheritdoc
     */
    public function update(array $data)
    {
        $address = Arr::only($data, [
            'cep',
            'address',
            'complement',
            'number',
            'district',
            'state',
            'city',
        ]);

        return $this->addressRepository->updateByPatient($address, $data['id']);
    }
}
