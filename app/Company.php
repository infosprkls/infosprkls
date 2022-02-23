<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Company extends Model
{
    use SoftDeletes;

    protected $guarded = [];

    public function contactUser(){
        return $this->hasOne('App\User', 'id', 'contact_user_id');
    }

    public function createdBy(){
        return $this->belongsTo('App\User', 'created_by_user_id');
    }

    public function projects(){
        return $this->hasMany('App\Project');
    }

    public function generate_pdf(){
        return $this->hasMany('App\Pdf', 'company_id');
    }

    public function users(){
        return $this->hasMany('App\User');
    }
	
	public function downloads(){
		return $this->hasMany('App\Download');
	}
	
	public function tasks(){
		return $this->hasMany('App\Task');
	}

    public function locations(){
        return $this->hasMany('App\Location');
    }

    public function hoursBookedByUsers(){
        return $this->hasManyThrough('App\Hour', 'App\User');
    }

    public function superUsers(){
        $users = $this->users;
        $col = [];
        foreach ($users as $user){
            if ($user->hasRole('super admin')){
                $col[] = $user;
            }
        }
        return $col;
    }

    public function superUserCount(){
        return count($this->superUsers);
    }

    public function canAddMoreSuperUsers(){
        // TODO moet ergens bijgehouden worden hoeveel super users een company mag hebben voordat we goed kunnen vergelijken.
        // Op dit moment zet ik het wel gewoon op 2, kunnen we daar vanuit gaan nu.

        if ($this->superUserCount() >= 2 ){
            return false;
        }else{
            return true;
        }
    }

    public function attachments()
    {
        return $this->hasMany('App\Companyattachment');
    }

    public function invoices()
    {
        return $this->hasMany('App\Invoice');
    }

    public function pdfs()
    {
        return $this->hasMany('App\Pdf');
    }
    public static function subscription_users($company_id)
    {
        return $users = DB::table('user_subscriptions')
        ->where('company_id', $company_id)
        ->sum('total_users');
    }

    public static function company_users($company_id)
    {
        return $users = DB::table('users')
            ->select('id')
            ->where('company_id', $company_id)
            ->where('deleted_at', NULL)
            ->count();
    }
	
	public static function check_company_exit($company_name,$kvk,$id)
    {
		if($company_name){
			$query = DB::table('companies')->select('id')->where('name', '=', $company_name);
			if($id){
				$query->where('id', '!=', $id);
			}
			return $query->count();
		}else{
			if($kvk){
				$query = DB::table('companies')->select('id')->where('kvk', '=', $kvk);
				if($id){
					$query->where('id', '!=', $id);
				}
				return $query->count();
			}else{
				return FALSE;
			}
		}
			
    }
	
}
