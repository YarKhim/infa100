<?php

namespace App\Filament\Student\Widgets;

use App\Models\Cource;
use App\Models\CourseSubscription;
use Filament\Widgets\Widget;
use Illuminate\Support\Facades\Auth;

class AllCources extends Widget
{
    protected string $view = 'filament.student.widgets.all-cources';
    protected int | string | array $columnSpan= 'full';
    protected function getViewData(): array
    {
        return [
            'cources' => Cource::all()
        ];
    }
}
