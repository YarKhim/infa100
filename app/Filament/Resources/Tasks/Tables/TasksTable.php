<?php

namespace App\Filament\Resources\Tasks\Tables;

use App\Models\RightSolution;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class TasksTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('subject.subject_name')
                    ->numeric()
                    ->sortable()
                    ->label('Предмет'),
                TextColumn::make('source.source_name')
                    ->numeric()
                    ->sortable()
                    ->label('Источник задачи'),
                TextColumn::make('task_type')
                    ->badge()
                    ->label('Тип задачи'),
                TextColumn::make('task_number_in_the_kim')
                    ->numeric()
                    ->sortable()
                    ->label('Номер задачи ко КИМу'),

                TextColumn::make('difficulty_level')
                    ->badge()
                    ->label('Сложность'),
                TextColumn::make('answer')
                    ->searchable()
                    ->label('Ответ'),
//                    ->color(fn(string $state): string => match ($state) {
//                        '1' => 'teal',
//                        '2' => 'teal',
//                        '3' => 'gray',
//                        '4' => 'teal',
//                        '5' => 'teal'
//                    }),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                IconColumn::make('has_solution')
                    ->label('Есть решение')
                    //->sortable()
                    ->color(function ($record) {
                        $d = [
                            true => 'success',
                            false => 'danger'
                        ];
                        return $d[RightSolution::query()
                            ->where('task_id', $record->id)
                            ->get()
                            ->count() > 0];
                    })
                    ->icon(function ($record) {
                        $d = [
                            true => Heroicon::CheckCircle,
                            false => Heroicon::XCircle
                        ];
                        return $d[RightSolution::query()
                            ->where('task_id', $record->id)
                            ->get()
                            ->count() > 0];
                    })
                    ->getStateUsing(fn($record) => RightSolution::query()
                            ->where('task_id', $record->id)
                            ->get()
                            ->count() > 0)
            ])
            ->filters([
                SelectFilter::make('subject')
                    ->relationship('subject', 'subject_name')
                    //->searchable()
                    ->preload()
                    ->label('Предмет'),
                SelectFilter::make('task_type')
                    ->options([
                        'Задание с кратким ответом' => 'Задание с кратким ответом',
                        'Задание не с кратким ответом' => 'Задание не с кратким ответом',
                    ])
                    ->label('Тип задачи'),
                SelectFilter::make('task_source')
                    ->relationship('source', 'source_name')
                    //->searchable()
                    ->label('Автор задачи')
                    ->multiple(),
                SelectFilter::make('difficulty_level')
                    ->options([
                        '1' => 'Лёгкое',
                        '2' => 'Легче ЕГЭ',
                        '3' => 'Уровень ЕГЭ',
                        '4' => 'Сложнее ЕГЭ',
                        '5' => 'Повышенный уровень сложности',
                    ])
                    ->multiple()
                    ->label('Тип задачи'),
                SelectFilter::make('has_solution')
                    ->form([

                    ])
                    ->options([
                        true => 'С решением',
                        false => 'Без решения',
                    ])
                    ->multiple()
                    ->label('Тип задачи'),
            ])
//            ->recordActions([
//                ViewAction::make(),
//                EditAction::make(),
//            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                    //EditAction::make(),
                ]),
            ]);
    }
}
