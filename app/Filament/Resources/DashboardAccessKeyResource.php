<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Filament\Resources\Resource;
use App\Models\DashboardAccessKey;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Columns\BooleanColumn;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\DashboardAccessKeyResource\Pages;
use App\Filament\Resources\DashboardAccessKeyResource\RelationManagers;

class DashboardAccessKeyResource extends Resource
{
    protected static ?string $model = DashboardAccessKey::class;

    protected static ?string $navigationIcon = 'heroicon-o-key';
    protected static ?string $navigationLabel = 'Les clés D\'accès ';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('actor_id')
                ->columnSpanFull()
                
                ->required(),
            TextInput::make('actor_type')
                    ->columnSpanFull()
                    ->required()
                ->maxLength(255),
            TextInput::make('contraint_acess')
                ->required()
                ->columnSpanFull()

                ->maxLength(255),
                TextInput::make('value')
                ->required()
                ->columnSpanFull()

                ->default(Str::random(30))
                ->minLength(30) 
                ->columnSpanFull()

                ->maxLength(255),
                Textarea::make('label')
                ->required()
                ->columnSpanFull()
                ->maxLength(255),
           
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                 TextColumn::make('actor_id')->sortable()->searchable(),
                TextColumn::make('actor_type')->sortable()->searchable(),
                TextColumn::make('contraint_acess')->sortable()->searchable(),
                TextColumn::make('value')->sortable()->searchable()->limit(15),
                TextColumn::make('label')->sortable()->searchable(),
                BooleanColumn::make('status')->sortable()->searchable(),
            ])
            ->filters([
                SelectFilter::make('actor_type')->options([
                    'Ministry' => 'Ministry',
                    'Other' => 'Other', // Ajoutez d'autres options selon vos besoins
                ]),
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
            'index' => Pages\ManageDashboardAccessKeys::route('/'),
        ];
    }
}
