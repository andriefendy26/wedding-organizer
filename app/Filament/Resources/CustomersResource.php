<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CustomersResource\Pages;
use App\Filament\Resources\CustomersResource\RelationManagers;
use App\Models\Customers;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CustomersResource extends Resource
{
    protected static ?string $model = Customers::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Manajemen Layanan';
    protected static ?int $navigationSort = 0;
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                \Filament\Forms\Components\TextInput::make('nama')->label('Nama')->required(),
                \Filament\Forms\Components\Select::make('jenis_kelamin')
                    ->label('Jenis Kelamin')
                    ->options([
                        'Laki Laki' => 'Laki Laki',
                        'Perempuan' => 'Perempuan',
                    ])
                    ->required(),
                \Filament\Forms\Components\TextInput::make('telpon')->label('Telpon')->required(),
                \Filament\Forms\Components\TextInput::make('alamat')->label('Alamat')->required(),
                \Filament\Forms\Components\TextInput::make('NIK')->label('NIK')->required(),
                \Filament\Forms\Components\FileUpload::make('foto_ktp')->label('Foto KTP')->image()->maxSize(2048),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                \Filament\Tables\Columns\TextColumn::make('nama')->label('Nama'),
                \Filament\Tables\Columns\TextColumn::make('jenis_kelamin')->label('Jenis Kelamin'),
                \Filament\Tables\Columns\TextColumn::make('telpon')->label('Telpon'),
                \Filament\Tables\Columns\TextColumn::make('alamat')->label('Alamat'),
                \Filament\Tables\Columns\TextColumn::make('NIK')->label('NIK'),
                \Filament\Tables\Columns\TextColumn::make('foto_ktp')->label('Foto KTP'),
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
            'index' => Pages\ListCustomers::route('/'),
            'create' => Pages\CreateCustomers::route('/create'),
            'edit' => Pages\EditCustomers::route('/{record}/edit'),
        ];
    }
}
