<?php

namespace App\Filament\Student\Resources\OptionSolutions;

use App\Filament\Student\Resources\OptionSolutions\Pages\CreateOptionSolution;
use App\Filament\Student\Resources\OptionSolutions\Pages\EditOptionSolution;
use App\Filament\Student\Resources\OptionSolutions\Pages\ListOptionSolutions;
use App\Filament\Student\Resources\OptionSolutions\Pages\ViewOptionSolution;
use App\Filament\Student\Resources\OptionSolutions\Schemas\OptionSolutionForm;
use App\Filament\Student\Resources\OptionSolutions\Schemas\OptionSolutionInfolist;
use App\Filament\Student\Resources\OptionSolutions\Tables\OptionSolutionsTable;
use App\Models\OptionSolution;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class OptionSolutionResource extends Resource
{
    protected static ?string $model = OptionSolution::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return OptionSolutionForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return OptionSolutionInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return OptionSolutionsTable::configure($table);
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
            'index' => ListOptionSolutions::route('/'),
            'create' => CreateOptionSolution::route('/create'),
            'view' => ViewOptionSolution::route('/{record}'),
            'edit' => EditOptionSolution::route('/{record}/edit'),
        ];
    }
}
