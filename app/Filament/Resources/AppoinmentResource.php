<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AppoinmentResource\Pages;
use App\Filament\Resources\AppoinmentResource\RelationManagers;
use App\Models\Appoinment;
use App\Models\Appointment;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Actions\ExportAction;
use pxlrbt\FilamentExcel\Actions\Tables\ExportBulkAction;
use pxlrbt\FilamentExcel\Exports\ExcelExport;

class AppoinmentResource extends Resource
{
    protected static ?string $model = Appointment::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')->required(),
                Select::make("product_id")
                    ->options(Product::pluck("name", "id"))
                    ->searchable(),
                TextInput::make('phone_number')->required(),
                TextInput::make('brief')->required(),
                TextInput::make('budget')->required(),
                TextInput::make('email')->required(),
                DatePicker::make('meeting_at')

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name'),
                TextColumn::make('phone_number'),
                TextColumn::make('brief'),
                TextColumn::make('budget'),
                TextColumn::make('email'),
                TextColumn::make('meeting_at'),
                TextColumn::make('product.name')

            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
                
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    ExportBulkAction::make()
                        ->exports([
                            ExcelExport::make()
                                ->fromTable()
                                ->withFilename(date('Y-m-d') . '-appointments')
                        ])
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
            'index' => Pages\ListAppoinments::route('/'),
            'create' => Pages\CreateAppoinment::route('/create'),
            'edit' => Pages\EditAppoinment::route('/{record}/edit'),
        ];
    }
}
