<?php

namespace App\Services\Patient;

use App\Repositories\Patient\PatientRepositoryContracts;
use App\Services\ViaCep\ViaCepServiceContracts;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Cache;

class PatientService implements PatientServiceContracts
{
    /**
     * @var PatientRepositoryContracts
     */
    protected $patientRepository;

    /**
     * @var PatientRepositoryContracts
     */
    protected $viaCepClient;

    /**
     * @param PatientRepositoryContracts
     * @param ViaCepServiceContracts
     */
    public function __construct(
        PatientRepositoryContracts $patientRepository,
        ViaCepServiceContracts $viaCepClient
    ) {
        $this->patientRepository = $patientRepository;
        $this->viaCepClient = $viaCepClient;
    }

    /**
     * @inheritdoc
     */
    public function store(array $date)
    {
        if (request()->has('photo')) {
            $avatar = request()->file('photo');
            $avatarName = time() . '.' . $avatar->getClientOriginalExtension();
            $avatarPath = public_path('/images/patient');
            $avatar->move($avatarPath, $avatarName);

            $date['photo'] = '/images/patient/' . $avatarName;
        }

        return $this->patientRepository->store($date);
    }

    /**
     * @inheritdoc
     */
    public function getWithRelation(string $relation)
    {
        return $this->patientRepository->getWithRelation($relation);
    }

    /**
     * @inheritdoc
     */
    public function remove(array $data)
    {
        $id = $data['id'];
        return $this->patientRepository->delete($id);
    }

    /**
     * @inheritdoc
     */
    public function getByIdAndWithRelations(int $id, array $relation)
    {
        return $this->patientRepository->getByIdAndWithRelations($id, $relation);
    }

    /**
     * @inheritdoc
     */
    public function update(array $data)
    {
        $patient = Arr::only($data, [
            'name',
            'mother_name',
            'cpf',
            'cns',
            'photo',
        ]);

        if (request()->has('photo')) {
            $avatar = request()->file('photo');
            $avatarName = time() . '.' . $avatar->getClientOriginalExtension();
            $avatarPath = public_path('/images/patient');
            $avatar->move($avatarPath, $avatarName);

            $patient['photo'] = '/images/patient/' . $avatarName;
        }

        return $this->patientRepository->updateById($patient, $data['id']);
    }

    /**
     * @inheritdoc
     */
    public function findPatientCep(array $cep)
    {
        $cep = $cep['cep'];

        return Cache::store('redis')->remember($cep, 86400, function () use ($cep) {
            return $this->viaCepClient->get("{$cep}/json/");
        });
    }
}
