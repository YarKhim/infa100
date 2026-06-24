<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Option extends Model
{
    protected $fillable = [
        'subject_id',
        'source_id'
    ];
    public  function subject():BelongsTo
    {
        return $this->belongsTo(Subject::class);
    }
    public function source():BelongsTo
    {
        return $this->belongsTo(TaskSource::class);
    }
}
