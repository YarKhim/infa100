<?php

namespace App\Filament\Expert\Resources\Tasks\Schemas;

use App\Models\SubjectKimNumber;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Forms\Set;

class TaskForm
{
    public static function configure(Schema $schema): Schema
    {
//        return $schema
//            ->components([
//                TextInput::make('id_subject')
//                    ->required()
//                    ->numeric(),
//                TextInput::make('id_task_source')
//                    ->required()
//                    ->numeric(),
//                Select::make('task_type')
//                    ->options([
//            'Задание с кратким ответом' => 'Заданиескраткимответом',
//            'Задание с развёрнутым ответом' => 'Заданиесразвёрнутымответом',
//        ])
//                    ->default('Задание с кратким ответом')
//                    ->required(),
//                TextInput::make('task_number_in_the_kim')
//                    ->required()
//                    ->numeric(),
//                TextInput::make('answer')
//                    ->required(),
//                Textarea::make('condition')
//                    ->required()
//                    ->columnSpanFull(),
//                Select::make('difficulty_level')
//                    ->options([1 => '1', '2', '3', '4', '5'])
//                    ->default('3')
//                    ->required(),
//                TextInput::make('files_path')
//                    ->default(null),
//            ]);
        return $schema
            ->components([
                Section::make('Сведения о задаче')->schema([
                    Select::make('id_subject')
                        ->relationship('subject', 'subject_name')
                        ->label('Предмет')
                        ->live()
                        ->afterStateUpdated(function ($set) {
                            $set('task_number_in_the_kim', null); // Сбрасываем выбранный предмет
                        })
                        ->required(),
                    //->default(1),
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
                    Select::make('task_number_in_the_kim')
                        ->required()
                        ->label('Номер задачи по КИМу')
                        ->options(function ($get) {
                            $subject_id = $get('id_subject');
                            if (!$subject_id) {
                                return [];
                            }
                            return SubjectKimNumber::where('subject_id', $subject_id)->pluck('number_in_kim', 'id');
                        }),
                    Select::make('difficulty_level')
                        ->options([1 => '1', '2', '3', '4', '5'])
                        ->default('3')
                        ->label('Уровень сложности')
                        ->required(),
                ])
                    ->columnSpan(2)
                    ->columns(5),
                Section::make('Условие задачи')
                    ->schema([
                        Textarea::make('condition')
                            ->required()
                            ->label('Условие')
                            ->columnStart(1)
                            ->columnSpanFull()
                            ->autosize(),
                        TextInput::make('answer')
                            ->required()
                            ->string()
                            ->columnSpan(1)
                            ->label('Правильный ответ'),
                        FileUpload::make('files_path')
                            ->disk('public')
                            ->directory('tasks_files')
                            ->placeholder('Наибольший размер файла - 20Мб')
                            ->columnSpan(1)
                            ->label('Файлы к задаче'),
                        //  ->withFileSize(false)

                    ])
                    ->columnSpan(2)
                    ->columns(2),


            ]);
    }
}
