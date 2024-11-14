<?php

namespace App\Filament\Resources\CompanyKeypointResource\Pages;

use App\Filament\Resources\CompanyKeypointResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCompanyKeypoints extends ListRecords
{
    protected static string $resource = CompanyKeypointResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
