<?php

namespace App\Filament\Admin\Resources\RiwayatPemilahanResource\Pages;

use App\Filament\Admin\Resources\RiwayatPemilahanResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListRiwayatPemilahans extends ListRecords
{
    protected static string $resource = RiwayatPemilahanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
