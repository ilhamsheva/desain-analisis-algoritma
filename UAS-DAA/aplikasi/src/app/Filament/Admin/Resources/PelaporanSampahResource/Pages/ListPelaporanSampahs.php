<?php

namespace App\Filament\Admin\Resources\PelaporanSampahResource\Pages;

use App\Filament\Admin\Resources\PelaporanSampahResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPelaporanSampahs extends ListRecords
{
    protected static string $resource = PelaporanSampahResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
