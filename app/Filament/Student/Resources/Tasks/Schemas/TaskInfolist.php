<?php

namespace App\Filament\Student\Resources\Tasks\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class TaskInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make(fn ($livewire) => '#' . $livewire->record->id)->schema([
                    Section::make('Сведения о задаче')->schema([
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
                            ->label(fn ($livewire) => '№ ' . $livewire->record->task_number_in_the_kim)
                            ->columnStart(1)
                    ])->columnSpan(3)
                ])->columns(4)


            ])->columns(1);
    }
}
