<?php

namespace App\Services\Patient;

interface PatientServiceContracts
{
    /**
     * @param array $data
     */
    public function store(array $data);

    /**
     * @param string $data
     */
    public function findPatientCep(array $cep);
}
