<?php

namespace App\Filament\Resources\Cources\Pages;

use App\Filament\Resources\Cources\CourceResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditCource extends EditRecord
{
    protected static string $resource = CourceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
