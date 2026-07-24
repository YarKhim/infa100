<?php

namespace App\Filament\Teacher\Widgets;

use App\Models\Event;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Guava\Calendar\ValueObjects\DateClickInfo;
use Guava\Calendar\ValueObjects\FetchInfo;
use Illuminate\Database\Eloquent\Builder;
use Guava\Calendar\Filament\CalendarWidget;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Guava\Calendar\Enums\CalendarViewType;
use Guava\Calendar\Filament\Actions\CreateAction;
use Guava\Calendar\ValueObjects\EventDropInfo;

class CalendarT extends CalendarWidget
{
    protected CalendarViewType $calendarView = CalendarViewType::DayGridMonth;

    protected bool $dateClickEnabled = true;
    protected bool $dateSelectEnabled = true;
    protected bool $eventClickEnabled = true;
    protected bool $eventDragEnabled = false;
    protected bool $useFilamentTimezone = true;
    protected bool $datesSetEnabled = true;
    protected ?string $locale = 'ru';

    protected function getEvents(FetchInfo $info): Collection|array|Builder
    {
        return Event::query()->where('subject_id', 1);
    }

    protected function onEventDrop(EventDropInfo $info, Model $event): bool
    {
        // Доступ к обновленным датам с помощью методов получения
        $newStart = $info->event->getStart();
        $newEnd = $info->event->getEnd();
        // Обновляем событие с новыми датами начала и окончания, чтобы сохранить изменения после перетаскивания
        $event->update([
            'start' => $newStart,
            'end' => $newEnd,

        ]);
        // Возвращаем true, чтобы принять перетаскивание и сохранить событие в новой позиции
        return true;
    }

    public function createEventAction(): CreateAction
    {
        return $this->createAction(Event::class);
    }

    public function editEventAction(): EditAction
    {
        return $this->editAction(Event::class);
    }

    public function viewEventAction(): ViewAction
    {
        return $this->viewAction(Event::class);
    }

    protected function getEventClickContextMenuActions(): array
    {
        return [
            //$this->editEventAction(),
            $this->viewEventAction()
        ];
    }

    protected function getDateClickContextMenuActions(): array
    {
        return [
            //$this->createEventAction(),
            // Любое другое действие, которое вам нужно
        ];
    }

    protected function onDateClick(DateClickInfo $info): void
    {
    }

    protected
    function getCalendarConfig(): array
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


