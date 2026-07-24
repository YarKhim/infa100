<?php

namespace App\Filament\Teacher\Resources\Events\Pages;

use App\Filament\Teacher\Resources\Events\EventResource;
use Filament\Resources\Pages\CreateRecord;

class CreateEvent extends CreateRecord
{
    protected static string $resource = EventResource::class;
}
