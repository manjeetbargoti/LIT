<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProposalQuery extends Model
{
    protected $fillable = [
    	'name','email','phone','position','organization','proposal_id'
    ];
}
