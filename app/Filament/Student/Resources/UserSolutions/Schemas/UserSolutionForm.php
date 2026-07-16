<?php

namespace App\Filament\Student\Resources\UserSolutions\Schemas;

use App\Models\Task;
use Filament\Actions\Action;
use Filament\Forms\Components\CodeEditor;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\CodeEditor\Enums\Language;
use Filament\Forms\Components\TextInput;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Actions;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Storage;

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
                        Actions::make([
                            Action::make('Download')
                                ->label('Скачать')
                                ->action(fn($record) => Storage::download(Task::query()->where('id', $record->task_id)
                                        ->first()
                                        ->files_path))
                                ->button(),
                        ])
                        ->label('Файлы к задаче')

//                        FileUpload::make('attachments')
//                            ->enableDownload() // Добавляет кнопку скачивания для каждого файла
//                            ->enableOpen()     // Добавляет кнопку открытия/просмотра
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
                            ->label('Приложите фалы решения при необходимости и отредактируйте их')
                            ->maxSize(5000)
                            ->imageEditor()
                            ->multiple()
                            ->image(),
                        CodeEditor::make('user_code')
                            ->wrap()
                            ->language(\Filament\Forms\Components\CodeEditor\Enums\Language::Python)
                            ->label('Вставьте свой код при необходимости')
                            ->visible(function ($record) {
                                $subject_id = Task::query()->where('id', $record->task_id)
                                    ->first()
                                    ->id_subject;
                                return $subject_id == 1;
                                //dd($record->task_id);
                            }),
                    ])
                        ->columnStart(2)
                        ->columnSpan(2)
                ])
                    ->columnSpan(2)
                    ->columns(3)
            ]);
    }
}
