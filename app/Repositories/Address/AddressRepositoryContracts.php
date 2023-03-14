<?php

namespace App\Repositories\Address;

use App\Repositories\BaseRepositoryContracts;

interface AddressRepositoryContracts extends BaseRepositoryContracts
{
    /**
     * @param array $data
     * @param int $id
     */
    public function updateByPatient(array $data, int $id);
}
