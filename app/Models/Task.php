<?php

namespace App\Models;

use App\Filament\Student\Resources\UserSolutions\UserSolutionResource;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Task extends Model
{
    protected $fillable = [
        'id_subject',
        'id_task_source',
        'task_type',
        'task_number_in_the_kim',
        'difficulty_level',
        'answer',
        'condition',
        'files_path',

    ];
    //Получаем предмет по его id
    public function subject(): BelongsTo
    {
        return $this->belongsTo(Subject::class, 'id_subject');
    }

    //Получаем источник задачи по его id
    public function source():BelongsTo
    {
        return $this->belongsTo(TaskSource::class, 'id_task_source');
    }
//    public function usersolution():BelongsTo
//    {
//        return $this->;
//    }
    /*public function condition():BelongsTo
    {
        return $this->belongsTo(TaskCondition::class, 'task');
    }*/
}
