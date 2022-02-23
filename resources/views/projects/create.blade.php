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
                     @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            <li>{{$errors->first()}}</li>
                        </ul>
                    </div>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <form method="POST" action="{{ route('projects.store') }}" autocomplete="off" class="form-horizontal">
                        @csrf
                        @method('post')
                        <div class="card ">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">{{ __('New Project') }}</h4>
                                <p class="card-category"></p>
                            </div>
                            <div class="card-body ">
                                <div class="row">
                                    <div class="col-md-12 text-right">
                                        <a href="{{ route('projects.index') }}"
                                           class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                                    </div>
                                </div>
								@if ($companies != null)
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Company') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('company') ? ' has-danger' : '' }}">
                                            <select class="form-control company_id" name="company_id" id="input-company" required="">
                                                <option>Select Company</option>
                                                @foreach($companies as $company)
                                                    <option value="{{$company->id}}">{{$company->name}}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('company'))
                                                <span id="company-error" class="error text-danger"
                                                      for="input-company">{{ $errors->first('company') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
								@endif
								<div class="row companyusers" style="<?php if(auth()->user()->hasRole('super admin')){echo 'display: none';}?>">
                                    <label class="col-sm-2 col-form-label">{{ __('Responsible User') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('responsible') ? ' has-danger' : '' }}">
                                            <select class="form-control" name="responsible" id="input-responsible">
                                                @foreach($users as $user)
                                                    <option
                                                        value="{{$user->id}}">{{$user->firstname . " " . $user->lastname}}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('responsible'))
                                                <span id="responsible-error" class="error text-danger"
                                                      for="input-responsible">{{ $errors->first('responsible') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
								<div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Title') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('title') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}"
                                                   name="title" id="input-title" type="text"
                                                   placeholder="{{ __('Title') }}" value="{{ old('title') }}" required/>
                                            @if ($errors->has('title'))
                                                <span id="title-error" class="error text-danger"
                                                      for="input-title">{{ $errors->first('title') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
								<div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Description') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('description') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}"
                                                   name="description" id="input-description" type="text"
                                                   placeholder="{{ __('Description') }}" value="{{ old('description') }}" required/>
                                            @if ($errors->has('description'))
                                                <span id="description-error" class="error text-danger"
                                                      for="input-description">{{ $errors->first('description') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <label class="col-sm-2 col-form-label"
                                           for="input-start">{{ __('Start Date') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('start') ? ' has-danger' : '' }}">
                                            <input
                                                class="form-control{{ $errors->has('start') ? ' is-invalid' : '' }}"
                                                type="text" name="start" id="inputstart"
                                                placeholder="{{ __('Start Date') }}" value="" required/>
                                            @if ($errors->has('start'))
                                                <span id="name-error" class="error text-danger"
                                                      for="input-name">{{ $errors->first('start') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label"
                                           for="input-end">{{ __('End Date') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group">
                                            <input class="form-control" name="end"
                                                   id="inputend" type="text"
                                                   placeholder="{{ __('End Date') }}" value="" required/>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Type') }}</label>
                                    <div class="col-sm-7">
                                        <label class="radio-inline col-sm-2">
                                          <input type="radio" name="project_type" value="Task" checked>Task
                                        </label>
                                        <label class="radio-inline col-sm-2">
                                          <input type="radio" name="project_type" value="Person">Person
                                        </label>
                                        @if ($errors->has('type'))
                                            <span id="type-error" class="error text-danger"
                                                  for="input-type">{{ $errors->first('type') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer ml-auto mr-auto">
                                <button type="submit" class="btn btn-primary">{{ __('Create Project') }}</button>
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
