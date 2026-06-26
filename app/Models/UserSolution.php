<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserSolution extends Model
{
    //
    protected $fillable = [
        'user_answer',
        'task_id',
        'user_id',
        'state',
        'source_id'
    ];

    public const STATE_NEW = 'new' ;
    public const STATE_CORRECT_ANSWER_HAS_BEEN_GIVEN = 'correct_answer_has_been_given';
    public const STATE_ANSWER_ISNT_GIVEN = 'answer_isnt_given';
    public const STATE_INCORRECT_ANSWER_GIVEN = 'incorrect_answer_given';
    public const STATE_ANSWER_GIVEN_AND_SAVED = 'answer_isnt_given';

    public function task():BelongsTo
    {
        return $this->belongsTo(Task::class, 'task_id');
    }
    public function source():BelongsTo
    {
        return $this->belongsTo(TaskSource::class, 'id_task_source');
    }

    public function isSolved():bool
    {
        return in_array($this->state, [self::STATE_INCORRECT_ANSWER_GIVEN, self::STATE_CORRECT_ANSWER_HAS_BEEN_GIVEN]);
    }
}
