<?php

namespace App\Filament\Expert\Resources\RightSolutions\Schemas;

use App\Models\Task;
use Facades\Livewire\Features\SupportFileUploads\GenerateSignedUploadUrl;
use Filament\Forms\Components\CodeEditor;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class RightSolutionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
//                TextInput::make('author_id')
//                    ->required()
//                    ->numeric(),
//                TextInput::make('task_id')
//                    ->required()
//                    ->numeric(),
                Textarea::make('solution')
                    ->required()
                    ->columnSpanFull()
                    ->label('Текст решения')
                    ->autosize(),

//                TextInput::make('files_path')
//                    ->default(null),
                FileUpload::make('files_path')
                    ->label('Файлы к решению (при необходимости)'),
                CodeEditor::make('code')
                    ->wrap()
                    ->language(\Filament\Forms\Components\CodeEditor\Enums\Language::Python)
                    ->label('Приложите к решению код при необходимости')
                    ->visible(function ($record) {
                        $subject_id = Task::query()->where('id', $record->task_id)
                            ->first()
                            ->id_subject;
                        return $subject_id == 1;
                    }),
            ]);
    }
}
