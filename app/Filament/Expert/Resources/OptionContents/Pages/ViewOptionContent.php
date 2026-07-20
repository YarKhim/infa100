<?php

namespace App\Filament\Expert\Resources\OptionContents\Pages;

use App\Filament\Expert\Resources\OptionContents\OptionContentResource;
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
