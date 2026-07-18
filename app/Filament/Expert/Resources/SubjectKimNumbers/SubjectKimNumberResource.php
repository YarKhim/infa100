<?php

namespace App\Filament\Expert\Resources\SubjectKimNumbers;

use App\Filament\Expert\Resources\SubjectKimNumbers\Pages\CreateSubjectKimNumber;
use App\Filament\Expert\Resources\SubjectKimNumbers\Pages\EditSubjectKimNumber;
use App\Filament\Expert\Resources\SubjectKimNumbers\Pages\ListSubjectKimNumbers;
use App\Filament\Expert\Resources\SubjectKimNumbers\Pages\ViewSubjectKimNumber;
use App\Filament\Expert\Resources\SubjectKimNumbers\Schemas\SubjectKimNumberForm;
use App\Filament\Expert\Resources\SubjectKimNumbers\Schemas\SubjectKimNumberInfolist;
use App\Filament\Expert\Resources\SubjectKimNumbers\Tables\SubjectKimNumbersTable;
use App\Models\SubjectKimNumber;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class SubjectKimNumberResource extends Resource
{
    protected static ?string $model = SubjectKimNumber::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return SubjectKimNumberForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return SubjectKimNumberInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return SubjectKimNumbersTable::configure($table);
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
            'index' => ListSubjectKimNumbers::route('/'),
            'create' => CreateSubjectKimNumber::route('/create'),
            'view' => ViewSubjectKimNumber::route('/{record}'),
            'edit' => EditSubjectKimNumber::route('/{record}/edit'),
        ];
    }
}
