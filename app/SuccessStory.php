<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SuccessStory extends Model
{
    protected $fillable = [
    	'title','slug','short_content','content','feature_image','add_by'
    ];
}
