<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ArtikelResource\Pages;
use App\Filament\Resources\ArtikelResource\RelationManagers;
use App\Models\Artikel;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Wizard;
use Filament\Forms\Components\Wizard\Step;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TagsInput;
use Filament\Tables\Columns\ImageColumn;

class ArtikelResource extends Resource
{
    protected static ?string $model = Artikel::class;
    protected static ?string $navigationIcon = 'solar-notebook-bookmark-linear';

     protected static ?string $navigationGroup = 'Konten Website';
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
         return $form
        ->schema([
            Wizard::make([
                Step::make('Informasi Utama')
                    ->schema([
                        TextInput::make('slug')
                            ->label('Slug')
                            ->unique(ignoreRecord: true)
                            ->required(),
                        TextInput::make('judul')
                            ->label('Judul Artikel')
                            ->required()
                            ->maxLength(255)->required(),
                        TextInput::make('sub_judul')
                            ->label('Sub Judul')
                            ->maxLength(255)->required(),
                    ]),

                Step::make('Isi & Detail')
                    ->schema([
                        RichEditor::make('content')
                                    ->columnSpanFull()
                                    ->required()
                                    ->toolbarButtons([
                                        'attachFiles',
                                        'blockquote',
                                        'bold',
                                        'bulletList',
                                        'codeBlock',
                                        'h2',
                                        'h3',
                                        'italic',
                                        'link',
                                        'orderedList',
                                        'redo',
                                        'strike',
                                        'underline',
                                        'undo',
                                    ])
                    ]),

                Step::make('Media & Metadata')
                    ->schema([
                        FileUpload::make('gambar')
                            ->label('Gambar')
                            ->image()
                            ->directory('artikels')
                            ->imagePreviewHeight('150'),

                        TagsInput::make('tags')
                            ->label('Tags'),

                        TextInput::make('author')
                            ->label('Penulis')
                            ->required()
                            ->default(auth()->user()->name ?? 'Admin'),
                    ]),
            ]),
        ])->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('judul')->searchable(),
                Tables\Columns\TextColumn::make('slug'),
                ImageColumn::make('gambar')
                    ->label('Gambar')
                    ->disk('public'),
                Tables\Columns\TextColumn::make('author'),
                Tables\Columns\TextColumn::make('tags'),
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
            'index' => Pages\ListArtikels::route('/'),
            'create' => Pages\CreateArtikel::route('/create'),
            'edit' => Pages\EditArtikel::route('/{record}/edit'),
        ];
    }
}
