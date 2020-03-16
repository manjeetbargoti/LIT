<?php

namespace App;

use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable,HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username','first_name','last_name','title','email','phone','password','avatar','bio','country','state','city','sip_points',
        'startup_type','company_register','in_market','trade_license_image','project_title','project_description','project_stage',
        'fund_required','beneficiaries','project_sdg','problem_solving','solution','scalability','relevance_sdg','relevance_agenda',
        'innovative'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Protecting Password by converting into hash
    public function setPasswordAttribute($value)
    {
        if($value)
        {
            $this->attributes['password'] = app('hash')->needsRehash($value)?Hash::make($value):$value;
        }
    }

    // public function roles() {
    //     return $this->belongsTo('Spatie\Permission\Traits\HasRoles');
    // }

    // public function products()
    // {
    //     return $this->hasMany(Product::class);
    // }
}
