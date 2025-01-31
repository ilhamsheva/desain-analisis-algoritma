<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\PenerimaBeasiswaResource\Pages;
use App\Filament\Admin\Resources\PenerimaBeasiswaResource\RelationManagers;
use App\Models\PenerimaBeasiswa;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PenerimaBeasiswaResource extends Resource
{
    protected static ?string $model = PenerimaBeasiswa::class;

    protected static ?string $navigationGroup = "Data Penerima";

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('id_pendaftaran')
                    ->required()
                    ->numeric(),
                Forms\Components\DatePicker::make('tanggal_terima')
                    ->required(),
                Forms\Components\TextInput::make('nominal_diterima')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('periode_penerimaan')
                    ->required()
                    ->maxLength(20),
                Forms\Components\TextInput::make('status_pencairan')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id_pendaftaran')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('tanggal_terima')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('nominal_diterima')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('periode_penerimaan')
                    ->searchable(),
                Tables\Columns\TextColumn::make('status_pencairan'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPenerimaBeasiswas::route('/'),
            'create' => Pages\CreatePenerimaBeasiswa::route('/create'),
            'edit' => Pages\EditPenerimaBeasiswa::route('/{record}/edit'),
        ];
    }

    // Authorization Methods for Role-Based Access Control
    public static function canViewAny(): bool
    {
        return Auth::user()->hasRole('super_admin') || Auth::user()->hasRole('Kaprodi');
    }

    public static function canView($record): bool
    {
        return Auth::user()->hasRole('super_admin') || Auth::user()->hasRole('Kaprodi');
    }

    public static function canCreate(): bool
    {
        return Auth::user()->hasRole('super_admin');
    }


    public static function canEdit($record): bool
    {
        return Auth::user()->hasRole('super_admin');
    }

    public static function canDelete($record): bool
    {
        return false; // No one should delete records for scholarship recipients
    }
}
