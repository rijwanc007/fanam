<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Incentive extends Model
{
    protected $fillable = [
      'incentive',
      'month',
        'commission',
    ];
}
