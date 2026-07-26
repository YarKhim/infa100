<?php

namespace App\Filament\Student\Resources\CourseSubscriptions\Pages;

use App\Filament\Student\Resources\CourseSubscriptions\CourseSubscriptionResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewCourseSubscription extends ViewRecord
{
    protected static string $resource = CourseSubscriptionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
