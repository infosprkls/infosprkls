<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Support\Facades\Password;
use Notification;
use Illuminate\Notifications\Notifiable;
use App\User;
use Validator;
use App\Notifications\EmailNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords,Notifiable;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }


    public function sendresetpasswordurl(){
        return view('auth.passwords.email');
    }

    public function sendresetpasswordmail(Request $request){
        // $request->validate(['email' => 'required|email']);
        // $user = User::where('email',$request->email)->first();
        // if(empty($user)){
        //    return redirect()->back()
        //             ->withErrors(__("Invalid User."));

        // }else{
        // Notification::send($user, new EmailNotification($user));
        // return redirect()->back()
        //        ->withStatus(__("Email send successfully, check your mail."));
        // }




        $request->validate(['email' => 'required|email']);

        $validator = Validator::make($request->all(), [
            'email' => 'required|email'
        ]);

        if ($validator->fails()) { 
            return response()->json(['error'=>$validator->errors()]);
        }







        try {
            $status = Password::sendResetLink(
                $request->only('email')
            );
            switch ($status) {
                case Password::RESET_LINK_SENT:
                    return redirect()->back()->withStatus(__(trans($status)));
                case Password::INVALID_USER:
                    return redirect()->back()->withErrors(__(trans($status)));
            }
        } catch (\Swift_TransportException $ex) {
            return redirect()->back()->withErrors(__($ex->getMessage()));
        } catch (Exception $ex) {
             return redirect()->back()->withErrors(__($ex->getMessage()));
        }










    }

    public function sendresetpasswordform(Request $request)
    {
        return view('auth.passwords.reset')->with(
            ['token' => $request->token,'email' => $request->email]
        );
    }

    public function resetpassword(Request $request)
    {
        // $request->validate(['token' => 'required','password' => 'required|confirmed|min:8',]);
        // $user = User::where('remember_token',$request->token)->first();
        // if(empty($user)){
        //    return redirect()->back()
        //             ->withErrors(__("Invalid Token."));

        // }else{
        //     $user->password = Hash::make($request->password);
        //     $user->setRememberToken(Str::random(60));
        //     $user->save();

        //      return redirect()->back()
        //                     ->withStatus(__("Reset successfully."));
        // }

        // dd($request->all());

        $validator = Validator::make($request->all(), [ 
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:8',
        ]);

        if ($validator->fails()) { 
            return back()->withErrors($validator)->withInput();
        }


        try {
            $credentials = $request->only(
                'email', 'password', 'password_confirmation', 'token'
            );

            $status = Password::reset($credentials, function ($user, $password) {
                $this->updatePassword($user, $password);
            });
            switch ($status) {
                case Password::PASSWORD_RESET:
                    // return response()->json(['status' => 'Success', "message" => trans($status)]); 
                    return redirect()->route('login')->withStatus(__(trans($status)));
            }

            // return response()->json(['status' => 'Failure','message' => trans($status)]);
            return redirect()->back()->withErrors(__(trans($status))); 
        } catch (\Exception $ex) {
            if (isset($ex->errorInfo[2])) {
                $msg = $ex->errorInfo[2];
            } else {
                $msg = $ex->getMessage();
            }
            // $arr = array("status" => 'Failure', "message" => $msg);
            return redirect()->back()->withErrors(__($msg));
        }
        
        
            
    }

    protected function updatePassword($user, $password)
    {
        $user->password = bcrypt($password);
        $user->save();
    }

}
