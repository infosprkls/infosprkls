<?php

namespace App;
use App\Company;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Companyattachment extends Model
{
	protected $table = 'companyattachments';
	protected $fillable = [
        'title','company_id','uploaded_date','tags'
    ];

   	public function company(){
		return $this->belongsTo('App\Company', 'company_id');
	}

	public function companyAttachmentsPdf(){
		return $this->hasOne('App\companyAttachmentsPdf')->where('type','Attachment');
	}

	// public function getSuper_user_attachments(){
	// 	$results = DB::table("company_attachments_pdfs AS cap")
	// 		->rightJoin('companyattachments AS ca', 'ca.id', '=', 'cap.ref_id')
	// 		->select('cap.*','ca.title','ca.tags','ca.uploaded_date')
	// 		->where('cap.company_id' , auth()->user()->company->id)
	// 		->paginate(10);

	// 	return $results;
	// }
}
