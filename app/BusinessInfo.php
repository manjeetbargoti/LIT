<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BusinessInfo extends Model
{
    //
    protected $fillable = [
        'business_name','business_description','priority_sdg','contact_person_name','email','country','state','city','phone',
        'trade_license_number','trade_license_image','license_expiry_date','alternate_contact_name_1','alternate_contact_job_1',
        'alternate_contact_email_1','alternate_contact_company_1','alternate_contact_name_2','alternate_contact_job_2','alternate_contact_email_2',
        'alternate_contact_company_2','user_id'
    ];
}
