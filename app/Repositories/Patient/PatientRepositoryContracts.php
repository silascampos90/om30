<?php

namespace App\Repositories\Patient;

use App\Repositories\BaseRepositoryContracts;

interface PatientRepositoryContracts extends BaseRepositoryContracts
{
    /**
     * @param ?string $data
     */
    public function getPatientPaginate(?string $data);
}
