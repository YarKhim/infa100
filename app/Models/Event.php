<?php

namespace App\Models;

use Guava\Calendar\Contracts\Eventable;
use Guava\Calendar\ValueObjects\CalendarEvent;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\HtmlString;

class Event extends Model implements Eventable
{
    protected $fillable = [
        'title',
        'description',
        'start',
        'end',
        'color',
        'all_day',
        'location',
        'user_id',
    ];

    protected $casts = [
        'start' => 'datetime',
        'end' => 'datetime',
        'all_day' => 'boolean',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }


    public function toCalendarEvent(): CalendarEvent
    {
        $start = $this->start;
        $end = $this->end;

        $title = sprintf(
            "%s\n%s\n%s – %s",
            $this->title,
            $this->description,
            $start->format('H:i'),
            $end->format('H:i')
        );
        return CalendarEvent::make($this)
            ->key($this->id)
//            ->title(new HtmlString(nl2br(e($title))))
//            ->title($this->title)
            ->title($title)
            ->start($this->start)
            ->styles([
                'white-space' => 'pre-line', // Важно для отображения переносов строк
                'line-height' => '1.2',
                'font-size' => '12px',
            ])
//            ->editable(true)
            ->end($this->end)
            ->action('view')
            ->extendedProps([
                'model' => Event::class,
                'key' => $this->id,
            ])
            ->backgroundColor($this->color ?? '#3788d8')
            ->textColor($this->getTextColor())
//            ->action('edit')
            ->allDay($this->all_day ?? false);
//            ->url(route('filament.admin.resources.events.edit', $this->id));
    }

    private function getTextColor(): string
    {
        // Определяем цвет текста в зависимости от фона
        $hex = str_replace('#', '', $this->color ?? '#3788d8');
        $r = hexdec(substr($hex, 0, 2));
        $g = hexdec(substr($hex, 2, 2));
        $b = hexdec(substr($hex, 4, 2));
        $brightness = ($r * 299 + $g * 587 + $b * 114) / 1000;
        return $brightness > 128 ? '#000000' : '#ffffff';
    }

}
