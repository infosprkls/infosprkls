@extends('layouts.app', ['activePage' => 'wbso-calculator', 'titlePage' => __('WBSO Calculator')])
@section('content')
<div class="content">
	<form method="POST" action="{{route('wbso-calculator.store')}}" autocomplete="off" class="form-horizontal"
		id="wbso_calculator_form">
		@csrf
		@method('post')
		<div class="container-fluid">
			<div class="show-error"></div>
			
			<div class="row">
				<div class="col-md-12">
					<div class="card mb-3">
						<div class="card-header card-header-primary">
							<h4 class="card-title">WBSO Calculator</h4>
							<p class="card-category"></p>
						</div>
						<div class="card-body px-0 pb-0" id="parent_plus">
							<div class="row m-0 datediv">
								<div class="col-lg-6 col-md-6 col-sm-12 col-12 custom-input">
									<label class="col-form-label float-left">Uurloon:</label>
									<div class="form-group float-left m-0 p-0">
											<input class="form-control" type="number" min="0" name="hour_rate" id="hour_rate" placeholder="&euro;22" value="@if($record){{ $record['hour_rate'] }}@endif" required="">
									</div>
								</div>
								<div class="col-lg-6 col-md-6 col-sm-12 col-12 custom-input">
									<label class="col-form-label float-left">Percentage:</label>
									<div class="form-group float-left m-0 p-0">
										<select class="selectpicker custom_select" data-style="select-with-transition" title="Rate Percentage" data-size="7" name="rate_percentage" id="rate_percentage" required="">
											<option value="40" @if($record && $record['rate_percentage'] == 40){{ 'Selected' }}@endif>40%</option>
											<option value="50" @if($record && $record['rate_percentage'] == 50){{ 'Selected' }}@endif>50%</option>
										</select>
									</div>
								</div>
							</div>
							@if($record)
								@foreach($record['details'] as $key => $value)
									@if($key == 1)
										<div class="project-detail col-12 px-0" id="parent_sibling">
											<div class="row m-0">
												<div class="col-12">
													<div class="form-group col d-flex flex-wrap align-items-center px-0 custom-addition mt-1 mb-3 border-bottom pb-2">
														<h5 class="mb-0 font-weight-bold">Hours Detail</h5>
														<button title="Add Project" type="button" id="plus_button" class="btn btn-warning rounded-circle ml-auto p-0 text-center repeat my-0">+</button>
													</div>
												</div>
											</div>
									@else
										<div class="project-detail col-12 px-0" id="parent_dynamic_{{$key}}">
											<div class="row m-0">
											<div class="col-12">
												<div class="form-group col d-flex flex-wrap align-items-center px-0 custom-addition mt-1 mb-3 border-bottom pb-2">
													<h5 class="mb-0 font-weight-bold">Hours Detail</h5>
													<button id='minus_{{$key}}' title="Add Project" type="button" class="btn btn-danger rounded-circle ml-auto p-0 text-center repeat my-0">-</button>
												</div>
											</div>
										</div>
									@endif
									
									<div class="repeatable">
										<div class="row position-relative">
											<div class="col-lg-6 col-md-6 col-sm-12 col-12 custom-input">
												<label class="col-form-label float-left">Totaal toegekende uren:</label>
												<div class="form-group float-left m-0 p-0">
													<input class="form-control" type="number"  min="0" name="total_hours[{{$key}}]"
														id="total_hours_{{$key}}" placeholder="10.00" value="{{$value['total_hours']}}" required="">
												</div>
											</div>
											<div class="col-lg-6 col-md-6 col-sm-12 col-12 custom-input">
												<label class="col-form-label float-left">Datepicker:</label>
												<div class="form-group float-left m-0 p-0">
													<input class="form-control daterange" id="datepicker_{{$key}}"
														name="datepicker[{{$key}}]" type="text" placeholder="Datepicker" value="{{$value['start_date'].' ~ '.$value['end_date']}}"
														required="">
												</div>
												<button title="Add Project" type="button" id="process_{{$key}}"
													class="process-btn btn btn-warning rounded-circle ml-auto p-0 text-center repeat my-0"><img
														src="{{ URL::to('/') }}/img/add_calendar.png"
														alt="side-image" />
												</button>
											</div>
											<!-- Months row -->
											<div class="row" id="months_{{$key}}">
												{!! $html[$key] !!}
											</div>
										</div>
									</div>
								</div>
								@endforeach
							@else
								<div class="project-detail col-12 px-0" id="parent_sibling">
									<div class="row m-0">
										<div class="col-12">
											<div class="form-group col d-flex flex-wrap align-items-center px-0 custom-addition mt-1 mb-3 border-bottom pb-2">
												<h5 class="mb-0 font-weight-bold">Hours Detail</h5>
												<button title="Add Project" type="button" id="plus_button"
													class="btn btn-warning rounded-circle ml-auto p-0 text-center repeat my-0">+</button>
											</div>
										</div>
									</div>
									<div class="repeatable">
										<div class="row position-relative">
											<div class="col-lg-6 col-md-6 col-sm-12 col-12 custom-input">
												<label class="col-form-label float-left">Totaal toegekende uren:</label>
												<div class="form-group float-left m-0 p-0">
													<input class="form-control" type="number"  min="0" name="total_hours[1]"
														id="total_hours_1" placeholder="10.00" value="" required="">
												</div>
											</div>
											<div class="col-lg-6 col-md-6 col-sm-12 col-12 custom-input">
												<label class="col-form-label float-left">Datepicker:</label>
												<div class="form-group float-left m-0 p-0">
													<input class="form-control daterange" id="datepicker_1"
														name="datepicker[1]" type="text" placeholder="Datepicker" value=""
														required="">
												</div>
												<button title="Add Project" type="button" id="process_1"
													class="process-btn btn btn-warning rounded-circle ml-auto p-0 text-center repeat my-0"><img
														src="{{ URL::to('/') }}/img/add_calendar.png"
														alt="side-image" />
												</button>
											</div>
											<!-- Months row -->
											<div class="row" id="months_1">
											</div>
										</div>
									</div>
								</div>
							@endif
						</div>
					</div>
					<div class="text-right bg-transparent">
						<a href="{{ route('get_wbso_pdf') }}" class="btn btn-primary print_pdf">Generate PDF</a>
					</div>
				</div>
			</div>
		</div>
	</form>
</div>
@endsection
@push('js')
<script type="text/javascript">
	var error_alert = '<div class="alert alert-danger alert-dismissible fade show" role="alert">%ERROR% <strong></strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';

	<?php if(isset($record['details'])){?>
		var counter_plus = <?php echo key(array_slice($record['details'], -1, 1, true));?>;
	<?php }else{ ?>	
		var counter_plus = 1;
	<?php } ?>
	var options_date = {
		startOfWeek: 'monday',
		separator: ' ~ ',
		locale: {
	      format: 'YYYY-MM-DD'
	    },		autoClose: false,
		startDate: new Date('2021-01-01'),
    	endDate: new Date('2021-12-31'),
	};
	$("#plus_button").click(function () {
		counter_plus += 1;
		$("#parent_plus").append('<div id="parent_dynamic_' + counter_plus + '" class="project-detail col-12 px-0"><div class="row m-0"><div class="col-12"><div class="form-group col d-flex flex-wrap align-items-center px-0 custom-addition mt-1 mb-3 border-bottom pb-2"><h5 class="mb-0 font-weight-bold">Hours Detail</h5><button id=minus_' + counter_plus + ' title="Add Project" type="button" class="btn btn-danger rounded-circle ml-auto p-0 text-center repeat my-0">-</button></div></div></div><div class="repeatable"> <div class="row position-relative"> <div class="col-lg-6 col-md-6 col-sm-12 col-12 custom-input"> <label class="col-form-label float-left">Totaal toegekende uren:</label> <div class="form-group float-left m-0 p-0"> <input class="form-control" type="number" name="total_hours[' + counter_plus + ']" min="0" id="total_hours_' + counter_plus + '" placeholder="10.00" value="" required=""> </div> </div> <div class="col-lg-6 col-md-6 col-sm-12 col-12 custom-input"> <label class="col-form-label float-left">Datepicker:</label> <div class="form-group float-left m-0 p-0"> <input class="form-control daterange" id="datepicker_' + counter_plus + '" name="datepicker[' + counter_plus + ']" type="text" placeholder="Datepicker" value="" required=""> </div><button title="Add Project" type="button" id="process_' + counter_plus + '" class="process-btn btn btn-warning rounded-circle ml-auto p-0 text-center repeat my-0"><img src="{{ URL::to("/") }}/img/add_calendar.png" alt="side-image" /></button> </div><div class="row" id="months_' + counter_plus + '"></div> </div> </div> </div> </div>');
		$('#datepicker_' + counter_plus).dateRangePicker(options_date);
	});
	$('body').on('click', '.btn-danger', function (env) {
		var minus_button_id = $(this).attr('id');
		var index = minus_button_id.lastIndexOf("_");
		var number_to_remove = minus_button_id.substr(index + 1);
		$("#parent_dynamic_" + number_to_remove).remove();
		get_calculations(env);
	});
	$('body').on('click', '.process-btn', function (evt) {
		var is_error = false;
		var number_to_process = counter_plus;
		
		if(!$("#hour_rate").val()){
			show_error("Uurloon field required!");
			is_error = true;
		}
		if(!$("#rate_percentage").val()){
			show_error("Percentage field required!");
			is_error = true;
		}
		
		$('.daterange').each(function(i, obj) {
			var index_id = $(this).attr("id");
			var current_index = index_id.split("_");
			current_index=current_index[1];
    		
    		var total_hours = $("#total_hours_" +current_index).val();
			var date_picker = $("#datepicker_"  +current_index).val();
			if(!total_hours){
				show_error("Totaal toegekende uren field required!");
				is_error = true;
			}
			if(!date_picker){
				show_error("Month field required!");
				is_error = true;
			}
    	
    	});
		
		if(is_error){
			return false;
		}
		
		// Check Duplicate Months Start + 3 month rang check
		var date_list = []
		$('.daterange').each(function(i, obj) {
			var index_id = $(this).attr("id");
			var current_index = index_id.split("_");
			current_index=current_index[1];
		
			var date_picker = $("#datepicker_"  + current_index).val();
		  	converted_date = diff(date_picker);
	  		if(converted_date.length < 3){
	  			show_error("Please select minimum 3 months.");
				is_error = true;
	  		}
	  		date_list = date_list.concat(converted_date);
		});
		
		if(is_error){
			return false;
		}
		
		if(!checkIfArrayIsUnique(date_list)){
			show_error("Selected month already exists");
			return false;
		}
		// Check Duplicate Months End
		get_calculations(evt);
	});
	var monthNames = ["January", "February", "March", "April", "May", "June",
		"July", "August", "September", "October", "November", "December"];
	
	function checkIfArrayIsUnique(myArray) {
	  return myArray.length === new Set(myArray).size;
	}
	
	function show_error(message){
		$(".show-error").prepend(error_alert.replace("%ERROR%", message));
		setTimeout(function() {
	        $(".alert").fadeTo(500, 0).slideUp(500, function(){
		        $(this).remove(); 
		    });
	    }, 5000);
		$('html,body').animate({scrollTop: $(".show-error").offset().top},'slow');	
	}
	
	function diff(date_picker) {
		var index = date_picker.indexOf("~");  // Gets the first index where a space occours
		var first_date = date_picker.substr(0, index); // Gets the first part
		var second_date = date_picker.substr(index + 1);  // Gets the text part
		first_date = new Date(first_date);
		first_year = first_date.getFullYear();
		first_date = monthNames[first_date.getMonth()];
		from = first_date + " " + first_year;
		second_date = new Date(second_date);
		second_year = second_date.getFullYear();
		second_date = monthNames[second_date.getMonth()];
		to = second_date + " " + second_year;
		
		var arr = [];
		var datFrom = new Date('1 ' + from);
		var datTo = new Date('1 ' + to);
		var fromYear = datFrom.getFullYear();
		var toYear = datTo.getFullYear();
		var diffYear = (12 * (toYear - fromYear)) + datTo.getMonth();
		for (var i = datFrom.getMonth(); i <= diffYear; i++) {
			arr.push(monthNames[i % 12] + " " + Math.floor(fromYear + (i / 12)));
		}
		return arr;
	}
	function get_calculations (evt) {
		evt.preventDefault();
		var url = $("#wbso_calculator_form").attr("action");
        var postdata = $("#wbso_calculator_form").serialize();
        var form = $("#wbso_calculator_form")[0];
        $.post(url, postdata, function (out) {
        	$.each(out.result, function (index, value) {
        		$("#months_" + index).empty();
        		$("#months_" + index).append(value);
			});
        })
	}
	
	var $evt = "";
	var typingTimer;                //timer identifier
	var doneTypingInterval = 1500;  //time in ms, 5 second for example	
	$('body').on("keyup", '.ind_amount_filled', function (evt) {
	  $evt = evt;
	  clearTimeout(typingTimer);
	  typingTimer = setTimeout(doneTyping, doneTypingInterval);
	});
	//on keydown, clear the countdown 
	$('body').on("keydown", '.ind_amount_filled', function (evt) {
	  $evt = evt;
	  clearTimeout(typingTimer);
	});

	//user is "finished typing," do something
	function doneTyping () {
	  get_calculations($evt);
	}
	
	$('#datepicker_1').dateRangePicker(options_date);
	
	$('body').addClass('custom-menu');
	$('body').on('click', '#expand-compact', function () {
		$('body').toggleClass('sidepanel_active');
	});
</script>
@endpush