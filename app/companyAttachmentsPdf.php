<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class companyAttachmentsPdf extends Model
{
    protected $table = 'company_attachments_pdfs';
	protected $fillable = [
        'ref_id','file','file2','additional_file','type','status','company_id'
    ];

    public function company(){
		return $this->belongsTo('App\Company', 'company_id');
	}

   	public function Companyattachment(){
		return $this->belongsTo('App\Companyattachment', 'ref_id');
	}

	public function Pdf(){
		return $this->belongsTo('App\Pdf', 'ref_id');
	}
}
