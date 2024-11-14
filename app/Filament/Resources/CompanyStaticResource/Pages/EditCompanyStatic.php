<?php

namespace App\Filament\Resources\CompanyStaticResource\Pages;

use App\Filament\Resources\CompanyStaticResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCompanyStatic extends EditRecord
{
    protected static string $resource = CompanyStaticResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
