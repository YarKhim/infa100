<?php

namespace App\Filament\Expert\Resources\RightSolutions\Schemas;

use App\Models\Task;
use Filament\Infolists\Components\CodeEntry;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Phiki\Grammar\Grammar;
use Phiki\Theme\Theme;

class RightSolutionInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make()->schema([
                    TextEntry::make('Сведения об авторе решения')
                        ->label('Сведения об авторе решения')
                        ->columnStart(1),
                    TextEntry::make('author_id')
                        ->columnStart(1)
                        ->columnSpan(1),
                    TextEntry::make('userdata.name')
                        ->columnStart(2)
                        ->columnSpan(1),
                    TextEntry::make('task_id')
                        ->columnStart(3)
                        ->columnSpan(1)
                ])
                    ->columnStart(1)
                    ->columns(3)
                    ->columnSpan(5),
                Section::make()->schema([
                    TextEntry::make('solution')
                        ->columnSpanFull()
                        ->markdown(),
                    CodeEntry::make('code')
                        ->label('Код к задаче')
                        ->placeholder('Нет прикреплённого кода')
                        ->grammar(Grammar::Python)
                        ->lightTheme(Theme::EverforestLight)
                        ->darkTheme(Theme::GruvboxDarkHard)
                        ->copyable()
                        ->copyMessage('Скопировано!')
                        ->copyMessageDuration(2000)
                        ->columnStart(2)
                        ->columnSpanFull()
//                            ->columns(3)
                        ->visible(function ($record) {
                            return Task::query()
                                    ->where('id', $record->task_id)
                                    ->first()
                                    ->id_subject == 1;
                            //dd($record->task_id);
                        }),
                    ImageEntry::make('files_path')
                        ->label('Вложения')
                        ->placeholder('-')
                        ->simpleLightbox(),
                    TextEntry::make('created_at')
                        ->dateTime()
                        ->placeholder('-'),
                    TextEntry::make('updated_at')
                        ->dateTime()
                        ->placeholder('-'),
                ])
                    ->columnStart(1)
                    ->columnSpan(5)
            ])
            ->columns(6);
    }
}
