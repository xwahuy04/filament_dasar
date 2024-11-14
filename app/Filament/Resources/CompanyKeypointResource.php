<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CompanyKeypointResource\Pages;
use App\Filament\Resources\CompanyKeypointResource\RelationManagers;
use App\Models\CompanyAbout;
use App\Models\CompanyKeypoint;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Forms\Components\Select;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CompanyKeypointResource extends Resource
{
    protected static ?string $model = CompanyKeypoint::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('keypoint'),
                Select::make('company_about_id')
                ->options(options: CompanyAbout::pluck('name', 'id'))
                ->searchable()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('keypoint'),
                TextColumn::make('companyAbout.name'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCompanyKeypoints::route('/'),
            'create' => Pages\CreateCompanyKeypoint::route('/create'),
            'edit' => Pages\EditCompanyKeypoint::route('/{record}/edit'),
        ];
    }
}
