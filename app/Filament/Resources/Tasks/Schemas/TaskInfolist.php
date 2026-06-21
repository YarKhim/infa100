<?php

namespace App\Filament\Resources\Tasks\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class TaskInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                /*TextEntry::make('id_subject')
                    ->numeric(),*/
                TextEntry::make('source.source_name'),
                /*TextEntry::make('id_task_source')
                    ->numeric(),*/
                TextEntry::make('subject.subject_name'),
                TextEntry::make('task_type')
                    ->badge(),
                TextEntry::make('task_number_in_the_kim')
                    ->numeric(),
                TextEntry::make('difficulty_level')
                    ->badge(),
                /*TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),*/
            ]);
    }
}
