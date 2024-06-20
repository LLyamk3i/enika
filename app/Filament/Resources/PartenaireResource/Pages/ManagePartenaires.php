<?php

namespace App\Filament\Resources\PartenaireResource\Pages;

use App\Filament\Resources\PartenaireResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManagePartenaires extends ManageRecords
{
    protected static string $resource = PartenaireResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
