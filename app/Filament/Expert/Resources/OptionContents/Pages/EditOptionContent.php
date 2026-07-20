<?php

namespace App\Filament\Expert\Resources\OptionContents\Pages;

use App\Filament\Expert\Resources\OptionContents\OptionContentResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditOptionContent extends EditRecord
{
    protected static string $resource = OptionContentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
