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
        'source_id',
        'solution_files_path',
        'user_code',
        'is_checked',
        'points_after_check',
        'is_need_check',
        'tutor_id',
        'paths_checked_files'
    ];
    protected $casts = [
        'solution_files_path' => 'array', // Поле для хранения ссылок на файлы
        'user_code' => 'array',
        'paths_checked_files' => 'array'
    ];
    public const STATE_NEW = 'new';
    public const STATE_CORRECT_ANSWER_HAS_BEEN_GIVEN = 'correct_answer_has_been_given';
    public const STATE_ANSWER_ISNT_GIVEN = 'answer_isnt_given';
    public const STATE_INCORRECT_ANSWER_GIVEN = 'incorrect_answer_given';
    public const STATE_ANSWER_GIVEN_AND_SAVED = 'answer_isnt_given';
    public const STATE_SOLUTION_ON_CHECKING = 'solution_on_checking';
    public const STATE_SOLUTION_SEND_TO_CHECKING = 'solution_send_to_checking';
    public const STATE_SOLUTION_CHECKED = 'solution_checked';

    public function task(): BelongsTo
    {
        return $this->belongsTo(Task::class, 'task_id');
    }

    public function source(): BelongsTo
    {
        return $this->belongsTo(TaskSource::class, 'id_task_source');
    }
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function isSolved(): bool
    {
        return in_array($this->state, [self::STATE_INCORRECT_ANSWER_GIVEN, self::STATE_CORRECT_ANSWER_HAS_BEEN_GIVEN,
         self::STATE_SOLUTION_CHECKED, self::STATE_SOLUTION_ON_CHECKING, self::STATE_SOLUTION_SEND_TO_CHECKING   ]);
    }
}
