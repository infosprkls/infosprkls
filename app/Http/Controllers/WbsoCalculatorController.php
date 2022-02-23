<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use Illuminate\Support\Carbon;
use App\Wbso;
class WbsoCalculatorController extends Controller
{
    // mangocoders
    
    public function __construct(){
        $this->middleware('role:super user');
        $this->middleware(function ($request, $next) {      
            if(auth()->user()->hasRole('super user')){
                return $next($request);
            }
            else{
                return redirect()->route('home')->withFlashMessage('You are not authorized to access that page.')->withFlashType('warning');
            }
        });
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('tools.create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	$wbso = Wbso::where([['user_id','=',auth()->id()],['company_id', '=' ,auth()->user()->company_id]])->first();
		$record = array();
		$html = array();
		if($wbso){
			$record = json_decode($wbso->details, true);
			$html = $this->create_month_html($record);
		}
		
		return view('super.tools.wbso-calculator.create')->withRecord($record)->withHtml($html);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
    
    public function store(Request $request){
		$p_hour_rate = $request->hour_rate;
		$p_rate_percentage = $request->rate_percentage;
		$p_total_hours = $request->total_hours;
		$p_datepicker = $request->datepicker;
		$p_months = $request->months;
		
		$previous_total_hours = 0;
		$previous_total_price = 0;
		$result = array();
		$result['hour_rate'] = $p_hour_rate;
		$result['rate_percentage'] = $p_rate_percentage;
		$result['details'] = array();
			
		foreach ($p_total_hours as $key => $value) {
			$current_total_hours = 0;	
			$current_total_price = 0;	
				
			if($p_total_hours[$key] && $p_datepicker[$key]){
				$total_hours = $p_total_hours[$key];
				// get months list
				$datepicker = explode("~", $p_datepicker[$key]);
				$months_list = $this->get_months(trim($datepicker[0]), trim($datepicker[1]));
				$month_diff = count($months_list);
				
				$result['details'][$key]['total_hours'] = $total_hours;
				$result['details'][$key]['start_date'] = trim($datepicker[0]);
				$result['details'][$key]['end_date'] = trim($datepicker[1]);
				$result['details'][$key]['month_diff'] = $month_diff;
				$result['details'][$key]['months_list'] = $months_list;
				
				if(isset($p_months[$key]) && count($p_months[$key]) >= $month_diff){
					$hours_list = array();	
					for ($i=0; $i < $month_diff; $i++) { 
						$hours_list[] = $p_months[$key][$i]['amountFilled'];
					}
				}else{
					$hours_list = $this->get_hours_list($total_hours, $month_diff);
				}
				// get hours list
				$result['details'][$key]['hours_list'] = $hours_list;
				$price_and_hour_list = array();
				foreach ($hours_list as $hour_key => $hour_value) {
					
					$algo_price = $this->calculate_algo($hour_value, $p_rate_percentage, $p_hour_rate,$previous_total_hours,$previous_total_price);
					$previous_total_hours += $hour_value;
					$previous_total_price += $algo_price;
					$price_and_hour_list[$hour_key]['hour'] = $hour_value;
					$price_and_hour_list[$hour_key]['price'] = $algo_price;
					
					$current_total_hours += $hour_value;
					$current_total_price += $algo_price;
				}
				$result['details'][$key]['price_and_hour'] = $price_and_hour_list;
				$result['details'][$key]['current_total_hours'] = $current_total_hours;
				$result['details'][$key]['current_total_price'] = $current_total_price;
			}
		}
		
		$data = [
				"user_id" => auth()->id(),
				"company_id" => auth()->user()->company_id,
				"details" => json_encode($result)
			];
		
		$record = Wbso::where([['user_id','=',auth()->id()],['company_id', '=' ,auth()->user()->company_id]])->first();
		if(!empty($record)){
			$record = Wbso::where('id',$record->id)->update($data);
		}else{
			$record = Wbso::create($data);
		}
		$final_result = $this->create_month_html($result);
		return \Response::json(array('success'=>true,'result'=>$final_result));
		
    }
	
	private function create_month_html($result)
	{
		$html_template = $this->get_append_html();
		$result_html = array();
		
		foreach ($result['details'] as $key => $value) {
			$html = $html_template['html_header'];
			
			foreach ($value['price_and_hour'] as $price_and_hour_key => $price_and_hour_value) {
				$html_temp = $html_template['html_body'];
				$html_temp = str_replace("%MONTHNAME%", $value['months_list'][$price_and_hour_key], $html_temp);
				$html_temp = str_replace("%UNIQUEID%", $key, $html_temp);
				$html_temp = str_replace("%INDEX%", $price_and_hour_key, $html_temp);
				$html_temp = str_replace("%HOURS%", $price_and_hour_value['hour'], $html_temp);
				$html_temp = str_replace("%AMOUNT%", $price_and_hour_value['price'], $html_temp);
				$html .= $html_temp;
			}
			$html_temp = $html_template['html_footer'];
			$html_temp = str_replace("%TOTALHOURS%", $value['current_total_hours'], $html_temp);
			$html_temp = str_replace("%TOTALAMOUNT%", $value['current_total_price'], $html_temp);
			$html .= $html_temp;
			$result_html[$key] = $html;
		}
		return $result_html;
	}
	
	
	
	public function pdf(Request $request){
		$wbso = Wbso::where([['user_id','=',auth()->id()],['company_id', '=' ,auth()->user()->company_id]])->first();
		if($wbso){
			$record = json_decode($wbso->details, true);
		}else{
			$record = array();
		}
		$pdf = PDF::loadView('super.tools.wbso-calculator.pdf',['record'=>$record]);  
        return $pdf->download('COMPANY-WBSO-berekening.pdf');
	}
	
	
    // public function generate_pdf_data($datepicker_arr,$total_hours,$hour_rate,$rate_percentage,$months){
//        
        // $parent_arr=[];
//         
        // $counter_loop=0;
        // $month_loop=1;
        // foreach($datepicker_arr as $dp){
            // $obj=[];
            // $date_arr=explode("~",$dp);
            // $obj['fromDate']=$date_arr[0];
            // $obj['toDate']=$date_arr[1];
            // //$months=$this->diff($date_arr[0],$date_arr[1]);
            // $obj['months']=$months[$month_loop];
//             
            // $obj['totalHours']=$total_hours[$counter_loop];
            // //$obj['filledAmount']=$total_hours[$counter_loop]/count($months);
            // //$obj['algoAmount']=$this->calculate_algo($obj['filledAmount'],$rate_percentage,$hour_rate);
            // $parent_arr[] =$obj;
            // //$parent_arr[]=$dp;
            // //$parent_arr[0]['months']=['January','Feb'];
            // $counter_loop +=1;
            // $month_loop +=1;
//             
        // }
//         
        // return $parent_arr;
    // }
    public function calculate_algo($current_hours,$p_rate_percentage,$p_hour_rate,$previous_total_hours,$previous_total_price){
	    
		/**
		 * Also, the first 1800 hours there is the €10, above it it should be €4. So when we take 10000 hours. It should make
			January: (1667*22 = 36674) + (1667*10=16670) = 21337.6 (40% of 53344)
			February (1667*22 = 36674) + (133*10=1330) + (1534*4=6136) = 17656 (40% of 44140)
			March and further should be then (1667*22=36674)+(1667*4=6668) = 17336 (40% of 43342)
			So the first 1800 hours in a year are with €10 calculated, the rest of the year is with €4
		 */	
		$step_1 = $current_hours * $p_hour_rate;
		
		if($previous_total_hours > 1800){
			$price = $step_1 + $current_hours * 4;
		}else{
			$sum_price = $current_hours + $previous_total_hours;
			if($sum_price <= 1800){
				$price = $step_1 + ($current_hours * 10);
			}else{
				$diff_amount = $sum_price-1800;
				$price = $step_1 +($diff_amount*4) + ($current_hours-$diff_amount)*10;
			}
		}
		if($price > 350000){
			$price=$price*16/100;
		}else{
			$price=$price*$p_rate_percentage/100;
		}
		return $price;
		
	}

    public function diff($from_date,$to_date){
        $output = [];
        $time   = strtotime($from_date);
        $last   = date('M-Y', strtotime($to_date));

        do {
        $month = date('M-Y', $time);
        $total = date('t', $time);

        $output[] = $month;

        $time = strtotime('+1 month', $time);
        } while ($month != $last);

        
        return $output;
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
	
	//PARA: Date Should In YYYY-MM-DD Format
	//RESULT FORMAT:
	// '%y Year %m Month %d Day %h Hours %i Minute %s Seconds'        =>  1 Year 3 Month 14 Day 11 Hours 49 Minute 36 Seconds
	// '%y Year %m Month %d Day'                                    =>  1 Year 3 Month 14 Days
	// '%m Month %d Day'                                            =>  3 Month 14 Day
	// '%d Day %h Hours'                                            =>  14 Day 11 Hours
	// '%d Day'                                                        =>  14 Days
	// '%h Hours %i Minute %s Seconds'                                =>  11 Hours 49 Minute 36 Seconds
	// '%i Minute %s Seconds'                                        =>  49 Minute 36 Seconds
	// '%h Hours                                                    =>  11 Hours
	// '%a Days                                                        =>  468 Days
	//////////////////////////////////////////////////////////////////////
	function dateDifference($date_1 , $date_2 , $differenceFormat = '%a' )
	{
	    $datetime1 = date_create($date_1);
	    $datetime2 = date_create($date_2);
	    
	    $interval = date_diff($datetime1, $datetime2);
	    
	    return $interval->format($differenceFormat) + 1;
	    
	}
	
	private function get_months($from,$to)
	{
		$month_list = array();
		$diff = $this->dateDifference($from, $to,"%m");
		$startMonth = date("m",strtotime($from));
		$startYear = date("Y",strtotime($from));
		for ($i=0; $i < $diff; $i++) {
			$month_list[] = date("F Y",strtotime("+$i months", strtotime($from)));
		}
		return $month_list;
	}
	private function get_hours_list($total_hours, $month_diff)
	{
		$diff = $total_hours/$month_diff;
		$hours = array();
		for ($i=0; $i < $month_diff; $i++) { 
			$hours[] = round($diff);
		}
		return $hours;
		
	}
	private function get_append_html()
    {
    	$data['html_header'] = '<div class="col-12 pb-1"> <h4 class="mb-0 pt-lg-3 pt-md-3 pt-sm-2 pt-2 grayish"> Months: </h4> </div>';
		$data['html_body'] = '<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 mt-lg-3 mt-md-3 mt-sm-4 mt-4">
						<div class="custom-intact-form position-relative"> 
							<h6 class="mb-0 position-absolute">%MONTHNAME%</h6> 
							<div class="row m-0"> 
								<div class="col-6 px-1"> 
									<div class="form-group m-0 p-0">
										<label class="col-form-label pt-0">verbruikte uren</label> 
										<input  class="form-control ind_amount_filled" type="number" name="months[%UNIQUEID%][%INDEX%][amountFilled]"  id="amountFilled_%UNIQUEID%" placeholder="verbruikte uren" value="%HOURS%" required=""> 
									</div> 
								</div> 
								<div class="col-6 px-1"> 
									<div class="orm-group m-0 p-0"> 
										<label class="col-form-label pt-0">berekend bedrag</label>
										<input class="form-control disable" type="text" name="months[%UNIQUEID%][%INDEX%][algoAmount]" id="amountFilled_%UNIQUEID%_algo" placeholder="Amount from algorhitm" value="%AMOUNT%" required=""> 
									</div> 
								</div> 
							</div> 
						</div>
					</div>';
		$data['html_footer'] = '<div class="row mt-3 w-100 mx-0">
							<div class="col-lg-6 col-md-6 col-sm-12 col-12 custom-input"> 
								<label class="col-form-label float-left">Total Hours:</label>
								<div class="form-group float-left m-0 p-0">
									<input class="form-control pl-2 disable" type="text" value="%TOTALHOURS%" required="">
								</div> 
							</div> 
							<div class="col-lg-6 col-md-6 col-sm-12 col-12 custom-input"> 
								<label class="col-form-label float-left">Total Amount:</label>
								<div class="form-group float-left m-0 p-0"> 
									<input class="form-control pl-2 disable" type="text" value="%TOTALAMOUNT%" required="">
								</div>
							</div>
						</div>';
    	return $data;

	}
	
	
}
