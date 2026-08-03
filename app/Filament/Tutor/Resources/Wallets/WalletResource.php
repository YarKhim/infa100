<?php

namespace App\Filament\Tutor\Resources\Wallets;

use App\Filament\Tutor\Resources\Wallets\Pages\CreateWallet;
use App\Filament\Tutor\Resources\Wallets\Pages\EditWallet;
use App\Filament\Tutor\Resources\Wallets\Pages\ListWallets;
use App\Filament\Tutor\Resources\Wallets\Pages\UserWallet;
use App\Filament\Tutor\Resources\Wallets\Pages\ViewWallet;
use App\Filament\Tutor\Resources\Wallets\Schemas\WalletForm;
use App\Filament\Tutor\Resources\Wallets\Schemas\WalletInfolist;
use App\Filament\Tutor\Resources\Wallets\Tables\WalletsTable;
use App\Models\Wallet;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class WalletResource extends Resource
{
    protected static ?string $model = Wallet::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return WalletForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return WalletInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return WalletsTable::configure($table);
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
            'index' => UserWallet::route('/'),
            'create' => CreateWallet::route('/create'),
            'view' => ViewWallet::route('/{record}'),
            'edit' => EditWallet::route('/{record}/edit'),
        ];
    }

//    public static function getNavigationUrl(): string
//    {
//        // Если пользователь залогинен, направляем на его кошелек
//        if (auth()->check() && auth()->user()->wallet) {
//            return static::getUrl('view', ['record' => auth()->user()->wallet->id]);
//        }
//        return parent::getNavigationUrl();
//    }
}
