<?php

namespace App\Filament\Student\Resources\OptionSolutions\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class OptionSolutionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('user_id')
                    ->required()
                    ->numeric(),
                Toggle::make('is_solved')
                    ->required(),
            ]);
    }
}
