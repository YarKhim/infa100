<?php

namespace App\Filament\Expert\Resources\SubjectKimNumbers\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class SubjectKimNumberForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
//                TextInput::make('subject_id')
//                    ->required()
//                    ->numeric(),
                Select::make('subject_id')

                    ->relationship('subject', 'subject_name')
                    ->placeholder('Выбрать предмет')
//                    ->default(2)
                    ->label('Предмет'),
                TextInput::make('number_in_kim')
                    ->required()
                    ->numeric(),
            ]);
    }
}
