<?php

namespace App\Filament\Teacher\Resources\Events\Pages;

use App\Filament\Teacher\Resources\Events\EventResource;
use App\Filament\Teacher\Widgets\CalendarT;
use App\Models\Event;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Guava\Calendar\Contracts\HasCalendar;

class ListEvents extends ListRecords implements HasCalendar
{
    protected static string $resource = EventResource::class;
    public static function getEventModel(): string
    {
        return Event::class; // или return 'App\\Models\\Event';
    }

    protected function getHeaderWidgets(): array
    {
        return [
            CalendarT::make()
        ];
    }
    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
