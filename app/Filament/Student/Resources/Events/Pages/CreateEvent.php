<?php

namespace App\Filament\Student\Resources\Events\Pages;

use App\Filament\Student\Resources\Events\EventResource;
use Filament\Resources\Pages\CreateRecord;

class CreateEvent extends CreateRecord
{
    protected static string $resource = EventResource::class;
}
