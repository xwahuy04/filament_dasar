<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OurTeamResource\Pages;
use App\Filament\Resources\OurTeamResource\RelationManagers;
use App\Models\OurTeam;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\TextInput;    // Updated capitalization
use Filament\Tables\Columns\TextColumn; 
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class OurTeamResource extends Resource
{
    protected static ?string $model = OurTeam::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
            TextInput::make('name'),
            TextInput::make('occupation'),
            TextInput::make('avatar'),
            TextInput::make('location'),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name'),
                TextColumn::make('occupation'),
                TextColumn::make('avatar'),
                TextColumn::make('location'),
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
            'index' => Pages\ListOurTeams::route('/'),
            'create' => Pages\CreateOurTeam::route('/create'),
            'edit' => Pages\EditOurTeam::route('/{record}/edit'),
        ];
    }
}
