<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Auth;

class Option extends Model
{
    protected $fillable = [
        'subject_id',
        'source_id'
    ];

    public function subject(): BelongsTo
    {
        return $this->belongsTo(Subject::class);
    }

    public function source(): BelongsTo
    {
        return $this->belongsTo(TaskSource::class);
    }
    public function optioncontent(): HasMany
    {
        return $this->hasMany(OptionContent::class);
    }
    public function solution() :HasMany
    {
        return $this->hasMany(OptionSolution::class);
    }
    public function task(): BelongsTo
    {
        return $this->belongsTo(Task::class);
    }
    public function isSolved():bool
    {
        return OptionSolution::query()
            ->where('option_id', $this->id)
            ->where('user_id', Auth::id())
            ->first()
            ->is_solved;
    }
}
