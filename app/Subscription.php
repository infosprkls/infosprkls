<?php

namespace App;
use App\Company;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    protected $table = 'user_subscriptions';

   public function company(){
		return $this->belongsTo('App\Company', 'company_id');
	}
}
