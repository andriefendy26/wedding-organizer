<?php
namespace App\Filament\Resources;

use App\Filament\Resources\EmailCampaignResource\Pages;
use App\Jobs\SendBulkEmailJob;
use App\Models\EmailCampaign;
use App\Models\EmailList;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class EmailCampaignResource extends Resource
{
    protected static ?string $model = EmailCampaign::class;
    protected static ?string $navigationIcon = 'heroicon-o-megaphone';
    protected static ?string $navigationLabel = 'Email Campaigns';
    protected static ?string $pluralModelLabel = 'Email Campaigns';
    protected static ?string $navigationGroup = 'Manajemen Email';
    protected static ?int $navigationSort = 8;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Campaign Details')
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->required()
                            ->maxLength(255)
                            ->helperText('Internal name for this campaign'),
                        Forms\Components\TextInput::make('subject')
                            ->required()
                            ->maxLength(255)
                            ->helperText('Email subject line that recipients will see'),
                    ]),
                
                Forms\Components\Section::make('Email Content')
                    ->schema([
                        Forms\Components\RichEditor::make('content')
                            ->required()
                            ->toolbarButtons([
                                'bold',
                                'italic',
                                'underline',
                                'link',
                                'bulletList',
                                'orderedList',
                                'h2',
                                'h3',
                            ])
                            ->helperText('Email content - HTML tags are supported'),
                    ]),
                
                Forms\Components\Section::make('Scheduling')
                    ->schema([
                        Forms\Components\DateTimePicker::make('scheduled_at')
                            ->nullable()
                            ->native(false)
                            ->displayFormat('d/m/Y H:i')
                            ->helperText('Leave empty to send immediately when triggered'),
                    ])
                    ->collapsible()
                    ->collapsed(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->searchable()
                    ->sortable()
                    ->weight('medium'),
                Tables\Columns\TextColumn::make('subject')
                    ->searchable()
                    ->limit(40)
                    ->tooltip(function ($record) {
                        return $record->subject;
                    }),
                Tables\Columns\BadgeColumn::make('status')
                    ->colors([
                        'secondary' => 'draft',
                        'warning' => 'sending',
                        'success' => 'sent',
                        'danger' => 'failed',
                    ])
                    ->icons([
                        'heroicon-o-pencil' => 'draft',
                        'heroicon-o-paper-airplane' => 'sending',
                        'heroicon-o-check-circle' => 'sent',
                        'heroicon-o-exclamation-circle' => 'failed',
                    ]),
                Tables\Columns\TextColumn::make('total_recipients')
                    ->label('Recipients')
                    ->numeric()
                    ->sortable()
                    ->alignCenter(),
                Tables\Columns\TextColumn::make('sent_count')
                    ->label('Sent')
                    ->numeric()
                    ->color('success')
                    ->alignCenter(),
                Tables\Columns\TextColumn::make('failed_count')
                    ->label('Failed')
                    ->numeric()
                    ->color('danger')
                    ->alignCenter(),
                Tables\Columns\TextColumn::make('progress')
                    ->label('Progress')
                    ->getStateUsing(function ($record) {
                        if ($record->total_recipients > 0) {
                            $percentage = round(($record->sent_count + $record->failed_count) / $record->total_recipients * 100, 1);
                            return $percentage . '%';
                        }
                        return 'N/A';
                    })
                    ->alignCenter(),
                Tables\Columns\TextColumn::make('scheduled_at')
                    ->label('Scheduled')
                    ->dateTime('d/m/Y H:i')
                    ->sortable()
                    ->placeholder('Send Now'),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Created')
                    ->dateTime('d/m/Y H:i')
                    ->sortable()
                    ->since(),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->options([
                        'draft' => 'Draft',
                        'sending' => 'Sending',
                        'sent' => 'Sent',
                        'failed' => 'Failed',
                    ]),
                Tables\Filters\Filter::make('scheduled')
                    ->query(fn ($query) => $query->whereNotNull('scheduled_at'))
                    ->label('Scheduled Campaigns'),
            ])
            ->actions([
                Tables\Actions\Action::make('preview')
                    ->icon('heroicon-o-eye')
                    ->color('gray')
                    ->modalHeading('Email Preview')
                    ->modalContent(function ($record) {
                        return view('filament.modals.email-preview', [
                            'subject' => $record->subject,
                            'content' => $record->content
                        ]);
                    })
                    ->modalSubmitAction(false)
                    ->modalCancelActionLabel('Close'),
                    
                Tables\Actions\Action::make('send')
                    ->icon('heroicon-o-paper-airplane')
                    ->color('success')
                    ->visible(fn ($record) => $record->status === 'draft')
                    ->requiresConfirmation()
                    ->modalHeading('Send Email Campaign')
                    ->modalDescription(function ($record) {
                        $activeEmails = EmailList::active()->count();
                        return "Are you sure you want to send '{$record->title}' to {$activeEmails} active subscribers?";
                    })
                    ->modalSubmitActionLabel('Send Campaign')
                    ->action(function (EmailCampaign $record) {
                        // Get active email subscribers
                        $emails = EmailList::active()->get(['name', 'email'])->toArray();
                        
                        if (empty($emails)) {
                            Notification::make()
                                ->title('No recipients found')
                                ->body('There are no active email subscribers to send to.')
                                ->warning()
                                ->send();
                            return;
                        }
                        
                        // Update campaign status and metrics
                        $record->update([
                            'status' => 'sending',
                            'total_recipients' => count($emails),
                            'sent_count' => 0,
                            'failed_count' => 0,
                            'sent_at' => now(),
                        ]);
                        
                        // Split emails into batches (10 emails per batch)
                        $batches = array_chunk($emails, 10);
                        
                        // Dispatch jobs for each batch
                        foreach ($batches as $index => $batch) {
                            SendBulkEmailJob::dispatch($record->id, $batch)
                                ->delay(now()->addSeconds($index * 30)); // 30 second delay between batches
                        }
                        
                        Notification::make()
                            ->title('Campaign Started!')
                            ->body("Sending emails to {$record->total_recipients} recipients in " . count($batches) . " batches.")
                            ->success()
                            ->duration(5000)
                            ->send();
                    }),
                    
                Tables\Actions\Action::make('duplicate')
                    ->icon('heroicon-o-document-duplicate')
                    ->color('gray')
                    ->action(function (EmailCampaign $record) {
                        $newCampaign = $record->replicate();
                        $newCampaign->title = $record->title . ' (Copy)';
                        $newCampaign->status = 'draft';
                        $newCampaign->total_recipients = 0;
                        $newCampaign->sent_count = 0;
                        $newCampaign->failed_count = 0;
                        $newCampaign->sent_at = null;
                        $newCampaign->save();
                        
                        Notification::make()
                            ->title('Campaign Duplicated')
                            ->body("'{$newCampaign->title}' has been created.")
                            ->success()
                            ->send();
                    }),
                    
                Tables\Actions\EditAction::make()
                    ->visible(fn ($record) => $record->status === 'draft'),
                    
                Tables\Actions\DeleteAction::make()
                    ->visible(fn ($record) => in_array($record->status, ['draft', 'sent'])),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()
                        ->requiresConfirmation(),
                ]),
            ])
            ->emptyStateHeading('No email campaigns yet')
            ->emptyStateDescription('Create your first email campaign to start sending promotional emails.')
            ->emptyStateIcon('heroicon-o-megaphone');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListEmailCampaigns::route('/'),
            'create' => Pages\CreateEmailCampaign::route('/create'),  // Fixed typo
            'edit' => Pages\EditEmailCampaign::route('/{record}/edit'),  // Fixed typo
        ];
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::where('status', 'draft')->count() ?: null;
    }

    public static function getNavigationBadgeColor(): ?string
    {
        return 'warning';
    }
}