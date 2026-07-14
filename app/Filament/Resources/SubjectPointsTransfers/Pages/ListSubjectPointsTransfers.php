<?php

namespace App\Filament\Resources\SubjectPointsTransfers\Pages;

use App\Filament\Resources\SubjectPointsTransfers\SubjectPointsTransferResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListSubjectPointsTransfers extends ListRecords
{
    protected static string $resource = SubjectPointsTransferResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
