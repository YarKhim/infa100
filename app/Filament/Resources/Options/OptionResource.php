<?php

namespace App\Filament\Resources\Options;

use App\Filament\Resources\Options\Pages\CreateOption;
use App\Filament\Resources\Options\Pages\EditOption;
use App\Filament\Resources\Options\Pages\ListOptions;
use App\Filament\Resources\Options\Pages\ViewOption;
use App\Filament\Resources\Options\Schemas\OptionForm;
use App\Filament\Resources\Options\Schemas\OptionInfolist;
use App\Filament\Resources\Options\Tables\OptionsTable;
use App\Models\Option;
use App\Models\Task;
use BackedEnum;
use Filament\Actions\Action;
use Filament\Facades\Filament;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Infolists\Components\RepeatableEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Actions;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Support\View\Components\ButtonComponent;
use Filament\Tables\Table;

class OptionResource extends Resource
{
    protected static ?string $model = Option::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;
    protected static ?string $navigationLabel = 'Варианты';

    public static function form(Schema $schema): Schema
    {
        return OptionForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return $schema->schema([
            Section::make(function (Option $option) {
                return 'Вариант #' . $option->id;
            })->schema([
                Section::make('Информация')->schema([
                    TextEntry::make('source.source_name')
                        ->label('Источник Варианта')
                        ->badge()
                ])
                    ->columnStart(1)
                    ->columnSpan(1),


                RepeatableEntry::make('optioncontent')
                    ->label('Задачи')
                    ->schema([
                        TextEntry::make('task.condition')
                            ->label('Условие')
                            ->markdown()
                            ->columnSpan(3),
                        TextEntry::make('task.answer')
                            ->label('Ответ')
                            ->badge()
                            ->color('info')
                            ->columnStart(1),
                        TextEntry::make('task.source.source_name')
                            ->label('Источник задачи')
                            ->badge()
                            ->color('info')
                            ->columnStart(2)
//                        Section::make('')->schema([
//                            TextInput::make('user_answer')
//                                ->placeholder('Введите ответ')
//                                ->label('Ответ')
//                                ->columnStart(1)
//                                ->columnSpan(4),
////                            FileUpload::make('solution_files_path')
////                                ->label('Файлы вашего решения (по необходимости)')
////                                ->columnStart(1)
////                                ->columnSpan(4),
//                            Actions::make([
//                                Action::make('process')
//                                    ->label('Обработать')
//                                    ->action(function (Get $get) {
//                                        $value = $get('user_answer');
//                                        dd($value);
//                                        // делаем что-то с $value
//                                    })
//                            ])
//                        ])
//                            ->columns(5)
                    ])
                    ->columns(3)
                    ->columnStart(2)
                    ->columnSpan(3),
//                Action::make('Send')
//                    ->label('Отправить на проверку')
//                    ->icon('heroicon-o-pencil')
//                    ->color('success')
//                    ->requiresConfirmation()
            ])
                ->columns(4)
                ->columnSpan(2)
        ]);

    }

    public static function table(Table $table): Table
    {
        return OptionsTable::configure($table);
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
            'index' => ListOptions::route('/'),
            'create' => CreateOption::route('/create'),
            'view' => ViewOption::route('/{record}'),
            'edit' => EditOption::route('/{record}/edit'),
        ];
    }
}
