<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
      'location',
        'address',
      'larea',
        'pcount',
        'parea',
        'status',
    ];
}
