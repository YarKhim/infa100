<?php

namespace App\Filament\Student\Resources\OptionSolutions\Pages;

use App\Filament\Student\Resources\OptionSolutions\OptionSolutionResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListOptionSolutions extends ListRecords
{
    protected static string $resource = OptionSolutionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            //CreateAction::make(),
        ];
    }
}
