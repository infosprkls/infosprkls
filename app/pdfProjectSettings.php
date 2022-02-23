<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pdfProjectSettings extends Model
{
    use HasFactory;
    protected $fillable = [
        'generate_pdf_id','status','due_date','log_text'
    ];
}
