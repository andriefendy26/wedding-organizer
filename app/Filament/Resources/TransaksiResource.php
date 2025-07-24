<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TransaksiResource\Pages;
use App\Filament\Resources\TransaksiResource\RelationManagers;
use App\Models\Barang;
use App\Models\PaketLayanan;
use App\Models\Transaksi;
use Carbon\Carbon;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TransaksiResource extends Resource
{
    protected static ?string $model = Transaksi::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Transaksi'; 
    protected static ?int $navigationSort = 1;
    
    public static function form(Form $form): Form
    {
        
        function hitungDurasi(Get $get, Set $set): void{
            $tanggalMulai = $get('tanggal_sewa');
            $tanggalSelesai = $get('tanggal_kembali');

            if(!$tanggalMulai || !$tanggalSelesai){
                $set('Durasi', 0);
                return;
            }

            $start = Carbon::parse($tanggalMulai);
            $end = Carbon::parse($tanggalSelesai);

            $durasi = $start->diffInDays($end);
            
            $set('Durasi', $durasi);
            
            hitungTotalBiayaSewa($get, $set);
            hitungTotalBiaya($get, $set);
        }

        
        function hitungTotalBiayaSewa(Get $get, Set $set): void {
            $durasi = $get('Durasi') ?? 0;
            $barangTransaksi = $get('barangTransaksi') ?? [];
            
            $totalPerHari = 0;
            foreach($barangTransaksi as $item) {
                $totalPerHari += ($item['harga_satuan'] ?? 0) * ($item['jumlah'] ?? 0);
            }
            
            $totalSewa = $durasi * $totalPerHari;
            $set('TotalBiayaSewa', $totalSewa);
        }

        function hitungTotalBiaya(Get $get, Set $set): void {
            $totalSewa = $get('TotalBiayaSewa') ?? 0;
            $paketId = $get('paket_layanan_id');

            $hargaPaket = 0;
            if($paketId){
                $paket = PaketLayanan::find($paketId);
                $hargaPaket = $paket ? $paket->harga : 0;
            }

            $totalKeseluruhan = $totalSewa + $hargaPaket;
            $set('total_biaya', $totalKeseluruhan);
        }

        
        function hitungTotalItem(Get $get, Set $set): void {
            $hargaSatuan = $get('harga_satuan') ?? 0;
            $jumlah = $get('jumlah') ?? 0;
            $total = $hargaSatuan * $jumlah;
            $set('total', $total);
        }
        
        return $form
        ->schema([
                Section::make('Customer')
                    ->schema([
                        Select::make('customer_id')->reactive()->relationship('customer', 'nama')->required()->label('Customer'),
                    ]),
                Section::make('Pilih Layanan dan Paket Layanan')
                ->schema([
                    Select::make('layanan_id')->reactive()->relationship('Layanan', 'nama')->required(),
                    Select::make('paket_layanan_id')
                            ->label('Paket Layanan')
                            ->options(function (Get $get) {
                                $layananId = $get('layanan_id');
                                if (!$layananId) return [];
    
                                return PaketLayanan::where('layanan_id', $layananId)
                                    ->pluck('nama_paket', 'id');
                            })
                            ->searchable()
                            ->preload()
                            ->reactive()
                            ->visible(fn (Get $get) => filled($get('layanan_id')))
                            ->afterStateUpdated(function (Get $get, Set $set, ?string $state){
                                hitungTotalBiaya($get, $set);
                            }),
                ])->columns(2),

                Section::make('Sewa Barang')
                ->schema([
                    Repeater::make('barangTransaksi')
                    ->relationship('barangTransaksi')
                    ->schema([
                        Select::make('barang_id')
                            ->reactive()
                            ->live()
                            ->relationship('barang', 'nama')
                            ->afterStateUpdated(function (Get $get, Set $set, $state){
                                if (!$state) {
                                    $set('harga_satuan', 0);
                                    $set('total', 0);
                                } else {
                                    $barang = Barang::find($state);
                                    if ($barang) {
                                        $harga = $barang->harga;
                                        $set('harga_satuan', $harga);
                                        // Hitung total untuk item ini
                                        hitungTotalItem($get, $set);
                                    }
                                }
                                
                                hitungTotalBiayaSewa($get, $set);
                                hitungTotalBiaya($get, $set);
                            }),
                        TextInput::make('jumlah')
                            ->default(1)
                            ->reactive()
                            ->live()
                            ->minValue(1)
                            ->numeric()
                            ->afterStateUpdated(function (Set $set, Get $get, $state){
                                // Hitung total untuk item ini
                                hitungTotalItem($get, $set);
                                
                                hitungTotalBiayaSewa($get, $set);
                                hitungTotalBiaya($get, $set);
                            }),
                        TextInput::make('harga_satuan')
                            ->label('Harga Satuan')
                            ->default(0)
                            ->disabled()
                            ->dehydrated(false),
                        TextInput::make('total')
                            ->default(0)
                            ->disabled()
                            ->dehydrated(true)
                            ->prefix('Rp ')
                        ])
                        ->reactive()
                        ->live()
                        ->columns(4)
                        ->addActionLabel('Tambah Barang')
                        ->afterStateUpdated(function (Get $get, Set $set) {
                            // Ketika ada perubahan pada repeater (tambah/hapus item)
                            hitungTotalBiayaSewa($get, $set);
                            hitungTotalBiaya($get, $set);
                        }),

                    Fieldset::make('Lama Penyewaan')
                        ->schema([
                            DatePicker::make('tanggal_sewa')
                                ->reactive()
                                ->live()
                                ->minDate(now())
                                ->afterStateUpdated(fn (Set $set, Get $get) => hitungDurasi($get, $set)),
                            DatePicker::make('tanggal_kembali')
                                ->reactive()
                                ->live()
                                ->minDate(fn (Get $get) => $get('tanggal_sewa') ?? now())
                                ->afterStateUpdated(fn (Set $set, Get $get) => hitungDurasi($get, $set)),
                            TextInput::make('Durasi')
                                ->disabled()
                                ->suffix('hari'),
                            TextInput::make('TotalBiayaSewa')
                                ->label('Total Biaya Sewa')
                                ->disabled()
                                ->prefix('Rp ')
                        ])->columns(2),
                    
                ]),

                Section::make('Biaya dan Status')
                ->schema([
                    TextInput::make('total_biaya')
                        ->label('Total Biaya Keseluruhan')
                        ->disabled()
                        ->dehydrated(true)
                        ->prefix('Rp '),
                    Select::make('status')->options([
                        true => 'Lunas',
                        false => 'Belum Lunas'
                    ])->default(false),
                ])->columns(2),

                Section::make('Bukti Pembayaran')
                    ->schema([
                        FileUpload::make('bukti_bayar')
                            ->label('Bukti Pembayaran')
                            ->directory('bukti_bayar')
                            ->image()
                            ->maxSize(2048)
                    ]),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('customer.nama')->label('Customer'),
                TextColumn::make('Layanan.nama'),
                TextColumn::make('total_biaya')
                    ->prefix('Rp ')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('public_id')
                    ->label('Link Pembayaran')
                    ->url(fn($record) => route('bayar.show', $record->public_id), true)
                    ->openUrlInNewTab()
                    ->copyable()
                    ->copyMessage('Link disalin')
                    ->copyMessageDuration(1500),
                TextColumn::make('tanggal_sewa')
                    ->date()
                    ->sortable(),
                TextColumn::make('tanggal_kembali')
                    ->date()
                    ->sortable(),
                IconColumn::make('status')
                    ->boolean()
                    ->label('Sudah Bayar ?'),
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
            'index' => Pages\ListTransaksi::route('/'),
            'create' => Pages\CreateTransaksi::route('/create'),
            'edit' => Pages\EditTransaksi::route('/{record}/edit'),
        ];
    }
}