<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KalenderKetersediaanResource\Pages;
use App\Models\KalenderKetersediaan;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class KalenderKetersediaanResource extends Resource
{
    protected static ?string $model = KalenderKetersediaan::class;
    protected static ?string $navigationIcon = 'heroicon-o-calendar-days';
    protected static ?string $navigationLabel = 'Kalender Ketersediaan';
    protected static ?string $modelLabel = 'Ketersediaan';
    protected static ?string $pluralModelLabel = 'Kalender Ketersediaan';
    protected static ?string $navigationGroup = 'Manajemen Layanan';
    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Informasi Ketersediaan')
                    ->schema([
                        Forms\Components\Grid::make(2)
                            ->schema([
                                Forms\Components\DatePicker::make('start_date')
                                    ->required()
                                    ->native(false)
                                    ->displayFormat('d/m/Y')
                                    ->closeOnDateSelection()
                                    ->label('Tanggal Mulai')
                                    ->afterStateUpdated(function ($state, callable $set, callable $get) {
                                        $endDate = $get('end_date');
                                        if ($endDate && $state && $state > $endDate) {
                                            $set('end_date', $state);
                                        }
                                    }),

                                Forms\Components\DatePicker::make('end_date')
                                    ->required()
                                    ->native(false)
                                    ->displayFormat('d/m/Y')
                                    ->closeOnDateSelection()
                                    ->label('Tanggal Selesai')
                                    ->afterStateUpdated(function ($state, callable $set, callable $get) {
                                        $startDate = $get('start_date');
                                        if ($startDate && $state && $state < $startDate) {
                                            $set('start_date', $state);
                                        }
                                    })
                                    ->rule(function (callable $get) {
                                        return function (string $attribute, $value, $fail) use ($get) {
                                            $startDate = $get('start_date');
                                            if ($startDate && $value && $value < $startDate) {
                                                $fail('Tanggal selesai harus sama atau setelah tanggal mulai.');
                                            }
                                        };
                                    }),
                            ]),

                        Forms\Components\Select::make('status')
                            ->required()
                            ->options([
                                'available' => 'Tersedia',
                                'unavailable' => 'Tidak Tersedia',
                                'maintenance' => 'Maintenance',
                                'holiday' => 'Libur',
                            ])
                            ->default('available')
                            ->native(false)
                            ->label('Status'),

                        Forms\Components\Textarea::make('catatan')
                            ->maxLength(500)
                            ->rows(3)
                            ->placeholder('Masukkan catatan atau keterangan tambahan...')
                            ->label('Catatan'),

                        Forms\Components\Placeholder::make('periode_info')
                            ->label('Informasi Periode')
                            ->content(function (callable $get) {
                                $startDate = $get('start_date');
                                $endDate = $get('end_date');
                                
                                if (!$startDate || !$endDate) {
                                    return 'Pilih tanggal mulai dan selesai untuk melihat durasi periode.';
                                }
                                
                                $start = \Carbon\Carbon::parse($startDate);
                                $end = \Carbon\Carbon::parse($endDate);
                                $days = $start->diffInDays($end) + 1;
                                
                                return "Periode: {$days} hari (" . $start->format('d M Y') . " - " . $end->format('d M Y') . ")";
                            })
                            ->columnSpanFull(),
                    ])
                    ->columns(1),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('start_date')
                    ->date('d F Y')
                    ->sortable()
                    ->searchable()
                    ->label('start_date'),
                Tables\Columns\TextColumn::make('end_date')
                    ->date('d F Y')
                    ->sortable()
                    ->searchable()
                    ->label('end_date'),

                Tables\Columns\BadgeColumn::make('status')
                    ->colors([
                        'success' => 'available',
                        'danger' => 'unavailable',
                        'warning' => 'maintenance',
                        'secondary' => 'holiday',
                    ])
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'available' => 'Tersedia',
                        'unavailable' => 'Tidak Tersedia',
                        'maintenance' => 'Maintenance',
                        'holiday' => 'Libur',
                        default => $state,
                    })
                    ->label('Status'),

                Tables\Columns\TextColumn::make('catatan')
                    ->limit(50)
                    ->tooltip(function (Tables\Columns\TextColumn $column): ?string {
                        $state = $column->getState();
                        if (strlen($state) <= 50) {
                            return null;
                        }
                        return $state;
                    })
                    ->label('Catatan'),

                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime('d/m/Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->label('Dibuat'),

                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime('d/m/Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->label('Diperbarui'),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->options([
                        'available' => 'Tersedia',
                        'unavailable' => 'Tidak Tersedia',
                        'maintenance' => 'Maintenance',
                        'holiday' => 'Libur',
                    ])
                    ->label('Status'),

                Tables\Filters\Filter::make('periode')
                    ->form([
                        Forms\Components\DatePicker::make('dari_tanggal')
                            ->native(false)
                            ->label('Dari Tanggal'),
                        Forms\Components\DatePicker::make('sampai_tanggal')
                            ->native(false)
                            ->label('Sampai Tanggal'),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when(
                                $data['dari_tanggal'],
                                fn (Builder $query, $date): Builder => $query->where('end_date', '>=', $date),
                            )
                            ->when(
                                $data['sampai_tanggal'],
                                fn (Builder $query, $date): Builder => $query->where('start_date', '<=', $date),
                            );
                    })
                    ->indicateUsing(function (array $data): array {
                        $indicators = [];
                        if ($data['dari_tanggal'] ?? null) {
                            $indicators['dari_tanggal'] = 'Dari: ' . \Carbon\Carbon::parse($data['dari_tanggal'])->format('d/m/Y');
                        }
                        if ($data['sampai_tanggal'] ?? null) {
                            $indicators['sampai_tanggal'] = 'Sampai: ' . \Carbon\Carbon::parse($data['sampai_tanggal'])->format('d/m/Y');
                        }
                        return $indicators;
                    }),

                Tables\Filters\Filter::make('aktif_sekarang')
                    ->label('Periode Aktif')
                    ->query(function (Builder $query): Builder {
                        $today = now()->toDateString();
                        return $query->where('start_date', '<=', $today)
                                   ->where('end_date', '>=', $today);
                    })
                    ->toggle(),

                Tables\Filters\Filter::make('akan_datang')
                    ->label('Periode Mendatang')
                    ->query(function (Builder $query): Builder {
                        return $query->where('start_date', '>', now()->toDateString());
                    })
                    ->toggle(),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    
                    Tables\Actions\BulkAction::make('update_status')
                        ->label('Update Status')
                        ->icon('heroicon-m-pencil-square')
                        ->form([
                            Forms\Components\Select::make('status')
                                ->required()
                                ->options([
                                    'available' => 'Tersedia',
                                    'unavailable' => 'Tidak Tersedia',
                                    'maintenance' => 'Maintenance',
                                    'holiday' => 'Libur',
                                ])
                                ->label('Status Baru'),
                        ])
                        ->action(function (array $data, $records) {
                            foreach ($records as $record) {
                                $record->update(['status' => $data['status']]);
                            }
                        })
                        ->deselectRecordsAfterCompletion(),
                ]),
            ])
            ->defaultSort('start_date', 'desc')
            ->paginated([10, 25, 50, 100]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListKalenderKetersediaans::route('/'),
            'create' => Pages\CreateKalenderKetersediaan::route('/create'),
            'edit' => Pages\EditKalenderKetersediaan::route('/{record}/edit'),
        ];
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::where('status', 'unavailable')->count() ?: null;
    }

    public static function getNavigationBadgeColor(): ?string
    {
        return 'warning';
    }
}