<?php

namespace App\Filament\Resources\SubjectPointsTransfers\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class SubjectPointsTransferForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('subject_id')
                    ->required()
                    ->numeric(),
                TextInput::make('primary_sum')
                    ->required()
                    ->numeric(),
                TextInput::make('secondary_sum')
                    ->required()
                    ->numeric(),
            ]);
    }
}
