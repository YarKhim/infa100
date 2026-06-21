<?php

namespace App\Filament\Resources\TaskSources\Pages;

use App\Filament\Resources\TaskSources\TaskSourceResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditTaskSource extends EditRecord
{
    protected static string $resource = TaskSourceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
