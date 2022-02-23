<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use DateTime;
class Wbso extends Model
{
    //use SoftDeletes;
	
	protected $table = 'wbso_logs';
	protected $fillable = ['company_id','user_id','details','created_at','updated_at'
    ];

    public function company(){
		return $this->belongsTo('App\Company', 'company_id');
	}

    public function createdBy(){
        return $this->belongsTo('App\User', 'user_id');
    }


}
