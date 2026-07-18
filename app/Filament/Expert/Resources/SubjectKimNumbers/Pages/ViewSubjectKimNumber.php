<?php

namespace App\Filament\Expert\Resources\SubjectKimNumbers\Pages;

use App\Filament\Expert\Resources\SubjectKimNumbers\SubjectKimNumberResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewSubjectKimNumber extends ViewRecord
{
    protected static string $resource = SubjectKimNumberResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
