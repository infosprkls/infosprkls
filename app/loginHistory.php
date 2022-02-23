<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class loginHistory extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'ip_address',
        'country',
    ];
}
