<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pdf extends Model
{
    protected $table = 'generate_pdf';
	protected $fillable = ['company_id','service','wbso_type','user_id','created_by','start_date','end_date','in_months','ref_number','hour_rate','total_hours','total_amount','amount_per_month','slug','created_at','updated_at'
    ];

    public function company(){
		return $this->belongsTo('App\Company', 'company_id');
	}

	public function pdfProjects(){
        return $this->hasMany('App\pdfProjects', 'generate_pdf_id');
    }

    public function companyAttachmentsPdf(){
        return $this->hasOne('App\companyAttachmentsPdf', 'ref_id')->where('type','Pdf');
    }

    public function user(){
        return $this->belongsTo('App\User', 'user_id');
    }

    public function pdfXmls(){
        return $this->hasOne('App\pdfXmls', 'generate_pdf_id');
    }

    

    public function pdfProjectSettings(){
        return $this->hasMany('App\pdfProjectSettings', 'generate_pdf_id');
    }

    public function pdfProjectAttachments(){
        return $this->hasMany('App\pdfProjectAttachments', 'generate_pdf_id');
    }

}
