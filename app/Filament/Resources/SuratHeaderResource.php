<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SuratHeaderResource\Pages;
use App\Models\SuratHeader;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Toggle;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Filters\TernaryFilter;

class SuratHeaderResource extends Resource
{
    protected static ?string $model = SuratHeader::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-office';

    protected static ?string $navigationGroup = 'E-Surat';

    protected static ?string $navigationLabel = 'Header Surat';

    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Informasi Instansi')
                    ->schema([
                        TextInput::make('nama_instansi')
                            ->label('Nama Instansi')
                            ->required()
                            ->maxLength(255),

                        Textarea::make('alamat_instansi')
                            ->label('Alamat Instansi')
                            ->required()
                            ->rows(3)
                            ->maxLength(500),

                        TextInput::make('telepon')
                            ->label('Telepon')
                            ->tel()
                            ->maxLength(20),

                        TextInput::make('email')
                            ->label('Email')
                            ->email()
                            ->maxLength(255),

                        TextInput::make('website')
                            ->label('Website')
                            ->url()
                            ->maxLength(255),
                    ])
                    ->columns(2),

                Forms\Components\Section::make('Logo & Kop Surat')
                    ->schema([
                        FileUpload::make('logo_path')
                            ->label('Logo Instansi')
                            ->image()
                            ->directory('surat/logo')
                            ->maxSize(1024)
                            ->helperText('Maksimal 1MB, format: JPG, PNG, GIF'),

                        Textarea::make('kop_surat')
                            ->label('Kop Surat (Opsional)')
                            ->rows(5)
                            ->maxLength(1000)
                            ->helperText('Jika diisi, akan menggantikan informasi instansi di atas'),

                        Toggle::make('is_active')
                            ->label('Aktif')
                            ->default(true)
                            ->helperText('Hanya satu header yang dapat aktif pada satu waktu'),
                    ])
                    ->columns(1),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('logo_path')
                    ->label('Logo')
                    ->circular()
                    ->size(40),

                TextColumn::make('nama_instansi')
                    ->label('Nama Instansi')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('alamat_instansi')
                    ->label('Alamat')
                    ->limit(50)
                    ->searchable(),

                TextColumn::make('telepon')
                    ->label('Telepon')
                    ->searchable(),

                IconColumn::make('is_active')
                    ->label('Aktif')
                    ->boolean()
                    ->trueIcon('heroicon-o-check-circle')
                    ->falseIcon('heroicon-o-x-circle')
                    ->trueColor('success')
                    ->falseColor('gray'),

                TextColumn::make('created_at')
                    ->label('Dibuat')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                TernaryFilter::make('is_active')
                    ->label('Status Aktif'),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('created_at', 'desc');
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
            'index' => Pages\ListSuratHeaders::route('/'),
            'create' => Pages\CreateSuratHeader::route('/create'),
            'edit' => Pages\EditSuratHeader::route('/{record}/edit'),
            'view' => Pages\ViewSuratHeader::route('/{record}'),
        ];
    }
}
