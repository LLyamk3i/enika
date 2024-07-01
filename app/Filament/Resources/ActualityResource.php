<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use App\Models\Actuality;
use App\Models\Attachment;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Pages\Actions\EditAction;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\FileUpload;

use Filament\Tables\Actions\CreateAction;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\DateTimePicker;
use Filament\Infolists\Components\ImageEntry;
use App\Filament\Resources\ActualityResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\ActualityResource\RelationManagers;

class ActualityResource extends Resource
{
    protected static ?string $model = Actuality::class;

    protected static ?string $navigationIcon = 'heroicon-o-newspaper';
    protected static ?string $navigationGroup = 'Espace Éditorial';
    protected static ?string $navigationLabel = 'Les Actualités ';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('type')
                    ->options([
                        'actualité' => 'actualité',
                    ])
                    ->native(false)
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('title')
                    ->required()
                    ->columnSpanFull()
                    ->maxLength(255),
                Textarea::make('content')
                    ->required()
                    ->columnSpanFull()
                    ->maxLength(65535),
                FileUpload::make('temporaryUrl')
                    ->multiple()
                    ->disk('public')
                    ->directory('attachment')
                    ->columnSpanFull(),


            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->label('ID')->sortable()->searchable(),

                ImageColumn::make('attachments.file_path')
                    ->circular()
                    ->limit(3)
                    ->stacked(),
                TextColumn::make('type')->sortable()->searchable(),
                TextColumn::make('title')->sortable()->searchable()->limit(15),
                TextColumn::make('content')->limit(20),
                // TextColumn::make('is_activated_at')->sortable()->dateTime(),
                TextColumn::make('created_at')->sortable()->dateTime()->limit(13),
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
            'index' => Pages\ManageActualities::route('/'),

        ];
    }
}
