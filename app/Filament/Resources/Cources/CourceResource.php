<?php

namespace App\Filament\Resources\Cources;

use App\Filament\Resources\Cources\Pages\CreateCource;
use App\Filament\Resources\Cources\Pages\EditCource;
use App\Filament\Resources\Cources\Pages\ListCources;
use App\Filament\Resources\Cources\Pages\ViewCource;
use App\Filament\Resources\Cources\Schemas\CourceForm;
use App\Filament\Resources\Cources\Schemas\CourceInfolist;
use App\Filament\Resources\Cources\Tables\CourcesTable;
use App\Models\Cource;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class CourceResource extends Resource
{
    protected static ?string $model = Cource::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return CourceForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return CourceInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return CourcesTable::configure($table);
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
            'index' => ListCources::route('/'),
            'create' => CreateCource::route('/create'),
            'view' => ViewCource::route('/{record}'),
            'edit' => EditCource::route('/{record}/edit'),
        ];
    }
}
