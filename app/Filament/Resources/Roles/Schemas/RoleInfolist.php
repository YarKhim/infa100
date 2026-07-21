<?php

namespace App\Filament\Resources\Roles\Schemas;

use App\Filament\Resources\Roles\Widgets\Schedule;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;
use Filament\Widgets\Widget;

class RoleInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Schedule::make(),
                TextEntry::make('name'),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
