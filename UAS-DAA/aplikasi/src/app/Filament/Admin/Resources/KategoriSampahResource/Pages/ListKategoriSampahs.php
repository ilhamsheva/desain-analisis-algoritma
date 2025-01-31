<?php

namespace App\Filament\Admin\Resources\KategoriSampahResource\Pages;

use App\Filament\Admin\Resources\KategoriSampahResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListKategoriSampahs extends ListRecords
{
    protected static string $resource = KategoriSampahResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
