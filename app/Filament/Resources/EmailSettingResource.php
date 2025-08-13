<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EmailSettingResource\Pages;
use App\Models\EmailSetting;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Notifications\Notification;
use Filament\Forms\Components\Actions\Action;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class EmailSettingResource extends Resource
{
    protected static ?string $model = EmailSetting::class;

    protected static ?string $navigationIcon = 'heroicon-o-envelope-open';

    protected static ?string $navigationLabel = 'Email Settings';

    protected static ?string $modelLabel = 'Email Setting';

    protected static ?string $navigationGroup = 'Settings';

    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Email Configuration')
                    ->description('Configure your email settings for sending notifications and emails.')
                    ->schema([
                        Forms\Components\Grid::make(2)
                            ->schema([
                                Forms\Components\TextInput::make('key')
                                    ->label('Setting Key')
                                    ->required()
                                    ->disabled()
                                    ->maxLength(255),

                                Forms\Components\Select::make('type')
                                    ->label('Type')
                                    ->options([
                                        'string' => 'String',
                                        'password' => 'Password',
                                        'integer' => 'Integer',
                                        'boolean' => 'Boolean',
                                    ])
                                    ->required()
                                    ->reactive(),
                            ]),

                        Forms\Components\TextInput::make('value')
                            ->label('Value')
                            ->required()
                            ->password(fn ($get) => $get('type') === 'password')
                            ->numeric(fn ($get) => $get('type') === 'integer')
                            ->maxLength(500),

                        Forms\Components\Textarea::make('description')
                            ->label('Description')
                            ->rows(2)
                            ->maxLength(1000),
                    ]),

                Forms\Components\Section::make('Actions')
                    ->schema([
                        Forms\Components\Actions::make([
                            Action::make('test_email')
                                ->label('Test Email Configuration')
                                ->icon('heroicon-m-paper-airplane')
                                ->color('info')
                                ->requiresConfirmation()
                                ->modalHeading('Test Email Configuration')
                                ->modalDescription('This will send a test email to verify your email settings are working correctly.')
                                ->modalSubmitActionLabel('Send Test Email')
                                ->action(function () {
                                    try {
                                        // Refresh mail config with current settings
                                        EmailSetting::refreshMailConfig();
                                        
                                        // Send test email
                                        Mail::raw('This is a test email to verify your email configuration is working properly.', function ($message) {
                                            $fromAddress = EmailSetting::get('MAIL_FROM_ADDRESS');
                                            $fromName = EmailSetting::get('MAIL_FROM_NAME', config('app.name'));
                                            
                                            $message->from($fromAddress, $fromName)
                                                    ->to($fromAddress)
                                                    ->subject('Test Email - Configuration Verification');
                                        });

                                        Notification::make()
                                            ->title('Test email sent successfully!')
                                            ->success()
                                            ->send();

                                    } catch (\Exception $e) {
                                        Log::error('Email test failed: ' . $e->getMessage());
                                        
                                        Notification::make()
                                            ->title('Email test failed')
                                            ->body('Error: ' . $e->getMessage())
                                            ->danger()
                                            ->send();
                                    }
                                }),
                        ]),
                    ])
                    ->visibleOn('edit'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('key')
                    ->label('Setting Key')
                    ->searchable()
                    ->sortable()
                    ->weight('medium'),

                Tables\Columns\TextColumn::make('value')
                    ->label('Value')
                    ->searchable()
                    ->formatStateUsing(function ($state, $record) {
                        if ($record->type === 'password') {
                            return str_repeat('*', min(strlen($state), 12));
                        }
                        return $state;
                    })
                    ->limit(50),

                Tables\Columns\BadgeColumn::make('type')
                    ->label('Type')
                    ->colors([
                        'primary' => 'string',
                        'warning' => 'password',
                        'info' => 'integer',
                        'success' => 'boolean',
                    ]),

                Tables\Columns\TextColumn::make('description')
                    ->label('Description')
                    ->limit(50)
                    ->tooltip(function ($record) {
                        return $record->description;
                    }),

                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Last Updated')
                    ->dateTime()
                    ->sortable()
                    ->since(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('type')
                    ->options([
                        'string' => 'String',
                        'password' => 'Password',
                        'integer' => 'Integer',
                        'boolean' => 'Boolean',
                    ]),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('key', 'asc');
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
            'index' => Pages\ListEmailSettings::route('/'),
            'create' => Pages\CreateEmailSetting::route('/create'),
            'edit' => Pages\EditEmailSetting::route('/{record}/edit'),
        ];
    }
}