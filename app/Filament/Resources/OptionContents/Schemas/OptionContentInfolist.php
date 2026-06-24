<?php

namespace App\Filament\Resources\OptionContents\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class OptionContentInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('option_id')
                    ->numeric(),
                TextEntry::make('task_id')
                    ->numeric(),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
