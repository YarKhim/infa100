<?php

namespace App\Filament\Resources\RightSolutions\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class RightSolutionInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('author_id')
                    ->numeric(),
                TextEntry::make('task_id')
                    ->numeric(),
                TextEntry::make('solution')
                    ->columnSpanFull(),
                TextEntry::make('files_path')
                    ->placeholder('-'),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
