<?php

namespace App\Repositories;

use App\Models\Groupe;

class GroupeRepository implements GroupeRepositoryInterface
{
    protected $model;

    public function __construct(Groupe $groupe)
    {
        $this->model = $groupe;
    }

    public function getAll()
    {
        return $this->model->all();
    }

    public function getById($id)
    {
        return $this->model->findOrFail($id);
    }

    public function create(array $attributes)
    {
        return $this->model->create($attributes);
    }

    public function update($id, array $attributes)
    {
        $groupe = $this->model->findOrFail($id);
        $groupe->update($attributes);

        return $groupe;
    }

    public function delete($id)
    {
        $groupe = $this->model->findOrFail($id);
        $groupe->delete();

        return $groupe;
    }
}