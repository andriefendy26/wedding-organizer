<?php

namespace App\Filament\Resources\PaketLayananResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PaketIncludeRelationManager extends RelationManager
{
    protected static string $relationship = 'PaketInclude';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                // Select::make('paket_layanan_id')->relationship('paketLayanan' , 'nama_paket')->required(),
                Select::make('include_id')->relationship('Include', 'nama_include')->required(),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('PaketInclude')
            ->columns([
                TextColumn::make('Include.nama_include'),
                
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
