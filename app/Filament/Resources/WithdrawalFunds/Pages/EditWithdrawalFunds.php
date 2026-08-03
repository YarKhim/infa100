<?php

namespace App\Filament\Resources\WithdrawalFunds\Pages;

use App\Filament\Resources\WithdrawalFunds\WithdrawalFundsResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditWithdrawalFunds extends EditRecord
{
    protected static string $resource = WithdrawalFundsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
