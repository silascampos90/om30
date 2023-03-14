<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

abstract class BaseRepository implements BaseRepositoryContract
{
    public function getById(int $id)
    {
        return $this->model->find($id);
    }

    public function all()
    {
        return $this->model->all();
    }

    public function getByAttribute(string $field, string $attribute)
    {
        return $this->model->where($field, $attribute);
    }

    public function store(array $data)
    {
        return $this->model->create($data);
    }

    public function updateById(array $data, int $id)
    {
        return $this->model->where('id', $id)
            ->update($data);
    }

    public function delete(int $id)
    {
        $supplier = $this->getById($id);

        return $supplier->delete();
    }

    public function getWithRelation(string $relation)
    {
        return $this->model->with($relation)->get();
    }

    public function getByIdAndWithRelations(int $id, array $relations)
    {
        return $this->model->where('id', $id)->with($relations)->first();
    }

    public function updateColection(Model $collection, array $dados)
    {
        return $collection->update($dados);
    }

    public function getAllWithRelations(array $relation)
    {
        return $this->model->with($relation)->get();
    }
}
