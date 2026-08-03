<?php

namespace App\Filament\Tutor\Resources\Billings;

use App\Filament\Tutor\Resources\Billings\Pages\CreateBilling;
use App\Filament\Tutor\Resources\Billings\Pages\EditBilling;
use App\Filament\Tutor\Resources\Billings\Pages\ListBillings;
use App\Filament\Tutor\Resources\Billings\Pages\ViewBilling;
use App\Filament\Tutor\Resources\Billings\Schemas\BillingForm;
use App\Filament\Tutor\Resources\Billings\Schemas\BillingInfolist;
use App\Filament\Tutor\Resources\Billings\Tables\BillingsTable;
use App\Models\Billing;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class BillingResource extends Resource
{
    protected static ?string $model = Billing::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return BillingForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return BillingInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return BillingsTable::configure($table);
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
            'index' => ListBillings::route('/'),
            'create' => CreateBilling::route('/create'),
            'view' => ViewBilling::route('/{record}'),
            'edit' => EditBilling::route('/{record}/edit'),
        ];
    }
}
