<?php

namespace App\Filament\Expert\Resources\Options;

use App\Filament\Expert\Resources\Options\Pages\CreateOption;
use App\Filament\Expert\Resources\Options\Pages\EditOption;
use App\Filament\Expert\Resources\Options\Pages\ListOptions;
use App\Filament\Expert\Resources\Options\Pages\ViewOption;
use App\Filament\Expert\Resources\Options\Schemas\OptionForm;
use App\Filament\Expert\Resources\Options\Schemas\OptionInfolist;
use App\Filament\Expert\Resources\Options\Tables\OptionsTable;
use App\Filament\Expert\Resources\Tasks\Schemas\TaskInfolist;
use App\Models\Option;
use BackedEnum;
use Filament\Infolists\Components\RepeatableEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class OptionResource extends Resource
{
    protected static ?string $model = Option::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return OptionForm::configure($schema);
    }

//    public static function infolist(Schema $schema): Schema
//    {
//        return OptionInfolist::configure($schema);
//    }
    public static function infolist(Schema $schema): Schema
    {
        return OptionInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return OptionsTable::configure($table);
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
            'index' => ListOptions::route('/'),
            'create' => CreateOption::route('/create'),
            'view' => ViewOption::route('/{record}'),
            'edit' => EditOption::route('/{record}/edit'),
        ];
    }
}
