<?php

namespace App\Filament\Resources\ProjectClientResource\Pages;

use App\Filament\Resources\ProjectClientResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditProjectClient extends EditRecord
{
    protected static string $resource = ProjectClientResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
