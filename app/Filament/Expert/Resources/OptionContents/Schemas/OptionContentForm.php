<?php

namespace App\Filament\Expert\Resources\OptionContents\Schemas;

use App\Models\Option;
use App\Models\Subject;
use App\Models\Task;
use Filament\Forms\Components\Select;
use Filament\Schemas\Schema;

class OptionContentForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('option_id')
                    ->relationship('option', 'id')
                    ->live()
                    ->afterStateUpdated(function ($set) {
                        $set('task_id', null); // Сбрасываем выбранный предмет
                    })
                    ->getOptionLabelFromRecordUsing(
                        function (Option $record) {
                            $option_subject = Option::query()
                                ->where('id', $record->id)
                                ->first()
                                ->subject_id;
                            $subject_name = Subject::query()
                                ->where('id', $option_subject)
                                ->first()
                                ->subject_name;
                            return 'ID-' . $record->id . ' Предмет-' . $subject_name;
                        }
                    )
                    ->default(request()->query('option_id'))
                    ->placeholder('Выберите id варианта'),
                Select::make('task_id')
                    ->relationship('task', 'id')
                    ->searchable()
                    ->options(function ($get) {
                        $option_id = $get('option_id');
                        if (!$option_id) {
                            return [];
                        }
                        $subject_id = Option::query()
                            ->where('id', $option_id)
                            ->first()
                            ->subject_id;
                        //dd(Task::query()->where('id_subject', $subject_id)->pluck('id'));
                        return Task::query()->where('id_subject', $subject_id)->pluck('id', 'id');
                    })
//                    ->getOptionLabelFromRecordUsing(
//                        function (Task $record) {
//                            $option_subject = Task::query()
//                                ->where('id', $record->id)
//                                ->first()
//                                ->id_subject;
//                            $subject_name = Subject::query()
//                                ->where('id', $option_subject)
//                                ->first()
//                                ->subject_name;
//                            return 'ID-' . $record->id . ' Предмет-' . $subject_name;
//                        }
//                    )
                    ->required()
                    ->placeholder('Выберите id задания')

            ]);
    }
}
