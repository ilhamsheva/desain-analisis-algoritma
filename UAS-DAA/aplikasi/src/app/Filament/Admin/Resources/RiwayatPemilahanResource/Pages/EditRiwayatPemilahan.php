<?php

namespace App\Filament\Admin\Resources\RiwayatPemilahanResource\Pages;

use App\Filament\Admin\Resources\RiwayatPemilahanResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditRiwayatPemilahan extends EditRecord
{
    protected static string $resource = RiwayatPemilahanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
