<?php
//
//namespace App\Filament\Resources\Events;
//
//use App\Filament\Resources\Events\Pages\CreateEvent;
//use App\Filament\Resources\Events\Pages\EditEvent;
//use App\Filament\Resources\Events\Pages\ListEvents;
//use App\Filament\Resources\Events\Pages\ViewEvent;
//use App\Filament\Resources\Events\Schemas\EventForm;
//use App\Filament\Resources\Events\Schemas\EventInfolist;
//use App\Filament\Resources\Events\Tables\EventsTable;
//use App\Models\Event;
//use BackedEnum;
//use Filament\Resources\Resource;
//use Filament\Schemas\Schema;
//use Filament\Support\Icons\Heroicon;
//use Filament\Tables\Table;
//
//class EventResource extends Resource
//{
//    protected static ?string $model = Event::class;
//
//    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;
//
//    public static function form(Schema $schema): Schema
//    {
//        return EventForm::configure($schema);
//    }
//
//    public static function infolist(Schema $schema): Schema
//    {
//        return EventInfolist::configure($schema);
//    }
//
//    public static function table(Table $table): Table
//    {
//        return EventsTable::configure($table);
//    }
//
//    public static function getRelations(): array
//    {
//        return [
//            //
//        ];
//    }
//
//    public static function getPages(): array
//    {
//        return [
//            'index' => ListEvents::route('/'),
//            'create' => CreateEvent::route('/create'),
//            'view' => ViewEvent::route('/{record}'),
//            'edit' => EditEvent::route('/{record}/edit'),
//        ];
//    }
//}


namespace App\Filament\Resources\Events;

use App\Filament\Resources\Events\Pages\CreateEvent;
use App\Filament\Resources\Events\Pages\EditEvent;
use App\Filament\Resources\Events\Pages\ListEvents;
use App\Filament\Widgets\Calendar;
use App\Models\Event;
use BackedEnum;
use Filament\Actions\DeleteAction;
use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\ColorColumn;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Guava\Calendar\Filament\Actions\EditAction;

class EventResource extends Resource
{
    protected static ?string $model = Event::class;
    protected static BackedEnum|null|string $navigationIcon = 'heroicon-o-calendar-days';
    protected static ?string $navigationLabel = 'События';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->schema([
                TextInput::make('title')
                    ->label('Название')
                    ->required()
                    ->maxLength(255),

                Textarea::make('description')
                    ->label('Описание')
                    ->columnSpanFull(),

                DateTimePicker::make('start')
                    ->label('Начало')
                    ->required()
                    ->native(false),

                DateTimePicker::make('end')
                    ->label('Конец')
                    ->required()
                    ->native(false)
                    ->after('start'),

                Toggle::make('all_day')
                    ->label('Весь день')
                    ->default(false),

                ColorPicker::make('color')
                    ->label('Цвет')
                    ->default('#3b82f6'),

                Hidden::make('user_id')
                    ->default(fn() => auth()->id()),
            ]);
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
            Calendar::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListEvents::route('/'),
            'create' => CreateEvent::route('/create'),
            'edit' => EditEvent::route('/{record}/edit'),
        ];
    }
}
