<?php

namespace App\Filament\Widgets;
//namespace App\Filament\Resources\Widgets\Calendar;
use App\Models\Event;
use Guava\Calendar\ValueObjects\CalendarEvent;
use Guava\Calendar\ValueObjects\FetchInfo;
use Illuminate\Database\Eloquent\Builder;
use Guava\Calendar\Filament\CalendarWidget;
use Illuminate\Support\Collection;
use Guava\Calendar\Enums\CalendarViewType;

class Calendar extends CalendarWidget
{
    protected CalendarViewType $calendarView = CalendarViewType::DayGridMonth;

    //protected CalendarViewType $calendarView = CalendarViewType::ResourceTimeGridWeek;
    protected function getEvents(FetchInfo $info): Collection|array|Builder
    {
        return Event::all();
    }

    protected function getCalendarConfig(): array
    {
        return [
            'initialView' => 'dayGridMonth',
            'headerToolbar' => [
                'left' => 'prev,next today',
                'center' => 'title',
                'right' => 'dayGridMonth,timeGridWeek,timeGridDay',
            ],
            'weekNumbers' => true,
            'editable' => true,
            'selectable' => true,
            'selectMirror' => true,
            'dayMaxEvents' => true,
        ];
    }
}


