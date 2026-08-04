<?php

namespace App\Filament\Accountant\Resources\WithdrawalFunds\Schemas;

use App\Models\Wallet;
use App\Models\WithdrawalFunds;
use Filament\Actions\Action;
use Filament\Forms\Components\TextInput;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Support\Colors\Color;
use Filament\Support\Enums\TextSize;
use Filament\Support\Icons\Heroicon;
use Illuminate\Support\Facades\Auth;

class WithdrawalFundsInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Кошелёк')->schema([
                    TextEntry::make('wallet.user.name')
                        ->numeric()
                        ->label('Владелец кошелька')
                        ->size(TextSize::Large),
                    TextEntry::make('wallet.account')
                        ->numeric()
                        ->icon(Heroicon::OutlinedWallet)
                        ->label('Баланс пользователя')
                        ->suffix('₽')
                        ->size(TextSize::Large),
                ])->columnSpan(1),
                Section::make('Запрос на вывод')->schema([
                    TextEntry::make('wallet.user.name')
                        ->numeric()
                        //->columnStart(1)
                        ->label('Автор запроса на вывод денег')
                        ->size(TextSize::Large),
                    TextEntry::make('summary')
                        //->columnStart(1)
                        ->numeric()
                        ->label('Сумма вывода')
                        ->suffix('₽')
                        ->color(function ($record) {
                            $wallet = Wallet::query()
                                ->where('id', $record->wallet_id)
                                ->first();
                            if ($wallet->account >= $record->summary) return Color::Green;
                            else return Color::Red;
                        })
                        ->size(TextSize::Large),
                    Action::make('accept')
                        ->label('Подтвердить вывод средств')
                        ->requiresConfirmation()
                        ->action(function ($record) {
                            $record->state = 'accepted';
                            $wallet = Wallet::query()
                                ->where('id', $record->wallet_id)
                                ->first();
                            $wallet->account -= $record->summary;
                            $wallet->save();
                            $record->save();
                        })
                        ->visible(fn($record) => $record->state == 'sent')
                        ->color('success'),
                    //->columnStart(1),
                    Action::make('decline')
                        ->label('Отклонить вывод средств')
                        ->requiresConfirmation()
                        ->action(function ($record) {
                            $record->state = 'declined';
                            $record->save();
                        })
                        ->visible(fn($record) => $record->state == 'sent')
                        ->color('danger'),
                    TextEntry::make('state')
                        ->badge()
                        ->color(function ($record) {
                            if ($record->state == 'accepted') return Color::Green;
                            else return Color::Red;
                        })
                        ->visible(fn($record) => $record->state != 'sent')
                        ->label('Состояние')
                        ->formatStateUsing(function ($record){
                            if ($record->state == 'accepted') return 'Подтверждён';
                            else return 'Отклонён';
                        })
                        ->size(TextSize::Large),
                    // ->columnStart(2),
                ])->columns(2)
                    ->columnSpan(1),
            ]);
    }
}
