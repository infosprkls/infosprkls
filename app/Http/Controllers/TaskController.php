<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TaskController extends Controller
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
		try{
			$company_id = $request->get('company_id');
			$title = $request->get('title');
			
			date_default_timezone_set('Europe/Amsterdam');
			$date_uploaded = date('m/d/Y h:i:s a', time());
			
			$data = [
				'created_by_user_id' 	=> auth()->id(),
				//'date_uploaded' 		=> $date_uploaded,
				'title' 				=> $title,
				'company_id' 			=> $company_id,
			];
			
			$task = Task::create($data);
			
			return response()->json(['success' => true
										, 'id' => $task->id
										, 'company_id' => $data['company_id']
										, 'title' => $title
										//, 'date_uploaded' => $date_uploaded
									]);
		}catch (Exception $ex){
			return response()->json(['success'=>false, 'msg' => 'Unable to add task!']);
		}
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        //
    }
	
	
	public function delete(Request $request)
	{
		try{
			$id = $request->get('id');
			
			$task = Task::find($id);
			$task->delete();
			return response()->json(['success' => true, 'message' => 'Task deleted']);
			
		}catch (Exception $ex){
			return response()->json(['success' => false, 'message' => 'Unable to delete Task']);
		}
	}
}
