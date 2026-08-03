<?php

namespace App\Filament\Tutor\Resources\Wallets\Pages;

use App\Filament\Tutor\Resources\Wallets\WalletResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;
use Illuminate\Support\Facades\Auth;
use App\Models\Wallet;

class UserWallet extends ViewRecord
{
    protected static string $resource = WalletResource::class;


    // Перенаправляем на страницу текущего пользователя
    public function mount($record = null): void
    {
        // Находим кошелек текущего пользователя
        $wallet = \App\Models\Wallet::query()->where('user_id', Auth::id())->first();

        if (!$wallet) {
            // Если кошелька нет - создаем или показываем ошибку
            $wallet = new Wallet([
                'account' => 0,
                'user_id' => Auth::id(),
            ]);
            $wallet->save();
        }

        parent::mount($wallet->id);
    }

    protected function getHeaderActions(): array
    {
        return [

        ];
    }


}
