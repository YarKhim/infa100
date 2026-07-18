<?php

namespace App\Filament\Expert\Resources\SubjectKimNumbers\Pages;

use App\Filament\Expert\Resources\SubjectKimNumbers\SubjectKimNumberResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListSubjectKimNumbers extends ListRecords
{
    protected static string $resource = SubjectKimNumberResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
