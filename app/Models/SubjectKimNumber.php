<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SubjectKimNumber extends Model
{
    protected $fillable = [
        'subject_id',
        'number_in_kim'
    ];
    public function subject():BelongsTo
    {
        return $this->belongsTo(Subject::class, 'subject_id');
    }
}
