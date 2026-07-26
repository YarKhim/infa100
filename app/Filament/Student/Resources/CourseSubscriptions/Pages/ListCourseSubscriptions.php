<?php

namespace App\Filament\Student\Resources\CourseSubscriptions\Pages;

use App\Filament\Student\Resources\CourseSubscriptions\CourseSubscriptionResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListCourseSubscriptions extends ListRecords
{
    protected static string $resource = CourseSubscriptionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
