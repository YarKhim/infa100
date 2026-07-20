<?php

namespace App\Filament\Student\Resources\UserSolutions\Schemas;

use App\Models\Task;
use App\Models\UserSolution;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Schema;
use Filament\Infolists\Components\CodeEntry;
use Filament\Support\Icons\Heroicon;
use Phiki\Grammar\Grammar;
use Phiki\Theme\Theme;

class UserSolutionInfolist
{
    public static function configure(Schema $schema): Schema
    {
        //composer require jeffgreco13/filament-breezy
        return $schema
            ->components([
                Section::make()->schema([
                    TextEntry::make('task_id')
                        ->numeric()
//                        ->columns(1)
                        ->label('Id задачи'),
                    TextEntry::make('user_answer')
                        ->label('Ваш ответ')
                        ->badge()
//                        ->columns(1)
                        ->visible(function ($record) {
                            return isset($record->user_answer) && $record->user_answer != null;
                        }),
                    TextEntry::make('state')
                        ->badge()
                        ->label('Статус решения')
                        ->columnSpan(1)
                        ->formatStateUsing(fn(string $state): string => match ($state) {
                            'answer_isnt_given' => 'Ответ сохранён',
                            'solution_on_checking' => 'На проверке',
                            'new' => 'Ответ не дан',
                            'correct_answer_has_been_given' => 'Решено верно',
                            UserSolution::STATE_SOLUTION_CHECKED => 'Проверено',
                            'incorrect_answer_given' => 'Решено неверно',
                            'solution_send_to_checking' => 'Отправлено на проверку',
                            default => 'Надо добавить описание',
                        })
                        ->icon(fn(string $state): Heroicon => match ($state) {
                            'answer_isnt_given' => Heroicon::CheckCircle,
                            'new' => Heroicon::Clock,
                            'correct_answer_has_been_given' => Heroicon::CheckCircle,
                            UserSolution::STATE_SOLUTION_CHECKED => Heroicon::CheckCircle,
                            'incorrect_answer_given' => Heroicon::XCircle,
                            'solution_on_checking' => Heroicon::Clock,
                            'solution_send_to_checking' => Heroicon::CheckCircle,
                            default => Heroicon::QuestionMarkCircle,
                        })
                        ->iconColor(fn(string $state): string => match ($state) {
                            'solution_on_checking' => 'info',
                            'correct_answer_has_been_given' => 'success',
                            UserSolution::STATE_SOLUTION_CHECKED => 'success',
                            'new' => 'waring',
                            'incorrect_answer_given' => 'danger',
                            'answer_isnt_given' => 'info',
                            'solution_send_to_checking' => 'info',
                            default => 'danger'
                        })
                        ->color(fn(string $state): string => match ($state) {
                            'solution_on_checking' => 'info',
                            'correct_answer_has_been_given' => 'success',
                            UserSolution::STATE_SOLUTION_CHECKED => 'success',
                            'new' => 'waring',
                            'incorrect_answer_given' => 'danger',
                            'answer_isnt_given' => 'info',
                            'solution_send_to_checking' => 'info',
                            default => 'danger'
                        }),
                    TextEntry::make('points_after_check')
//                        ->columns(1)
                        ->label('Баллы за задачу'),
                    TextEntry::make('updated_at')
                        ->dateTime('Y-d-m h:m')

//                        ->columns(1)
                        ->placeholder('-')
                        ->label('Отправлено'),
                    //  TextEntry::make('created_at')
                    //      ->dateTime()
                    //      ->placeholder('-'),
                ])
                    ->columns(5)
                    ->columnSpan(5),
//                TextEntry::make('source_id')
//                    ->badge(),
//                TextEntry::make('created_at')
//                    ->dateTime()
//                    ->placeholder('-'),
//                TextEntry::make('updated_at')
//                    ->dateTime()
//                    ->placeholder('-'),
                Section::make('Прикреплённые файлы решения')
                    ->schema([
                        ImageEntry::make('solution_files_path')
                            ->label('Вложения')
                            ->placeholder('Нет прикреплённых файлов')
                            ->columnStart(1)
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
                            ->columnSpanFull()
//                            ->columns(3)
                            ->visible(function ($record) {
                                return Task::query()
                                        ->where('id', $record->task_id)
                                        ->first()
                                        ->id_subject == 1;
                                //dd($record->task_id);
                            }),
                    ])
                    ->columnStart(1)
                    ->columnSpan(5)
                    ->columns(3),
                Section::make('Результаты проверки')->schema([
                    ImageEntry::make('paths_checked_files')
                        ->label('')
                        ->getStateUsing(function ($record) {
                            $res = array();
                            $paths = $record->paths_checked_files; // доступ к атрибуту модели
                            //dd($value);
                            if (isset($paths)) {
                                foreach ($paths as $path) {
                                    $res[] = $path['path'];
                                }
                                return $res;
                            }
                            return [];

                        })
//                    ->formatStateUsing()
                        ->placeholder('Нет прикреплённых файлов')
                        ->columnStart(1)
                        ->columns(1)
                        ->simpleLightbox(),
                ])
                    ->columnStart(1)
                    ->columnSpan(5)
                    ->columns(3),


                //->default('Нет прикреплённых файлов')
            ])
            ->columns(6);
    }
}
