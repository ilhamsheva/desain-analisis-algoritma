<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\PendaftaranResource\Pages;
use App\Filament\Admin\Resources\PendaftaranResource\RelationManagers;
use App\Models\Pendaftaran;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PendaftaranResource extends Resource
{
    protected static ?string $model = Pendaftaran::class;

    protected static ?string $navigationGroup = "Data Pendaftaran";

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('id_beasiswa')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('nim')
                    ->required()
                    ->numeric(),
                Forms\Components\DatePicker::make('tanggal_daftar')
                    ->required(),
                Forms\Components\TextInput::make('penghasilan_ortu')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('semester_saat_daftar')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('ipk_saat_daftar')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('status_verifikasi')
                    ->required(),
                Forms\Components\TextInput::make('status_seleksi')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id_beasiswa')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('nim')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('tanggal_daftar')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('penghasilan_ortu')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('semester_saat_daftar')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('ipk_saat_daftar')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('status_verifikasi'),
                Tables\Columns\TextColumn::make('status_seleksi'),
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
            'index' => Pages\ListPendaftarans::route('/'),
            'create' => Pages\CreatePendaftaran::route('/create'),
            'edit' => Pages\EditPendaftaran::route('/{record}/edit'),
        ];
    }

    public static function canViewAny(): bool
    {
        return Auth::user()->hasRole('super_admin') || Auth::user()->hasRole('Kaprodi') || Auth::user()->hasRole('Mahasiswa');
    }

    public static function canView($record): bool
    {
        return Auth::user()->hasRole('super_admin') || Auth::user()->hasRole('Kaprodi') || Auth::user()->hasRole('Mahasiswa');
    }

    public static function canCreate(): bool
    {
        return Auth::user()->hasRole('Mahasiswa');
    }

    public static function canEdit($record): bool
    {
        return Auth::user()->hasRole('Kaprodi'); // Only Kaprodi can validate applications
    }

    public static function canDelete($record): bool
    {
        return false; // No one should delete applications
    }

}
