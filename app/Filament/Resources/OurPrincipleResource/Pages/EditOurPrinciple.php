<?php

namespace App\Filament\Resources\OurPrincipleResource\Pages;

use App\Filament\Resources\OurPrincipleResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditOurPrinciple extends EditRecord
{
    protected static string $resource = OurPrincipleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
