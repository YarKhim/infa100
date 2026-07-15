<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SubjectPointsTransfer extends Model
{
    protected $fillable = [
        'subject_id',
        'primary_sum',
        'secondary_sum'
    ];
    public  function  subject():BelongsTo
    {
        return $this->belongsTo(Subject::class, 'subject_id');
    }
}
