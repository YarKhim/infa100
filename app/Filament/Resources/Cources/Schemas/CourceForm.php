<?php

namespace App\Filament\Resources\Cources\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Support\Enums\FontWeight;
use Filament\Support\Enums\TextSize;
use Illuminate\Support\HtmlString;

class CourceForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Информация о курсе')
                    ->schema([
                        TextInput::make('title')
                            ->columnSpanFull()
                            ->label('Название'),
                        FileUpload::make('files_paths')
                            ->label('Превью')
                            ->columnStart(1)
                            ->columnSpan(2),
                        Textarea::make('description')
                            ->label('Описание')
                            ->columnSpan(3)
                            ->autosize()
                            ->columnStart(3),
                        TextInput::make('price')
                            ->label('Цена')
                            ->default(0)
                            ->columnSpan(2)
                            ->columnStart(3)
                            ->prefix('₽'),
                    ])->columns(4)
                    ->columnStart(1)
                    ->columnSpanFull(),
//                TextInput::make('title')
//                    ->required(),
//                Select::make('subject_id')
//                    ->relationship('subject', 'subject_name')
////                    ->numeric()
//                    //Привет
//                    ->default(null),
//                Textarea::make('description')
//                    ->default(null)
//                    ->autosize()
//                    ->columnSpanFull(),
//                FileUpload::make('files_paths')
//                    ->disk('public')
//                    ->default(null)
//                    ->columnSpanFull(),
//                TextInput::make('price')
//                    ->required()
//                    ->numeric()
//                    ->default(0)
//                    ->prefix('₽'),
            ]);
    }
}
