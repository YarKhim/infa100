<?php

namespace App\Filament\Resources\TaskSources\Pages;

use App\Filament\Resources\TaskSources\TaskSourceResource;
use Filament\Resources\Pages\CreateRecord;

class CreateTaskSource extends CreateRecord
{
    protected static string $resource = TaskSourceResource::class;
}
