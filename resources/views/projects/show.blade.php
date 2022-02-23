@extends('layouts.app', ['activePage' => 'projects', 'titlePage' => __('Projects')])
@section('page-script-head')
    <link href="https://fonts.googleapis.com/css?family=Orbitron&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
	
	<link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
	
	<style>
		.add_task_title:hover {
		  cursor: pointer;
		}
		.a-bare{
			color: #fff;
		}
		.a-bare:hover, .a-bare:visited, .a-bare:active{
			color: #fff;
		}
		.month-card{
		}
		.day{
			font-size: 10px;
			text-align: center;
		}
		.add-one-task{}
		.task{
			font-size: 11px;
			font-weight: bold;
		}
		.task-title{}
		.wrapper{
			height: auto;
			min-height: 100%;
		}
		.form-row .form-row-f { margin:  0 -1.5em; }
		.col-f      { padding: 0  1.5em; }

		.form-row:after {
			content: "";
			clear: both;
			display: table;
		}

		@media only screen { .col-f {
			float: left;
			width: 2.85%;
			box-sizing: border-box;
		}}
		@media only screen { .col-f-2 {
			float: left;
			width: 8.5%;
			box-sizing: border-box;
		}}
		
		.ui-datepicker-calendar {
			display: none;
		}
		
		#ModalMonth{
			display: none;
		}
		
		.modal {
		  display: none; /* Hidden by default */
		  position: fixed; /* Stay in place */
		  z-index: 99; /* Sit on top */
		  left: 0;
		  top: 0;
		  width: 100%; /* Full width */
		  height: 100%; /* Full height */
		  overflow: auto; /* Enable scroll if needed */
		  background-color: rgb(0,0,0); /* Fallback color */
		  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
		}

		/* Modal Content/Box */
		.modal-content {
		  background-color: #fefefe;
		  margin: 15% auto; /* 15% from the top and centered */
		  padding: 20px;
		  border: 1px solid #888;
		  width: 80%; /* Could be more or less, depending on screen size */
		}

		/* The Close Button */
		.close {
		  color: #aaa;
		  float: right;
		  font-size: 28px;
		  font-weight: bold;
		}

		.close:hover,
		.close:focus {
		  color: black;
		  text-decoration: none;
		  cursor: pointer;
		}
	</style>
@endsection
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="col-12">
                <div class="card" id="normal-first" style="display: none;">
                    <div class="card-header card-header-{{$project->CardHeader}}">
                        {{$project->name}}
						<span style="float: right; margin-right: 50px">
							<a href="{{route('projects.edit', $project)}}" class="a-bare" title="Edit Project"><i class="material-icons">edit</i></a>
							<a href="javascript:void(0);" class="a-bare" id="normal-mode" title="Normal Mode"><i class="material-icons">apps</i></a>
							<a href="javascript:void(0);" class="a-bare" id="sheet-mode" title="Sheet Mode"><i class="material-icons">dashboard</i></a>
							<!--<a href="javascript:void(0);" class="a-bare" id="expand-compact" title="Expand/Compact"><i class="material-icons">code</i></a>-->
						</span>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-4 col-12">
                                <h4 class="card-title">Status: {{$project->status}}</h4>
                                <p class="card-text">Responsible user: 
                                	@if(isset($project->responsibleUser->fullname))
                                		{{$project->responsibleUser->fullname}}
                                	@endif
                                </p>
                                <p class="card-text">Project started at: {{$project->started_at}}</p>
                                <p class="card-text">Project deadline: {{$project->deadline}}</p>
                                <p class="card-text">Project Hours: {{$project->amount_of_hours}}</p>
                            </div>
                            <div class="col-sm-8 col-12">
                                <table class="table table-striped" id="bookingTable">
                                    <thead>
                                    <th>Activity</th>
                                    <th>Work Start</th>
                                    <th>Work End</th>
                                    <th>Delete</th>
                                    @if(auth()->id() == $project->responsible_user_id)
                                        <th>Done by:</th>
                                    @endif
                                    </thead>
                                    <tbody id="tableContent">
                                        @foreach ($bookings as $booking)
                                            <tr>
                                                <td>{{isset($booking->activity) ? $booking->activity : "no activity set"}}</td>
                                                <td>{{\Carbon\Carbon::createFromTimestamp($booking->start)->toDateTimeString()}}</td>
                                                <td>{{\Carbon\Carbon::createFromTimestamp($booking->end)->toDateTimeString()}}</td>
                                                @if(auth()->id() == $project->responsible_user_id)
                                                    <td>{{$booking->createdBy->fullname}}</td>
                                                @endif
                                                <td><a class="btn btn-danger removebutton" id="{{$booking->id}}">
                                                        <i class="material-icons text-white">delete_forever</i>
                                                    </a></td>
                                            </tr>
                                        @endforeach
                                        <tr id="beforeForm">
                                            <form onsubmit="event.preventDefault();" id="hourForm"
                                                  class="form-group" action="{{route('projects.store')}}">
                                                <td><input  id="timerActivity" class="form-control" type="text"
                                                           placeholder="What are you working on?"></td>
                                                <td>
                                                    <div id="timer" style="font-family: 'Orbitron', sans-serif;">00:00:00</div>
                                                </td>
                                                <td>
                                                    <button id="timerButton" class="btn btn-success">
                                                        Start
                                                    </button>
                                                </td>
                                            </form>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-muted">
                    </div>
                </div>
                @include('includes.errors')
                <div class="card" id="normal-second" style="display: none;">
                    <div class="card-header card-header-primary">
                        Manually add some hours
                    </div>
                    <div class="card-body">
                        <form action="{{route('hours.store', ['projectID'=>$project->id])}}" method="POST">
                            <div class="form-row">
                                {{csrf_field()}}
                                <input type="hidden" name="manual" value="true">
                                <div class="form-group col">
                                    <label for="activity"></label>
                                    <input type="text" name="activity" id="activity" class="form-control"
                                           placeholder="Activity"
                                           aria-describedby="helpId">
                                    <small id="helpId" class="text-muted">Activity</small>
                                </div>
                                <div class="form-group col">
                                    <label for="timeStart"></label>
                                    <input type="text" name="startTime" id="startTime" class="form-control "
                                           placeholder="Time Started"
                                           aria-describedby="helpId">
                                    <small id="helpId" class="text-muted">Time Started</small>
                                    <button class="btn btn-info" onclick="event.preventDefault()">now</button>
                                </div>
                                <div class="form-group col">
                                    <label for="timeEnd"></label>
                                    <input type="text" name="endTime" id="endTime" class="form-control "
                                           placeholder="Time Done"
                                           aria-describedby="helpId" value="{{\Carbon\Carbon::now(env('timezone'), "Y-mm-dd HH:mm:ss")}}">
                                    <small id="helpId" class="text-muted">Time Done</small>
                                    <button class="btn btn-info" onclick="event.preventDefault()">now</button>
                                </div>
                            </div>
                            <div class="form-row">
                                <input type="submit" value="Submit" class="btn btn-success">
                            </div>
                        </form>
                    </div>
                </div>
				<div class="card" id="sheet-first">
                    <div class="card-header card-header-{{$project->CardHeader}}">
                        {{$project->name}}
						<span style="float: right; margin-right: 50px">
							<a href="{{route('projects.edit', $project)}}" class="a-bare" title="Edit Project"><i class="material-icons">edit</i></a>
							<a href="javascript:void(0);" class="a-bare" id="normal-mode1" title="Normal Mode"><i class="material-icons">apps</i></a>
							<a href="javascript:void(0);" class="a-bare" id="sheet-mode1" title="Sheet Mode"><i class="material-icons">dashboard</i></a>
							<!--<a href="javascript:void(0);" class="a-bare" id="expand-compact1" title="Expand/Compact"><i class="material-icons">code</i></a>-->
						</span>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6 col-12">
                                <h4 class="card-title">Status: {{$project->status}}</h4>
                                <p class="card-text">Responsible user: 
                                	@if(isset($project->responsibleUser->fullname))
                                	{{$project->responsibleUser->fullname}}
                                	@endif
                                </p>
                                <p class="card-text">Project Hours:<span id="total-hours"> 0</span></p>
                            </div>
                            <div class="col-sm-6 col-12">
                                <h4 class="card-title">Deadlines:</h4>
                                <p class="card-text">Project started at: {{$project->started_at}}</p>
                                <p class="card-text">Project deadline: {{$project->deadline}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-muted">
                    </div>
                </div>
				<div id="months-container">
					
				</div>
				
				<div class="card" id="msg-card" style="margin-bottom: 0px; display: none;">
					<div class="card-body" style="padding: 10px">
						<div class="form-row">
							<div class="col-md-12" style="text-align: center;">
								<h4 style="margin: 0" id="msg-data">Months Saved Successfully!</h3>
							</div>
						</div>
					</div>
				</div>
				<div class="card" id="options-card" style="margin-top: 0px">
					<div class="card-body">
						<div class="form-row" style="flex-wrap: nowrap">
							<input type="button" value="Add Task" class="btn btn-success col-md-6" id="add-task">
							<input type="submit" value="Save Months" class="btn btn-success col-md-6" id="save-months">
						</div>
					</div>
				</div>
				<div class="card" id="sheet-attachments">
                    <div class="card-header card-header-primary" style="display: flex">
                        <span style="margin: auto 0">Attachments</span>
						<span style="float: right; margin-right: 50px; margin-left: auto">
							<form method="POST" action="{{route('attachment.store', ['projectID'=>$project->id])}}" id="upload-form">
							<!--<a href="javascript:void(0);" class="a-bare" id="normal-mode" title="Normal Mode">Upload <i class="material-icons">cloud_upload</i></a>-->
							<div class="file btn btn-secondary" style="overflow: hidden; position: relative" id="upload-button">
								Upload Attachment <i class="material-icons">cloud_upload</i>
								<input type="file" accept="image/*" id="file-upload" name="file" style="position: absolute; font-size: 50px; opacity: 0; right: 0; top; 0"/>
							</div>
							</form>
						</span>
                    </div>
                    <div class="card-body" id="attachment-container">
                        
                    </div>
                    <div class="card-footer text-muted">
                    </div>
                </div>
            </div>
        </div>
		<div id="ModalMonth">Month/Year:
			<select id="select-month"><option value=1>January</option><option value=2>February</option><option value=3>March</option><option value=4>April</option><option value=5>May</option><option value=6>June</option><option value=7>July</option><option value=8>August</option><option value=9>September</option><option value=10>Octobar</option><option value=11>November</option><option value=12>December</option></select>
			<select id="select-year">
			@for($i=2000; $i<2030; $i++)
				<option>{{$i}}</option>
			@endfor
			</select>
			<button id="month-select" class="btn btn-primary">Select</button>
		</div>
		
		<div id="ModalDayExtra" class="modal" data-day="" data-task="">

		  <!-- Modal content -->
		  <div class="modal-content">
		  	<div class="modal-header pl-0">
		        <h3 class="modal-title font-weight-bold mt-0" id="task_title_heading">Modal title</h3>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
			<div class="form-group mt-4">
				<div class="row align-items-start">
					<div class="col-xl-6 col-lg-5 col-md-5 col-sm-12 col-12 row m-0 px-0">
						<div class="row mx-0 w-100">
							<div class="col-lg-2 col-md-3 col-sm-12 col-12 mb-lg-0 mb-sm-2 mb-2">
								Hours:
							</div>
							<div class="col-xl-7 col-lg-9 col-md-9 col-sm-12 col-12">
								<input type="text" id="day-extra-hours" placeholder="0" style="width: 100%"/>
								<input type="hidden" id="day-extra-task-title" placeholder="Task Title" style="width: 100%" readonly/>
								<input type="hidden" id="day-extra-person" placeholder="Owner Name" style="width: 100%" readonly/>
							</div>
						</div>
						<div class="row mx-0 w-100 mt-lg-4 mt-md-4 mt-sm-3 mt-3">
							<div class="col-lg-2 col-md-3 col-sm-12 col-12 mb-lg-0 mb-sm-2 mb-2">
								Date:
							</div>
							<div class="col-xl-7 col-lg-9 col-md-9 col-sm-12 col-12">
								<input type="text" id="day-extra-date" placeholder="0" style="width: 100%" readonly/>
							</div>
						</div>

						<div class="row mx-0 w-100 mt-lg-4 mt-md-4 mt-sm-3 mt-3">
							<div class="col-lg-5 col-6">
								Attachments:
							</div>
							<div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-6  text-right">
								<button id="day-extra-add-attachment" class="btn btn-primary" style="margin-top: -5px">Add</button>
							</div>
							<div class="col-12 mt-4" id="day-extra-attachments-container" style="overflow-y: scroll">
							</div>
						</div>
					</div>
						
					<div class="col-xl-6 col-lg-5 col-md-5 col-sm-12 col-12 row m-0 px-0">
						<div class="row mx-0 w-100">
							<div class="col-lg-12 col-sm-12 row m-0 align-items-start mt-lg-0 mt-md-0 mt-sm-3 mt-3 githubSection">
								<input type="text" id="day-extra-github" placeholder="Github Repo Link:" class="col-lg-7 col-md-6 col-sm-6 githubLink">
								<button id="day-extra-open-github" class="btn btn-primary my-lg-0 my-md-0 my-sm-0 my-3 ml-lg-3 ml-md-1 ml-sm-3 ml-0 day-extra-open-github">Open Link</button>
								<div class="custom-addition ml-auto mt-lg-0 mt-md-0 mt-sm-2 mt-4">
									<button id="addGithubRepo" class="btn btn-warning rounded-circle ml-auto my-0 p-0 d-flex align-items-center justify-content-center">
									<span class="material-icons">add_circle</span>
									</button>
								</div>
							</div>
						</div>

						<div class="row mx-0 w-100 mt-lg-4 mt-md-4 mt-sm-3 mt-3">
							<div class="col-12">
								<h4>Description</h4>
								<textarea style="width: 100%; height: 100%" rows="8" id="day-extra-description"></textarea>
							</div>
						</div>
					</div>					
				</div>
				<div class="row">
					<div class="col-12 text-right">
						<button id="day-extra-save" class="btn btn-primary">Save</button>
						<button id="day-extra-cancel" class="btn btn-primary">Cancel</button>
					</div>
				</div>
			</div>
		  </div>

		</div>
    </div>
	<!-- Modal -->
	<div class="modal fade" id="max_hours" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLongTitle">Max Hours Warning</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	      	Max 24 hours Allowed.
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	        <button type="button" class="btn btn-primary">Save changes</button>
	      </div>
	    </div>
	  </div>
	</div>
@endsection

@section('page-script')
	
    <script src="https://cdn.jsdelivr.net/npm/easytimer@1.1.1/src/easytimer.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.js" integrity="sha256-H9jAz//QLkDOy/nzE9G4aYijQtkLt9FvGmdUTwBk6gs=" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
	<script src="{{asset('js/jquery.are-you-sure.js')}}"></script>


	<script>
		var hour_type = "{{ $company->hour_type }}"

	</script>

    <script>
    	
        $( document ).ready(function() {
			$(document).on('keyup','.task-title', function(e) {
				var val = $(this).val();
				$(this).parent().children('.add_task_title').css('display','block');
				$(this).parent().children('.add_task_title').attr('data-title', val);
			});
			
			function custom_round ($focusout_this = "") {
				if($focusout_this){
					var value = $focusout_this.val()
			  	}else{
					var value = $this.val()
			  	}
			  	val_split = value.split('.')
				if (typeof val_split[1] !== 'undefined') {
					if(val_split[1] == "" ){
				  		value = parseInt(val_split[0]) + 0.25;
				  	}else if(val_split[1] == 5){
				  		value = parseInt(val_split[0]) + 0.50;
					}else if(val_split[1] == 7){
				  		value = parseInt(val_split[0]) + 0.75;
					}else if(val_split[1] > 0 && val_split[1] <= 25){
				  		value = parseInt(val_split[0]) + 0.25;
					}else if(val_split[1] > 25 && val_split[1] <= 50){
						value = parseInt(val_split[0]) + 0.50;
					}else if(val_split[1] > 50 && val_split[1] <= 75){
						value = parseInt(val_split[0]) + 0.75;
					}else if(val_split[1] > 75){
						value = parseInt(val_split[0]) + 1;
					}
				}
				if($focusout_this){
					$focusout_this.val(value);
				}else{
					$this.val(value);
				}
			}
			
			var typingTimer;                //timer identifier
			var doneTypingInterval = 5000;
			
			$(".day").on('keydown', function () {
			  clearTimeout(typingTimer);
			});
			var $this;
			
			$(document).on('focusout','.day', function(e) {
				custom_round($(this));
			})
			
			
			
			$(document).on('keyup','.day', function(e) {
				clearTimeout(typingTimer);
  				typingTimer = setTimeout(custom_round, doneTypingInterval);
				$this = $(this);
			
				// decimal point
				//var totalhrs=parseInt($(this).val());
				var totalhrs=Number($(this).val());
				// $(this).val(totalhrs);
				//if(Math.floor(totalhrs) == totalhrs && $.isNumeric(totalhrs) && totalhrs!='') {
				if($.isNumeric(totalhrs) && totalhrs!='') {
					var date=$(this).data('fulldate');
					var days = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
					var d = new Date(date);
					var dayName = days[d.getDay()];
					if((dayName=='Sunday' || dayName=='Saturday')){
						if(totalhrs>8 && totalhrs<25){
							alert('Above 8 Hours Are Entered.');
						}else if(totalhrs>24){
							alert('Max 24 Hours are allowed.');
							$(this).val(24);
						}else{
							alert('You are typing in weekend.');
							updateTotal($(this).parent().parent().parent());
							updateData(this);
							return false;
						}
							
					}
	
					if(totalhrs>8 && totalhrs<24){
						alert('Above 8 Hours Are Entered.');
					}else if(totalhrs>24){
						alert('Max 24 Hours are allowed.');
						$(this).val(24);
					}
				}else if(totalhrs=='' || isNaN(totalhrs) || totalhrs=="undefined"){
					if($(this).val() == "0." || $(this).val() == "0"){
					}else{
						$(this).val("");
					}		
				}
	    	});
    	
    		$('#day-extra-date').keydown(function(e) {
				var code = e.keyCode || e.which;
				if (code == '9') {
					var currval=$('#day-extra-date').val();
					var result = currval.split('-');
					var year = parseInt(result[0]); 
					var month = parseInt(result[1]); 
					var day = parseInt(result[2]); 

					var date = new Date(year, month, 0);
					var lastDateOfMonth = (date.getDate() + 100).toString().substring(1);
					if(lastDateOfMonth==day && month<12){
						day='01';
						month=month+1;
					}else if(lastDateOfMonth==day && month==12){
						day='01';
						month='01';
						year=year+1;
					}else{
						day=day+1;
					}
					$('#ModalDayExtra').data('day',day);
					day=('0' + day).slice(-2);
					month=('0' + month).slice(-2);
					currval=year+'-'+month+'-'+day;
					$('#day-extra-date').val(currval);
					return false;
				}

			});
        	$(document).on('keyup','#day-extra-hours', function(e) {
    			// decimal point
        		clearTimeout(typingTimer);
  				typingTimer = setTimeout(custom_round, doneTypingInterval);
				$this = $(this);
				
        		<?php if($company->hour_type == "round"){ ?>
					var totalhrs=$('#day-extra-hours').val();
        			if(Math.floor(totalhrs) == totalhrs && $.isNumeric(totalhrs) && totalhrs!='') {
        		<?php }else{ ?>
					var totalhrs=Number($('#day-extra-hours').val());
        			if($.isNumeric(totalhrs) && totalhrs!='') {
        		<?php } ?>
        		
        			var date=$('#day-extra-date').val();
	        		var days = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
					var d = new Date(date);
					var dayName = days[d.getDay()];
					if((dayName=='Sunday' || dayName=='Saturday') && totalhrs>0){
						alert('You are typing in weekend.');;
						if(totalhrs>8 && totalhrs<24){
		        			alert('Above 8 Hours Selected.');
		        		}else if(totalhrs>24){
		        			alert('Max 24 Hours are allowed.');
		        			$('#day-extra-hours').val(24);
		        		}
					}
					
	        		var code = e.keyCode || e.which;
	        		if (code == '13') {
	        			if(totalhrs>8 && totalhrs<24){
		        			alert('Above 8 Hours Selected.');
		        		}else if(totalhrs>24){
		        			alert('Max 24 Hours are allowed.');
		        			$('#day-extra-hours').val(24);
		        		}
		        		updateDataExtra();
		        		closeDayExtra();
		        	}else if(totalhrs>24){
		        			alert('Max 24 Hours are allowed.');
		        			$('#day-extra-hours').val(24);
		        	}
        		}else if(totalhrs==''){
        			// $('#day-extra-hours').val("");
        			// return false;
        			setInputFilter($(this), function(value) {
				  		return /^\d*(\.\d{0,2})?$/.test(value); // Integer >= 0
					});
        		}else{
        			alert('Only Number Allowed.');
        			$('#day-extra-hours').val("");
        			return false;
        		}
        		
			});
            //setting the variables needed
            var timer = new Timer();
            var projectID           = (document.location.href.substring(document.location.href.lastIndexOf('/') + 1));
            var timerFromLS         = window.localStorage.getItem('timer_'+projectID);
            var activityFromLs      = window.localStorage.getItem('activity_'+projectID);
            var startTimeFromLS     = window.localStorage.getItem('startTime_'+projectID);
			var expanded			= localStorage.getItem("expanded") === "false";

			var current_month = {{date('m')}};
			var current_year = {{date('Y')}};

			var current_task = '';
			var current_day = '';
			var months = {};
			var monthsData = {
				months:months,
			};
			
			var monthsdb=<?php echo json_encode($months);?>;
			$.each(monthsdb, function(key, value1) {
				$.each(value1, function(key, value2) {
				 	if(key=='days'){
					    $.each(value2, function(key, value3) {
					    	$.each(value3, function(key, value4) {
					    		var indmonth=key;
					    		if(months.hasOwnProperty(key)){
					    			$.each(value4, function(key, value5) {
					    				if(key=='tasks'){
					    					$.each(value5, function(key, value) {
								    			value['user_id'] = value1.user_id;
						    					months[indmonth]['tasks'].push(value);
					    					});
					    				}
					    			});
					    		}else{
					    			$.each(value4.tasks, function(keyel, valueel) {
					    				value4.tasks[keyel]['user_id'] = value1.user_id;
			    					});
					    			months[key]=value4;
					    		}
							});
						});
					}
				});
			});
			{{-- 
/*			var monthsData = {
				months: {
					@foreach($months as $smonth)
						@foreach($smonth->days->months as $month => $monthData)
						"{{$month}}" : {
							title: "{{$monthData->title}}",
							month: {{$monthData->month}},
							year: {{$monthData->year}},
							tasks: [
							@foreach($monthData->tasks as $task)
								{
									@if($project->project_type=='Person')
									owner: "{{ $project->createdBy->firstname ? $project->createdBy->firstname : '' }} {{ $project->createdBy->lastname ? $project->createdBy->lastname : '' }}",
									@else
									owner: "",
									@endif
									@if(isset($task->duplicate))
									duplicate: "{{$task->duplicate}}",
									@else
									duplicate: "",
									@endif
									title: "{{$task->title}}",
									days: [
									@foreach($task->days as $day)
										{{$day}},
									@endforeach
									],
									extra: [
										@foreach($task->extra as $item)
										{

											link: "{{$item->link}}",
											description: `{{$item->description}}`

										},
										@endforeach
									]
								},
							@endforeach
							]

						},
						@endforeach
					@endforeach
				}
			};*/
			--}}
			var attachments = {
				months: {
					@foreach($attachments as $attachment)
						@foreach($attachment->data->months as $month => $monthData)
						"{{$month}}" : {
							files : [
							@foreach($monthData->files as $file)
								@if($file != null)
								{
									@if(isset($file->owner))
									owner : "{{$file->owner}}",
									@endif
									@if(isset($file->task_title))
									task_title : "{{$file->task_title}}",
									@endif
									id : "{{$file->id}}",
									filename: "{{$file->filename}}",
									down_url: "{{$file->down_url}}",
									date_uploaded: "{{$file->date_uploaded}}",
									task: "{{$file->task}}",
									day: "{{$file->day}}",
								},
								@endif
							@endforeach
							]

						},
						@endforeach
					@endforeach
				}
			};
            window.localStorage.setItem('project', projectID);


			//setupMonthSelecter();
			expandCompact();
			displayCurrentMonth();
			displayCurrentAttachments();
            registerListeners();
            // removeTask();
            showActivityIfSet();
            showTimerIfSet();
            startTimerIfTimerIsSet();
            bindDateTimePickers();
			setInitialTotals();
			startAutoSaveTimer();

            //Set timer frontend to timer from ls

            $(document).on("click" , ".remove_task" , function(){
	    		var remove_task_i = $(this).data("number");
	    		var monthind = $(this).data("monthind");
	    		var userId = $(this).data("user");
				var uTasks = [];
				
				$.each(monthsData.months[monthind].tasks, function(key, val) {
					if(key!=remove_task_i){
						uTasks.push(val);
					}
				})

				monthsData.months[monthind].tasks = uTasks;

				displayCurrentMonth();

				if ($(document).find(".task").length==0){
				    addTask();
				}

				

	    		// $(this).parent().parent().parent().parent().remove();

	    		saveMonths(userId);

	    		
	    	})



			var monthToChange=0, yearToChange=0;
			function setupMonthSelecter(){
				$('#ModalMonth').dialog({
					autoOpen: false,
					title: 'Choose a Month and Year',
					modal: false
				});
				$('#month-year').datepicker({
					dateFormat: "mm/yy",
					changeMonth: true,
					changeYear: true,
					showButtonPanel: true,
					onClose: function(dateText, inst) {

						function isDonePressed(){
							return ($('#ui-datepicker-div').html().indexOf('ui-datepicker-close ui-state-default ui-priority-primary ui-corner-all ui-state-hover') > -1);
						}

						if (isDonePressed()){
							var month = $("#ui-datepicker-div .ui-datepicker-month :selected").val();
							monthToChange = parseInt(month);
							var year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
							yearToChange = parseInt(year);
							$(this).datepicker('setDate', new Date(year, month, 1)).trigger('change');
							 $('.date-picker').focusout()//Added to remove focus from datepicker input box on selecting date
						}
					},
					beforeShow : function(input, inst) {

						inst.dpDiv.addClass('month_year_datepicker')

						if ((datestr = $(this).val()).length > 0) {
							year = datestr.substring(datestr.length-4, datestr.length);
							month = datestr.substring(0, 2);
							$(this).datepicker('option', 'defaultDate', new Date(year, month-1, 1));
							$(this).datepicker('setDate', new Date(year, month-1, 1));
							$(".ui-datepicker-calendar").hide();
						}
					}
				});
			}

            function bindDateTimePickers() {
                $('#startTime').datetimepicker({ footer: true, modal: true , format: 'yyyy-mm-dd HH:mm:ss' , uiLibrary: 'materialdesign'});
                $('#endTime').datetimepicker({ footer: true, modal: true , format: 'yyyy-mm-dd HH:mm:ss' , uiLibrary: 'materialdesign'});
            }

            function registerListeners(){
                $('#timerButton').on('click', handleTimerButtonClick);
                $('#timerActivity').on('blur', updateActivityLS);
                $('.removebutton').on('click',areYouSure);

				$('#timerActivity').on('keypress',function(e) {
                    if(e.which == 13) {
                        startTimer()
                    }
                });

				$('#normal-mode').on('click', chooseNormalMode);
				$('#sheet-mode').on('click', chooseSheetMode);
				$('#normal-mode1').on('click', chooseNormalMode);
				$('#sheet-mode1').on('click', chooseSheetMode);
				$('#expand-compact').on('click', expandCompact);
				$('#expand-compact1').on('click', expandCompact);
				$('#add-task').on('click', addTask);
				$('#save-months').on('click', saveMonths);
				$('#month-select').on('click', calenderSelectMonth);
				$('#file-upload').on('change', uploadFile);

				$('.close').click(function(){
					closeDayExtra();
				});

				$('#day-extra-hours').change(function(){
					//updateDataExtra();
				});
				$('#day-extra-github').change(function(){
					//updateDataExtra();
				});
				$('#day-extra-description').change(function(){
					//updateDataExtra();
				});

				// $('#day-extra-open-github').click(function(){
				$(document).on("click" , ".day-extra-open-github" , function(){
					if($(this).siblings("input").val() != ""){
						var win = window.open($(this).siblings("input").val(), '_blank');
						if (win) {
							//Browser has allowed it to be opened
							win.focus();
						} else {
							//Browser has blocked it
							alert('Please allow popups for this website');
						}
					}
				});

				$('#day-extra-add-attachment').click(function(){
					$('#file-upload').trigger('click');
				});

				$('#day-extra-save').click(function(){
					var totalhrs=$('#day-extra-hours').val();
	        		/*var date=$('#day-extra-date').val();
	        		var days = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
					var d = new Date(date);
					var dayName = days[d.getDay()];
					if((dayName=='Sunday' || dayName=='Saturday') && totalhrs>0){
						alert('You are typing in weekend.');
						return false;
					}*/
					updateDataExtra();
					closeDayExtra();
				});
				$('#day-extra-cancel').click(function(){
					closeDayExtra();
				});
            }

			function closeDayExtra(){
				current_task = '';
				current_day = '';
				$(document).find("body").css('overflow-y', 'scroll');
				$('#ModalDayExtra').css('display', 'none');
				$(document).find(".removeGithub").parent().parent().remove();
			}

			function registerMonthNav(){
				$('#next-month').on('click', nextMonth);
				$('#previous-month').on('click', previousMonth);
				$('#calender-month').on('click', calenderMonth);
			}
			
			function registerTotalListeners(){
				$('.day').each(function(index){
					<?php if($company->hour_type == "round"){ ?>
						setInputFilter($(this), function(value) {
					 		return /^\d*$/.test(value); // Integer >= 0
						});
					<?php }else{ ?>
						setInputFilter($(this), function(value) {
					  		return /^\d*(\.\d{0,2})?$/.test(value); // Integer >= 0
						});
					<?php } ?>
						
					
					
					$(this).change(function(){
						updateTotal($(this).parent().parent().parent());
						updateData(this);
					});
				});
				$('.task-title').each(function(index){
					$(this).change(function(){
						var val = $(this).val();
						var task = $(this).data('task');

						var curMonthStr = "" + current_month + "/" + current_year;
						monthsData.months[curMonthStr].tasks[task].title = val;
					});
				});
				$('.day').each(function(index){
					// alert("ASdas")
					$(this).dblclick(function(){

						displayDayExtra(this);

					});
				});
				$(document).on('click','.add_task_title', function(e) {
					$(this).off('click');
					$a = $(this);
				    if($a.hasClass('disabled')) {
				        return false;
				    }

			   		$a.html("").addClass('disabled');
					var task_title=$(this).data('title');
					var current_month=$(this).data('month');
					var current_year=$(this).data('year');
					var task_no=$(this).data('number');
					var date="" + current_month + "/" + current_year;
					monthsData.months[date].tasks[task_no].duplicate = 'done';
					nextMonthTask(task_title);
				});
			}

			function unregisterTotalListeners(){
				$('.day').each(function(index){
					$(this).off("change input keydown keyup mousedown mouseup select contextmenu drop");
				});
			}

            function showTimerIfSet() {
                if(isset(window.localStorage.getItem('timer_'+projectID))){
                    $('#timer').html(window.localStorage.getItem('timer_'+projectID));
                }
            }

            function showActivityIfSet() {
                if(isset(window.localStorage.getItem('activity_'+projectID))){
                    $('#timerActivity').val(window.localStorage.getItem('activity_'+projectID));
                }
            }

            function updateActivityLS() {
                window.localStorage.setItem('activity_'+projectID, $('#timerActivity').val())
                showActivityIfSet();
            }

            function handleTimerButtonClick() {
                if(!timer.isRunning()){
                    startTimer();
                }else{
                    stopTimer();
                }
            }

            function startTimerIfTimerIsSet() {
                if(isset(window.localStorage.getItem('timer_'+projectID))){
                    startTimer();
                }
            }

            function startTimer() {
                if (isset(window.localStorage.getItem('timer_'+projectID))){
                    if (isset(window.localStorage.getItem('startTime_'+projectID))){
                        timer.start({startValues:{'seconds':totalAmountOfSeconds(window.localStorage.getItem('timer_'+projectID))}});
                    }else{
                        var timerFLS = window.localStorage.getItem('timer_'+projectID);
                        var now = moment().unix();
                        window.localStorage.setItem('startTime_'+projectID, now  - totalAmountOfSeconds(timerFLS));
                        timer.start({startValues:{'seconds':totalAmountOfSeconds(window.localStorage.getItem('timer_'+projectID))}});
                    }
                }else{
                    window.localStorage.setItem('startTime_'+projectID, moment().unix());
                    timer.start()
                }

                toggleTimerButton();

                timer.addEventListener('secondsUpdated', function (e) {
                    document.title = timer.getTimeValues().toString() + " - AiSolutions";
                    $('#timer').html(timer.getTimeValues().toString());
                    window.localStorage.setItem('timer_'+projectID, timer.getTimeValues().toString());
                });
            }

            function stopTimer() {
                timer.stop();
                toggleTimerButton();

                var activity  = window.localStorage.getItem('activity_'+projectID);
                var startTime = window.localStorage.getItem('startTime_'+projectID);
                var project   = window.localStorage.getItem('project');

                // Handle post to server
                $.ajax({
                    type: "POST",
                    url: '{{route('hours.store')}}',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "activity" :activity ,
                        "startTime":startTime,
                        "projectID":project  ,
                        "timer": totalAmountOfSeconds(window.localStorage.getItem('timer_'+projectID))
                    },
                    success: function (response) {
                        window.localStorage.removeItem('timer_'+projectID);
                        window.localStorage.removeItem('activity_'+projectID);
                        window.localStorage.removeItem('startTime_'+projectID);
                        emptyTimerFields();
                        location.reload();
                    }
                });

            }

            function emptyTimerFields() {
                $('#timerActivity').val('');
                $('#timer').text('00:00:00');
            }

            function toggleTimerButton() {
                if(timer.isRunning()){
                    $('#timerButton').addClass('btn-danger').removeClass('btn-success').html('Stop');
                }else{
                    $('#timerButton').removeClass('btn-danger').addClass('btn-success').html('Start');
                }
            }

            function areYouSure() {
                $(this).empty().append("Sure?");
                $(this).addClass('btn-warning text-white').removeClass('btn-danger');
                $(this).on('click',removeBooking);
            }

            function areYouSureAttachment() {
                $(this).empty().append("Sure?");
                $(this).addClass('btn-warning text-white').removeClass('btn-danger');
                $(this).on('click',deleteAttachment);
            }

			function removeBooking() {
                $.ajax({
                    url: '/hours/'+event.target.id,
                    data:{"_token": "{{ csrf_token() }}"},
                    type: 'DELETE',
                    success: function(result) {

                    }
                });
                $(this).parent().parent().remove();
            }

			function deleteAttachment(){
				$('.removebuttonattachment').off('click');
				$(this).off('click');
				$a = $(this);
			    if($a.hasClass('disabled')) {
			        return false;
			    }

			    $a.html("Processing...").addClass('disabled');

				var elem = event.target.id;
				$.ajax({
                    url: '{{route("attachment.delete")}}',
                    data:{"_token": "{{ csrf_token() }}", "id": event.target.id, "project_id": "{{$project->id}}"},
                    type: 'POST',
                    success: function(result) {
						if(result.success){
							var toDelete = null;
							for(var month in attachments.months){
								for(var file in attachments.months[month].files){
									if(attachments.months[month].files[file].down_url.localeCompare(elem) == 0){
										toDelete = file;
										break;
									}
								}
								if(toDelete != null)
									break;
							}
							if(toDelete != null){
								delete attachments.months[month].files[toDelete];
								displayCurrentAttachments();
							}else{
								//alert('Attachment deleted!\nPlease reload page to see changes.');
							}

							displayExtraDayAttachments(current_task, current_day);
							//location.reload();
						}else{
							alert(result.message);
						}
                    }
                });
			}

			function uploadFile(){
				$.ajaxSetup({
					headers: {
						'X-CSRF-TOKEN': '{{csrf_token()}}'
					}
				});
				var task_title=$('#day-extra-task-title').val();
				var owner=$('#day-extra-person').val();
				var formData = new FormData();
				formData.append('file', $('#file-upload').prop('files')[0]);
				formData.append('data', JSON.stringify(attachments));
				formData.append('current_month', current_month);
				formData.append('current_year', current_year);
				formData.append('task', current_task);
				formData.append('day', current_day);
				formData.append('task_title', task_title);
				formData.append('owner', owner);

				$.ajax({
					url: "{{route('attachment.store', ['projectID'=>$project->id])}}",
					type: 'POST',
					data: formData,
					processData : false,
					dataType: 'json',
					contentType: false,
					success: function(result)
					{
						attachments = JSON.parse(result.data);
						displayCurrentAttachments();
						displayExtraDayAttachments(current_task, current_day);
					},
					error: function(data)
					{

					}
				});

			}

			function chooseNormalMode(){
				event.preventDefault();
				$('#normal-first').show();
				$('#normal-second').show();
				$('#sheet-first').hide();
				$('.month-card').hide();
				$('#sheet-attachments').hide();
				$('#options-card').hide();
			}
			function chooseSheetMode(){
				event.preventDefault();
				$('#normal-first').hide();
				$('#normal-second').hide();
				$('#sheet-first').show();
				$('.month-card').show();
				$('#sheet-attachments').show();
				$('#options-card').show();
			}

			function expandCompact(){

				if(expanded){
					$('.sidebar').show();
					$('.main-panel').css('width', 'calc(100% - 260px)');
					expanded = false;
					localStorage.setItem("expanded",false);
				}else{

					$('.sidebar').hide();
					$('.main-panel').css('width', '100%');
					expanded = true;
					localStorage.setItem("expanded",true);

				}
			}

            function totalAmountOfSeconds(time) {
                timeArray = time.split(':');

                var hoursInUnix = timeArray[0] * 60 * 60;
                var minutesInUnix = timeArray[1] * 60;
                var secondsInUnix = timeArray[2];
                hoursInUnix = parseInt(hoursInUnix);
                minutesInUnix = parseInt(minutesInUnix);
                secondsInUnix = parseInt(secondsInUnix);

                return hoursInUnix+minutesInUnix+secondsInUnix
            }

            function isset(data) {
                if(typeof data !== "undefined" && data !== null){
                    return true;
                }else{
                    return false;
                }
            }

			function setInitialTotals(){
				$('.task').each(function(index){
					updateTotal($(this));
				});
			}

			function setInputFilter(textbox, inputFilter) {
			  ["input", "keydown", "keyup", "mousedown", "mouseup", "select", "contextmenu", "drop"].forEach(function(event) {
				textbox.oldValue = "";
				textbox.on(event, function() {
				  if (inputFilter(this.value)) {
					this.oldValue = this.value;
					this.oldSelectionStart = this.selectionStart;
					this.oldSelectionEnd = this.selectionEnd;
				  } else if (this.hasOwnProperty("oldValue")) {
					this.value = this.oldValue;
					this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
				  }
				});
			  });
			}

			function updateTotal(rootCard){
				$result = 0;
				$(rootCard).find(".day").each(function(){
					// decimal point
					// $value = parseInt($(
							// this).val())
					$value = Number($(
							this).val())
					if(!isNaN($value))
						$result += $value;
				});

				$(rootCard).find("#total").attr("value", $result);

				updateTotalProjectHours();
			}

			// function removeTask(remove_task_i){

			// }


			function updateTotalProjectHours(){
				var total=0;
				for(var month in monthsData.months)
					for(var task in monthsData.months[month].tasks)
						for(var day in monthsData.months[month].tasks[task].days)
							total += monthsData.months[month].tasks[task].days[day];
				total = total.toFixed(2);
				total = Number(total);
				$('#total-hours').html(' ' + total);
			}

			function duplicateTask(){
				// alert("SDsddsfd")
				$('#save-months').attr('disabled', true);

				var urlf = "{{route('months.store', ['projectID'=>$project->id])}}";

				$.ajaxSetup({
					headers: {
						'X-CSRF-TOKEN': '{{csrf_token()}}'
					}
				});
				var request = $.ajax({
					url: urlf,
					method: 'post',
					dataType: 'json',
					data: {
						json: true,
						curMonth: current_month,
						curYear: current_year,
						jsonData: JSON.stringify(monthsData)
					},
					success: function(result){

						$('#msg-data').html('Task Duplicated.');
						$('#msg-card').show('slow');
						setTimeout(function(){$('#msg-card').hide('slow');}, 4000);
						$('#save-months').attr('disabled', false);
						$('#sheet-month-form').trigger('reinitialize.areYouSure');
					},
					error: function (xhr, ajaxOptions, thrownError){
						$('#msg-data').html('An error occurred!');
						$('#msg-card').show('slow');
						setTimeout(function(){$('#msg-card').hide('slow');}, 4000);
						$('#save-months').attr('disabled', false);
					}
				});
			}

			function saveMonths(userId=""){
				$('#save-months').attr('disabled', true);

				var urlf = "{{route('months.store', ['projectID'=>$project->id])}}";
				// alert("sdfdsfdsf")
				$.ajaxSetup({
					headers: {
						'X-CSRF-TOKEN': '{{csrf_token()}}'
					}
				});


				// console.log("QQQQQQQQQWWWWWWWWWWWW",monthsData)

				var request = $.ajax({
					url: urlf,
					method: 'post',
					dataType: 'json',
					data: {
						json: true,
						curMonth: current_month,
						userId: userId,
						curYear: current_year,
						jsonData: JSON.stringify(monthsData)
					},
					success: function(result){

						$('#msg-data').html(result.success);
						$('#msg-card').show('slow');
						setTimeout(function(){$('#msg-card').hide('slow');}, 4000);
						$('#save-months').attr('disabled', false);
						$('#sheet-month-form').trigger('reinitialize.areYouSure');
					},
					error: function (xhr, ajaxOptions, thrownError){
						$('#msg-data').html('An error occurred!');
						$('#msg-card').show('slow');
						setTimeout(function(){$('#msg-card').hide('slow');}, 4000);
						$('#save-months').attr('disabled', false);
					}
				});
			}

			function startAutoSaveTimer(){
				var dirty = false;
				if($('#sheet-month-form').hasClass('dirty'))
					dirty = true;

				if(dirty){

					$('#save-months').attr('disabled', true);

					var urlf = "{{route('months.store', ['projectID'=>$project->id])}}";

					$.ajaxSetup({
						headers: {
							'X-CSRF-TOKEN': '{{csrf_token()}}'
						}
					});
					$('#sheet-month-form').trigger('reinitialize.areYouSure');
					var request = $.ajax({
						url: urlf,
						method: 'post',
						dataType: 'json',
						data: {
							json: true,
							curMonth: current_month,
							curYear: current_year,
							jsonData: JSON.stringify(monthsData)
						},
						success: function(result){
							$('#save-months').attr('disabled', false);
							setTimeout(startAutoSaveTimer, 100);
							//$('#sheet-month-form').trigger('reinitialize.areYouSure');
						},
						error: function (xhr, ajaxOptions, thrownError){
							$('#save-months').attr('disabled', false);
							$('#sheet-month-form').addClass('dirty');
							setTimeout(startAutoSaveTimer, 100);
						}
					});
				}else{
					setTimeout(startAutoSaveTimer, 500);
				}
			}

			function updateData(elem){
				var val = Number($(elem).val());
				var task = $(elem).data('task');
				var day = $(elem).data('day')-1;
				var curMonthStr = "" + current_month + "/" + current_year;
				monthsData.months[curMonthStr].tasks[task].days[day] = val;
			}

			function updateDataExtra(){
				var val=$('#day-extra-hours').val();
				if(val==''){
					val=0;
				}
				val = Number(val);
				
				
				if($(document).find(".removeGithub").length){
					var link = $('#day-extra-github').val();
					
					var link = [];
					$(document).find('.githubLink').each(function(i, obj) {
						// alert($(this).val())
					    link.push($(this).val())
					});


				}else{
					var link = $('#day-extra-github').val();
				}



				var desc = $('#day-extra-description').val();
				var task = $('#ModalDayExtra').data('task');
				var day = $('#ModalDayExtra').data('day')-1;
				var currval=$('#day-extra-date').val();
				var task_title=$('#day-extra-task-title').val();
				var project_owner=$('#day-extra-person').val();

				var month_name = function(dt){
				mlist = [ "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December" ];
				  return mlist[dt.getMonth()];
				};
				var monthname= month_name(new Date(currval));
				
				var result = currval.split('-');
				var current_year = parseInt(result[0]); 
				var current_month = parseInt(result[1]); 

				//var day = parseInt(result[2]); 
				var curMonthStr = "" + current_month + "/" + current_year;
				
				if(monthsData.months[curMonthStr]==undefined){

					monthsData.months[curMonthStr] = {
						title: monthname+' '+current_year,
						month: current_month,
						year: current_year,
						tasks: [
							{
								owner: project_owner,
								title: task_title,
								days: getDaysArray(current_month, current_year),
								extra: getDaysExtraArray(current_month, current_year)
							}
						]
					};
				
				}

				monthsData.months[curMonthStr].tasks[task].days[day] = val;
				monthsData.months[curMonthStr].tasks[task].extra[day].link = link;
				monthsData.months[curMonthStr].tasks[task].extra[day].description = desc;
				displayCurrentMonth();

				$('#sheet-month-form').addClass('dirty');
			}

			function displayDayExtra(elem){
				var val = $(elem).val();				
				if (val==0 || val==""){
					val='';
				}else{
					val = Number(val);
				}
				var task = $(elem).data('task');
				var day = $(elem).data('day');
				var task_title = $(elem).data('task_title');
				var owner = $(elem).data('owner');
				current_task = task;
				current_day = day;
				var prv=day-1;
				var curMonthStr = "" + current_month + "/" + current_year;
				var link = monthsData.months[curMonthStr].tasks[task].extra[prv].link;


				if(Array.isArray(link)){
					$.each(link, function(key, val) {
						if(key==0){
							$('#day-extra-github').val(val);
						}else{
							addGithubLink(val);
						}
					});
				}else{
					$('#day-extra-github').val(link);
				}


				var desc = monthsData.months[curMonthStr].tasks[task].extra[prv].description;
				$('#day-extra-person').val(owner);
				$('#task_title_heading').text(task_title);
				$('#day-extra-task-title').val(task_title);
				$('#ModalDayExtra').data('day', day);
				$('#ModalDayExtra').data('task', task);

				$('#day-extra-hours').val(val);
				$('#day-extra-date').val(current_year + "-" + ('0' + current_month).slice(-2) + "-" + ('0' + day).slice(-2));
				
				$('#day-extra-description').val(desc);

				displayExtraDayAttachments(task, day);

				$(document).find("body").css('overflow-y', 'hidden');
				$('#ModalDayExtra').css('display', 'block');
			}

			function displayCurrentAttachments(){

				var curMonth = {};
				var curMonthStr = "" + current_month + "/" + current_year;
				var curMonthAttachments = attachments.months[curMonthStr];
				if(curMonthAttachments !== undefined){
					displayAttachments(curMonthAttachments);
				}else{
					$('#attachment-container').html('');
				}
			}

			function displayCurrentMonth(){
				var curMonth = {};
				var curMonthStr = "" + current_month + "/" + current_year;
				curMonth = monthsData.months[curMonthStr];
				if(curMonth === undefined){
					curMonth = monthsData.months[curMonthStr] = {
						title: moment.months(current_month-1) + " " + current_year,
						month: current_month,
						year: current_year,
						tasks: [
							{
								owner: "",
								title: "",
								days: getDaysArray(current_month, current_year),
								extra: getDaysExtraArray(current_month, current_year)
							}
						]
					};
				}

				displayMonth(curMonth,curMonthStr);
			}

			function displayCurrentMonthTask(task_title){
				var curMonth = {};
				var curMonthStr = "" + current_month + "/" + current_year;
				curMonth = monthsData.months[curMonthStr];
				if(curMonth === undefined){
					curMonth = monthsData.months[curMonthStr] = {
						title: moment.months(current_month-1) + " " + current_year,
						month: current_month,
						year: current_year,
						tasks: [
							{
								owner:"",
								duplicate:'',
								title: task_title,
								days: getDaysArray(current_month, current_year),
								extra: getDaysExtraArray(current_month, current_year)
							}
						]
					};
				}else{
					var tsk=Object.keys(monthsData.months[curMonthStr].tasks).length;
					if(monthsData.months[curMonthStr].tasks[tsk]==undefined){
						monthsData.months[curMonthStr].tasks[tsk]={
								owner: "",
								duplicate: "",
								title: task_title,
								days: getDaysArray(current_month, current_year),
								extra: getDaysExtraArray(current_month, current_year)
							}
					}
				}
			}

			function nextMonthTask(task_title){
				var cmonth=current_month;
				var cyear=current_year;
				var curMonthStr = "" + current_month + "/" + current_year;
				if(monthsData.months[curMonthStr]==undefined){
					monthsData.months[curMonthStr] = {
						title: moment.months(current_month) + " " + current_year,
						month: current_month,
						year: current_year,
						tasks: [
							{
								owner: "",
								title: task_title,
								days: getDaysArray(current_month, current_year),
								extra: getDaysExtraArray(current_month, current_year)
							}
						]
					};
				}
				var dirty = false;
				if($('#sheet-month-form').hasClass('dirty'))
					dirty = true;
				current_month++;
				if(current_month > 12){
					current_month = 1;
					current_year += 1;
				}
				displayCurrentMonthTask(task_title);
				displayCurrentAttachments();
				duplicateTask();
				current_month=cmonth;
				current_year=cyear;
				if(dirty)
					$('#sheet-month-form').addClass('dirty');
			}

			function nextMonth(){
				var dirty = false;
				if($('#sheet-month-form').hasClass('dirty'))
					dirty = true;
				current_month++;
				if(current_month > 12){
					current_month = 1;
					current_year += 1;
				}
				displayCurrentMonth();
				displayCurrentAttachments();
				if(dirty)
					$('#sheet-month-form').addClass('dirty');
			}
			function previousMonth(){
				var dirty = false;
				if($('#sheet-month-form').hasClass('dirty'))
					dirty = true;
				current_month--;
				if(current_month < 1){
					current_month = 12;
					current_year -= 1;
				}
				displayCurrentMonth();
				displayCurrentAttachments();
				if(dirty)
					$('#sheet-month-form').addClass('dirty');
			}

			function calenderMonth(){
				$('#select-month').val(current_month);
				$('#select-year').val(current_year);
				$('#ModalMonth').dialog('open');
			}

			function calenderSelectMonth(){
				var dirty = false;
				if($('#sheet-month-form').hasClass('dirty'))
					dirty = true;
				current_month = parseInt($('#select-month').val());
				current_year = parseInt($('#select-year').val());
				displayCurrentMonth();
				displayCurrentAttachments();
				$('#ModalMonth').dialog('close');
				if(dirty)
					$('#sheet-month-form').addClass('dirty');
			}

			function addTask(){

				var curMonthStr = "" + current_month + "/" + current_year;
				monthsData.months[curMonthStr].tasks.push({
								title: "",
								duplicate: "",
								days: getDaysArray(current_month, current_year),
								extra: getDaysExtraArray(current_month,current_year)
							});

				displayCurrentMonth();
			}

			function getDaysArray(month, year){
				days = [];
				n = daysInMonth(month, year);
				for(var i = 0; i < n; i++)
					days.push(0);
				return days;
			}

			function getDaysExtraArray(month, year){
				extra = [];
				n = daysInMonth(month, year);
				for(var i = 0; i < n; i++)
					extra.push({link: '', description: ''});
				return extra;
			}

			function getDayName(dateStr, locale){
				var date = new Date(dateStr);
				return date.toLocaleDateString(locale, { weekday: 'short' });
			}
			function daysInMonth (month, year) {
                return new Date(year, month, 0).getDate();
            }

			function displayExtraDayAttachments(task, day){

				var curMonth = {};
				var curMonthStr = "" + current_month + "/" + current_year;
				var curMonthAttachments = attachments.months[curMonthStr];
				if(curMonthAttachments === undefined){
					return;
				}
				var files = curMonthAttachments.files;

				var html = "";

				for(var file in files){
					if(files[file].task == task && files[file].day == day){
						html += `
						<div class="row">
							<div class="col-sm-6" style="height: fit-content; margin: auto 0">
								`+files[file].filename+`
							</div>
							<div class="col-sm-3">
								<a href="{{url('/download/attachment/')}}/`+files[file].down_url+`/`+encodeURIComponent(files[file].filename)+`" class="btn btn-primary btn-sm" id="delete-att-1">
									<i class="material-icons">cloud_download</i>
								</a>
							</div>
							<div class="col-sm-3">
								<a class="btn btn-danger btn-sm removebuttonattachment" id="`+files[file].down_url+`">
									<i class="material-icons text-white">delete_forever</i>
								</a>
							</div>
						</div>
						`;
					}
				}
				$('#day-extra-attachments-container').html(html);
				$('.removebuttonattachment').on('click',areYouSureAttachment);
			}

			function displayAttachments(attachments){
				var html = "";
				var files = attachments.files;
				if(files.length>0){
				html += `
					<div class="row">
						<div class="col-sm-2" style="height: fit-content; margin: auto 0;text-align: center;">
							Image
						</div>
						<div class="col-sm-1" style="height: fit-content; margin: auto 0;">
							Type
						</div>
						@if($project->project_type=='Person')
						<div class="col-sm-2" style="height: fit-content; margin: auto 0;">
							Person Name
						</div>
						@else
						<div class="col-sm-2" style="height: fit-content; margin: auto 0;">
							Task Title
						</div>
						@endif
						<div class="col-sm-2" style="height: fit-content; margin: auto 0;">
							File Name
						</div>
						<div class="col-sm-2" style="height: fit-content; margin: auto 0;">
							Date Time
						</div>
						<div class="col-sm-2" style="height: fit-content; margin: auto 0;text-align: center;">
							Action
						</div>
					</div>`;
				for(var file in files){
					html += `
					<div class="row">
						<div class="col-sm-2" style="height: fit-content; margin: auto 0;text-align: center;">
							<img src="{{url('/download/attachment/')}}/`+files[file].down_url+`/`+encodeURIComponent(files[file].filename)+`" style="width:50px">
						</div>`;
						if((files[file].day==null && files[file].task==undefined) || (files[file].day=="" && files[file].task=="")){
							html += `
							<div class="col-sm-1" style="height: fit-content; margin: auto 0">Project</div>`;
						}else{
							html += `
							<div class="col-sm-1" style="height: fit-content; margin: auto 0">Person</div>`;
						}
						html += `
						<div class="col-sm-2" style="height: fit-content; margin: auto 0">`;
						if((files[file].day==null && files[file].task==undefined) || (files[file].day=="" && files[file].task=="") || files[file].task_title==null || files[file].task_title==undefined){
							if((files[file].day==null && files[file].task==undefined) || (files[file].day=="" && files[file].task=="")){
								html += '...';
							}else{
								html += 'Nil';
							}
						}else{
							html += files[file].task_title
						}
						html += `
						</div>
						
						<div class="col-sm-2" style="height: fit-content; margin: auto 0">
							`+files[file].filename+`
						</div>
						<div class="col-sm-2" style="height: fit-content; margin: auto 0">
							`+files[file].date_uploaded+`
						</div>
						<div class="col-sm-1">
							<a href="{{url('/download/attachment/')}}/`+files[file].down_url+`/`+encodeURIComponent(files[file].filename)+`" class="btn btn-primary" id="delete-att-1">
								<i class="material-icons">cloud_download</i>
							</a>
						</div>
						<div class="col-sm-1">
							<a class="btn btn-danger removebuttonattachment" id="`+files[file].down_url+`">
								<i class="material-icons text-white">delete_forever</i>
							</a>
						</div>
					</div>
					`;
				}
				}

				$('#attachment-container').html(html);
				$('.removebuttonattachment').on('click',areYouSureAttachment);
			}

			function displayMonth(month,curMonthStr){
				// alert(curMonthStr)
				var html = `
					<form class="card month-card" id="sheet-month-form"
							action="{{route('months.store', ['projectID'=>$project->id])}}" method="POST">
						<div class="card-header card-header-primary" id="sheet-month-title">
							`+month.title+`
							<span style="float: right; margin-right: 50px"><input type="hidden" id="monthpicker"/>
								<a href="javascript:void(0);" class="a-bare" id="calender-month" title="Choose Month"><i class="material-icons">calendar_today</i></a>
								<a href="javascript:void(0);" class="a-bare" id="previous-month" title="Previous Month"><i class="material-icons">arrow_left</i></a>
								<a href="javascript:void(0);" class="a-bare" id="next-month" title="Next Month"><i class="material-icons">arrow_right</i></a>
							</span>
						</div>
						<div class="card-body">`;

				for(var i = 0; i < month.tasks.length; i++){

					if(month.tasks[i].owner==''){
						var owner='';
					}else{
						var owner=month.tasks[i].owner;
					}
					html += `
							{{csrf_field()}}
							<div id="task_`+i+`" class="task">
								<div class="form-row row-no-gutters">
									<div class="form-group col-f-2">`;

									if(i == 0){
										html += `
										@if($project->project_type=='Person')
										<label for="task-title"></label>
										<small id="helpId" class="text-muted">Person<br/>Name<br/></small>
										@else
										<label for="task-title"></label>
										<small id="helpId" class="text-muted">Task<br/>Title<br/></small>
										@endif


										`;
									}
									// else{
										html += `<div style="display: flex;align-items: center;">
										<a class="remove_task rounded-circle btn btn-danger p-0 mt-2" style="font-size: 13px;min-width: 14px;min-height: 14px;line-height: 14px;color: #fff; order:2;position:relative;right: 3px;" data-monthind="`+curMonthStr+`" data-title="`+month.tasks[i].title+`" data-duplicate="`+month.tasks[i].duplicate+`" data-number="`+i+`" data-user="`+month.tasks[i].user_id+`" data-month="`+month.month+`" data-year="`+month.year+`">-</a>`;
									// }
									// else{
									// 	html += `<div style="display: flex;align-items: center;">`;
									// }
										html += `
										@if($project->project_type=='Person')
										`;
											if(month.tasks[i].duplicate!='done'){
												html += `
												<a class="add_task_title rounded-circle btn btn-success p-0 mt-2 text-white" style="font-size:11px;min-width:14px;min-height:14px;line-height:14px;position:relative;right:5px; order:1;" data-title="`+month.tasks[i].title+`" data-duplicate="`+month.tasks[i].duplicate+`" data-number="`+i+`" data-month="`+month.month+`" data-year="`+month.year+`">+</a>`;
											}
											html += `
											<input type="text" name="task-title[]" id="task-title" class="form-control task-title" style="font-size: 11px; order:3;"
											   placeholder="Person" data-task=`+i+`
											   aria-describedby="helpId"
											   value="`+month.tasks[i].title+`">
										@else
										`;
											if(month.tasks[i].duplicate!='done'){
												html += `
												<a class="add_task_title rounded-circle btn btn-success p-0 mt-2 text-white" style="font-size:11px;min-width:14px;min-height:14px;line-height:14px;position:relative;right:5px; order:1;" data-title="`+month.tasks[i].title+`" data-duplicate="`+month.tasks[i].duplicate+`" data-number="`+i+`" data-month="`+month.month+`" data-year="`+month.year+`">+</a>`;
											}
											html += `
										<input type="text" name="task-title[]" id="task-title" class="form-control task-title" style="font-size: 11px; order:3;"
											   placeholder="Task Title" data-task=`+i+`
											   aria-describedby="helpId"
											   value="`+month.tasks[i].title+`">
										@endif
										</div>
									</div>`;
									for (var j = 0; j < month.tasks[i].days.length; j++){
									html += `
									<div class="form-group col-f">`;
									if(i == 0){
										html += `
										<label for="day-`+j+`"></label>
										<small id="helpId" class="text-muted">`+getDayName(""+current_month+"/"+(j+1)+"/"+current_year,"en-US")+` <br/>`+(j+1)+`</small>`;
										}
										if(hour_type=="round" && month.tasks[i].days[j]<1){
											html += `<input type="text" name="day-`+(j+1)+`[]" id="day-`+(j+1)+`" class="form-control day"
											   placeholder="0" data-task=`+i+` data-day=`+(j+1)+` data-fulldate=`+current_year+'-'+current_month+'-'+(j+1)+`
											   data-task_title="`+month.tasks[i].title+`"
											   data-owner="`+owner+`" aria-describedby="helpId" 
											   value="">`;


										}else{
											html += `<input type="text" name="day-`+(j+1)+`[]" id="day-`+(j+1)+`" class="form-control day"
											   placeholder="0" data-task=`+i+` data-day=`+(j+1)+` data-fulldate=`+current_year+'-'+current_month+'-'+(j+1)+` data-task_title="`+month.tasks[i].title+`"
											   data-owner="`+owner+`" aria-describedby="helpId" 
											   value="`+month.tasks[i].days[j]+`">`;
										}
									html += `</div>`;
									}
									html += `
									<div class="form-group col-f">`;
									if(i == 0){
										html += `
										<label for="total"></label>
										<small id="helpId" class="text-muted">Tot<br/>al<br/></small>`;
									}
									html += `
										<input type="text" name="total" id="total" class="form-control"
											   placeholder="Total"
											   aria-describedby="helpId" style="font-size: 10px; text-align: center">

									</div>

								</div>
							</div>`;
				}

				html += `
						</div>
					</form>
				`;
				$('#months-container').html(html);
				unregisterTotalListeners();
				registerTotalListeners();
				setInitialTotals();
				registerMonthNav();

				$('#sheet-month-form').areYouSure();
			}
        });
    </script>

    <script>
    	var addRepo = '<div class="col-lg-12 col-sm-12 row m-0 align-items-start mt-3 githubSection">';
		addRepo += '<input type="text" id="day-extra-github" placeholder="Github Repo Link:" class="col-lg-7 col-md-6 col-sm-6 githubLink" value="%LINKVAL%">';
		addRepo += '<button class="btn btn-primary my-lg-0 my-md-0 my-sm-0 my-3 ml-lg-3 ml-md-1 ml-sm-3 ml-0 day-extra-open-github">Open Link</button>';
		addRepo += '<div class="custom-addition ml-auto mt-lg-0 mt-md-0 mt-sm-2 mt-4">';
		addRepo += '<button class="add_task_title rounded-circle btn btn-danger p-0 mt-2 d-flex align-items-center justify-content-center removeGithub">';
		addRepo += '<span class="material-icons">remove_circle</span>';
		addRepo += '</button>';
		addRepo += '</div>';
		addRepo += '</div>'



    	$(document).on("click" , "#addGithubRepo", function(e){
    		e.preventDefault();
    		addGithubLink();
    	})



    	$(document).on("click" , ".removeGithub", function(e){
    		e.preventDefault();
    		$(this).parent().parent().remove();
    	})

    	function addGithubLink(val=""){
    		var addGitRepo = addRepo;
    		if(val){
    			addGitRepo = addGitRepo.replace("%LINKVAL%", val);
    		}else{
    			addGitRepo = addGitRepo.replace("%LINKVAL%", "");
    		}
    		
    		$(document).find(".githubSection").last().after(addGitRepo);
    	}
    </script>

    <script>
    	
    </script>

@endsection
