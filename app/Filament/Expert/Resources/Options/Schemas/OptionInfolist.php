<?php

namespace App\Filament\Expert\Resources\Options\Schemas;

use App\Models\Option;
use Filament\Actions\Action;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Infolists\Components\RepeatableEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class OptionInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make(function (Option $option) {
                    return 'Вариант #' . $option->id;
                })->schema([
                    Section::make('Информация')->schema([
                        TextEntry::make('source.source_name')
                            ->label('Источник Варианта')
                            ->badge(),
                        Action::make('addTask')->action(
                            function ($record) {
                                redirect()->to('/expert/option-contents/create?option_id='.$record->id);
                            }
                        )
                            ->label('Добавить задачу'),
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
                            Section::make()->schema([
                                TextEntry::make('task.id')
                                    ->label('ID задачи')
                                    //->badge()
                                    //->color('info')
                                    ->columnStart(1),
                                TextEntry::make('task.answer')
                                    ->label('Ответ')
                                    ->badge()
                                    ->color('info')
                                    ->columnStart(2),
                                TextEntry::make('task.source.source_name')
                                    ->label('Источник задачи')
                                    ->badge()
                                    ->color('info')
                                    ->columnStart(3),
                                DeleteAction::make()
                                    ->action(function ($record) {
                                        if ($record) {
                                            $record->delete();
                                        }
                                    })
                                    ->label('Удалить из варианта')
                            ])
                                ->columns(3)
                                ->columnSpanFull(),


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
//                TextEntry::make('subject.id')
//                    ->label('Subject'),
//                TextEntry::make('source.id')
//                    ->label('Source'),
//                TextEntry::make('created_at')
//                    ->dateTime()
//                    ->placeholder('-'),
//                TextEntry::make('updated_at')
//                    ->dateTime()
//                    ->placeholder('-'),
            ]);
    }
}
