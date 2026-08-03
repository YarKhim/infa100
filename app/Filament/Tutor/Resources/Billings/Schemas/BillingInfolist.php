<?php

namespace App\Filament\Tutor\Resources\Billings\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class BillingInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('operation_type'),
                TextEntry::make('tutor_id')
                    ->numeric(),
                TextEntry::make('summary')
                    ->numeric(),
                TextEntry::make('solution_id')
                    ->numeric()
                    ->placeholder('-'),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
