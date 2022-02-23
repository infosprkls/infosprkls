<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Download extends Model
{
    use SoftDeletes;
	
	protected $guarded = [];	

    public function uploadedBy(){
        return $this->belongsTo('App\User', 'uploaded_by_user_id');
    }
	
	public function company(){
		return $this->belongsTo('App\Company', 'company_id');
	}
}
