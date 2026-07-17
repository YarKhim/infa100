<?php

namespace App\Filament\Expert\Resources\Tasks\Schemas;

use App\Filament\Expert\Resources\RightSolutions\RightSolutionResource;
use App\Models\RightSolution;
use App\Models\Task;
use App\Models\UserSolution;
use Filament\Actions\Action;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Auth;

class TaskInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
//            ->components([
//                TextEntry::make('id_subject')
//                    ->numeric(),
//                TextEntry::make('id_task_source')
//                    ->numeric(),
//                TextEntry::make('task_type')
//                    ->badge(),
//                TextEntry::make('task_number_in_the_kim')
//                    ->numeric(),
//                TextEntry::make('answer'),
//                TextEntry::make('condition')
//                    ->columnSpanFull(),
//                TextEntry::make('difficulty_level')
//                    ->badge(),
//                TextEntry::make('created_at')
//                    ->dateTime()
//                    ->placeholder('-'),
//                TextEntry::make('updated_at')
//                    ->dateTime()
//                    ->placeholder('-'),
//                TextEntry::make('files_path')
//                    ->placeholder('-'),
////                CreateAction::make()
////                    ->model(RightSolution::class)
////                    ->successRedirectUrl(fn(RightSolution $record): string => route('right-solutions.edit', $record)
////                    )
////                    // ... или через ресурс
////                    ->successRedirectUrl(fn(RightSolution $record): string => RightSolutionResource::getUrl('edit', ['record' => $record])
////                    )
//                Action::make('test')
//                    ->action(function ($record) {
//                        //dd($record);
//                        $solution = RightSolution::create([
//                            'author_id' => Auth::id(),
//                            'task_id' => $record->id,
//                            'solution' => '',
//                            'files_path' => ''
//                        ]);
//                        $editUrl = RightSolutionResource::getUrl('edit', ['record' => $solution]);
//                        redirect()->to($editUrl);
//                    })
//                    ->button()
//                    ->label('Добавить решение к задаче')
////                    ->visible(function ($record) {
////                        return RightSolution::query()
////                                ->where('task_id', $record->id)
////                                ->get()
////                                ->count() == 0;
////
////                    })
//            ]);
            ->components([
                Section::make(fn($livewire) => '#' . $livewire->record->id)->schema([
                    Section::make('Сведения о задаче')->schema([
                        TextEntry::make('is_solved')
                            ->label(function (Task $record) {
                                return UserSolution::query()
                                    ->where('user_id', Auth::id())
                                    ->where('task_id', $record->id)
                                    ->where('source_id', null)
                                    ->count() ? 'Вы уже решали эту задачу ранее' : 'Задача ещё не решена вами';
                            }),
                        TextEntry::make('source.source_name')
                            ->label('Источник')
                            ->badge()
                            ->columnStart(1),
                        TextEntry::make('task_number_in_the_kim')
                            ->label('Номер задачи по КИМ')
                            ->badge()
                            ->columnStart(1),
                        TextEntry::make('difficulty_level')
                            ->label('Уровень сложности')
                            ->badge()
                            ->columnStart(1),
                        TextEntry::make('answer')
                            ->label('Ответ')
                            ->badge(),
                        Action::make('test')
                            ->action(function ($record) {
                                //dd($record);
                                $solution = RightSolution::create([
                                    'author_id' => Auth::id(),
                                    'task_id' => $record->id,
                                    'solution' => '',
                                    'files_path' => ''
                                ]);
                                $editUrl = RightSolutionResource::getUrl('edit', ['record' => $solution]);
                                redirect()->to($editUrl);
                            })
                            ->button()
                            ->label('Добавить решение к задаче')
//                    ->visible(function ($record) {
//                        return RightSolution::query()
//                                ->where('task_id', $record->id)
//                                ->get()
//                                ->count() == 0;
//
//                    })

                    ])->columns(1),
                    Section::make('Условие')->schema([
                        TextEntry::make('condition')
                            ->label(fn($livewire) => '№ ' . $livewire->record->task_number_in_the_kim)
                            ->columnStart(1)
                            ->markdown()

                    ])->columnSpan(3)
                ])->columns(4),


            ])->columns(1);
    }
}
