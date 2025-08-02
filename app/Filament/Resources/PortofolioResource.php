<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PortofolioResource\Pages;
use App\Filament\Resources\PortofolioResource\RelationManagers;
use App\Models\Portofolio;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\DatePicker;
use Filament\Tables\Columns\TextColumn;

class PortofolioResource extends Resource
{
    protected static ?string $model = Portofolio::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    // protected static ?string $navigationGroup = 'Content'; 

    protected static ?string $navigationGroup = 'Manajemen Konten';
    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('layanan_id')->relationship('layanan', 'nama')->label('Layanan')->required(),
                TextInput::make('judul')->required(),
                TextInput::make('kategori')->required(),
                Textarea::make('deskripsi'),
                TextInput::make('url'),
                DatePicker::make('tanggal_event')->label('Tanggal Event'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('judul')->searchable(),
                TextColumn::make('kategori'),
                TextColumn::make('tanggal_event')->date(),
            ])
            ->filters([
                // Tambahkan filter jika perlu
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            \App\Filament\Resources\PortofolioResource\RelationManagers\GaleryRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPortofolios::route('/'),
            'create' => Pages\CreatePortofolio::route('/create'),
            'edit' => Pages\EditPortofolio::route('/{record}/edit'),
        ];
    }
}
