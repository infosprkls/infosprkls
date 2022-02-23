<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class randomEmailsLog extends Model
{
    use HasFactory;
    protected $fillable = [
        'email','content','sender_id','title'
    ];
}
