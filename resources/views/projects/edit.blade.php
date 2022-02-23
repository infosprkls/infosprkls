@extends('layouts.app', ['activePage' => 'projects', 'titlePage' => __('Projects')])
@section('page-script-head')
    <link href="https://fonts.googleapis.com/css?family=Orbitron&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form method="post" action="{{ route('projects.update', $project) }}" autocomplete="off"
                          class="form-horizontal">
                        @csrf
                        @method('put')
                        @include('includes.errors')
                        <div class="card ">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">{{ __('Edit Project') }}</h4>
                                <p class="card-category"></p>
                            </div>
                            <div class="card-body ">
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Name') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                                   name="name" id="name" type="text"
                                                   placeholder="{{ __('Name') }}" 
												   value="{{ old('name', $project->name) }}" required/>
                                            @if ($errors->has('name'))
                                                <span id="name-error" class="error text-danger"
                                                      for="name">{{ $errors->first('name') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Description') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('description') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}"
                                                   name="description" id="description" type="text"
                                                   placeholder="{{ __('Description') }}" 
												   value="{{ old('description', $project->description) }}" required/>
                                            @if ($errors->has('description'))
                                                <span id="description-error" class="error text-danger"
                                                      for="description">{{ $errors->first('description') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label"
                                           for="input-end">{{ __('Deadline') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group">
                                            <input class="form-control" name="end" class="form-control{{ $errors->has('end') ? ' is-invalid' : '' }}" id="inputend" type="text" placeholder="{{ __('End Date') }}" value="{{ old('end', date('Y-m-d',strtotime($project->deadline))) }}" required/>
                                            @if ($errors->has('description'))
                                                <span id="end-error" class="error text-danger"
                                                      for="end">{{ $errors->first('description') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
								<div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Status') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('status') ? ' has-danger' : '' }}">
											<select class="form-control"  name="status" id="input-status">
												<option <?php echo $project->status == "NOT STARTED YET" ? "selected" : ""; ?>>NOT STARTED YET</option>
												<option <?php echo $project->status == "IN PROGRESS" ? "selected" : ""; ?>>IN PROGRESS</option>
												<option <?php echo $project->status == "OUT OF DEADLINE" ? "selected" : ""; ?>>OUT OF DEADLINE</option>
												<option <?php echo $project->status == "COMPLETED" ? "selected" : ""; ?>>COMPLETED</option>
											</select>
                                            @if ($errors->has('company_id'))
                                                <span id="company_id-error" class="error text-danger" for="input-company_id">{{ $errors->first('company_id') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer ml-auto mr-auto">
                                <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
								<a href="{{ route('projects.show', $project) }}"
                                           class="btn btn-primary">{{ __('Cancel') }}</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('page-script')
    
    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <script>
        $( document ).ready(function() {
            bindDateTimePickers();
            
            function bindDateTimePickers() {
                $('#inputstart').datepicker({ footer: true, modal: true , format: 'yyyy-mm-dd' , uiLibrary: 'materialdesign'});
                $('#inputend').datepicker({ footer: true, modal: true , format: 'yyyy-mm-dd' , uiLibrary: 'materialdesign'});
            }
        });
    </script>
@endsection
