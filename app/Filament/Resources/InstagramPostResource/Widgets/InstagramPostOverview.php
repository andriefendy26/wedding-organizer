<?php

namespace App\Filament\Resources\InstagramPostResource\Widgets;

use App\Models\InstagramPost;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class InstagramPostOverview extends BaseWidget
{
    protected function getStats(): array
    {
        $totalPosts = InstagramPost::count();
        $activePosts = InstagramPost::where('is_active', true)->count();
        $totalLikes = InstagramPost::sum('like');
        $totalComments = InstagramPost::sum('comment');
        $averageLikes = $totalPosts > 0 ? round($totalLikes / $totalPosts) : 0;
        $averageComments = $totalPosts > 0 ? round($totalComments / $totalPosts) : 0;

        return [
            Stat::make('Total Posts', $totalPosts)
                ->description('All Instagram posts')
                ->descriptionIcon('heroicon-m-camera')
                ->color('primary'),

            Stat::make('Active Posts', $activePosts)
                ->description('Currently active posts')
                ->descriptionIcon('heroicon-m-check-circle')
                ->color('success'),

            Stat::make('Total Likes', number_format($totalLikes))
                ->description("Avg: {$averageLikes} per post")
                ->descriptionIcon('heroicon-m-heart')
                ->color('danger'),

            Stat::make('Total Comments', number_format($totalComments))
                ->description("Avg: {$averageComments} per post")
                ->descriptionIcon('heroicon-m-chat-bubble-left-right')
                ->color('info'),
        ];
    }
}