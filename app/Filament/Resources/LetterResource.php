<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LetterResource\Pages;
use App\Models\Letter;
use App\Services\QrCodeService;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Filament\Notifications\Notification;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Http\Response;

class LetterResource extends Resource
{
    protected static ?string $model = Letter::class;
    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $navigationLabel = 'Surat';
    protected static ?string $pluralModelLabel = 'Surat';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Informasi Surat')
                    ->schema([
                        Forms\Components\TextInput::make('nomor_surat')
                            ->label('Nomor Surat')
                            ->required()
                            ->unique(ignoreRecord: true)
                            ->maxLength(255),
                            
                        Forms\Components\TextInput::make('penandatangan')
                            ->label('Penandatangan')
                            ->required()
                            ->maxLength(255),
                            
                        Forms\Components\Textarea::make('perihal')
                            ->label('Perihal')
                            ->required()
                            ->rows(3),
                    ])
                    ->columns(2),
                    
                Forms\Components\Section::make('Upload Surat')
                    ->schema([
                        Forms\Components\FileUpload::make('original_file_path')
                            ->label('File PDF Surat')
                            ->required()
                            ->acceptedFileTypes(['application/pdf'])
                            ->directory('letters/original')
                            ->preserveFilenames()
                            ->maxSize(10240) // 10MB
                            ->helperText('Upload file PDF surat. Maksimal 10MB.')
                    ]),
                    
                Forms\Components\Section::make('Preview & Download')
                    ->schema([
                        Forms\Components\Placeholder::make('preview')
                            ->label('')
                            ->content(function ($record) {
                                if (!$record || !$record->signed_file_path) {
                                    return 'Surat belum diproses. Simpan data terlebih dahulu untuk generate QR Code.';
                                }
                                
                                return view('filament.components.letter-preview', [
                                    'letter' => $record
                                ]);
                            }),
                    ])
                    ->hidden(fn ($livewire) => $livewire instanceof Pages\CreateLetter),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nomor_surat')
                    ->label('Nomor Surat')
                    ->searchable()
                    ->sortable(),
                    
                Tables\Columns\TextColumn::make('penandatangan')
                    ->label('Penandatangan')
                    ->searchable(),
                    
                Tables\Columns\TextColumn::make('perihal')
                    ->label('Perihal')
                    ->limit(50)
                    ->searchable(),
                    
                Tables\Columns\BadgeColumn::make('status')
                    ->label('Status')
                    ->colors([
                        'secondary' => 'draft',
                        'warning' => 'processed',
                        'success' => 'completed',
                        'danger' => 'error',
                    ])
                    ->formatStateUsing(function ($state) {
                        return match($state) {
                            'draft' => 'Draft',
                            'processed' => 'Diproses',
                            'completed' => 'Selesai',
                            'error' => 'Error',
                            default => $state
                        };
                    }),
                    
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Dibuat')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->options([
                        'draft' => 'Draft',
                        'processed' => 'Diproses',
                        'completed' => 'Selesai',
                        'error' => 'Error',
                    ])
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                
                Tables\Actions\Action::make('download')
                    ->label('Download')
                    ->icon('heroicon-o-arrow-down-tray')
                    ->action(function (Letter $record) {
                        try {
                            if (!$record->signed_file_path) {
                                throw new \Exception('File signed belum tersedia');
                            }
                            
                            $filePath = storage_path('app/' . $record->signed_file_path);
                            
                            if (!file_exists($filePath)) {
                                throw new \Exception('File tidak ditemukan di: ' . $filePath);
                            }
                            
                            $fileName = 'surat_' . $record->nomor_surat . '.pdf';
                            
                            return response()->download($filePath, $fileName, [
                                'Content-Type' => 'application/pdf',
                            ]);
                            
                        } catch (\Exception $e) {
                            Notification::make()
                                ->danger()
                                ->title('Error Download')
                                ->body('Gagal download file: ' . $e->getMessage())
                                ->send();
                                
                            return null;
                        }
                    })
                    ->hidden(fn (Letter $record) => !$record->signed_file_path),
                
                Tables\Actions\Action::make('regenerate_qr')
                    ->label('Regenerate QR')
                    ->icon('heroicon-o-arrow-path')
                    ->color('warning')
                    ->requiresConfirmation()
                    ->action(function (Letter $record) {
                        try {
                            $qrService = app(QrCodeService::class);
                            
                            // Generate ulang QR Code
                            $qrCodePath = $qrService->generateQrCode(
                                url($record->public_link),
                                'qr_' . $record->id . '_' . time()
                            );
                            
                            // Generate ulang PDF dengan QR
                            $signedFileName = 'signed_' . $record->id . '_' . time() . '.pdf';
                            $signedFilePath = 'letters/signed/' . $signedFileName;
                            
                            $finalPath = $qrService->addQrCodeToPdf(
                                $record->original_file_path,
                                $qrCodePath,
                                $signedFilePath
                            );
                            
                            // Update record
                            $record->update([
                                'signed_file_path' => $finalPath,
                                'qr_code_path' => $qrCodePath,
                                'status' => 'completed'
                            ]);
                            
                            Notification::make()
                                ->success()
                                ->title('Berhasil')
                                ->body('QR Code berhasil di-regenerate')
                                ->send();
                                
                        } catch (\Exception $e) {
                            Notification::make()
                                ->danger()
                                ->title('Error')
                                ->body('Gagal regenerate QR: ' . $e->getMessage())
                                ->send();
                        }
                    })
                    ->hidden(fn (Letter $record) => $record->status !== 'completed'),
                    
                Tables\Actions\Action::make('view_public')
                    ->label('Lihat Public')
                    ->icon('heroicon-o-eye')
                    ->url(fn (Letter $record) => $record->public_link ? url($record->public_link) : null)
                    ->openUrlInNewTab()
                    ->hidden(fn (Letter $record) => !$record->public_link),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListLetters::route('/'),
            'create' => Pages\CreateLetter::route('/create'),
            'edit' => Pages\EditLetter::route('/{record}/edit'),
        ];
    }
}