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

    /**
     * @inheritdoc
     */
    public function getPatientPaginate(?string $data)
    {
        return $this->model->with('address')->where(function ($query) use ($data) {
            if (! empty($data)) {
                $query->where('name', 'like', '%' . $data . '%')
                ->orWhere('cpf', 'like', '%' . $data . '%');
            }
        })->paginate(1);
    }
}
