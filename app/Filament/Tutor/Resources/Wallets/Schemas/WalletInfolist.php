<?php

namespace App\Filament\Tutor\Resources\Wallets\Schemas;

use App\Filament\Tutor\Resources\UserSolutions\UserSolutionResource;
use App\Filament\Tutor\Resources\WithdrawalFunds\Pages\CreateWithdrawalFunds;
use App\Models\UserSolution;
use App\Models\WithdrawalFunds;
use Filament\Actions\Action;
use Filament\Forms\Components\TextInput;
use Filament\Infolists\Components\RepeatableEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Support\Colors\Color;
use Filament\Support\Enums\TextSize;
use Filament\Support\Icons\Heroicon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\HtmlString;

class WalletInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Кошелёк')->schema([
                    TextEntry::make('user.name')
                        ->numeric()
                        ->label('Владелец кошелька')
                        ->size(TextSize::Large),
                    TextEntry::make('account')
                        ->numeric()
                        ->icon(Heroicon::OutlinedWallet)
                        ->label('Ваш баланс')
                        ->suffix('₽')
                        ->size(TextSize::Large),
//                    Action::make('MakeQuery')
//                        ->label('Запросить вывод средств')
//                        ->action(function ($record) {
//                            CreateWithdrawalFunds::make();
//                        })
                    Action::make('create')
                        ->label('Запросить вывод средств')
                        ->form([
                            TextInput::make('summary')
                                ->label('Сумма вывода')
                                ->numeric()
                                ->validationMessages([
                                    'max' => 'Сумма вывода не может превышать ваш баланс',
                                    'min' => 'Сумма вывода не может быть отрицательной',
                                    'numeric' => 'Пожалуйста, введите сумму для вывода.',
                                    'required' => 'Поле обязателено к заполнению.',
                                ])
                                ->rule(function ($record) {
                                    return 'max:' . $record->account;
                                }, 'Сумма вывода не может превышать ваш баланс')
                                ->rule('min:0', 'Сумма вывода не может быть отрицательной')
                                ->integer()
                                ->placeholder(fn($record) => 'Максимально доступная сумма для вывода: ' .
                                    $record->account)
                                ->required(),
                        ])
                        ->action(function (array $data, $record) {
                            //dd($data['summary']);
                            $data['user_id'] = Auth::id();
                            $data['wallet_id'] = $record->id;
//                            dd($data);
                            WithdrawalFunds::create($data);
                        })
                        ->modalHeading('Запрос на вывод средств')
                        ->modalSubmitActionLabel('Создать')
                        ->modalCancelActionLabel('Отмена')
                        ->modalWidth('lg')
                        ->requiresConfirmation()
                ])
                    ->columnSpan(1),
                Section::make('История операций')->schema([
                    RepeatableEntry::make('billing') // 'faqs' — это имя отношения
                    ->schema([
                        TextEntry::make('operation_type')
                            ->hiddenLabel()
                            ->formatStateUsing(function ($record) {
                                if ($record->operation_type == 'crediting') {
                                    return 'Зачисление средств';
                                } else {
                                    return 'Списание средств';
                                }
                            })
                            ->badge()
                            ->color(function ($record) {
                                if ($record->operation_type == 'crediting') {
                                    return Color::Green;
                                } else {
                                    return Color::Red;
                                }
                            }),
                        TextEntry::make('summary')
                            ->hiddenLabel()
                            ->badge()
                            ->prefix(fn($record) => $record->operation_type == 'crediting' ? '+' : '-')
                            ->suffix('₽')
                            ->color(function ($record) {
                                if ($record->operation_type == 'crediting') {
                                    return Color::Green;
                                } else {
                                    return Color::Red;
                                }
                            }),
                        TextEntry::make('solution_id')
                            ->formatStateUsing(function ($record) {
                                if ($record->operation_type == 'crediting') {
                                    return 'Проверка задачи';
                                } else {
                                    return 'Вывод';
                                }
                            })
                            ->url(function ($record) {
                                return UserSolutionResource::getUrl('view', ['record' => $record->solution_id]);
                            })
                            ->openUrlInNewTab()
                            ->hiddenLabel(),
                        TextEntry::make('created_at')
                            ->hiddenLabel()
                            ->dateTime('y-m-d h:m')
                            ->placeholder('-'),
                    ])
                        ->columns(4),
                ])->columnSpan(2)
            ])
            ->columns(3);
    }
}
