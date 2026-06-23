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
                Section::make(fn ($livewire) => '# ' . $livewire->record->id)->schema([
                    Section::make()->schema([
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
                        TextEntry::make('answer')
                            ->label('Ответ')
                            ->columnStart(1)

                    ])->columns(1),
                    Section::make('Условие')->schema([
                        TextEntry::make('condition')
                            ->label(fn ($livewire) => '№ ' . $livewire->record->task_number_in_the_kim)
                            ->columnStart(1)
                            ->markdown()
                    ])->columnSpan(3)
                ])->columns(4)


            ])->columns(1);
    }
}
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
/*->schema([
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
])->columns(4),*/
