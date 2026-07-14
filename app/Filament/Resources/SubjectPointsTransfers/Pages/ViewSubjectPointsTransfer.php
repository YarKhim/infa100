<?php

namespace App\Filament\Resources\SubjectPointsTransfers\Pages;

use App\Filament\Resources\SubjectPointsTransfers\SubjectPointsTransferResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewSubjectPointsTransfer extends ViewRecord
{
    protected static string $resource = SubjectPointsTransferResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
