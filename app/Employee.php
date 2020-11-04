<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
      'name',
      'photo',
      'address',
        'contact',
        'cv',
      'salary',
      'grade',
    ];
}
