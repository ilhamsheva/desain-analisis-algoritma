<?php

namespace App\Filament\Admin\Resources\SampahResource\Pages;

use App\Filament\Admin\Resources\SampahResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSampah extends EditRecord
{
    protected static string $resource = SampahResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
