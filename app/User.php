<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Lab404\Impersonate\Models\Impersonate;
use Spatie\Permission\Traits\HasRoles;
use App\Notifications\MailResetPasswordToken;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable, HasRoles, Impersonate;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username','company_id','firstname','lastname','phone_number', 'created_by_user_id', 'email', 'password', 'title', 'initials', 'insertions', 'gender', 'mobile','financial_access'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * @return bool
     */

    protected function authenticated(Request $request, $user)
    {
        //
    }

    public function canImpersonate()
    {
        // For example
        return $this->hasRole('super admin');
    }

    /**
     * @return bool
     */
    public function canBeImpersonated()
    {
        // For example
        return 1;
    }

    public function createdBy(){
        return $this->belongsTo('App\User','created_by_user_id');
    }

    public function company(){
        return $this->belongsTo('App\Company');
    }

    public function createdUsers(){
        return $this->hasMany('App\User', 'created_by_user_id');
    }

    public function isResponsibleFor(){
        return $this->hasMany('App\Project', 'responsible_user_id');
    }

    public function createdProjects(){
        return $this->hasMany('App\Project', 'created_by_user_id');
    }

    public function pdfs(){
        return $this->hasMany('App\Pdf', 'user_id');
    }

    public function createdCompanies(){
        return $this->hasMany('App\Company', 'created_by_user_id');
    }

    public function isContactUserFor(){
        return $this->hasOne('App\Company', 'contact_user_id');
    }

    public function bookedHours(){
        return $this->hasMany('App\Hour', 'user_id');
    }

    public function usersearch(){
        return $this->hasMany('App\Models\Usersearch');
    }

    public function serviceXmlDownloadLogs(){
        return $this->hasMany('App\service_xml_download_logs');
    }

    public function createdRules(){
        return $this->hasMany('App\Rule');
    }

    public function getFullNameAttribute(){
        return $this->firstname . " " . $this->lastname;
    }

    public function hasAccessToProject($project_id)
    {
        foreach ($this->company->projects as $project){
            if ($project_id == $project->id){
                return true;
                break;
            }else{
                continue;
            }
        }
    }

    //comment to test the new setup

    public function canUpdateUserWithId($user_id){
        if (auth()->user()->hasRole('super admin')) return true;

        if (auth()->user()->hasRole('super user')){
            if (User::find($user_id)->company == auth()->user()->company){
                return true;
            }
        }

        return false;
    }

    public function accept_license(){
        
        $auth_userid=User::find(auth()->user()->id);
        $auth_userid->is_accept = 1;
        $auth_userid->save();
    }

    public function sendPasswordResetNotification($token)
    {
        // dd($token);
        $this->notify(new MailResetPasswordToken($token));
    }

}
