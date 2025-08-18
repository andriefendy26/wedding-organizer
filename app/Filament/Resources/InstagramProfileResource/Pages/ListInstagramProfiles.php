<?php

namespace App\Filament\Resources\InstagramProfileResource\Pages;

use App\Filament\Resources\InstagramProfileResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Pages\Concerns\ExposesTableToWidgets;

class ListInstagramProfiles extends ListRecords
{
    use ExposesTableToWidgets;

    protected static string $resource = InstagramProfileResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    protected function getHeaderWidgets(): array
    {
        return [
            InstagramProfileResource\Widgets\InstagramProfileOverview::class,
        ];
    }
}