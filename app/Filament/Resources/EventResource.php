<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Event;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Columns\BooleanColumn;
use Filament\Forms\Components\DateTimePicker;
use App\Filament\Resources\EventResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\EventResource\RelationManagers;

class EventResource extends Resource
{
    protected static ?string $model = Event::class;

    protected static ?string $navigationIcon = 'heroicon-o-calendar-days';
    protected static ?string $navigationGroup = 'Espace Éditorial';
    protected static ?string $navigationLabel = 'Les Événements';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('type')
                    ->required()
                    ->maxLength(255),
                TextInput::make('title')
                    ->label('titre')
                    ->required()
                    ->maxLength(255),

                TextInput::make('enty_type')
                    ->required()
                    ->label('Type Entités')
                    ->maxLength(255),
                TextInput::make('entity_id')
                    ->required()
                    ->maxLength(255),
                DateTimePicker::make('event_date')
                ->label("date de l'événement")
                    ->columnSpanFull()
                    ->required(),
                Textarea::make('description')
                    ->columnSpanFull()
                    ->required(),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->label('ID')->sortable()->searchable(),
                TextColumn::make('type')->sortable()->searchable(),
                TextColumn::make('title')->label("Titre")->sortable()->searchable()->limit(25),
                TextColumn::make('description')->sortable()->searchable()->limit(30),
                TextColumn::make('enty_type')->label("Entité Type")->sortable()->searchable(),
                TextColumn::make('groupe.name')->label("Entité")->sortable()->searchable(),
                TextColumn::make('event_date')->label("Even. Date")->sortable(),
                BooleanColumn::make('is_active')->label("Status"),
            ])
            ->filters([
                SelectFilter::make('type')->options([
                ]),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                // Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ManageEvents::route('/'),
        ];
    }
}
