<?php

namespace App\Filament\Student\Resources\Options;

use App\Filament\Student\Resources\Options\Pages\CreateOption;
use App\Filament\Student\Resources\Options\Pages\EditOption;
use App\Filament\Student\Resources\Options\Pages\ListOptions;
use App\Filament\Student\Resources\Options\Pages\ViewOption;
use App\Filament\Student\Resources\Options\Schemas\OptionForm;
use App\Filament\Student\Resources\Options\Schemas\OptionInfolist;

//use App\Filament\Resources\OptionContents\OptionContentResource;
use App\Filament\Student\Resources\Options\Tables\OptionsTable;
use App\Filament\Student\Resources\UserSolutions\UserSolutionResource;
use App\Models\Option;
use App\Models\OptionContent;
use App\Models\OptionSolution;
use App\Models\Task;
use App\Models\UserSolution;
use BackedEnum;
use Filament\Actions\Action;
use Filament\Infolists\Components\RepeatableEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Auth;

class OptionResource extends Resource
{
    protected static ?string $model = Option::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;
    public static array $points_per_task = [
        1 => [
            1 => 1,
            2 => 1,
            3 => 1,
            4 => 1,
            5 => 1,
            6 => 1,
            7 => 1,
            8 => 1,
            9 => 1,
            10 => 1,
            11 => 1,
            12 => 1,
            13 => 1,
            14 => 1,
            15 => 1,
            16 => 1,
            17 => 1,
            18 => 1,
            19 => 1,
            20 => 1,
            21 => 1,
            22 => 1,
            23 => 1,
            24 => 1,
            25 => 1,
            26 => 2,
            27 => 2,
        ],
    ];

    public static function form(Schema $schema): Schema
    {
        return OptionForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return $schema->schema([
            Section::make('Информация')->schema([
                TextEntry::make('source.source_name')
                    ->label('Источник Варианта')
                    ->badge(),
                TextEntry::make('info')
                    ->label('Вы уже решали данный вариат')
                    ->badge()
                    ->visible(function ($record) {
                        $option_solution = OptionSolution::query()
                            ->where('option_id', $record->id)
                            ->first();
                        return isset($option_solution) && $option_solution->is_solved;
                    })
            ])
                ->columnStart(1)
                ->columnSpan(1),
            Section::make('Задачи бебе')->schema([
                RepeatableEntry::make('optioncontent')
                    ->label('Задачи')
                    ->schema([
                        TextEntry::make('row_number')
                            ->label(function ($record, $livewire) {
                                $all = $livewire->getRecord()->optioncontent;
                                return '№' . ($all->search($record) + 1) . ' #' . $record->task_id;
                            }),
//                        TextEntry::make('task_state')
//                            ->label('Ответ сохранён')
//                            ->badge()
//                            ->color('info'),
//                            ->visible(function (OptionContent $record) {
//                                return OptionSolution::query()
//                                    ->where('option_id', $record->option_id)
//                                    ->where('user_id', Auth::id())
//                                    ->first()
//                                    ->is_solved;
//                            }),
                        Action::make('createSolution')
                            ->label('Решать')
                            ->icon('heroicon-o-pencil')
                            ->color('success')
//                            ->visible(function (OptionContent $record) {
//                                return !OptionSolution::query()
//                                    ->where('option_id', $record->option_id)
//                                    ->where('user_id', Auth::id())
//                                    ->first()
//                                    ->is_solved;
//                            })
                            ->action(function (OptionContent $record) {
                                $solution = UserSolution::query()
                                    ->where('user_id', Auth::id())
                                    ->where('task_id', $record->task_id)
                                    ->where('source_id', $record->option_id)
                                    ->first();
                                if ($solution == null) {
                                    $solution = UserSolution::create([
                                        'user_id' => Auth::id(),
                                        'task_id' => $record->task_id,
                                        'user_answer' => '',
                                        'state' => UserSolution::STATE_NEW,
                                        'source_id' => $record->option_id
                                    ]);
                                }
                                return redirect()->to(
                                    UserSolutionResource::getUrl('edit', ['record' => $solution])
                                );
                            }),

                    ])->columnSpanFull(),
                Action::make('sendoption')
                    ->label('Отправить на проверку')
                    ->color('danger')
                    ->requiresConfirmation()
                    ->action(function (Option $record) {
                        $points_per_task = [
                            1 => [
                                1 => 1,
                                2 => 1,
                                3 => 1,
                                4 => 1,
                                5 => 1,
                                6 => 1,
                                7 => 1,
                                8 => 1,
                                9 => 1,
                                10 => 1,
                                11 => 1,
                                12 => 1,
                                13 => 1,
                                14 => 1,
                                15 => 1,
                                16 => 1,
                                17 => 1,
                                18 => 1,
                                19 => 1,
                                20 => 1,
                                21 => 1,
                                22 => 1,
                                23 => 1,
                                24 => 1,
                                25 => 1,
                                26 => 2,
                                27 => 2,
                            ],
                        ];
                        $sum_points = 0;
                        $solutions = UserSolution::query()
                            ->where('user_id', Auth::id())
                            ->where('source_id', $record->id)
                            ->get();
                        $subject_id = $record->subject_id;
                        foreach ($solutions as $solution) {
                            $task = Task::query()
                                ->where('id', $solution->task_id)
                                ->first();
                            if ($task->answer == $solution->user_answer) {
                                $solution->state = UserSolution::STATE_CORRECT_ANSWER_HAS_BEEN_GIVEN;
                                $sum_points += $points_per_task[$subject_id][$task->task_number_in_the_kim];
                            } else {
                                $solution->state = UserSolution::STATE_INCORRECT_ANSWER_GIVEN;
                            }
                            $solution->save();
                        }
                        //dd($sum_points);
                        OptionSolution::create([
                            'user_id' => Auth::id(),
                            'option_id' => $record->id,
                            'primary_score' => $sum_points,
                            'is_solved' => true
                        ]);

                    })
//                    ->visible(function (Option $record) {
//                        return !OptionSolution::query()
//                            ->where('option_id', $record->id)
//                            ->where('user_id', Auth::id())
//                            ->first()
//                            ->is_solved;
//                    })
            ])->columnStart(2)
                ->columnSpan(3)
                ->visible(function ($record) {
                    $option_solution = OptionSolution::query()
                        ->where('option_id', $record->id)
                        ->first();
                    //dd($option_solution->is_solved);
                    return !isset($option_solution) || !$option_solution->is_solved;
                })
        ])
            ->columns(4);
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
