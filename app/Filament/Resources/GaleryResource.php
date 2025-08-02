<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GaleryResource\Pages;
use App\Filament\Resources\GaleryResource\RelationManagers;
use App\Models\Galery;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class GaleryResource extends Resource
{
    protected static ?string $model = Galery::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Manajemen Konten';
    protected static ?int $navigationSort = 0;
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                \Filament\Forms\Components\Select::make('portofolio_id')
                    ->relationship('portofolio', 'judul')
                    ->label('Portofolio')
                    ->required(),
                \Filament\Forms\Components\FileUpload::make('foto')
                    ->image()
                    ->maxSize(2048)
                    ->required(),
                \Filament\Forms\Components\TextInput::make('nama')->required(),
                \Filament\Forms\Components\Textarea::make('deskripsi'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                \Filament\Tables\Columns\TextColumn::make('portofolio.judul')->label('Portofolio'),
                \Filament\Tables\Columns\ImageColumn::make('foto'),
                \Filament\Tables\Columns\TextColumn::make('nama')->searchable(),
                \Filament\Tables\Columns\TextColumn::make('deskripsi')->limit(30),
            ])
            ->filters([
                // Tambahkan filter jika perlu
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
            'index' => Pages\ListGaleries::route('/'),
            'create' => Pages\CreateGalery::route('/create'),
            'edit' => Pages\EditGalery::route('/{record}/edit'),
        ];
    }
}
