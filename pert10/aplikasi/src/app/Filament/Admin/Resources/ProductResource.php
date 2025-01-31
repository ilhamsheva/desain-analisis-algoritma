<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\ProductResource\Pages;
use App\Filament\Admin\Resources\ProductResource\RelationManagers;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    // Define the title for the resource
    protected static ?string $label = 'Product';
    protected static ?string $pluralLabel = 'Products';

    protected static ?string $navigationIcon = 'heroicon-o-cube';

    // Define the navigation group
    protected static ?string $navigationGroup = 'Product Management';
    protected static ?int $navigationSort = 1;

    // Define the pages (index, create, edit, etc.)
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }

    // Define the table view
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Product Name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('harga')
                    ->label('Price')
                    ->sortable(),
                Tables\Columns\TextColumn::make('category')
                    ->label('Category')
                    ->sortable(),
            ])
            ->filters([
                // Add any filters here
            ])
            ->actions([
                // Add actions like "view", "edit", etc.
            ])
            ->bulkActions([
                // Define bulk actions if needed
            ]);
    }

    // Define the form view
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label('Product Name')
                    ->required(),
                Forms\Components\TextInput::make('harga')
                    ->label('Price')
                    ->required()
                    ->numeric(),
                Forms\Components\Select::make('category')
                    ->label('Category')
                    ->options([
                        'Sepatu' => 'Sepatu',
                        'Celana' => 'Celana',
                        'Aksesoris' => 'Baju',
                    ])
                    ->required(),
            ]);
    }
}
