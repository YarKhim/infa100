<?php

namespace App\Filament\Widgets;
//namespace App\Filament\Resources\Widgets\Calendar;
use App\Models\Event;
use App\Models\Subject;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Guava\Calendar\Contracts\ContextualInfo;
use Guava\Calendar\ValueObjects\DateClickInfo;
use Guava\Calendar\ValueObjects\EventClickInfo;
use Guava\Calendar\ValueObjects\FetchInfo;
use Illuminate\Database\Eloquent\Builder;
use Guava\Calendar\Filament\CalendarWidget;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Collection;
use Guava\Calendar\Enums\CalendarViewType;
use Guava\Calendar\Filament\Actions\CreateAction;
use Guava\Calendar\ValueObjects\EventDropInfo;
use Illuminate\Support\HtmlString;

class Calendar extends CalendarWidget
{
    protected CalendarViewType $calendarView = CalendarViewType::DayGridMonth;

    protected bool $dateClickEnabled = true;
    protected bool $dateSelectEnabled = true;
    protected bool $eventClickEnabled = true;
    protected bool $eventDragEnabled = true;
    protected bool $useFilamentTimezone = true;
    protected bool $datesSetEnabled = true;
//    protected ?string $defaultEventClickAction = 'edit';
//    protected CalendarViewType $calendarView = CalendarViewType::ResourceTimelineDay;
    protected ?string $locale = 'ru';

//    protected bool $dayMaxEvents = true;

    //protected CalendarViewType $calendarView = CalendarViewType::ResourceTimeGridWeek;
//    public function getHeading(): string|HtmlString
//    {
//        return  new HtmlString('<div>some html</div>');
//    }
    protected function getEvents(FetchInfo $info): Collection|array|Builder
    {
        return Event::all();
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
            $this->editEventAction(),
            $this->viewEventAction()
        ];
    }

    protected function getDateClickContextMenuActions(): array
    {
        return [
            $this->createEventAction(),
            // Любое другое действие, которое вам нужно
        ];
    }

    protected function onDateClick(DateClickInfo $info): void
    {
//        dd(1);
        // Проверить данные и обработать событие
        // Например, вы можете захотеть выполнить действие создания
        //$this->mountAction('createEvent');
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


