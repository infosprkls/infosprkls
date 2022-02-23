<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;



use App\Mail\loggedinFromDifferentIpsMail;
use Mail;
use DB;
use App\loginHistory;
use App\User;
use App\emailTemplates;

class downloadWaiting implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $details;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($value)
    {
        $this->details = $value;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {

        $companyId = $this->details;

        $allSuperUsers = DB::table('users')
            ->select('users.*','companies.id as cid','companies.name as company','model_has_roles.role_id','model_has_roles.model_id')
            ->join('companies', 'companies.id', '=', 'users.company_id')
            ->join('model_has_roles', 'model_has_roles.model_id', '=', 'users.id')
            ->where('companies.id', $companyId)
            ->where('model_has_roles.role_id',3)
            ->where('users.deleted_at','=',NULL)
            ->get();



        $emailHeader = emailTemplates::where('keyword' , 'header')->first();
        $emailTemplate = emailTemplates::where('keyword' , 'download_file')->first();
        $emailFooter = emailTemplates::where('keyword' , 'footer')->first();



        if($allSuperUsers){
            foreach ($allSuperUsers as $key => $value) {
                // if($value->id==105){
                $emailContant = $emailHeader->html_body.$emailTemplate->html_body.$emailFooter->html_body;

                $emailContant = str_replace("%SUPERUSER_NAME%", $value->firstname." ".$value->firstname, $emailContant);
                $emailContant = str_replace("%DOWNLOAD_LINK%", route('company-documents', $companyId), $emailContant);
                $emailContant = str_replace("%BASE_URL%", url('/'), $emailContant);

                $details = [
                    'to'                => $value->email,
                    'from'              => 'AI-Solutions',
                    'subject'           => $emailTemplate->subject,
                    "emailContant"      => $emailContant,
                ];

                $email = new loggedinFromDifferentIpsMail($details);
                Mail::to($value->email)->send($email);  
                // }
            }
        }

              
    }
}
