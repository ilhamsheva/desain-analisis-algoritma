<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\SampahResource\Pages;
use App\Filament\Admin\Resources\SampahResource\RelationManagers;
use App\Models\KategoriSampah;
use App\Models\Sampah;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SampahResource extends Resource
{
    protected static ?string $model = Sampah::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function query()
    {
        // Eager load relasi kategori untuk optimasi query
        return Sampah::with('kategori');
    }
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama_sampah')
                    ->required()
                    ->label('Nama Sampah')
                    ->maxLength(255),
                Forms\Components\Select::make('kategori_id')
                    ->required()
                    ->label('Kategori Sampah')
                    ->options(KategoriSampah::all()->pluck('kategori_nama', 'id')->toArray())
                    ->searchable()
                    ->preload(),
                Forms\Components\Textarea::make('deskripsi')
                    ->columnSpanFull(),
                Forms\Components\Select::make('status')
                    ->options([
                        'Dapat didaur ulang' => 'Dapat didaur ulang',
                        'Tidak dapat didaur ulang' => 'Tidak dapat didaur ulang',
                        'Belum diklasifikasikan' => 'Belum diklasifikasikan',
                    ])
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama_sampah')
                    ->searchable(),
                Tables\Columns\TextColumn::make('kategori.kategori_nama')
                    ->label('Kategori Sampah')
                    ->numeric()
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('status'),
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
            'index' => Pages\ListSampahs::route('/'),
            'create' => Pages\CreateSampah::route('/create'),
            'edit' => Pages\EditSampah::route('/{record}/edit'),
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
