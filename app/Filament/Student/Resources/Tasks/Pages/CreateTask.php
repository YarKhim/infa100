<?php

namespace App\Filament\Student\Resources\Tasks\Pages;

use App\Filament\Student\Resources\Tasks\TaskResource;
use Filament\Resources\Pages\CreateRecord;

class CreateTask extends CreateRecord
{
    protected static string $resource = TaskResource::class;
}
