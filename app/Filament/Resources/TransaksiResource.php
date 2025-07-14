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
            if($durasi){
                $set('Durasi', $durasi);
                hitungTotalBiayaSewa($durasi, $get ,$set);
            };
        }

        function hitungTotalBiayaSewa($durasi, $get ,$set): void {
            $sumBarang = collect($get('barangTransaksi'))->sum(fn ($item) => $item['total'] ?? 0);
            $total = $durasi * $sumBarang;
            $set('TotalBiayaSewa', $total);
        }


        return $form
            ->schema([
                Section::make('Customer')
                    ->schema([
                        Select::make('user_id')->reactive()->relationship('user', 'name')->required()->label('Customer'),
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
                            ->required()
                            ->visible(fn (Get $get) => filled($get('layanan_id')))
                            ->afterStateUpdated(function (Set $set, ?string $state){
                                if(!$state){
                                    $set('total_biaya', 0);
                                    return;
                                }
                                
                                $paket = PaketLayanan::find($state);
                                if($state){
                                    $set('total_biaya', $paket->harga);
                                }
                            }),
                ])->columns(2),

                // Section::make('Waktu')
                //     ->schema([
                //     DatePicker::make('tanggal_sewa')
                //         ->reactive()
                //         ->afterStateUpdated(fn (Set $set, Get $get) => hitungDurasi($get, $set)),
                //     DatePicker::make('tanggal_kembali')
                //         ->reactive()
                //         ->afterStateUpdated(fn (Set $set, Get $get) => hitungDurasi($get, $set)),
                //     TextInput::make('Durasi')->disabled()
                // ])->columns(3),

                
                Section::make('Sewa Barang')
                ->schema([
                    Repeater::make('barangTransaksi')
                    ->relationship('barangTransaksi')
                    ->schema([
                        Select::make('barang_id')
                            ->reactive()
                            ->relationship('barang', 'nama')
                            ->afterStateUpdated(function (Set $set ,$state){
                                if (!$state) {
                                    $set('jumlah', 1);
                                    $set('harga_satuan', 0);
                                    $set('total', 0);
                                    return;
                                }

                                $barang = Barang::find($state);
                                if ($barang) {
                                    $set('jumlah', 1);
                                    $set('harga_satuan', $barang->harga);
                                    $set('total', $barang->harga * 1);
                                }
                            }),
                        TextInput::make('jumlah')
                            ->reactive()
                            ->default(0)
                            ->minValue(1)
                            ->afterStateUpdated(function (Set $set,Get $get,$state){
                                $total = $get('harga_satuan') ?? 0;
                                $set('total', $state * $total);
                                
                            }),
                        TextInput::make('harga_satuan')
                            ->label('Harga Satuan')
                            ->default(0)
                            ->disabled()
                            ->dehydrated(false),
                        TextInput::make('total')->default(0)->disabled()->dehydrated(true),
                        ])->columns(4),

                    Fieldset::make('Lama Penyewaan')
                        ->schema([
                            DatePicker::make('tanggal_sewa')
                                ->reactive()
                                ->afterStateUpdated(fn (Set $set, Get $get) => hitungDurasi($get, $set)),
                            DatePicker::make('tanggal_kembali')
                                ->reactive()
                                ->afterStateUpdated(fn (Set $set, Get $get) => hitungDurasi($get, $set)),
                            TextInput::make('Durasi')->disabled(),
                            TextInput::make('TotalBiayaSewa')->label('Total Biaya Sewa')->disabled()
                        ]),
                    
                ]),

                Section::make('Biaya dan Status')
                ->schema([
                    TextInput::make('total_biaya')->disabled()->dehydrated(true),
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
                    ]),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                TextColumn::make('user.name')->label('Customer'),
                TextColumn::make('Layanan.nama'),
                TextColumn::make('total_biaya'),
                IconColumn::make('status')->boolean()->label('Sudah Bayar ?'),
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
