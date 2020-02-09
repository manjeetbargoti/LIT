<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InstaCampaigns extends Model
{
    //
    protected $fillable = [
        'service_name','slug','service_description','beneficiaries','duration','budget','region','street','country','state','city','
        feature_image','user_id','status','area_impact_sdg'
    ];
}
