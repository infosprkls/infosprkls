<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pdf;
use App\companyAttachmentsPdf;
use App\Company;
use App\User;
use App\pdfProjects;
use App\pdfXmls;
use App\pdfProjectActivities;
use App\serviceXmlDownloadLogs;
use App\Repositories\UserRepository;
use PhpOffice\PhpWord\Settings;


use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

// use DateTime;

use DateTime;
use DatePeriod;
use DateInterval;
use Illuminate\Support\Str;

use App\Jobs\downloadWaiting;

class PdfController extends Controller
{
    public function __construct(UserRepository $userRepo)
    {
        $this->middleware(function ($request, $next) {      
            if(auth()->user()->hasRole('user')){
                return redirect()->route('home')->withFlashMessage('You are not authorized to access that page.')->withFlashType('warning');
            }
            return $next($request);
        });
        $this->middleware('isaccept');
        $this->userRepo = $userRepo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id=NULL)
    {   
        if($id){
            $company = Company::where("id" , $id)->first();
            $superUsers = $this->userRepo->super_users($id);
            if(!$company){
                abort(404);
            }
            // dd($companies->id);
            $pdfs=Pdf::where('company_id',$id)->orderBy('id', 'DESC')->paginate(10);
            foreach ($pdfs as $key => $value) {
                $PdfFile=companyAttachmentsPdf::where('ref_id',$value->id)->where('type','Pdf')->first();
                if($PdfFile){
                    $pdfs[$key]->name = 'Beschikking-'.strtoupper($value->service).'-'.$this->humanDateRanges($value->start_date, $value->end_date).'.zip';
                    $pdfs[$key]->pdf = $PdfFile->file;
                    $pdfs[$key]->status = $PdfFile->status;
                }else{
                    $pdfs[$key]->pdf = NULL;
                }
            }
            // dd($pdfs);
            return view('pdf.index')->withUsers($superUsers)->withCompanies($company)->withCompanyid($id)
            ->withPdfs($pdfs);
        }else{
            abort(404);
        }
        
    }

    public function service_create($id,$service,$type=NULL){
        $company = Company::where("id" , $id)->first();

        $disabled_dates_arrays = array();
        $allDates = Pdf::where("company_id" , $id)->where('service',$service)


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
        
        $superUsers = $this->userRepo->super_users($id);
        $allCompanies =  Company::where('status',1)->get();

        if(!$company || ($service!='via' && $service!='mit' && ($service!='wbso' && ($type!='performa' || $type!='complete')))) {
            abort(404);
        }



        // return view('pdf.service_create')->withUsers($superUsers)->withCompanies($company)->withCompanyid($id)->withService($service)->withType("")->withDates($disabled_dates_arrays);


        return view('pdf.service_create')->withUsers($superUsers)->withAllCompanies($allCompanies)->withCompanies($company)->withCompanyid($id)->withService($service)->withType($type)->withDates($disabled_dates_arrays);
    }

    public function wbso_service_create($id,$service,$type){
        $company = Company::where("id" , $id)->first();

        $disabled_dates_arrays = array();
        $allDates = Pdf::where("company_id" , $id)->where('service',$service)


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
        
        $superUsers = $this->userRepo->super_users($id);
        

        if(!$company || ($service!='wbso' && ($type!='performa' || $type!='complete'))){
            abort(404);
        }

        return view('pdf.service_create')->withUsers($superUsers)->withCompanies($company)->withCompanyid($id)->withService($service)->withType($type)->withDates($disabled_dates_arrays);
    }

    public function view_service_detail($id,$slug){
        $company = Company::where("id" , $id)->first();
        if (auth()->user()->hasRole('super admin')){
            $serviceDetail = Pdf::where('slug',$slug)->first();
            

            if(!$serviceDetail || !$company){
                abort(404);   
            }
            $user=User::where('id',$serviceDetail->user_id)->where('company_id',$id)->first();
            $allProjects = pdfProjects::where('generate_pdf_id',$serviceDetail->id)->get();

            $disabled_dates_arrays = array();
            $allDates = Pdf::where("company_id" , $id)->where('service',$serviceDetail->service)


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
            $superUsers = $this->userRepo->super_users($id);
            $allCompanies =  Company::where('status',1)->get();
            // dd($superUsers);
            return view('pdf.service_detail')->withSuperUsers($superUsers)->withUsers($user)->withDetails($serviceDetail)->withCompanies($company)->withAllCompanies($allCompanies)->withService($serviceDetail->service)->withProjects($allProjects)->withCompanyid($id)->withDates($disabled_dates_arrays);
        }
    }

    public function view_service_project_detail($id,$slug,$projectId){
        
        $company = Company::where("id" , $id)->first();
        if (auth()->user()->hasRole('super admin')){
            $serviceDetail = Pdf::where('slug',$slug)->first();
            $projectDetail = pdfProjects::where('id',$projectId)->first();
            $pdfProjectActivities = pdfProjectActivities::where('pdf_project_id',$projectId)->get();


            

            if(!$serviceDetail || !$company || !$projectDetail){
                abort(404);   
            }

            return view('pdf.service_project_detail')->withDetails($serviceDetail)->withCompanies($company)->withProjects($projectDetail)->withCompanyid($id)->withPdfProjectActivities($pdfProjectActivities);
        }
    }

    public function service_project_update(Request $request,$slug,$projectId){
        // dd($slug,$projectId,$request->all());
        if (auth()->user()->hasRole('super admin')){

            $data = $request->validate([
                'projectName'           => 'required',
                'projectHours'          => 'required',
                'description'           => 'required',
                'updates'               => 'required',
                'describedProblems'     => 'required',
                'describedSolution'     => 'required',
                'describedLanguages'    => 'required',
                'technicalNewness'      => 'required',
                'projectActivities'     => 'required'
            ]);


            $service = Pdf::where('slug' , $slug)->first();

            if (!$service) {
                abort(404);
            }

            // $service->ref_number = $request->ref_number;
            // $service->save();


            $data = [
                'name'                  => $request->projectName,
                'hours'                 => $request->projectHours,
                'description'           => $request->description,
                'updates'               => $request->updates,
                'described_problems'    => $request->describedProblems,
                'described_solution'    => $request->describedSolution,
                'described_languages'   => $request->describedLanguages,
                'technical_newness'     => $request->technicalNewness,
            ];

            pdfProjects::where('id', $projectId)->update($data);

            pdfProjectActivities::where('pdf_project_id', $projectId)->delete();
            $projectActivities = json_decode($request->projectActivities);
            // dd($projectActivities);
            foreach ($projectActivities as $key_ed => $value_ed) {
                $data = [
                    'pdf_project_id'    => $projectId,
                    'end_date'          => $value_ed->end_date,
                    'research'          => $value_ed->research
                ];
                pdfProjectActivities::create($data);
            }
        }

        echo json_encode(array("status"=>"Success","message"=>"Data updated successfully."));exit;
        // return redirect()->route('service.detail' , ['id'=>$id,'slug'=>$slug])->withStatus(__("Data succesfully Updated"));
        
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
        // dd($request->all());
        if (auth()->user()->hasRole('super admin')){

            $validate = [
                'company_id'        => 'required',
                'service'           => 'required',
                'user'              => 'required',
                // 'datepicker'        => 'required',
                // 'in_month'          => 'required',

                // 'ref_number'        => 'required',
                // 'hour_rate'        => 'required',

                // 'project_number.*'  =>'required|regex:/^[0-9\.\-\/]+$/'
                // 'amount_total'      => 'required',
            ];


            if($request->service!='wbso' || ($request->service=='wbso' && $request->wbso_type=='complete')){
                $validate['datepicker']         = 'required';
                $validate['ref_number']         = 'required';
                $validate['hour_rate']          = 'required';
                $validate['project_number.*']   = 'required|regex:/^[0-9\.\-\/]+$/';
            }

            
            // dd($request->service,$request->wbso_type);

            $data = $request->validate($validate);

            if($request->service!='wbso' || ($request->service=='wbso' && $request->wbso_type=='complete')){
                $splitted_dates = explode(" - ", $request->datepicker);
                $start_date = date("Y-m-d", strtotime($splitted_dates[0]));
                $end_date = date("Y-m-d", strtotime($splitted_dates[1]));
            }

            $i = 0;
            while ($i>=0) {

                $slug = Str::slug($request->service.($i>0?$i:''),'-');
                $exist = pdf::where('slug',$slug)->first();
                if(!isset($exist->id)){
                    break;
                }
                $i++;
            }
            

            $data = [
                'company_id'        => $request->company_id,
                'service'           => $request->service,
                'user_id'           => $request->user,
                'created_by'        => auth()->id(),
                // 'start_date'        => $start_date,
                // 'end_date'          => $end_date,
                // 'in_months'         => $request->in_month?$request->in_month:NULL,
                // 'ref_number'        => $request->ref_number,
                // 'hour_rate'         => $request->hour_rate,
                // 'total_hours'       => $request->total_hours?$request->total_hours:NULL,
                // 'total_amount'      => $request->amount_total?$request->amount_total:NULL,
                // 'amount_per_month'  => $request->amount_per_month?$request->amount_per_month:NULL,
                'slug'              => $slug,
                'created_at'        => date("Y-m-d H:i:s"),
            ];

            if($request->service!='wbso' || ($request->service=='wbso' && $request->wbso_type=='complete')){
                $data['start_date']         = $start_date;
                $data['end_date']           = $end_date;
                $data['in_months']          = $request->in_month?$request->in_month:NULL;
                $data['ref_number']         = $request->ref_number;
                $data['hour_rate']          = $request->hour_rate;
                $data['total_hours']        = $request->total_hours?$request->total_hours:NULL;
                $data['total_amount']       = $request->amount_total?$request->amount_total:NULL;
                $data['amount_per_month']   = $request->amount_per_month?$request->amount_per_month:NULL;

            }

            if($request->wbso_type){
                $data['wbso_type']  = $request->wbso_type;
            }
            
            $generate_pdf = Pdf::create($data);

            if($generate_pdf && $request->service!='wbso' || ($request->service=='wbso' && $request->wbso_type=='complete')){
                foreach ($request->project_name as $key => $value) {
                    $lastRow = pdfProjects::latest()->first();
                    $projectNumber = date("Y").".".date("Y").($lastRow->id + 1);

                    $data = [
                        'generate_pdf_id'   => $generate_pdf->id,
                        'name'              => $value,
                        'number'            => $projectNumber,
                        'hours'             => $request->project_hours?$request->project_hours[$key]:NULL,
                        'created_at'        => date("Y-m-d H:i:s"),
                    ];
                    $pdfProjects = pdfProjects::create($data);
                }
            }
        }
        return redirect()->route('company-pdf' , $request->company_id)->withStatus(__("Data succesfully been Added"));
    }

    public function superadmin_get_company_pdf_data($companyId){
        if (auth()->user()->hasRole('super admin') || auth()->user()->hasRole('super user')){
            return Pdf::where('company_id' , $companyId)->first();
        }
        
    }

    public function generate_pdf(Request $request,$slug){
        $pageType = $request->header('pageType');
        
        $data = $request->validate([
            'additional_file'  => 'sometimes|mimes:pdf'
        ]);

        // dd($request->all());
        $service_details = Pdf::where('slug' , $slug)->first();
        if(!$service_details){
            abort(404);
        }
        if (auth()->user()->hasRole('super admin')){
            $additional_file = NULL;
            if ($request->hasFile('additional_file')){
                $file = $request->file('additional_file');

                $additional_file=$file->getClientOriginalName();

                $file_ext=$file->getClientOriginalExtension();

                $destinationPath = 'pdfs';
                $filename_minus_extension = pathinfo($additional_file, PATHINFO_FILENAME);
                $extension = '.'.pathinfo($additional_file, PATHINFO_EXTENSION);
                $additional_file = $this->checkFile('pdfs/', $filename_minus_extension, $extension, "");
                $additional_file =str_replace("pdfs/","",$additional_file);
                $request->file('additional_file')->storeAs($destinationPath, $additional_file);
            }else{

            }

            $projects = pdfProjects::where('generate_pdf_id' , $service_details->id)->get();

            $projectNode = "";
            foreach ($projects as $key_proj => $value_proj) {

                if($key_proj!=0){
                    $projectNode .= "</w:t><w:br/><w:t>";
                }
                $projectNode .= ($key_proj+1).') PROJECT '.$value_proj->number.' "'.$value_proj->name.'" met een '.strtoupper($service_details->service).' uren totaal van '.$value_proj->hours.' uur.';

            }

            $company_id = $service_details->company_id;
            $companyinfo=Company::where('id',$company_id)->first();

            // $date=date('j F, Y', strtotime($request->date));

            //$template = storage_path('app/public/pdfs/letter_format2020.docx');
			
			$template = public_path(env('STORAGENAME').'/pdfs/letter_format2020.docx');
    		
            
        //    $template2 = storage_path('app/public/pdfs/letter2_format2020.docx');
            $template2 = public_path(env('STORAGENAME').'/pdfs/letter2_format2020.docx');
    	    
            // Creating the new document...
            Settings::setZipClass(Settings::PCLZIP);
            $zip = new \PhpOffice\PhpWord\Shared\ZipArchive();

            //This is the main document in a .docx file.
            $fileToModify = 'word/document.pdf';

            $file_only_name1='Positieve_beschikking'.'-'.date('his');
            $file_name1=$file_only_name1.'.docx';
            // $file_name1Final=$file_only_name1.'.pdf';
            $file_name1Final=$file_only_name1.'.pdf';
            $temp_file = storage_path('app/public/pdfs/'.$file_name1);
            // $temp_file = public_path(env('STORAGENAME').'/pdfs/'.$file_name1);
    	    
            $temp_file_final = storage_path('app/public/pdfs/'.$file_name1Final);
            // $temp_file_final = public_path(env('STORAGENAME').'/pdfs/'.$file_name1Final);
    	    copy($template,$temp_file);
            // chmod($temp_file, 0777);

            $file_only_name2=str_replace(" ", "_", strtoupper($service_details->service).'_Beschikking_'.(str_replace("/", ".", ($service_details->service=='wbso'?$service_details->ref_number:$projects[0]->number))).'-'.date('his'));
            $file_name2=$file_only_name2.'.docx';
            $file_name2Final=$file_only_name2.'.pdf';


            //$temp_file2 = storage_path('app/public/pdfs/'.$file_name2);
            $temp_file2 = public_path(env('STORAGENAME').'/pdfs/'.$file_name2);
    	    
            //$temp_file2_final = storage_path('app/public/pdfs/'.$file_name2Final);
            $temp_file2_final = public_path(env('STORAGENAME').'/pdfs/'.$file_name2Final);
    	    copy($template2,$temp_file2);
            // chmod($temp_file2, 0777);

            
            $userInfo=User::where('id',$service_details->user_id)->first();

            if ($zip->open($temp_file) === TRUE) {
                //Read contents into memory
                $oldContents = $zip->getFromName($fileToModify);
                //Modify contents:

                $oldContents = str_replace('{project_node}', $projectNode, $oldContents);
                $newContents = str_replace('{company_name}', $companyinfo->name, $oldContents);
                $newContents = str_replace('{name}', (isset($userInfo->firstname) || isset($userInfo->lastname))?(($userInfo->firstname?$userInfo->firstname:'').' '.($userInfo->lastname?$userInfo->lastname:'')):'---', $newContents);
                $newContents = str_replace('{tav_name}', isset($userInfo->title)?$userInfo->title:'---', $newContents);
                $newContents = str_replace('{date}', date("F jS Y"), $newContents);
                $newContents = str_replace('{address1}', $companyinfo->streat_name, $newContents);
                $newContents = str_replace('{address2}', $companyinfo->house_number, $newContents);
                $newContents = str_replace('{state}',  'state (static)', $newContents);
                $newContents = str_replace('{amount}',  $service_details->total_amount?('€'.str_replace(',', '.', (number_format($service_details->total_amount, 2, '.', ''))+0)):'---', $newContents);


                $newContents = str_replace('{genderTitle}', isset($userInfo->gender)?($userInfo->gender=='Male'?'heer':'mevrouw'):'heer', $newContents);

                $newContents = str_replace('{totalHours}', $service_details->total_hours?($service_details->total_hours.' uur'):'---', $newContents);

                $newContents = str_replace('{period}', $this->humanDateRanges($service_details->start_date, $service_details->end_date), $newContents);
                $newContents = str_replace('{so-number}', $service_details->ref_number, $newContents);

                $newContents = str_replace('{hour-rate}', $service_details->hour_rate?('€'.$service_details->hour_rate):'---', $newContents);


                // $newContents = str_replace('{project_name}', $projects->name?('“'.$projects->name.'”'):'---', $newContents);
                // $newContents = str_replace('{project_number}', $projects->number?$projects->number:'---', $newContents);




                // $newContents = str_replace('{project_hours}', $projects->hours?$projects->hours:'---', $newContents);
                $newContents = str_replace('{total_amount}', $service_details->total_amount?$service_details->total_amount:'---', $newContents);
                $newContents = str_replace('{amount_per_month}',  $service_details->amount_per_month?('€'.str_replace(',', '.', (number_format($service_details->amount_per_month, 2, '.', ''))+0)):'---', $newContents);





                $newContents = str_replace('{months_year}',  $this->humanDateRanges($service_details->start_date, $service_details->end_date), $newContents);








                $newContents = str_replace('{months}',  $service_details->in_months, $newContents);
                //Delete the old...
                $zip->deleteName($fileToModify);
                //Write the new...
                $zip->addFromString($fileToModify, $newContents);
                //And write back to the filesystem.
                $return =$zip->close();
                // dd("HOME=".getCWD()."/storage && export HOME && libreoffice --headless --convert-to pdf ".$temp_file." --outdir storage/pdfs");
				$storage_path =  \Storage::path('');

				// $process = new Process("HOME=".$storage_path." && export HOME && libreoffice --headless --convert-to pdf ".$temp_file." --outdir uploadtest/pdfs");
                $process = shell_exec("HOME=".$storage_path." && export HOME && libreoffice --headless --convert-to pdf ".$temp_file." --outdir ".env('STORAGENAME')."/pdfs");
                // $process->run();


                //     dd($process->getOutput());
                // } catch (ProcessFailedException $exception) {
                //     dd(file_exists($temp_file),is_dir(env('STORAGENAME')."/pdfs"),is_dir('/var/www/uploadtest/'),$exception->getMessage());
                // }   

                // exit;


                // $process->run();
                
                // if (!$process->isSuccessful()) {
                //     throw new ProcessFailedException($process);
                // }


                // exit;
                
                $temp_file = $file_name1Final;


                // if($return==TRUE){
                //     echo 'success';
                // }else{
                //     echo 'error';
                // }
            } else {
                // echo 'failed';
            }


            $zip = new \PhpOffice\PhpWord\Shared\ZipArchive();
            if ($zip->open($temp_file2) === TRUE) {
                //Read contents into memory
                $fileToModify = 'word/document.pdf';
                $oldContents1 = $zip->getFromName($fileToModify);
                //Modify contents:
                $oldContents1 = str_replace('{project_node}', $projectNode, $oldContents1);



                $newContents1 = str_replace('{company_name}', $companyinfo->name, $oldContents1);
                $newContents1 = str_replace('{name}', (isset($userInfo->firstname) || isset($userInfo->lastname))?(($userInfo->firstname?$userInfo->firstname:'').' '.($userInfo->lastname?$userInfo->lastname:'')):'---', $newContents1);
                $newContents1 = str_replace('{tav_name}', isset($userInfo->title)?$userInfo->title:'---', $newContents1);
                $newContents1 = str_replace('{date}', date("F jS Y"), $newContents1);

                $newContents1 = str_replace('{address1}', $companyinfo->streat_name, $newContents1);
                $newContents1 = str_replace('{address2}', $companyinfo->house_number, $newContents1);
                $newContents1 = str_replace('{state}',  'state (static)', $newContents1);
                $newContents1 = str_replace('{amount}',  $service_details->total_amount?('€'.str_replace(',', '.', (number_format($service_details->total_amount, 2, '.', ''))+0)):'---', $newContents1);

                $newContents1 = str_replace('{genderTitle}', isset($userInfo->gender)?($userInfo->gender=='Male'?'heer':'mevrouw'):'heer', $newContents1);

                $newContents1 = str_replace('{totalHours}', $service_details->total_hours?$service_details->total_hours:'---', $newContents1);

                $newContents1 = str_replace('{period}', date("d F Y", strtotime($service_details->start_date)) .' - '. date("d F Y", strtotime($service_details->end_date)), $newContents1);
                $newContents1 = str_replace('{so-number}', $service_details->ref_number, $newContents1);

                // $newContents1 = str_replace('{project_name}', $projects->name?('“'.$projects->name.'”'):'---', $newContents1);
                // $newContents1 = str_replace('{project_number}', $projects->number?$projects->number:'---', $newContents1);
                // $newContents1 = str_replace('{project_hours}', $projects->hours?$projects->hours:'---', $newContents1);
                $newContents1 = str_replace('{total_amount}', $service_details->total_amount?$service_details->total_amount:'---', $newContents1);
                $newContents1 = str_replace('{amount_per_month}',  $service_details->amount_per_month?('€'.str_replace(',', '.', (number_format($service_details->amount_per_month, 2, '.', ''))+0)):'---', $newContents1);
                $newContents1 = str_replace('{months_year}',  $this->humanDateRanges($service_details->start_date, $service_details->end_date), $newContents1);
                $newContents1 = str_replace('{months}',  $service_details->in_months, $newContents1);
                //Delete the old...
                $zip->deleteName($fileToModify);
                //Write the new...
                $zip->addFromString($fileToModify, $newContents1);
                //And write back to the filesystem.
                $return =$zip->close();

                $storage_path =  \Storage::path('');

				// $process = new Process("HOME=".$storage_path." && export HOME && libreoffice --headless --convert-to pdf ".$temp_file2." --outdir uploadtest/pdfs");
                $process = shell_exec("HOME=".$storage_path." && export HOME && libreoffice --headless --convert-to pdf ".$temp_file2." --outdir ".env('STORAGENAME')."/pdfs");
                // dd($process);
                
                // $process->run();

				
                
                $temp_file2 = $temp_file2_final;

                // $temp_file2
                // dd($temp_file2);

                // if($return==TRUE){
                //     echo 'success';
                // }else{
                //     echo 'error';
                // }
            } else {
                // echo 'failed';
            }


            // $file = public_path('template.docx');



            $data1 = [
                'ref_id'            => $service_details->id,
                "company_id"        => $company_id,
                'file'              => $file_name1Final,
                'file2'             => $file_name2Final,
                'status'            => 'Declined',
                'type'              => 'Pdf',
            ];

            if($additional_file){
                $data1['additional_file'] = $additional_file;
            }

            companyAttachmentsPdf::updateOrCreate(['ref_id' => $service_details->id], $data1);
            downloadWaiting::dispatch($company_id)->delay(now()->addSeconds(1));
        }


        if($pageType && $pageType=='api'){
            $response = array(
                "status" => "Success",
                "message" => "PDF Succesfully Generated."
            );
            echo json_encode($response);exit;
        }else{
            return redirect()->route('company-pdf' , $service_details->company_id)->withStatus(__("Pdf Succesfully Generated"));
        }

        
    }

    public function generate_xml(Request $request,$slug){
        // dd($request->all());
        $pageType = $request->header('pageType');
        
        $service_details = Pdf::where('slug' , $slug)->first();
        // dd($service_details->created_at->year);
        if(!$service_details || $service_details->service!='wbso'){
            abort(404);
        }
        if (auth()->user()->hasRole('super admin')){

            if($service_details->service=='wbso' && $service_details->service=='performa'){

                $bid = strtotime(date("Y-m-d")).strtotime(date("m")).strtotime(date("Y"))."_".strtotime("now");
                $xml = '<Import><Formulier>437WBSO_VORMVRIJ</Formulier><Bericht_ID>'.$bid.'</Bericht_ID><Afzender>ikhan@ai-solutions.nl</Afzender><Xml><![CDATA[';
                
                $xml .= '<Bericht xmlns="http://www.agentschapnl.nl/schemas/AanvraagWbsoExtern" xsi:schemaLocation="http://www.agentschapnl.nl/schemas/AanvraagWbsoExtern schema.xsd" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance">';
                

                $xml .= '<WbsoAanvraag>';
                $xml .= '<WbsoDossierAlgemeen>';
                $xml .= '<WbsoAanvraagjaar>2020</WbsoAanvraagjaar>';
                $xml .= '<WbsoVorigAanvraagnummer/>';
                $xml .= '<WbsoEerderAangevraagd>N</WbsoEerderAangevraagd>';
                $xml .= '</WbsoDossierAlgemeen>';
                $xml .= '</WbsoAanvraag>';
                
                $xml .= '<AanvraagAlgemeen>';
                $xml .= '<DossierAlgemeen>';
                $xml .= '<Aanvraagnaam>WBSO</Aanvraagnaam>';
                $xml .= '</DossierAlgemeen>';
                $xml .= '<Dossierdeelnemers>';

                
                $xml .= '<Dossierdeelnemer>';
                $xml .= '<DeelnemerOrganisatie>';
                $xml .= '<Deelnemerrol>ANV</Deelnemerrol>';
                $xml .= '<OrganisatiegegevensDeelnemer>';
                $xml .= '<Organisatienaam>'. $service_details->company->name?$service_details->company->name:'---' .'</Organisatienaam>';
                $xml .= '<Rechtsvorm>'. $service_details->company->legal_form?$service_details->company->legal_form:'---' .'</Rechtsvorm>';
                $xml .= '<KvKNummer>'. $service_details->company->kvk?$service_details->company->kvk:'---' .'</KvKNummer>';


                $xml .= '</OrganisatiegegevensDeelnemer>';
                $xml .= '<Adressen>';
                $xml .= '<Adres>';
                $xml .= '<Adressoort>VST</Adressoort>';
                $xml .= '<Straatnaam>'. $service_details->company->streat_name?$service_details->company->streat_name:'---' .'</Straatnaam>';
                $xml .= '<Huisnummer>'. $service_details->company->house_number?$service_details->company->house_number:'---' .'</Huisnummer>';

                $xml .= '<Postcode>'. $service_details->company->post_code?$service_details->company->post_code:'---' .'</Postcode>';
                $xml .= '<Plaatsnaam>'. $service_details->company->place_name?strtoupper($service_details->company->place_name):'---' .'</Plaatsnaam>';
                $xml .= '</Adres>';
                $xml .= '<Adres>';
                $xml .= '<Adressoort>COR</Adressoort>';
                $xml .= '<Straatnaam>'. $service_details->company->streat_name?$service_details->company->streat_name:'---' .'</Straatnaam>';
                $xml .= '<Huisnummer>'. $service_details->company->house_number?$service_details->company->house_number:'---' .'</Huisnummer>';

                $xml .= '<Postcode>'. $service_details->company->post_code?$service_details->company->post_code:'---' .'</Postcode>';
                $xml .= '<Plaatsnaam>'. $service_details->company->place_name?strtoupper($service_details->company->place_name):'---' .'</Plaatsnaam>';
                $xml .= '</Adres>';
                $xml .= '</Adressen>';
                $xml .= '<CommunicatieadressenDeelnemer>';
                $xml .= '<Internetadres>'. $service_details->company->www?$service_details->company->www:'---' .'</Internetadres>';

                $xml .= '</CommunicatieadressenDeelnemer>';
                $xml .= '<ContactpersonenDeelnemer>';
                $xml .= '<ContactpersoonDeelnemer>';
                $xml .= '<Contactpersoonrol>CON</Contactpersoonrol>';
                $xml .= '<CommunicatieadressenDeelnemer>';
                $xml .= '<Emailadres>'. $service_details->user->email?$service_details->user->email:'---' .'</Emailadres>';

                $xml .= '<Telefoonnummer>'. $service_details->user->phone_number?$service_details->user->phone_number:'---' .'</Telefoonnummer>';
                $xml .= '</CommunicatieadressenDeelnemer>';
                $xml .= '<PersoonsgegevensContactpersoon>';
                $xml .= '<Titel>'. $service_details->user->title?$service_details->user->title:'---' .'</Titel>';
                $xml .= '<Voorletters>'. $service_details->user->initials?$service_details->user->initials:'---' .'</Voorletters>';
                $xml .= '<Voornaam>'. $service_details->user->firstname?$service_details->user->firstname:'---' .'</Voornaam>';
                $xml .= '<Tussenvoegsels>'. $service_details->user->insertions?$service_details->user->insertions:'---' .'</Tussenvoegsels>';
                $xml .= '<Achternaam>'. $service_details->user->lastname?$service_details->user->lastname:'---' .'</Achternaam>';
                $xml .= '<Geslacht>'. $service_details->user->gender?$service_details->user->gender:'---' .'</Geslacht>';
                $xml .= '</PersoonsgegevensContactpersoon>';
                $xml .= '</ContactpersoonDeelnemer>';
                $xml .= '</ContactpersonenDeelnemer>';
                $xml .= '</DeelnemerOrganisatie>';
                $xml .= '</Dossierdeelnemer>';
                


                
                $xml .= '</Dossierdeelnemers>';
                $xml .= '</AanvraagAlgemeen>';
                $xml .= '<Formulier>437WBSO_VORMVRIJ</Formulier><XSDVersie>0.9</XSDVersie>';
                $xml .= '</Bericht>';
                
                $xml .= ']]></Xml></Import>';
                
            }else{
                $xml = '<?xml version="1.0" encoding="UTF-8"?>';
                $xml .= '<!-- 
                        ***********************************************************************************************
                        XSD:    AanvraagWbsoExtern t.b.v. Definitieve Aanvragen WBSO 2021 eLoket RVO
                        VERSIE: 1.9
                        DATUM:  19-20-2020
                        ***********************************************************************************************
                        Aangepast tov 1.8 (WBSO 2020)
                        - element[Formulier]                    : 437WBSO_VORMVRIJ
                        - element{XSDVersie]                    : 1.9
                        - element[Boekjaar]                     : 2021
                        - element[WbsoAanvraagjaar]             : 2021
                        - element[Rechtsvorm]                   : uitgebreid conform eLoket, OV is vervallen

                        ***********************************************************************************************

                        -->';



                $xml .= '
<xs:schema xmlns:xs="http://www.w3.org/2001/XMLSchema" xmlns="http://www.agentschapnl.nl/schemas/AanvraagWbsoExtern" targetNamespace="http://www.agentschapnl.nl/schemas/AanvraagWbsoExtern" version="1.9">

    <xs:element name="Bericht">
        <xs:annotation>
            <xs:documentation>ROOT</xs:documentation>
        </xs:annotation>
        <xs:complexType>
            <xs:sequence>
                <xs:element ref="Attachments" minOccurs="0"/> 
                <xs:element ref="WbsoAanvraag"/>
                <xs:element ref="AanvraagAlgemeen"/>
                <xs:element ref="Formulier"/>
                <xs:element ref="XSDVersie"/> <!--  -->
            </xs:sequence>
        </xs:complexType>
    </xs:element>
    
    <xs:element name="Attachments">
        <xs:complexType>
            <xs:sequence>
                <xs:element ref="Attachment" maxOccurs="3"/>
            </xs:sequence>
        </xs:complexType>
    </xs:element>
    
    <xs:element name="WbsoAanvraag"> <!-- This is the start of the WBSO aanvraag  -->
        <xs:annotation>
            <xs:documentation/>
        </xs:annotation>
        <xs:complexType>
            <xs:all>
                <xs:element ref="WbsoDossierAlgemeen"/> <!-- WBSO general -->
                <xs:element ref="WbsoDossierdeelnemers"/> <!--  WBSO applications  -->
                <xs:element ref="WbsoProjecten"/> <!-- THe WBSO projects declariation -->
            </xs:all>
        </xs:complexType>
    </xs:element>

    <xs:element name="AanvraagAlgemeen"> <!-- Within this, the general things (like  companies etc)-->
        <xs:annotation>
            <xs:documentation/>
        </xs:annotation>
        <xs:complexType>
            <xs:all>
                <xs:element ref="DossierAlgemeen"/> <!-- file general  -->
                <xs:element ref="Dossierdeelnemers"/> <!-- file of the contacts  -->
                <xs:element ref="Projecten"/> <!--  the projects declaration -->
            </xs:all>
        </xs:complexType>
    </xs:element>
    
    <xs:element name="Formulier"> <!--  the form-->
        <xs:annotation>
            <xs:documentation/>
        </xs:annotation>
        <xs:simpleType>
            <xs:restriction base="xs:token">
                <xs:enumeration value="437WBSO_VORMVRIJ"/> <!--  WBSO ID -->
            </xs:restriction>
        </xs:simpleType>
    </xs:element>


    
    <xs:element name="XSDVersie">
        <xs:annotation>
            <xs:documentation/>
        </xs:annotation>
        <xs:simpleType>
            <xs:restriction base="xs:token">
                <xs:enumeration value="1.9"/>
            </xs:restriction>
        </xs:simpleType>
    </xs:element>

    <xs:element name="Attachment">
        <xs:complexType>
            <xs:all>
                <xs:element ref="AttachmentDescription"/>
                <xs:element ref="AttachmentContent"/>
            </xs:all>
        </xs:complexType>
    </xs:element>

    <xs:element name="WbsoDossierAlgemeen"> <!--  WBSO file general settinsgs -->
        <xs:annotation>
            <xs:documentation>
            Verplichte elementen:<!-- required elements -->
            [WbsoAanvraagjaar] <!-- Year in whicht the WBSO is being requested -->
            [WbsoPeriodeStart] <!-- WBSO period start -->
            [WbsoPeriodeEind] <!-- WBSO period end -->
            [WbsoVorigAanvraagnummer]   <!-- The previous WBSO period (if there was a period. Like jnauary-june 2021, and this is being requested in july 2021  -->         :als [WbsoAanvraagtype] = A
            [WbsoAantalSOWerknemers]    <!--  The amount of employees-->            :als [WbsoAanvraagVoor] = W/B
            [WbsoRDA] <!-- a non used parameter  -->
            [WbsoAanvraagtype]
            [WbsoUurloonBerekend]                   :als [WbsoAanvraagVoor] = W/B
            </xs:documentation>
        </xs:annotation>
        <xs:complexType>
            <xs:all>
                <xs:element ref="WbsoAanvraagjaar"/> <!--  WBSO year -->
                <xs:element ref="WbsoPeriodeStart"/> <!-- WBSO start month -->
                <xs:element ref="WbsoPeriodeEind"/> <!--  WBSO end month -->
                <xs:element ref="WbsoVorigAanvraagnummer" minOccurs="0"/> <!-- if requested in previoud month WBSO the SO-number -->
                <xs:element ref="WbsoAantalSOWerknemers"/> <!-- the amount of ppl -->
                <xs:element ref="WbsoOpmerkingen" minOccurs="0"/> <!-- WBSO description -->
                <xs:element ref="WbsoRDA"/> <!-- non used -->
                <xs:element ref="WbsoEerderAangevraagd" minOccurs="0"/> <!-- WBSO requested earlier? -->
                <xs:element ref="WbsoAanvraagtype"/> <!-- WBSO type -->
                <xs:element ref="WbsoUurloonBerekend" minOccurs="0"/> <!-- WBSO hour rate -->
                <xs:element ref="WbsoAanvraagVoor"/> 
            </xs:all>
        </xs:complexType>
    </xs:element>

    <xs:element name="WbsoDossierdeelnemers">
        <xs:annotation>
            <xs:documentation/>
        </xs:annotation>
        <xs:complexType>
            <xs:choice maxOccurs="unbounded">
                <xs:element ref="WbsoDossierdeelnemer"/>
            </xs:choice>
        </xs:complexType>
    </xs:element>

    <xs:element name="WbsoProjecten">
        <xs:annotation>
            <xs:documentation/>
        </xs:annotation>
        <xs:complexType>
            <xs:choice maxOccurs="unbounded">
                <xs:element ref="WbsoProject"/>
            </xs:choice>
        </xs:complexType>
    </xs:element>

    <xs:element name="DossierAlgemeen">
        <xs:annotation>
            <xs:documentation/>
        </xs:annotation>
        <xs:complexType>
            <xs:all>
                <xs:element ref="Aanvraagnaam"/>
            </xs:all>
        </xs:complexType>
    </xs:element>

    <xs:element name="Dossierdeelnemers">
        <xs:annotation>
            <xs:documentation/>
        </xs:annotation>
        <xs:complexType>
            <xs:choice maxOccurs="unbounded">
                <xs:element ref="Dossierdeelnemer"/>
            </xs:choice>
        </xs:complexType>
    </xs:element>

    <xs:element name="Projecten">
        <xs:annotation>
            <xs:documentation/>
        </xs:annotation>
        <xs:complexType>
            <xs:choice maxOccurs="unbounded">
                <xs:element ref="Project"/>
            </xs:choice>
        </xs:complexType>
    </xs:element>

    <xs:element name="WbsoAanvraagjaar">
        <xs:annotation>
            <xs:documentation>Vaste waarde 2021
            </xs:documentation>
        </xs:annotation>
        <xs:simpleType>
            <xs:restriction base="xs:integer">
                <xs:enumeration value="2021"/>
            </xs:restriction>
        </xs:simpleType>

    </xs:element>

    <xs:element name="WbsoPeriodeStart" type="StartWbsoPeriode">
        <xs:annotation>
            <xs:documentation>';

            $xml .= $service_details->start_date?$service_details->start_date:'---';
            $xml .= '<xs:documentation/>
        </xs:annotation>
    </xs:element>
    
    <xs:element name="WbsoPeriodeEind" type="EindWbsoPeriode">
        <xs:annotation>
            <xs:documentation>';
            $xml .= $service_details->end_date?$service_details->end_date:'---';
            $xml .= '<xs:documentation/>
        </xs:annotation>
    </xs:element>

    
    <xs:element name="WbsoVorigAanvraagnummer">
        <xs:annotation>
            <xs:documentation>het referentienummer (SO.......) van uw vorige aanvraag of vormvrije verzoek
            </xs:documentation>
        </xs:annotation>
        <xs:simpleType>
            <xs:restriction base="xs:token">
                <xs:maxLength value="40"/>
            </xs:restriction>
        </xs:simpleType>
    </xs:element>

    
    <xs:element name="WbsoAantalSOWerknemers">
        <xs:annotation>
            <xs:documentation>  
            </xs:documentation>
        </xs:annotation>
        <xs:simpleType>
            <xs:restriction base="xs:integer"/>
        </xs:simpleType>
    </xs:element>

    
    <xs:element name="WbsoOpmerkingen">
        <xs:annotation>
            <xs:documentation> Onderdeel: opmerkingen veld
500 tekens
            </xs:documentation>
        </xs:annotation>
        <xs:simpleType>
            <xs:restriction base="xs:string">
                <xs:maxLength value="500"/>
            </xs:restriction>
        </xs:simpleType>
    </xs:element>

    
    <xs:element name="WbsoRDA">
        <xs:annotation>
            <xs:documentation>
            Is er sprake van Forfait/Kosten/Uitgaven
            1: Als onderdeel van [WbsoDossierAlgemeen]
            J : Wanneer WbsoAanvraagVoor= "B" of "W" 
            N : Wanneer WbsoAanvraagVoor = "Z"
            
            2: Als onderdeel van [WbsoDossierdeelnemer]
            J : Wanneer ([WbsoAanvraagVoor] = W/B) EN [WbsoDossierDeelnemer] is van het type DeelnemerOrganisatie 
            N : [WbsoDossierDeelnemer] is van het type DeelnemerParticulier
            </xs:documentation>
        </xs:annotation>
        <xs:simpleType>
            <xs:restriction base="xs:token">
                <xs:maxLength value="1"/>
                <xs:enumeration value="J"/>
                <xs:enumeration value="N"/>
                <xs:enumeration value=""/>
            </xs:restriction>
        </xs:simpleType>
    </xs:element>

    
    <xs:element name="WbsoEerderAangevraagd">
        <xs:annotation>
            <xs:documentation>Onderdeel: Aanvraagperiode
Vraag: hebt u eerder een WBSO aanvraag ingediend.
J = Ja
N = Nee
            </xs:documentation>
        </xs:annotation>
        <xs:simpleType>
            <xs:restriction base="xs:token">
                <xs:length value="1"/>
                <xs:enumeration value="J"/>
                <xs:enumeration value="N"/>
            </xs:restriction>
        </xs:simpleType>
    </xs:element>

    
    <xs:element name="WbsoAanvraagtype">
        <xs:annotation>
            <xs:documentation>Onderdeel: Periode
Vraag: Type aanvraag 
D = Definitief
A = Aanvulling op vormvrij verzoek
            </xs:documentation>
        </xs:annotation>
        <xs:simpleType>
            <xs:restriction base="xs:token">
                <xs:length value="1"/>
                <xs:enumeration value="A"/>
                <xs:enumeration value="D"/>
            </xs:restriction>
        </xs:simpleType>
    </xs:element>

    
    <xs:element name="WbsoUurloonBerekend">
        <xs:annotation>
            <xs:documentation>J = Ja, SO uurloon wordt berekend o.b.v. opgave BSN’s en UWV loongegevens
N = Nee, SO uurloon wordt forfaitair.</xs:documentation>
        </xs:annotation>
        <xs:simpleType>
            <xs:restriction base="xs:token">
                <xs:length value="1"/>
                <xs:enumeration value="J"/>
                <xs:enumeration value="N"/>
            </xs:restriction>
        </xs:simpleType>
    </xs:element>

        
    <xs:element name="WbsoAanvraagVoor">
        <xs:annotation>
            <xs:documentation>Onderdeel: Gegevens onderneming / onderzoeksinstelling
Vraag: U vraagt aan voor: 
W = Werknemers
Z = Zelfstandigen
B = Beiden: Werknemers en Zelfstandigen
            </xs:documentation>
        </xs:annotation>
        <xs:simpleType>
            <xs:restriction base="xs:token">
                <xs:maxLength value="1"/>
                <xs:enumeration value="W"/>
                <xs:enumeration value="Z"/>
                <xs:enumeration value="B"/>
            </xs:restriction>
        </xs:simpleType>
    </xs:element>


    
    <xs:element name="WbsoVoortzettingVerbondenVennootschap">
        <xs:annotation>
            <xs:documentation>J = Ja
N = Nee
Onderdeel: Gegevens met betrekking tot starters
Vraag: Werd de onderneming of het gedeelte van de onderneming waarvan uw onderneming een
voortzetting is, direct of indirect gedreven door een met uw onderneming verbonden vennootschap?
            </xs:documentation>
        </xs:annotation>
        <xs:simpleType>
            <xs:restriction base="xs:token">
                <xs:maxLength value="1"/>
                <xs:enumeration value="J"/>
                <xs:enumeration value="N"/>
            </xs:restriction>
        </xs:simpleType>
    </xs:element>

    
    <xs:element name="WbsoVoortzetting">
        <xs:annotation>
            <xs:documentation>J = Ja
N = Nee
Onderdeel: Gegevens met betrekking tot starters
Vraag: Zijn er activiteiten van een andere onderneming overgegaan naar uw 
onderneming? Zo, ja dan is er sprake van voortzetting van een onderneming
            </xs:documentation>
        </xs:annotation>
        <xs:simpleType>
            <xs:restriction base="xs:token">
                <xs:maxLength value="1"/>
                <xs:enumeration value="J"/>
                <xs:enumeration value="N"/>
            </xs:restriction>
        </xs:simpleType>
    </xs:element>

    
    <xs:element name="WbsoUitgavenTotaalMIL" type="WbsoBedrag">
        <xs:annotation>
            <xs:documentation> 
Onderdeel: Uitgaven > 1 miljoen
Vraag: uitgave totaal
            </xs:documentation>
        </xs:annotation>
    </xs:element>
    
    <xs:element name="WbsoUitgavenRelevantMIL">
        <xs:annotation>
            <xs:documentation>J = Ja
N = Nee
Onderdeel: Uitgaven > 1 miljoen
Vraag: relevant ( is de uitgave > miljoen toerekenbaar aan deze aanvraag)
            </xs:documentation>
        </xs:annotation>
        <xs:simpleType>
            <xs:restriction base="xs:token">
                <xs:maxLength value="1"/>
                <xs:enumeration value="J"/>
                <xs:enumeration value="N"/>
            </xs:restriction>
        </xs:simpleType>
    </xs:element>
    <xs:element name="WbsoUitgavenOmschrijvingMIL" type="WbsoOmschrijving">
        <xs:annotation>
            <xs:documentation>Onderdeel: Uitgaven > 1 miljoen
Vraag: omschrijving (omschrijving van de uitgave > 1 miljoen)
500 tekens 
            </xs:documentation>
        </xs:annotation>
    </xs:element>
    <xs:element name="WbsoUitgavenOmschrijving" type="WbsoOmschrijving">
        <xs:annotation>
    <xs:documentation>
Onderdeel: Uitgaven per project
Vraag: omschrijving (omschrijving van de uitgave)
500 tekens
    </xs:documentation>
</xs:annotation>
    </xs:element>

    
    <xs:element name="WbsoUitgavenNummerMIL">
        <xs:annotation>
            <xs:documentation>
Onderdeel: Uitgaven > 1 miljoen.
Vraag: Volgnummer. Uniek nummer tbv het in 5 jaar opdelen van uitgaven > miljoen
20 tekens
            </xs:documentation>
        </xs:annotation>
        <xs:simpleType>
            <xs:restriction base="xs:token">
                <xs:maxLength value="20"/>
            </xs:restriction>
        </xs:simpleType>
    </xs:element>

    
    <xs:element name="WbsoUitgavenMIL">
        <xs:annotation>
            <xs:documentation>J = Ja
N = Nee
Onderdeel: RDA kosten en uitgaven aanvrager.
Vraag: Voert u in deze aanvraag afzonderlijke uitgaven op bij een of meer projecten van meer dan 1 miljoen?
            </xs:documentation>
        </xs:annotation>
        <xs:simpleType>
            <xs:restriction base="xs:token">
                <xs:maxLength value="1"/>
                <xs:enumeration value="J"/>
                <xs:enumeration value="N"/>
                <xs:enumeration value=""/>
            </xs:restriction>
        </xs:simpleType>
    </xs:element>

    
    <xs:element name="WbsoUitgavenIdMIL" type="xs:integer">
        <xs:annotation>
            <xs:documentation>Technisch nummer om uitgave>1 miljoen te koppelen aan dossierdeelnemer
            </xs:documentation>
        </xs:annotation>
    </xs:element>

    
    <xs:element name="WbsoUitgavenBedragMIL" type="WbsoBedrag">
        <xs:annotation>
            <xs:documentation>Onderdeel: Uitgaven > 1 miljoen
Vraag: toerekenbare deel van de totale uitgave > 1 miljoen. 
Maximaal 20% van de totale uitgave > 1 miljoen
            </xs:documentation>
        </xs:annotation>
    </xs:element>

    
    <xs:element name="WbsoUitgavenBedrag" type="WbsoBedrag">
        <xs:annotation>
            <xs:documentation>Onderdeel: Kosten uitgaven per project
Vraag: bedrag. (uitgave bedrag bij het project)
            </xs:documentation>
        </xs:annotation>
    </xs:element>

    
    <xs:simpleType name="WbsoTWOVraag">
        <xs:annotation>
            <xs:documentation>Vraag m.b.t. Technisch- wetenschappelijk onderzoek
of
Technische nieuwheid ontwikkelingsproject.
1500 tekens
</xs:documentation>
        </xs:annotation>
        <xs:restriction base="xs:string">
            <xs:maxLength value="1500"/>
        </xs:restriction>
    </xs:simpleType>

    
    <xs:element name="WbsoToelichtingWijzigingPlanning">
        <xs:annotation>
            <xs:documentation>Onderdeel: Projectgegegevens.
Vraag: Update project 
Vermeld de voortgang van uw SO-werkzaamheden. 
Zijn er wijzigingen in de oorspronkelijke projectopzet of -planning? 
Geef dan aan waarom dit het geval is
            </xs:documentation>
        </xs:annotation>
        <xs:simpleType>
            <xs:restriction base="xs:string">
                <xs:maxLength value="1500"/>
            </xs:restriction>
        </xs:simpleType>
    </xs:element>

    
    <xs:element name="WbsoSOVerklaring">
        <xs:annotation>
            <xs:documentation>J = Ja
N = Nee
Onderdeel: Startergegevens 
Vraag: SO verklaring (voor het betreffende jaar in het verleden) 
            </xs:documentation>
        </xs:annotation>
        <xs:simpleType>
            <xs:restriction base="xs:token">
                <xs:minLength value="1"/>
                <xs:maxLength value="1"/>
                <xs:enumeration value="J"/>
                <xs:enumeration value="N"/>
            </xs:restriction>
        </xs:simpleType>
    </xs:element>

    
    <xs:element name="WbsoSOUrenBegroot" type="xs:integer">
        <xs:annotation>
            <xs:documentation>Onderdeel: Uren
Vraag: begrote uren voor het project
            </xs:documentation>
        </xs:annotation>
    </xs:element>

    
    <xs:element name="WbsoRSIN">
        <xs:annotation>
            <xs:documentation>Rechtspersonen en Samenwerkingsverbanden Informatie Nummer.
- Moet voldoen aan de 11-proef voor fiscale nummers.
- voorheen fiscaal nummer
            </xs:documentation>
        </xs:annotation>
        <xs:simpleType>
            <xs:restriction base="xs:token">
                <xs:minLength value="7"/>
                <xs:maxLength value="10"/>
            </xs:restriction>
        </xs:simpleType>
    </xs:element>
    <xs:element name="WbsoRechtspersoon">
        <xs:annotation>
            <xs:documentation>Onderdeel: Fiscale eenheid
Vraag: Naam en RSIN van rechtspersonen uit de fiscale eenheid namens wie kosten/uitgaven wordem opgevoerd in de aanvraag. 
Indien de vraag "Voert u kosten/uitgaven op namens andere rechtspersonen uit de fiscale eenheid?" met Ja is beantwoord dan
minimaal 1 combinatie Naam RSIN opvoeren
            </xs:documentation>
        </xs:annotation>
        <xs:complexType>
            <xs:all>
                <xs:element ref="WbsoOrganisatienaam"/>
                <xs:element ref="WbsoRSIN"/>
            </xs:all>
        </xs:complexType>
    </xs:element>
    <xs:element name="WbsoRechtspersonen">
        <xs:complexType>
            <xs:choice maxOccurs="unbounded">
                <xs:element ref="WbsoRechtspersoon"/>
            </xs:choice>
        </xs:complexType>
    </xs:element>
    
    <!--Projectelementen -->

    
    <xs:element name="WbsoProjecttype">
        <xs:annotation>
            <xs:documentation>Onderdeel: Projectgegevens
Vraag: Projecttype (van het project)
B - Ontwikkelingsproject
O - Onderzoeksproject (technisch wetenschappelijk onderzoek)
            </xs:documentation>
        </xs:annotation>
        <xs:simpleType>
            <xs:restriction base="xs:token">
                <xs:minLength value="1"/>
                <xs:maxLength value="1"/>
                <xs:enumeration value="B"/>
                <xs:enumeration value="O"/>
            </xs:restriction>
        </xs:simpleType>
    </xs:element>
    
    
    <xs:element name="WbsoProjectzwaartepunt">
        <xs:annotation>
            <xs:documentation>Onderdeel: Projectgegegevens
Vullen wanneer Projecttype = "B"
            Vraag: Zwaartepunt (van het project)
PDT - Product
PPS - Productieproces
PRG - Programmatuur
            </xs:documentation>
        </xs:annotation>
        <xs:simpleType>
            <xs:restriction base="xs:token">
                <xs:enumeration value="PDT"/>
                <xs:enumeration value="PPS"/>
                <xs:enumeration value="PRG"/>
            </xs:restriction>
        </xs:simpleType>
    </xs:element>

    
    <xs:element name="WbsoProjectomschrijving">
        <xs:annotation>
            <xs:documentation>Onderdeel: Projectgegevens
Vraag: Geef een algemene omschrijving van het project. 
Heeft u al eerder WBSO aangevraagd voor dit project? 
Beschrijf de stand van zaken bij de vraag “Update project”
            </xs:documentation>
        </xs:annotation>
        <xs:simpleType>
            <xs:restriction base="xs:string">
                <xs:minLength value="1"/>
                <xs:maxLength value="1500"/>
            </xs:restriction>
        </xs:simpleType>
    </xs:element>

    
    <xs:element name="WbsoProjectdeelnemers">
        <xs:annotation>
            <xs:documentation/>
        </xs:annotation>
        <xs:complexType>
            <xs:choice maxOccurs="unbounded">
                <xs:element ref="WbsoProjectdeelnemer"/>
            </xs:choice>
        </xs:complexType>
    </xs:element>

    
    <xs:element name="WbsoProjectdeelnemer">
        <xs:annotation>
            <xs:documentation>Onderdeel: Uren en kosten/uitgaven per project
Het wbsoEdeelnemerid moet corresponderen met de betreffende wbsodossierdeelnemer.
            </xs:documentation>
        </xs:annotation>
        <xs:complexType>
            <xs:all>
                <xs:element ref="WbsoEDeelnemerId"/>
                <xs:element ref="WbsoSOUrenBegroot"/>
                <xs:element ref="WbsoKostenOmschrijving" minOccurs="0"/>
                <xs:element ref="WbsoKostenBedrag" minOccurs="0"/>
                <xs:element ref="WbsoUitgavenOmschrijving" minOccurs="0"/>
                <xs:element ref="WbsoUitgavenBedrag" minOccurs="0"/>
            </xs:all>
        </xs:complexType>
    </xs:element>
    <xs:element name="WbsoTWOVraag1" type="WbsoTWOVraag">
        <xs:annotation>
            <xs:documentation>
Als WBSOprojecttype = "B" en wbsoprojectzwaartepunt = "PRG"; 
nvt
***
Als WBSOprojecttype = "B" en wbsoprojectzwaartepunt = "PDT" of "PPS"; 
Geef aan welke concrete technische knelpunten u zelf tijdens het ontwikkelingsproces moet oplossen om het gewenste projectresultaat te bereiken. Vermeld geen aanleidingen, algemene randvoorwaarden of functionele eisen van het project.
***
Als WBSOprojecttype = "O";
Geef concreet aan voor welk verschijnsel u een verklaring zoekt. Waarom kunt u geen verklaring vinden voor het verschijnsel op basis van algemeen toegankelijke kennis of de al intern aanwezige kennis?
</xs:documentation>
        </xs:annotation>
    </xs:element>
    <xs:element name="WbsoTWOVraag2" type="WbsoTWOVraag">
        <xs:annotation>
            <xs:documentation>
Als WBSOprojecttype = "B" en wbsoprojectzwaartepunt = "PRG"; 
nvt
***
Als WBSOprojecttype = "B" en wbsoprojectzwaartepunt = "PDT" of "PPS";
Geef voor ieder genoemd technisch knelpunt aan wat u specifiek zelf gaat ontwikkelen om het knelpunt op te lossen.
***
Als WBSOprojecttype = "O";
Wat zijn de beoogde uitkomsten van het (deel)onderzoek? Waarom is het voor u nieuwe technische kennis?</xs:documentation>
        </xs:annotation>
    </xs:element>
    <xs:element name="WbsoTWOVraag3" type="WbsoTWOVraag">
        <xs:annotation>
            <xs:documentation>
Als WBSOprojecttype = "B" en wbsoprojectzwaartepunt = "PRG"; 
nvt
***
Als WBSOprojecttype = "B" en wbsoprojectzwaartepunt = "PDT" of "PPS";
Geef aan waarom de hiervoor genoemde oplossingsrichtingen technisch nieuw voor u zijn. Oftewel beschrijf waarom het project technisch vernieuwend en uitdagend is en geef aan welke technische risico’s en onzekerheden u hierbij verwacht. Om technische risico’s en onzekerheden in te schatten kijkt RVO.nl naar de stand van de technologie.
***
Als WBSOprojecttype = "O";
Wat zijn concreet de onderzoeksvragen waarop u een antwoord zoekt? Uit uw onderzoeksvragen moet duidelijk naar voren komen dat het onderzoek verder gaat dan het verzamelen, observeren, vastleggen of correleren van data.</xs:documentation>
        </xs:annotation>
    </xs:element>
    <xs:element name="WbsoTWOVraag4" type="WbsoTWOVraag">
        <xs:annotation>
            <xs:documentation>
Als WBSOprojecttype = "B" ; nvt
***
Als WBSOprojecttype = "O";
Wat is de praktische onderzoeksopzet? Hoe wilt u een antwoord vinden op de door u gestelde onderzoeksvragen? Omschrijf dit nauwkeurig in de door u zelf uit te voeren technische werkzaamheden.</xs:documentation>
        </xs:annotation>
    </xs:element>
    <xs:element name="WbsoTWOVraag5" type="WbsoTWOVraag">
        <xs:annotation>
            <xs:documentation>
Als WBSOprojecttype = "B" ; nvt
*** 
Als WBSOprojecttype = "O";
Geef aan op welk technologiegebied het technisch-wetenschappelijk onderzoek betrekking heeft. Uit uw antwoord moet blijken dat het onderzoek technisch van aard is.</xs:documentation>
        </xs:annotation>
    </xs:element>
    <xs:element name="WbsoProject">
        <xs:annotation>
            <xs:documentation>
            Verplichte velden
            [WbsoEProjectId]
            [WbsoProjecttype]
            [WbsoProjectzwaartepunt]                    als [WbsoProjecttype] = B
            [WbsoProjectomschrijving]
            [WbsoBeschrijvingTechnischeNieuwheid]       als ([WbsoProjectzwaartepunt] = PRG) OF ([WbsoMedeProgrammatuurOntwikkeld] = J EN [WbsoProjecttype] = B) 
            [WbsoBeschrijvingTechnischProbleem]         als ([WbsoProjectzwaartepunt] = PRG) OF ([WbsoMedeProgrammatuurOntwikkeld] = J EN [WbsoProjecttype] = B)
            [WbsoGekozenOplossingsrichting]             als ([WbsoProjectzwaartepunt] = PRG) OF ([WbsoMedeProgrammatuurOntwikkeld] = J EN [WbsoProjecttype] = B)
            [WbsoZelfOntwikkelenMethoden]               als ([WbsoProjectzwaartepunt] = PRG) OF ([WbsoMedeProgrammatuurOntwikkeld] = J EN [WbsoProjecttype] = B)
            [WbsoTWOVraag1]                             als ([WbsoProjecttype] = B EN [WbsoProjectzwaartepunt] != PRG) OF ([WbsoProjecttype] = O)
            [WbsoTWOVraag2]                             als ([WbsoProjecttype] = B EN [WbsoProjectzwaartepunt] != PRG) OF ([WbsoProjecttype] = O)
            [WbsoTWOVraag3]                             als ([WbsoProjecttype] = B EN [WbsoProjectzwaartepunt] != PRG) OF ([WbsoProjecttype] = O)
            [WbsoTWOVraag4]                             als [WbsoProjecttype] = O
            [WbsoTWOVraag5]                             als [WbsoProjecttype] = O
            [WbsoProjectdeelnemers]
            </xs:documentation>
        </xs:annotation>
        <xs:complexType>
            <xs:all>
                <xs:element ref="WbsoEProjectId"/>
                <xs:element ref="WbsoProjecttype"/>
                <xs:element ref="WbsoProjectzwaartepunt"/>
                <xs:element ref="WbsoProjectomschrijving"/>
                <xs:element ref="WbsoToelichtingWijzigingPlanning" minOccurs="0"/>
                <xs:element ref="WbsoBeschrijvingTechnischeNieuwheid" minOccurs="0"/>
                <xs:element ref="WbsoBeschrijvingTechnischProbleem" minOccurs="0"/>
                <xs:element ref="WbsoGekozenOplossingsrichting" minOccurs="0"/>
                <xs:element ref="WbsoBestaandeMethodenTechnieken" minOccurs="0"/>
                <xs:element ref="WbsoZelfOntwikkelenMethoden" minOccurs="0"/>
                <xs:element ref="WbsoMedeProgrammatuurOntwikkeld" minOccurs="0"/>
                <xs:element ref="WbsoTWOVraag1" minOccurs="0"/>
                <xs:element ref="WbsoTWOVraag2" minOccurs="0"/>
                <xs:element ref="WbsoTWOVraag3" minOccurs="0"/>
                <xs:element ref="WbsoTWOVraag4" minOccurs="0"/>
                <xs:element ref="WbsoTWOVraag5" minOccurs="0"/>
                <xs:element ref="WbsoProjectdeelnemers"/>
            </xs:all>
        </xs:complexType>
    </xs:element>

    
    <xs:simpleType name="StartWbsoPeriode">
        <xs:annotation>
            <xs:documentation/>
        </xs:annotation>
        <xs:restriction base="xs:token">
            <xs:maxLength value="20"/>
            <xs:enumeration value="Januari"/>
            <xs:enumeration value="Februari"/>
            <xs:enumeration value="Maart"/>
            <xs:enumeration value="April"/>
            <xs:enumeration value="Mei"/>
            <xs:enumeration value="Juni"/>
            <xs:enumeration value="Juli"/>
            <xs:enumeration value="Augustus"/>
            <xs:enumeration value="September"/>
            <xs:enumeration value="Oktober"/>
        </xs:restriction>
    </xs:simpleType>

        
        <xs:simpleType name="EindWbsoPeriode">
        <xs:annotation>
            <xs:documentation/>
        </xs:annotation>
        <xs:restriction base="xs:token">
            <xs:maxLength value="20"/>
            <xs:enumeration value="Maart"/>
            <xs:enumeration value="April"/>
            <xs:enumeration value="Mei"/>
            <xs:enumeration value="Juni"/>
            <xs:enumeration value="Juli"/>
            <xs:enumeration value="Augustus"/>
            <xs:enumeration value="September"/>
            <xs:enumeration value="Oktober"/>
            <xs:enumeration value="November"/>
            <xs:enumeration value="December"/>
        </xs:restriction>
    </xs:simpleType>

    <xs:element name="WbsoOrganisatienaam">
        <xs:simpleType>
            <xs:restriction base="xs:token">
                <xs:minLength value="1"/>
                <xs:maxLength value="60"/>
            </xs:restriction>
        </xs:simpleType>
    </xs:element>

    
    <xs:element name="WbsoOndernemer">
        <xs:annotation>
            <xs:documentation>J = Ja
N = Nee
            </xs:documentation>
        </xs:annotation>
        <xs:simpleType>
            <xs:restriction base="xs:token">
                <xs:maxLength value="1"/>
                <xs:enumeration value="J"/>
                <xs:enumeration value="N"/>
            </xs:restriction>
        </xs:simpleType>
    </xs:element>
    
    <xs:element name="WbsoOnderdeelFiscaleEenheid">
        <xs:annotation>
            <xs:documentation>Onderdeel: Fiscale eenheid gegevens; Vraag: Maakt u deel uit van een fiscale eenheid voor de vennootschapbelasting? 
J = Ja
N = Nee
Element alleen toevoegen voor deelnemerorganisatie 

            </xs:documentation>
        </xs:annotation>
        <xs:simpleType>
            <xs:restriction base="xs:token">
                <xs:maxLength value="1"/>
                <xs:enumeration value="J"/>
                <xs:enumeration value="N"/>
            </xs:restriction>
        </xs:simpleType>
    </xs:element>
    
<!--programmatuurvragen-->
<!--1-->
    
    
    <xs:element name="WbsoBeschrijvingTechnischProbleem">
        <xs:annotation>
            <xs:documentation>Onderdeel: programmatuurvragen:
Geef aan welke concrete technische knelpunten u zelf tijdens het ontwikkelen van de programmatuur moet oplossen om het gewenste projectresultaat te bereiken. Vermeld geen aanleidingen, algemene randvoorwaarden of functionele eisen van de programmatuur.?
            </xs:documentation>
        </xs:annotation>
        <xs:simpleType>
            <xs:restriction base="xs:string">
                <xs:maxLength value="1500"/>
            </xs:restriction>
        </xs:simpleType>
    </xs:element>
<!--2-->
    
    
    <xs:element name="WbsoGekozenOplossingsrichting">
        <xs:annotation>
            <xs:documentation>Onderdeel: programmatuurvragen:
Geef voor ieder genoemd technisch knelpunt aan wat u specifiek zelf gaat ontwikkelen om het knelpunt op te lossen.
            </xs:documentation>
        </xs:annotation>
        <xs:simpleType>
            <xs:restriction base="xs:string">
                <xs:maxLength value="1500"/>
            </xs:restriction>
        </xs:simpleType>
    </xs:element>
<!--3-->

    
    <xs:element name="WbsoBestaandeMethodenTechnieken">
        <xs:annotation>
            <xs:documentation>Onderdeel: programmatuurvragen:
Geef aan welke programmeertalen, ontwikkelomgevingen en tools u gebruikt bij de ontwikkeling van technisch nieuwe programmatuur.
            </xs:documentation>
        </xs:annotation>
        <xs:simpleType>
            <xs:restriction base="xs:string">
                <xs:maxLength value="1500"/>
            </xs:restriction>
        </xs:simpleType>
    </xs:element>
<!--4-->

    
    <xs:element name="WbsoZelfOntwikkelenMethoden">
        <xs:annotation>
            <xs:documentation>Onderdeel: programmatuurvragen: 
Geef aan waarom de hiervoor genoemde oplossingsrichtingen technisch nieuw voor u zijn. Oftewel beschrijf waarom het project technisch vernieuwend en uitdagend is en geef aan welke technische risico’s en onzekerheden u hierbij verwacht. Om technische risico’s en onzekerheden in te schatten kijkt RVO.nl naar de stand van de technologie.            </xs:documentation>
        </xs:annotation>
        <xs:simpleType>
            <xs:restriction base="xs:string">
                <xs:maxLength value="1500"/>
            </xs:restriction>
        </xs:simpleType>
    </xs:element>

    
    <xs:element name="WbsoNaamVoortzetting">
        <xs:annotation>
            <xs:documentation>Onderdeel: Gegevens met betrekking tot starters;
Vraag: Naam voortzetting.
60 tekens
            </xs:documentation>
        </xs:annotation>
        <xs:simpleType>
            <xs:restriction base="xs:token">
                <xs:maxLength value="60"/>
            </xs:restriction>
        </xs:simpleType>
    </xs:element>

    
    <xs:element name="WbsoNaamMoederFiscaleEenheid">
        <xs:annotation>
            <xs:documentation>Onderdeel: Gegevens van de fiscale eenheid;
Vraag: Statutaire naam fiscale moeder
60 tekens
Element alleen toevoegen bij WbsoOnderdeelFiscaleEenheid= J

            </xs:documentation>
        </xs:annotation>
        <xs:simpleType>
            <xs:restriction base="xs:token">
                <xs:maxLength value="60"/>
            </xs:restriction>
        </xs:simpleType>
    </xs:element>

    
    <xs:element name="WbsoMedeProgrammatuurOntwikkeld">
        <xs:annotation>
            <xs:documentation>Onderdeel: Specifieke vragen bij het project;
Vraag: Wordt er voor dit product of proces mede programmatuur ontwikkeld?
J = Ja; de programmatuurvragen worden ook gesteld.
N = Nee; de programmatuurvragen worden niet gesteld.
        </xs:documentation>
        </xs:annotation>
        <xs:simpleType>
            <xs:restriction base="xs:token">
                <xs:length value="1"/>
                <xs:enumeration value="J"/>
                <xs:enumeration value="N"/>
            </xs:restriction>
        </xs:simpleType>
    </xs:element>
    <xs:element name="WbsoKvKNummerVoortzetting" type="WbsoKvKNummer">
        <xs:annotation>
            <xs:documentation/>
        </xs:annotation>
    </xs:element>
    <xs:simpleType name="WbsoKvKNummer">
        <xs:annotation>
            <xs:documentation/>
        </xs:annotation>
        <xs:restriction base="xs:token">
            <xs:length value="8"/>
            <xs:pattern value="[0-9]*"/>
        </xs:restriction>
    </xs:simpleType>

    
    <xs:element name="WbsoKostenOmschrijving" type="WbsoOmschrijving">
        <xs:annotation>
            <xs:documentation>Onderdeel: project kostenomschrijving;
500 tekens.
            </xs:documentation>
        </xs:annotation>
    </xs:element>
    <xs:simpleType name="WbsoOmschrijving">
        <xs:annotation>
            <xs:documentation/>
        </xs:annotation>
        <xs:restriction base="xs:string">
            <xs:maxLength value="500"/>
        </xs:restriction>
    </xs:simpleType>
    <xs:element name="WbsoKostenBedrag" type="WbsoBedrag">
        <xs:annotation>
            <xs:documentation/>
        </xs:annotation>
    </xs:element>
    <xs:simpleType name="WbsoBedrag">
        <xs:annotation>
            <xs:documentation/>
        </xs:annotation>
        <xs:restriction base="xs:decimal">
            <xs:totalDigits value="18"/>
            <xs:fractionDigits value="2"/>
        </xs:restriction>
    </xs:simpleType>
    <xs:element name="WbsoJaar" type="WbsoJaar">
        <xs:annotation>
            <xs:documentation>
            </xs:documentation>
        </xs:annotation>
    </xs:element>
    <xs:simpleType name="WbsoJaar">
        <xs:annotation>
            <xs:documentation/>
        </xs:annotation>
        <xs:restriction base="xs:integer">
            <xs:minExclusive value="0"/>
            <xs:totalDigits value="4"/>
            <xs:fractionDigits value="0"/>
        </xs:restriction>
    </xs:simpleType>
    
    
    <xs:element name="WbsoInhoudingsplichtig">
        <xs:annotation>
            <xs:documentation>J = Ja
N = Nee
            </xs:documentation>
        </xs:annotation>
        <xs:simpleType>
            <xs:restriction base="xs:token">
                <xs:maxLength value="1"/>
                <xs:enumeration value="J"/>
                <xs:enumeration value="N"/>
            </xs:restriction>
        </xs:simpleType>
    </xs:element>

    
    <xs:element name="WbsoForfait">
        <xs:annotation>
            <xs:documentation>Onderdeel: Regiemkeuze voor kosten en uitgaven
Alleen invullen indien WbsoAanvraagVoor = W (werknemers) of B (werknemers en zelfstandigen) 
J = Ja ; forfaitaire berekening voor de kosten/uitgaven
N = Nee ; opgave werkelijk kosten/uitgaven
            </xs:documentation>
        </xs:annotation>
        <xs:simpleType>
            <xs:restriction base="xs:token">
                <xs:maxLength value="1"/>
                <xs:enumeration value="J"/>
                <xs:enumeration value="N"/>
                <xs:enumeration value=""/>
            </xs:restriction>
        </xs:simpleType>
    </xs:element>

    
    <xs:element name="WbsoFiscaleEenheidRDA">
        <xs:annotation>
            <xs:documentation>Onderdeel: Gegevens fiscale eenheid;
Vraag: Voert u kosten/uitgaven op namens andere rechtspersonen uit de fiscale eenheid?
J = Ja
N = Nee
            </xs:documentation>
        </xs:annotation>
        <xs:simpleType>
            <xs:restriction base="xs:token">
                <xs:maxLength value="1"/>
                <xs:enumeration value="J"/>
                <xs:enumeration value="N"/>
            </xs:restriction>
        </xs:simpleType>
    </xs:element>

    
    <xs:element name="WbsoFiscaalNummerVoortzetting" type="WbsoFiscaalNummer">
        <xs:annotation>
            <xs:documentation>
            </xs:documentation>
        </xs:annotation>
    </xs:element>
    <xs:element name="WbsoFiscaalNummerMoederFiscaleEenheid" type="WbsoFiscaalNummer">
        <xs:annotation>
            <xs:documentation>
            Verplicht indien WbsoOnderdeelFiscaleEenheid= J
            </xs:documentation>
        </xs:annotation>
    </xs:element>

    
    <xs:simpleType name="WbsoFiscaalNummer">
        <xs:annotation>
            <xs:documentation/>
        </xs:annotation>
        <xs:restriction base="xs:token">
            <xs:maxLength value="10"/>
        </xs:restriction>
    </xs:simpleType>

    
    <xs:element name="WbsoEProjectId">
        <xs:annotation>
            <xs:documentation/>
        </xs:annotation>
        <xs:simpleType>
            <xs:restriction base="xs:positiveInteger"/>
        </xs:simpleType>
    </xs:element>

    
    <xs:element name="WbsoEDeelnemerId">
        <xs:annotation>
            <xs:documentation/>
        </xs:annotation>
        <xs:simpleType>
            <xs:restriction base="xs:positiveInteger"/>
        </xs:simpleType>
    </xs:element>
    <xs:element name="WbsoDossierdeelnemer">
        <xs:annotation>
            <xs:documentation>
            Element [WbsoDossierdeelnemer] alleen toevoegen voor [deelnemerorganisatie] met [deelnemerrol] = ANV 
            en voor elke [deelnemerparticulier]
            
            * Verplichte velden indien [WbsoDossierdeelnemer] = deelnemerorganisatie
                [WbsoEDeelnemerId]

                [WbsoOnderdeelFiscaleEenheid]           als [Rechtsvorm ] = BV/NV/COOP/OW
                [WbsoNaamMoederFiscaleEenheid]          als ([Rechtsvorm ] = BV/NV/COOP/OW) EN ([WbsoOnderdeelFiscaleEenheid] = J)
                [WbsoFiscaalNummerMoederFiscaleEenheid] als ([Rechtsvorm ] = BV/NV/COOP/OW) EN ([WbsoOnderdeelFiscaleEenheid] = J)
                [WbsoFiscaleEenheidRDA]                 als ([Rechtsvorm ] = BV/NV/COOP/OW) EN ([WbsoOnderdeelFiscaleEenheid] = J) EN ([WbsoForfait] = N)
                [WbsoRechtspersonen]                    als ([Rechtsvorm ] = BV/NV/COOP/OW) EN ([WbsoOnderdeelFiscaleEenheid] = J) EN ([WbsoForfait] = N) EN ([WbsoFiscaleEenheidRDA]=J)
                
                [Wbso5JaarInhoudingsplichtig]           als [WbsoAanvraagVoor] = W/B
                [WbsoDeelnemerjaren]                    als ([WbsoAanvraagVoor] = W/B) EN ([Wbso5JaarInhoudingsplichtig] = N)
                [WbsoVoortzetting]                      als ([WbsoAanvraagVoor] = W/B) EN ([Wbso5JaarInhoudingsplichtig] = N)
                [WbsoVoortzettingVerbondenVennootschap] als ([WbsoAanvraagVoor] = W/B) EN ([Wbso5JaarInhoudingsplichtig] = N) EN ([WbsoVoortzetting] = J)
                [WbsoAanmerkelijkBelang]                als ([WbsoAanvraagVoor] = W/B) EN ([Wbso5JaarInhoudingsplichtig] = N) EN ([WbsoVoortzetting] = J)
                [WbsoDeelnemervoortzettingen]           als ([WbsoAanvraagVoor] = W/B) EN ([Wbso5JaarInhoudingsplichtig] = N) EN ([WbsoVoortzetting] = J)

                [WbsoRDA]                               als [WbsoAanvraagVoor] = W/B        
                [WbsoForfait]                           als [WbsoAanvraagVoor] = W/B
                [WbsoUitgavenMIL]                       als ([WbsoAanvraagVoor] = W/B) EN ([WbsoForfait] = N)
                [WbsoDeelnemerInvesteringen]            als ([WbsoAanvraagVoor] = W/B) EN ([WbsoForfait] = N) EN ([WbsoUitgavenMIL]=J)  
            
            
            * Verplichte velden indien [WbsoDossierdeelnemer] = deelnemerparticulier:
                [WbsoEDeelnemerId]
                [WbsoRDA]                               = N
                [Wbso5JaarInhoudingsplichtig]
                [WbsoVoortzetting]                      als [Wbso5JaarInhoudingsplichtig] = N
                [WbsoDeelnemerjaren]                    als [Wbso5JaarInhoudingsplichtig] = N
                [WbsoVoortzettingVerbondenVennootschap] als ([Wbso5JaarInhoudingsplichtig] = N) EN ([WbsoVoortzetting]= J)
                [WbsoAanmerkelijkBelang]                als ([Wbso5JaarInhoudingsplichtig] = N) EN ([WbsoVoortzetting]= J)
            </xs:documentation>
        </xs:annotation>
        <xs:complexType>
            <xs:all>
                <xs:element ref="WbsoEDeelnemerId"/>
                <xs:element ref="WbsoOnderdeelFiscaleEenheid" minOccurs="0"/>
                <xs:element ref="WbsoNaamMoederFiscaleEenheid" minOccurs="0"/>
                <xs:element ref="WbsoFiscaalNummerMoederFiscaleEenheid" minOccurs="0"/>
                <xs:element ref="WbsoVoortzetting" minOccurs="0"/>
                <xs:element ref="WbsoVoortzettingVerbondenVennootschap" minOccurs="0"/>
                <xs:element ref="WbsoAanmerkelijkBelang" minOccurs="0"/>
                <xs:element ref="WbsoRDA" minOccurs="0"/>
                <xs:element ref="WbsoForfait" minOccurs="0"/>
                <xs:element ref="WbsoFiscaleEenheidRDA" minOccurs="0"/>
                <xs:element ref="WbsoUitgavenMIL" minOccurs="0"/>
                <xs:element ref="Wbso5JaarInhoudingsplichtig" minOccurs="0"/>
                <xs:element ref="WbsoDeelnemerjaren" minOccurs="0"/>
                <xs:element ref="WbsoDeelnemervoortzettingen" minOccurs="0"/>
                <xs:element ref="WbsoDeelnemerInvesteringen" minOccurs="0"/>
                <xs:element ref="WbsoRechtspersonen" minOccurs="0"/>
            </xs:all>
        </xs:complexType>
    </xs:element>
    <xs:element name="WbsoDeelnemervoortzettingen">
        <xs:annotation>
            <xs:documentation/>
        </xs:annotation>
        <xs:complexType>
            <xs:choice maxOccurs="unbounded">
                <xs:element ref="WbsoDeelnemervoortzetting"/>
            </xs:choice>
        </xs:complexType>
    </xs:element>
    <xs:element name="WbsoDeelnemervoortzetting">
        <xs:annotation>
            <xs:documentation>
            
            
            </xs:documentation>
        </xs:annotation>
        <xs:complexType>
            <xs:all>
                <xs:element ref="WbsoNaamVoortzetting" minOccurs="0"/>
                <xs:element ref="WbsoFiscaalNummerVoortzetting" minOccurs="0"/>
                <xs:element ref="WbsoKvKNummerVoortzetting" minOccurs="0"/>
            </xs:all>
        </xs:complexType>
    </xs:element>
    <xs:element name="WbsoDeelnemerjaren">
        <xs:annotation>
            <xs:documentation>Onderdeel: Gegevens met betrekking tot starters
            Vraag: in welke jaren was u inhoudingsplichtige/ondernemer en hebt u een SO-verklaring ontvangen.
            NB: Indien gevuld altijd de 5 jaren voorafgaand aan het [WbsoAanvraagjaar] invullen.
            


            </xs:documentation>
        </xs:annotation>
        <xs:complexType>
            <xs:sequence>
                <xs:element ref="WbsoDeelnemerjaar" minOccurs="5" maxOccurs="5"/>
            </xs:sequence>
        </xs:complexType>
    </xs:element>
    <xs:element name="WbsoDeelnemerjaar">
        <xs:annotation>
            <xs:documentation>
            [Wbsojaar]
            [WbsoSOVerklaring]
            [WbsoOndernemer]                        als {WbsoDossierdeelnemer] is van type deelnemerparticulier.
            [WbsoInhoudingsplichtig]                als [WbsoDossierdeelnemer] is van type deelnemerparticulier.
            
            </xs:documentation>
        </xs:annotation>
        <xs:complexType>
            <xs:all>
                <xs:element ref="WbsoJaar"/>
                <xs:element ref="WbsoOndernemer" minOccurs="0"/>
                <xs:element ref="WbsoInhoudingsplichtig" minOccurs="0"/>
                <xs:element ref="WbsoSOVerklaring"/>
            </xs:all>
        </xs:complexType>
    </xs:element>
    <xs:element name="WbsoDeelnemerInvesteringen">
        <xs:annotation>
            <xs:documentation/>
        </xs:annotation>
        <xs:complexType>
            <xs:choice maxOccurs="unbounded">
                <xs:element ref="WbsoDeelnemerInvestering"/>
            </xs:choice>
        </xs:complexType>
    </xs:element>
    <xs:element name="WbsoDeelnemerInvestering">
        <xs:annotation>
            <xs:documentation/>
        </xs:annotation>
        <xs:complexType>
            <xs:all>
                <xs:element ref="WbsoUitgavenIdMIL"/>
                <xs:element ref="WbsoUitgavenNummerMIL"/>
                <xs:element ref="WbsoUitgavenOmschrijvingMIL"/>
                <xs:element ref="WbsoUitgavenTotaalMIL"/>
                <xs:element ref="WbsoUitgavenBedragMIL"/>
                <xs:element ref="WbsoUitgavenRelevantMIL"/>
            </xs:all>
        </xs:complexType>
    </xs:element>

    
    <xs:element name="WbsoBeschrijvingTechnischeNieuwheid">
        <xs:annotation>
            <xs:documentation>Onderdeel:Specifieke vragen
LET OP: Voor geimporteerde projecten uit 2015 aanvragen of eerder mag dit onderdeel nog samengesteld beantwoord worden in dit veld.
Voor nieuwe projecten niet deze vraag beantwoorden maar de afzonderlijke vragen wbsotwovraag1 t/m 5
Indien wbsoprojecttype = B dan de volgende vragen beantwoorden.
Geef bij het Ontwikkelingsproject aan:
1. Wat de technische nieuwheid is van het project
2. Wat het technisch probleem / knelpunt is waaraan u wilt gaan werken
3. Wat de door u gekozen of te onderzoeken oplossingsrichting is
4. Wat het technisch nieuwe werkingsprincipe is
Indien wbsoprojecttype = O dan de volgende vragen beantwoorden:
Geef bij Technisch- wetenschappelijk onderzoek aan:
1. wat de aanleiding is om onderzoek op te starten.
2. wat er met de uitkomsten van het onderzoek wordt beoogd
3. wat de onderzoeksvragen zijn en wat u wilt verklaren
4. op welke wijze het onderzoek is opgezet en wordt uitgevoerd
5. op welk technologiegebied en op welke grondslagen of werkingsprincipes uw onderzoek zich richt.

1500 tekens
            </xs:documentation>
        </xs:annotation>
        <xs:simpleType>
            <xs:restriction base="xs:string">
                <xs:maxLength value="1500"/>
            </xs:restriction>
        </xs:simpleType>
    </xs:element>

    
    <xs:element name="Wbso5JaarInhoudingsplichtig">
        <xs:annotation>
            <xs:documentation>Onderdeel: Gegevens met betrekking tot starters
Vraag: Bent u alle 5 voorgaande jaren inhoudingsplichtige geweest?
J = Ja
N = Nee
            </xs:documentation>
        </xs:annotation>
        <xs:simpleType>
            <xs:restriction base="xs:token">
                <xs:maxLength value="1"/>
                <xs:enumeration value="J"/>
                <xs:enumeration value="N"/>
            </xs:restriction>
        </xs:simpleType>
    </xs:element>

    
    <xs:element name="WbsoAanmerkelijkBelang">
        <xs:annotation>
            <xs:documentation>Onderdeel: gegevens starter
Vraag: Werd de onderneming of het gedeelte van de onderneming waarvan uw onderneming een
voortzetting is, gedreven voor rekening van een natuurlijk persoon die op het moment van 
aanvragen een aanmerkelijk belang heeft in uw onderneming
J = Ja
N = Nee
            </xs:documentation>
        </xs:annotation>
        <xs:simpleType>
            <xs:restriction base="xs:token">
                <xs:maxLength value="1"/>
                <xs:enumeration value="J"/>
                <xs:enumeration value="N"/>
            </xs:restriction>
        </xs:simpleType>
    </xs:element>
    <xs:element name="Voornaam">
        <xs:annotation>
           <xs:documentation>';
           $xml .= $service_details->user->firstname?$service_details->user->firstname:'---';
           $xml .= '<xs:documentation/>
        </xs:annotation>
        <xs:simpleType>
            <xs:restriction base="xs:token">
                <xs:maxLength value="30"/>
            </xs:restriction>
        </xs:simpleType>
    </xs:element>
    <xs:element name="Voorletters">
        <xs:annotation>
            <xs:documentation>';
            $xml .= $service_details->user->initials?$service_details->user->initials:'---';
            $xml .= '<xs:documentation/>
        </xs:annotation>
        <xs:simpleType>
            <xs:restriction base="xs:token">
                <xs:maxLength value="10"/>
                <xs:pattern value="[^ ]*"/>
            </xs:restriction>
        </xs:simpleType>
    </xs:element>

    
    <xs:element name="VPBPlichtig">
        <xs:annotation>
            <xs:documentation>
U drijft een onderneming in de zin van de Wet IB of VpB en bent geen publieke kennisinstelling?
J = Ja
N = Nee
            </xs:documentation>
        </xs:annotation>
        <xs:simpleType>
            <xs:restriction base="xs:token">
                <xs:enumeration value="J"/>
                <xs:enumeration value="N"/>
            </xs:restriction>
        </xs:simpleType>
    </xs:element>
    <xs:element name="Tussenvoegsels">
        <xs:annotation>
            <xs:documentation>';
            $xml .= $service_details->user->insertions?$service_details->user->insertions:'---';
            $xml .= '<xs:documentation/>
        </xs:annotation>
        <xs:simpleType>
            <xs:restriction base="xs:token">
                <xs:maxLength value="10"/>
            </xs:restriction>
        </xs:simpleType>
    </xs:element>
    <xs:element name="Titel">
        <xs:annotation>
            <xs:documentation>';
            $xml .= $service_details->user->title?$service_details->user->title:'---';
            $xml .= '<xs:documentation/>
        </xs:annotation>
        <xs:simpleType>
            <xs:restriction base="xs:token">
                <xs:maxLength value="50"/>
            </xs:restriction>
        </xs:simpleType>
    </xs:element>
    <xs:element name="TelefoonnummerMobiel" type="TelefoonnummerType">
        <xs:annotation>
            <xs:documentation>';
            $xml .= $service_details->user->mobile?$service_details->user->mobile:'---';
            $xml .= '<xs:documentation/>
        </xs:annotation>
    </xs:element>
    <xs:element name="Telefoonnummer" type="TelefoonnummerType">
        <xs:annotation>
            <xs:documentation>';
            $xml .= $service_details->user->phone_number?$service_details->user->phone_number:'---';
            $xml .= '<xs:documentation/>
        </xs:annotation>
    </xs:element>

    
    <xs:simpleType name="TelefoonnummerType">
        <xs:annotation>
            <xs:documentation/>
        </xs:annotation>
        <xs:restriction base="xs:token">
            <xs:minLength value="10"/>
            <xs:maxLength value="60"/>
            <xs:pattern value="([0-9])*"/>
        </xs:restriction>
    </xs:simpleType>
    <xs:element name="Straatnaam">
        <xs:annotation>
            <xs:documentation>';
            $xml .= $service_details->user->streat_name?$service_details->user->streat_name:'---';
            $xml .= '<xs:documentation/>
        </xs:annotation>
        <xs:simpleType>
            <xs:restriction base="xs:token">
                <xs:minLength value="1"/>
                <xs:maxLength value="60"/>
            </xs:restriction>
        </xs:simpleType>
    </xs:element>
    
    <xs:element name="RechtsvormAfwijkend">
        <xs:annotation>
            <xs:documentation/>
        </xs:annotation>
        <xs:simpleType>
            <xs:restriction base="xs:token">
                <xs:maxLength value="30"/>
            </xs:restriction>
        </xs:simpleType>
    </xs:element>

    
    <xs:element name="Rechtsvorm">
        <xs:annotation>
            <xs:documentation>';
            $xml .= $service_details->user->legal_form?$service_details->user->legal_form:'---';
            $xml .= '<xs:documentation>
NV = Naamloze Vennootschap
BV = Besloten Vennootschap
COOP = Coöperatieve Vereniging
VER = Vereniging
STICH = Stichting
1MANS = Eenmanszaak
VOF = Vennootschap onder Firma
MTS = Maatschap
CV = Commanditaire Vennootschap
OW = Onderlinge Waarborgmij
EES = Eur Econ Samenwerkingsverband
BTL Buitenlandse rechtspersoon
BVO Bedrijfsvoeringsorganisatie
E-COV   Eur coöperatieve vennootschap
E-NV    Eur naamloze vennootschap
GEM Gemeente
KERK    Kerkgenootschap
MIN Ministerie
ONB Onbekend
OPRIV   Overige priv. rechtspersoon
OPUBL   Overige publ. rechtspersoon
PROV    Provincie
RED Rederij
UNIV    Universiteiten
VVE Vereniging van Eigenaren
WAT Waterschap
ZBO Zelfstandig Bestuursorgaan
            </xs:documentation>
        </xs:annotation>
        <xs:simpleType>
            <xs:restriction base="xs:token">
                <xs:minLength value="1"/>
                <xs:maxLength value="5"/>
                <xs:enumeration value="NV"/>
                <xs:enumeration value="BV"/>
                <xs:enumeration value="COOP"/>
                <xs:enumeration value="VER"/>
                <xs:enumeration value="STICH"/>
                <xs:enumeration value="1MANS"/>
                <xs:enumeration value="VOF"/>
                <xs:enumeration value="MTS"/>
                <xs:enumeration value="CV"/>
                <xs:enumeration value="OW"/>
                <xs:enumeration value="EES"/>
                <xs:enumeration value="BTL"/>
                <xs:enumeration value="BVO"/>
                <xs:enumeration value="E-COV"/>
                <xs:enumeration value="E-NV"/>
                <xs:enumeration value="GEM"/>
                <xs:enumeration value="KERK"/>
                <xs:enumeration value="MIN"/>
                <xs:enumeration value="ONB"/>
                <xs:enumeration value="OPRIV"/>
                <xs:enumeration value="OPUBL"/>
                <xs:enumeration value="PROV"/>
                <xs:enumeration value="RED"/>
                <xs:enumeration value="UNIV"/>
                <xs:enumeration value="VVE"/>
                <xs:enumeration value="WAT"/>
                <xs:enumeration value="ZBO"/>
            </xs:restriction>
        </xs:simpleType>
    </xs:element>

    
    <xs:element name="Projectrol">
        <xs:annotation>
            <xs:documentation>
S = Samenwerking
        </xs:documentation>
        </xs:annotation>
        <xs:simpleType>
            <xs:restriction base="xs:token">
                <xs:maxLength value="1"/>
                <xs:minLength value="1"/>
                <xs:enumeration value="S"/>
            </xs:restriction>
        </xs:simpleType>
    </xs:element>
    
    
    <xs:element name="Projectrelaties">
        <xs:annotation>
            <xs:documentation/>
        </xs:annotation>
        <xs:complexType>
           <xs:sequence>
                <xs:element ref="Projectrelatie" minOccurs="0" maxOccurs="5"/>
            </xs:sequence>
        </xs:complexType>
    </xs:element>
    
    
    <xs:element name="Projectrelatieplaatsnaam">
        <xs:annotation>
            <xs:documentation/>
        </xs:annotation>
        <xs:simpleType>
            <xs:restriction base="xs:token">
                <xs:maxLength value="60"/>
            </xs:restriction>
        </xs:simpleType>
    </xs:element>
    
    
    <xs:element name="Projectrelatiebijdrage">
        <xs:annotation>
            <xs:documentation>
              Omschrijf de bijdrage van deze partij(en). Voorbeelden: toeleverancier hardware, uitvoeren analyses of duurtesten, detailengineering, bouwen prototype, opdrachtgever waarvoor of waarbij het project wordt uitgevoerd, etc. 
              
            </xs:documentation>
        </xs:annotation>
        <xs:simpleType>
            <xs:restriction base="xs:token">
                <xs:maxLength value="80"/>
            </xs:restriction>
        </xs:simpleType>
    </xs:element>
    
    
    <xs:element name="Projectrelatienaam">
        <xs:annotation>
            <xs:documentation/>
        </xs:annotation>
        <xs:simpleType>
            <xs:restriction base="xs:token">
                <xs:maxLength value="60"/>
                <xs:minLength value="1"/>
            </xs:restriction>
        </xs:simpleType>
    </xs:element>
    
    <xs:element name="Projectrelatie">
        <xs:annotation>
            <xs:documentation>
Levert een of meer partijen (buiten uw fiscale eenheid) een bijdrage aan het project?

            </xs:documentation>
        </xs:annotation>
        <xs:complexType>
            <xs:all>
                <xs:element ref="Projectrol"/>
                <xs:element ref="Projectrelatienaam"/>
                <xs:element ref="Projectrelatieplaatsnaam" minOccurs="0"/>
                <xs:element ref="Projectrelatiebijdrage" minOccurs="0"/>
            </xs:all>
        </xs:complexType>
    </xs:element>
    <xs:element name="Projectnummer">
        <xs:annotation>
            <xs:documentation/>
        </xs:annotation>
        <xs:simpleType>
            <xs:restriction base="xs:token">
                <xs:maxLength value="25"/>
                <xs:minLength value="1"/>
            </xs:restriction>
        </xs:simpleType>
    </xs:element>
    <xs:element name="Projectnaam">
        <xs:annotation>
            <xs:documentation/>
        </xs:annotation>
        <xs:simpleType>
            <xs:restriction base="xs:token">
                <xs:maxLength value="200"/>
                <xs:minLength value="1"/>
            </xs:restriction>
        </xs:simpleType>
    </xs:element>

    
    <xs:element name="Projectfasen">
        <xs:annotation>
            <xs:documentation/>
        </xs:annotation>
        <xs:complexType>
            <xs:sequence>
                <xs:element ref="Projectfase" minOccurs="1" maxOccurs="50"/>
            </xs:sequence>
        </xs:complexType>
    </xs:element>
    <xs:element name="Projectfase">
        <xs:annotation>
            <xs:documentation>
Omschrijf per fase uw eigen SO-werkzaamheden binnen het project 
(SO-werkzaamheden van het bedrijf waarvoor u deze WBSO-aanvraag indient). 
Uit de fasering moet ook de vermoedelijke einddatum van het SO-project blijken.         
            </xs:documentation>
        </xs:annotation>
        <xs:complexType>
            <xs:all>
                <xs:element ref="DatumGereed" />
                <xs:element ref="Ontwikkeling" />
            </xs:all>
        </xs:complexType>
    </xs:element>
    <xs:element name="Project">
        <xs:annotation>
            <xs:documentation/>
        </xs:annotation>
        <xs:complexType>
            <xs:all>
                <xs:element ref="EProjectId"/>
                <xs:element ref="Projectnaam"/>
                <xs:element ref="Projectnummer"/>
                <xs:element ref="DatumStart" />
                <xs:element ref="Projectfasen"/>
                <xs:element ref="Projectrelaties" minOccurs="0"/>
            </xs:all>
        </xs:complexType>
    </xs:element>
    <xs:element name="Postcode">
        <xs:annotation>
            <xs:documentation>';
            $xml .= $service_details->company->post_code?$service_details->company->post_code:'---';
            $xml .= '<xs:documentation/>
        </xs:annotation>
        <xs:simpleType>
            <xs:restriction base="xs:token">
                <xs:maxLength value="6"/>
                <xs:pattern value="([1-9][0-9]{3}[A-Z]{2})?"/>
            </xs:restriction>
        </xs:simpleType>
    </xs:element>
    <xs:element name="Plaatsnaam">
        <xs:annotation>
            <xs:documentation>';
            $xml .= $service_details->company->place_name?$service_details->company->place_name:'---';
            $xml .= '<xs:documentation/>
        </xs:annotation>
        <xs:simpleType>
            <xs:restriction base="xs:token">
                <xs:minLength value="1"/>
                <xs:maxLength value="30"/>
                <xs:pattern value="[^a-z]*"/>
            </xs:restriction>
        </xs:simpleType>
    </xs:element>

    
    <xs:element name="PersoonsgegevensParticulier">
        <xs:annotation>
            <xs:documentation/>
        </xs:annotation>
        <xs:complexType>
            <xs:all>
                <xs:element ref="BSN"/>
                <xs:element ref="Titel" minOccurs="0"/>
                <xs:element ref="Voorletters"/>
                <xs:element ref="Voornaam" minOccurs="0"/>
                <xs:element ref="Tussenvoegsels" minOccurs="0"/>
                <xs:element ref="Achternaam"/>
                <xs:element ref="Geslacht" minOccurs="0"/>
            </xs:all>
        </xs:complexType>
    </xs:element>

    
    <xs:element name="PersoonsgegevensContactpersoon">
        <xs:annotation>
            <xs:documentation/>
        </xs:annotation>
        <xs:complexType>
            <xs:all>
                <xs:element ref="Titel" minOccurs="0"/>
                <xs:element ref="Voorletters" minOccurs="0"/>
                <xs:element ref="Voornaam" minOccurs="0"/>
                <xs:element ref="Tussenvoegsels" minOccurs="0"/>
                <xs:element ref="Achternaam"/>
                <xs:element ref="Geslacht" minOccurs="0"/>
            </xs:all>
        </xs:complexType>
    </xs:element>
    <xs:element name="Organisatienaam">
        <xs:annotation>
            <xs:documentation>';
            $xml .= $service_details->company->name?$service_details->company->name:'---';
            $xml .= '<xs:documentation/>
        </xs:annotation>
        <xs:simpleType>
            <xs:restriction base="xs:token">
                <xs:minLength value="1"/>
                <xs:maxLength value="125"/>
            </xs:restriction>
        </xs:simpleType>
    </xs:element>

    
    <xs:element name="Organisatiejaren">
        <xs:annotation>
            <xs:documentation/>
        </xs:annotation>
        <xs:complexType>
            <xs:choice maxOccurs="unbounded">
                <xs:element ref="Organisatiejaar"/>
            </xs:choice>
        </xs:complexType>
    </xs:element>

    
    <xs:element name="Organisatiejaar">
        <xs:annotation>
            <xs:documentation/>
        </xs:annotation>
        <xs:complexType>
            <xs:all>
                <xs:element ref="Boekjaar"/>
                <xs:element ref="AantalWerknemers"/>
            </xs:all>
        </xs:complexType>
    </xs:element>
    <xs:element name="OrganisatiegegevensDeelnemer">
        <xs:annotation>
            <xs:documentation>
            Verplichte elementen voor deelnemerrol = INT:
                [Organisatienaam]
                [KvKNummer]
            Verplichte elementen voor deelnemerrol = ANV:
                [Organisatienaam]
                [KvKNummer]
                [Rechtsvorm]
                [TechnologieCode]
                [VPBPlichtig]
                [FiscaalNummer]                         als [AanvraagVoor] = W/B
                [Organisatiejaren]
            </xs:documentation>
        </xs:annotation>
        <xs:complexType>
            <xs:all>
                <xs:element ref="Organisatienaam"/>
                <xs:element ref="KvKNummer"/>
                <xs:element ref="Rechtsvorm" minOccurs="0"/>
                <xs:element ref="RechtsvormAfwijkend" minOccurs="0"/>
                <xs:element ref="FiscaalNummer" minOccurs="0"/>
                <xs:element ref="TechnologieCode" minOccurs="0"/>
                <xs:element ref="VPBPlichtig" minOccurs="0"/>
                <xs:element ref="Organisatiejaren" minOccurs="0"/>
            </xs:all>
        </xs:complexType>
    </xs:element>

    
    <xs:element name="Ontwikkeling">
        <xs:annotation>
            <xs:documentation/>
        </xs:annotation>
        <xs:simpleType>
            <xs:restriction base="xs:token">
                <xs:maxLength value="120"/>
            </xs:restriction>
        </xs:simpleType>
    </xs:element>
    
    
    <xs:element name="KvKNummer">
        <xs:annotation>
            <xs:documentation>';
            $xml .= $service_details->company->kvk?$service_details->company->kvk:'---';
            $xml .= '<xs:documentation/>
        </xs:annotation>
        <xs:simpleType>
            <xs:restriction base="xs:token">
                <xs:length value="8"/>
                <xs:pattern value="[0-9]*"/>
            </xs:restriction>
        </xs:simpleType>
    </xs:element>
    
    
    <xs:element name="Internetadres">
        <xs:annotation>
            <xs:documentation>';
            $xml .= $service_details->company->www?$service_details->company->www:'---';
            $xml .= '<xs:documentation/>
        </xs:annotation>
        <xs:simpleType>
            <xs:restriction base="xs:token">
                <xs:maxLength value="60"/>
                <xs:minLength value="1"/>
            </xs:restriction>
        </xs:simpleType>
    </xs:element>

    
    <xs:element name="Huisnummertoevoeging">
        <xs:annotation>
            <xs:documentation/>
        </xs:annotation>
        <xs:simpleType>
            <xs:restriction base="xs:token">
                <xs:maxLength value="12"/>
            </xs:restriction>
        </xs:simpleType>
    </xs:element>
    <xs:element name="Huisnummer">
        <xs:annotation>
            <xs:documentation>';
            $xml .= $service_details->company->house_number?$service_details->company->house_number:'---';
            $xml .= '<xs:documentation/>
        </xs:annotation>
        <xs:simpleType>
            <xs:restriction base="xs:token">
                <xs:maxLength value="6"/>
                <xs:minLength value="1"/>
                <xs:pattern value="([1-9][0-9]*)?"/>
            </xs:restriction>
        </xs:simpleType>
    </xs:element>

    
    <xs:element name="Geslacht">
        <xs:annotation>
            <xs:documentation>M = Man
V = Vrouw
O = Onbekend
            </xs:documentation>
        </xs:annotation>
        <xs:simpleType>
            <xs:restriction base="xs:token">
                <xs:enumeration value="M"/>
                <xs:enumeration value="V"/>
                <xs:enumeration value="O"/>
            </xs:restriction>
        </xs:simpleType>
    </xs:element>

    
    <xs:element name="FiscaalNummer">
        <xs:annotation>
            <xs:documentation/>
        </xs:annotation>
        <xs:simpleType>
            <xs:restriction base="xs:token">
                <xs:maxLength value="10"/>
            </xs:restriction>
        </xs:simpleType>
    </xs:element>
    <xs:element name="Emailadres">
        <xs:annotation>
            <xs:documentation>';
            $xml .= $service_details->user->email?$service_details->user->email:'---';
            $xml .= '<xs:documentation/>
        </xs:annotation>
        <xs:simpleType>
            <xs:restriction base="xs:token">
                <xs:maxLength value="60"/>
                <xs:minLength value="1"/>
            </xs:restriction>
        </xs:simpleType>
    </xs:element>
    <xs:element name="EProjectId">
        <xs:annotation>
            <xs:documentation/>
        </xs:annotation>
        <xs:simpleType>
            <xs:restriction base="xs:positiveInteger"/>
        </xs:simpleType>
    </xs:element>

    
    <xs:element name="EDeelnemerId">
        <xs:annotation>
            <xs:documentation/>
        </xs:annotation>
        <xs:simpleType>
            <xs:restriction base="xs:positiveInteger"/>
        </xs:simpleType>
    </xs:element>
    <xs:element name="Dossierdeelnemer">
        <xs:annotation>
            <xs:documentation/>
        </xs:annotation>
        <xs:complexType>
            <xs:choice>
                <xs:element ref="DeelnemerOrganisatie"/>
                <xs:element ref="DeelnemerParticulier"/>
            </xs:choice>
        </xs:complexType>
    </xs:element>

    
    <xs:element name="Deelnemerrol">
        <xs:annotation>
            <xs:documentation>ANV = Aanvrager
INT = Intermediair
            </xs:documentation>
        </xs:annotation>
        <xs:simpleType>
            <xs:restriction base="xs:token">
                <xs:length value="3"/>
                <xs:pattern value="[A-Z]*"/>
                <xs:enumeration value="ANV"/>
                <xs:enumeration value="INT"/>
            </xs:restriction>
        </xs:simpleType>
    </xs:element>
    <xs:element name="DeelnemerParticulier">
        <xs:annotation>
            <xs:documentation/>
        </xs:annotation>
        <xs:complexType>
            <xs:all>
                <xs:element ref="EDeelnemerId"/>
                <xs:element ref="PersoonsgegevensParticulier"/>
            </xs:all>
        </xs:complexType>
    </xs:element>
    <xs:element name="DeelnemerOrganisatie">
        <xs:annotation>
            <xs:documentation/>
        </xs:annotation>
        <xs:complexType>
            <xs:all>
                <xs:element ref="Deelnemerrol"/>
                <xs:element ref="EDeelnemerId"/>
                <xs:element ref="OrganisatiegegevensDeelnemer"/>
                <xs:element ref="Adressen" minOccurs="0"/>
                <xs:element ref="CommunicatieadressenDeelnemer" minOccurs="0"/>
                <xs:element ref="ContactpersonenDeelnemer" minOccurs="0"/>
            </xs:all>
        </xs:complexType>
    </xs:element>
    <xs:element name="DatumStart">
        <xs:annotation>
            <xs:documentation>';
            $xml .= $service_details->start_date?$service_details->start_date:'---';
            $xml .= '<xs:documentation/>
        </xs:annotation>
        <xs:simpleType>
            <xs:restriction base="xs:date"/>
        </xs:simpleType>
    </xs:element>
    <xs:element name="DatumGereed">
        <xs:annotation>
            <xs:documentation>';
            $xml .= $service_details->end_date?$service_details->end_date:'---';
            $xml .= '<xs:documentation/>
        </xs:annotation>
        <xs:simpleType>
            <xs:restriction base="xs:token">
                <xs:maxLength value="30"/>
            </xs:restriction>
        </xs:simpleType>
    </xs:element>
    
    
    <xs:element name="Contactpersoonrol">
        <xs:annotation>
            <xs:documentation>CON = Contactpersoon
            </xs:documentation>
        </xs:annotation>
        <xs:simpleType>
            <xs:restriction base="xs:token">
                <xs:maxLength value="3"/>
                <xs:minLength value="1"/>
                <xs:enumeration value="CON"/>
            </xs:restriction>
        </xs:simpleType>
    </xs:element>
    <xs:element name="ContactpersoonDeelnemer">
        <xs:annotation>
            <xs:documentation/>
        </xs:annotation>
        <xs:complexType>
            <xs:all>
                <xs:element ref="PersoonsgegevensContactpersoon"/>
                <xs:element ref="CommunicatieadressenDeelnemer" minOccurs="0"/>
                <xs:element ref="Contactpersoonrol" minOccurs="0"/>
            </xs:all>
        </xs:complexType>
    </xs:element>
    <xs:element name="ContactpersonenDeelnemer">
        <xs:annotation>
            <xs:documentation/>
        </xs:annotation>
        <xs:complexType>
            <xs:choice maxOccurs="unbounded">
                <xs:element ref="ContactpersoonDeelnemer"/>
            </xs:choice>
        </xs:complexType>
    </xs:element>
    <xs:element name="CommunicatieadressenDeelnemer">
        <xs:annotation>
            <xs:documentation/>
        </xs:annotation>
        <xs:complexType>
            <xs:choice maxOccurs="unbounded">
                <xs:element ref="Emailadres" minOccurs="0"/>
                <xs:element ref="Internetadres" minOccurs="0"/>
                <xs:element ref="TelefoonnummerMobiel" minOccurs="0"/>
                <xs:element ref="Telefoonnummer" minOccurs="0"/>
            </xs:choice>
        </xs:complexType>
    </xs:element>

    
    <xs:element name="Boekjaar">
        <xs:annotation>
            <xs:documentation/>
        </xs:annotation>
        <xs:simpleType>
            <xs:restriction base="xs:integer">
                <xs:enumeration value="2021"/>
            </xs:restriction>
        </xs:simpleType>
    </xs:element>

    
    <xs:element name="BSN">
        <xs:annotation>
            <xs:documentation/>
        </xs:annotation>
        <xs:simpleType>
            <xs:restriction base="xs:token">
                <xs:maxLength value="10"/>
                <xs:pattern value="[0-9]*"/>
            </xs:restriction>
        </xs:simpleType>
    </xs:element>

    
    <xs:element name="TechnologieCode">
        <xs:annotation>
            <xs:documentation>
Deze technologiecode vervangt de oude BSI codes:
1   aard- en milieuwetenschappen
2   biotechnologie
3   bodem-, lucht- en watertechnologie
4   chemische engineering
5   chemische wetenschappen
6   civiele techniek
7   computer- en informatiewetenschappen
8   dierlijke wetenschappen
9   elektrotechniek
10  fysische wetenschappen
11  gezondheidswetenschappen
12  levensmiddelentechnologie
13  materialentechnologie
14  mechanische techniek
15  medische technologie
16  medische wetenschappen en farma
17  nanotechnologie
18  plantaardige wetenschappen
            </xs:documentation>
        </xs:annotation>
        <xs:simpleType>
            <xs:restriction base="xs:integer">
                <xs:minInclusive value="1"/>
                <xs:maxInclusive value="18"/>
                <xs:fractionDigits value="0"/>
            </xs:restriction>
        </xs:simpleType>
    </xs:element>
    <xs:element name="AttachmentDescription">
        <xs:simpleType>
            <xs:restriction base="xs:token">
                <xs:minLength value="1"/>
            </xs:restriction>
        </xs:simpleType>
    </xs:element>
    <xs:element name="AttachmentContent">
        <xs:simpleType>
            <xs:restriction base="xs:base64Binary">
                <xs:minLength value="1"/>
            </xs:restriction>
        </xs:simpleType>
    </xs:element>

    
    <xs:element name="Adressoort">
        <xs:annotation>
            <xs:documentation>VST = Vestigingsadres
COR = Correspondentieadres
            </xs:documentation>
        </xs:annotation>
        <xs:simpleType>
            <xs:restriction base="xs:token">
                <xs:enumeration value="VST"/>
                <xs:enumeration value="COR"/>
            </xs:restriction>
        </xs:simpleType>
    </xs:element>
    <xs:element name="Adressen">
        <xs:annotation>
            <xs:documentation/>
        </xs:annotation>
        <xs:complexType>
            <xs:choice maxOccurs="unbounded">
                <xs:element ref="Adres"/>
            </xs:choice>
        </xs:complexType>
    </xs:element>
    <xs:element name="Adres">
        <xs:annotation>
            <xs:documentation/>
        </xs:annotation>
        <xs:complexType>
            <xs:all>
                <xs:element ref="Adressoort"/>
                <xs:element ref="Straatnaam"/>
                <xs:element ref="Huisnummer"/>
                <xs:element ref="Huisnummertoevoeging" minOccurs="0"/>
                <xs:element ref="Postcode" minOccurs="0"/>
                <xs:element ref="Plaatsnaam"/>
            </xs:all>
        </xs:complexType>
    </xs:element>
    <xs:element name="Achternaam">
        <xs:annotation>
            <xs:documentation>';

            $xml .= $service_details->user->lastname?$service_details->user->lastname:"---";
            $xml .= '<xs:documentation/>
        </xs:annotation>
        <xs:simpleType>
            <xs:restriction base="xs:token">
                <xs:minLength value="1"/>
                <xs:maxLength value="60"/>
            </xs:restriction>
        </xs:simpleType>
    </xs:element>

    
    <xs:element name="Aanvraagnaam">
        <xs:annotation>
            <xs:documentation/>
        </xs:annotation>
        <xs:simpleType>
            <xs:restriction base="xs:token">
                <xs:maxLength value="200"/>
                <xs:minLength value="1"/>
            </xs:restriction>
        </xs:simpleType>
    </xs:element>

    
    <xs:element name="AantalWerknemers">
        <xs:annotation>
            <xs:documentation/>
        </xs:annotation>
        <xs:simpleType>
            <xs:restriction base="xs:integer">
                <xs:minInclusive value="0"/>
            </xs:restriction>
        </xs:simpleType>
    </xs:element>
</xs:schema>
';


            }


            $xmlName = $service_details->company->name."-".date('j F, Y',strtotime(date("Y-m-d H:i:s")))."-".strtotime(date("Y-m-d H:i:s")).".xml";
            $data = [
                'generate_pdf_id'   => $service_details->id,
                "user_id"           => auth()->id(),
                'xml_name'          => $xmlName,
                'xml_content'       => json_encode($xml),
            ];
            // dd($data);
            pdfXmls::updateOrCreate(['generate_pdf_id' => $service_details->id], $data);
        }

        if($pageType && $pageType=='api'){
            $response = array(
                "status" => "Success",
                "message" => "XML Succesfully Generated."
            );
            echo json_encode($response);exit;
        }else{
            return redirect()->route('company-pdf' , $service_details->company_id)->withStatus(__("XML Succesfully Generated"));
        }
        
    }

    public function superadmin_delete_xmls(Request $request){
        if (auth()->user()->hasRole('super admin')){
            $xmlIds = json_decode($request->xmlIds);
            foreach ($xmlIds as $key => $value) {
                pdfXmls::where("id" , $value)->delete();
            }

            echo json_encode("done");exit;
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function update(Request $request, $slug)
    {
        // dd($request->all());
        $exist = pdf::where('slug',$slug)->first();
        if (auth()->user()->hasRole('super admin') && $exist){

            $validate = [
                'company'        => 'required',
                'user'           => 'required',
            ];


            if($request->service!='wbso' || ($request->service=='wbso' && $request->wbso_type=='complete')){
                $validate['datepicker']         = 'required';
                $validate['ref_number']         = 'required';
                $validate['hour_rate']          = 'required';
                // $validate['project_number.*']   = 'required|regex:/^[0-9\.\-\/]+$/';
                $validate['project_name.*']     = 'required';
                $validate['project_hours.*']    = 'required';
            }

        

            $validator = $request->validate($validate);


            if($request->service!='wbso' || ($request->service=='wbso' && $request->wbso_type=='complete')){
                $splitted_dates = explode(" - ", $request->datepicker);
                $start_date = date("Y-m-d", strtotime($splitted_dates[0]));
                $end_date = date("Y-m-d", strtotime($splitted_dates[1]));
            }

            $i = 0;
            
            $data = [
                'slug'              => $slug,
                'company_id'        => $request->company,
                'user_id'           => $request->user,
            ];
            

            if($request->service!='wbso' || ($request->service=='wbso' && $request->wbso_type=='complete')){
                $data['start_date']         = $start_date;
                $data['end_date']           = $end_date;
                $data['in_months']          = $request->in_month?$request->in_month:NULL;
                $data['ref_number']         = $request->ref_number;
                $data['hour_rate']          = $request->hour_rate;
                $data['total_hours']        = $request->total_hours?$request->total_hours:NULL;
                $data['total_amount']       = $request->amount_total?$request->amount_total:NULL;
                $data['amount_per_month']   = $request->amount_per_month?$request->amount_per_month:NULL;
            }

            // if($request->wbso_type){
            //     $data['wbso_type']  = $request->wbso_type;
            // }
            
            // $generate_pdf = Pdf::create($data);
            $generate_pdf = Pdf::where('slug', $slug)->update($data);
            if($generate_pdf && $request->service!='wbso' || ($request->service=='wbso' && $request->wbso_type=='complete')){
                foreach ($request->project_name as $key => $value) {
                    $data = [
                        'generate_pdf_id'   => $exist->id,
                        'name'              => $value,
                        // 'number'            => $value,
                        'hours'             => $request->project_hours?$request->project_hours[$key]:NULL,
                        // 'created_at'        => date("Y-m-d H:i:s"),
                    ];

                    $pdfProjects = pdfProjects::where('id', $key)->updateOrCreate($data);
                }
            }
        }
        return redirect()->route('company-pdf' , $request->company)->withStatus(__("Data succesfully been Updated"));
    }

    /**
     * Toggle the status of a company
     *
     * @param $id
     * @return string
     */
    public function toggle($id)
    {

        if (auth()->user()->hasRole('super admin')){
            $service = companyAttachmentsPdf::where('ref_id' , $id)->where('type' , 'Pdf')->first();
            // dd($service);
            if ($service) {
                $service->status = ($service->status=='Approved')?'Declined':'Approved';
                $service->save();
                return "success";
            } else {
                return "error";
            }

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (auth()->user()->hasRole('super admin')){
            $pdfProjects = pdfProjects::where('generate_pdf_id', $id)->get();
            foreach ($pdfProjects as $key => $value) {
                pdfProjectActivities::where('pdf_project_id', $value->id)->delete();
            }


            pdfProjects::where('generate_pdf_id', $id)->delete();
            Pdf::destroy($id);
        }
        return redirect()->back()->withStatus(__("Service succesfully deleted.")); 
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

    public function get_previous_services_projects(Request $request) {
        $startDate  = $request->startDate;
        $endDate    = $request->endDate;
        $companyid  = $request->companyid;

        $services=Pdf::where('company_id',$companyid)
        ->where('start_date', '>=' ,$startDate)
        ->where('start_date', '<=' ,$endDate)
        ->where('end_date', '>=' ,$startDate)
        ->where('end_date', '<=' ,$endDate)
        ->get();
        // dd($services);

        $allProjects = array();
        foreach ($services as $key => $value) {
            if($value->pdfProjects){
                foreach ($value->pdfProjects as $key_pp => $value_pp) {
                    $allProjects[] = $value_pp;
                }
            }
        }

        echo json_encode($allProjects);exit;

    }

    public function admin_get_pdf_xmls() {
        if(auth()->user()->hasRole('super admin') || auth()->user()->hasRole('employee')){
            $data = pdfXmls::where('is_downloaded',0)->orderBy("id","DESC");

            if(auth()->user()->hasRole('employee')){
                $data->whereHas('Pdf' , function($subQuery) {
                    $subQuery->where('company_id', auth()->user()->company_id);
                });
            }

            $data = $data->get();
            foreach ($data as $key => $value) {
                $value->pdf;
            }
            echo json_encode($data);exit;
        }
    }

    public function service_xml_log_create(Request $request) {
        $xmlIds = json_decode($request->xmlIds);
        foreach ($xmlIds as $key => $value) {
            $data = [
                'user_id'               => auth()->id(),
                'pdf_xmls_id'           => $value,
                'download_file_name'    => $request->fileName
            ];
            serviceXmlDownloadLogs::create($data);

            $data = [
                "is_downloaded" => 1 
            ];
            pdfXmls::where('id',$value)->update($data);

        }
        echo json_encode('Log Create Succesfully');exit;
    }

    public function view_pdf_xml_downloads(Request $request) {
        return view('pdf.downloaded_xmls');
    }

    public function admin_get_xml_downloads_data(Request $request) {
        $perPage            = $request->header('perPage')?$request->header('perPage'):10;
        $xmlDownloadsData   = serviceXmlDownloadLogs::selectRaw('GROUP_CONCAT(pdf_xmls_id) as pdf_xmls_id, user_id,download_file_name')->groupBy('download_file_name','user_id')->paginate($perPage);

        foreach ($xmlDownloadsData as $key => $value) {
            $valueDetails = explode(",", $value->pdf_xmls_id);
            $name = "";
            foreach ($valueDetails as $key_p => $value_p) {
                $details   = pdfXmls::where('id' , $value_p)->first();
                if($key_p>0){
                    $name .= ", ";
                }
                $name .= $details->xml_name;
            }

            $createdAt   = serviceXmlDownloadLogs::where('download_file_name' , $value->download_file_name)->first();

            $xmlDownloadsData[$key]->files      = $name;
            $xmlDownloadsData[$key]->created_at = $createdAt->created_at;
            $xmlDownloadsData[$key]->user;
        }

        echo json_encode($xmlDownloadsData);exit;
    }
}
