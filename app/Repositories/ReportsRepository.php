<?php

namespace App\Repositories;

use App\Models\Report;

class ReportsRepository implements ReportsRepositoryInterface
{
    protected $model;

    public function __construct(Report $report)
    {
        $this->model = $report;
    }

    public function getAll()
    {
        return $this->model->all();
    }

    public function getById($id)
    {
        return $this->model->findOrFail($id);
    }
    public function update($id, array $attributes)
    {
        $report = $this->model->findOrFail($id);
        $report->update($attributes);

        return $report;
    }

    public function delete($id)
    {
        $report = $this->model->findOrFail($id);
        $report->delete();

        return $report;
    }

    // Méthode générique pour compter les alertes par état
    public function countReportsByStatus(string $status):int 
    {
        return $this->model->where('status', $status)->count();
    }
}
