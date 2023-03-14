<?php

namespace App\Repositories\Address;

use App\Models\Address;
use App\Repositories\BaseRepository;

class AddressRepository extends BaseRepository implements AddressRepositoryContracts
{
    /**
     * @var Address
     */
    protected $model;

    /**
     * @param Address
     */
    public function __construct(Address $model)
    {
        $this->model = $model;
    }
}
