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
use Illuminate\Support\Facades\DB;
use DateTime;
use App\Usersearch;
use App\Pdf;
use App\companyAttachmentsPdf;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('details');
		$this->middleware('verified');
		$this->middleware('isaccept');
        //$this->middleware('companyActive');

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(){
    	$usersearch = Usersearch::where('user_id',auth()->id())->first();
		if(auth()->user()->hasRole('user')){			
			$user = User::find(auth()->id());
			$projects = Project::orderByDesc('id')->where('created_by_user_id',auth()->user()->id)->orWhere('responsible_user_id',auth()->user()->id)->get();
			$usertasks = Project::orderByDesc('id')->where('created_by_user_id',auth()->user()->id)->get();
			$projectsCount = count($projects);
			$hoursCount = $this->calculateHours($projects);
			$tasksCount = $this->calculateTasks($projects);
			$tasks = $this->OpenTasks($usertasks);

			$counter = 1;
			return view('dashboard-user')->withProjectsCount($projectsCount)
											->withHoursCount($hoursCount)
											->withTasksCount($tasksCount)
											->withUser($user)
											->withTasks($tasks)
											->withCounter($counter)
											->withUsersearch($usersearch);
			//return redirect()->route('profile.index');
		}else if(auth()->user()->hasRole('super user')){
			// $company = Company::find(auth()->user()->company_id);
			// $users = $company->users;
			// $projects = $company->projects;
			// $downloads = $company->downloads->reverse();


			// // $pdfs = companyAttachmentsPdf::where('company_id' , auth()->user()->company_id)->where('type' , 'Pdf')->get();
			// $pdfs = Pdf::where('company_id' , auth()->user()->company_id)
			// ->whereHas('companyAttachmentsPdf' , function($subQuery2sub) {
	  //           $subQuery2sub->where('status','Approved');
	  //       })

			// ->get();
			// foreach ($pdfs as $key => $value) {
			// 	if($value->companyAttachmentsPdf){
			// 		$pdfs[$key]->name = 'Beschikking-'.strtoupper($value->service).'-'.$this->humanDateRanges($value->start_date, $value->end_date).'.zip';
			// 		$pdfs[$key]->file = $value->companyAttachmentsPdf->file;
			// 	}
			// }

			// // dd($pdfs);

			// $usersCount = count($users);
			// $projectsCount = count($projects);
			// $hoursCount = $this->calculateHours($projects);
			// $tasksCount = $this->calculateTasks($projects);
			// $tasks = $this->OpenTasks($projects);
			
			// $user = User::find(auth()->id());
			
			// $counter = 1;
			// return view('dashboard-super-user')->withUsersCount($usersCount)
			// 								->withProjectsCount($projectsCount)
			// 								->withHoursCount($hoursCount)
			// 								->withTasksCount($tasksCount)
			// 								->withUser($user)
			// 								->withDownloads($downloads)
			// 								->withPdfs($pdfs)
			// 								->withTasks($tasks)
			// 								->withCounter($counter)
			// 								->withUsersearch($usersearch);

			return view('dashboard-super-admin');
		}else if(auth()->user()->hasRole('ai support')){
			$companies = Company::all();
			
			return view('dashboard-ai-support')->withCompanies($companies);
		}else if(auth()->user()->hasRole('super admin')){
			// $xmls = $pdfs = Pdf::where('service' , 'wbso')->where('wbso_type' , 'performa')->get();



			// foreach ($xmls as $key => $xml) {
			// 	$xmls[$key]->xmlName = $xml->company->name."-PROFORMA-".date('j F, Y', strtotime($xml->created_at)).".xml";
			// }

			// // dd($xmls);

			// return view('dashboard-super-admin')->withXmls($xmls);
			return view('dashboard-super-admin');
		}else if(auth()->user()->hasRole('employee')){
			return view('dashboard-super-admin');
		}
    }

    public function dashboard2(){
    	if (auth()->user() !== null && auth()->user()->hasRole('super admin')){
    		return view('dashboard2');
    	}
    }

    public function humanDateRanges($start, $end){
        $startTime=strtotime($start);
        $endTime=strtotime($end);

        $final_date = "";
        if(date('Y',$startTime)!=date('Y',$endTime)){
            $final_date =  date('j F, Y',$startTime) . " - " . date('j F, Y',$endTime);
        }else{
            if((date('j',$startTime)==1)&&(date('j',$endTime)==date('t',$endTime))){
                $final_date =  date('j F',$startTime) . " - " . date('j F, Y',$endTime);
            }else{
                if(date('m',$startTime)!=date('m',$endTime)){
                    $final_date =  date('j F',$startTime) . " - " . date('j F, Y',$endTime);
                }else{
                    $final_date =  date('j F',$startTime) . " - " . date('j, Y',$endTime);
                }
            }
        }

        return $final_date;
    }
	
	private function calculateHours($projects){
		$ret = 0;
		foreach($projects as $project)
			$ret += $project->hours;
			
		return $ret;
	}
	private function calculateTasks($projects){
		$ret = 0;
		foreach($projects as $project)
			$ret += count($project->tasks);
			
		return $ret;
	}
	private function OpenTasks($projects){
		$tasks = [];
		foreach($projects as $project){
			if(!empty($project->tasks)){
				foreach ($project->tasks as $key => $task) {
					$task->project=$project->name;
					$task->project_id=$project->id;
					array_push($tasks,$task);
				}
				
			}
		}
		$tasks=array_reverse($tasks);
		return $tasks;
	}

	public function get_total_hours(Request $request){
		$startdate=$request->startdate;
		$enddate=$request->enddate;
		$ret=0;
		if(auth()->user()->hasRole('user')){
			$user = User::find(auth()->id());
			$projects = Project::orderByDesc('id')->where('created_by_user_id',auth()->user()->id)->orWhere('responsible_user_id',auth()->user()->id)->get();
			foreach($projects as $key => $project){
				$ret += $this->calculateHoursByRange($project,$startdate,$enddate);
			}
			
		}else if(auth()->user()->hasRole('super user')){
			$company = Company::find(auth()->user()->company_id);
			$projects = $company->projects;
			// dd($projects);
			foreach($projects as $key => $project){
				$hours = $this->calculateHoursByRange($project,$startdate,$enddate);
				// echo $hours."<br>";
				// if($hours==2323){
				// 	dd($project);
				// }
				$ret = $ret + $hours;
				// exit;
			}
			// dd($projects);
			// exit;
		}

		$date_range=$startdate.' ~ '.$enddate;
		$data = [
            'user_id' => auth()->id(),
            'total_hours' => $ret,
            'date_range' => $date_range
        ];
		Usersearch::updateOrCreate(['user_id' => auth()->id()],$data);

		return $ret;
	}

	public function calculateHoursByRange($project,$startdate,$enddate){	

		// $orgstartdate=$this->getMyDate($startdate);
		// $orgenddate=$this->getMyDate($enddate);

		$startdate=explode('-', $startdate);
		$startd=$startdate[2];
		$startm=$startdate[1];
		$starty=$startdate[0];

		$startmy=$starty.'-'.$startm;
		$startmyd=$starty.'-'.$startm.''.$startd;


		$enddate=explode('-', $enddate);
		$endd=$enddate[2];
		$endm=$enddate[1];
		$endy=$enddate[0];

		$endmy=$enddate[1].'/'.$enddate[0];
		$endmy=$endy.'-'.$endm;
		$endmyd=$endy.'-'.$endm.''.$endd;



		if(auth()->user()->hasRole('user')){
			$months = DB::table('months')
            ->where('project_id', $project->id)
            ->where('user_id', auth()->user()->id)
            ->get();
		}else{
			$months = DB::table('months')
            ->where('project_id', $project->id)
            ->get();
		}



		$ret=0;
		
		if(count($months)>0){
			foreach($months as $key => $eachMonth){
				foreach(json_decode($eachMonth->days)->months as $month => $monthData){

					$checkMonth 		= strtotime(explode("/", $month)[1]."-".explode("/", $month)[0].'-01');
					$checkStartMonth 	= strtotime($startmy."-01");
					$checkEndMonth 		= strtotime($endmy."-01");
					// dd(explode("/", $month)[1]."-".explode("/", $month)[0].'-01' , $startmy."-01" , $endmy."-01");
					
					if($checkMonth>=$checkStartMonth && $checkMonth<=$checkEndMonth){
						// dd(explode("/", $month)[1]."-".explode("/", $month)[0].'-01',$startmy."-01",$endmy."-01",$checkMonth,$checkStartMonth,$checkEndMonth,$project);
						// if($month=='10/2020'){
						// 	dd($ret,$month,$monthData);
						// }

						foreach($monthData->tasks as $key_p => $task){

							foreach($task->days as $key_c => $day){
								if ($startd<=($key_c+1) && $endd>=($key_c+1)) {
									// echo $day."<br>";
									// $cd=$this->getMyDate(($key_c+1).'/'.$month);
									// if($cd>=$orgstartdate && $cd<=$orgenddate){
										$ret = $ret + $day;
									// }
								}
							}
							
						}
					}
				}
			}		
		}
		// dd($ret);
		// echo $ret;
		// exit;
		return $ret;
	}

	// public function getMyDate($dateString)
	// {
	//     // $newdateString = str_replace('/', '-', $dateString);
	//     // $date = new DateTime($newdateString);
	//     // dd(strtotime(date("d-m-Y", strtotime($dateString))),strtotime($date->format('d-m-Y')),strtotime($dateString));
	//     return strtotime($dateString);
	// }


	public function view_tasks($param){
		if($param!='current' && $param!='all'){
			abort(404);
		}
		if($param=='current'){
			$month=date('m/Y');
		}else{
			$month='';
		}
		
		$tasks = [];
		if(auth()->user()->hasRole('user')){		
			$user = User::find(auth()->id());
			$projects = Project::orderByDesc('id')->where('created_by_user_id',auth()->user()->id)->orWhere('responsible_user_id',auth()->user()->id)->get();
			foreach($projects as $project){
				$tasks = $this->calculate_current_month_tasks($project,$month,$tasks);
			}
			return view('projects.tasks')->withTasks($tasks);
			
		}else if(auth()->user()->hasRole('super user')){
			$company = Company::find(auth()->user()->company_id);
			$projects = $company->projects;
			foreach($projects as $project){
				$tasks= $this->calculate_current_month_tasks($project,$month,$tasks);
				
			}
			return view('projects.tasks')->withTasks($tasks);
		
		}
	}


	public function calculate_current_month_tasks($project,$cmonth,$tasks){
		if(auth()->user()->hasRole('user')){
				$months = DB::table('months')
	            ->where('project_id', $project->id)
	            ->where('user_id', auth()->user()->id)
	            ->get();
			}else{
				$months = DB::table('months')
	            ->where('project_id', $project->id)
	            ->get();
			}
		if(!empty($months)){
			foreach($months as $eachMonth){
				foreach(json_decode($eachMonth->days)->months as $month => $monthData){
					$monthNum  = explode('/', $month);
					$dateObj   = DateTime::createFromFormat('!m', $monthNum[0]);
					$monthName = $dateObj->format('M');
					$date = $monthName.', '.$monthNum[1];
					if($cmonth!='' && $month==$cmonth){
						foreach($monthData->tasks as $task){
							$task->project_id= $project->id;
							$task->project_name= Project::find($project->id)->name;
							$task->date= $month;
							$task->dateformat= $date;
							$task->user_id = (isset(User::find($eachMonth->user_id)->firstname)?User::find($eachMonth->user_id)->firstname:'').' '.(isset(User::find($eachMonth->user_id)->lastname)?User::find($eachMonth->user_id)->lastname:'');
							array_push($tasks, $task);
						}
					}else{
						foreach($monthData->tasks as $task){
							$task->project_id= $project->id;
							$task->project_name= Project::find($project->id)->name;
							$task->date= $month;
							$task->dateformat= $date;
							$task->user_id = (isset(User::find($eachMonth->user_id)->firstname)?User::find($eachMonth->user_id)->firstname:'').' '.(isset(User::find($eachMonth->user_id)->lastname)?User::find($eachMonth->user_id)->lastname:'');
							array_push($tasks, $task);
						}
					}
					
				}
				
			}
			$tasks=array_reverse($tasks);
			return $tasks;
							
		}else{
			return false;
		}
	}

	public function get_user_record(Request $request){
		if(auth()->user()->hasRole('super admin')){
			$user=User::findOrFail($request->userid);
			return $user;
		}
	}

	public function get_company_record(Request $request){
		if(auth()->user()->hasRole('super admin')){
			$companies=Company::findOrFail($request->companyId);
			return $companies;
		}
	}

	public function get_super_admin_dashboard_record(Request $request){
		if(auth()->user()->hasRole('super admin') || auth()->user()->hasRole('employee')){
			$countClients = array();
			$lastWeekCompanies = 0;
			$showCompanies = true;
			$startdate = date('Y-m-d', strtotime("last monday -7 days"));
			$enddate = date('Y-m-d', strtotime("last monday"));


			$allProjects = Pdf::whereDate('created_at' , '>=' , $startdate)
			->whereDate('created_at' , '<=' , $enddate);

			if(auth()->user()->hasRole('employee') && auth()->user()->company_id!=1){
				$allProjects->whereDate('company_id' , auth()->user()->company_id);
				$showCompanies = false;
			}else{
				$lastWeekCompanies = Company::whereDate('created_at' , '>=' , $startdate)->whereDate('created_at' , '<=' , $enddate)->where('deleted_at',NULL)->count();
			}
			$allProjects = $allProjects->get();

			$hours = 0;
			foreach($allProjects as $key => $allProj){
				$hours = $hours + (int) $allProj->total_hours;
				if(!in_array($allProj->user_id, $countClients)){
					$countClients[] = $allProj->user_id;
				}
			}


			
			$totalCompanies = Company::where('deleted_at',NULL)->count();

			echo json_encode(array('hours'=>$hours,'totalProjects'=>count($allProjects),'totalClients'=>count($countClients),'lastWeekCompanies'=>$lastWeekCompanies,'showCompanies'=>$showCompanies,'totalCompanies'=>$totalCompanies));
			exit;
		}else if(auth()->user()->hasRole('super user')){
			$usersearch = Usersearch::where('user_id',auth()->id())->first();
			$company = Company::find(auth()->user()->company_id);
			$users = $company->users;
			$projects = $company->projects;
			$downloads = $company->downloads->reverse();


			// $pdfs = companyAttachmentsPdf::where('company_id' , auth()->user()->company_id)->where('type' , 'Pdf')->get();
			$pdfs = Pdf::where('company_id' , auth()->user()->company_id)
			->whereHas('companyAttachmentsPdf' , function($subQuery2sub) {
	            $subQuery2sub->where('status','Approved');
	        })

			->get();
			foreach ($pdfs as $key => $value) {
				if($value->companyAttachmentsPdf){
					$pdfs[$key]->name = 'Beschikking-'.strtoupper($value->service).'-'.$this->humanDateRanges($value->start_date, $value->end_date).'.zip';
					$pdfs[$key]->file = $value->companyAttachmentsPdf->file;
				}
			}

			// dd($pdfs);

			$usersCount = count($users);
			$projectsCount = count($projects);
			$hoursCount = $this->calculateHours($projects);
			$tasksCount = $this->calculateTasks($projects);
			$tasks = $this->OpenTasks($projects);
			
			// $user = User::find(auth()->id());
			
			$counter = 1;
			// return view('dashboard-super-user')->withUsersCount($usersCount)
			// 								->withProjectsCount($projectsCount)
			// 								->withHoursCount($hoursCount)
			// 								->withTasksCount($tasksCount)
			// 								->withUser($user)
			// 								->withDownloads($downloads)
			// 								->withPdfs($pdfs)
			// 								->withTasks($tasks)
			// 								->withCounter($counter)
			// 								->withUsersearch($usersearch);



			echo json_encode(array('usersCount'=>$usersCount,'projectsCount'=>$projectsCount,'hoursCount'=>$hoursCount,'tasksCount'=>$tasksCount,'downloads'=>$downloads,'pdfs'=>$pdfs,'tasks'=>$tasks,'counter'=>$counter,'usersearch'=>$usersearch,'usersearch'=>$usersearch,'companyLogo'=>auth()->user()->company->logo));
			exit;

		}
	}
}