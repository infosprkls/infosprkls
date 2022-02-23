<?php
namespace App\Notifications;
use Illuminate\Bus\Queueable;

// use Illuminate\Notifications\Notification;

// use Illuminate\Contracts\Queue\ShouldQueue;

// use Illuminate\Notifications\Messages\MailMessage;

// use Illuminate\Support\Facades\Lang;


use App\emailTemplates;


use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\URL;

class MailResetPasswordToken extends Notification

{

    use Queueable;



    public $token;
    public static $createUrlCallback;
    public static $toMailCallback;



    /**

     * Create a new notification instance.

     *

     * @return void

     */

    public function __construct($token)

    {

        $this->token = $token;

    }



    /**

     * Get the notification's delivery channels.

     *

     * @param  mixed  $notifiable

     * @return array

     */

    public function via($notifiable)

    {

        return ['mail'];

    }



    /**

     * Get the mail representation of the notification.

     *

     * @param  mixed  $notifiable

     * @return \Illuminate\Notifications\Messages\MailMessage

     */

    public function toMail($notifiable)

    {

        // return (new MailMessage)
        //     ->subject(Lang::get('Reset Password Notification'))
        //     ->line(Lang::get('You are receiving this email because we received a password reset request for your account.'))
        //     ->action(Lang::get('Reset Password'), url(route('sendresetpasswordform', ['token' => $this->user->remember_token], false)))
        //     ->line(Lang::get('If you did not request a password reset, no further action is required.'));






        if (static::$toMailCallback) {
            return call_user_func(static::$toMailCallback, $notifiable, $this->token);
        }

        if (static::$createUrlCallback) {
            $url = call_user_func(static::$createUrlCallback, $notifiable, $this->token);
        } else {
            $url = url(route('sendresetpasswordform', [
                'token' => $this->token,
                'email' => $notifiable->getEmailForPasswordReset(),
            ], false));
        }

        $emailHeader = emailTemplates::where('keyword' , 'header')->first();
        $emailTemplate = emailTemplates::where('keyword' , 'reset_password')->first();
        $emailFooter = emailTemplates::where('keyword' , 'footer')->first();



        $emailContant = $emailHeader->html_body.$emailTemplate->html_body.$emailFooter->html_body;

        $emailContant = str_replace("%RESET_LINK%", $url, $emailContant);
        $emailContant = str_replace("%BASE_URL%", url('/'), $emailContant);


        return  (new MailMessage)
        ->view(
            'emails.index', ['emailContant' => $emailContant]
        );

    }


    /**

     * Get the array representation of the notification.

     *

     * @param  mixed  $notifiable

     * @return array

     */

    /*public function toDatabase($notifiable)

    {

        return [

            'order_id' => $this->details['order_id']

        ];


    }*/

    public static function createUrlUsing($callback)
    {
        static::$createUrlCallback = $callback;
    }

    /**
     * Set a callback that should be used when building the notification mail message.
     *
     * @param  \Closure  $callback
     * @return void
     */
    public static function toMailUsing($callback)
    {
        static::$toMailCallback = $callback;
    }

}