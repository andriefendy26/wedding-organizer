<?php

namespace App\Filament\Resources\LayananResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BarangRelationManager extends RelationManager
{
    protected static string $relationship = 'Barang';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                FileUpload::make('foto')->required(),
                TextInput::make('nama')->required(),
                TextInput::make('deskripsi')->required(),
                TextInput::make('harga')->numeric()->required(),
                TextInput::make('stock')->numeric()->required(),
                Select::make('status')->options([
                    true => 'ada',
                    false => 'Kosong'    
                ])->required(),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('Barang')
            ->columns([
                TextColumn::make('nama'),
                TextColumn::make('deskripsi'),
                TextColumn::make('harga'),
                TextColumn::make('stock'),
                IconColumn::make('status')->boolean(),
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
