<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pdfXmls extends Model
{
    use HasFactory;
    protected $fillable = [
        'generate_pdf_id','user_id','xml_name','xml_content','is_downloaded'
    ];

    public function pdf(){
        return $this->belongsTo('App\Pdf', 'generate_pdf_id');
    }

    public function serviceXmlDownloadLogs(){
        return $this->hasMany('App\service_xml_download_logs');
    }
}
