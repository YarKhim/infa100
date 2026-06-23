<?php

namespace App\Filament\Student\Resources\UserSolutions;

use App\Filament\Student\Resources\UserSolutions\Pages\CreateUserSolution;
use App\Filament\Student\Resources\UserSolutions\Pages\EditUserSolution;
use App\Filament\Student\Resources\UserSolutions\Pages\ListUserSolutions;
use App\Filament\Student\Resources\UserSolutions\Pages\ViewUserSolution;
use App\Filament\Student\Resources\UserSolutions\Schemas\UserSolutionForm;
use App\Filament\Student\Resources\UserSolutions\Schemas\UserSolutionInfolist;
use App\Filament\Student\Resources\UserSolutions\Tables\UserSolutionsTable;
use App\Models\UserSolution;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class UserSolutionResource extends Resource
{
    protected static ?string $model = UserSolution::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return UserSolutionForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return UserSolutionInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return UserSolutionsTable::configure($table);
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
            'index' => ListUserSolutions::route('/'),
            'create' => CreateUserSolution::route('/create'),
            'view' => ViewUserSolution::route('/{record}'),
            'edit' => EditUserSolution::route('/{record}/edit'),
        ];
    }
}
