<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MultiBudget extends Model
{
    protected $fillable = [
        'beneficiaries','duration','budget','start_date','end_date','outreach','time_period','social_init_id','insta_camp_id'
    ];  
}
