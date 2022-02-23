<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;



use App\Mail\adminSendRandomEmailMail;
use Mail;
use App\randomEmailsLog;







class adminSendRandomEmail implements ShouldQueue
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

        $senderId       = $this->details['senderId'];
        $receiverEmail  = $this->details['receiverEmail'];
        $emailContent   = $this->details['emailContent'];
        $title          = $this->details['title'];

        $data = [
            "sender_id" =>  $senderId,
            "title"     =>  $title,
            "email"     =>  $receiverEmail,
            "content"   =>  $emailContent
        ];

        randomEmailsLog::create($data);

        $details = [
            'to'            => $receiverEmail,
            'from'          => 'AI-Solutions',
            'subject'       => $title,
            'title'         => $title,
            "emailContant"  => $emailContent
        ];

        // dd($details);
        $email = new adminSendRandomEmailMail($details);
        Mail::to($receiverEmail)->send($email);
    }
}
