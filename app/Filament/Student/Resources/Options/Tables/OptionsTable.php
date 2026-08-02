<?php

namespace App\Filament\Student\Resources\Options\Tables;

use App\Models\Option;
use App\Models\OptionSolution;
use App\Models\UserSolution;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Filament\Tables\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

class OptionsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('subject.subject_name')
                    ->searchable(),
                TextColumn::make('source.source_name')
                    ->searchable(),
                TextColumn::make('solution.secondary_score')
                    ->badge()
                    ->label('Полученные баллы')
                    ->default('Не решён')
                    ->searchable(),
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
                SelectFilter::make('subject')
                    ->relationship('subject', 'subject_name')
                    ->preload()
                    ->label('Предмет'),
                SelectFilter::make('task_source')
                    ->relationship('source', 'source_name')
                    ->label('Автор варианта')
                    ->multiple(),
            ])
            ->recordActions([
                ViewAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
