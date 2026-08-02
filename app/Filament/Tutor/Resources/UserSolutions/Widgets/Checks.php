<?php

namespace App\Filament\Tutor\Resources\UserSolutions\Widgets;

use App\Models\UserSolution;
use Filament\Actions\Action;
use Filament\Actions\BulkAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\Widget;
use Illuminate\Support\Facades\Auth;

class Checks extends TableWidget
{
    protected static ?string $heading = 'Задачи, взятые в проверку вами';

    protected int|string|array $columnSpan = '1';

    public function table(Table $table): Table
    {
        return $table
            ->query(
                UserSolution::query()
                    ->where('tutor_id', Auth::id())
                    ->latest() // Сначала новые
            )
            ->columns([
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
//                IconColumn::make('is_checked')
//                    ->boolean()
//                    ->label('Проверено'),
                TextColumn::make('task.subject.subject_name')
                    ->label('Предмет')
                    ->sortable(),
                TextColumn::make('check_end')
                    ->label('Проверено')
                    ->dateTime('d.m.Y H:i')
                    ->sortable()
            ])
            ->filters([
                Filter::make('is_checked')
                    ->query(function ($query) {
                        return $query->where('is_checked', true);
                    })
                    ->label('Проверено'),
                Filter::make('is_need_check')
                    //->default()
                    ->query(function ($query) {
                        return $query->where('is_need_check', true);
                    })
                    ->label('Необходима проверка'),
            ])
            ->actions([
                ViewAction::make('view')
                    ->url(fn($record) => url("/tutor/user-solutions/{$record->id}"))
                    ->label('Просмотр')
                    ->icon('heroicon-o-eye')
                    ->color('info')
            ])
            ->defaultSort('created_at', 'desc')
            ->poll('10s') // Автообновление каждые 10 секунд
            ->striped() // Полосатая таблица
            ->emptyStateHeading('Нет записей')
            ->emptyStateDescription('У вас пока нет проверок')
            ->emptyStateIcon('heroicon-o-book-open');
    }
}
