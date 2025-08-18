<?php

namespace App\Filament\Resources\InstagramProfileResource\Pages;

use App\Filament\Resources\InstagramProfileResource;
use App\Models\InstagramProfile;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;
use Filament\Notifications\Notification;

class ManageInstagramProfile extends ManageRecords
{
    protected static string $resource = InstagramProfileResource::class;

    protected function getHeaderActions(): array
    {
        $profile = InstagramProfile::first();
        
        if (!$profile) {
            return [
                Actions\CreateAction::make()
                    ->label('Create Instagram Profile')
                    ->icon('heroicon-o-plus-circle')
                    ->color('primary')
                    ->mutateFormDataUsing(function (array $data): array {
                        // Ensure only one profile exists
                        $data['is_active'] = true;
                        return $data;
                    })
                    ->after(function () {
                        Notification::make()
                            ->title('Instagram Profile Created')
                            ->body('Your Instagram profile has been created successfully.')
                            ->success()
                            ->send();
                    }),
            ];
        }

        return [
            Actions\Action::make('edit_profile')
                ->label('Edit Profile')
                ->icon('heroicon-o-pencil-square')
                ->color('primary')
                ->url(fn () => static::getResource()::getUrl('index', ['tableAction' => 'edit', 'tableActionRecord' => $profile->id]))
                ->button(),
                
            Actions\Action::make('sync_stats')
                ->label('Sync Statistics')
                ->icon('heroicon-o-arrow-path')
                ->color('info')
                ->action(function () use ($profile) {
                    $profile->update(['last_synced_at' => now()]);
                    
                    Notification::make()
                        ->title('Statistics Synchronized')
                        ->body('Instagram statistics have been updated.')
                        ->success()
                        ->send();
                })
                ->requiresConfirmation()
                ->modalHeading('Sync Instagram Statistics')
                ->modalDescription('This will update your profile statistics from Instagram. Make sure you have configured the Instagram API credentials.')
                ->modalSubmitActionLabel('Sync Now')
                ->modalIcon('heroicon-o-arrow-path'),
                
            Actions\Action::make('view_profile')
                ->label('View on Instagram')
                ->icon('heroicon-o-arrow-top-right-on-square')
                ->color('gray')
                ->url(fn () => $profile->full_instagram_url)
                ->openUrlInNewTab(),
                
            Actions\Action::make('preview_widget')
                ->label('Preview Widget')
                ->icon('heroicon-o-eye')
                ->color('info')
                ->modalContent(fn () => view('filament.modals.instagram-profile-preview', ['profile' => $profile]))
                ->modalHeading('Instagram Profile Widget Preview')
                ->modalSubmitAction(false)
                ->modalCancelActionLabel('Close')
                ->slideOver(),
        ];
    }

    protected function getHeaderWidgets(): array
    {
        return [
            InstagramProfileResource\Widgets\InstagramProfileStats::class,
        ];
    }

    public function getTitle(): string
    {
        return 'Instagram Profile';
    }

    public function getSubheading(): ?string
    {
        $profile = InstagramProfile::first();
        
        if (!$profile) {
            return 'Configure your Instagram profile to display on your website';
        }
        
        return "Manage your Instagram profile: @{$profile->username}";
    }

    protected function getTableEmptyStateHeading(): ?string
    {
        return 'No Instagram Profile Found';
    }

    protected function getTableEmptyStateDescription(): ?string
    {
        return 'Create your Instagram profile to display it on your website. You can only have one active profile.';
    }

    protected function getTableEmptyStateIcon(): ?string
    {
        return 'heroicon-o-camera';
    }

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        // Ensure only one profile can be created
        $existingProfile = InstagramProfile::first();
        
        if ($existingProfile) {
            Notification::make()
                ->title('Profile Already Exists')
                ->body('You can only have one Instagram profile. Please edit the existing one.')
                ->warning()
                ->send();
                
            $this->halt();
        }
        
        // Set default Instagram URL if not provided
        if (empty($data['instagram_url']) && !empty($data['username'])) {
            $data['instagram_url'] = "https://instagram.com/{$data['username']}";
        }
        
        $data['is_active'] = true;
        
        return $data;
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        // Update Instagram URL if username changed
        if (empty($data['instagram_url']) && !empty($data['username'])) {
            $data['instagram_url'] = "https://instagram.com/{$data['username']}";
        }
        
        return $data;
    }
}