<?php
namespace App\Filament\Resources\PortofolioResource\RelationManagers;

use App\Models\Galery;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;

class GaleryRelationManager extends RelationManager
{
    protected static string $relationship = 'galery';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                FileUpload::make('foto')->image()->maxSize(2048)->required(),
                TextInput::make('nama')->required(),
                Textarea::make('deskripsi'),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('foto'),
                TextColumn::make('nama')->searchable(),
                TextColumn::make('deskripsi')->limit(30),
            ])
            ->filters([
                // Tambahkan filter jika perlu
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }
}
