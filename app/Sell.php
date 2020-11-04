<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sell extends Model
{
    protected $fillable =[
      'eid',
      'location',
        'address',
      'parea',
      'price',
      'totalprice',
      'commission',
      'cname',
      'caddress',
      'cphone',
    ];
}
