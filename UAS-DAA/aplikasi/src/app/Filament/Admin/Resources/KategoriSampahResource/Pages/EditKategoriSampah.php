<?php

namespace App\Filament\Admin\Resources\KategoriSampahResource\Pages;

use App\Filament\Admin\Resources\KategoriSampahResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditKategoriSampah extends EditRecord
{
    protected static string $resource = KategoriSampahResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
