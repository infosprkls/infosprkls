@extends('layouts.app', ['activePage' => 'projects', 'titlePage' => __('Projects')])
@section('page-script-head')
	<style>
		.simple-link{
			color: #fff
		}
		.simple-link:link {
		  color: #fff;
		}

		/* visited link */
		.simple-link:visited {
		  color: #fff;
		}

		/* mouse over link */
		.simple-link:hover {
		  color: #fff;
		}

		/* selected link */
		.simple-link:active {
		  color: #fff;
		}
		
		.card-body{
			cursor: pointer;
		}
	</style>
@endsection
@section('content')
    @php
        $counter = 0 ;
    @endphp
    <div class="content">
    	@if (session('status'))
            <div class="row">
                <div class="col-sm-12">
                    <div class="alert {{(session('status')=='You do not have the required permissions to complete this action.') ? 'alert-danger' : 'alert-success'}}">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <i class="material-icons">close</i>
                        </button>
                        <span>{{ session('status') }}</span>
                    </div>
                </div>
            </div>
        @endif
    	@if (Session::has('success'))
    		<div class="alert alert-success alert-dismissible fade show" role="alert">
			  {!! Session::get('success') !!}
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>
		@endif

		@if (Session::has('error'))
			<div class="alert alert-warning alert-dismissible fade show" role="alert">
			  {!! Session::get('error') !!}
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>
		@endif
        <div class="container-fluid">
			<div class="row">
				<div class="col-12 text-right" style="padding-right: 30px">
					<a href="{{ route('projects.create') }}"
					   class="btn btn-primary">{{ __('New Project') }}</a>
				</div>
			</div>
            <div class="row">
                @foreach ($projects as $project)
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 d-flex align-items-stretch">
                            <div class="card flex-fill" style="height: 85%">
                                <div class="card-header card-header-{{$project->CardHeader}}">
									<a href="{{route('projects.show', $project)}}" class="simple-link">
                                    {{$project->name}}
									</a>
									<span style="float: right; margin-right: 5px">
										<form action="{{ route('projects.destroy', $project->id) }}"
                                                          method="post">
		                                    <!-- <input type="hidden" name="id" value="{{$project->id}}"> -->
		                                    @csrf
		                                    @method('delete')
											<a href="{{route('projects.edit', $project)}}" class="simple-link" title="Edit Project"><i class="material-icons">edit</i></a>
											<button type="button" class="btn btn-danger btn-link"
	                                                                data-original-title="" title=""
	                                                                onclick="confirm('{{ __("Are you sure you want to delete this Project?") }}') ? this.parentElement.submit() : ''">
		                                        <span class="material-icons" style="color: #FFF">delete</span>
		                                    </button>
	                                    </form>
									</span>
                                </div>
								<div class="card-body" data-route="{{route('projects.show', $project)}}">
                                    <h4 class="card-title">{{$project->status}}</h4>
                                    <p class="card-text">{{$project->description}}</p>
                                </div>
                                <div class="card-footer text-muted">
									<div class="col">
                                    <div class="row">
										<div class="col">Assigned To:</div>									<div class="col">
											@if(isset($project->responsibleUser->fullname))
												{{$project->responsibleUser->fullname}}
											@endif
											</div>
									</div>
									<div class="row">
										<div class="col">Total Hours: </div>
										<div class="col">{{$project->hours}}</div>
									</div>
									<div class="row">
										<div class="col">Started: </div>
										<div class="col">{{$project->started_at}}</div>
									</div>
									</div>
                                </div>
                            </div>
							
                    </div>
                @endforeach
            </div>
			<div class="row">
			{{-- {{ $projects->links() }} --}}
			{{ $projects->links('vendor.pagination.custom') }}
            </div>
        </div>
    </div>
@endsection
@section('page-script')
	<script>
	$( document ).ready(function() {
		$('.card-body').click(onCardBodyClicked);
		
		function onCardBodyClicked(){
			var url = $(this).data("route");
			window.location.href = url;
		}
	});
	</script>
@endsection