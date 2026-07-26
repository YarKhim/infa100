<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourseSubscription extends Model
{
    protected $fillable = ['user_id','cource_id', 'is_active'];
}
