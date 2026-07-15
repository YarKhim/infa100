<?php

namespace App\Filament\Resources\RightSolutions\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class RightSolutionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('author_id')
                    ->required()
                    ->numeric(),
                TextInput::make('task_id')
                    ->required()
                    ->numeric(),
                Textarea::make('solution')
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('files_path')
                    ->default(null),
            ]);
    }
}
