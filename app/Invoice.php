<?php

namespace App;
use App\Company;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $table = 'invoices';
	protected $fillable = [
        'title','company_id','file','uploaded_date','tags'
    ];

   	public function company(){
		return $this->belongsTo('App\Company', 'company_id');
	}
}
