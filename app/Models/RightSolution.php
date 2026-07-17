<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
}
