@extends('layouts.app', ['activePage' => 'company-pdfs', 'titlePage' => strtoupper($service).' Services'])

@section('page-script-head')
    <link href="https://fonts.googleapis.com/css?family=Orbitron&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />


<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
@endsection

@section('content')
    <div class="content">
        <form method="POST" action="{{ route('pdfs.store') }}" autocomplete="off" class="form-horizontal">
            @csrf
            @method('post')
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card ">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">Organization Information</h4>
                                <p class="card-category"></p>
                            </div>
                            <div class="card-body ">
                                <div class="row">
                                    <div class="col-md-12 text-right">
                                        <a href="{{ route('company-pdf' , $companyid) }}"
                                           class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                                    </div>
                                </div>

                                
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Organization Name') }}</label>
                                    <div class="col-sm-7">

                                        <div class="form-group{{ $errors->has('company') ? ' has-danger' : '' }}">
                                            <select class="form-control" name="company" id="input-company">
                                                <option
                                                        value="">Select Company</option>
                                                @foreach($allCompanies as $sCompany)

                                                    <option
                                                        {{ $companies->id==$sCompany->id?'SELECTED':'' }}
                                                        value="{{$sCompany->id}}">{{$sCompany->name}}</option>
                                                        }
                                                @endforeach
                                            </select>
                                            @if ($errors->has('company'))
                                                <span id="company-error" class="error text-danger"
                                                      for="input-company">{{ $errors->first('company') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('KVK') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('kvk') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('kvk') ? ' is-invalid' : '' }}"
                                                   id="input-kvk" type="text"
                                                   placeholder="{{ __('KVK') }}" readonly="" 
                                                    value="{{ $companies->kvk?$companies->kvk:'N/A' }}"/>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('RSIN') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('rsin') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('rsin') ? ' is-invalid' : '' }}"
                                                  id="input-rsin" type="text"
                                                   placeholder="{{ __('RSIN') }}" readonly="" 
                                                    value="{{ $companies->fiscal_number?$companies->fiscal_number:'N/A' }}"/>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Rechtsvorm') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('legal_form') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('legal_form') ? ' is-invalid' : '' }}"
                                                   id="input-legal_form" type="text"
                                                   placeholder="{{ __('Rechtsvorm') }}" readonly="" 
                                                    value="{{ $companies->legal_form?$companies->legal_form:'N/A' }}"/>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Straatname') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('streat_name') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('streat_name') ? ' is-invalid' : '' }}"
                                                    id="input-streat_name" type="text"
                                                   placeholder="{{ __('Straatname') }}" readonly="" 
                                                    value="{{ $companies->streat_name?$companies->streat_name:'N/A' }}"/>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Huisnummer') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('house_number') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('house_number') ? ' is-invalid' : '' }}"
                                                   id="input-house_number" type="text"
                                                   placeholder="{{ __('Huisnummer') }}" readonly="" 
                                                    value="{{ $companies->house_number?$companies->house_number:'N/A' }}"/>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Toevoeging') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('addition') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('addition') ? ' is-invalid' : '' }}"
                                                   id="input-addition" type="text"
                                                   placeholder="{{ __('Toevoeging') }}" readonly="" 
                                                    value="{{ $companies->addition?$companies->addition:'N/A' }}"/>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Postcode') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('postcode') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('postcode') ? ' is-invalid' : '' }}"
                                                   id="input-postcode" type="text"
                                                   placeholder="{{ __('Postcode') }}" readonly="" 
                                                    value="{{ $companies->post_code?$companies->post_code:'N/A' }}"/>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Plaatsnaam') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('place_name') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('place_name') ? ' is-invalid' : '' }}"
                                                   id="input-place_name" type="text"
                                                   placeholder="{{ __('Plaatsnaam') }}" readonly="" 
                                                    value="{{ $companies->place_name?$companies->place_name:'N/A' }}"/>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Land') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('land') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('land') ? ' is-invalid' : '' }}"
                                                   id="input-land" type="text"
                                                   placeholder="{{ __('Land') }}" readonly="" 
                                                    value="{{ $companies->land?$companies->land:'N/A' }}"/>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('WWW:') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('www') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('www') ? ' is-invalid' : '' }}"
                                                   id="input-www" type="text"
                                                   placeholder="{{ __('WWW:') }}" readonly="" 
                                                    value="{{ $companies->www?$companies->www:'N/A' }}"/>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card ">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">Superuser Data</h4>
                                <p class="card-category"></p>
                            </div>
                            <div class="card-body ">
                                <!-- <div class="row">
                                    <div class="col-md-12 text-right">
                                        <a href="{{ route('company-pdf' , $companyid) }}"
                                           class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                                    </div>
                                </div> -->


                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Choose a user') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('user') ? ' has-danger' : '' }}">
                                            <select class="form-control" name="user" id="input-user">
                                                <option
                                                        value="">Select User</option>
                                                @foreach($users as $user)
                                                    <option
                                                        {{ old('user')==$user->id?'SELECTED':'' }}
                                                        value="{{$user->id}}">{{$user->firstname . " " . $user->lastname}}</option>
                                                        }
                                                @endforeach
                                            </select>
                                            @if ($errors->has('user'))
                                                <span id="user-error" class="error text-danger"
                                                      for="input-user">{{ $errors->first('user') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Titel') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('title') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}"
                                                   name="title" id="input-title" type="text"
                                                   placeholder="{{ __('Titel') }}"
                                                   readonly="" value="{{ old('title') }}"  />
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('VOorletters') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('initials') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('initials') ? ' is-invalid' : '' }}"
                                                   name="initials" id="input-initials" type="text"
                                                   placeholder="{{ __('VOorletters') }}"  readonly="" value="{{ old('initials') }}"/>
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Voornaam') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('first_name') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}"
                                                   name="first_name" id="input-first_name" type="text"
                                                   placeholder="{{ __('Voornaam') }}"  readonly="" value="{{ old('first_name') }}"/>
                                        </div>
                                    </div>
                                </div>



                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Tussenvoegsels') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('insertions') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('insertions') ? ' is-invalid' : '' }}"
                                                   name="insertions" id="input-insertions" type="text"
                                                   placeholder="{{ __('Tussenvoegsels') }}" readonly=""  value="{{ old('insertions') }}"/>
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Achternaam') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('last_name') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}"
                                                   name="last_name" id="input-last_name" type="text"
                                                   placeholder="{{ __('Achternaam') }}" readonly="" value="{{ old('last_name') }}"/>
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Geslacht') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('gender') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}"
                                                   name="gender" id="input-gender" type="text"
                                                   placeholder="{{ __('Achternaam') }}" readonly="" value="{{ old('gender') }}"/>
                                        </div>
                                    </div>
                                </div>



                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Email') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                                   name="email" id="input-email" type="email"
                                                   placeholder="{{ __('Email') }}" readonly="" value="{{ old('email') }}"/>
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Mobile') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('mobile') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('mobile') ? ' is-invalid' : '' }}"
                                                   name="mobile" id="input-mobile" type="text"
                                                   placeholder="{{ __('Mobile') }}" readonly="" value="{{ old('mobile') }}"/>
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Phone') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('phone') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}"
                                                   name="phone" id="input-phone" type="text"
                                                   placeholder="{{ __('Phone') }}" readonly=""  value="{{ old('phone') }}"/>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>



            
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        @if(!(isset($type) && $type=='performa'))
                        <div class="card ">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">Project(s) Data</h4>
                                <p class="card-category"></p>
                            </div>
                            <div class="card-body ">
                                <!-- <div class="row">
                                    <div class="col-md-12 text-right">
                                        <a href="{{ route('company-pdf' , $companyid) }}"
                                           class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                                    </div>
                                </div> -->


                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Datepicker') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('datepicker') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('datepicker') ? ' is-invalid' : '' }}"
                                                id="input-datepicker"
                                                   name="datepicker"  type="text"
                                                   placeholder="{{ __('Datepicker') }}" value="{{ old('datepicker') }}" required/>
                                            @if ($errors->has('datepicker'))
                                                <span id="datepicker-error" class="error text-danger"
                                                      for="input-datepicker">{{ $errors->first('datepicker') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div style="display: none;" id="copy_projects" class="col-xl-3 col-lg-12 col-md-12 col-12 left-md-label-space">
                                        <div class="copy-wrapper d-flex flex-wrap align-items-center justify-content-center active">
                                            <span class="material-icons mr-1">content_copy</span>
                                            <p class="mb-0">Copy From previous projects</p>
                                        </div>
                                    </div>
                                </div>

                                @if($service=='wbso' || $service=='via')
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('In MOnths') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('in_month') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('in_month') ? ' is-invalid' : '' }}"
                                                    type="number"
                                                   name="in_month" id="input-in_month" min=0.1 step=0.01
                                                   placeholder="{{ __('In MOnths') }}" value="{{ old('in_month') }}" required/>
                                            @if ($errors->has('in_month'))
                                                <span id="in_month-error" class="error text-danger"
                                                      for="input-in_month">{{ $errors->first('in_month') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                @endif


                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ $service }} {{ __(' number') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('ref_number') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('ref_number') ? ' is-invalid' : '' }}"
                                                   name="ref_number" id="input-ref_number" type="text"
                                                   placeholder="{{ $service }} {{ __(' number') }}" value="{{ old('ref_number') }}" required/>
                                            @if ($errors->has('ref_number'))
                                                <span id="ref_number-error" class="error text-danger"
                                                      for="input-ref_number">{{ $errors->first('ref_number') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Hour rate') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('hour_rate') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('hour_rate') ? ' is-invalid' : '' }}"
                                                   name="hour_rate" id="input-hour_rate" type="text"
                                                   placeholder="Hour rate" value="{{ old('hour_rate') }}" required/>
                                            @if ($errors->has('hour_rate'))
                                                <span id="hour_rate-error" class="error text-danger"
                                                      for="input-hour_rate">{{ $errors->first('hour_rate') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>


                                @if($service=='via' || $service=='mit')
                                {{--
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Project number') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('project_number') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('project_number') ? ' is-invalid' : '' }}"
                                                   name="project_number[]" id="input-project_number" type="text"
                                                   required
                                                   pattern="^[0-9\.\-\/]+$"
                                                   placeholder="{{ __('Project number') }}"  value="{{ old('project_number')?old('project_number')[0]:'' }}"/>
                                            
                                        </div>
                                    </div>
                                </div>
                                --}}

                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Project name') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('project_name') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('project_name') ? ' is-invalid' : '' }}"
                                                   name="project_name[]" id="input-project_name" type="text"
                                                   required
                                                   placeholder="{{ __('Project name') }}" value="{{ old('project_name')?old('project_name')[0]:'' }}"/>
                                            
                                        </div>
                                    </div>
                                </div>

                                @endif

                                @if($service=='via')
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Hours of the project') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('project_hours') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('project_hours') ? ' is-invalid' : '' }}"
                                                   name="project_hours[]" id="input-project_hours" type=number min=0 step=0.01
                                                   required
                                                   placeholder="{{ __('Hours of the project') }}" value="{{ old('project_hours')?old('project_hours')[0]:'' }}"/>
                                           
                                        </div>
                                    </div>
                                </div>
                                @endif






                                @if($service=='wbso')
                                <div class="project-detail  col-lg-9 col-md-9 col-sm-12 col-12">
                                    <div class="form-group col d-flex flex-wrap align-items-center px-0 custom-addition">
                                            <h4>Project Detail</h4>
                                            <button title="Add Project" type="button" class="btn btn-warning rounded-circle ml-auto p-0 text-center repeat">+</button>
                                    </div>
                                    <div class="repeatable">
                                        {{--
                                        <div class="row">
                                            <label class="col-sm-2 col-form-label">{{ __('Project number') }}</label>
                                            <div class="col-sm-7">
                                                <div class="form-group{{ $errors->has('project_number') ? ' has-danger' : '' }}">
                                                    <input class="form-control{{ $errors->has('project_number') ? ' is-invalid' : '' }}"
                                                           name="project_number[]" id="input-project_number" type="text"
                                                           required
                                                           pattern="^[0-9\.\-\/]+$"
                                                           placeholder="{{ __('Project number') }}" value="{{ old('project_number')?old('project_number')[0]:'' }}"/>
                                                </div>
                                            </div>
                                        </div>
                                        --}}

                                        <div class="row">
                                            <label class="col-sm-2 col-form-label">{{ __('Project name') }}</label>
                                            <div class="col-sm-7">
                                                <div class="form-group{{ $errors->has('project_name') ? ' has-danger' : '' }}">
                                                    <input class="form-control{{ $errors->has('project_name') ? ' is-invalid' : '' }}"
                                                           name="project_name[]" id="input-project_name" type="text"
                                                           required
                                                           placeholder="{{ __('Project name') }}" value="{{ old('project_name')?old('project_name')[0]:'' }}"/>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <label class="col-sm-2 col-form-label">{{ __('Hours of the project') }}</label>
                                            <div class="col-sm-7">
                                                <div class="form-group{{ $errors->has('project_hours') ? ' has-danger' : '' }}">
                                                    <input class="form-control{{ $errors->has('project_hours') ? ' is-invalid' : '' }} input-project_hours"
                                                           name="project_hours[]" id="input-project_hours" type=number min=0 step=0.01
                                                           required
                                                           placeholder="{{ __('Hours of the project') }}" value="{{ old('project_hours')?old('project_hours')[0]:'' }}"/>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                    </div>

                                </div>






                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Total hours') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('total_hours') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('total_hours') ? ' is-invalid' : '' }}"
                                                   name="total_hours" id="input-total_hours" type="text"
                                                   placeholder="{{ __('Total hours') }}" readonly=""  value="{{ old('total_hours') }}"/>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Amount total') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('amount_total') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('amount_total') ? ' is-invalid' : '' }}"
                                                   name="amount_total" id="input-amount_total" type="text"
                                                   placeholder="{{ __('Amount total') }}" value="{{ old('amount_total') }}" required/>
                                            @if ($errors->has('amount_total'))
                                                <span id="amount_total-error" class="error text-danger"
                                                      for="input-amount_total">{{ $errors->first('amount_total') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Amount per month') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('amount_per_month') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('amount_per_month') ? ' is-invalid' : '' }}"
                                                   name="amount_per_month" id="input-amount_per_month" type="text"
                                                   placeholder="{{ __('Amount per month') }}" value="{{ old('amount_per_month') }}" <?php if($companies->legal_form!='eenmanszaak' && $companies->legal_form!='V.O.F'){ ?> readonly="" <?php } ?>  />
                                        </div>
                                    </div>
                                </div>

                                @endif

                            </div>
                            
                        </div>

                        @endif

                        @if(isset($type))
                        <input type="hidden" name="wbso_type" value="{{ $type }}">
                        @endif


                        <div class="text-right bg-transparent">
                            <input type="hidden" name="company_id" value="{{$companyid}}">
                            <input type="hidden" name="service" value="{{$service}}">
                            <button type="submit" class="btn btn-primary">{{ __('Save Information') }}</button>
                        </div>
                    </div>
                </div>
            </div>
            
        </form>
    </div>
@endsection

@section('page-script')
    <script>
        $(function() {
            var invalid_dates = '<?php echo json_encode($dates); ?>';
            invalid_dates = JSON.parse(invalid_dates);
            $('#input-datepicker').daterangepicker({
                  
                isInvalidDate: function(date)
                {
                  return !!(invalid_dates.indexOf(date.format('YYYY-MM-DD')) > -1);
                },
                startOfWeek: 'monday',
                separator: ' - ',
            
                locale: {
                  format: 'DD MMMM YYYY'
                },
                autoClose: false,
            },onSelectDate);
        });
        function onSelectDate() {
            var startDate = $('#input-datepicker').data('daterangepicker').startDate.format('YYYY-MM-DD');
            var endDate = $('#input-datepicker').data('daterangepicker').endDate.format('YYYY-MM-DD');

            findOldProjects(startDate,endDate);
        }
        var allPreviousProjects = [];
        function findOldProjects(startDate,endDate){
            var service     = "{{ $service }}";
            var type        = "{{ $type }}";
            var companyid   = "{{ $companyid }}";
            allPreviousProjects = [];
            if(service=='wbso' && type=='complete' && companyid){
                
                $('#input-datepicker').css("background",'url(/img/loading.gif) no-repeat right center')

                var routeToGetTo='/pdfs/get_previous_services_projects';
                $.ajax({
                    type:'GET',
                    url: routeToGetTo,
                    // headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    data:{startDate:startDate,endDate:endDate,companyid:companyid},
                    success:function(data){
                        data = JSON.parse(data)
                        allPreviousProjects = data;
                        if(data.length){
                            $("#copy_projects").show();
                        }
                        $('#input-datepicker').css("background",'')
                    }
                });
            }
        }

        $("#copy_projects").click(function(e){
            e.preventDefault();
            $("#copy_projects").hide();
            $.each( allPreviousProjects, function( key, value ) {
                if(key==0){
                    $("#input-project_number").val(value.number);
                    $("#input-project_name").val(value.name);
                    $("#input-project_hours").val(value.hours);
                }else{
                    var randumNumber = Math.floor(Math.random() * 1000000) + 1;
                    var extraButton = '<div class="form-group col d-flex flex-wrap align-items-center px-0 custom-addition project_'+randumNumber+'"><button title="Remove Project" type="button" class="btn btn-warning rounded-circle ml-auto p-0 text-center removeProject" data-id="project_'+randumNumber+'">-</button></div>';

                    $(document).find('.repeatable').first().clone().find("#input-project_number").val(value.number).end().find("#input-project_name").val(value.name).end().find("#input-project_hours").val(value.hours).end().addClass('project_'+randumNumber).appendTo($(".project-detail")).before(extraButton);
                }
            })


        });
    </script>

    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>


    <script>
        $(function () {
            $(".repeat").on('click', function () {
                var randumNumber = Math.floor(Math.random() * 1000000) + 1;
                var extraButton = '<div class="form-group col d-flex flex-wrap align-items-center px-0 custom-addition project_'+randumNumber+'"><button title="Remove Project" type="button" class="btn btn-warning rounded-circle ml-auto p-0 text-center removeProject" data-id="project_'+randumNumber+'">-</button></div>';



                var $self = $(this);
                // $self.parent().parent().find('.repeatable').first().clone().find("#input-project_number").val("").end().find("#input-project_name").val("").end().find("#input-project_hours").val("").end().addClass('project_'+randumNumber).appendTo($(".project-detail")).before(extraButton);
                $self.parent().parent().find('.repeatable').first().clone().find("#input-project_name").val("").end().find("#input-project_hours").val("").end().addClass('project_'+randumNumber).appendTo($(".project-detail")).before(extraButton);
            });

            $(document).on('click' , '.removeProject' , function(){
                var dataId = $(this).data("id");
                $(document).find("."+dataId).remove();
                updateProjectHours();
            })
        });
        $('#input-user').change(function() {
            var userid=$(this).val();
            var routeToPostTo='/get_user_record';
            $.ajax({
               type:'POST',
               url: routeToPostTo,
               headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
               data:{userid:userid},
               success:function(data){
                console.log(data);


                $('#input-first_name').val(data.firstname);
                $('#input-last_name').val(data.lastname);
                $('#input-email').val(data.email);
                $('#input-phone').val(data.phone_number);


                $('#input-title').val(data.title?data.title:'N/A');
                $('#input-initials').val(data.initials?data.initials:'N/A');
                $('#input-insertions').val(data.insertions?data.insertions:'N/A');
                $('#input-gender').val(data.gender?data.gender:'N/A');
                $('#input-mobile').val(data.mobile?data.mobile:'N/A');

               }
            });
        });
// alert(window.location.pathname.split('/'))
        $('#input-company').change(function() {
            var companyId=$(this).val();
            // var urlSpliter = window.location.pathname.split('/');
            var urlSpliter = window.location.pathname.split('/')
            

            var newUrl = "";
            urlSpliter.forEach((item,index)=>{
                if(index!=0&& index!=3){
                    newUrl = newUrl+"/"+item;
                }
                if(index==3){
                    newUrl = newUrl+"/"+companyId;
                }
            });


            window.location.href = newUrl
            
        });








        $("#input-in_month").keyup(function(){
            var amount_total = $("#input-amount_total").val();
            $("#input-amount_per_month").val(amount_total/($(this).val()))
            // if($(this).val() && amount_total){
                
            // }
        })




        $("#input-amount_total").keyup(function(){
            var in_month = $("#input-in_month").val();
            $("#input-amount_per_month").val(($(this).val())/in_month)
        })
    </script>
    <script>
        $(document).on('keyup' , '.input-project_hours' , function(){
            updateProjectHours();
        })

        function updateProjectHours(){
            var totalHours = 0;
            $(".input-project_hours").each(function() {
                totalHours = +($(this).val())+totalHours;
            })
            $("#input-total_hours").val(totalHours);
        }
    </script>




    <script>
        $(document).ready(function(){
            var allErrors = '{{ $errors }}';
            if(allErrors.length>2){
                var count = '{{ old("project_name")?count(old("project_name")):0 }}';

                for (var i = 1; i < count; i++) {
                    // var project_number_errors = '<?php // echo json_encode(old('project_number')) ?>';
                    var project_name_errors = '<?php echo json_encode(old('project_name')) ?>';
                    var project_hours_errors = '<?php echo json_encode(old('project_hours')) ?>';


                    // project_number_errors = JSON.parse(project_number_errors);
                    project_name_errors = JSON.parse(project_name_errors);
                    project_hours_errors = JSON.parse(project_hours_errors);


                    var randumNumber = Math.floor(Math.random() * 1000000) + 1;
                    var extraButton = '<div class="form-group col d-flex flex-wrap align-items-center px-0 custom-addition project_'+randumNumber+'"><button type="button" class="btn btn-warning rounded-circle ml-auto p-0 text-center removeProject" data-id="project_'+randumNumber+'">-</button></div>';


                    // $(document).find('.repeatable').first().clone().find("#input-project_number").val(project_number_errors[i]).end().find("#input-project_name").val(project_name_errors[i]).end().find("#input-project_hours").val(project_hours_errors[i]).end().addClass('project_'+randumNumber).appendTo($(".project-detail")).before(extraButton);
                    $(document).find('.repeatable').first().clone().find("#input-project_name").val(project_name_errors[i]).end().find("#input-project_hours").val(project_hours_errors[i]).end().addClass('project_'+randumNumber).appendTo($(".project-detail")).before(extraButton);
                }
            }


        })

    </script>

    <script>
        $('.copy-wrapper').click(function(){
            $(this).toggleClass('active');
        });
    </script>
@endsection
