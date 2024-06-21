<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Location;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\LocationResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\LocationResource\RelationManagers;

class LocationResource extends Resource
{
    protected static ?string $model = Location::class;

    protected static ?string $navigationIcon = 'heroicon-o-map-pin';
protected static ?string $navigationLabel = 'Les Emplacements';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('city')
                    ->required()
                    ->label("Ville")
                    ->columnSpanFull()
                    ->maxLength(255),
                TextInput::make('prefecture')
                    ->required()
                    ->label("Préfecture")
                    ->columnSpanFull()
                    ->maxLength(255),
                TextInput::make('township')
                    ->required()
                    ->label("Commune")
                    ->columnSpanFull()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('city')->sortable()->searchable(),
                TextColumn::make('prefecture')->sortable()->searchable(),
                TextColumn::make('township')->sortable()->searchable(),
                TextColumn::make('created_at')->sortable()->dateTime(),
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
            'index' => Pages\ManageLocations::route('/'),
        ];
    }
}
