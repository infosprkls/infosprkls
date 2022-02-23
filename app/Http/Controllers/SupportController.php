<?php

namespace App\Http\Controllers;

use App\Support;
use Illuminate\Http\Request;
use App\Repositories\CompanyRepository;
use App\Repositories\UserRepository;

class SupportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(UserRepository $userRepo, CompanyRepository $companyRepository)
    {
        $this->userRepo = $userRepo;
        $this->companyRepo= $companyRepository;
        $this->middleware('isaccept');
    }
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   

        if(auth()->user()->hasRole('super admin')){
            $supports=Support::orderby("id" , "DESC")->paginate(10);
        }else if(auth()->user()->hasRole('super user')){
            $supports=Support::where('company_id',auth()->user()->company->id)->where('contacted_role','super user')->orwhere('created_by_user_id',auth()->user()->id)->orderby("id" , "DESC")->paginate(10);
        }else{
            $supports=Support::where('created_by_user_id',auth()->user()->id)->orderby("id" , "DESC")->paginate(10);
        }
        return view('admin.users.support')->withSupports($supports);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $support = new Support;
        $support->created_by_user_id = auth()->user()->id;
        $support->company_id = auth()->user()->company->id;
        $support->subject = trim($request->subject);
        $support->message = trim($request->message);
        $support->contacted_role = $request->role;
        $support->save();

        return redirect()->route('supports.create')->withStatus(__('Successfully Added.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Support  $support
     * @return \Illuminate\Http\Response
     */
    public function show(Support $support)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Support  $support
     * @return \Illuminate\Http\Response
     */
    public function edit(Support $support)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Support  $support
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Support $support)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Support  $support
     * @return \Illuminate\Http\Response
     */
    public function destroy(Support $support)
    {
        //
    }

    public function update_status(Request $request){
        $supportDetail = Support::where('id', $request->id)->first();
        if($supportDetail && (auth()->user()->hasRole('super admin') || ($supportDetail->contacted_role && auth()->user()->company_id==$supportDetail->company_id))) {
            Support::where('id', $request->id)->update(['status' => $request->status]);
        }
        
        return "success";
    }
}
