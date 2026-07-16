<?php

namespace App\Filament\Student\Resources\UserSolutions\Schemas;

use App\Models\Task;
use Filament\Actions\Action;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\RepeatableEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Infolists\Components\CodeEntry;
use Phiki\Grammar\Grammar;
use Phiki\Theme\Theme;

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
                CodeEntry::make('user_code')
                    ->label('Исходный код')
                    ->grammar(Grammar::Python)
                    ->lightTheme(Theme::GithubLight)
//                    ->darkTheme(Theme::GithubDark)
                    ->copyable()
                    ->copyMessage('Скопировано!')
                    ->copyMessageDuration(2000)
                    ->columnStart(1)
                    ->visible(function ($record) {
                        $subject_id = Task::query()->where('id', $record->task_id)
                            ->first()
                            ->id_subject;
                        return $subject_id == 1;
                        //dd($record->task_id);
                    }),
                Section::make('Мое изображение')
                    ->columnStart(1)
                    ->columnSpanFull()
                    ->columns(2)
                    ->schema([
                        ImageEntry::make('solution_files_path')
                            ->placeholder('-')
                            ->columnStart(1)
                            ->simpleLightbox()
                    ]),

            ]);
    }
}
