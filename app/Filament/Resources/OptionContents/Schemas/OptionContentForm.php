<?php

namespace App\Filament\Resources\OptionContents\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class OptionContentForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('option_id')
                    ->required()
                    ->numeric(),
                TextInput::make('task_id')
                    ->required()
                    ->numeric(),
            ]);
    }
}
