<?php

namespace App\Filament\Resources\TaskSources\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class TaskSourceForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('source_name')
                    ->required(),
            ]);
    }
}
