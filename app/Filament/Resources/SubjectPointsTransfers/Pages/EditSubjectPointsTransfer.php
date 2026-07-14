<?php

namespace App\Filament\Resources\SubjectPointsTransfers\Pages;

use App\Filament\Resources\SubjectPointsTransfers\SubjectPointsTransferResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditSubjectPointsTransfer extends EditRecord
{
    protected static string $resource = SubjectPointsTransferResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
