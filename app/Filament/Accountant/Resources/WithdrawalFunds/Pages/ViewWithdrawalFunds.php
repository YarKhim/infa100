<?php

namespace App\Filament\Accountant\Resources\WithdrawalFunds\Pages;

use App\Filament\Accountant\Resources\WithdrawalFunds\WithdrawalFundsResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewWithdrawalFunds extends ViewRecord
{
    protected static string $resource = WithdrawalFundsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
