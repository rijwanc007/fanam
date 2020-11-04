<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $fillable = [
        'eid',
        'month',
        'year',
        'salary',
        'commission',
        'dates',
        'location',
        'tatd',
    ];
}
