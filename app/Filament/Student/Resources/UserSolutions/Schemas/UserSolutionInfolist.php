<?php

namespace App\Filament\Student\Resources\UserSolutions\Schemas;

use App\Models\Task;
use Filament\Actions\Action;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\RepeatableEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Infolists\Components\CodeEntry;
use Filament\Support\Icons\Heroicon;
use Phiki\Grammar\Grammar;
use Phiki\Theme\Theme;

class UserSolutionInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make()->schema([
                    TextEntry::make('task_id')
                        ->numeric()
                        ->label('Id задачи'),
                    TextEntry::make('user_answer')
                        ->label('Ваш ответ')
                        ->badge()
                        ->visible(function ($record) {
                            return isset($record->user_answer) && $record->user_answer != null;
                        }),
                    TextEntry::make('state')
                        ->badge()
                        ->label('Статус решения')
                        ->columnSpan(2)
                        ->formatStateUsing(fn(string $state): string => match ($state) {
                            'answer_isnt_given' => 'Ответ сохранён',
                            'new' => 'Не решено, можно продолжить решение',
                            'correct_answer_has_been_given' => 'Решено верно',
                            'incorrect_answer_given' => 'Решено неверно',
                        })
                        ->icon(fn(string $state): Heroicon => match ($state) {
                            'answer_isnt_given' => Heroicon::CheckCircle,
                            'new' => Heroicon::Clock,
                            'correct_answer_has_been_given' => Heroicon::CheckCircle,
                            'incorrect_answer_given' => Heroicon::XCircle,
                            default => Heroicon::QuestionMarkCircle,
                        })
                        ->iconColor(fn(string $state): string => match ($state) {
                            'correct_answer_has_been_given' => 'success',
                            'new' => 'waring',
                            'incorrect_answer_given' => 'danger',
                            'answer_isnt_given' => 'info',
                        })
                        ->color(fn(string $state): string => match ($state) {
                            'correct_answer_has_been_given' => 'success',
                            'new' => 'waring',
                            'incorrect_answer_given' => 'danger',
                            'answer_isnt_given' => 'info',
                        }),

                    TextEntry::make('updated_at')
                        ->dateTime()
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
                    ->columns(3)
                //->default('Нет прикреплённых файлов')
            ])
            ->columns(6);
    }
}
