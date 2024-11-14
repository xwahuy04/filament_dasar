<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OurPrincipleResource\Pages;
use App\Filament\Resources\OurPrincipleResource\RelationManagers;
use App\Models\OurPrinciple;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\TextInput;    // Updated capitalization
use Filament\Tables\Columns\TextColumn; 
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class OurPrincipleResource extends Resource
{
    protected static ?string $model = OurPrinciple::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name'),
                TextInput::make('subtitle'),
                TextInput::make('thumbnail'),
                TextInput::make('icon'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name'),
                TextColumn::make('subtitle'),
                TextColumn::make('thumbnail'),
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
            'index' => Pages\ListOurPrinciples::route('/'),
            'create' => Pages\CreateOurPrinciple::route('/create'),
            'edit' => Pages\EditOurPrinciple::route('/{record}/edit'),
        ];
    }
}
