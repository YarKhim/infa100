<?php

namespace App\Filament\Expert\Resources\Tasks\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
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
                    ->searchable()
                    ->preload(),
                SelectFilter::make('task_type')
                    ->options([
                        'Задание с кратким ответом' => 'Задание с кратким ответом',
                        'Задание не с кратким ответом' => 'Задание не с кратким ответом',
                    ]),
                SelectFilter::make('task_source')
                    ->relationship('source', 'source_name')
                    //->searchable()
                    ->multiple()
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    //DeleteBulkAction::make(),
                ]),
            ]);
    }
}
