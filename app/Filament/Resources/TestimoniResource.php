<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TestimoniResource\Pages;
use App\Models\Testimoni;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Tables\Actions\Action;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;

class TestimoniResource extends Resource
{
    protected static ?string $model = Testimoni::class;

    protected static ?string $navigationIcon = 'heroicon-o-chat-bubble-left-right';

    protected static ?string $navigationLabel = 'Testimoni';

    protected static ?string $pluralModelLabel = 'Testimoni';

    protected static ?string $modelLabel = 'Testimoni';

    protected static ?string $navigationGroup = 'Konten Website';

    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                TextInput::make('nama')
                                    ->label('Nama Pelanggan')
                                    ->required()
                                    ->maxLength(255)
                                    ->placeholder('Masukkan nama pelanggan'),
                                TextInput::make('email')
                                    ->label('Email')
                                    // ->required()
                                    ->maxLength(255)
                                    ->placeholder('Masukkan nama pelanggan'),
                                
                            ]),

                        Grid::make(2)
                            ->schema([
                                TextInput::make('no_telp')
                                    ->label('No Telpon')
                                    // ->required()
                                    ->maxLength(255)
                                    ->placeholder('Masukkan nama pelanggan'),
                                Select::make('rating')
                                    ->label('Rating')
                                    ->required()
                                    ->options([
                                        1 => '⭐ 1 - Sangat Buruk',
                                        2 => '⭐⭐ 2 - Buruk', 
                                        3 => '⭐⭐⭐ 3 - Cukup',
                                        4 => '⭐⭐⭐⭐ 4 - Baik',
                                        5 => '⭐⭐⭐⭐⭐ 5 - Sangat Baik'
                                    ])
                                    ->default(5)
                                    ->native(false),

                                FileUpload::make('foto')
                                    ->label('Foto Profil')
                                    ->image()
                                    ->directory('testimoni')
                                    ->disk('public')
                                    ->visibility('public')
                                    ->imageEditor()
                                    ->imageEditorAspectRatios([
                                        '1:1',
                                    ])
                                    ->maxSize(2048)
                                    ->helperText('Upload foto profil (opsional, max 2MB)')
                                    ->columnSpanFull(),
                            ]),
                           Select::make('status')
                                ->label('Status')
                                ->options([
                                    'pending' => 'Menunggu Persetujuan',
                                    'approved' => 'Disetujui', 
                                    'rejected' => 'Ditolak'
                                ])
                                ->default('pending')
                                ->required(),

                            Textarea::make('deskripsi')
                                ->label('Deskripsi Testimoni')
                                ->required()
                                ->rows(4)
                                ->maxLength(500)
                                ->placeholder('Tulis testimoni pelanggan di sini...')
                                ->columnSpanFull(),
                 ])
                    ->columns(1),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('foto')
                    ->label('Foto')
                    ->circular()
                    ->defaultImageUrl(fn ($record) => 'https://ui-avatars.com/api/?name=' . urlencode($record->nama) . '&color=7F9CF5&background=EBF4FF')
                    ->size(50),

                TextColumn::make('nama')
                    ->label('Nama')
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),

                TextColumn::make('rating')
                    ->label('Rating')
                    ->formatStateUsing(fn ($state) => str_repeat('⭐', $state))
                    ->sortable(),
                
                TextColumn::make('status')
                        ->label('Status')
                        ->badge()
                        ->color(fn (string $state): string => match ($state) {
                            'pending' => 'warning',
                            'approved' => 'success',
                            'rejected' => 'danger',
                        })
                        ->formatStateUsing(fn (string $state): string => match ($state) {
                            'pending' => 'Menunggu',
                            'approved' => 'Disetujui',
                            'rejected' => 'Ditolak',
                        }),

                TextColumn::make('deskripsi')
                    ->label('Testimoni')
                    ->limit(50)
                    ->tooltip(function (TextColumn $column): ?string {
                        $state = $column->getState();
                        if (strlen($state) <= 50) {
                            return null;
                        }
                        return $state;
                    }),

                TextColumn::make('created_at')
                    ->label('Dibuat')
                    ->dateTime('d M Y, H:i')
                    ->sortable()
                    ->toggleable(),

                TextColumn::make('updated_at')
                    ->label('Diupdate')
                    ->dateTime('d M Y, H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('status')
                    ->label('Filter Status')
                    ->options([
                        'pending' => 'Menunggu',
                        'approved' => 'Disetujui',
                        'rejected' => 'Ditolak'
                    ]),
                SelectFilter::make('rating')
                    ->label('Filter Rating')
                    ->options([
                        1 => '⭐ 1 Star',
                        2 => '⭐⭐ 2 Stars',
                        3 => '⭐⭐⭐ 3 Stars', 
                        4 => '⭐⭐⭐⭐ 4 Stars',
                        5 => '⭐⭐⭐⭐⭐ 5 Stars'
                    ]),

                SelectFilter::make('has_user')
                    ->label('Tipe User')
                    ->options([
                        'yes' => 'Registered User',
                        'no' => 'Guest User'
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when(
                                $data['value'] === 'yes',
                                fn (Builder $query, $value): Builder => $query->whereNotNull('user_id'),
                            )
                            ->when(
                                $data['value'] === 'no',
                                fn (Builder $query, $value): Builder => $query->whereNull('user_id'),
                            );
                    }),
            ])
            ->actions([
                Tables\Actions\ViewAction::make()
                    ->label('Lihat'),
                Tables\Actions\EditAction::make()
                    ->label('Edit'),
                Tables\Actions\DeleteAction::make()
                    ->label('Hapus'),
                    Action::make('approve')
                        ->label('Setujui')
                        ->icon('heroicon-o-check-circle')
                        ->color('success')
                        ->requiresConfirmation()
                        ->visible(fn ($record) => $record->status !== 'approved')
                        ->action(function ($record) {
                            $record->update(['status' => 'approved']);
                            Notification::make()
                                ->title('Testimoni disetujui')
                                ->success()
                                ->send();
                        }), 
                    Action::make('reject')
                        ->label('Tolak')
                        ->icon('heroicon-o-x-circle')
                        ->color('danger')
                        ->requiresConfirmation()
                        ->visible(fn ($record) => $record->status !== 'rejected')
                        ->action(function ($record) {
                            $record->update(['status' => 'rejected']);
                            Notification::make()
                                ->title('Testimoni ditolak')
                                ->success()
                                ->send();
                        }),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()
                        ->label('Hapus Terpilih'),
                ]),
            ])
            ->defaultSort('created_at', 'desc')
            ->poll('30s'); // Auto refresh setiap 30 detik
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
            'index' => Pages\ListTestimoni::route('/'),
            'create' => Pages\CreateTestimoni::route('/create'),
            'view' => Pages\ViewTestimoni::route('/{record}'),
            'edit' => Pages\EditTestimoni::route('/{record}/edit'),
        ];
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function getNavigationBadgeColor(): string|array|null
    {
        return static::getModel()::count() > 10 ? 'success' : 'warning';
    }
}