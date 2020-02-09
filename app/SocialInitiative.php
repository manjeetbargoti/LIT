<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SocialInitiative extends Model
{
    //
    protected $fillable = [
        'initiative_name','slug','initiative_description','beneficiaries','duration','budget','region','street','country','state','city','
        feature_image','user_id','status','area_impact_sdg'
    ];
}
