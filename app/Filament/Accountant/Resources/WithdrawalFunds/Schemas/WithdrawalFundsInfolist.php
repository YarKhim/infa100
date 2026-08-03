<?php

namespace App\Filament\Accountant\Resources\WithdrawalFunds\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class WithdrawalFundsInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('wallet_id')
                    ->numeric(),
                TextEntry::make('user_id')
                    ->numeric(),
                TextEntry::make('summary')
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
