<?php

namespace App\Filament\Student\Resources\Options;

use App\Filament\Student\Resources\Options\Pages\CreateOption;
use App\Filament\Student\Resources\Options\Pages\EditOption;
use App\Filament\Student\Resources\Options\Pages\ListOptions;
use App\Filament\Student\Resources\Options\Pages\ViewOption;
use App\Filament\Student\Resources\Options\Schemas\OptionForm;
use App\Filament\Student\Resources\Options\Schemas\OptionInfolist;

//use App\Filament\Resources\OptionContents\OptionContentResource;
use App\Filament\Student\Resources\Options\Tables\OptionsTable;
use App\Filament\Student\Resources\UserSolutions\UserSolutionResource;
use App\Models\Option;
use App\Models\OptionContent;
use App\Models\Task;
use App\Models\UserSolution;
use BackedEnum;
use Filament\Actions\Action;
use Filament\Infolists\Components\RepeatableEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Auth;

class OptionResource extends Resource
{
    protected static ?string $model = Option::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return OptionForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
//        return OptionInfolist::configure($schema);
        return $schema->schema([
            Section::make('Информация')->schema([
                TextEntry::make('source.source_name')
                    ->label('Источник Варианта')
                    ->badge()
            ])
                ->columnStart(1)
                ->columnSpan(1),
            Section::make('Задачи')->schema([
                RepeatableEntry::make('optioncontent')
                    ->label('Задачи')
                    ->schema([
                        TextEntry::make('row_number')
                            ->label(function ($record, $livewire) {
                                $all = $livewire->getRecord()->optioncontent;
                                return '№' . ($all->search($record) + 1) . ' #' . $record->task_id;
                            }),
                        Action::make('createSolution')
                            ->label('Решать')
                            ->icon('heroicon-o-pencil')
                            ->color('success')
                            ->action(function (OptionContent $record) {
                                $solution = UserSolution::query()
                                    ->where('user_id', Auth::id())
                                    ->where('task_id', $record->task_id)
                                    ->where('source_id',$record->option_id)
                                    ->first();

                                if ($solution == null) {
                                    $solution = UserSolution::create([
                                        'user_id' => Auth::id(),
                                        'task_id' => $record->task_id,
                                        'user_answer' => '',
                                        'state' => UserSolution::STATE_NEW,
                                        'source_id' => $record->option_id
                                    ]);
                                }
                                return redirect()->to(
                                    UserSolutionResource::getUrl('edit', ['record' => $solution])
                                );
                            }),

                    ])->columnSpanFull(),
                Action::make('sendoption')
                    ->label('Отправить на проверку')
                    ->color('danger')
                    ->requiresConfirmation()
//                    ->action(function (Option $record){
//                        dd($record->id);
//                        $solutions = UserSolution::query()
//                            ->where('user_id', Auth::id())
//                            ->where('source_id', $record->id)
//                            ->get();
//
//                        dd($solutions);
//                    })
            ])->columnStart(2)
                ->columnSpan(3)

        ])
            ->columns(4);
    }

    public static function table(Table $table): Table
    {
        return OptionsTable::configure($table);
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
            'index' => ListOptions::route('/'),
            'create' => CreateOption::route('/create'),
            'view' => ViewOption::route('/{record}'),
            'edit' => EditOption::route('/{record}/edit'),
        ];
    }
}
