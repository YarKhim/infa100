<?php

namespace App\Filament\Tutor\Resources\Wallets\Schemas;

use App\Filament\Tutor\Resources\UserSolutions\UserSolutionResource;
use App\Models\UserSolution;
use Filament\Actions\Action;
use Filament\Infolists\Components\RepeatableEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Support\Colors\Color;
use Filament\Support\Enums\TextSize;
use Filament\Support\Icons\Heroicon;
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
                        ->columns(4), // Разместить вопросы и ответы в две колонки
                ])->columnSpan(2)
//                TextEntry::make('user_id')
//                    ->numeric(),
//                TextEntry::make('account')
//                    ->numeric(),
//                TextEntry::make('created_at')
//                    ->dateTime()
//                    ->placeholder('-'),
//                TextEntry::make('updated_at')
//                    ->dateTime()
//                    ->placeholder('-'),
            ])
            ->columns(3);
    }
}
