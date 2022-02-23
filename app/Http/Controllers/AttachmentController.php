<?php

namespace App\Http\Controllers;

use App\Attachment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AttachmentController extends Controller
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
			if($request->hasFile('file')){
				$filename = $request->file('file')->getClientOriginalName();
				$path = $request->file('file')->store('attachments');
				$current_month = (int) $request->get('current_month');
				$current_year = (int) $request->get('current_year');
				$task = $request->get('task');
				$day = $request->get('day');
				$task_title = $request->get('task_title');
				$owner = $request->get('owner');
				$attachments = json_decode($request->get('data'), true);
				
				date_default_timezone_set('Europe/Amsterdam');
				$date_uploaded = date('m/d/Y h:i:s a', time());
				
				$curMonthStr = "" . $current_month . "/" . $current_year;
				if(!isset($attachments["months"][$curMonthStr])){
					$attachments["months"][$curMonthStr] = [ "files" => [] ];
				}
				
				array_push($attachments["months"][$curMonthStr]["files"], (object)[ "id" => "0", "filename" => $filename, "down_url" => $path, "date_uploaded" => $date_uploaded, 'task' => $task, 'day' => $day, 'task_title'=>$task_title , 'owner'=>$owner]);
				
				$data = [
					'user_id' 		=> auth()->id(),
					'project_id' 	=> $request->get('projectID'),
					'current_month' => $current_month,
					'current_year' 	=> $current_year,
					'data' 			=> json_encode($attachments)
				];
				
				Attachment::updateOrCreate(['user_id' => auth()->id(), 'project_id' => $request->get('projectID')], $data);
				
				return response()->json(['success' => 'File uploaded successfully!', 'data' => json_encode($attachments), 'url' => $path]);
			}else{
				return response()->json(['success' => 'No file submitted']);
			}
		}catch (Exception $ex){
			return response()->json(['success'=>'Unable to upload file!']);
		}
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Attachment  $attachment
     * @return \Illuminate\Http\Response
     */
    public function show(Attachment $attachment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Attachment  $attachment
     * @return \Illuminate\Http\Response
     */
    public function edit(Attachment $attachment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Attachment  $attachment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Attachment $attachment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Attachment  $attachment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Attachment $attachment)
    {
        //
    }
	
	public function download($id, $name)
	{
		$path = 'attachments\\' . $id;
		return Storage::download($path, $name);
	}
	
	public function delete(Request $request)
	{
		try{
			$id = $request->get('id');
			$toDelete = -1;
			
			$projectid = $request->get('project_id');
			
			$attachments = Attachment::where([['user_id', '=', auth()->id()], ['project_id', '=', $projectid]])->first()->data;
			$attachments = json_decode(json_encode($attachments), true);
			if(!empty($attachments["months"])){
				foreach($attachments["months"] as $month => $monthData){
					for($i = 0; $i < count($monthData["files"]); $i++){
						if(strcmp($monthData["files"][$i]["down_url"], $id) == 0){
							$toDelete = $i;
						}
					}
					if($toDelete != -1){
						\array_splice($monthData["files"],$toDelete,1);
						$attachments["months"][$month] = $monthData;
						Attachment::updateOrCreate(['user_id' => auth()->id(), 'project_id' => $projectid], ['data' => json_encode($attachments)]);
						Storage::delete($id);
						return response()->json(['success' => true, 'message' => 'Attachment deleted']);
					}
				}
			}
			
			
			if($toDelete == -1){
				return response()->json(['success' => false, 'message' => 'Unable to delete attachment, unknown error occurred']);
			}
			
			
		}catch (Exception $ex){
			return response()->json(['success' => false, 'message' => 'Unable to delete attachment']);
		}
	}
}
