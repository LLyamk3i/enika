<?php

namespace App\Filament\Resources\DashboardAccessKeyResource\Pages;

use App\Filament\Resources\DashboardAccessKeyResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageDashboardAccessKeys extends ManageRecords
{
    protected static string $resource = DashboardAccessKeyResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
