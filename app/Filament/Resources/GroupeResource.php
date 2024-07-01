<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Groupe;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Tables\Actions\Action;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\GroupeResource\Pages;
use App\Filament\Actions;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\GroupeResource\RelationManagers;
use App\Filament\Actions\TeamActions;

class GroupeResource extends Resource
{
    protected static ?string $model = Groupe::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';
    protected static ?string $navigationGroup = 'Gestionnaire de Groupes';

    protected static ?string $navigationLabel = 'Les groupes ';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                ->required()
                ->maxLength(255),
            TextInput::make('user_id')
                ->required()
                ->numeric(),
            TextInput::make('téléphone')
                ->required()
                ->maxLength(255),
            Textarea::make('justification')
                ->required(),
            TextInput::make('locations_id')
                ->required()
                ->numeric(),
            Radio::make('status')
                ->options([
                    'pending' => 'Pending',
                    'accepted' => 'Accepted',
                    'rejected' => 'Rejected',
                ])
                ->required(),
            
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->sortable()->searchable(),
                TextColumn::make('user.name')->label("Foundateur")->sortable()->searchable(),
                TextColumn::make('téléphone')->sortable()->searchable(),
                TextColumn::make('justification')->sortable()->searchable()->limit(30),
                TextColumn::make('location.township')->sortable()->searchable(),
                TextColumn::make('status')->sortable()->searchable(),
         
            ])
            ->filters([
                //
            ])
            ->actions([
                Action::make('status')
                ->label(function (Groupe $record) {
                    switch ($record->status) {
                        case 'accepted':
                            return 'Accepted';
                        case 'rejected':
                            return 'Rejected';
                        default:
                            return 'Pending';
                    }
                })
                ->icon('heroicon-o-check')
                ->action(function (Groupe $record) {
                    TeamActions::handleStatusChange($record);
                })
                ->color(function (Groupe $record) {
                    switch ($record->status) {
                        case 'accepted':
                            return 'success';
                        case 'rejected':
                            return 'danger';
                        default:
                            return 'warning';
                    }
                }),
               
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
            'index' => Pages\ManageGroupes::route('/'),
        ];
    }
}
