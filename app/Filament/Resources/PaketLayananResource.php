<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PaketLayananResource\Pages;
use App\Filament\Resources\PaketLayananResource\RelationManagers;
use App\Filament\Resources\PaketLayananResource\RelationManagers\PaketIncludeRelationManager;
use App\Models\PaketLayanan;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PaketLayananResource extends Resource
{
    protected static ?string $model = PaketLayanan::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Layanan';
     protected static ?int $navigationSort = 2;


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                Select::make('layanan_id')
                    ->relationship('layanan', 'nama')
                    ->searchable()
                    ->preload(),
                TextInput::make('nama_paket')
                    ->required()
                    ->maxLength(255),
                TextInput::make('detail_paket')
                    ->required()
                    ->maxLength(255),
                TextInput::make('deskripsi')
                    ->required()
                    ->maxLength(255),
                TextInput::make('harga')
                    ->numeric()
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                 TextColumn::make('nama_paket'),
                TextColumn::make('detail_paket'),
                TextColumn::make('deskripsi'),
                TextColumn::make('harga'),
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
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
            PaketIncludeRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPaketLayanans::route('/'),
            'create' => Pages\CreatePaketLayanan::route('/create'),
            'edit' => Pages\EditPaketLayanan::route('/{record}/edit'),
        ];
    }
}
