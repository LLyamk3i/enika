<?php

namespace App\Repositories;

use App\Models\Provider;

class ProvidersRepository implements ProvidersRepositoryInterface
{
    protected $model;

    public function __construct(Provider $provider)
    {
        $this->model = $provider;
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
        $provider = $this->model->findOrFail($id);
        $provider->update($attributes);

        return $provider;
    }

    public function delete($id)
    {
        $provider = $this->model->findOrFail($id);
        $provider->delete();

        return $provider;
    }
}