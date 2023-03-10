<?php

namespace App\Filament\Resources\ApplicantResource\Pages;

use App\Filament\Resources\ApplicantResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditApplicant extends EditRecord
{
    protected static string $resource = ApplicantResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
