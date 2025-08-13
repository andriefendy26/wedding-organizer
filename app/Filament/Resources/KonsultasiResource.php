<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KonsultasiResource\Pages;
use App\Filament\Resources\KonsultasiResource\RelationManagers;
use App\Models\Konsultasi;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class KonsultasiResource extends Resource
{
    protected static ?string $model = Konsultasi::class;

    protected static ?string $navigationIcon = 'solar-chat-line-bold';
    protected static ?string $navigationGroup = 'Manajemen Layanan';
     
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                \Filament\Forms\Components\TextInput::make('nama')->required(),
                \Filament\Forms\Components\TextInput::make('email')->email()->required(),
                \Filament\Forms\Components\TextInput::make('no_hp')->label('No HP')->required(),
                \Filament\Forms\Components\DatePicker::make('tanggal')->label('Tanggal')->required(),
                \Filament\Forms\Components\Textarea::make('deskripsi')->label('Deskripsi')->rows(8)->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                \Filament\Tables\Columns\TextColumn::make('nama')->searchable(),
                \Filament\Tables\Columns\TextColumn::make('email'),
                \Filament\Tables\Columns\TextColumn::make('no_hp')->label('No HP'),
                \Filament\Tables\Columns\TextColumn::make('deskripsi')->label('Deskripsi')->limit(30),
                \Filament\Tables\Columns\TextColumn::make('tanggal')->label('Tanggal'),
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
            'index' => Pages\ListKonsultasis::route('/'),
            'create' => Pages\CreateKonsultasi::route('/create'),
            'edit' => Pages\EditKonsultasi::route('/{record}/edit'),
        ];
    }
}
