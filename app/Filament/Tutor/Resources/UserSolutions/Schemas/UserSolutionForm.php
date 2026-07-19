<?php

namespace App\Filament\Tutor\Resources\UserSolutions\Schemas;

use App\Models\Task;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Infolists\Components\CodeEntry;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Auth;
use Phiki\Grammar\Grammar;
use Phiki\Theme\Theme;
use Pjedesigns\FilamentImageEditor\Forms\Components\ImageEditor;

class UserSolutionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
//                Select::make('task_id')
//                    ->relationship('task', 'id')
//                    ->required(),
                TextEntry::make('user.name')
                    ->numeric(),
                TextEntry::make('user_answer')
                    ->numeric(),
                TextInput::make('points_after_check')
                    ->required()
                    ->numeric()
                    ->default(0),
                ImageEntry::make('solution_files_path')
                    ->label('Вложения')
                    ->placeholder('Нет прикреплённых файлов')
                    ->columnStart(1)
                    ->columns(1)
                    ->simpleLightbox(),

//                Repeater::make('paths_checked_files')
//                    ->schema([
//                        ImageEditor::make('path')
//                            //->disk('public')
//                            ->disk('public')
//                            ->tools(['crop', 'draw'])
//                        //->directory('photos'),
//                    ])
//                    ->columns(1)
//                    ->defaultItems(1) // или без
//                [{"path":"images\/01KXXD6C056YFYH27FXA7NWFTF.jpg"},{"path":"images\/01KXXD6C06Z8YBWXHKAFGAFQPP.png"}]
//                  ["01KXXD6C056YFYH27FXA7NWFTF.jpg","01KXXD6C06Z8YBWXHKAFGAFQPP.png"]
                Repeater::make('paths_checked_files')
                    ->label('Фотографии')
                    ->schema([
                        ImageEditor::make('path')
                            ->label('Фото')
                            ->tools(['draw'])
                            ->disk('public')
                            ->tools([])
                    ])
//                    ->columnSpanFull(),


//                TextInput::make('solution_files_path')
//                    ->default(null),
//                Select::make('source_id')
//                    ->relationship('source', 'id')
//                    ->default(null),

//                CodeEntry::make('user_code')
//                    ->label('Код к задаче')
//                    ->placeholder('Нет прикреплённого кода')
//                    ->grammar(Grammar::Python)
//                    ->lightTheme(Theme::EverforestLight)
//                    ->darkTheme(Theme::GruvboxDarkHard)
//                    ->copyable()
//                    ->copyMessage('Скопировано!')
//                    ->copyMessageDuration(2000)
//                    ->columnStart(2)
//                    ->columnSpanFull()
//                    ->visible(function ($record) {
//                        return Task::query()
//                                ->where('id', $record->task_id)
//                                ->first()
//                                ->id_subject == 1;
//                    }),
//                ImageEntry::make('solution_files_path')
//                    ->label('Вложения')
//                    ->placeholder('Нет прикреплённых файлов')
//                    ->columnStart(1)
//                    ->columns(1)
//                    ->simpleLightbox(),
//                Toggle::make('is_checked')
//                    ->required(),
//                TextInput::make('points_after_check')
//                    ->required()
//                    ->numeric()
//                    ->default(0),
//                Toggle::make('is_need_check')
//                    ->required(),
//                TextInput::make('tutor_id')
//                    ->default(Auth::id())
//                    ->disabled()
//                    ->numeric()

//                TextInput::make('paths_checked_files')
//                    ->default(null),
            ]);
    }
}
