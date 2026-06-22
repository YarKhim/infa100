<?php

namespace App\Filament\Student\Resources\Tasks\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class TaskInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('id_subject')
                    ->numeric(),
                TextEntry::make('id_task_source')
                    ->numeric(),
                TextEntry::make('task_type')
                    ->badge(),
                TextEntry::make('task_number_in_the_kim')
                    ->numeric(),
                TextEntry::make('answer'),
                TextEntry::make('condition')
                    ->columnSpanFull(),
                TextEntry::make('difficulty_level')
                    ->badge(),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
