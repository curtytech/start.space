<?php

namespace App\Filament\Resources\MegaMenuItemResource\Pages;

use App\Filament\Resources\MegaMenuItemResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMegaMenuItems extends ListRecords
{
    protected static string $resource = MegaMenuItemResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
