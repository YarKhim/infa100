<?php

namespace App\Filament\Student\Resources\CourseSubscriptions\Pages;

use App\Filament\Student\Resources\CourseSubscriptions\CourseSubscriptionResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditCourseSubscription extends EditRecord
{
    protected static string $resource = CourseSubscriptionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
