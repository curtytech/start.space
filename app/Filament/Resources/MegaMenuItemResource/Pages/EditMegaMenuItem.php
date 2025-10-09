<?php

namespace App\Filament\Resources\MegaMenuItemResource\Pages;

use App\Filament\Resources\MegaMenuItemResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMegaMenuItem extends EditRecord
{
    protected static string $resource = MegaMenuItemResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
