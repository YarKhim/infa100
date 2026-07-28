<?php

namespace App\Filament\Student\Resources\CourseSubscriptions;

use App\Filament\Student\Resources\CourseSubscriptions\Pages\CreateCourseSubscription;
use App\Filament\Student\Resources\CourseSubscriptions\Pages\EditCourseSubscription;
use App\Filament\Student\Resources\CourseSubscriptions\Pages\ListCourseSubscriptions;
use App\Filament\Student\Resources\CourseSubscriptions\Pages\ViewCourseSubscription;
use App\Filament\Student\Resources\CourseSubscriptions\Schemas\CourseSubscriptionForm;
use App\Filament\Student\Resources\CourseSubscriptions\Schemas\CourseSubscriptionInfolist;
use App\Filament\Student\Resources\CourseSubscriptions\Tables\CourseSubscriptionsTable;
use App\Models\CourseSubscription;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class CourseSubscriptionResource extends Resource
{
    protected static ?string $model = CourseSubscription::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return CourseSubscriptionForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return CourseSubscriptionInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return CourseSubscriptionsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            //'index' => ListCourseSubscriptions::route('/'),
            'create' => CreateCourseSubscription::route('/create'),
            'view' => ViewCourseSubscription::route('/{record}'),
            'edit' => EditCourseSubscription::route('/{record}/edit'),
        ];
    }
}
