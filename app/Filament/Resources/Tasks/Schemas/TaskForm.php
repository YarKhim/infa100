<?php

namespace App\Filament\Resources\Tasks\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
#condition
class TaskForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('id_subject')
                    ->relationship('subject', 'subject_name')
                    ->label('Предмет')
                    ->required(),
                Select::make('id_task_source')
                    ->relationship('source', 'source_name')
                    ->label('Источник')
                    ->required(),
                Select::make('task_type')
                    ->options([
                        'Задание с кратким ответом' => 'Задание с кратким ответом',
                        'Задание с развёрнутым ответом' => 'Задание с развёрнутым ответом',])
                    ->default('Задание с кратким ответом')
                    ->label('Тип задания')
                    ->required(),
                TextInput::make('task_number_in_the_kim')
                    ->required()
                    ->numeric()
                    ->label('Номер по КИМ'),
                Select::make('difficulty_level')
                    ->options([1 => '1', '2', '3', '4', '5'])
                    ->default('3')
                    ->label('Уровень сложности')
                    ->required(),
                TextInput::make('answer')
                    ->required()
                    ->string()
                    ->label('Правильный ответ'),
                FileUpload::make('file_path')
                    ->disk('public')
                    ->directory('tasks_files')
                    ->placeholder('Наибольший размер файла - 20Мб')
                    ->label('Файлы к задаче'),
                Textarea::make('condition')
                    ->required()
                    ->label('Условие')
                    ->columnStart(1),
            ]);
    }
}
