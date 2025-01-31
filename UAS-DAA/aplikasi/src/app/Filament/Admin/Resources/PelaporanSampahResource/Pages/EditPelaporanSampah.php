<?php

namespace App\Filament\Admin\Resources\PelaporanSampahResource\Pages;

use App\Filament\Admin\Resources\PelaporanSampahResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPelaporanSampah extends EditRecord
{
    protected static string $resource = PelaporanSampahResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
