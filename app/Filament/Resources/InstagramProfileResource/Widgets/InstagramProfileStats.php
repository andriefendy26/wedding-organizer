<?php

namespace App\Filament\Resources\InstagramProfileResource\Widgets;

use App\Models\InstagramProfile;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class InstagramProfileStats extends BaseWidget
{
    protected function getStats(): array
    {
        $profile = InstagramProfile::first();
        
        if (!$profile) {
            return [
                Stat::make('Instagram Profile', 'Not Set Up')
                    ->description('Create your Instagram profile to get started')
                    ->descriptionIcon('heroicon-m-camera')
                    ->color('warning'),
                    
                Stat::make('Setup Required', 'Configure Now')
                    ->description('Add your Instagram details')
                    ->descriptionIcon('heroicon-m-cog-6-tooth')
                    ->color('danger'),
            ];
        }

        $engagementRate = 0;
        if ($profile->followers_count > 0) {
            $avgLikesPerPost = $profile->followers_count * 0.02; // Assuming 2% engagement
            $engagementRate = ($avgLikesPerPost / $profile->followers_count) * 100;
        }

        $profileStatus = $profile->is_active ? 'Active' : 'Inactive';
        $statusColor = $profile->is_active ? 'success' : 'warning';

        return [
            Stat::make('Profile Status', $profileStatus)
                ->description($profile->is_verified ? 'Verified Account' : 'Standard Account')
                ->descriptionIcon($profile->is_verified ? 'heroicon-m-check-badge' : 'heroicon-m-user-circle')
                ->color($statusColor),

            Stat::make('Followers', $this->formatNumber($profile->followers_count))
                ->description($profile->is_business ? 'Business Account' : 'Personal Account')
                ->descriptionIcon('heroicon-m-users')
                ->color('success'),

            Stat::make('Posts', $this->formatNumber($profile->posts_count))
                ->description('Total content shared')
                ->descriptionIcon('heroicon-m-camera')
                ->color('primary'),

            Stat::make('Engagement Rate', round($engagementRate, 1) . '%')
                ->description('Estimated engagement')
                ->descriptionIcon('heroicon-m-heart')
                ->color('info'),

            Stat::make('Last Sync', $profile->last_synced_at ? $profile->last_synced_at->diffForHumans() : 'Never')
                ->description($this->getSyncDescription($profile))
                ->descriptionIcon('heroicon-m-clock')
                ->color($this->getSyncColor($profile)),
        ];
    }

    private function formatNumber(int $number): string
    {
        if ($number >= 1000000) {
            return round($number / 1000000, 1) . 'M';
        } elseif ($number >= 1000) {
            return round($number / 1000, 1) . 'K';
        }
        
        return number_format($number);
    }

    private function getSyncDescription(InstagramProfile $profile): string
    {
        if (!$profile->last_synced_at) {
            return 'Never synchronized';
        }
        
        $daysSinceSync = $profile->last_synced_at->diffInDays(now());
        
        if ($daysSinceSync === 0) {
            return 'Recently updated';
        } elseif ($daysSinceSync <= 7) {
            return 'Up to date';
        } elseif ($daysSinceSync <= 30) {
            return 'Consider updating';
        } else {
            return 'Needs updating';
        }
    }

    private function getSyncColor(InstagramProfile $profile): string
    {
        if (!$profile->last_synced_at) {
            return 'warning';
        }
        
        $daysSinceSync = $profile->last_synced_at->diffInDays(now());
        
        if ($daysSinceSync <= 7) {
            return 'success';
        } elseif ($daysSinceSync <= 30) {
            return 'info';
        } else {
            return 'danger';
        }
    }
}