<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    protected $fillable = [
      'grade',
      'food',
        'location',
        'hotel',
        'travel',
        'others',
        'total',
    ];
}
