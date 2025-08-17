<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SuratResource\Pages;
use App\Models\Surat;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\BulkAction;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\DatePicker;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;

class SuratResource extends Resource
{
    protected static ?string $model = Surat::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static ?string $navigationGroup = 'E-Surat';

    protected static ?string $navigationLabel = 'Surat';

    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Informasi Surat')
                    ->schema([
                        Select::make('jenis_surat')
                            ->label('Jenis Surat')
                            ->options([
                                Surat::JENIS_KETERANGAN => 'Surat Keterangan',
                                Surat::JENIS_PENGANTAR => 'Surat Pengantar',
                            ])
                            ->required()
                            ->reactive()
                            ->afterStateUpdated(function ($state, callable $set) {
                                if ($state) {
                                    $template = \App\Models\SuratTemplate::getDefaultTemplate($state);
                                    if ($template) {
                                        $set('template_id', $template->id);
                                    }
                                }
                            }),

                        TextInput::make('nomor_surat')
                            ->label('Nomor Surat')
                            ->placeholder('Akan di-generate otomatis')
                            ->disabled()
                            ->helperText('Nomor surat akan di-generate otomatis'),

                        Select::make('template_id')
                            ->label('Template Surat')
                            ->options(function ($get) {
                                $jenisSurat = $get('jenis_surat');
                                if (!$jenisSurat) return [];
                                
                                return \App\Models\SuratTemplate::where('jenis_surat', $jenisSurat)
                                    ->where('is_active', true)
                                    ->pluck('nama_template', 'id')
                                    ->toArray();
                            })
                            ->required()
                            ->searchable(),
                    ])
                    ->columns(2),

                Forms\Components\Section::make('Data Pemohon')
                    ->schema([
                        TextInput::make('nama_pemohon')
                            ->label('Nama Pemohon')
                            ->required()
                            ->maxLength(255),

                        TextInput::make('nik')
                            ->label('NIK')
                            ->required()
                            ->maxLength(16)
                            ->minLength(16)
                            ->numeric()
                            ->helperText('NIK harus 16 digit'),

                        Textarea::make('alamat')
                            ->label('Alamat')
                            ->required()
                            ->rows(3)
                            ->maxLength(500),

                        Textarea::make('keperluan')
                            ->label('Keperluan')
                            ->required()
                            ->rows(3)
                            ->maxLength(500),

                        DatePicker::make('tanggal_surat')
                            ->label('Tanggal Surat')
                            ->required()
                            ->default(now()),

                        FileUpload::make('lampiran')
                            ->label('Lampiran (Opsional)')
                            ->directory('surat/lampiran')
                            ->acceptedFileTypes(['pdf', 'jpg', 'jpeg', 'png'])
                            ->maxSize(2048)
                            ->helperText('Maksimal 2MB, format: PDF, JPG, PNG'),
                    ])
                    ->columns(2),

                Forms\Components\Section::make('Status & Catatan')
                    ->schema([
                        Select::make('status')
                            ->label('Status')
                            ->options([
                                Surat::STATUS_DIAJUKAN => 'Diajukan',
                                Surat::STATUS_DISETUJUI => 'Disetujui',
                                Surat::STATUS_DITOLAK => 'Ditolak',
                            ])
                            ->default(Surat::STATUS_DIAJUKAN)
                            ->required()
                            ->reactive()
                            ->afterStateUpdated(function ($state, callable $set) {
                                if ($state === Surat::STATUS_DISETUJUI) {
                                    $set('disetujui_oleh', Auth::id());
                                    $set('tanggal_disetujui', now());
                                } elseif ($state === Surat::STATUS_DITOLAK) {
                                    $set('ditolak_oleh', Auth::id());
                                    $set('tanggal_ditolak', now());
                                }
                            }),

                        Textarea::make('catatan_admin')
                            ->label('Catatan Admin')
                            ->rows(3)
                            ->maxLength(1000),

                        Textarea::make('alasan_penolakan')
                            ->label('Alasan Penolakan')
                            ->rows(3)
                            ->maxLength(1000)
                            ->visible(fn ($get) => $get('status') === Surat::STATUS_DITOLAK),
                    ])
                    ->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nomor_surat')
                    ->label('Nomor Surat')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('nama_pemohon')
                    ->label('Nama Pemohon')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('jenis_surat')
                    ->label('Jenis Surat')
                    ->formatStateUsing(fn (string $state): string => match($state) {
                        Surat::JENIS_KETERANGAN => 'Surat Keterangan',
                        Surat::JENIS_PENGANTAR => 'Surat Pengantar',
                        default => $state,
                    })
                    ->badge()
                    ->color(fn (string $state): string => match($state) {
                        Surat::JENIS_KETERANGAN => 'info',
                        Surat::JENIS_PENGANTAR => 'warning',
                        default => 'gray',
                    }),

                TextColumn::make('status')
                    ->label('Status')
                    ->badge()
                    ->color(fn (string $state): string => match($state) {
                        Surat::STATUS_DIAJUKAN => 'warning',
                        Surat::STATUS_DISETUJUI => 'success',
                        Surat::STATUS_DITOLAK => 'danger',
                        default => 'gray',
                    }),

                TextColumn::make('tanggal_surat')
                    ->label('Tanggal Surat')
                    ->date()
                    ->sortable(),

                TextColumn::make('created_at')
                    ->label('Dibuat')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('jenis_surat')
                    ->label('Jenis Surat')
                    ->options([
                        Surat::JENIS_KETERANGAN => 'Surat Keterangan',
                        Surat::JENIS_PENGANTAR => 'Surat Pengantar',
                    ]),

                SelectFilter::make('status')
                    ->label('Status')
                    ->options([
                        Surat::STATUS_DIAJUKAN => 'Diajukan',
                        Surat::STATUS_DISETUJUI => 'Disetujui',
                        Surat::STATUS_DITOLAK => 'Ditolak',
                    ]),

                Filter::make('tanggal_surat')
                    ->form([
                        DatePicker::make('tanggal_dari'),
                        DatePicker::make('tanggal_sampai'),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when(
                                $data['tanggal_dari'],
                                fn (Builder $query, $date): Builder => $query->whereDate('tanggal_surat', '>=', $date),
                            )
                            ->when(
                                $data['tanggal_sampai'],
                                fn (Builder $query, $date): Builder => $query->whereDate('tanggal_surat', '<=', $date),
                            );
                    })
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                
                Action::make('preview')
                    ->label('Preview')
                    ->icon('heroicon-o-eye')
                    ->url(fn (Surat $record): string => route('surat.preview', ['publicLink' => $record->public_token]))
                    ->openUrlInNewTab()
                    ->visible(fn (Surat $record): bool => $record->isApproved()),

                Action::make('download')
                    ->label('Download')
                    ->icon('heroicon-o-arrow-down-tray')
                    ->url(fn (Surat $record): string => route('surat.download', ['publicLink' => $record->public_token]))
                    ->visible(fn (Surat $record): bool => $record->isApproved()),

                Action::make('approve')
                    ->label('Setujui')
                    ->icon('heroicon-o-check')
                    ->color('success')
                    ->requiresConfirmation()
                    ->modalHeading('Setujui Surat')
                    ->modalDescription('Apakah Anda yakin ingin menyetujui surat ini?')
                    ->form([
                        Textarea::make('catatan')
                            ->label('Catatan (Opsional)')
                            ->rows(3),
                    ])
                    ->action(function (Surat $record, array $data): void {
                        $suratService = app(\App\Services\SuratService::class);
                        $suratService->approveSurat($record, Auth::id(), $data['catatan'] ?? null);
                    })
                    ->visible(fn (Surat $record): bool => $record->isPending()),

                Action::make('reject')
                    ->label('Tolak')
                    ->icon('heroicon-o-x-mark')
                    ->color('danger')
                    ->requiresConfirmation()
                    ->modalHeading('Tolak Surat')
                    ->modalDescription('Apakah Anda yakin ingin menolak surat ini?')
                    ->form([
                        Textarea::make('alasan')
                            ->label('Alasan Penolakan')
                            ->required()
                            ->rows(3),
                    ])
                    ->action(function (Surat $record, array $data): void {
                        $suratService = app(\App\Services\SuratService::class);
                        $suratService->rejectSurat($record, Auth::id(), $data['alasan']);
                    })
                    ->visible(fn (Surat $record): bool => $record->isPending()),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    
                    BulkAction::make('approve')
                        ->label('Setujui Terpilih')
                        ->icon('heroicon-o-check')
                        ->color('success')
                        ->requiresConfirmation()
                        ->modalHeading('Setujui Surat Terpilih')
                        ->modalDescription('Apakah Anda yakin ingin menyetujui surat yang dipilih?')
                        ->action(function (Collection $records): void {
                            $suratService = app(\App\Services\SuratService::class);
                            foreach ($records as $record) {
                                if ($record->isPending()) {
                                    $suratService->approveSurat($record, Auth::id());
                                }
                            }
                        })
                        ->deselectRecordsAfterCompletion(),

                    BulkAction::make('reject')
                        ->label('Tolak Terpilih')
                        ->icon('heroicon-o-x-mark')
                        ->color('danger')
                        ->requiresConfirmation()
                        ->modalHeading('Tolak Surat Terpilih')
                        ->modalDescription('Apakah Anda yakin ingin menolak surat yang dipilih?')
                        ->form([
                            Textarea::make('alasan')
                                ->label('Alasan Penolakan')
                                ->required()
                                ->rows(3),
                        ])
                        ->action(function (Collection $records, array $data): void {
                            $suratService = app(\App\Services\SuratService::class);
                            foreach ($records as $record) {
                                if ($record->isPending()) {
                                    $suratService->rejectSurat($record, Auth::id(), $data['alasan']);
                                }
                            }
                        })
                        ->deselectRecordsAfterCompletion(),
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
            'index' => Pages\ListSurats::route('/'),
            'create' => Pages\CreateSurat::route('/create'),
            'edit' => Pages\EditSurat::route('/{record}/edit'),
            'view' => Pages\ViewSurat::route('/{record}'),
        ];
    }
}
