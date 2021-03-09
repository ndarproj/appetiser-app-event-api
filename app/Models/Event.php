<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = 'events';

    protected $fillable = [
        'name',
        'days_of_week',
        'start_date',
        'end_date'
    ];

    protected $casts = [
        'days_of_week' => 'json',
    ];
}
