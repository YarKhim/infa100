<?php

namespace App\Filament\Expert\Resources\Options\Schemas;

use Filament\Forms\Components\Select;
use Filament\Schemas\Schema;

class OptionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('subject_id')
                    ->relationship('subject', 'subject_name')
                    ->required()
                    ->label('Предмет'),
//                    ->searchable(),
                Select::make('source_id')

                    ->relationship('source',
                        'source_name')
            ]);
    }
}
