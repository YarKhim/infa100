<?php

namespace App\Filament\Resources\Events\Pages;

use App\Filament\Resources\Events\EventResource;
use App\Filament\Widgets\Calendar;
use App\Models\Event;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Guava\Calendar\Contracts\HasCalendar;
use Guava\Calendar\Filament\CalendarWidget;

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
            Calendar::make()
        ];
    }

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
