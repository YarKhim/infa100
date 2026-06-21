<?php

namespace App\Filament\Resources\Tasks\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Tiptap\Nodes\Text;

#condition
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
            'Задание с кратким ответом' => 'Задание с кратким ответом',
            'Задание с развёрнутым ответом' => 'Задание с развёрнутым ответом',
        ])
                    ->default('Задание с кратким ответом')
                    ->required(),
                TextInput::make('task_number_in_the_kim')
                    ->required()
                    ->numeric(),
                TextInput::make('condition.text')
                    ->required()
                    ->string(),
                Select::make('difficulty_level')
                    ->options([1 => '1', '2', '3', '4', '5'])
                    ->default('3')
                    ->required(),
            ]);
    }
}
