<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\OtpCode;
use App\Models\OtpCodes;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\OtpCodeResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\OtpCodeResource\RelationManagers;

class OtpCodeResource extends Resource
{
    protected static ?string $model = OtpCodes::class;

    protected static ?string $navigationIcon = 'heroicon-o-qr-code';
protected static ?string $navigationLabel = 'Les code otp';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextColumn::make('user_id')->sortable()->searchable(),
                TextColumn::make('code')->sortable()->searchable(),
                TextColumn::make('created_at')->sortable(),
                TextColumn::make('expires_at')->sortable(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('user_id')->sortable()->searchable(),
                TextColumn::make('code')->sortable()->searchable(),
                TextColumn::make('created_at')->sortable(),
                TextColumn::make('expires_at')->sortable(),
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
            'index' => Pages\ManageOtpCodes::route('/'),
        ];
    }
}
