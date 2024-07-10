<?php

namespace App\Http\Controllers;

use App\Services\DashboardServiceInterface;

class DashboardController extends Controller
{
    protected $dashboardService;
    public $groupes ;
    public $providers ;
    public $pendingReports ;
    public $progressReports ;
    public $completedReports ;

    public function __construct(DashboardServiceInterface $dashboardService)
    {
        $this->dashboardService = $dashboardService;
    }

    public function index()
    {
        $data = $this->dashboardService->getDashboardData();

        $this->groupes =  $data['groupes'] ?? [];	
        $this->providers =  $data['providers'] ?? [];	

        $this->pendingReports =  $data['pendingReports'] ?? [];	
        $this->progressReports =  $data['progressReports'] ?? [];	
        $this->completedReports =  $data['completedReports'] ?? [];	
        

        return view('welcome', [
            'providers' => $this->providers,
            'groupes' => $this->groupes,
            'pendingReports' => $this->pendingReports,
            'progressReports' => $this->progressReports,
            'completedReports' => $this->completedReports,
        ]);
    }
}
