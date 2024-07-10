<?php

namespace App\Repositories;

interface ReportsRepositoryInterface
{
    public function getAll();
    public function getById($id);
    public function update($id, array $attributes);
    public function delete($id);
    public function countReportsByStatus(string $status);
}