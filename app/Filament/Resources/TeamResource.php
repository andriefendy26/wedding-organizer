<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TeamResource\Pages;
use App\Filament\Resources\TeamResource\RelationManagers;
use App\Models\Team;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Select;
use Filament\Tables\Actions\Action;
use Filament\Support\Enums\FontWeight;

class TeamResource extends Resource
{
    protected static ?string $model = Team::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';
    
    protected static ?string $navigationLabel = 'Tim';
    
    protected static ?string $modelLabel = 'Tim';
    
    protected static ?string $pluralModelLabel = 'Tim';
    
    protected static ?string $navigationGroup = 'Konten Website';
    
    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Informasi Personal')
                    ->description('Informasi dasar anggota tim')
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                TextInput::make('nama')
                                    ->label('Nama Lengkap')
                                    ->required()
                                    ->maxLength(255)
                                    ->placeholder('Masukkan nama lengkap')
                                    ->columnSpan(1),

                                
                                Select::make('jabatan')
                                    ->label('Jabatan')
                                    ->options([
                                        'Lead Wedding Planner' => 'Lead Wedding Planner', 
                                        'Creative Director' => 'Creative Director', 
                                        'Event Coordinator' => 'Event Coordinator',
                                        'Wedding Planner' => 'Wedding Planner',
                                        'Director' => 'Director',
                                        'Marketing' => 'Marketing',
                                        'Finance' => 'Finance',
                                        'Logistics' => 'Logistics',
                                        'Customer Service' => 'Customer Service',
                                        // 'Other' => 'Lainnya'
                                    ])
                                    ->required()
                                    ->placeholder('Pilih jabatan')
                                    ->columnSpan(1),
                                    
                                // TextInput::make('jabatan')
                                //     ->label('Jabatan')
                                //     ->required()
                                //     ->maxLength(255)
                                //     ->placeholder('Masukkan jabatan')
                                //     ->columnSpan(1),
                            ]),
                            
                        FileUpload::make('foto')
                            ->label('Foto Profil')
                            ->image()
                            ->directory('team')
                            ->disk('public')
                            ->imageEditor()
                            ->imageCropAspectRatio('1:1')
                            ->imageResizeTargetWidth('400')
                            ->imageResizeTargetHeight('400')
                            ->maxSize(2048)
                            ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp'])
                            ->helperText('Upload foto profil (max 2MB, format: JPG, PNG, WEBP)')
                            ->columnSpanFull(),
                    ]),
                    
                Section::make('Informasi Kontak')
                    ->description('Informasi kontak anggota tim')
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                TextInput::make('telepon')
                                    ->label('Nomor Telepon')
                                    ->tel()
                                    ->placeholder('08xxxxxxxxxx')
                                    ->maxLength(20)
                                    ->prefixIcon('heroicon-m-phone')
                                    ->columnSpan(1),
                                    
                                TextInput::make('email')
                                    ->label('Email')
                                    ->email()
                                    ->placeholder('nama@example.com')
                                    ->maxLength(255)
                                    ->prefixIcon('heroicon-m-envelope')
                                    ->columnSpan(1),
                            ]),
                    ]),
                    
                Section::make('Deskripsi')
                    ->description('Deskripsi dan bio anggota tim')
                    ->schema([
                        Textarea::make('deskripsi')
                            ->label('Deskripsi/Bio')
                            ->placeholder('Masukkan deskripsi atau bio singkat...')
                            ->rows(4)
                            ->maxLength(1000)
                            ->columnSpanFull(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('foto')
                    ->label('Foto')
                    ->circular()
                    ->size(50)
                    ->defaultImageUrl(url('/images/default-avatar.png'))
                    ->extraAttributes(['class' => 'shadow-md']),
                    
                TextColumn::make('nama')
                    ->label('Nama')
                    ->searchable()
                    ->sortable()
                    ->weight(FontWeight::SemiBold)
                    ->copyable()
                    ->copyMessage('Nama berhasil disalin!')
                    ->tooltip('Klik untuk menyalin'),
                    
                TextColumn::make('jabatan')
                    ->label('Jabatan')
                    ->searchable()
                    ->sortable()
                    ->badge()
                    ->color('info'),
                    
                TextColumn::make('telepon')
                    ->label('Telepon')
                    ->searchable()
                    ->copyable()
                    ->copyMessage('Nomor telepon berhasil disalin!')
                    ->formatStateUsing(function ($state) {
                        return $state ? $state : '-';
                    })
                    ->toggleable(),
                    
                TextColumn::make('email')
                    ->label('Email')
                    ->searchable()
                    ->copyable()
                    ->copyMessage('Email berhasil disalin!')
                    ->formatStateUsing(function ($state) {
                        return $state ? $state : '-';
                    })
                    ->toggleable(),
                    
                TextColumn::make('deskripsi')
                    ->label('Deskripsi')
                    ->limit(50)
                    ->tooltip(function (TextColumn $column): ?string {
                        $state = $column->getState();
                        return strlen($state) > 50 ? $state : null;
                    })
                    ->toggleable()
                    ->toggledHiddenByDefault(),
                    
                TextColumn::make('created_at')
                    ->label('Dibuat')
                    ->dateTime('d M Y, H:i')
                    ->sortable()
                    ->toggleable()
                    ->toggledHiddenByDefault(),
                    
                TextColumn::make('updated_at')
                    ->label('Diperbarui')
                    ->dateTime('d M Y, H:i')
                    ->sortable()
                    ->toggleable()
                    ->toggledHiddenByDefault(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('jabatan')
                    ->label('Filter Jabatan')
                    ->options(function () {
                        return Team::distinct('jabatan')
                            ->whereNotNull('jabatan')
                            ->pluck('jabatan', 'jabatan')
                            ->toArray();
                    })
                    ->searchable()
                    ->preload(),
            ])
            ->actions([
                Tables\Actions\ViewAction::make()
                    ->label('Lihat')
                    ->color('info'),
                Tables\Actions\EditAction::make()
                    ->label('Edit')
                    ->color('warning'),
                Tables\Actions\DeleteAction::make()
                    ->label('Hapus')
                    ->requiresConfirmation()
                    ->modalHeading('Hapus Anggota Tim')
                    ->modalDescription('Apakah Anda yakin ingin menghapus anggota tim ini? Data yang sudah dihapus tidak dapat dikembalikan.')
                    ->modalSubmitActionLabel('Ya, Hapus'),
                Action::make('contact')
                    ->label('Kontak')
                    ->icon('heroicon-o-phone')
                    ->color('success')
                    ->url(function (Team $record) {
                        return $record->telepon ? 'tel:' . $record->telepon : '#';
                    })
                    ->openUrlInNewTab()
                    ->visible(fn (Team $record) => !empty($record->telepon)),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()
                        ->requiresConfirmation()
                        ->modalHeading('Hapus Anggota Tim Terpilih')
                        ->modalDescription('Apakah Anda yakin ingin menghapus semua anggota tim yang dipilih? Data yang sudah dihapus tidak dapat dikembalikan.')
                        ->modalSubmitActionLabel('Ya, Hapus Semua'),
                ]),
            ])
            ->defaultSort('created_at', 'desc')
            ->striped()
            ->paginated([10, 25, 50, 100]);
    }

    public static function getRelations(): array
    {
        return [
            RelationManagers\PortofoliosRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTeams::route('/'),
            'create' => Pages\CreateTeam::route('/create'),
            'view' => Pages\ViewTeam::route('/{record}'),
            'edit' => Pages\EditTeam::route('/{record}/edit'),
        ];
    }
    
    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }
    
    public static function getNavigationBadgeColor(): string|array|null
    {
        return static::getModel()::count() > 10 ? 'warning' : 'primary';
    }
}