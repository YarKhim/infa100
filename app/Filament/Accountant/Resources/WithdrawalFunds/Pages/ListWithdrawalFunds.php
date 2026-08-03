<?php

namespace App\Filament\Accountant\Resources\WithdrawalFunds\Pages;

use App\Filament\Accountant\Resources\WithdrawalFunds\WithdrawalFundsResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListWithdrawalFunds extends ListRecords
{
    protected static string $resource = WithdrawalFundsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
