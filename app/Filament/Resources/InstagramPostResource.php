<?php

namespace App\Filament\Resources;

use App\Filament\Resources\InstagramPostResource\Pages;
use App\Models\InstagramPost;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Infolists;
use Filament\Infolists\Infolist;
use Filament\Support\Enums\FontWeight;

class InstagramPostResource extends Resource
{
    protected static ?string $model = InstagramPost::class;

    protected static ?string $navigationIcon = 'heroicon-o-camera';
    
    protected static ?string $navigationGroup = 'Social Media';
    
    protected static ?string $modelLabel = 'Instagram Post';
    
    protected static ?string $pluralModelLabel = 'Instagram Posts';

    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Post Information')
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->required()
                            ->maxLength(255)
                            ->columnSpanFull(),
                        
                        Forms\Components\TextInput::make('href')
                            ->label('Instagram URL')
                            ->url()
                            ->placeholder('https://www.instagram.com/...')
                            ->columnSpanFull(),
                        
                        Forms\Components\FileUpload::make('img')
                            ->label('Image')
                            ->image()
                            ->directory('instagram-posts')
                            ->visibility('public')
                            ->imageEditor()
                            ->imageEditorAspectRatios([
                                '1:1',
                                '4:5',
                                '16:9',
                            ])
                            ->columnSpanFull(),
                    ])
                    ->columns(2),

                Forms\Components\Section::make('Engagement Metrics')
                    ->schema([
                        Forms\Components\TextInput::make('like')
                            ->label('Likes')
                            ->numeric()
                            ->default(0)
                            ->minValue(0),
                        
                        Forms\Components\TextInput::make('comment')
                            ->label('Comments')
                            ->numeric()
                            ->default(0)
                            ->minValue(0),
                        
                        Forms\Components\Toggle::make('is_active')
                            ->label('Active')
                            ->default(true),
                    ])
                    ->columns(3),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('img')
                    ->label('Image')
                    ->square()
                    ->size(60),
                    
                Tables\Columns\TextColumn::make('title')
                    ->searchable()
                    ->sortable()
                    ->weight(FontWeight::Medium)
                    ->limit(50),
                    
                Tables\Columns\TextColumn::make('like')
                    ->label('Likes')
                    ->sortable()
                    ->badge()
                    ->color('success'),
                    
                Tables\Columns\TextColumn::make('comment')
                    ->label('Comments')
                    ->sortable()
                    ->badge()
                    ->color('info'),
                    
                Tables\Columns\IconColumn::make('is_active')
                    ->label('Active')
                    ->boolean()
                    ->sortable(),
                    
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                    
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\TernaryFilter::make('is_active')
                    ->label('Status')
                    ->placeholder('All posts')
                    ->trueLabel('Active posts')
                    ->falseLabel('Inactive posts'),
                    
                Tables\Filters\Filter::make('high_engagement')
                    ->query(fn ($query) => $query->where('like', '>', 100))
                    ->label('High Engagement (>100 likes)'),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\Action::make('visit')
                    ->icon('heroicon-o-arrow-top-right-on-square')
                    ->url(fn (InstagramPost $record): string => $record->href ?? '#')
                    ->openUrlInNewTab()
                    ->visible(fn (InstagramPost $record): bool => !empty($record->href)),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\BulkAction::make('activate')
                        ->action(fn ($records) => $records->each->update(['is_active' => true]))
                        ->icon('heroicon-o-check-circle')
                        ->color('success'),
                    Tables\Actions\BulkAction::make('deactivate')
                        ->action(fn ($records) => $records->each->update(['is_active' => false]))
                        ->icon('heroicon-o-x-circle')
                        ->color('danger'),
                ]),
            ])
            ->defaultSort('created_at', 'desc');
    }

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                Infolists\Components\Section::make('Post Details')
                    ->schema([
                        Infolists\Components\ImageEntry::make('img')
                            ->label('Image')
                            ->height(200),
                            
                        Infolists\Components\TextEntry::make('title')
                            ->size(Infolists\Components\TextEntry\TextEntrySize::Large)
                            ->weight(FontWeight::Bold),
                            
                        Infolists\Components\TextEntry::make('href')
                            ->label('Instagram URL')
                            ->url(fn ($record) => $record->href)
                            ->openUrlInNewTab(),
                    ])
                    ->columns(1),

                Infolists\Components\Section::make('Engagement')
                    ->schema([
                        Infolists\Components\TextEntry::make('like')
                            ->label('Likes')
                            ->badge()
                            ->color('success'),
                            
                        Infolists\Components\TextEntry::make('comment')
                            ->label('Comments')
                            ->badge()
                            ->color('info'),
                            
                        Infolists\Components\IconEntry::make('is_active')
                            ->label('Status')
                            ->boolean(),
                    ])
                    ->columns(3),

                Infolists\Components\Section::make('Timestamps')
                    ->schema([
                        Infolists\Components\TextEntry::make('created_at')
                            ->dateTime(),
                            
                        Infolists\Components\TextEntry::make('updated_at')
                            ->dateTime(),
                    ])
                    ->columns(2)
                    ->collapsed(),
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
            'index' => Pages\ListInstagramPosts::route('/'),
            'create' => Pages\CreateInstagramPost::route('/create'),
            'view' => Pages\ViewInstagramPost::route('/{record}'),
            'edit' => Pages\EditInstagramPost::route('/{record}/edit'),
        ];
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }
}