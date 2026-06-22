<?php

namespace App\Filament\Student\Resources\Tasks\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
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
                    ->label('Тип задания'),
                TextColumn::make('task_number_in_the_kim')
                    ->numeric()
                    ->sortable()
                    ->label('Номер задачи в КИМе'),
                TextColumn::make('difficulty_level')
                    ->badge()
                    ->label('Уровень сложности'),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                ViewAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    //DeleteBulkAction::make(),
                ]),
            ]);
    }
}
