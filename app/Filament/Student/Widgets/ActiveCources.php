<?php

namespace App\Filament\Student\Widgets;

use App\Models\CourseSubscription;
use Filament\Actions\Action;
use Filament\Widgets\Widget;
use Illuminate\Support\Facades\Auth;


class ActiveCources extends Widget
{
    protected string $view = 'filament.student.widgets.active-cources';
//    protected int|string|array $columnSpan = [
//        'sm' => 2,
//        'md' => 1,
//        'lg' => 1,
//        'xl' => 1,
//    ];

    protected function getViewData(): array
    {
        return [
            'activeCources' => CourseSubscription::query()
                ->where('user_id', Auth::id())
                ->where('is_active', true)
                ->get(),
        ];
    }

}
