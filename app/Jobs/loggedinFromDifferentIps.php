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
use App\loginHistory;
use App\User;
use App\emailTemplates;







class loggedinFromDifferentIps implements ShouldQueue
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
        $today = date("Y-m-d");
        // $yesterday = date("Y-m-d", strtotime( '-1 days' ) );
        loginHistory::whereDate('created_at', '<' ,$today )->delete();

        $userId         = $this->details['userId'];
        $ipAddress      = $this->details['ipAddress'];
        $country        = $this->details['country'];

        $data = [
            "user_id"   =>  $userId,
            "ip_address"=>  $ipAddress,
            "country"   =>  $country
        ];

        loginHistory::create($data);


        $todaysRecord = loginHistory::where("user_id" , $userId)->whereDate('created_at', $today )->select("ip_address")->groupBy('ip_address')->get();

        if($todaysRecord && count($todaysRecord)>1){
            // IP ADDRESS ALERT
            $userDetail = User::find($userId);
            $emailHeader = emailTemplates::where('keyword' , 'header')->first();
            $emailTemplate = emailTemplates::where('keyword' , 'logged_in_from_different_ips')->first();
            $emailFooter = emailTemplates::where('keyword' , 'footer')->first();



            $emailContant = $emailHeader->html_body.$emailTemplate->html_body.$emailFooter->html_body;

            $emailContant = str_replace("%USER_NAME%", $userDetail->firstname." ".$userDetail->firstname, $emailContant);
            $emailContant = str_replace("%BASE_URL%", url('/'), $emailContant);
            $ipAddressHtml = "";
            foreach ($todaysRecord as $key => $value) {
                $ipAddressHtml .= '<tr style="width:100%; float:left;" cellpadding="0" cellspacing="0" align="center" width="100%">
                    <td align="center" class="center-text" style="width:100%;font-family:"Roboto", sans-serif;font-size:25px;font-weight:500;text-align:center;height:36px;line-height: 27px;color:#334150;"
                        width="100%">
                        <p align="center" class="center-text" style="box-sizing:border-box;font-family:-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,Helvetica,Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol";color:#222; font-size:14px;text-align:center; font-weight:600;">
                            <b>Ip Address: </b> '.$value->ip_address.'
                        </p>
                    </td>
                </tr>';
            }
            $emailContant = str_replace("%IP_ADDRESS_HTML%", $ipAddressHtml, $emailContant);
            if($userDetail){
                $details = [
                    'to'                => $userDetail->email,
                    'from'              => 'AI-Solutions',
                    'subject'           => $emailTemplate->subject,
                    "emailContant"      => $emailContant,
                ];

                $email = new loggedinFromDifferentIpsMail($details);
                Mail::to($userDetail->email)->send($email);
            }




            // SUSPICIOUS ACCOUNT ALERT
            $suspiciousRecord = loginHistory::where("user_id" , $userId)->whereDate('created_at', $today )->select("country")->groupBy('country')->get();

            if($suspiciousRecord && count($suspiciousRecord)>1){
                $emailTemplate = emailTemplates::where('keyword' , 'suspicious_account')->first();



                $emailContant = $emailHeader->html_body.$emailTemplate->html_body.$emailFooter->html_body;

                $emailContant = str_replace("%USER_NAME%", $userDetail->firstname." ".$userDetail->firstname, $emailContant);
                $emailContant = str_replace("%TODAY_DATE%", date("d-m-Y"), $emailContant);

                if($userDetail){
                    $details = [
                        'to'                => $userDetail->email,
                        'from'              => 'AI-Solutions',
                        'subject'           => $emailTemplate->subject,
                        "emailContant"      => $emailContant,
                    ];

                    $email = new loggedinFromDifferentIpsMail($details);
                    Mail::to($userDetail->email)->send($email);
                }
            }





        }
    }
}
