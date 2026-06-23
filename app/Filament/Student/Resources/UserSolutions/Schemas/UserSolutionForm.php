<?php

namespace App\Filament\Student\Resources\UserSolutions\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class UserSolutionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('task_id')
                    ->required()
                    ->numeric(),
                TextInput::make('user_id')
                    ->required()
                    ->numeric(),
                TextInput::make('user_answer')
                    ->required(),
                Select::make('state')
                    ->options([
            'new' => 'New',
            'answer_isnt_given' => 'Answer isnt given',
            'correct_answer_has_been_given' => 'Correct answer has been given',
            'incorrect_answer_given' => 'Incorrect answer given',
        ])
                    ->default('new')
                    ->required(),
                TextInput::make('solution_files_path')
                    ->default(null),
            ]);
    }
}
