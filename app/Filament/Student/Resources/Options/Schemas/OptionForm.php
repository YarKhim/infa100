<?php

namespace App\Filament\Student\Resources\Options\Schemas;

use Filament\Forms\Components\Select;
use Filament\Schemas\Schema;

class OptionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('subject_id')
                    ->relationship('subject', 'id')
                    ->required(),
                Select::make('source_id')
                    ->relationship('source', 'id')
                    ->required(),
            ]);
    }
}
