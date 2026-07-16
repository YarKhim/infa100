<?php

namespace App\Filament\Student\Resources\UserSolutions\Schemas;

use Filament\Actions\Action;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\RepeatableEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class UserSolutionInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('task_id')
                    ->numeric(),
                TextEntry::make('user_id')
                    ->numeric(),
                TextEntry::make('user_answer'),
                TextEntry::make('state')
                    ->badge(),
                TextEntry::make('source_id')
                    ->badge(),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
                Section::make('Мое изображение')
                    ->columnStart(1)
                    ->columnSpanFull()
                    ->columns(2) // Создаем сетку с двумя колонками
                    ->schema([
                        ImageEntry::make('solution_files_path')
                            ->placeholder('-')
                            ->columnStart(1)
                            ->width('auto')
                            ->simpleLightbox()
                    ]),
            ]);
    }
}
