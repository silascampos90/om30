<?php

namespace App\Services\Address;

use App\Models\Patient;

interface AddressServiceContracts
{
    /**
     * @param array $data
     * @param Patient $patient
     */
    public function store(array $data, Patient $patient);

    /**
     * @param array $data
     */
    public function update(array $data);
}
