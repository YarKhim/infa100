<?php

namespace App\Filament\Student\Resources\Events\Pages;

use App\Filament\Student\Resources\Events\EventResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Guava\Calendar\Contracts\HasCalendar;

class ListEvents extends ListRecords implements HasCalendar
{
    protected static string $resource = EventResource::class;

//    protected function getHeaderActions(): array
//    {
//        return [
//            CreateAction::make(),
//        ];
//    }
}
