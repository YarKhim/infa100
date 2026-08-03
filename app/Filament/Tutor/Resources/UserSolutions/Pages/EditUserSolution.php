<?php

namespace App\Filament\Tutor\Resources\UserSolutions\Pages;

use App\Filament\Tutor\Resources\UserSolutions\UserSolutionResource;
use App\Models\Billing;
use App\Models\UserSolution;
use App\Models\Wallet;
use Carbon\Carbon;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Facades\Auth;

class EditUserSolution extends EditRecord
{
    protected static string $resource = UserSolutionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            //DeleteAction::make(),
        ];
    }

    protected function afterSave(): void
    {
        $task_id = $this->getRecord()->task_id;
        $solution_source = $this->getRecord()->source_id;
        $solution = UserSolution::query()
            ->where('task_id', $task_id)
            ->where('user_id', Auth::id())
            ->where('source_id', $solution_source)
            ->first();
        $solution->tutor_id = Auth::id();
        $solution->is_checked = $this->getRecord()->is_checked;
        $solution->is_need_check = !$this->getRecord()->is_checked;
        if ($solution->is_checked) {
            $PRICE = 5;
            $solution->check_end = Carbon::now();
            $solution->state = UserSolution::STATE_SOLUTION_CHECKED;
            $wallet = Wallet::query()->where('user_id', Auth::id())->first();
            if (!isset($wallet)) {
                $wallet = new Wallet([
                    'user_id' => Auth::id(),
                    'account' => 0
                ]);
            }
            $billing = Billing::make([
                'tutor_id' => Auth::id(),
                'operation_type' => 'crediting',
                'solution_id' => $solution->id,
                'summary' => $PRICE
            ]);
            $billing->save();
            $wallet->account += $billing->summary;
            $wallet->save();
        } else {
            $solution->state = UserSolution::STATE_SOLUTION_ON_CHECKING;
        }
        $solution->save();

    }
}
