<?php

namespace App\Repositories\Patient;

use App\Models\Patient;
use App\Repositories\BaseRepository;

class PatientRepository extends BaseRepository implements PatientRepositoryContracts
{
    /**
     * @var Patient
     */
    protected $model;

    /**
     * @param Patient
     */
    public function __construct(Patient $model)
    {
        $this->model = $model;
    }
}
