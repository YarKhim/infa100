<?php

namespace App\Filament\Tutor\Resources\Subjects;

use App\Filament\Tutor\Resources\Subjects\Pages\CreateSubject;
use App\Filament\Tutor\Resources\Subjects\Pages\EditSubject;
use App\Filament\Tutor\Resources\Subjects\Pages\ListSubjects;
use App\Filament\Tutor\Resources\Subjects\Pages\ViewSubject;
use App\Filament\Tutor\Resources\Subjects\Schemas\SubjectForm;
use App\Filament\Tutor\Resources\Subjects\Schemas\SubjectInfolist;
use App\Filament\Tutor\Resources\Subjects\Tables\SubjectsTable;
use App\Models\Subject;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class SubjectResource extends Resource
{
    protected static ?string $model = Subject::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return SubjectForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return SubjectInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return SubjectsTable::configure($table);
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
            'index' => ListSubjects::route('/'),
            'create' => CreateSubject::route('/create'),
            'view' => ViewSubject::route('/{record}'),
            'edit' => EditSubject::route('/{record}/edit'),
        ];
    }
}
