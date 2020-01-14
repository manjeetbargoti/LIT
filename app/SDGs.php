<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SDGs extends Model
{
    //
    protected $fillable = [
        'sdg_name','sdg_description','add_by','status'
    ];
}
