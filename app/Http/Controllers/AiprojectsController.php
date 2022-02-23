<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Carbon;
use App\Pdf;
use App\companyAttachmentsPdf;



// use App\Company;
use App\User;
use App\pdfProjects;
// use App\pdfProjectActivities;
// use App\Repositories\UserRepository;
// use PhpOffice\PhpWord\Settings;

use App\pdfProjectAttachments;
use App\pdfProjectSettings;

use DateTime;
use DatePeriod;
use DateInterval;

class AiprojectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(){
        $this->middleware(function ($request, $next) {
            if(auth()->user()->hasRole('super admin') || auth()->user()->hasRole('employee')){
                return $next($request);
            }
            else{
                return redirect()->route('home')->withFlashMessage('You are not authorized to access that page.')->withFlashType('warning');
            }
        });
    }


    public function index()
    {
        if(auth()->user()->hasRole('super admin')){
            return view('ai-projects.index');
        }
    }

    public function admin_get_pdf_data(Request $request,$type)
    {
        if(auth()->user()->hasRole('super admin')){
            $searchService  = json_decode($request->header('searchService'));
            $searchCompany  = json_decode($request->header('searchCompany'));
            $searchDate     = json_decode($request->header('searchDate'));
            $perPage        = $request->header('perPage')?$request->header('perPage'):10;

            $pdfs           = Pdf::orderBy('id', 'DESC');

            if($searchService && isset($searchService[0])){
                $pdfs->where(function($subQuery1) use($searchService) {
                    foreach ($searchService as $key_s => $value_s) {
                        $subQuery1->orWhere('service',strtolower($value_s));
                    }
                });
            }

            if($searchCompany && isset($searchCompany[0])){
                $pdfs->where(function($subQuery2) use($searchCompany) {
                    foreach ($searchCompany as $key_c => $value_c) {
                        $subQuery2->orWhere('company_id',$value_c);
                    }
                });
            }

            if($searchDate && isset($searchDate->startDate) && $searchDate->startDate && isset($searchDate->endDate) && $searchDate->endDate){
                $pdfs->where('start_date' , '>=' , $searchDate->startDate)
                    ->where('end_date' , '<=' , $searchDate->endDate);
            }

            if($type=='performa'){
                $pdfs->where('service','wbso')->where('wbso_type',$type);
            }else if($type=='complete'){
                $pdfs->where(function($subQuery) use($type){
                    $subQuery->where('wbso_type', $type)
                          ->orWhere('wbso_type' , NULL);
                });
            }else{
                abort(404);
            }

            $pdfs = $pdfs->paginate($perPage);


            
            foreach ($pdfs as $key => $value) {
                $PdfFile=companyAttachmentsPdf::where('ref_id',$value->id)->where('type','Pdf')->first();
                if($PdfFile){
                    // $pdfs[$key]->name = 'Beschikking-'.strtoupper($value->service).'-'.$this->humanDateRanges($value->start_date, $value->end_date).'.zip';
                    $pdfs[$key]->pdf = $PdfFile->file;
                    // $pdfs[$key]->status = $PdfFile->status;
                    


                }else{
                    $pdfs[$key]->pdf = NULL;
                }

                $pdfs[$key]->companyName = $value->company->name;
                $pdfs[$key]->period = date("d F Y", strtotime($value->start_date)).' - '.date("d F Y", strtotime($value->end_date));
                $pdfs[$key]->fileLink = $value->pdf?('/user/file/'.base64_encode('pdfs/'.$value->pdf)):NULL;


                if($value->status=='Toegekend'){
                    $pdfs[$key]->status = 'Completed';
                    $pdfs[$key]->statusClass = 'completed';

                }else if($value->status=='Afgewezen'){
                    $pdfs[$key]->status = 'Rejected';
                    $pdfs[$key]->statusClass = 'rejected';

                }else if($value->status == 'Vragenbrief'){
                    $pdfs[$key]->status = 'Questions';
                    $pdfs[$key]->statusClass = 'question';
                }else{
                    $pdfs[$key]->status = 'In-progress';
                    $pdfs[$key]->statusClass = 'progresed';
                }


                // $pdfs[$key]->status = $value->status=='Approved'?'Approved':'Declined';
            }

            echo json_encode($pdfs);exit;
        }
    }

    public function admin_get_open_tasks(Request $request)
    {
        if(auth()->user()->hasRole('super admin') || auth()->user()->hasRole('employee')){
            $pdfs = Pdf::where('service','wbso')->where('status','In-progress')->orderBy('id', 'DESC');
            if(auth()->user()->hasRole('employee') && auth()->user()->company_id!=1){
                $pdfs->where("company_id" , auth()->user()->company_id);
            }
            $pdfs = $pdfs->get();

            foreach ($pdfs as $key => $value) {
                $value->company;
                $value->user;
            }
            echo json_encode($pdfs);exit;
        }
    }

    public function humanDateRanges($start, $end){
        if(auth()->user()->hasRole('super admin')){
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
    }

    public function admin_view_service_detail($type,$slug){

        if(auth()->user()->hasRole('super admin')){
            $serviceDetail = Pdf::where('slug',$slug)->first();
            if(!$serviceDetail){
                abort(404);   
            }

            return view('ai-projects.detail');
        }

    }

    public function admin_get_service_detail($slug){

        if(auth()->user()->hasRole('super admin')){
            $serviceDetail = Pdf::where('slug',$slug)->first();
            

            if(!$serviceDetail){
                abort(404);   
            }

            $PdfFile=companyAttachmentsPdf::where('ref_id',$serviceDetail->id)->where('type','Pdf')->first();


            $disabled_dates_arrays = array();
            $allDates = Pdf::where("company_id" , $serviceDetail->company->id)->where('service',$serviceDetail->service)
            ->whereHas('companyAttachmentsPdf' , function($subQuery2sub) {
                $subQuery2sub->where('status','Approved');
            })
            ->get();


            
            foreach ($allDates as $key => $value) {
                $period = new \DatePeriod(
                         new DateTime($value->start_date),
                         new DateInterval('P1D'),
                         new DateTime($value->end_date)
                    );
                foreach ($period as $key_di => $value_di) {

                    $disabled_dates_arrays[] = $value_di->format('Y-m-d');
                }
            }

            // dd($disabled_dates_arrays);

        // dd($serviceDetail->company->id,$serviceDetail->service);


            $serviceDetail->user;
            $serviceDetail->company->users;
            $serviceDetail->company->disabledDates = $disabled_dates_arrays;
            $serviceDetail->pdfProjects;

            $serviceDetail->pdfProjectAttachments;
            $serviceDetail->pdfProjectSettings;
            if($serviceDetail->created_by && $serviceDetail->created_by!=NULL){
                $createdBy=User::find($serviceDetail->created_by);
                if($createdBy){
                    $serviceDetail->createdBy = $createdBy->firstname." ".$createdBy->lastname;
                }
            }



            // $disabled_dates_arrays = array();
            // $allDates = Pdf::where("company_id" , $serviceDetail->company->id)->where('service',$serviceDetail->service)
            // ->whereHas('companyAttachmentsPdf' , function($subQuery2sub) {
            //     $subQuery2sub->where('status','Approved');
            // })

            // ->get();

            // // dd($allDates);
            // foreach ($allDates as $key => $value) {
            //     $period = new \DatePeriod(
            //              new DateTime($value->start_date),
            //              new DateInterval('P1D'),
            //              new DateTime($value->end_date)
            //         );


            //     foreach ($period as $key_di => $value_di) {

            //         $disabled_dates_arrays[] = $value_di->format('Y-m-d');
            //     }

            // }


            // dd($allDates,$disabled_dates_arrays);
            

            $data = array(
                // "disabledDates"=>$disabled_dates_arrays,
                "serviceDetail"=>$serviceDetail
            );

            echo json_encode($data);exit;

        }
    }

    public function admin_update_via_pdf_projects(Request $request,$slug){
        if(auth()->user()->hasRole('super admin')){
            
            $validate = [
                'service'           => 'required',
                'company'           => 'required',
                'user'              => 'required',
                'projects'          => 'required',
                // 'datepicker'        => 'required',
                'status'            => 'required',
                'start_date'        => 'required',
                'end_date'          => 'required',
                'status'            => 'required',
                'ref_number'        => 'required',
                // 'in_month'          => 'required',
                // 'ref_number'        => 'required',
                'hour_rate'         => 'required',
                // 'amount_total'      => 'required',
                // 'additional_file'   => 'required',
            ];



            if($request->service!='wbso' || ($request->service=='wbso' && $request->wbso_type=='complete')){
                // $validate['datepicker']         = 'required';
                // $validate['ref_number']         = 'required';
                // $validate['hour_rate']          = 'required';
                $validate['project_number.*']   = 'required|regex:/^[0-9\.\-\/]+$/';
            }

            $data = $request->validate($validate);



            $data = [
                'company_id'        => $request->company,
                'user_id'           => $request->user,
            ];
            

            if($request->service!='wbso' || ($request->service=='wbso' && $request->wbso_type=='complete')){
                $data['status']             = $request->status;
                $data['start_date']         = $request->start_date;
                $data['end_date']           = $request->end_date;
                $data['in_months']          = $request->in_month?$request->in_month:NULL;
                $data['ref_number']         = $request->ref_number;
                $data['hour_rate']          = $request->hour_rate;
                $data['total_hours']        = $request->total_hours?$request->total_hours:NULL;
                $data['total_amount']       = $request->amount_total?$request->amount_total:NULL;
                $data['amount_per_month']   = $request->amount_per_month?$request->amount_per_month:NULL;
                $data['summary']   = $request->summary?$request->summary:NULL;
            }

            $generate_pdf = Pdf::where('slug', $request->slug)->update($data);


            $projects = json_decode($request->projects);
            if($generate_pdf && $request->service!='wbso' || ($request->service=='wbso' && $request->wbso_type=='complete')){

                foreach ($projects as $key => $value) {
                    $data = [
                        'name'              => $value->name,
                        'hours'             => $value->hours?$value->hours:NULL,
                    ];

                    $pdfProjects = pdfProjects::where('id', $value->id)->update($data);
                }
            }



            $response = array(
                "status" => "Success",
                "message" => "Data updated successfully."
            );



            echo json_encode($response);exit;
        }
    }


    public function admin_add_project_setting(Request $request,$slug)
    {
        if(auth()->user()->hasRole('super admin')){
            $request->validate([
                // 'status'    => 'required|in:In-progress,Toegekend,Afgewezen,Vragenbrief',
                'log_text'  => 'required',
                'due_date'  => 'required',
            ]);


            $serviceDetail = Pdf::where('slug',$slug)->first();
            if($serviceDetail){
                $data = array(
                    "generate_pdf_id"   => $serviceDetail->id,
                    // "status"            => $request->status,
                    "due_date"          => $request->due_date,
                    "log_text"          => $request->log_text,
                );
                pdfProjectSettings::create($data);

                $response = array(
                    "status" => "Success",
                    "message" => "Data saved successfully.",
                    "data" => $data
                );
            }else{
                $response = array(
                    "status" => "Failure",
                    "message" => "Something wend wrong."
                );
            }
            echo json_encode($response);exit;
        }
    }

    public function admin_add_project_attachment(Request $request,$slug)
    {
        if(auth()->user()->hasRole('super admin')){
            $request->validate([
                // 'date'          => 'required',
                // 'description'   => 'required',
                'file'          => 'required|mimes:doc,docx,pdf,jpg,png,jpeg',
            ]);

             $serviceDetail = Pdf::where('slug',$slug)->first();
            if ($request->hasFile('file') && $serviceDetail) {
                $file = $request->file('file')->store('images/projectAttachments');
                $data = array(
                    "generate_pdf_id"       => $serviceDetail->id,
                    // "date"               => $request->status,
                    "description"           => $request->description,
                    "file"                  => $file,
                    "file_original_name"    => $request->file('file')->getClientOriginalName(),
                );
                $resData = pdfProjectAttachments::create($data);
                $response = array(
                    "status" => "Success",
                    "data" => $resData
                );
            }else{
                $response = array(
                    "status" => "Failure",
                    "message" => "Something wend wrong."
                );
            }   

            echo json_encode($response);exit;
        }
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($type)
    {
        if(auth()->user()->hasRole('super admin')){

            $serviceDetail = Pdf::select('id');


            if($type=='performa'){
                $serviceDetail->where('service','wbso')->where('wbso_type',$type);
            }else if($type=='complete'){
                $serviceDetail->where(function($subQuery) use($type){
                    $subQuery->where('wbso_type', $type)
                          ->orWhere('wbso_type' , NULL);
                });
            }else{
                abort(404);
            }

            $serviceDetail = $serviceDetail->first();
            // dd($serviceDetail);


            if(!$serviceDetail){
                abort(404);   
            }

            return view('ai-projects.index');
        }

        // return view('ai-projects.detail');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function admin_get_service_projects($slug){
        if (auth()->user()->hasRole('super admin')){
            $serviceDetail = Pdf::where('slug',$slug)->first();
            foreach ($serviceDetail->pdfProjects as $key => $value) {
                $value->pdfProjectActivities;
            }
            if(!$serviceDetail){
                abort(404);   
            }
            echo json_encode($serviceDetail);exit;
        }
    }
}
