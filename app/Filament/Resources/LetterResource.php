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
                    ])
                    ->formatStateUsing(function ($state) {
                        return match($state) {
                            'draft' => 'Draft',
                            'processed' => 'Diproses',
                            'completed' => 'Selesai',
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
                    ])
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\Action::make('download')
                    ->label('Download')
                    ->icon('heroicon-o-arrow-down-tray')
                    ->action(function (Letter $record) {
                        if ($record->signed_file_path) {
                            return response()->download(storage_path('app/' . $record->signed_file_path));
                        }
                        
                        Notification::make()
                            ->warning()
                            ->title('File belum tersedia')
                            ->body('Surat belum diproses atau file tidak ditemukan.')
                            ->send();
                    })
                    ->hidden(fn (Letter $record) => !$record->signed_file_path),
                    
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