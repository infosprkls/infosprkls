<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
// use http\Env\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Jobs\loggedinFromDifferentIps;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    public function username()
    {
        return "email";
    }

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    function authenticated(Request $request, $user)
    {
        $data = array(
            "userId"    => $user->id,
            "country"   => $this->get_ip_country($request->ip()),
            "ipAddress" => $request->ip()
        );

        loggedinFromDifferentIps::dispatch($data)->delay(now()->addSeconds(1));
    }


    public function get_ip_country($ip){
        $url = 'http://ip-api.com/json/'.$ip;
        $tz = file_get_contents($url);
        try{
            $tz = json_decode($tz,true)['country'];
        }catch(\Exception $e){
            $tz = "Pakistan";
        }
        
        return $tz;
    }

    public function __construct()
    {

        $this->middleware('guest')->except('logout');
    }
}
