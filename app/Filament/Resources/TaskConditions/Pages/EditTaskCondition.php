<?php

namespace App\Filament\Resources\TaskConditions\Pages;

use App\Filament\Resources\TaskConditions\TaskConditionResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditTaskCondition extends EditRecord
{
    protected static string $resource = TaskConditionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
