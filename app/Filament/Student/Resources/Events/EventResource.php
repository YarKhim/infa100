<?php

namespace App\Filament\Student\Resources\Events;

use App\Filament\Student\Resources\Events\Pages\CreateEvent;
use App\Filament\Student\Resources\Events\Pages\EditEvent;
use App\Filament\Student\Resources\Events\Pages\ListEvents;
use App\Filament\Student\Resources\Events\Pages\ViewEvent;
use App\Filament\Student\Widgets\CalendarS;
use App\Models\Event;
use BackedEnum;
use Filament\Actions\DeleteAction;
use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Infolists\Components\TextEntry;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\ColorColumn;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Guava\Calendar\Contracts\HasCalendar;
use Guava\Calendar\Filament\Actions\EditAction;

class EventResource extends Resource
{
    protected static ?string $model = Event::class;
    protected static BackedEnum|null|string $navigationIcon = 'heroicon-o-calendar-days';
    protected static ?string $navigationLabel = 'События';

//    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function infolist(Schema $schema): Schema
    {
        return $schema->components([
            TextEntry::make('title')
                ->badge()
                ->label('Название'),

            TextEntry::make('description')
                ->badge()
                ->label('Описание')
                ->columnSpan(1),

            DateTimePicker::make('start')
                ->label('Начало')
                ->columnSpan(1),

            DateTimePicker::make('end')
                ->label('Конец'),
        ])
            ->columns(2);
    }

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->schema([
                TextInput::make('title')
                    ->label('Название')
                    ->required()
                    ->maxLength(255),
                Select::make('subject_id')
                    ->label('Предмет')
                    ->placeholder('Выберите предмет')
                    ->relationship('subject', 'subject_name'),
                Textarea::make('description')
                    ->label('Описание')
                    ->columnSpanFull(),

                DateTimePicker::make('start')
                    ->label('Начало')
                    ->weekStartsOnMonday()
                    ->native(false)
                    ->seconds(false)
                    ->locale('ru')
                    ->minutesStep(10)
                    ->columnSpan(1)
                    ->required(),

                DateTimePicker::make('end')
                    ->label('Конец')
                    ->weekStartsOnMonday()
                    ->required()
                    ->seconds(false)
                    ->locale('ru')
                    ->native(false)
                    ->minutesStep(10)
                    ->columnSpan(1)
                    ->after('start'),

                Toggle::make('all_day')
                    ->label('Весь день')
                    ->default(false),

                ColorPicker::make('color')
                    ->label('Цвет')
                    ->default('#3b82f6'),

                Hidden::make('user_id')
                    ->default(fn() => auth()->id()),
            ])
            ->columns(2);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ColorColumn::make('color')
                    ->label('Цвет'),

                TextColumn::make('title')
                    ->label('Название')
                    ->searchable(),

                TextColumn::make('start')
                    ->label('Начало')
                    ->dateTime('d.m.Y H:i')
                    ->sortable(),

                TextColumn::make('end')
                    ->label('Конец')
                    ->dateTime('d.m.Y H:i')
                    ->sortable(),

                IconColumn::make('all_day')
                    ->label('Весь день')
                    ->boolean(),
            ])
            ->actions([
                EditAction::make(),
                DeleteAction::make(),
            ]);
    }

    public static function getWidgets(): array
    {
        return [
            //CalendarS::class,
        ];
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            //'index' => ListEvents::route('/'),
//            'create' => CreateEvent::route('/create'),
//            'view' => ViewEvent::route('/{record}'),
//            'edit' => EditEvent::route('/{record}/edit'),
        ];
    }
}
