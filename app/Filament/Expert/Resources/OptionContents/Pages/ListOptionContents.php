<?php

namespace App\Filament\Expert\Resources\OptionContents\Pages;

use App\Filament\Expert\Resources\OptionContents\OptionContentResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListOptionContents extends ListRecords
{
    protected static string $resource = OptionContentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
