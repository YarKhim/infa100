<?php

namespace App\Filament\Resources\TaskConditions;

use App\Filament\Resources\TaskConditions\Pages\CreateTaskCondition;
use App\Filament\Resources\TaskConditions\Pages\EditTaskCondition;
use App\Filament\Resources\TaskConditions\Pages\ListTaskConditions;
use App\Filament\Resources\TaskConditions\Pages\ViewTaskCondition;
use App\Filament\Resources\TaskConditions\Schemas\TaskConditionForm;
use App\Filament\Resources\TaskConditions\Schemas\TaskConditionInfolist;
use App\Filament\Resources\TaskConditions\Tables\TaskConditionsTable;
use App\Models\TaskCondition;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class TaskConditionResource extends Resource
{
    protected static ?string $model = TaskCondition::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return TaskConditionForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return TaskConditionInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return TaskConditionsTable::configure($table);
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
            'index' => ListTaskConditions::route('/'),
            'create' => CreateTaskCondition::route('/create'),
            'view' => ViewTaskCondition::route('/{record}'),
            'edit' => EditTaskCondition::route('/{record}/edit'),
        ];
    }
}
