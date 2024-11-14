<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProjectClientResource\Pages;
use App\Filament\Resources\ProjectClientResource\RelationManagers;
use App\Models\ProjectClient;
use Faker\Core\File;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\TextInput;  // Changed from filament to Filament
use Filament\Tables\Columns\TextColumn;   // Changed from filament to Filament
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Columns\ImageColumn;

class ProjectClientResource extends Resource
{
    protected static ?string $model = ProjectClient::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
{
    return $form
        ->schema([
            TextInput::make('name')
                ->required(),
            TextInput::make('occupation'),
            FileUpload::make('avatar')
                ->image()
                ->directory('avatar')
                ->label('Avatar'),
            FileUpload::make('logo')
                ->image()
                ->directory('logo')
                ->label('Logo')
        ]);
}


    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name'),
                TextColumn::make('occupation'),
                ImageColumn::make('avatar')
                ->label("Avatar Klien"),
                ImageColumn::make('logo')
                ->label("Logo Klien"),
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
            'index' => Pages\ListProjectClients::route('/'),
            'create' => Pages\CreateProjectClient::route('/create'),
            'edit' => Pages\EditProjectClient::route('/{record}/edit'),
        ];
    }
}
