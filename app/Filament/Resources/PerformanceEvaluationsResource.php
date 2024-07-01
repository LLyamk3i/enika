<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use App\Models\PerformanceEvaluation;
use App\Models\PerformanceEvaluations;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\PerformanceEvaluationsResource\Pages;
use App\Filament\Resources\PerformanceEvaluationsResource\RelationManagers;

class PerformanceEvaluationsResource extends Resource
{
    protected static ?string $model = PerformanceEvaluation::class;

    protected static ?string $navigationIcon = 'heroicon-o-star';
    protected static ?string $navigationGroup = 'Gestionnaire des signalements';
    protected static ?string $navigationLabel = 'L\'évaluation des traitements';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('user.name')->sortable()->searchable(),
                TextColumn::make('report.category.name')->sortable()->searchable(),
                TextColumn::make('value')->sortable()->searchable(),
                TextColumn::make('message')->sortable()->searchable(),
                TextColumn::make('created_at'),
                
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManagePerformanceEvaluations::route('/'),
        ];
    }
}
