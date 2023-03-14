<?php

namespace App\Repositories\Patient;

use Illuminate\Database\Eloquent\Model;

interface BaseRepositoryContract
{
    public function getById(int $id);

    public function all();

    public function getByAttribute(string $field, string $attribute);

    public function store(array $data);

    public function updateById(array $data, int $id);

    public function delete(int $id) ;

    public function getWithRelation(string $relation);

    public function getByIdAndWithRelations(int $id, array $relations);

    public function updateColection(Model $collection, array $dados);

    public function getAllWithRelations(array $dados);
}
