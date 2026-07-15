<?php

namespace App\Filament\Resources\SubjectPointsTransfers\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class SubjectPointsTransferForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('subject_id')
                    ->relationship('subject', 'subject_name')
                    ->required()
                    ->label('Выбрать предмет')
                    ->placeholder('Выбрать предмет')
                    ->default(3),
                TextInput::make('primary_sum')
                    ->required()
                    ->numeric(),
                TextInput::make('secondary_sum')
                    ->required()
                    ->numeric(),
            ]);
    }
}
