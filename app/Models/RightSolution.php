<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RightSolution extends Model
{
    protected $fillable = [
        'author_id',
        'task_id',
        'solution',
        'files_path',
        'code'
    ];
    protected $casts = [
        'files_path' => 'array', // Поле для хранения ссылок на файлы
        'code' => 'array'
    ];

    public function userdata(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function task(): BelongsTo
    {
        return $this->belongsTo(Task::class, 'task_id');
    }

    public function subject(): BelongsTo
    {
        return $this->belongsTo(Subject::class, 'id_subject');
    }
}
