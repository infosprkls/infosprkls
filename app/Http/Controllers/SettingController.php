<?php

namespace App\Http\Controllers;

use App\Setting;
use Illuminate\Http\Request;
use App\Jobs\adminSendRandomEmail;
// use Spatie\PdfToText\Pdf;

class SettingController extends Controller
{
    public function __construct(){
        $this->middleware('isaccept');   
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd();

        // echo Pdf::getText(public_path('convert.pdf'));


        // exit;
        if(auth()->user()->hasRole('super admin')){
            // $setting= new Setting();
            // $settings=$setting->getAll(10);
            
            return view('settings.index');
        }
    }

    public function admin_get_settings()
    {
        $setting= new Setting();
        $settings=$setting->getAll(10);
        echo json_encode($settings);exit;
        
        // return view('settings.index')->with('settings',$settings);
    }

    public function admin_update_settings(Request $request)
    {
        $data = $request->validate([
            'setting_id' => 'required',
            'setting_value' => 'required',
        ]);
        $setting= new Setting();
        $settings=$setting->updateValue($request->setting_id,$request->setting_value);
        echo json_encode((object) array("status"=>'Success',"message"=>'Record succesfully updated.'));exit;
    }

    public function admin_view_settings_page(Request $request,$key)
    {
        if($key!=='license_dutch' && $key!='license_english'){
            abort(404);
        }

        $data=[];
        $setting= new Setting();
        $license_english=$setting->getSettingBykey('license_english');
        $license_english=$license_english[0]->setting_value;
        $license_dutch=$setting->getSettingBykey('license_dutch');
        $license_dutch=$license_dutch[0]->setting_value;
        $data=array('license_english'=>$license_english,'license_dutch'=>$license_dutch);
        return view('settings.user_accept')->with('license',$data)->with('key',$key);





        // $PageHtml = Setting::where('setting_key',$key)->first();
        // return view('settings.show')->with('pagehtml',$PageHtml);
    }

    public function admin_send_email(Request $request)
    {
        if(auth()->user()->hasRole('super admin')){
            $data = array(
                "senderId"      => auth()->id(),
                "receiverEmail" => $request->receiverEmail,
                "emailContent"  => $request->emailContent,
                "title"         => $request->emailTitle,
            );
            adminSendRandomEmail::dispatch($data)->delay(now()->addSeconds(1));
            echo json_encode(array("status"=>"Success","message"=>"Request submitted successfully."));exit;
        }
    }




    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('settings.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request){
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function show(Setting $setting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function edit(Setting $setting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Setting $setting)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function destroy(Setting $setting)
    {
        //
    }
}
