<?php

namespace App\Filament\Resources\Tasks\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class TaskInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make(fn ($livewire) => 'Задача #' . $livewire->record->id)
                    ->schema([
                        TextEntry::make('source.source_name')
                            ->label('Источник')
                            ->badge()
                            ->columnStart(1),
                        TextEntry::make('difficulty_level')
                            ->badge()
                            ->label('Уровень сложности')
                            ->columnStart(1),
                        Section::make()->schema([

                        ])->columnStart(2)
                        ->columnSpan(3)
                ])->columns(4),
                /*TextEntry::make('id_subject')
                    ->numeric(),*/

                /*TextEntry::make('id_task_source')
                    ->numeric(),*/
                #TextEntry::make('subject.subject_name'),
                /*TextEntry::make('task_type')
                    ->badge(),*/
                /*TextEntry::make('task_number_in_the_kim')
                    ->numeric(),*/

                /*TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),*/
            ])->columns(1);
    }
}
