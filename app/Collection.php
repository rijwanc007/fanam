<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    protected $fillable = [
      'mcompany',
      'name',
      'tax',
        'collection',
        'date',
      'totaltax',
        'totalcollection'

    ];
}
