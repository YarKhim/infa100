<?php

namespace App\Filament\Resources\OptionContents;

use App\Filament\Resources\OptionContents\Pages\CreateOptionContent;
use App\Filament\Resources\OptionContents\Pages\EditOptionContent;
use App\Filament\Resources\OptionContents\Pages\ListOptionContents;
use App\Filament\Resources\OptionContents\Pages\ViewOptionContent;
use App\Filament\Resources\OptionContents\Schemas\OptionContentForm;
use App\Filament\Resources\OptionContents\Schemas\OptionContentInfolist;
use App\Filament\Resources\OptionContents\Tables\OptionContentsTable;
use App\Models\OptionContent;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class OptionContentResource extends Resource
{
    protected static ?string $model = OptionContent::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return OptionContentForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return OptionContentInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return OptionContentsTable::configure($table);
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
            'index' => ListOptionContents::route('/'),
            'create' => CreateOptionContent::route('/create'),
            'view' => ViewOptionContent::route('/{record}'),
            'edit' => EditOptionContent::route('/{record}/edit'),
        ];
    }
}
