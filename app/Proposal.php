<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proposal extends Model
{

    protected $fillable = [
        'project_name','slug','contact_person_name','email','phone','fax_number','company_background','project_description','project_goals','submission_time',
        'project_timeline','proposal_elements','evolution_criteria','possible_challanges','budget','social_impact_points','country','state',
        'city','status','business_id','user_id','time_period','brochure_pdf'
    ];

}
