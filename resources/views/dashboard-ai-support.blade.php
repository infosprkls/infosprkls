@extends('layouts.app', ['activePage' => 'dashboard', 'titlePage' => __('Dashboard')])

@section('page-script-head')
<style>
	/*.center-col{
		height: fit-content; margin: auto 0
	}*/
</style>
@endsection

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
		<div class="col">
			<div class="card">
				<div class="card-header card-header-primary">
					Manage Downloads
				</div>
				<div class="card-body">
					<div class="container-fluid">
						<div class="row">
							<div class="col-md-2 center-col">
								Select Company:
							</div>
							<div class="col-md-10 center-col">
								<select class="custom-select" id="select-company-downloads">
								@foreach($companies as $company)
									<option value="{{$company->id}}">{{$company->name}}</option>
								@endforeach
								</select>
							</div>
						</div>
						<div class="row">
							<div class="col-md-2 center-col">
								Upload File:
							</div>
							<div class="col-md-8 center-col">
								<div class="">
									<input type="file" class="" id="upload-file" name="filename">
								</div>
							</div>
							<div class="col-md-2 center-col" style="text-align: end">
								<button id="btn-upload-file" class="btn btn-primary">Upload</button>
							</div>
						</div>
					</div>
					<div class="container-fluid" id="container-downloads" style="margin-top: 16px">
						
					</div>
				</div>
			</div>
		</div>
      </div>
	  <div class="row">
		<div class="col">
			<div class="card">
				<div class="card-header card-header-primary">
					Manage Tasks
				</div>
				<div class="card-body">
					<div class="container-fluid">
						<div class="row">
							<div class="col-md-2 center-col">
								Select Company:
							</div>
							<div class="col-md-10 center-col">
								<select class="custom-select" id="select-company-tasks">
								@foreach($companies as $company)
									<option value="{{$company->id}}">{{$company->name}}</option>
								@endforeach
								</select>
							</div>
						</div>
						<div class="row">
							<div class="col-md-2 center-col">
								Task Title:
							</div>
							<div class="col-md-8 center-col">
								<input type="text" id="txt-task" style="width: 100%" class="form-control"/>
							</div>
							<div class="col-md-2 center-col" style="text-align: end">
								<button id="btn-add-task" class="btn btn-primary">Add Task</button>
							</div>
						</div>
					</div>
					
					<div class="container-fluid" id="container-tasks" style="margin-top: 16px">
						
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
      var data = {
		  companies: {
			  @foreach($companies as $company)
			  "{{$company->id}}": {
				  downloads: [
				  @foreach($company->downloads as $download)
					{
						id: {{$download->id}},
						title: "{{$download->title}}",
						path: "{{$download->path}}",
						date_uploaded: "{{$download->date_uploaded}}",
					},
				  @endforeach
				  ],
				  tasks: [
				  @foreach($company->tasks as $task)
					{
						id: {{$task->id}},
						title: "{{$task->title}}",
					},
				  @endforeach
				  ]
			  },
			  @endforeach
		  }
	  };
	  
	  var curCompany = {{$companies[0]->id}};
	  var curCompanyTask = {{$companies[0]->id}};
	  
	  initHandlers();
	  displayCurrentDownloads();
	  displayCurrentTasks();
	  
	  function initHandlers(){
		$('#select-company-downloads').on('change', changeCompanyDownloads);
		$('#select-company-tasks').on('change', changeCompanyTasks);
		$('#btn-upload-file').on('click', uploadFile);
		$('#btn-add-task').on('click', addTask);
	  }
	  
	  function areYouSureDelete(){
		$(this).empty().append("Sure?");
		$(this).addClass('btn-warning').removeClass('btn-danger');
		$(this).on('click',deleteDownload);
	  }
	  
	  function deleteDownload(){
		$(this).off('click');
		var id = parseInt($(this).data('id'));
		$.ajax({
			url: '{{route("downloads.delete")}}',
			data:{"_token": "{{ csrf_token() }}", "id": id},
			type: 'POST',
			success: function(result) {
				if(result.success){
					var toDelete = null;
					for(var company in data.companies){
						for(var download in data.companies[company].downloads){
							//console.log(attachments.months[month].files[file].down_url + ":" + elem);
							if(data.companies[company].downloads[download].id == id){
								toDelete = download;
								break;
							}
						}
						if(toDelete != null)
							break;
					}
					if(toDelete != null){
						delete data.companies[company].downloads[toDelete];
						displayCurrentDownloads();
					}else{
						alert('Attachment deleted!\nPlease reload page to see changes.');
					}
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
		var formData = new FormData();
		formData.append('file', $('#upload-file').prop('files')[0]);
		formData.append('data', 'JSON.stringify(data)');
		formData.append('company_id', curCompany);
		
		$.ajax({
			url: "{{route('downloads.store')}}",
			type: 'POST',              
			data: formData,
			processData : false,
			dataType: 'json',
			contentType: false,
			success: function(result)
			{
				if(result.success){
					data.companies[result.company_id].downloads.push({
						id: result.id,
						title: result.filename,
						path: result.path,
						date_uploaded: result.date_uploaded,
					});
					
					$('#upload-file').val("");
					displayCurrentDownloads();
				}else{
					alert(result.msg)
				}
			},
			error: function(data)
			{
				console.log(data.responseText);
			}
		});
	  }
	  
	  function areYouSureDeleteTask(){
		$(this).empty().append("Sure?");
		$(this).addClass('btn-warning').removeClass('btn-danger');
		$(this).on('click',deleteTask);
	  }
	  
	  function deleteTask(){
		$(this).off('click');
		var id = parseInt($(this).data('id'));
		$.ajax({
			url: '{{route("tasks.delete")}}',
			data:{"_token": "{{ csrf_token() }}", "id": id},
			type: 'POST',
			success: function(result) {
				if(result.success){
					var toDelete = null;
					for(var company in data.companies){
						for(var task in data.companies[company].tasks){
							//console.log(attachments.months[month].files[file].down_url + ":" + elem);
							if(data.companies[company].tasks[task].id == id){
								toDelete = task;
								break;
							}
						}
						if(toDelete != null)
							break;
					}
					if(toDelete != null){
						delete data.companies[company].tasks[toDelete];
						displayCurrentTasks();
					}else{
						alert('Task deleted!\nPlease reload page to see changes.');
					}
				}else{
					alert(result.message);
				}
			}
		});
	  }
	  
	  function addTask(){
		  var title = $('#txt-task').val();
		  $.ajax({
			url: '{{route("tasks.store")}}',
			data:{"_token": "{{ csrf_token() }}", "title": title, "company_id": curCompanyTask},
			type: 'POST',
			success: function(result) {
				if(result.success){
					data.companies[result.company_id].tasks.push({
						id: result.id,
						title: result.title,
					});
					
					$('#txt-task').val('');
					displayCurrentTasks();
				}else{
					alert(result.msg)
				}
			},
			error: function(data)
			{
				console.log(data.responseText);
			}
		});
	  }
	  
	  function changeCompanyDownloads(){
		curCompany = $('#select-company-downloads').val();
		displayCurrentDownloads();
	  }
	  
	  function changeCompanyTasks(){
		curCompanyTask = $('#select-company-tasks').val();
		displayCurrentTasks();
	  }
	  
	  function displayCurrentTasks(){
		var tasks = data.companies[curCompanyTask].tasks;
		var html = `
					<div class="row" style="font-weight: bolder">
						<div class="col-md-1 center-col">ID</div>
						<div class="col-md-8 center-col">Title</div>
						<div class="col-md-2 center-col">Delete</div>
					</div>
		`;
		for(var task in tasks){
			html += `
				<div class="row">
						<div class="col-md-1 center-col">`+tasks[task].id+`</div>
						<div class="col-md-7 center-col">`+tasks[task].title+`</div>
						<div class="col-md-2 center-col"><button class="btn btn-danger delete-task" data-id="`+tasks[task].id+`"><i class="material-icons">delete_forever</i></button></div>
					</div>
			`;
		}
		
		$('#container-tasks').html(html);
		$('.delete-task').on('click', areYouSureDeleteTask);
	  }
	  
	  function displayCurrentDownloads(){
			var downloads = data.companies[curCompany].downloads;
			var html = `
						<div class="row" style="font-weight: bolder">
							<div class="col-md-1 center-col">ID</div>
							<div class="col-md-7 center-col">Name</div>
							<div class="col-md-2 center-col">Date Uploaded</div>
							<div class="col-md-2 center-col">Delete</div>
						</div>
			`;
			for(var download in downloads){
				html += `
					<div class="row">
							<div class="col-md-1 center-col">`+downloads[download].id+`</div>
							<div class="col-md-7 center-col">`+downloads[download].title+`</div>
							<div class="col-md-2 center-col">`+downloads[download].date_uploaded+`</div>
							<div class="col-md-2 center-col"><button class="btn btn-danger delete-download" data-id="`+downloads[download].id+`"><i class="material-icons">delete_forever</i></button></div>
						</div>
				`;
			}
			
			$('#container-downloads').html(html);
			$('.delete-download').on('click', areYouSureDelete);
	  }
    });
  </script>
@endpush
