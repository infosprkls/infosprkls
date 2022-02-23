<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Bugsnag\BugsnagLaravel\Facades\Bugsnag;
use RuntimeException;
use Cookie;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct(){
        Bugsnag::notifyException(new RuntimeException());
    }

    public function setCookie($name,$value){
		$minutes = 60 * 60 * 24 * 365;
		Cookie::queue(Cookie::make($name, $value, $minutes));
		Cookie::queue($name, $value, $minutes);
   	}
}
