<?php

namespace App\Filament\Tutor\Resources\UserSolutions\Tables;

use App\Models\UserSolution;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Table;

class UserSolutionsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
//                TextColumn::make('task.id')
//                    ->searchable(),
                TextColumn::make('task_id')
                    ->numeric()
                    ->sortable()
                    ->label('ID задачи'),
                TextColumn::make('user_id')
                    ->numeric()
                    ->label('ID ученика')
                    ->sortable(),
                TextColumn::make('points_after_check'),
//                    ->label('Баллы после проверки'),
//                TextColumn::make('user_answer')
//                    ->searchable(),
//                TextColumn::make('state')
//                    ->badge(),

//                TextColumn::make('user_answer')
//                    ->searchable()
//                    ->label('Ваш ответ'),

//                TextColumn::make('source_id')
//                    ->searchable()
//                    ->label('Источник решения'),
                TextColumn::make('state')
                    ->formatStateUsing(fn(string $state): string => match ($state) {
                        'answer_isnt_given' => 'Ответ сохранён',
                        'solution_on_checking' => 'На проверке',
                        'new' => 'Не решено, можно продолжить решение',
                        'correct_answer_has_been_given' => 'Решено верно',
                        'incorrect_answer_given' => 'Решено неверно',
                        UserSolution::STATE_SOLUTION_CHECKED => 'Проверено',
                        'solution_send_to_checking' => 'Отправлено на проверку'
                    })
                    ->icon(fn(string $state): Heroicon => match ($state) {
                        'answer_isnt_given' => Heroicon::CheckCircle,
                        'new' => Heroicon::Clock,
                        'correct_answer_has_been_given' => Heroicon::CheckCircle,
                        'incorrect_answer_given' => Heroicon::XCircle,
                        'solution_on_checking' => Heroicon::Clock,
                        UserSolution::STATE_SOLUTION_CHECKED => Heroicon::CheckCircle,
                        'solution_send_to_checking' => Heroicon::CheckCircle,
                        default => Heroicon::QuestionMarkCircle,
                    })
                    ->iconColor(fn(string $state): string => match ($state) {
                        UserSolution::STATE_SOLUTION_CHECKED => 'success',
                        'correct_answer_has_been_given' => 'success',
                        'solution_send_to_checking' => 'info',
                        'new' => 'waring',
                        'incorrect_answer_given' => 'danger',
                        'answer_isnt_given' => 'info',
                        'solution_on_checking' => 'info',
                    })
                    ->label('Состояние'),
//                TextColumn::make('solution_files_path')
//                    ->searchable(),
//                TextColumn::make('created_at')
//                    ->dateTime()
//                    ->sortable()
//                    ->toggleable(isToggledHiddenByDefault: true),
//                TextColumn::make('updated_at')
//                    ->dateTime()
//                    ->sortable()
//                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('source.id')
                    ->searchable(),
                IconColumn::make('is_checked')
                    ->boolean()
                    ->label('Проверено'),
                TextColumn::make('points_after_check')
                    ->numeric()
                    ->sortable(),
                IconColumn::make('is_need_check')
                    ->boolean()
                    ->label('Требуется проверка'),
                TextColumn::make('tutor_id')
                    ->label('ID проверяющего')
                    ->numeric()
                    ->sortable(),
//                TextColumn::make('paths_checked_files')
//                    ->searchable(),
            ])
            ->filters([
                Filter::make('is_checked')
                    ->query(function ($query) {
                        return $query->where('is_checked', true);
                    })
                    ->label('Проверено'),
                Filter::make('is_need_check')
                    ->default()
                    ->query(function ($query) {
                        return $query->where('is_need_check', true);
                    })
                    ->label('Необходима проверка')
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
