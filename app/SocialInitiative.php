<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SocialInitiative extends Model
{
    //
    protected $fillable = [
        'initiative_name','slug','initiative_description','region','street','country','state','city','
        feature_image','user_id','status','area_impact_sdg','video_link','promote','in_partnership','project_scalability',
        'sdg_relevance','relevance_national_agenda','project_innovation','program_benefits','program_stage','promote_url','featured'
    ];
}
