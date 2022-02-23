<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;

    public function projects(){
        return $this->belongsToMany('App\Project')->withTimestamps();
    }
}
