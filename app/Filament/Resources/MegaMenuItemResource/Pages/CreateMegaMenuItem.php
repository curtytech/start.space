<?php

namespace App\Filament\Resources\MegaMenuItemResource\Pages;

use App\Filament\Resources\MegaMenuItemResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateMegaMenuItem extends CreateRecord
{
    protected static string $resource = MegaMenuItemResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['user_id'] = auth()->id();

        return $data;
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
