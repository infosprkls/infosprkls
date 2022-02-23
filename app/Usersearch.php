<?php

namespace App;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Usersearch extends Model
{
    protected $table = 'usersearches';
	protected $fillable = [
        'user_id','date_range','total_hours'
    ];

   public function user(){
		return $this->belongsTo('App\User', 'user_id');
	}
}
