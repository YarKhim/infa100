<?php

namespace App\Filament\Tutor\Resources\Billings\Pages;

use App\Filament\Tutor\Resources\Billings\BillingResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListBillings extends ListRecords
{
    protected static string $resource = BillingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
