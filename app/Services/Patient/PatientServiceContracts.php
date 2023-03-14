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

    /**
     * @param string $relation
     */
    public function getWithRelation(string $relation);

    /**
     * @param int $id
     * @param array $relation
     */
    public function getByIdAndWithRelations(int $id, array $relation);
}
