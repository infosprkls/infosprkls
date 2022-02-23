<?php

namespace App\Http\Controllers;

use App\Invoice;
use App\Company;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class InvoiceController extends Controller
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
            $invoices = Invoice::where('company_id',$id)->orderBy('uploaded_date', 'DESC')->paginate(10);
          }else{
            $invoices = Invoice::orderBy('uploaded_date', 'DESC')->paginate(10);
          }
        }elseif (auth()->user()->hasRole('super user')){
            $invoices = Invoice::where('company_id',auth()->user()->company->id)->orderBy('uploaded_date', 'DESC')->paginate(10);
        }

        if(!$invoices || !$companyinfo){
          abort(404);
        }
        return view('invoices.index')->withCompanies($companies)
            ->withInvoices($invoices)
            ->withTags($tags)
            ->withCompanyinfo($companyinfo);
    }

    public function get_company_invoice($id=NULL)
    {
        // if (auth()->user()->hasRole('super admin')){
        //   if($id!=NULL){
        //     $invoices = Invoice::where('company_id',$id)->orderBy('uploaded_date', 'DESC')->get();
        //   }else{
        //     $invoices = Invoice::orderBy('uploaded_date', 'DESC')->get();
        //   }
        // }else
        if (auth()->user()->hasRole('super user')){
            $invoices = Invoice::where('company_id',auth()->user()->company->id)->orderBy('uploaded_date', 'DESC')->get();

            foreach ($invoices as $key => $value) {
              $invoices[$key]->companyName = $value->company->name;

              $decodedTags = json_decode($value->tags);
              $allTagsName = "";
              foreach ($decodedTags as $key_t => $value_t) {
                $tagDetail = Tag::find($value_t);

                if($tagDetail){
                  if($allTagsName!=""){
                    $allTagsName .= ", ";
                  }
                  $allTagsName .= $tagDetail->title;
                }
              }

              $invoices[$key]->allTagsName = $allTagsName;


            }
        }

        if(!$invoices){
          abort(404);
        }

        echo json_encode(array('invoices'=>$invoices));
        exit;

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
          'file-upload' => 'required|mimes:pdf|max:10000',
          'company_id' => 'required',
          'uploaded_date' => 'required',
          'tags' => 'required',
        ]);

        if ($request->hasFile('file-upload')){
            $file = $request->file('file-upload');

            $file_ext=$file->getClientOriginalExtension();
            $file_name=$file->getClientOriginalName();

            if($file_ext!='pdf' && $file_ext!='PDF'){
                return redirect(route('invoice.index'))->withErrors(__("Only Pdf documents allowed"));
                exit;
            }
            //Move Uploaded File
            $destinationPath = 'invoices';
            $filename_minus_extension = pathinfo($file_name, PATHINFO_FILENAME);
            $extension = '.'.pathinfo($file_name, PATHINFO_EXTENSION);
            $file_name = $this->checkFile('invoices/', $filename_minus_extension, $extension, "");
            $file_name_new =str_replace("invoices/","",$file_name);
                $request->file('file-upload')->storeAs($destinationPath, $file_name_new);
            //$file->move($destinationPath,$file_name);
            // $tags=json_encode($request->tags);
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
                    "file" => $file_name_new
                    ];
                    
                $attachments = Invoice::create($data);
            }
            return redirect(route('company-invoice',$request->company_id))->withStatus(__("The Invoice  has succesfully been Added"));
        }else{
        return redirect(route('company-invoice',$request->company_id))->withErrors(__("Fill all fields."));
      }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function show(Invoice $invoice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function edit(Invoice $invoice)
    {
        $tags=Tag::all();
        $companies = Company::all();
        $attachment = Invoice::find($invoice->id);
        $companyinfo=Company::where('id',$attachment->company_id)->first();
        return view('invoices.edit')->withCompanies($companies)
            ->withAttachment($attachment)
            ->withCompanyinfo($companyinfo)
            ->withTags($tags);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Invoice $invoice)
    {
        $file = $request->file('file_upload');
        if(!empty($request->file_upload)){
            $file_ext=$file->getClientOriginalExtension();
            $file_name=$file->getClientOriginalName();
            if($file_ext!='pdf' && $file_ext!='PDF'){
                return redirect(route('invoice.index'))->withErrors(__("Only Pdf documents allowed"));
                exit;
            }
            $destinationPath = 'attachments';
            $filename_minus_extension = pathinfo($file_name, PATHINFO_FILENAME);
            $extension = '.'.pathinfo($file_name, PATHINFO_EXTENSION);
            $file_name = $this->checkFile('invoices/', $filename_minus_extension, $extension, "");
            $file_name =str_replace("invoices/","",$file_name);
            $request->file('file_upload')->storeAs($destinationPath, $file_name);
        }else{
           $file_name=$invoice->file;
        }
        // $tags=json_encode($request->tags);
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
                "file" => $file_name
                ];
            Invoice::where('id', $invoice->id)->update($data);
        }

        
          
        return redirect()->back()->withStatus(__("The Invoice has succesfully been Updated"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function destroy(Invoice $invoice)
    {
        if(auth()->user()->hasRole('super admin')){
            $invoices = Invoice::find($invoice->id);
            if($invoices){
                Invoice::destroy($invoice->id);
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
