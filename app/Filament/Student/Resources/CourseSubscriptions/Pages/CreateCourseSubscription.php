<?php

namespace App\Filament\Student\Resources\CourseSubscriptions\Pages;

use App\Filament\Student\Resources\CourseSubscriptions\CourseSubscriptionResource;
use Filament\Resources\Pages\CreateRecord;

class CreateCourseSubscription extends CreateRecord
{
    protected static string $resource = CourseSubscriptionResource::class;
}
