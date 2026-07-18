<?php

namespace App\Filament\Tutor\Resources\UserSolutions\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class UserSolutionsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('task.id')
                    ->searchable(),
                TextColumn::make('user_id')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('user_answer')
                    ->searchable(),
                TextColumn::make('state')
                    ->badge(),
                TextColumn::make('solution_files_path')
                    ->searchable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('source.id')
                    ->searchable(),
                IconColumn::make('is_checked')
                    ->boolean(),
                TextColumn::make('points_after_check')
                    ->numeric()
                    ->sortable(),
                IconColumn::make('is_need_check')
                    ->boolean(),
                TextColumn::make('tutor_id')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('paths_checked_files')
                    ->searchable(),
            ])
            ->filters([
                //
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
