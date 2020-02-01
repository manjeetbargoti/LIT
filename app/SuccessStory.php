<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SuccessStory extends Model
{
    protected $fillable = [
    	'title','slug','content','feature_image','add_by'
    ];
}
