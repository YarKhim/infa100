<?php

namespace App\Filament\Expert\Resources\Tasks\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class TaskForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('id_subject')
                    ->required()
                    ->numeric(),
                TextInput::make('id_task_source')
                    ->required()
                    ->numeric(),
                Select::make('task_type')
                    ->options([
            'Задание с кратким ответом' => 'Заданиескраткимответом',
            'Задание с развёрнутым ответом' => 'Заданиесразвёрнутымответом',
        ])
                    ->default('Задание с кратким ответом')
                    ->required(),
                TextInput::make('task_number_in_the_kim')
                    ->required()
                    ->numeric(),
                TextInput::make('answer')
                    ->required(),
                Textarea::make('condition')
                    ->required()
                    ->columnSpanFull(),
                Select::make('difficulty_level')
                    ->options([1 => '1', '2', '3', '4', '5'])
                    ->default('3')
                    ->required(),
                TextInput::make('files_path')
                    ->default(null),
            ]);
    }
}
