<?php

namespace App\Filament\Tutor\Resources\UserSolutions\Schemas;

use App\Models\PointsPerTask;
use App\Models\Subject;
use App\Models\Task;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Infolists\Components\CodeEntry;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Auth;
use Phiki\Grammar\Grammar;
use Phiki\Theme\Theme;
use Pjedesigns\FilamentImageEditor\Forms\Components\ImageEditor;

class UserSolutionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
//                Select::make('task_id')
//                    ->relationship('task', 'id')
//                    ->required(),
                Section::make('Информация о решении')->schema([
                    Section::make()->schema([
                        TextEntry::make('user.name')
                            ->numeric()
                            ->columnStart(1)
                            ->label('Имя ученика'),
                        TextEntry::make('user_answer')
                            ->numeric()
                            ->columnStart(1)
                            ->label('Ответ ученика'),
                    ]),
                    Section::make('Приложения')->schema([
                        ImageEntry::make('solution_files_path')
                            ->label('Файлы решения')
                            ->placeholder('Нет прикреплённых файлов')
//                            ->columnStart(2)
                            ->columns(1)
                            ->simpleLightbox(),
                        CodeEntry::make('user_code')
                            ->label('Код к задаче')
                            ->placeholder('Нет прикреплённого кода')
                            ->grammar(Grammar::Python)
                            ->lightTheme(Theme::EverforestLight)
                            ->darkTheme(Theme::GruvboxDarkHard)
                            ->copyable()
                            ->copyMessage('Скопировано!')
                            ->copyMessageDuration(2000)
                            ->columnStart(2)
                            ->columnSpan(3)
//                            ->columns(3)
                            ->visible(function ($record) {
                                return Task::query()
                                        ->where('id', $record->task_id)
                                        ->first()
                                        ->id_subject == 1;
                                //dd($record->task_id);
                            }),
                    ])
                        ->columnStart(2)
                        ->columnSpan(3)
                        ->columns(4)
                ])
                    ->columnSpanFull()
                    ->columns(4),
                Section::make('Проверка')->schema([
                    Section::make()->schema([
                        Select::make('points_after_check')
//                            ->relationship('points', 'subject_id')
                            ->options(function ($record) {
                                $task = Task::query()
                                    ->where('id', $record->task_id)
                                    ->first();
                                $subejct_id = $task->id_subject;
                                $max_points = PointsPerTask::query()->where('subject_id', $subejct_id)
                                    ->where('task_number', $task->task_number_in_the_kim)
                                    ->first()
                                    ->max_points;
                                $arr = array();
                                for ($i = 0; $i <= $max_points; $i++) {
                                    $arr[] = $i;
                                }
                                return $arr;
                            })
                            ->required()
                            ->label('Баллы по итогам проверки'),
                        Toggle::make('is_checked')
                            ->label('Проверка окончена (Изменения после этого будут невозможны)')
                            ->default(false)
                            ->required(),
//                        TextInput::make('points_after_check')
//                            ->required()
//                            ->numeric()
//                            ->label('Баллы по итогам проверки')
//                            ->default(0),
                    ])
                        ->columnSpan(1),
                    Section::make()->schema([
                        Repeater::make('paths_checked_files')
                            ->reorderable(false)
                            ->deletable(false)
                            ->label('Файлы решения')
                            ->schema([
                                ImageEditor::make('path')
//                                    ->modalSize('7x1')
//                                    ->previewMaxHeight(800)
//                                    ->maxOutputSize(width: 4000, height: 4000)
                                    ->label('Фото')
                                    ->tools(['draw'])
                                    ->disk('public')
                                    ->tools([])
                            ])
                    ])
                        ->columnSpan(1),

                ])
                    ->columnSpanFull()
                    ->columns(2),


//                ImageEntry::make('solution_files_path')
//                    ->label('Вложения')
//                    ->placeholder('Нет прикреплённых файлов')
//                    ->columnStart(1)
//                    ->columns(1)
//                    ->simpleLightbox(),

//                Repeater::make('paths_checked_files')
//                    ->schema([
//                        ImageEditor::make('path')
//                            //->disk('public')
//                            ->disk('public')
//                            ->tools(['crop', 'draw'])
//                        //->directory('photos'),
//                    ])
//                    ->columns(1)
//                    ->defaultItems(1) // или без
//                [{"path":"images\/01KXXD6C056YFYH27FXA7NWFTF.jpg"},{"path":"images\/01KXXD6C06Z8YBWXHKAFGAFQPP.png"}]
//                  ["01KXXD6C056YFYH27FXA7NWFTF.jpg","01KXXD6C06Z8YBWXHKAFGAFQPP.png"]

//                    ->columnSpanFull(),


//                TextInput::make('solution_files_path')
//                    ->default(null),
//                Select::make('source_id')
//                    ->relationship('source', 'id')
//                    ->default(null),

//                CodeEntry::make('user_code')
//                    ->label('Код к задаче')
//                    ->placeholder('Нет прикреплённого кода')
//                    ->grammar(Grammar::Python)
//                    ->lightTheme(Theme::EverforestLight)
//                    ->darkTheme(Theme::GruvboxDarkHard)
//                    ->copyable()
//                    ->copyMessage('Скопировано!')
//                    ->copyMessageDuration(2000)
//                    ->columnStart(2)
//                    ->columnSpanFull()
//                    ->visible(function ($record) {
//                        return Task::query()
//                                ->where('id', $record->task_id)
//                                ->first()
//                                ->id_subject == 1;
//                    }),
//                ImageEntry::make('solution_files_path')
//                    ->label('Вложения')
//                    ->placeholder('Нет прикреплённых файлов')
//                    ->columnStart(1)
//                    ->columns(1)
//                    ->simpleLightbox(),
//                Toggle::make('is_checked')
//                    ->required(),
//                TextInput::make('points_after_check')
//                    ->required()
//                    ->numeric()
//                    ->default(0),
//                Toggle::make('is_need_check')
//                    ->required(),
//                TextInput::make('tutor_id')
//                    ->default(Auth::id())
//                    ->disabled()
//                    ->numeric()

//                TextInput::make('paths_checked_files')
//                    ->default(null),
            ])
            ->columns(2);
    }
}
