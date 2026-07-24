<?php

namespace App\Filament\Student\Resources\Events\Schemas;

use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class EventInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('title'),
                TextEntry::make('description')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('start')
                    ->dateTime(),
                TextEntry::make('end')
                    ->dateTime(),
                TextEntry::make('color'),
                IconEntry::make('all_day')
                    ->boolean(),
                TextEntry::make('location')
                    ->placeholder('-'),
                TextEntry::make('user.name')
                    ->label('User'),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('subject.id')
                    ->label('Subject')
                    ->placeholder('-'),
                TextEntry::make('teacher_id')
                    ->numeric()
                    ->placeholder('-'),
            ]);
    }
}
