<?php

namespace App\Filament\Tutor\Resources\Tasks\Tables;

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
                TextColumn::make('id_subject')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('id_task_source')
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
                TextColumn::make('files_path')
                    ->searchable(),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                ViewAction::make(),
                //EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    //DeleteBulkAction::make(),
                ]),
            ]);
    }
}
