<?php

namespace App\Filament\Resources\TeamResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Grid;

class PortofoliosRelationManager extends RelationManager
{
    protected static string $relationship = 'portofolios';
    
    protected static ?string $title = 'Portofolio';
    
    protected static ?string $modelLabel = 'Portofolio';
    
    protected static ?string $pluralModelLabel = 'Portofolio';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Informasi Portofolio')
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                TextInput::make('judul')
                                    ->label('Judul Portofolio')
                                    ->required()
                                    ->maxLength(255)
                                    ->placeholder('Masukkan judul portofolio')
                                    ->columnSpan(1),
                                    
                                Select::make('kategori')
                                    ->label('Kategori')
                                    ->options([
                                        'wedding' => 'Wedding',
                                        'decoration' => 'Dekorasi',
                                        'catering' => 'Catering',
                                        'photography' => 'Fotografi',
                                        'other' => 'Lainnya',
                                    ])
                                    ->searchable()
                                    ->columnSpan(1),
                            ]),
                            
                        Textarea::make('deskripsi')
                            ->label('Deskripsi')
                            ->rows(3)
                            ->maxLength(500)
                            ->placeholder('Deskripsi portofolio...')
                            ->columnSpanFull(),
                            
                        Grid::make(2)
                            ->schema([
                                DatePicker::make('tanggal')
                                    ->label('Tanggal Proyek')
                                    ->displayFormat('d F Y')
                                    ->columnSpan(1),
                                    
                                TextInput::make('lokasi')
                                    ->label('Lokasi')
                                    ->maxLength(255)
                                    ->placeholder('Lokasi proyek')
                                    ->columnSpan(1),
                            ]),
                            
                        FileUpload::make('gambar')
                            ->label('Gambar Portofolio')
                            ->image()
                            ->multiple()
                            ->directory('portfolio')
                            ->disk('public')
                            ->imageEditor()
                            ->maxSize(2048)
                            ->maxFiles(10)
                            ->reorderable()
                            ->columnSpanFull(),
                    ]),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('judul')
            ->columns([
                ImageColumn::make('gambar')
                    ->label('Gambar')
                    ->size(60)
                    ->limit(1)
                    ->limitedRemainingText(size: 'sm')
                    ->stacked(),
                    
                TextColumn::make('judul')
                    ->label('Judul')
                    ->searchable()
                    ->sortable()
                    ->weight('semibold'),
                    
                TextColumn::make('kategori')
                    ->label('Kategori')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'wedding' => 'success',
                        'decoration' => 'info',
                        'catering' => 'warning',
                        'photography' => 'danger',
                        default => 'gray',
                    })
                    ->searchable(),
                    
                TextColumn::make('tanggal')
                    ->label('Tanggal')
                    ->date('d M Y')
                    ->sortable(),
                    
                TextColumn::make('lokasi')
                    ->label('Lokasi')
                    ->limit(30)
                    ->searchable()
                    ->toggleable(),
                    
                TextColumn::make('created_at')
                    ->label('Dibuat')
                    ->dateTime('d M Y')
                    ->sortable()
                    ->toggleable()
                    ->toggledHiddenByDefault(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('kategori')
                    ->label('Kategori')
                    ->options([
                        'wedding' => 'Wedding',
                        'decoration' => 'Dekorasi',
                        'catering' => 'Catering',
                        'photography' => 'Fotografi',
                        'other' => 'Lainnya',
                    ]),
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make()
                    ->label('Tambah Portofolio'),
            ])
            ->actions([
                Tables\Actions\ViewAction::make()
                    ->label('Lihat'),
                Tables\Actions\EditAction::make()
                    ->label('Edit'),
                Tables\Actions\DeleteAction::make()
                    ->label('Hapus')
                    ->requiresConfirmation(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()
                        ->requiresConfirmation(),
                ]),
            ])
            ->defaultSort('created_at', 'desc')
            ->emptyStateHeading('Belum ada portofolio')
            ->emptyStateDescription('Tambahkan portofolio pertama untuk anggota tim ini.')
            ->emptyStateIcon('heroicon-o-photo');
    }
}