<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gasto extends Model
{
    protected $guarded = [];

    protected $dates = [
        'vencimiento',
    ];
}
