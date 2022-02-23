<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pdfProjectAttachments extends Model
{
    use HasFactory;
    protected $fillable = [
        'generate_pdf_id','date','description','file','file_original_name'
    ];
}
