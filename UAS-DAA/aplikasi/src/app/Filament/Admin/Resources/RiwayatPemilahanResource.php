<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\RiwayatPemilahanResource\Pages;
use App\Filament\Admin\Resources\RiwayatPemilahanResource\RelationManagers;
use App\Models\RiwayatPemilahan;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use App\Models\Sampah;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class RiwayatPemilahanResource extends Resource
{
    protected static ?string $model = RiwayatPemilahan::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function query()
    {
        // Eager load relasi kategori untuk optimasi query
        return RiwayatPemilahan::with('sampah', 'user');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('user_id')
                    ->relationship('user', 'name')
                    ->required(),
                Forms\Components\Select::make('sampah_id')
                    ->label('Nama Sampah')
                    ->options(Sampah::all()->pluck('nama_sampah', 'id')->toArray())
                    ->required(),
                Forms\Components\DatePicker::make('tanggal_pemilahan')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('sampah.nama_sampah')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('tanggal_pemilahan')
                    ->date()
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
            'index' => Pages\ListRiwayatPemilahans::route('/'),
            'create' => Pages\CreateRiwayatPemilahan::route('/create'),
            'edit' => Pages\EditRiwayatPemilahan::route('/{record}/edit'),
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
