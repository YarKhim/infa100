<?php

namespace App\Filament\Student\Resources\Cources\Pages;

use App\Filament\Student\Resources\Cources\CourceResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewCource extends ViewRecord
{
    protected static string $resource = CourceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            //EditAction::make(),
        ];
    }
}
