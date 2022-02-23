<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Rule extends Model
{
    use SoftDeletes;

    public function createdBy(){
        return $this->belongsTo('App\User', 'user_id');
    }
}
