<?php

namespace App\Filament\Tutor\Resources\UserSolutions\Schemas;

use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class UserSolutionInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('task.id')
                    ->label('Task'),
                TextEntry::make('user_id')
                    ->numeric(),
                TextEntry::make('user_answer'),
                TextEntry::make('state')
                    ->badge(),
                TextEntry::make('solution_files_path')
                    ->placeholder('-'),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('source.id')
                    ->label('Source')
                    ->placeholder('-'),
                TextEntry::make('user_code')
                    ->placeholder('-')
                    ->columnSpanFull(),
                ImageEntry::make('solution_files_path')
                    ->label('Вложения')
                    ->placeholder('Нет прикреплённых файлов')
                    ->columnStart(1)
                    ->columns(1)
                    ->simpleLightbox(),
                ImageEntry::make('paths_checked_files')
                    ->label('Файлы проверки')
                    ->getStateUsing(function ($record) {
                        $res = array();
                        $paths = $record->paths_checked_files; // доступ к атрибуту модели
                        if ($paths == null) {
                            return [];
                        }
                        foreach ($paths as $path) {
                            $res[] = $path['path'];
                        }
                        return $res;
                    }),
                IconEntry::make('is_checked')
                    ->boolean(),
                TextEntry::make('points_after_check')
                    ->numeric(),
                IconEntry::make('is_need_check')
                    ->boolean(),
                TextEntry::make('tutor_id')
                    ->numeric()
                    ->placeholder('-'),
//                ImageEntry::make('paths_checked_files')
//                    ->placeholder('-'),
            ]);
    }
}
