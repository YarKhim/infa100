<?php

namespace App\Filament\Student\Resources\Options\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class OptionInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('subject.id')
                    ->label('Subject'),
                TextEntry::make('source.id')
                    ->label('Source'),
                TextEntry::make('source_id')
                    ->label('Source'),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
