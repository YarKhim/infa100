<?php

namespace App\Filament\Expert\Resources\Tasks\Tables;

use App\Models\RightSolution;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class TasksTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('subject.subject_name')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('source.source_name')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('task_type')
                    ->badge(),
                TextColumn::make('task_number_in_the_kim')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('answer')
                    ->searchable(),
                TextColumn::make('difficulty_level')
                    ->badge(),
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
//                TextColumn::make('files_path')
//                    ->searchable(),
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
