<?php

namespace App\Http\Controllers;

use App\Month;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class MonthController extends Controller
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (auth()->user()->hasRole('super admin') || auth()->user()->hasAccessToProject($request->get('projectID'))) {
            if ($request->get('sheet') == true) {
                try {
					$days = [];
					$tasks = $request->get('task-title');
					for($i=0; $i<count($tasks); $i++){
						$task = [];
						$task["title"] = $tasks[$i];
						$task["days"] = [ $request->get('day-1')[$i], $request->get('day-2')[$i], $request->get('day-3')[$i], 
							$request->get('day-4')[$i], $request->get('day-5')[$i], $request->get('day-6')[$i], 
							$request->get('day-7')[$i], $request->get('day-8')[$i], $request->get('day-9')[$i], 
							$request->get('day-10')[$i], $request->get('day-11')[$i], $request->get('day-12')[$i], 
							$request->get('day-13')[$i], $request->get('day-14')[$i], $request->get('day-15')[$i], 
							$request->get('day-16')[$i], $request->get('day-17')[$i], $request->get('day-18')[$i], 
							$request->get('day-19')[$i], $request->get('day-20')[$i], $request->get('day-21')[$i], 
							$request->get('day-22')[$i], $request->get('day-23')[$i], $request->get('day-24')[$i], 
							$request->get('day-25')[$i], $request->get('day-26')[$i], $request->get('day-27')[$i], 
							$request->get('day-28')[$i], $request->get('day-29')[$i], $request->get('day-30')[$i], $request->get('day-31')[$i]
						];
						array_push($days, $task);
					}
                    
                    $data = [
                        'user_id' => auth()->id(),
                        'project_id' => $request->get('projectID'),
                        'title' => $request->get('title'),
						'days' => $days
                    ];
					if($request->has('monthID')){
						Month::updateOrCreate(['id' => $request->get('monthID')], $data);
					}else{
						Month::create($data);
					}
                    return redirect()->back();
                } catch (Exception $e) {
                    Log::emergency($e->getCode());
                    Log::emergency($e->getMessage());

                    return redirect()->back()->withErrors("something went wrong, please contact support");
                }
            }else if($request->get('json') == true){
				try{
                    $jsonData = $request->get('jsonData');

					$jsonDecodedData = json_decode($request->get('jsonData'));
                    // dd($jsonDecodedData);
                    
                    $insertedArray = array();
                    $finalInsertedArray = array();
                    foreach ($jsonDecodedData->months as $key_jd => $value_jd) {
                        $insertedArray[$key_jd] = $value_jd;
                        $usersArray = array();
                        foreach ($value_jd->tasks as $key_t => $value_t) {
                            $indexUserId = isset($value_t->user_id)?$value_t->user_id:auth()->id();
                            $usersArray[$indexUserId][] = $value_t;
                        }

                        $insertedArray[$key_jd]->tasks = $usersArray;
                    }

                    
                    

                    foreach ($insertedArray as $key_f => $value_f) {
                        foreach ($value_f->tasks as $keyf => $valuef) {
                            $finalInsertedArray[$keyf][$key_f] = (object) ["title"=>$value_f->title,"month"=>$value_f->month,"year"=>$value_f->year,"tasks"=>$valuef];
                        }
                    }

                    


                    

                    $deleteAll = false;
                    $deleteAllProjects = "";
                    if($request->get('userId')){
                        $deleteAllProjects = $request->get('userId');
                        $deleteAll = true;
                    }


                    foreach ($finalInsertedArray as $key_doinsert => $value_doinsert) {


                        $finalDataForInsertion = (object) ["months"=>(object) $value_doinsert];
                        // dd($key_doinsert,$finalDataForInsertion);

                        // dd($finalDataForInsertion);

                        if($deleteAllProjects==$key_doinsert){
                            $deleteAll = false;
                        }

                        $data = [
                            'user_id'       => $key_doinsert,
                            'project_id'    => $request->get('projectID'),
                            'current_month' => $request->get('curMonth'),
                            'current_year'  => $request->get('curYear'),
                            'days'          => json_encode($finalDataForInsertion)
                        ];
                        
                        Month::updateOrCreate(['user_id' => $key_doinsert, 'project_id' => $request->get('projectID')], $data);
                    }


                    if($deleteAll==true && $deleteAllProjects!=""){
                        // dd($deleteAll,$deleteAllProjects);
                        Month::where(['user_id' => $deleteAllProjects, 'project_id' => $request->get('projectID')])->delete();
                    }
                    
                    // dd($finalInsertedArray);
					
					
					
					return response()->json(['success'=>'Data saved successfully!']);
				}catch(Exception $ex){
					return response()->json(['success'=> 'Unknown error occurred!']);
				}
			}
        } else {
            Log::emergency('People are messing around with project id\'s ');
            Log::emergency('User id of user messing around: ' . auth()->id());
            return redirect()->back()->withErrors("That was not supposed to happen. Please contact the administrator if you feel like this was an accident");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Month  $month
     * @return \Illuminate\Http\Response
     */
    public function show(Month $month)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Month  $month
     * @return \Illuminate\Http\Response
     */
    public function edit(Month $month)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Month  $month
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Month $month)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Month  $month
     * @return \Illuminate\Http\Response
     */
    public function destroy(Month $month)
    {
        $month->delete();
		return back();
    }
}
