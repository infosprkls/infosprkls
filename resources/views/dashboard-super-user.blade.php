@extends('layouts.app', ['activePage' => 'dashboard', 'titlePage' => __('Dashboard')])

@section('page-script-head')

@endsection

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6 custom-col">
          <div class="card card-stats">
            <div class="card-header card-header-warning card-header-icon">
              <div class="card-icon">
                <i class="material-icons">person</i>
              </div>
              <p class="card-category">Users</p>
              <h3 class="card-title">{{$usersCount}}
                <!--<small>users</small>-->
              </h3>
            </div>
            <div class="card-footer">
              <div class="stats custom-footer">
                <a href="{{ route('users.create') }}">
                	<i class="material-icons">person</i>
                	<span>Add new user...</span>
                </a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 custom-col">
          <div class="card card-stats">
            <div class="card-header card-header-success card-header-icon">
              <div class="card-icon">
                <i class="material-icons">assignment</i>
              </div>
              <p class="card-category">Projects</p>
              <h3 class="card-title">{{$projectsCount}}</h3>
            </div>
            <div class="card-footer">
              <div class="stats custom-footer">
    
                <!-- <i class="material-icons">assignment</i> -->

				<a href="/projects/create"  class="tooltiped">
					<i class="material-icons">library_add</i>
					<span>Add</span>
					<div class="tooltip"> 
					    <div class="arrow"></div> 
					    <div class="tooltip-inner">Add Project</div> 
					</div>
				</a>

				<a href="/project-filter/in-progress"  class="tooltiped">
					<i class="material-icons">assessment</i>
					<span>Progress</span>
					<div class="tooltip"> 
					    <div class="arrow"></div> 
					    <div class="tooltip-inner">In progress projects</div> 
					</div>
				</a>

				<a href="/project-filter/deadline" class="tooltiped">
					<i class="material-icons">warning</i>
					<span>Deadline</span>
					<div class="tooltip"> 
					    <div class="arrow"></div> 
					    <div class="tooltip-inner">Nearest projects deadline</div> 
					</div>
				</a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 custom-col">
          <div class="card card-stats">
            <div class="card-header card-header-danger card-header-icon">
              <div class="card-icon">
                <i class="material-icons">work</i>
              </div>
              <p class="card-category">Total Tasks</p>
              <h3 class="card-title">{{$tasksCount}}</h3>
            </div>
            <div class="card-footer">
              <div class="stats custom-footer">
              	<a href="/view_tasks/current">
	                <i class="material-icons">calendar_view_day</i>
	                <span>Current Month Tasks</span>
	            </a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 custom-col">
          <div class="card card-stats">
            <div class="card-header card-header-info card-header-icon">
              <div class="card-icon">
                <i class="material-icons">watch_later</i>
              </div>
              <p class="card-category">Total Hours</p>
              <h3 class="card-title hours-count">
              	@if(isset($usersearch->total_hours))
              	{{$usersearch->total_hours}}
              	@else
              	{{$hoursCount}}
              	@endif
              </h3>
            
            </div>
            <div class="card-footer">
              <div class="stats custom-footer">
                <div  class="tooltiped">
					<i class="material-icons">watch_later</i>
					<div class="tooltip"> 
					    <div class="arrow"></div> 
					    <div class="tooltip-inner">Calculated from Projects</div> 
					</div>
				</div>
				<input id="date-range" name="date-range" class="form-control" placeholder="select date-range"  value="@if(isset($usersearch->date_range)){{$usersearch->date_range}}@endif">
              </div>
            </div>
          </div>
        </div>
      </div>
	  <div class="row">
		<div class="col">
			<div class="card">
				<div class="card-header card-header-primary d-flex flex-wrap align-items-center">
                    <h4 class="card-title ">Upload Log</h4>
                    <div class="ml-auto content-right">
                    	<a class="btn btn-secondary btn-custom tooltiped" href="{{route('company-documents',auth()->user()->company->id)}}">
                    		<i class="material-icons">assignment</i>
                    		<span>
                    			 {{ __('Documents') }}
                    		</span>
	                       
	                        <div class="tooltip"> 
							    <div class="arrow"></div> 
							    <div class="tooltip-inner">View company documents</div> 
							</div>
	                    </a>
	                    <a class="btn btn-secondary btn-custom tooltiped" href="{{route('company-invoice',auth()->user()->company->id)}}">
	                        <i class="material-icons">assignment</i>
	                        <span>
                    			 {{ __('Invoices') }}
                    		</span>
	                        <div class="tooltip"> 
							    <div class="arrow"></div> 
							    <div class="tooltip-inner">View company invoice</div> 
							</div>
	                    </a>

                    </div>
                    
                </div>
				<div class="card-body container-fluid">
					<div class="center-box">
						<div class="row">
							<div class="col-12">
	                            <form action="{{ route('updateLogo') }}" method="POST" enctype="multipart/form-data">
	                            @csrf
	            				@method('post')
	                            
		                        <div class="dropzone-wrapper">
					              <div class="dropzone-desc w-100">
					                <i class="material-icons">file_upload</i>
					                <p>Choose an image (jpg,png,svg) file or drag it here.</p>
					              </div>
					              
					              <input type="file" accept="image/jpeg,image/svg+xml,image/png" name="logo" id="logo" class="dropzone" required="">
						        </div>
						        @if ($errors->has('logo'))
								        <span id="logo-error" class="error text-danger col-8 offset-2"
								              for="input-logo">{{ $errors->first('logo') }}</span>
								@endif
						        <div class="preview-zone <?php if($user->company->logo){ echo 'image-preview';}?>">
					                <div class="box-body">
					                	<img src="{{$user->company->logo == 'logo.png' ? asset('logo.png') : asset('storage/'.$user->company->logo)}}" alt="Company Logo" />
					                </div>
					            </div>
						        <input type="hidden" id="company_id" name="company_id" value="{{$user->company->id}}">
						        <button type="submit" class="btn btn-primary pull-right upload_btn <?php if($user->company->logo){ echo 'mt-custom';}?>">Upload</button>
						    	</form>
							</div>
							<!-- <div class="col-md-2">
							</div>
							<div class="col-md-2" style="height: fit-content; margin: auto 0">
								<div class="card-header card-header-primary">
									Opened Tasks
								</div>
								<button class="btn btn-primary btn-dash level1" style="height: 100px;">HISTORY ON YEAR</button>
								<button class="btn btn-primary btn-dash level1" style="height: 100px;">TYPE SUBSIDIE</button>
							</div> -->
							<div class="col-md-2" style="height: fit-content; margin: auto 0">
								<button class="btn btn-danger btn-dash level2" style="height: 50px; display: none;">WBSO</button>
								<button class="btn btn-danger btn-dash level2" style="height: 50px; display: none;">MIT</button>
								<button class="btn btn-danger btn-dash level2" style="height: 50px; display: none;">X_</button>
								<button class="btn btn-danger btn-dash level2" style="height: 50px; display: none;">X_</button>
							</div>
							<div class="col-md-2" style="height: fit-content; margin: auto 0">
								<button class="btn btn-primary btn-dash level3" style="height: 100px; display: none;">DOWNLOADS</button>
								<button class="btn btn-primary btn-dash level3" style="height: 100px; display: none;">INVOICES</button>
							</div>
						</div>
					</div>
				</div>
				<!--<div class="card-footer text-muted">
					
				</div>-->
			</div>
		</div>
	  </div>
	  <div class="row">
		<div class="col">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-4">
						<div class="card fixed-height-card">
							<div class="card-header card-header-primary">
								Opened Tasks
							</div>
							<div class="card-body container-fluid" style="overflow-y: auto; padding-bottom: 8px;">
								<div class="row">
									<div class="col-sm-2"  style="height: fit-content; margin: auto 0">
										#
									</div>
									<div class="col-sm-3"  style="height: fit-content; margin: auto 0">
										Task Title
									</div>
									<div class="col-sm-4"  style="height: fit-content; margin: auto 0">
										Project
									</div>
									<div class="col-sm-3"  style="height: fit-content; margin: auto 0">
										Date
									</div>
								</div>
								<hr/>
								<?php 
								if(count($tasks)>10){
									$tasks=array_slice($tasks,0,10);
								}
								?>
								
								@foreach($tasks as $task)
								<div class="row">
									<div class="col-sm-2"  style="height: fit-content; margin: auto 0">
										{{$counter++}}
									</div>
									<div class="col-sm-3"  style="height: fit-content; margin: auto 0">
										<a href="show_tasks/{{$task->project_id}}/{{$task->date}}">{{ ($task->title!='') ? $task->title : __('No Title') }}</a>
									</div>
									<div class="col-sm-4"  style="height: fit-content; margin: auto 0">
										{{$task->project}}
									</div>
									<div class="col-sm-3"  style="height: fit-content; margin: auto 0">
										{{$task->dateformat}}
									</div>
								</div>
								<hr/>
								@endforeach
								@if(count($tasks)>10)
									<div class="row">
									<div class="col-sm-12" style="text-align: center;">
										<a href="/view_tasks/all">View All</a>
									</div>
								</div>
								@endif
								
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="card fixed-height-card">
							<div class="card-header card-header-primary">
								Downloads
							</div>
							<div class="card-body container-fluid" style="overflow-y: auto; padding-bottom: 8px;">
								@foreach($downloads as $download)
								<div class="row">
									<div class="col-sm-8"  style="height: fit-content; margin: auto 0">
										{{$download->title}}
									</div>
									<div class="col-sm-4"  style="height: fit-content; margin: auto 0">
										<a href="{{url('/get/')}}/{{$download->path}}/{{urlencode($download->title)}}" class="btn btn-primary" style="width: 100%"><i class="material-icons">cloud_download</i></a>
									</div>
								</div>
								@endforeach

								@foreach($pdfs as $pdf)
								@if($pdf->file)
								<div class="row">
									<div class="col-sm-8"  style="height: fit-content; margin: auto 0">
										{{-- {{ str_replace(' ','',auth()->user()->company->name) }}.zip --}}
										{{ $pdf->name }}
									</div>
									<div class="col-sm-4"  style="height: fit-content; margin: auto 0">
										<a href="/user/file/{{base64_encode('pdfs/'.$pdf->file)}}" class="btn btn-primary" style="width: 100%"><i class="material-icons">cloud_download</i></a>
									</div>
								</div>
								@endif
								@endforeach
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="card fixed-height-card">
							<div class="card-header card-header-primary">
								Support
							</div>
							<div class="card-body custom-support">
								<form method="POST" action="{{ route('supports.store') }}" autocomplete="off" class="form-horizontal h-100 d-flex flex-wrap">
									@csrf
									@method('post')
									<div class="row mx-0 w-100">
										<div class="col-sm-12 mt-0">
											<div class="form-group{{ $errors->has('role') ? ' has-danger' : '' }}">
												<select required="" class="form-control" name="role" id="input-role">
													<option class="placeholder" value="">Select {{ __('Role') }}</option>
													<option value="super admin">Super Admin</option>
													@if(auth()->user()->hasRole('user'))
													<option value="super user">Super User</option>
													@endif
												</select>
												@if ($errors->has('role'))
												<span id="role-error" class="error text-danger"
													for="input-role">{{ $errors->first('role') }}</span>
												@endif
											</div>
										</div>
										<div class="col-sm-12 mt-0">
											<div class="form-group">
												<input type="text" placeholder="{{ __('Subject') }}" class="form-control" name="subject"
													id="subject" required/>
											</div>
										</div>
										<div class="col-sm-12 mt-0">
											<div class="form-group">
												<textarea rows="1" placeholder="{{ __('Message') }}" class="form-control" name="message"
													id="message" required></textarea> 
											</div>
										</div>
									</div>
									<div class="text-right mt-auto w-100 col-sm-12">
										<button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	  </div>
    </div>
  </div>
@endsection

@push('js')
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
		initHandlers();
		
		function initHandlers(){
			$('.level1').on('click', level1Click);
			$('.level2').on('click', level2Click);
			$('.level3').on('click', level3Click);
			
			$('#chat-text').keypress(chatKeyPress);
		}
		
		function level1Click(){
			$('.level2').show();
			$('.level3').hide();
		}
		function level2Click(){
			$('.level3').show();
		}
		function level3Click(){
			
		}
		
		function chatKeyPress(event){
			var keycode = (event.keyCode ? event.keyCode : event.which);
			if(keycode == '13'){
				var txt = $(this).val();
				if(txt == '')
					return;
				$(this).val('');
				$('.chat-box').append('[' + new Date().toLocaleString() + '] ' + txt + '<br/>');
				$(".chat-box").animate({ scrollTop: $('.chat-box').prop("scrollHeight")}, 100);
			}
		}
    });

</script>
@endpush
