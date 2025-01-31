<?php

namespace App\Filament\Admin\Resources\BerkasResource\Pages;

use App\Filament\Admin\Resources\BerkasResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListBerkas extends ListRecords
{
    protected static string $resource = BerkasResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
