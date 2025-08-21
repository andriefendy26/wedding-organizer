<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SuratTemplateResource\Pages;
use App\Models\SuratTemplate;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Toggle;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TernaryFilter;

class SuratTemplateResource extends Resource
{
    protected static ?string $model = SuratTemplate::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-duplicate';

    protected static ?string $navigationGroup = 'E-Surat';

    protected static ?string $navigationLabel = 'Template Surat';

    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Informasi Template')
                    ->schema([
                        TextInput::make('nama_template')
                            ->label('Nama Template')
                            ->required()
                            ->maxLength(255),

                        Select::make('jenis_surat')
                            ->label('Jenis Surat')
                            ->options([
                                SuratTemplate::JENIS_KETERANGAN => 'Surat Keterangan',
                                SuratTemplate::JENIS_PENGANTAR => 'Surat Pengantar',
                            ])
                            ->required(),

                        Toggle::make('is_default')
                            ->label('Template Default')
                            ->helperText('Template ini akan digunakan sebagai default untuk jenis surat yang dipilih'),

                        Toggle::make('is_active')
                            ->label('Aktif')
                            ->default(true)
                            ->helperText('Template yang tidak aktif tidak akan muncul di pilihan'),
                    ])
                    ->columns(2),

                Forms\Components\Section::make('Konten Template')
                    ->schema([
                        RichEditor::make('konten_template')
                            ->label('Konten Template')
                            ->required()
                            ->toolbarButtons([
                                'bold',
                                'italic',
                                'underline',
                                'strike',
                                'link',
                                'bulletList',
                                'orderedList',
                                'h2',
                                'h3',
                                'h4',
                                'blockquote',
                                'codeBlock',
                            ])
                            ->columnSpanFull()
                            ->helperText('
                                <strong>Placeholder yang tersedia:</strong><br>
                                <code>{nama}</code> - Nama pemohon<br>
                                <code>{nik}</code> - NIK pemohon<br>
                                <code>{alamat}</code> - Alamat pemohon<br>
                                <code>{keperluan}</code> - Keperluan surat<br>
                                <code>{tanggal}</code> - Tanggal surat<br>
                                <code>{nomor_surat}</code> - Nomor surat<br>
                                <code>{jenis_surat}</code> - Jenis surat
                            '),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama_template')
                    ->label('Nama Template')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('jenis_surat')
                    ->label('Jenis Surat')
                    ->formatStateUsing(fn (string $state): string => match($state) {
                        SuratTemplate::JENIS_KETERANGAN => 'Surat Keterangan',
                        SuratTemplate::JENIS_PENGANTAR => 'Surat Pengantar',
                        default => $state,
                    })
                    ->badge()
                    ->color(fn (string $state): string => match($state) {
                        SuratTemplate::JENIS_KETERANGAN => 'info',
                        SuratTemplate::JENIS_PENGANTAR => 'warning',
                        default => 'gray',
                    }),

                IconColumn::make('is_default')
                    ->label('Default')
                    ->boolean()
                    ->trueIcon('heroicon-o-check-circle')
                    ->falseIcon('heroicon-o-x-circle')
                    ->trueColor('success')
                    ->falseColor('gray'),

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
                SelectFilter::make('jenis_surat')
                    ->label('Jenis Surat')
                    ->options([
                        SuratTemplate::JENIS_KETERANGAN => 'Surat Keterangan',
                        SuratTemplate::JENIS_PENGANTAR => 'Surat Pengantar',
                    ]),

                TernaryFilter::make('is_default')
                    ->label('Template Default'),

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
            'index' => Pages\ListSuratTemplates::route('/'),
            'create' => Pages\CreateSuratTemplate::route('/create'),
            'edit' => Pages\EditSuratTemplate::route('/{record}/edit'),
            'view' => Pages\ViewSuratTemplate::route('/{record}'),
        ];
    }
}

