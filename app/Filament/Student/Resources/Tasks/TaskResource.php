<?php

namespace App\Filament\Student\Resources\Tasks;

use App\Filament\Student\Resources\Tasks\Pages\CreateTask;
use App\Filament\Student\Resources\Tasks\Pages\EditTask;
use App\Filament\Student\Resources\Tasks\Pages\ListTasks;
use App\Filament\Student\Resources\Tasks\Pages\Solve;
use App\Filament\Student\Resources\Tasks\Pages\ViewTask;
use App\Filament\Student\Resources\Tasks\Schemas\TaskForm;
use App\Filament\Student\Resources\Tasks\Schemas\TaskInfolist;
use App\Filament\Student\Resources\Tasks\Tables\TasksTable;
use App\Models\Task;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class TaskResource extends Resource
{
    protected static ?string $model = Task::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::BookOpen;
    protected static ?string $navigationLabel = 'Задачи';

    public static function form(Schema $schema): Schema
    {
        return TaskForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return TaskInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return TasksTable::configure($table);
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
            'index' => ListTasks::route('/'),
            //'create' => CreateTask::route('/create'),
            'view' => ViewTask::route('/{record}'),
            //'solve' => Pages\Solve::route('/{record}/solve'),
            //'edit' => EditTask::route('/{record}/edit'),
        ];
    }

}
