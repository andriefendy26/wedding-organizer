<?php

namespace App\Filament\Resources\InstagramProfileResource\Pages;

use App\Filament\Resources\InstagramProfileResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewInstagramProfile extends ViewRecord
{
    protected static string $resource = InstagramProfileResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
            Actions\Action::make('visit_instagram')
                ->label('Visit Instagram Profile')
                ->icon('heroicon-o-arrow-top-right-on-square')
                ->color('gray')
                ->url(fn () => $this->record->full_instagram_url)
                ->openUrlInNewTab(),
            Actions\Action::make('sync_stats')
                ->label('Sync Statistics')
                ->icon('heroicon-o-arrow-path')
                ->color('info')
                ->action(function () {
                    $this->record->update(['last_synced_at' => now()]);
                    $this->notify('success', 'Statistics synced successfully!');
                })
                ->requiresConfirmation()
                ->modalHeading('Sync Instagram Statistics')
                ->modalDescription('This will update the profile statistics from Instagram API.')
                ->modalSubmitActionLabel('Sync Now'),
        ];
    }
}
