<?php

namespace App\Filament\Tutor\Resources\Billings\Pages;

use App\Filament\Tutor\Resources\Billings\BillingResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewBilling extends ViewRecord
{
    protected static string $resource = BillingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
