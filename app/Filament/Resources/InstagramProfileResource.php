<?php

namespace App\Filament\Resources;

use App\Filament\Resources\InstagramProfileResource\Pages;
use App\Models\InstagramProfile;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Infolists;
use Filament\Infolists\Infolist;
use Filament\Support\Enums\FontWeight;

class InstagramProfileResource extends Resource
{
    protected static ?string $model = InstagramProfile::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-circle';
    
    protected static ?string $navigationGroup = 'Social Media';
    
    protected static ?string $modelLabel = 'Instagram Profile';
    
    protected static ?string $pluralModelLabel = 'Instagram Profile';
    
    protected static ?string $navigationLabel = 'Instagram Profile';

    protected static ?int $navigationSort = 0;

    // Hide from navigation if no profile exists yet
    public static function shouldRegisterNavigation(): bool
    {
        return true; // Always show in navigation
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Profile Information')
                    ->description('Configure your main Instagram profile information')
                    ->schema([
                        Forms\Components\Grid::make(2)
                            ->schema([
                                Forms\Components\FileUpload::make('profile_image')
                                    ->label('Profile Image')
                                    ->image()
                                    ->directory('instagram-profiles')
                                    ->visibility('public')
                                    ->imageEditor()
                                    ->imageEditorAspectRatios(['1:1'])
                                    ->maxSize(2048)
                                    ->columnSpan(1),
                                
                                Forms\Components\Group::make([
                                    Forms\Components\TextInput::make('username')
                                        ->required()
                                        ->maxLength(30)
                                        ->placeholder('3rasa.weddingneventorganizer')
                                        ->helperText('Instagram username without @')
                                        ->prefixIcon('heroicon-o-at-symbol'),
                                    
                                    Forms\Components\TextInput::make('display_name')
                                        ->label('Display Name')
                                        ->maxLength(150)
                                        ->placeholder('3Rasa Wedding & Event Organizer'),
                                ])->columnSpan(1),
                            ]),
                        
                        Forms\Components\Textarea::make('bio')
                            ->label('Biography')
                            ->maxLength(150)
                            ->rows(3)
                            ->placeholder('✨ Premium Wedding & Event Organizer\n💍 Making your dreams come true\n📍 Tarakan, North Kalimantan')
                            ->columnSpanFull(),
                        
                        Forms\Components\Grid::make(2)
                            ->schema([
                                Forms\Components\TextInput::make('website')
                                    ->label('Website URL')
                                    ->url()
                                    ->maxLength(255)
                                    ->placeholder('https://3rasawedding.com')
                                    ->prefixIcon('heroicon-o-globe-alt'),
                                
                                Forms\Components\TextInput::make('instagram_url')
                                    ->label('Instagram Profile URL')
                                    ->url()
                                    ->placeholder('https://instagram.com/3rasa.weddingneventorganizer')
                                    ->prefixIcon('heroicon-o-camera'),
                            ]),
                    ])
                    ->icon('heroicon-o-user-circle')
                    ->collapsible(),

                Forms\Components\Section::make('Statistics')
                    ->description('Your current Instagram statistics')
                    ->schema([
                        Forms\Components\Grid::make(3)
                            ->schema([
                                Forms\Components\TextInput::make('posts_count')
                                    ->label('Total Posts')
                                    ->numeric()
                                    ->default(0)
                                    ->minValue(0)
                                    ->suffix('posts')
                                    ->prefixIcon('heroicon-o-camera'),
                                
                                Forms\Components\TextInput::make('followers_count')
                                    ->label('Followers')
                                    ->numeric()
                                    ->default(0)
                                    ->minValue(0)
                                    ->suffix('followers')
                                    ->prefixIcon('heroicon-o-users'),
                                
                                Forms\Components\TextInput::make('following_count')
                                    ->label('Following')
                                    ->numeric()
                                    ->default(0)
                                    ->minValue(0)
                                    ->suffix('following')
                                    ->prefixIcon('heroicon-o-user-plus'),
                            ]),
                        
                        Forms\Components\Placeholder::make('last_synced_display')
                            ->label('Last Synchronized')
                            ->content(fn (?InstagramProfile $record) => 
                                $record?->last_synced_at 
                                    ? $record->last_synced_at->format('d M Y, H:i') . ' (' . $record->last_synced_at->diffForHumans() . ')'
                                    : 'Never synchronized'
                            )
                            ->visible(fn (?InstagramProfile $record) => $record !== null),
                    ])
                    ->icon('heroicon-o-chart-bar')
                    ->collapsible(),

                Forms\Components\Section::make('Account Settings')
                    ->description('Configure account type and status')
                    ->schema([
                        Forms\Components\Grid::make(3)
                            ->schema([
                                Forms\Components\Toggle::make('is_verified')
                                    ->label('Verified Account')
                                    ->helperText('Blue checkmark badge')
                                    ->inline(false),
                                
                                Forms\Components\Toggle::make('is_business')
                                    ->label('Business Account')
                                    ->helperText('Business profile type')
                                    ->default(true)
                                    ->inline(false),
                                
                                Forms\Components\Toggle::make('is_active')
                                    ->label('Active Profile')
                                    ->helperText('Display on website')
                                    ->default(true)
                                    ->inline(false),
                            ]),
                    ])
                    ->icon('heroicon-o-cog-6-tooth')
                    ->collapsible(),

                Forms\Components\Section::make('Additional Information')
                    ->description('Extra data for your profile')
                    ->schema([
                        Forms\Components\KeyValue::make('additional_info')
                            ->label('Custom Fields')
                            ->keyLabel('Field Name')
                            ->valueLabel('Value')
                            ->default([
                                'category' => 'Wedding Planning Service',
                                'contact_email' => '',
                                'phone' => '',
                                'location' => 'Tarakan, North Kalimantan, Indonesia',
                            ])
                            ->columnSpanFull(),
                    ])
                    ->icon('heroicon-o-information-circle')
                    ->collapsed()
                    ->collapsible(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('profile_image')
                    ->label('Profile')
                    ->circular()
                    ->size(60)
                    ->defaultImageUrl(asset('images/default-avatar.png')),
                    
                Tables\Columns\TextColumn::make('display_name')
                    ->label('Name')
                    ->description(fn (InstagramProfile $record): string => '@' . $record->username)
                    ->weight(FontWeight::Bold)
                    ->searchable(['display_name', 'username']),
                    
                Tables\Columns\TextColumn::make('followers_count')
                    ->label('Followers')
                    ->formatStateUsing(fn ($state) => number_format($state))
                    ->badge()
                    ->color('success')
                    ->sortable(),
                    
                Tables\Columns\TextColumn::make('posts_count')
                    ->label('Posts')
                    ->badge()
                    ->color('primary')
                    ->sortable(),
                    
                Tables\Columns\IconColumn::make('is_verified')
                    ->label('Verified')
                    ->boolean(),
                    
                Tables\Columns\IconColumn::make('is_active')
                    ->label('Active')
                    ->boolean(),
                    
                Tables\Columns\TextColumn::make('last_synced_at')
                    ->label('Last Sync')
                    ->since()
                    ->placeholder('Never')
                    ->sortable(),
            ])
            ->actions([
                Tables\Actions\Action::make('sync_stats')
                    ->label('Sync Stats')
                    ->icon('heroicon-o-arrow-path')
                    ->color('info')
                    ->action(function (InstagramProfile $record) {
                        $record->update(['last_synced_at' => now()]);
                        // Add your Instagram API sync logic here
                    })
                    ->requiresConfirmation()
                    ->modalHeading('Sync Instagram Statistics')
                    ->modalDescription('This will update the profile statistics from Instagram.')
                    ->modalSubmitActionLabel('Sync Now'),
                    
                Tables\Actions\Action::make('visit_profile')
                    ->label('Visit Instagram')
                    ->icon('heroicon-o-arrow-top-right-on-square')
                    ->color('gray')
                    ->url(fn (InstagramProfile $record): string => $record->full_instagram_url)
                    ->openUrlInNewTab(),
                    
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([])
            ->emptyStateHeading('No Instagram Profile Configured')
            ->emptyStateDescription('Create your Instagram profile to display on your website.')
            ->emptyStateIcon('heroicon-o-camera')
            ->emptyStateActions([
                Tables\Actions\CreateAction::make()
                    ->label('Create Instagram Profile')
                    ->icon('heroicon-o-plus'),
            ])
            ->defaultSort('created_at', 'desc')
            ->paginated(false); // Since we only expect 1 record
    }

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                Infolists\Components\Section::make('Profile Preview')
                    ->description('How your profile appears on the website')
                    ->schema([
                        Infolists\Components\Split::make([
                            Infolists\Components\ImageEntry::make('profile_image')
                                ->label('')
                                ->circular()
                                ->size(120)
                                ->defaultImageUrl(asset('images/default-avatar.png')),
                            Infolists\Components\Group::make([
                                Infolists\Components\TextEntry::make('display_name')
                                    ->size(Infolists\Components\TextEntry\TextEntrySize::Large)
                                    ->weight(FontWeight::Bold)
                                    ->icon('heroicon-o-user-circle'),
                                    
                                Infolists\Components\TextEntry::make('username')
                                    ->prefix('@')
                                    ->color('gray')
                                    ->icon('heroicon-o-at-symbol'),
                                    
                                Infolists\Components\TextEntry::make('bio')
                                    ->prose()
                                    ->icon('heroicon-o-document-text'),
                                    
                                Infolists\Components\TextEntry::make('website')
                                    ->url(fn ($record) => $record->website)
                                    ->openUrlInNewTab()
                                    ->icon('heroicon-o-globe-alt')
                                    ->visible(fn ($record) => !empty($record->website)),
                            ])->columns(1),
                        ])->from('md'),
                    ])
                    ->icon('heroicon-o-eye'),

                Infolists\Components\Section::make('Statistics Overview')
                    ->schema([
                        Infolists\Components\Split::make([
                            Infolists\Components\Group::make([
                                Infolists\Components\TextEntry::make('posts_count')
                                    ->label('Posts')
                                    ->formatStateUsing(fn ($state) => number_format($state))
                                    ->badge()
                                    ->color('primary')
                                    ->icon('heroicon-o-camera'),
                            ]),
                            Infolists\Components\Group::make([
                                Infolists\Components\TextEntry::make('followers_count')
                                    ->label('Followers')
                                    ->formatStateUsing(fn ($state) => number_format($state))
                                    ->badge()
                                    ->color('success')
                                    ->icon('heroicon-o-users'),
                            ]),
                            Infolists\Components\Group::make([
                                Infolists\Components\TextEntry::make('following_count')
                                    ->label('Following')
                                    ->formatStateUsing(fn ($state) => number_format($state))
                                    ->badge()
                                    ->color('info')
                                    ->icon('heroicon-o-user-plus'),
                            ]),
                        ]),
                        
                        Infolists\Components\TextEntry::make('engagement_rate')
                            ->label('Estimated Engagement Rate')
                            ->formatStateUsing(function (InstagramProfile $record) {
                                if ($record->followers_count > 0) {
                                    $rate = (($record->followers_count * 0.02) / $record->followers_count) * 100;
                                    return round($rate, 2) . '%';
                                }
                                return 'N/A';
                            })
                            ->badge()
                            ->color('warning')
                            ->icon('heroicon-o-chart-pie'),
                    ])
                    ->columns(1)
                    ->icon('heroicon-o-chart-bar'),

                Infolists\Components\Section::make('Account Information')
                    ->schema([
                        Infolists\Components\Grid::make(2)
                            ->schema([
                                Infolists\Components\IconEntry::make('is_verified')
                                    ->label('Verified Account')
                                    ->boolean()
                                    ->trueIcon('heroicon-o-check-badge')
                                    ->falseIcon('heroicon-o-minus-circle'),
                                    
                                Infolists\Components\IconEntry::make('is_business')
                                    ->label('Business Account')
                                    ->boolean()
                                    ->trueIcon('heroicon-o-building-office')
                                    ->falseIcon('heroicon-o-user'),
                                    
                                Infolists\Components\IconEntry::make('is_active')
                                    ->label('Active Profile')
                                    ->boolean()
                                    ->trueIcon('heroicon-o-eye')
                                    ->falseIcon('heroicon-o-eye-slash'),
                                    
                                Infolists\Components\TextEntry::make('last_synced_at')
                                    ->label('Last Synchronized')
                                    ->since()
                                    ->placeholder('Never synchronized')
                                    ->icon('heroicon-o-clock'),
                            ]),
                    ])
                    ->icon('heroicon-o-information-circle'),

                Infolists\Components\Section::make('Links & Actions')
                    ->schema([
                        Infolists\Components\Actions::make([
                            Infolists\Components\Actions\Action::make('visit_instagram')
                                ->label('Visit Instagram Profile')
                                ->icon('heroicon-o-arrow-top-right-on-square')
                                ->color('gray')
                                ->url(fn ($record) => $record->full_instagram_url)
                                ->openUrlInNewTab(),
                                
                            Infolists\Components\Actions\Action::make('copy_embed_code')
                                ->label('Copy Embed Code')
                                ->icon('heroicon-o-clipboard-document')
                                ->color('info')
                                ->action(function () {
                                    // JavaScript to copy embed code to clipboard
                                })
                                ->modalContent(fn ($record) => view('filament.modals.instagram-embed-code', compact('record'))),
                        ]),
                    ])
                    ->icon('heroicon-o-link'),

                Infolists\Components\Section::make('Additional Data')
                    ->schema([
                        Infolists\Components\KeyValueEntry::make('additional_info')
                            ->label('')
                            ->columnSpanFull(),
                    ])
                    ->collapsed()
                    ->visible(fn ($record) => !empty($record->additional_info))
                    ->icon('heroicon-o-information-circle'),
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
            'index' => Pages\ManageInstagramProfile::route('/'),
        ];
    }

    public static function getNavigationBadge(): ?string
    {
        $count = static::getModel()::where('is_active', true)->count();
        return $count > 0 ? '✓' : '!';
    }

    public static function getNavigationBadgeColor(): string
    {
        $count = static::getModel()::where('is_active', true)->count();
        return $count > 0 ? 'success' : 'warning';
    }
}