<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SewaLayananResource\Pages;
use App\Filament\Resources\SewaLayananResource\RelationManagers;
use App\Models\SewaLayanan;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SewaLayananResource extends Resource
{
    protected static ?string $model = SewaLayanan::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                Select::make('layanan_id')->relationship('Layanan', 'nama'),
                DatePicker::make('tanggal_sewa'),
                DatePicker::make('tanggal_kembali'),
                TextInput::make('total_biaya'),
                Select::make('status')->options([
                    true => 'Lunas',
                    false => 'Belum Lunas'
                ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
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
            'index' => Pages\ListSewaLayanan::route('/'),
            'create' => Pages\CreateSewaLayanan::route('/create'),
            'edit' => Pages\EditSewaLayanan::route('/{record}/edit'),
        ];
    }
}
