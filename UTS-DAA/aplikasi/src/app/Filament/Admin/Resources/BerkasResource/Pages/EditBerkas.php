<?php

namespace App\Filament\Admin\Resources\BerkasResource\Pages;

use App\Filament\Admin\Resources\BerkasResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBerkas extends EditRecord
{
    protected static string $resource = BerkasResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
