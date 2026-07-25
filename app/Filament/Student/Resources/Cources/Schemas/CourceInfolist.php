<?php

namespace App\Filament\Student\Resources\Cources\Schemas;

use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Support\Enums\FontWeight;
use Filament\Support\Enums\TextSize;
use Illuminate\Support\HtmlString;

class CourceInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Информация о курсе')->schema([
                    TextEntry::make('title')
                        ->columnSpan(1)
                        ->label('Название')
                        ->weight(FontWeight::Bold)
                        ->size(TextSize::Large),
                    ImageEntry::make('files_paths')
                        ->label(new HtmlString('&nbsp;'))
                        ->columnStart(1)
                        ->columnSpan(2)
                        ->imageSize(500),
                    TextEntry::make('description')
                        ->label('Описание')
                        ->placeholder('-')
                        ->markdown()
                        //->weight(FontWeight::Bold)
                        //->size(TextSize::Large)
                        ->columnSpan(3)
                        ->columnStart(3),
                    TextEntry::make('price')
                        ->label('Цена')
                        ->money('RUB')
                        ->columnStart(3)
                        ->size(TextSize::Large),
                ])
                    ->columns(4)
                    ->columnStart(1)
                    ->columnSpanFull(),
            ]);
    }
}
