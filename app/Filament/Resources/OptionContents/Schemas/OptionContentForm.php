<?php

namespace App\Filament\Resources\OptionContents\Schemas;

use App\Models\Option;
use App\Models\Subject;
use App\Models\Task;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class OptionContentForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('option_id')
                    ->relationship('option', 'id')
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
                    ->placeholder('Выберите id варианта'),
                Select::make('task_id')
                    ->relationship('task', 'id')
                    ->getOptionLabelFromRecordUsing(
                        function (Task $record) {
                            $option_subject = Task::query()
                                ->where('id', $record->id)
                                ->first()
                                ->id_subject;
                            $subject_name = Subject::query()
                                ->where('id', $option_subject)
                                ->first()
                                ->subject_name;
                            return 'ID-' . $record->id . ' Предмет-' . $subject_name;
                        }
                    )
                    ->required()
                    ->placeholder('Выберите id задания')

            ]);
    }
}
