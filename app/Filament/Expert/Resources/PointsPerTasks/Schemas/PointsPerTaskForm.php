<?php

namespace App\Filament\Expert\Resources\PointsPerTasks\Schemas;

use App\Models\SubjectKimNumber;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class PointsPerTaskForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('subject_id')
                    ->relationship('subject', 'subject_name')
                    ->label('Предмет')
                    ->default(3)
                    ->live()
                    ->afterStateUpdated(function ($set) {
                        $set('task_number_in_the_kim', null); // Сбрасываем выбранный предмет
                    })
                    ->required(),
                Select::make('task_number')
                    ->required()
                    ->label('Номер задачи по КИМу')
                    ->options(function ($get) {
                        $subject_id = $get('subject_id');
                        if (!$subject_id) {
                            return [];
                        }
                        return SubjectKimNumber::where('subject_id', $subject_id)->pluck('number_in_kim', 'number_in_kim');
                    }),
                TextInput::make('max_points')
                    ->required()
                    ->default(1)
                    ->numeric(),
            ]);
    }
}
