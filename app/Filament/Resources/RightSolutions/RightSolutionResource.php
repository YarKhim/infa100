<?php

namespace App\Filament\Resources\RightSolutions;

use App\Filament\Resources\RightSolutions\Pages\CreateRightSolution;
use App\Filament\Resources\RightSolutions\Pages\EditRightSolution;
use App\Filament\Resources\RightSolutions\Pages\ListRightSolutions;
use App\Filament\Resources\RightSolutions\Pages\ViewRightSolution;
use App\Filament\Resources\RightSolutions\Schemas\RightSolutionForm;
use App\Filament\Resources\RightSolutions\Schemas\RightSolutionInfolist;
use App\Filament\Resources\RightSolutions\Tables\RightSolutionsTable;
use App\Models\RightSolution;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class RightSolutionResource extends Resource
{
    protected static ?string $model = RightSolution::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return RightSolutionForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return RightSolutionInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return RightSolutionsTable::configure($table);
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
            'index' => ListRightSolutions::route('/'),
            'create' => CreateRightSolution::route('/create'),
            'view' => ViewRightSolution::route('/{record}'),
            'edit' => EditRightSolution::route('/{record}/edit'),
        ];
    }
}
