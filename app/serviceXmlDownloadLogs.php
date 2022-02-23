<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class serviceXmlDownloadLogs extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id','pdf_xmls_id','download_file_name'
    ];

    public function user(){
		return $this->belongsTo('App\User');
	}

	public function pdfXmls(){
		return $this->belongsTo('App\pdfXmls');
	}
}
