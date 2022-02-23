<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Hour extends Model
{
    use SoftDeletes;

    protected $guarded = [];

    public function createdBy(){
        return $this->belongsTo('App\User', 'user_id');
    }

    public function project(){
        return $this->belongsTo('App\Project');
    }
}
