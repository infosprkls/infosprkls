<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Repositories\CompanyRepository;
use App\Repositories\UserRepository;
use App\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Response;
use App\Company;
use App\Http\Requests\CompanyStore;
use App\Invoice;
use App\companyAttachmentsPdf;
use App\Pdf;
use App\Companyattachment;
use ZipArchive;

class UserController extends Controller
{

    public function __construct(UserRepository $userRepo, CompanyRepository $companyRepository)
    {
        //$this->middleware('companyActive');
        $this->middleware('isaccept');
        $this->userRepo = $userRepo;
        $this->companyRepo= $companyRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        $userSearch = $request->user;
        $pagination_select=10;
        if ($request->has('pagination') && ($request->pagination<=100)) {
            $pagination_select=$request->pagination;
            $this->setCookie("userPerPage",$request->pagination);
        }else if($request->cookie('userPerPage')) {
            $pagination_select=$request->cookie('userPerPage');
        }
        
        
        $subscriptions=$this->userRepo->all_subscriptions();
        
        if (auth()->user()->can("see all users")){
            $userCompany = $request->company;        
            return view('admin.users.index')->withUsers($this->userRepo->paginateAll($pagination_select,$userSearch,$userCompany))->with('subscriptions',$subscriptions)->with('companies',$this->companyRepo->all());
        }

        if (auth()->user()->hasRole('super user')){
            $users=$this->userRepo->not_super_admin_user($userSearch,$pagination_select);
            
            $company_id=auth()->user()->company->id;
            $company_sub_users=$this->companyRepo->count_subscription_users($company_id);
            $company_users=$this->userRepo->current_company_users_count($company_id);
            return view('admin.users.index')->withUsers($users)->with('company_sub_users',$company_sub_users)->with('company_users',$company_users)->with('subscriptions',$subscriptions);
            /*return view('admin.users.index')->withUsers($this->userRepo->getUsersForCompany(auth()->user()->company->id)->paginate(10));*/

        }

        if (auth()->user()->hasRole('user')){
            return redirect()->back()->withStatus(__('You do not have the required permissions to complete this action.'));
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($companyId=NULL)
    {
        
        $isadmin = $this->userRepo->get(auth()->user()->id)->hasRole('super admin');
		$isuperuser = $this->userRepo->get(auth()->user()->id)->hasRole('super user');
        if (auth()->user()->hasRole('user')){
            return redirect()->back()->withErrors(['You do not have the required permissions to complete this action']);
        }elseif (auth()->user()->hasRole('super user')){
            $company_id=auth()->user()->company->id;
            $isAnySub=$this->companyRepo->check_subscription_users($company_id);
            if($isAnySub<1){
                $msg="Your users limit consumed or have no license, please apply for new license";
                    return redirect()->route('pricing')->withErrors([$msg]);
            }else{
                $company_sub_users=$this->companyRepo->count_subscription_users($company_id);
                $company_users=$this->userRepo->current_company_users_count($company_id);
                if($company_users<$company_sub_users){
                    return view('admin.users.create')->withCompanies($this->companyRepo->all())->withIsadmin($isadmin)->withIsuperuser($isuperuser);
                }else{
                    $msg="Your users limit consumed or have no license, please apply for new license";
                    return redirect()->route('pricing')->withErrors([$msg]);
                }
            }            

        }else{

            return view('admin.users.create')->withCompanies($this->companyRepo->all())->withIsadmin($isadmin)->withIsuperuser($isuperuser)->withCompanyid($companyId);
        }
    }

    /**
     * Store a newly created user in storage
     *
     * @param  \App\Http\Requests\CreateUserRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CreateUserRequest $request)
    {
        
        
        if(!$request->role){
            $request->role='user';
        }

        // print_r($_REQUEST);
        // exit;


        if(auth()->user()->hasRole('user')){
            return redirect()->back()->withErrors(['You do not have the required permissions to complete this action']);
        }elseif(auth()->user()->hasRole('super user') && $request->role!='super user' && $request->role!='user'){
            return redirect()->back()->withErrors(['You do not have the required permissions to complete this action']);

        }elseif(auth()->user()->hasRole('ai support') && $request->role=='super admin'){
            return redirect()->back()->withErrors(['You do not have the required permissions to complete this action']);

        }else{
            if(!$request->company_id){
                $this->userRepo->create($request->merge(['password' => Hash::make($request->get('password')), 'created_by_user_id' => auth()->user()->id,'company_id'=> auth()->user()->company_id])->all());
            }
            else{
                $this->userRepo->create($request->merge(['password' => Hash::make($request->get('password')), 'created_by_user_id' => auth()->user()->id])->all());
            }
            
            return redirect()->route('users.index')->withStatus(__('User successfully created.'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param User $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('admin.users.edit')->withUser($user)->withCompanies($this->companyRepo->all());
    }

    /**
     * Update the specified user in storage
     *
     * @param UpdateUserRequest $request
     * @param  \App\User $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        if(!$request->role){
            $request->role='user';
        }
        //dd($user->roles->first()->name);
        if(auth()->user()->hasRole('user')){
            return redirect()->back()->withErrors(['You do not have the required permissions to complete this action']);
        }elseif(auth()->user()->hasRole('super user') && $request->role!='super user' && $request->role!='user'){
            return redirect()->back()->withErrors(['You do not have the required permissions to complete this action']);

        }elseif(auth()->user()->hasRole('ai support') && $request->role=='super admin'){
            return redirect()->back()->withErrors(['You do not have the required permissions to complete this action']);

        }else{
            // TODO hier nog eens goed naar kijken
            if (!(auth()->user()->canUpdateUserWithId($user->id))){
                return back()->withErrors("You do not have the required permissions to complete this action");
            }

            if($request->get('password')){
                $data = $request->merge(['password' => Hash::make($request->get('password'))]);
                $data = $data->all();
            }else{
                $data = $request->except('password');
            }

            $this->userRepo->update($user, $data);
            return redirect()->route('users.index')->withStatus(__('User successfully updated.'));
            //return redirect()->route('users.edit',$user->id)->withStatus(__('User successfully updated.'));
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param User $user
     * @return RedirectResponse
     * @throws \Exception
     */
    public function destroy(User $user)
    {
        if(auth()->user()->hasRole('super admin')){
            $this->userRepo->user_child_record($user->id);
            $user->delete();
            return back()->withStatus(__("User succesfully deleted."));
        }elseif(auth()->user()->hasRole('super user')){
            if(auth()->user()->company_id == $user->company_id){
                $this->userRepo->user_child_record($user->id);
                $user->delete();
                return back()->withStatus(__("User succesfully deleted."));
            }else{
                return back()->withStatus(__("You do not have the required permissions to complete this action."));
            }
            
        }else{
            return back()->withStatus(__("You do not have the required permissions to complete this action."));
        }
    }

    public function pricing()
    {
        if (auth()->user()->hasRole('super user')){
            $subscriptions=$this->userRepo->all_subscriptions();
            return view('admin.users.pricing', compact('subscriptions'));
        }else{
            return back()->withStatus(__("You do not have the required permissions to complete this action."));
        }
        
    }

    public function user_add_batch(Request $request)
    {
        $status=auth()->user()->company->status;
        if($status==0)
        {
            $response=array('error'=>'Please upgrade your plan to open this functionality.');

            return Response::json($response);
        }
        $data = $request->validate([
            'id' => 'required',
            'price' => 'required',
            'users' => 'required'
        ]);


        //$this->userRepo->previous_batch_update(auth()->user()->company->id);

        $this->userRepo->add_user_batch(auth()->user()->id,auth()->user()->company->id,$request->users,$request->id);

        $response=array('success'=>'Subscribed Successfully');

        return Response::json($response);
    }

    public function updateLogo(Request $request)
    {
        $data = $request->validate([
            // 'logo' => 'sometimes|image|mimes:jpeg,png,svg|max:2048|dimensions:max_width=400,max_height=400',
            'logo' => 'sometimes|image|mimes:jpeg,png,svg|dimensions:max_width=400,max_height=400',
            'company_id' => 'required'
        ]);


        if ($request->hasFile('logo') && auth()->user()->hasRole('super user') && ($request->company_id==auth()->user()->company->id)) {

            $file = $request->file('logo')->store('images/logos');
            $filepath=storage_path() . '/app/public/'.$file;
            dd($filepath);
            // chmod($filepath, 0777);
            Company::where('id', $request->company_id)
              ->update(['logo' => $file]);
        }

        return redirect()->back()->withStatus(__('Updated succesfully'));

    }
	
	public function download_single_attachment($dir,$name,$company_id)
	{
		$file = public_path(env('STORAGENAME').'/'.$dir.'/'.$name);
        if(file_exists($file)){
            $header = array(
                'Content-Type' => 'application/octet-stream, no-cache, no-store, must-revalidate',
                'Content-Disposition' => 'attachment', 
                'Content-length' => filesize($file),
                'filename' => $name,
                'Pragma' => 'no-cache',
                'Expires' => '0',
            );
            if (auth()->user()->hasRole('super admin')){
                return Response::download($file, $name, $header);
            }elseif (auth()->user()->hasRole('super user') && auth()->user()->company->id==$company_id){
                return Response::download($file, $name, $header);
            }else{
                return redirect()->back()->withErrors(__('You do not have the required permissions to complete this action.'));
            }
        }else{
            return redirect()->back()->withErrors(__('File Not Found.'));
        }
	}
	
	public function attachments_file_download($id,$dir)
	{
		$filecompany = Companyattachment::where('id', $id)->first();
		$file = companyAttachmentsPdf::where('ref_id', $id)->where('type', 'Attachment')->first();
		if(!isset($filecompany->id) || !isset($file->id)){
			return redirect()->back()->withErrors(__('File Not Found.'));
		}
		$company_id=$filecompany->company_id;
		return $this->download_single_attachment($dir, $file->file, $company_id);
	}
	public function invoices_file_download($id,$dir)
	{
		$file = Invoice::where('id', $id)->first();
        if(!isset($file->id)){
			return redirect()->back()->withErrors(__('File Not Found.'));
		}
		$company_id=$file->company_id;
		return $this->download_single_attachment($dir, $file->file, $company_id);
	}
	public function pdfs_file_download($id,$dir)
	{

		$pdf = companyAttachmentsPdf::where('file', $id)->orWhere('file2', $id)->first();
    	
    	if($id==$pdf->file){
            $name = $pdf->file;
        }else{
            $name = $pdf->file2;
        }
		
		$company_id=$pdf->company_id;
    //    $file = storage_path('app/public/'.$dir.'/'.$name);
    	$file = public_path(env('STORAGENAME').'/'.$dir.'/'.$name);

        // dd($file,file_exists($file));
    	// echo $file;
		// exit;
    	if(file_exists($file)){
			if (auth()->user()->hasRole('super admin') || (auth()->user()->hasRole('super user') && $company_id==auth()->user()->company->id)){
				$files = array(public_path(env('STORAGENAME').'/'.$dir.'/'.$pdf->file),public_path(env('STORAGENAME').'/'.$dir.'/'.$pdf->file2));
				if($pdf->additional_file){
                	array_push($files,public_path(env('STORAGENAME').'/'.$dir.'/'.$pdf->additional_file));
				}
                $zipname = public_path(env('STORAGENAME').'/'.$dir.'/file.zip');
                $zip = new ZipArchive;
                $zip->open($zipname, ZipArchive::CREATE);
                foreach ($files as $key => $file) {
                    if($key==2){
                        $zip->addFile($file, basename($file));
                    }else{
                        $zip->addFile($file, str_replace("_", " ", substr(basename($file), 0, -11)).'.pdf');
                    }
                }
                $zip->close();
				$service_details = Pdf::where('id',$pdf->ref_id)->first();
                $file_name = 'Beschikking-'.strtoupper($service_details->service).'-'.$this->humanDateRanges($service_details->start_date, $service_details->end_date).'.zip';

                $company_detail = Company::where('id',$company_id)->first();
                header('Content-Type: application/zip');
                header('Content-disposition: attachment; filename='.$file_name);
                header('Content-Length: ' . filesize($zipname));
                readfile($zipname);
                unlink($zipname);
            }else{
                return redirect()->route('home')->withErrors(__('You do not have the required permissions to complete this action.'));
            }
        }else{
            return redirect()->back()->withErrors(__('File Not Found.'));
        }
	}
    public function grab_file($hash)
    {
        $hash=base64_decode($hash);
        $hash=explode('/', $hash);
        $dir=$hash[0];
        $id=$hash[1];
        if($dir == "attachments"){
        	return $this->attachments_file_download($id, $dir);
        }elseif($dir == "invoices"){
        	return $this->invoices_file_download($id, $dir);
        }elseif($dir == "pdfs"){
        	return $this->pdfs_file_download($id, $dir);
        }else{
            return abort(404);
        }
    }

    public function humanDateRanges($start, $end){
        $startTime=strtotime($start);
        $endTime=strtotime($end);

        $final_date = "";
        if(date('Y',$startTime)!=date('Y',$endTime)){
            $final_date =  date('j F Y',$startTime) . " - " . date('j F Y',$endTime);
        }else{
            if((date('j',$startTime)==1)&&(date('j',$endTime)==date('t',$endTime))){
                $final_date =  date('j F',$startTime) . " - " . date('j F Y',$endTime);
            }else{
                if(date('m',$startTime)!=date('m',$endTime)){
                    $final_date =  date('j F',$startTime) . " - " . date('j F Y',$endTime);
                }else{
                    $final_date =  date('j F',$startTime) . " - " . date('j Y',$endTime);
                }
            }
        }

        return $final_date;
    }

}
