<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ActivistQuery extends Model
{
    protected $fillable = [
    	'name','email','phone','position','organization','status','activist_id'
    ];
}
