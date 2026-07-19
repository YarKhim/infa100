<?php

namespace App\Filament\Expert\Resources\PointsPerTasks;

use App\Filament\Expert\Resources\PointsPerTasks\Pages\CreatePointsPerTask;
use App\Filament\Expert\Resources\PointsPerTasks\Pages\EditPointsPerTask;
use App\Filament\Expert\Resources\PointsPerTasks\Pages\ListPointsPerTasks;
use App\Filament\Expert\Resources\PointsPerTasks\Pages\ViewPointsPerTask;
use App\Filament\Expert\Resources\PointsPerTasks\Schemas\PointsPerTaskForm;
use App\Filament\Expert\Resources\PointsPerTasks\Schemas\PointsPerTaskInfolist;
use App\Filament\Expert\Resources\PointsPerTasks\Tables\PointsPerTasksTable;
use App\Models\PointsPerTask;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class PointsPerTaskResource extends Resource
{
    protected static ?string $model = PointsPerTask::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return PointsPerTaskForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return PointsPerTaskInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PointsPerTasksTable::configure($table);
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
            'index' => ListPointsPerTasks::route('/'),
            'create' => CreatePointsPerTask::route('/create'),
            'view' => ViewPointsPerTask::route('/{record}'),
            'edit' => EditPointsPerTask::route('/{record}/edit'),
        ];
    }
}
