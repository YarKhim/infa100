<?php

namespace App\Filament\Student\Widgets;
//namespace App\Filament\Resources\Widgets\Calendar;
use App\Models\CourseSubscription;
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
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\HtmlString;
use App\Filament\Widgets\Calendar;

class CalendarS extends CalendarWidget
{
    protected CalendarViewType $calendarView = CalendarViewType::DayGridMonth;
    // Этот виджет будет показан первым, так как имеет наименьшее значение `$sort`
    protected static ?int $sort = 0;
    protected bool $dateClickEnabled = false;
    protected bool $dateSelectEnabled = true;
    protected bool $eventClickEnabled = true;
    protected bool $eventDragEnabled = false;
    protected bool $useFilamentTimezone = true;
    protected bool $datesSetEnabled = true;


    protected function getEvents(FetchInfo $info): Collection|array|Builder
    {
        $cources_id = [];
        $cources = CourseSubscription::query()->where('user_id', Auth::id())->get();
        foreach ($cources as $cource) {
            if ($cource->is_active) {
                $cources_id[] = $cource->cource_id;
            }
        }

        return Event::query()->where('cource_id', $cources_id)->orWhere('cource_id', null)->get();
    }

    public function viewEventAction(): ViewAction
    {
        return $this->viewAction(Event::class);
    }

    protected function getEventClickContextMenuActions(): array
    {
        return [
            $this->viewEventAction()
        ];
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


