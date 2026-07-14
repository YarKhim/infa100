<?php

namespace App\Filament\Resources\SubjectPointsTransfers;

use App\Filament\Resources\SubjectPointsTransfers\Pages\CreateSubjectPointsTransfer;
use App\Filament\Resources\SubjectPointsTransfers\Pages\EditSubjectPointsTransfer;
use App\Filament\Resources\SubjectPointsTransfers\Pages\ListSubjectPointsTransfers;
use App\Filament\Resources\SubjectPointsTransfers\Pages\ViewSubjectPointsTransfer;
use App\Filament\Resources\SubjectPointsTransfers\Schemas\SubjectPointsTransferForm;
use App\Filament\Resources\SubjectPointsTransfers\Schemas\SubjectPointsTransferInfolist;
use App\Filament\Resources\SubjectPointsTransfers\Tables\SubjectPointsTransfersTable;
use App\Models\SubjectPointsTransfer;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class SubjectPointsTransferResource extends Resource
{
    protected static ?string $model = SubjectPointsTransfer::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return SubjectPointsTransferForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return SubjectPointsTransferInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return SubjectPointsTransfersTable::configure($table);
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
            'index' => ListSubjectPointsTransfers::route('/'),
            'create' => CreateSubjectPointsTransfer::route('/create'),
            'view' => ViewSubjectPointsTransfer::route('/{record}'),
            'edit' => EditSubjectPointsTransfer::route('/{record}/edit'),
        ];
    }
}
