<?php

namespace App\Services;

use App\Repositories\EventRepositoryInterface;
use App\Repositories\GroupeRepositoryInterface;
use App\Repositories\ReportsRepositoryInterface;
use App\Repositories\ProvidersRepositoryInterface;
use App\Repositories\MembershipRepositoryInterface;
use App\Repositories\IncidentPreferenceRepositoryInterface;

class DashboardService implements DashboardServiceInterface
{
    protected $groupeRepository;
    protected $providersRepository;
    protected $reportsRepository;
    protected $incidentPreferenceRepository;

    public function __construct(
        GroupeRepositoryInterface $groupeRepository,
        ProvidersRepositoryInterface $providersRepository,
        ReportsRepositoryInterface $reportsRepository,
    ) {
        $this->groupeRepository = $groupeRepository;
        $this->providersRepository = $providersRepository;
        $this->reportsRepository = $reportsRepository;
    }

    public function getDashboardData()
    {
        return [
            'groupes' => $this->groupeRepository->getAll(),
            'providers' => $this->providersRepository->getAll(),
            'pendingReports' => $this->reportsRepository->countReportsByStatus('pending'),
            'progressReports' => $this->reportsRepository->countReportsByStatus('in progress'),
            'completedReports' => $this->reportsRepository->countReportsByStatus('completed'),
        ];
    }
}
