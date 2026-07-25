<?php

namespace App\Filament\Student\Resources\Cources\Pages;

use App\Filament\Student\Resources\Cources\CourceResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListCources extends ListRecords
{
    protected static string $resource = CourceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            //CreateAction::make(),
        ];
    }
}
