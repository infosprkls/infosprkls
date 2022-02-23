<?php

namespace App\Http\Controllers;

use App\Company;
use App\Hour;
use App\Month;
use App\Project;
use App\User;
use App\Attachment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Monolog\Logger;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
		$this->middleware('companyActive');
		$this->middleware('projectsActive');
		$this->middleware('isaccept');
	}
	
    public function index()
    {
		if(auth()->user()->hasRole("super admin")){
			$projects = Project::orderByDesc('id')->get();
		}elseif(auth()->user()->hasRole("user")){
			$projects = Project::where([['responsible_user_id','=',auth()->id()]])->orwhere('created_by_user_id',auth()->id())->orderByDesc('id')->get();
		}else{
			$projects = Company::find(auth()->user()->company_id)->projects;
		}
        return view('projects.index')->withProjects($projects->paginate(9));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		if(auth()->user()->hasRole("super admin")){
			$companies = Company::all();
			$users = User::all();
		}else{
			//$companies = Company::where([['id', '=', auth()->user()->company_id]])->get();
			$companies = null;
			$users = Company::find(auth()->user()->company_id)->users;
		}
		
        return view('projects.create')->withCompanies($companies)->withUsers($users);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		try{
			$request->validate([
				'start' => 'date_format:Y-m-d|required',
				'end' => 'date_format:Y-m-d|required',
			]);

			$start = Carbon::createFromFormat('Y-m-d', $request->get('start'), 'Europe/Amsterdam')->timestamp;
			$end = Carbon::createFromFormat('Y-m-d', $request->get('end'), 'Europe/Amsterdam')->timestamp;
			
			$companyId = $request->get('company_id');

			if(($companyId==0 or $companyId== NULL) && auth()->user()->hasRole('super admin')){
				return redirect()->back()->withErrors("Company is required");
			}



			if($companyId == NULL)
				$companyId = auth()->user()->company_id;
			$responsibleUserId = $request->get('responsible');
			$projectTitle = $request->get('title');
			$projectDescription = $request->get('description');
			$projectType = $request->get('project_type');

			if(($responsibleUserId==0 or $responsibleUserId== NULL) && auth()->user()->hasRole('super admin')){
				return redirect()->back()->withErrors("Responsible user is required");
			}
			
			$data = [
				"name" => $projectTitle,
				"status" => "NOT STARTED YET",
				"responsible_user_id" => $responsibleUserId,
				"amount_of_hours" => 0,
				"description" => $projectDescription,
				"project_type" => $projectType,
				"created_by_user_id" => auth()->id(),
				"company_id" => $companyId,
				"started_at" => $request->get('start'),
				"deadline" => $request->get('end')
			];
			
			$project = Project::create($data);
			return redirect()->route('projects.show', [$project->id]);
		}catch (Exception $e) {
			Log::emergency($e->getCode());
			Log::emergency($e->getMessage());

			return redirect()->back()->withErrors("something went wrong, please contact support");
		}
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */

    public function show1(Project $project)
    {
		
		if(auth()->user()->company_id != $project->company_id && !auth()->user()->hasRole("super admin")){
			return view('errors.unauthorized');
		}
//        if (auth()->user()->hasRole('super user')) {
            $hours = Hour::where([['user_id','=',auth()->id()],['project_id', '=' ,$project->id]])->orderBy('start')->get();

            if (auth()->user()->hasRole('user')) {
            	$months = Month::where([['user_id','=',auth()->id()],['project_id', '=' ,$project->id]])->first();	
            }else{
            	$months = Month::where([['project_id', '=' ,$project->id]])->first();
            }

            if (auth()->user()->hasRole('user')) {
            	$attachments = Attachment::where([['user_id', '=', auth()->id()], ['project_id', '=', $project->id]])->get();
            }else{
            	$attachments = Attachment::where([['project_id', '=' ,$project->id]])->get();
            }
			
			

			if($attachments == NULL)
				$attachments = json_decode('{"months": {}}');
			else
				$attachments = $attachments;
           // print_r($attachments);exit;
			if($months == NULL)
				$months = json_decode('{"current_month":'. date('n') . ',"current_year":' . date('Y') . ',"days":{"months":[]}}');
			//echo "<pre>";
			//print_r($months);
			//echo "</pre>"; exit;
            return view('projects.show')->withProject($project)
										->withBookings($hours)
										->withMonths($months)
										->withAttachments($attachments);
//        }
    }

    public function show(Project $project)
    {
		
		if(auth()->user()->company_id != $project->company_id && !auth()->user()->hasRole("super admin")){
			return view('errors.unauthorized');
		}
//        if (auth()->user()->hasRole('super user')) {
            $hours = Hour::where([['user_id','=',auth()->id()],['project_id', '=' ,$project->id]])->orderBy('start')->get();

            if (auth()->user()->hasRole('user')) {
            	$months = Month::where([['user_id','=',auth()->id()],['project_id', '=' ,$project->id]])->get();	
            }else{
            	$months = Month::where([['project_id', '=' ,$project->id]])->get();
            }

            if (auth()->user()->hasRole('user')) {
            	$attachments = Attachment::where([['user_id', '=', auth()->id()], ['project_id', '=', $project->id]])->get();
            }else{
            	$attachments = Attachment::where([['project_id', '=' ,$project->id]])->get();
            }
			
			

			if($attachments == NULL)
				$attachments = json_decode('{"months": {}}');
			else
				$attachments = $attachments;
           // print_r($attachments);exit;
			// dd($months);
			if($months == NULL)
				$months = json_decode('{"current_month":'. date('n') . ',"current_year":' . date('Y') . ',"days":{"months":[]}}');
			//echo "<pre>";
			//print_r($months);
			//echo "</pre>"; exit;

			$company = Company::find($project->company_id);
            return view('projects.show')->withProject($project)
										->withBookings($hours)
										->withMonths($months)
										->withCompany($company)
										->withAttachments($attachments);
//        }
    }


    public function show_tasks($project,$month='',$year='')
    {
    	$project = Project::where([['id', '=' ,$project]])->first();
		if(auth()->user()->company_id != $project->company_id && !auth()->user()->hasRole("super admin")){
			return view('errors.unauthorized');
		}
//        if (auth()->user()->hasRole('super user')) {
            $hours = Hour::where([['user_id','=',auth()->id()],['project_id', '=' ,$project->id]])->orderBy('start')->get();

            if (auth()->user()->hasRole('user')) {
            	$months = Month::where([['user_id','=',auth()->id()],['project_id', '=' ,$project->id]])->get();	
            }else{
            	$months = Month::where([['project_id', '=' ,$project->id]])->get();
            }
			
			if (auth()->user()->hasRole('user')) {
            	$attachments = Attachment::where([['user_id', '=', auth()->id()], ['project_id', '=', $project->id]])->get();
            }else{
            	$attachments = Attachment::where([['project_id', '=' ,$project->id]])->get();
            }

			if($attachments == NULL)
				$attachments = json_decode('{"months": {}}');
			else
				$attachments = $attachments;
           // print_r($attachments);exit;
			if($months == NULL)
				$months = json_decode('{"current_month":'. date('n') . ',"current_year":' . date('Y') . ',"days":{"months":[]}}');
			//echo "<pre>";
			//print_r($months);
			//echo "</pre>"; exit;
            return view('projects.showtask')->withProject($project)
										->withBookings($hours)
										->withMonths($months)
										->withAttachments($attachments);
//        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        //

		return view('projects.edit')->withProject($project);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        $name = $request->get('name');
		$desc = $request->get('description');
		$status = $request->get('status');
		$end = $request->get('end');
		
		$project->update([
			"name" => $name,
			"description" => $desc,
			"status" => $status,
			"deadline" => $end
		]);
		
		return $this->show($project);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    	try{
    		$project = Project::find($id);
    		$project_owner=$project->created_by_user_id;
    		if(auth()->user()->hasRole('user')){
    			$user_id=auth()->user()->id;
    			if($project_owner==$user_id){
    				// delete
    				$project->delete();
    				// redirect
	        		return redirect()->back()->with('success', 'Project succesfully deleted.');
    			}else{
    				return redirect()->back()->with('error', 'You do not have permission.'); 
    			}
    			
    		}else{
    			
		        // delete
		        $project->delete();
		        // redirect
	        	return redirect()->back()->with('success', 'Project succesfully deleted.'); 
		         
    		}
	        
        }catch (Exception $e) {
        	return redirect()->back()->with('error', 'something went wrong, please contact support.');
		}
    }
	
	public function store2(Request $request)
    {
		try{
			$request->validate([
				'start' => 'date_format:Y-m-d|required',
				'end' => 'date_format:Y-m-d|required',
			]);

			$start = Carbon::createFromFormat('Y-m-d', $request->get('start'), 'Europe/Amsterdam')->timestamp;
			$end = Carbon::createFromFormat('Y-m-d', $request->get('end'), 'Europe/Amsterdam')->timestamp;
			
			$companyId = $request->get('company_id');
			if($companyId == NULL)
				$companyId = auth()->user()->company_id;
			$responsibleUserId = $request->get('responsible');
			$projectTitle = $request->get('title');
			$projectDescription = $request->get('description');
			
			$data = [
				"name" => $projectTitle,
				"status" => "NOT STARTED YET",
				"responsible_user_id" => $responsibleUserId,
				"amount_of_hours" => 0,
				"description" => $projectDescription,
				"created_by_user_id" => auth()->id(),
				"company_id" => $companyId,
				"started_at" => $request->get('start'),
				"deadline" => $request->get('end')
			];
			
			$project = Project::create($data);
			return redirect()->route('projects.show', [$project->id]);
		}catch (Exception $e) {
			Log::emergency($e->getCode());
			Log::emergency($e->getMessage());

			return redirect()->back()->withErrors("something went wrong, please contact support");
		}
        
    }

    public function project_filter($filter){
    	// dd($filter);
    	$projects = array();
    	if($filter=='in-progress'){
    		$filter='IN PROGRESS';
    		if(auth()->user()->hasRole('super user')){
    			$projects = Project::orderByDesc('id')->where('status',$filter)->where('company_id',auth()->user()->company->id)->get();
    		}else{
    			$projects = Project::orderByDesc('id')->where('status',$filter)->where('created_by_user_id',auth()->user()->id)->orWhere('responsible_user_id',auth()->user()->id)->get();
    		}
    		
    	}elseif($filter=='deadline'){
    		$filter='NEAREST DEADLINE';
    		$current_date= date('Y-m-d');
			$future_date=date('Y-m-d', strtotime("+30 day"));
			if(auth()->user()->hasRole('super user')){
	    		$projects = Project::orderByDesc('id')->where('company_id',auth()->user()->company->id)->whereBetween('deadline',[$current_date, $future_date])->get();
	    	}else{
	    		$projects = Project::orderByDesc('id')->whereBetween('deadline',[$current_date, $future_date])->where('created_by_user_id',auth()->user()->id)->orWhere('responsible_user_id',auth()->user()->id)->get();
	    	}
    	}else{
    		abort(404);
    	}

    	if($projects){
    		foreach ($projects as $key => $value) {
    			$responsibleUserDetail = User::where('id' , $value->responsible_user_id)->first();
    			if($responsibleUserDetail){
    				$projects[$key]->responsibleUser->fullname = (object) array('fullname' => $responsibleUserDetail->first_name." ".$responsibleUserDetail->last_name);
    			}else{
    				$projects[$key]->responsibleUser = (object) array('fullname' => '---');
    			}
    		}
    	}

    	return view('projects.project')->withProjects($projects->paginate(10))->with('filter',$filter);
    }
}
