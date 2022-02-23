<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    use SoftDeletes;
	
	protected $guarded = [];	

    public function createdBy(){
        return $this->belongsTo('App\User', 'created_by_user_id');
    }

    public function company(){
		return $this->belongsTo('App\Company', 'company_id');
	}
}
