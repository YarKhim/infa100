<?php

namespace App\Filament\Resources\OptionContents\Pages;

use App\Filament\Resources\OptionContents\OptionContentResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewOptionContent extends ViewRecord
{
    protected static string $resource = OptionContentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
