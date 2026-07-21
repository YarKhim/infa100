<?php

namespace App\Models;

use Guava\Calendar\Contracts\Eventable;
use Guava\Calendar\ValueObjects\CalendarEvent;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
        return CalendarEvent::make()
            ->title($this->title)
            ->start($this->start)
            ->end($this->end ?? $this->start)
            //->description($this->description ?? '')
            ->backgroundColor($this->color ?? '#3788d8')
            //->borderColor($this->color ?? '#3788d8')
            ->textColor($this->getTextColor())
            ->allDay($this->all_day ?? false)
            ->url(route('filament.admin.resources.events.edit', $this->id));
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
