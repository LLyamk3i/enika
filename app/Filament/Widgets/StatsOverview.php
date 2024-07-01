<?php

namespace App\Filament\Widgets;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Groupe;
use App\Models\Report;
use App\Models\Provider;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        // Get current counts
        $userSum = User::count();
        $groupeSum = Groupe::count();
        $providerSum = Provider::count();
        $reportSum = Report::count();

        // Calculate growth rates (assuming you have data from one month ago for comparison)
        $oneMonthAgo = Carbon::now()->subMonth();

        $previousUserSum = User::where('created_at', '<', $oneMonthAgo)->count();
        $previousGroupeSum = Groupe::where('created_at', '<', $oneMonthAgo)->count();
        $previousProviderSum = Provider::where('created_at', '<', $oneMonthAgo)->count();
        $previousReportSum = Report::where('created_at', '<', $oneMonthAgo)->count();

        $userGrowth = $this->calculateGrowth($previousUserSum, $userSum);
        $groupeGrowth = $this->calculateGrowth($previousGroupeSum, $groupeSum);
        $providerGrowth = $this->calculateGrowth($previousProviderSum, $providerSum);
        $reportGrowth = $this->calculateGrowth($previousReportSum, $reportSum);

        // Generate chart data
        $userChart = $this->generateChartData(User::class);
        $groupeChart = $this->generateChartData(Groupe::class);
        $providerChart = $this->generateChartData(Provider::class);
        $reportChart = $this->generateChartData(Report::class);

        return [
            Stat::make('Les agents', $userSum)
                ->description("{$userGrowth}% increase")
                ->descriptionIcon($userGrowth >= 0 ? 'heroicon-m-arrow-trending-up' : 'heroicon-m-arrow-trending-down')
                ->chart($userChart)
                ->color($userGrowth >= 0 ? 'success' : 'danger'),
            Stat::make('Les signalements', $reportSum)
                ->description("{$reportGrowth}% increase")
                ->descriptionIcon($reportGrowth >= 0 ? 'heroicon-m-arrow-trending-up' : 'heroicon-m-arrow-trending-down')
                ->chart($reportChart)
                ->color($reportGrowth >= 0 ? 'success' : 'danger'),
            Stat::make('Les prestataires', $providerSum)
                ->description("{$providerGrowth}% increase")
                ->descriptionIcon($providerGrowth >= 0 ? 'heroicon-m-arrow-trending-up' : 'heroicon-m-arrow-trending-down')
                ->chart($providerChart)
                ->color($providerGrowth >= 0 ? 'success' : 'danger'),
            Stat::make('Les groupes', $groupeSum)
                ->description("{$groupeGrowth}% increase")
                ->descriptionIcon($groupeGrowth >= 0 ? 'heroicon-m-arrow-trending-up' : 'heroicon-m-arrow-trending-down')
                ->chart($groupeChart)
                ->color($groupeGrowth >= 0 ? 'success' : 'danger'),
        ];
    }

    private function calculateGrowth($previousValue, $currentValue)
    {
        if ($previousValue == 0) {
            return $currentValue > 0 ? 100 : 0;
        }

        return (($currentValue - $previousValue) / $previousValue) * 100;
    }

    private function generateChartData($modelClass)
    {
        $data = [];
        for ($i = 6; $i >= 0; $i--) {
            $date = Carbon::now()->subDays($i);
            $count = $modelClass::whereDate('created_at', $date->toDateString())->count();
            $data[] = $count;
        }
        return $data;
    } 
}
