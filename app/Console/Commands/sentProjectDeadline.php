<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Project;


use App\Mail\loggedinFromDifferentIpsMail;
use Mail;
use App\User;
use App\emailTemplates;

class sentProjectDeadline extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cron:sentProjectDeadline';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $next_month = date('Y-m-d', strtotime("+1 months", strtotime("NOW"))); 
        // dd($next_month);
        $allProjects = Project::whereDate("deadline" , $next_month)->where("notification_sent",0)->get();

        if($allProjects){
            $emailHeader = emailTemplates::where('keyword' , 'header')->first();
            $emailTemplate = emailTemplates::where('keyword' , 'project_deadline')->first();
            $emailFooter = emailTemplates::where('keyword' , 'footer')->first();


            foreach ($allProjects as $key => $value) {
                $responsibleUserDetail = User::find($value->responsible_user_id);
                $creatorUserDetail = User::find($value->created_by_user_id);
                if($responsibleUserDetail){

                    $emailContant = $emailHeader->html_body.$emailTemplate->html_body.$emailFooter->html_body;

                    $emailContant = str_replace("%RESPONSIBLE_USER_NAME%", $responsibleUserDetail->firstname." ".$responsibleUserDetail->firstname, $emailContant);
                    $emailContant = str_replace("%PROJECT_CREATOR_NAME%", $creatorUserDetail->firstname." ".$creatorUserDetail->firstname, $emailContant);
                    $emailContant = str_replace("%PROJECT_NAME%", $value->name, $emailContant);
                    $emailContant = str_replace("%DEADLINE%", date("d-m-Y g:i A", strtotime($value->deadline)), $emailContant);
                    $emailContant = str_replace("%PROJECT_LINK%", route('projects.show', $value), $emailContant);

                    $emailContant = str_replace("%BASE_URL%", url('/'), $emailContant);


                    $details = [
                        'to'                => $responsibleUserDetail->email,
                        'from'              => 'AI-Solutions',
                        'subject'           => $emailTemplate->subject,
                        "emailContant"      => $emailContant,
                    ];

                    $email = new loggedinFromDifferentIpsMail($details);
                    Mail::to($responsibleUserDetail->email)->send($email);

                    $data = [
                        "notification_sent"=>1
                    ];

                    Project::where("id" , $value->id)->update($data);
                }
            }


            
        }
        
    }


}