<?php

namespace App\Http\Controllers;

use App\Companyattachment;
use App\companyAttachmentsPdf;
use App\Company;
use App\Pdf;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Jobs\downloadWaiting;

class CompanyattachmentController extends Controller
{
    public function __construct()
    {
      $this->middleware('isaccept');
        $this->middleware(function ($request, $next) {      
            if(auth()->user()->hasRole('user')){
                return redirect()->route('home')->withFlashMessage('You are not authorized to access that page.')->withFlashType('warning');
            }
            return $next($request);
        });
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id=NULL)
    {
        $companyinfo=Company::where('id',$id)->first();
        $tags=Tag::all();
        $companies = Company::all();
        if (auth()->user()->hasRole('super admin')){
          if($id!=NULL){
            $attachments = Companyattachment::where('company_id',$id)->orderBy('uploaded_date', 'DESC')->paginate(10);
          }else{
            $attachments = Companyattachment::orderBy('uploaded_date', 'DESC')->paginate(10);
          }

          foreach ($attachments as $key => $value) {
            $file = companyAttachmentsPdf::where('ref_id',$value->id)->where('type','Attachment')->first();
            $file?($attachments[$key]->file = $file->file):($attachments[$key]->file = NULL);
          }
            
        }elseif (auth()->user()->hasRole('super user')){
          $attachments = companyAttachmentsPdf::where('company_id',auth()->user()->company_id)->where('status','Approved')->orderBy('updated_at', 'DESC')->paginate(10);

          foreach ($attachments as $key => $value) {
            if($value->type=='Attachment'){
              $detail = Companyattachment::where('id',$value->ref_id)->first();
              $detail?($attachments[$key]->title=$detail->title):($attachments[$key]->title=NULL);
              $detail?($attachments[$key]->tags=$detail->tags):($attachments[$key]->tags=NULL);
              $detail?($attachments[$key]->uploaded_date=$detail->uploaded_date):($attachments[$key]->uploaded_date=NULL);
            }else{
              if(!isset($value->Pdf->service)){
                dd($value);
              }
              $attachments[$key]->name = 'Beschikking-'.strtoupper($value->Pdf->service).'-'.$this->humanDateRanges($value->Pdf->start_date, $value->Pdf->end_date).'.zip';
              $attachments[$key]->uploaded_date = date("Y-m-d", strtotime($value->updated_at));
            }
          }


          // $attachments = Companyattachment::where('company_id',auth()->user()->company->id)->orderBy('uploaded_date', 'DESC')->paginate(10);
          // dd($attachments[1]);

        }

        if(!$attachments && !$companyinfo){
          abort(404);
        }

		


        return view('attachments.index')->withCompanies($companies)
            ->withAttachments($attachments)
            ->withTags($tags)
            ->withCompanyinfo($companyinfo);
    }


    public function get_company_documents($id=NULL)
    {

        // if (auth()->user()->hasRole('super admin')){
        //   if($id!=NULL){
        //     $attachments = Companyattachment::where('company_id',$id)->orderBy('uploaded_date', 'DESC')->paginate(10);
        //   }else{
        //     $attachments = Companyattachment::orderBy('uploaded_date', 'DESC')->paginate(10);
        //   }

        //   foreach ($attachments as $key => $value) {
        //     $file = companyAttachmentsPdf::where('ref_id',$value->id)->where('type','Attachment')->first();
        //     $file?($attachments[$key]->file = $file->file):($attachments[$key]->file = NULL);
        //   }
            
        // }else
        if (auth()->user()->hasRole('super user')){
          $attachments = companyAttachmentsPdf::where('company_id',auth()->user()->company_id)->where('status','Approved')->orderBy('updated_at', 'DESC')->get();

          foreach ($attachments as $key => $value) {
            if($value->type=='Attachment'){
              $detail = Companyattachment::where('id',$value->ref_id)->first();
              $detail?($attachments[$key]->title=$detail->title):($attachments[$key]->title=NULL);
              $detail?($attachments[$key]->tags=$detail->tags):($attachments[$key]->tags=NULL);
              $detail?($attachments[$key]->uploaded_date=$detail->uploaded_date):($attachments[$key]->uploaded_date=NULL);
            }else{
              $attachments[$key]->name = 'Beschikking-'.strtoupper($value->Pdf->service).'-'.$this->humanDateRanges($value->Pdf->start_date, $value->Pdf->end_date).'.zip';
              $attachments[$key]->uploaded_date = date("Y-m-d", strtotime($value->updated_at));
            }












            
            // $detail = Companyattachment::where('id',$value->ref_id)->first();
            // $detail?($attachments[$key]->tags=$detail->tags):($attachments[$key]->tags=NULL);
            $attachments[$key]->companyName = $value->company->name;

            
            $allTagsName = "";
            if($value->tags){
              $decodedTags = json_decode($value->tags);
              foreach ($decodedTags as $key_t => $value_t) {
                $tagDetail = Tag::find($value_t);
                if($tagDetail){
                  if($allTagsName!=""){
                    $allTagsName .= ", ";
                  }
                  $allTagsName .= $tagDetail->title;
                }
              }
            }
            $attachments[$key]->allTagsName = $allTagsName;
          }
        }

        if(!$attachments){
          abort(404);
        }
        echo json_encode(array('documents'=>$attachments));exit;
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
        $data = $request->validate([
          'title' => 'required',
          'file-upload' => 'sometimes|mimes:jpeg,png,svg,pdf,doc,docx',
          'company_id' => 'required',
          'uploaded_date' => 'required',
          'tags' => 'required',
        ]);

        if ($request->hasFile('file-upload')){
          $file = $request->file('file-upload');

          $file_name=$file->getClientOriginalName();

          $file_ext=$file->getClientOriginalExtension();

          $destinationPath = 'attachments';
          $filename_minus_extension = pathinfo($file_name, PATHINFO_FILENAME);
          $extension = '.'.pathinfo($file_name, PATHINFO_EXTENSION);
          $file_name = $this->checkFile('attachments/', $filename_minus_extension, $extension, "");
          $file_name =str_replace("attachments/","",$file_name);
          $request->file('file-upload')->storeAs($destinationPath, $file_name);
          

          $allTags = $request->tags;
          if(auth()->user()->hasRole('super admin')){
            foreach ($allTags as $key => $value) {
                if(!(int) $value){
                    $data = [
                        "title" => $value
                    ];
                    $tag = Tag::create($data);
                    $allTags[$key] = (string) $tag->id;
                }
            }
            $tags=json_encode($allTags);

            // $tags=json_encode($request->tags);
            $data = [
                "title" => $request->title,
                "company_id" => $request->company_id,
                "uploaded_date" => date('Y-m-d', strtotime($request->uploaded_date)),
                "tags" => $tags,
                // "file" => $file_name
                ];
                
            $attachments = Companyattachment::create($data);
            if($attachments){
              $data = [
                "ref_id" => $attachments->id,
                "company_id" => $request->company_id,
                "file" => $file_name,
                "type" => 'Attachment'
                ];
                
              companyAttachmentsPdf::create($data);
              downloadWaiting::dispatch($request->company_id)->delay(now()->addSeconds(1));
            }
            


          }
          return redirect(route('company-documents',$request->company_id))->withStatus(__("The attachment has succesfully been Added"));
      }else{
        return redirect(route('company-documents',$request->company_id))->withErrors(__("Fill all fields."));
      }
        

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Companyattachment  $companyattachment
     * @return \Illuminate\Http\Response
     */
    public function show(Companyattachment $companyattachment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Companyattachment  $companyattachment
     * @return \Illuminate\Http\Response
     */
    public function edit(Companyattachment $companyattachment)
    {
        $tags=Tag::all();
        $companies = Company::all();
        $attachment = Companyattachment::find($companyattachment->id);
        if(empty($attachment)){
			abort(404);
		}
        $companyinfo=Company::where('id',$attachment->company_id)->first();
          $file = companyAttachmentsPdf::where('ref_id',$companyattachment->id)->where('type','Attachment')->first();
            $file?($attachment->file = $file->file):($attachment->file = NULL);
		
        return view('attachments.edit')->withCompanies($companies)
            ->withAttachment($attachment)
            ->withCompanyinfo($companyinfo)
            ->withTags($tags);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Companyattachment  $companyattachment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Companyattachment $companyattachment)
    {
      $companyAttachmentsPdf  = companyAttachmentsPdf::where('ref_id' , $companyattachment->id)->where('type' , 'Attachment')->first();
      $file_name=$companyAttachmentsPdf->file;
      companyAttachmentsPdf::where('ref_id' , $companyattachment->id)->where('type' , 'Attachment')->delete();
      $file = $request->file('file-upload');
      if(!empty($file)){
          $file_name=$file->getClientOriginalName();
          $file_ext=$file->getClientOriginalExtension();
          $destinationPath = 'attachments';
          $filename_minus_extension = pathinfo($file_name, PATHINFO_FILENAME);
          $extension = '.'.pathinfo($file_name, PATHINFO_EXTENSION);
          $file_name = $this->checkFile('attachments/', $filename_minus_extension, $extension, "");
          $file_name =str_replace("attachments/","",$file_name);
          $request->file('file-upload')->storeAs($destinationPath, $file_name);
      }
	  
      $allTags = $request->tags;
      if(auth()->user()->hasRole('super admin')){
        foreach ($allTags as $key => $value) {
            if(!(int) $value){
                $data = [
                    "title" => $value
                ];
                $tag = Tag::create($data);
                $allTags[$key] = (string) $tag->id;
            }
        }
        $tags=json_encode($allTags);
        $data = [
            "title" => $request->title,
            "company_id" => $request->company_id,
            "uploaded_date" => date('Y-m-d', strtotime($request->uploaded_date)),
            "tags" => $tags,
            // "file" => $file_name
            ];

        Companyattachment::where('id', $companyattachment->id)
          ->update($data);
          $data = [
          "ref_id" => $companyattachment->id,
          "company_id" => $request->company_id,
          "file" => $file_name,
          "type" => 'Attachment'
          ];
          companyAttachmentsPdf::create($data);
          downloadWaiting::dispatch($request->company_id)->delay(now()->addSeconds(1));
      }
        
      return redirect(route('company-documents' , $request->company_id))->withStatus(__("The attachment has succesfully been Added"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Companyattachment  $companyattachment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Companyattachment $companyattachment)
    {
        
      if(auth()->user()->hasRole('super admin')){
        $companyattachments = Companyattachment::find($companyattachment->id);
        if($companyattachments){
          companyAttachmentsPdf::where('ref_id' , $companyattachment->id)->where('type' , 'Attachment')->delete();
          Companyattachment::destroy($companyattachments->id);
          return back()->withStatus(__("Record succesfully deleted."));
        }else{
            return back()->withErrors(__("Something went wrong."));
        }
      }else{
          return back()->withErrors(__("You do not have the required permissions to complete this action."));
      }
    }

    public function checkFile($path, $file, $ext, $number)
    {
        $fullpath=storage_path().'/app/public/'.$path;
        if(file_exists($fullpath.$file.$number.$ext))
        {
            if($number == "")
                $number = 0;

            $number ++;
            return $this->checkFile($path, $file, $ext, $number);
        }

        return $path.$file.$number.$ext;
    }
}
