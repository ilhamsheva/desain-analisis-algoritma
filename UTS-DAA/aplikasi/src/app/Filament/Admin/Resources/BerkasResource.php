<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\BerkasResource\Pages;
use App\Models\Berkas;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Auth;

class BerkasResource extends Resource
{
    protected static ?string $model = Berkas::class;

    protected static ?string $navigationGroup = "Daftar Berkas";


    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('id_pendaftaran')
                    ->required()
                    ->numeric(),
                Forms\Components\DateTimePicker::make('tanggal_upload')
                    ->required(),
                Forms\Components\TextInput::make('jenis_berkas')
                    ->required()
                    ->maxLength(50),
                Forms\Components\TextInput::make('nama_file')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('status_verifikasi')
                    ->required()
                    ->options([
                        'pending' => 'Pending',
                        'valid' => 'Valid',
                        'invalid' => 'Invalid',
                    ]),
                Forms\Components\Textarea::make('keterangan')
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id_pendaftaran')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('tanggal_upload')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('jenis_berkas')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nama_file')
                    ->searchable(),
                Tables\Columns\TextColumn::make('status_verifikasi')
                    ->sortable(),
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
                // Add any filters if needed
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
            // Define relations here if any
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBerkas::route('/'),
            'create' => Pages\CreateBerkas::route('/create'),
            'edit' => Pages\EditBerkas::route('/{record}/edit'),
        ];
    }

    public static function canViewAny(): bool
    {
        return Auth::user()->hasRole('super_admin') || Auth::user()->hasRole('Mahasiswa');
    }

    public static function canView($record): bool
    {
        return Auth::user()->hasRole('super_admin') || Auth::user()->hasRole('Mahasiswa');
    }

    public static function canCreate(): bool
    {
        return Auth::user()->hasRole('Mahasiswa');
    }

    public static function canEdit($record): bool
    {
        return Auth::user()->hasRole('super_admin'); // Only Admin can verify (edit) records
    }

    public static function canDelete($record): bool
    {
        return false; // No one should delete documents
    }
}
