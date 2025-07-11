<?php

namespace App\Filament\Resources\LayananResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PaketLayananRelationManager extends RelationManager
{
    protected static string $relationship = 'paketLayanan';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
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

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('paketLayanan')
            ->columns([
                TextColumn::make('nama_paket'),
                TextColumn::make('detail_paket'),
                TextColumn::make('deskripsi'),
                TextColumn::make('harga'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
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
}
