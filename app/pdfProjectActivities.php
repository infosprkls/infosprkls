<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pdfProjectActivities extends Model
{
    protected $fillable = [
        'pdf_project_id','end_date','research','created_at','updated_at'
    ];
}
