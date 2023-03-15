<?php

namespace App\Filament\Resources\BatchResource\Pages;

use App\Filament\Resources\BatchResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBatch extends EditRecord
{
    protected static string $resource = BatchResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getSavedNotificationTitle(): ?string
    {
        return 'Batch Updated';
    }
}
