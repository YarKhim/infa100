<?php

namespace App\Filament\Student\Resources\UserSolutions\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Support\Icons\Heroicon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

class UserSolutionsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('task_id')
                    ->numeric()
                    ->sortable(),
//                TextColumn::make('user_id')
//                    ->numeric()
//                    ->sortable(),
                TextColumn::make('user_answer')
                    ->searchable(),
                TextColumn::make('state')
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'new' => 'Не решено, можно продолжить решение',
                        'correct_answer_has_been_given' => 'Решено верно',
                        'incorrect_answer_given'  => 'Решено неверно',
                    })
                    ->icon(fn (string $state): Heroicon => match ($state) {
                        'new' => Heroicon::Clock,
                        'correct_answer_has_been_given' => Heroicon::CheckCircle,
                        'incorrect_answer_given' => Heroicon::XCircle,
                        default => Heroicon::QuestionMarkCircle,
                    })
                    ->iconColor(fn (string $state): string => match ($state) {
                        'correct_answer_has_been_given' => 'success',
                        'new' => 'waring',
                        'incorrect_answer_given' => 'danger',
                    }),
                //                    ->badge()
//                    ->color(fn (string $state): string => match ($state) {
//                        'new'   => 'gray',
//                        'correct_answer_has_been_given'  => 'success',
//                        'incorrect_answer_given'  => 'danger',
//                        'answer_isnt_given' => 'info',
//                        default     => 'gray',
//                    })
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
            ])
            ->modifyQueryUsing(function (Builder $query){
                $query->where('user_id', Auth::id());
            })
            ->filters([
                //
            ])
            ->recordActions([
                ViewAction::make(),
//                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    //DeleteBulkAction::make(),
                ]),
            ]);
    }
}
