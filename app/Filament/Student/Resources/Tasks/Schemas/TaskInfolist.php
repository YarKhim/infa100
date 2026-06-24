<?php

namespace App\Filament\Student\Resources\Tasks\Schemas;

use App\Models\Task;
use App\Models\UserSolution;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Auth;

class TaskInfolist
{
    public static function configure(Schema $schema): Schema
    {
        //composer require phiki/phiki

        return $schema
            ->components([
                Section::make(fn($livewire) => '#' . $livewire->record->id)->schema([
                    Section::make('Сведения о задаче')->schema([
                        TextEntry::make('is_solved')
                            ->label(function (Task $record) {
                                return UserSolution::query()
                                    ->where('user_id', Auth::id())
                                    ->where('task_id', $record->id)
                                    ->count() ? 'Вы уже решали эту задачу ранее' : 'Задача ещё не решена вами';
                            }),
                        TextEntry::make('source.source_name')
                            ->label('Источник')
                            ->badge()
                            ->columnStart(1),
                        TextEntry::make('task_number_in_the_kim')
                            ->label('Номер задачи по КИМ')
                            ->badge()
                            ->columnStart(1),
                        TextEntry::make('difficulty_level')
                            ->label('Уровень сложности')
                            ->badge()
                            ->columnStart(1),

                    ])->columns(1),
                    Section::make('Условие')->schema([
                        TextEntry::make('condition')
                            ->label(fn($livewire) => '№ ' . $livewire->record->task_number_in_the_kim)
                            ->columnStart(1)
                            ->markdown()

                    ])->columnSpan(3)
                ])->columns(4)


            ])->columns(1);
    }
}
