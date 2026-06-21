<?php

namespace App\Filament\Resources\TaskSources;

use App\Filament\Resources\TaskSources\Pages\CreateTaskSource;
use App\Filament\Resources\TaskSources\Pages\EditTaskSource;
use App\Filament\Resources\TaskSources\Pages\ListTaskSources;
use App\Filament\Resources\TaskSources\Pages\ViewTaskSource;
use App\Filament\Resources\TaskSources\Schemas\TaskSourceForm;
use App\Filament\Resources\TaskSources\Schemas\TaskSourceInfolist;
use App\Filament\Resources\TaskSources\Tables\TaskSourcesTable;
use App\Models\TaskSource;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class TaskSourceResource extends Resource
{
    protected static ?string $model = TaskSource::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return TaskSourceForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return TaskSourceInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return TaskSourcesTable::configure($table);
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
            'index' => ListTaskSources::route('/'),
            'create' => CreateTaskSource::route('/create'),
            'view' => ViewTaskSource::route('/{record}'),
            'edit' => EditTaskSource::route('/{record}/edit'),
        ];
    }
}
