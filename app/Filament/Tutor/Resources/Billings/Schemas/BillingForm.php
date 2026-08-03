<?php

namespace App\Filament\Tutor\Resources\Billings\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class BillingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('operation_type')
                    ->required(),
                TextInput::make('tutor_id')
                    ->required()
                    ->numeric(),
                TextInput::make('summary')
                    ->required()
                    ->numeric(),
                TextInput::make('solution_id')
                    ->numeric()
                    ->default(null),
            ]);
    }
}
