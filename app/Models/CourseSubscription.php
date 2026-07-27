<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CourseSubscription extends Model
{
    protected $fillable = [
        'user_id',
        'cource_id',
        'is_active'
    ];

    public function cource(): BelongsTo
    {
        return $this->belongsTo(Cource::class, 'cource_id');
    }
}
