<?php

namespace App\Http\Controllers;

use App\Download;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DownloadController extends Controller
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
				$path = $request->file('file')->store('downloads');
				$company_id = $request->get('company_id');
				
				date_default_timezone_set('Europe/Amsterdam');
				$date_uploaded = date('m/d/Y h:i:s a', time());
				

				$data = [
					'uploaded_by_user_id' 	=> auth()->id(),
					'path' 					=> $path,
					'date_uploaded' 		=> $date_uploaded,
					'title' 				=> $filename,
					'company_id' 			=> $company_id,
				];
				
				$download = Download::create($data);
				
				return response()->json(['success' => true
											, 'id' => $download->id
											, 'company_id' => $data['company_id']
											, 'filename' => $filename
											, 'path' => $path
											, 'date_uploaded' => $date_uploaded
										]);
			}else{
				return response()->json(['success' => false, 'msg' => 'Please select a file first!']);
			}
		}catch (Exception $ex){
			return response()->json(['success'=>false, 'msg' => 'Unable to upload file!']);
		}
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Download  $attachment
     * @return \Illuminate\Http\Response
     */
    public function show(Download $attachment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Download  $attachment
     * @return \Illuminate\Http\Response
     */
    public function edit(Download $attachment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Download  $attachment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Download $attachment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Download  $attachment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Download $attachment)
    {
        //
    }
	
	public function download($id, $name)
	{
		$path = 'downloads\\' . $id;
		return Storage::download($path, $name);
	}
	
	public function delete(Request $request)
	{
		try{
			$id = $request->get('id');
			
			$download = Download::find($id);
			Storage::delete($download->path);
			$download->delete();
			return response()->json(['success' => true, 'message' => 'Download deleted']);
			
		}catch (Exception $ex){
			return response()->json(['success' => false, 'message' => 'Unable to delete attachment']);
		}
	}
}
