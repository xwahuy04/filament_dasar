<?php

namespace App\Filament\Resources\CompanyStaticResource\Pages;

use App\Filament\Resources\CompanyStaticResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateCompanyStatic extends CreateRecord
{
    protected static string $resource = CompanyStaticResource::class;
}
