<?php

namespace App\Filament\Expert\Resources\SubjectKimNumbers\Pages;

use App\Filament\Expert\Resources\SubjectKimNumbers\SubjectKimNumberResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditSubjectKimNumber extends EditRecord
{
    protected static string $resource = SubjectKimNumberResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
