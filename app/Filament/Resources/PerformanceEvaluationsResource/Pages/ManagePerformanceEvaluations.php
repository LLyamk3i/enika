<?php

namespace App\Filament\Resources\PerformanceEvaluationsResource\Pages;

use App\Filament\Resources\PerformanceEvaluationsResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManagePerformanceEvaluations extends ManageRecords
{
    protected static string $resource = PerformanceEvaluationsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // Actions\CreateAction::make(),
        ];
    }
}
