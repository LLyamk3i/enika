<?php

namespace App\Repositories;

use App\Models\Groupe;

interface GroupeRepositoryInterface
{
    public function getAll();
    public function getById($id);
    public function create(array $attributes);
    public function update($id, array $attributes);
    public function delete($id);
}