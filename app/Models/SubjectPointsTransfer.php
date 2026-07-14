<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubjectPointsTransfer extends Model
{
    protected $fillable = [
        'subject_id',
        'primary_sum',
        'secondary_sum'
    ];
}
