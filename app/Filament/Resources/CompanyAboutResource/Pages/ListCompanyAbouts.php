<?php

namespace App\Filament\Resources\CompanyAboutResource\Pages;

use App\Filament\Resources\CompanyAboutResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCompanyAbouts extends ListRecords
{
    protected static string $resource = CompanyAboutResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
