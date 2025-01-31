<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\PelaporanSampahResource\Pages;
use App\Filament\Admin\Resources\PelaporanSampahResource\RelationManagers;
use App\Models\PelaporanSampah;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use App\Models\Sampah;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PelaporanSampahResource extends Resource
{
    protected static ?string $model = PelaporanSampah::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function query()
    {
        // Eager load relasi kategori untuk optimasi query
        return PelaporanSampah::with('sampah', 'user');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('sampah_id')
                    ->required()
                    ->label('Nama Sampah')
                    ->options(Sampah::all()->pluck('nama_sampah', 'id')->toArray())
                    ->preload(),
                Forms\Components\Select::make('user_id')
                    ->required()
                    ->label('Users')
                    ->options(User::all()->pluck('name', 'id')->toArray())
                    ->preload(),
                Forms\Components\DatePicker::make('tanggal')
                    ->required(),
                Forms\Components\TextInput::make('lokasi')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('keterangan')
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('sampah.nama_sampah')
                    ->label('Nama Sampah')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('user.name')
                    ->numeric()
                    ->label('Users')
                    ->sortable(),
                Tables\Columns\TextColumn::make('tanggal')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('lokasi')
                    ->searchable(),
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
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListPelaporanSampahs::route('/'),
            'create' => Pages\CreatePelaporanSampah::route('/create'),
            'edit' => Pages\EditPelaporanSampah::route('/{record}/edit'),
        ];
    }

    public static function canViewAny(): bool
    {
        return Auth::user()->hasRole('super_admin') || Auth::user()->hasRole('User');
    }

    public static function canView($record): bool
    {
        return Auth::user()->hasRole('super_admin') || Auth::user()->hasRole('User');
    }

    public static function canCreate(): bool
    {
        return Auth::user()->hasRole('super_admin') || Auth::user()->hasRole('User');
    }

    public static function canEdit($record): bool
    {
        return Auth::user()->hasRole('super_admin');
    }

    public static function canDelete($record): bool
    {
        return Auth::user()->hasRole('super_admin');
    }

}
