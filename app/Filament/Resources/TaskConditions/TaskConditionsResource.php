<?php

namespace App\Filament\Resources\TaskConditions;

use App\Filament\Resources\TaskConditions\Pages\CreateTaskConditions;
use App\Filament\Resources\TaskConditions\Pages\EditTaskConditions;
use App\Filament\Resources\TaskConditions\Pages\ListTaskConditions;
use App\Filament\Resources\TaskConditions\Pages\ViewTaskConditions;
use App\Filament\Resources\TaskConditions\Schemas\TaskConditionsForm;
use App\Filament\Resources\TaskConditions\Schemas\TaskConditionsInfolist;
use App\Filament\Resources\TaskConditions\Tables\TaskConditionsTable;
use App\Models\TaskConditions;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TaskConditionsResource extends Resource
{
    protected static ?string $model = TaskConditions::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return TaskConditionsForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return TaskConditionsInfolist::configure($schema);
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
            'create' => CreateTaskConditions::route('/create'),
            'view' => ViewTaskConditions::route('/{record}'),
            'edit' => EditTaskConditions::route('/{record}/edit'),
        ];
    }

    public static function getRecordRouteBindingEloquentQuery(): Builder
    {
        return parent::getRecordRouteBindingEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
