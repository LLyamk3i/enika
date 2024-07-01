<?php

namespace App\Filament\Resources\ActualityResource\Pages;

use Filament\Actions;
use App\Models\Attachment;
use Filament\Resources\Pages\ManageRecords;
use App\Filament\Resources\ActualityResource;

class ManageActualities extends ManageRecords
{
    protected static string $resource = ActualityResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

}
