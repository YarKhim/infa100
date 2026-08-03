<?php

namespace App\Filament\Tutor\Resources\WithdrawalFunds;

use App\Filament\Tutor\Resources\WithdrawalFunds\Pages\CreateWithdrawalFunds;
use App\Filament\Tutor\Resources\WithdrawalFunds\Pages\EditWithdrawalFunds;
use App\Filament\Tutor\Resources\WithdrawalFunds\Pages\ListWithdrawalFunds;
use App\Filament\Tutor\Resources\WithdrawalFunds\Pages\ViewWithdrawalFunds;
use App\Filament\Tutor\Resources\WithdrawalFunds\Schemas\WithdrawalFundsForm;
use App\Filament\Tutor\Resources\WithdrawalFunds\Schemas\WithdrawalFundsInfolist;
use App\Filament\Tutor\Resources\WithdrawalFunds\Tables\WithdrawalFundsTable;
use App\Models\WithdrawalFunds;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class WithdrawalFundsResource extends Resource
{
    protected static ?string $model = WithdrawalFunds::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return WithdrawalFundsForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return WithdrawalFundsInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return WithdrawalFundsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListWithdrawalFunds::route('/'),
            'create' => CreateWithdrawalFunds::route('/create'),
            'view' => ViewWithdrawalFunds::route('/{record}'),
            'edit' => EditWithdrawalFunds::route('/{record}/edit'),
        ];
    }
}
