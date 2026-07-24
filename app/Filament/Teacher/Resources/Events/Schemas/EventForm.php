<?php

namespace App\Filament\Teacher\Resources\Events\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class EventForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
//                TextInput::make('title')
//                    ->required(),
//                Textarea::make('description')
//                    ->default(null)
//                    ->columnSpanFull(),
//                DateTimePicker::make('start')
//                    ->required(),
//                DateTimePicker::make('end')
//                    ->required(),
//                TextInput::make('color')
//                    ->required()
//                    ->default('#3788d8'),
//                Toggle::make('all_day')
//                    ->required(),
//                TextInput::make('location')
//                    ->default(null),
//                Select::make('user_id')
//                    ->relationship('user', 'name')
//                    ->required(),
//                Select::make('subject_id')
//                    ->relationship('subject', 'id')
//                    ->default(null),
//                TextInput::make('teacher_id')
//                    ->numeric()
//                    ->default(null),
            ]);
    }
}
