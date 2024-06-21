<?php

namespace App\Filament\Resources\OtpCodeResource\Pages;

use App\Filament\Resources\OtpCodeResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageOtpCodes extends ManageRecords
{
    protected static string $resource = OtpCodeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // Actions\CreateAction::make(),
        ];
    }
}
