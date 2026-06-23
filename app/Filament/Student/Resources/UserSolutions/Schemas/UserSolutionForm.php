<?php

namespace App\Filament\Student\Resources\UserSolutions\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class UserSolutionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make()->schema([
                    Section::make(fn($livewire) => '#' . $livewire->record->task_id)->schema([
                        TextEntry::make('task.source.source_name')
                            ->label('Источник')
                            ->badge()
                            ->columnStart(1),
                        TextEntry::make('task.task_number_in_the_kim')
                            ->label('Номер задачи по КИМ')
                            ->badge()
                            ->columnStart(1),
                        TextEntry::make('task.difficulty_level')
                            ->label('Уровень сложности')
                            ->badge()
                            ->columnStart(1),
                    ])
                        ->columnStart(1)
                        ->columns(1),
                    Section::make()->schema([
                        TextEntry::make('task.condition')
                            ->label('Условие')
                            ->columnStart(1)
                            ->markdown(),
                        TextInput::make('user_answer')
                            ->required()
                            ->label('Ваш ответ')
                            ->placeholder('Введите ответ'),
                        FileUpload::make('solution_files_path')
                            ->label('Приложите файлы решения при необходимости')
                    ])
                        ->columnStart(2)
                        ->columnSpan(2)
                ])
                    ->columnSpan(2)
                    ->columns(3)
                /*TextInput::make('task_id')
                    ->required()
                    ->numeric(),
                TextInput::make('user_id')
                    ->required()
                    ->numeric(),

                Select::make('state')
                    ->options([
            'new' => 'New',
            'answer_isnt_given' => 'Answer isnt given',
            'correct_answer_has_been_given' => 'Correct answer has been given',
            'incorrect_answer_given' => 'Incorrect answer given',
        ])
                    ->default('new')
                    ->required(),*/
//                TextInput::make('solution_files_path')
//                    ->default(null),

            ]);
    }
}
