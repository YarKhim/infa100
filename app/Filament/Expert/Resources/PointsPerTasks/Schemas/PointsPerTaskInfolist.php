<?php

namespace App\Filament\Expert\Resources\PointsPerTasks\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class PointsPerTaskInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('subject_id')
                    ->numeric(),
                TextEntry::make('task_number')
                    ->numeric(),
                TextEntry::make('max_points')
                    ->numeric(),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
