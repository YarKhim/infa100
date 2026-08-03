<?php

namespace App\Filament\Accountant\Resources\WithdrawalFunds\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class WithdrawalFundsForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('wallet_id')
                    ->required()
                    ->numeric(),
                TextInput::make('user_id')
                    ->required()
                    ->numeric(),
                TextInput::make('summary')
                    ->required()
                    ->numeric(),
            ]);
    }
}
