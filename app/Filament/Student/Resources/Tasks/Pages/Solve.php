<?php

namespace App\Filament\Student\Resources\Tasks\Pages;

use App\Filament\Student\Resources\Tasks\TaskResource;
use App\Models\Task;
use Filament\Actions\Action;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Infolists\Components\TextEntry;
use Filament\Resources\Pages\Page;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Schemas\Components\Form;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Support\View\Components\ButtonComponent;
use Filament\Tables\Columns\Concerns\HasRecord;
class Solve extends Page
{
    use HasRecord;
    use InteractsWithForms;
    protected static string $resource = TaskResource::class;
    protected string $view = 'filament.student.resources.tasks.pages.solve';
}
