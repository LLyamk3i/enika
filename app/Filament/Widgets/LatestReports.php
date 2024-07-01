<?php

namespace App\Filament\Widgets;

use Filament\Tables;
use App\Models\Report;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Widgets\TableWidget as BaseWidget;

class LatestReports extends BaseWidget
{
    protected static ?int $sort = 3;

    public function table(Table $table): Table
    {
        return $table
            ->query(
                Report::query()->limit(5)
            )
            ->columns([
                TextColumn::make('id')->label('ID'),
                TextColumn::make('category_id')->label('Incidents'),
                TextColumn::make('status')->label("status"),

            ]);
    }

    
}
