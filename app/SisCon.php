<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SisCon extends Model
{
    protected $fillable = [
      'mcompany',
      'name',
      'address',
      'tax',
    ];
}
