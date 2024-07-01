<?php

namespace App\Filament\Widgets;

use Filament\Tables;
use App\Models\Actuality;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Widgets\TableWidget as BaseWidget;

class LatestActuality extends BaseWidget
{
    protected static ?int $sort = 3;

    public function table(Table $table): Table
    {
        return $table
            ->query(
                Actuality::query()->limit(5)
                
            )
            ->columns([
                TextColumn::make('id')->label('ID'),
                TextColumn::make('title')->label('Titre'),
                TextColumn::make('created_at')->label("Date")->limit(10),
            ]);
    }
}
