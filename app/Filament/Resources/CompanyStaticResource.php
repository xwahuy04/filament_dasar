<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CompanyStaticResource\Pages;
use App\Filament\Resources\CompanyStaticResource\RelationManagers;
use App\Models\CompanyStatic;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\TextInput;    // Updated capitalization
use Filament\Tables\Columns\TextColumn;     
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CompanyStaticResource extends Resource
{
    protected static ?string $model = CompanyStatic::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name'),
                TextInput::make('goal'),
                TextInput::make('icon'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name'),
                TextColumn::make('goal'),
                TextColumn::make('icon'),
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
            'index' => Pages\ListCompanyStatics::route('/'),
            'create' => Pages\CreateCompanyStatic::route('/create'),
            'edit' => Pages\EditCompanyStatic::route('/{record}/edit'),
        ];
    }
}
