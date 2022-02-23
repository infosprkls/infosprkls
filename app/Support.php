<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Support extends Model
{
	protected $table = 'supports';
	protected $fillable = [
        'company_id','created_by_user_id', 'message',
    ];

    public function createdBy(){
        return $this->belongsTo('App\User', 'created_by_user_id');
    }

    public function company(){
        return $this->belongsTo('App\Company', 'company_id');
    }
}
