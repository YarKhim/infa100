<?php

namespace App\Filament\Resources\Options\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class OptionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('subject_id')
                    ->required()
                    ->numeric(),
                TextInput::make('source_id')
                    ->required()
                    ->numeric(),
            ]);
    }
}
