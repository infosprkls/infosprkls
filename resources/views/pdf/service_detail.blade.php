@extends('layouts.app', ['activePage' => 'company-pdfs', 'titlePage' => strtoupper($details->service).' Services'])

@section('page-script-head')
<link href="https://fonts.googleapis.com/css?family=Orbitron&display=swap" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css"/>
@endsection

@section('content')
    <div class="content">
        <form id="main-form" method="POST" enctype="multipart/form-data">
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
                            <div class="row">
                                    <div class="col-md-12 text-right">
                                        <a href="{{ route('company-pdf' , $companyid) }}"
                                           class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                                    </div>
                                </div>
                            
                            <div class="row">
                                <label class="col-sm-2 col-form-label">{{ __('Organization Name') }}</label>
                                <div class="col-sm-7">
                                    <div class="form-group{{ $errors->has('organization_name') ? ' has-danger' : '' }}">
                                        <div class="form-group{{ $errors->has('company') ? ' has-danger' : '' }}">
                                            <select required="" class="form-control" name="company" id="input-company">
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
                                                value="{{ $companies->rsin?$companies->rsin:'N/A' }}"/>
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
                            {{--
                            <div class="row">
                                <label class="col-sm-2 col-form-label">{{ __('Choose a user') }}</label>
                                <div class="col-sm-7">
                                    <div class="form-group{{ $errors->has('user') ? ' has-danger' : '' }}">
                                        <input class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}"
                                               name="user" id="input-user" type="text"
                                               readonly="" value="{{ $users->firstname.' '.$users->lastname }}"/>
                                        
                                    </div>
                                </div>
                            </div>
                            --}}

                            <div class="row">
                                <label class="col-sm-2 col-form-label">{{ __('Titel') }}</label>
                                <div class="col-sm-7">
                                    <div class="form-group{{ $errors->has('user') ? ' has-danger' : '' }}">
                                        <select required="" class="form-control" name="user" id="input-user">
                                            <option
                                                    value="">Select User</option>
                                            @foreach($superUsers as $user)
                                                <option
                                                    {{ $details->user_id==$user->id?'SELECTED':'' }}
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
                                <label class="col-sm-2 col-form-label">{{ __('VOorletters') }}</label>
                                <div class="col-sm-7">
                                    <div class="form-group{{ $errors->has('initials') ? ' has-danger' : '' }}">
                                        <input class="form-control{{ $errors->has('initials') ? ' is-invalid' : '' }}"
                                               name="initials" id="input-initials" type="text"
                                               placeholder="{{ __('VOorletters') }}"  readonly="" value="{{ $users->initials??'N/A' }}"/>
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <label class="col-sm-2 col-form-label">{{ __('Voornaam') }}</label>
                                <div class="col-sm-7">
                                    <div class="form-group{{ $errors->has('first_name') ? ' has-danger' : '' }}">
                                        <input class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}"
                                               name="first_name" id="input-first_name" type="text"
                                               placeholder="{{ __('Voornaam') }}"  readonly="" value="{{ $users->firstname??'N/A' }}"/>
                                    </div>
                                </div>
                            </div>



                            <div class="row">
                                <label class="col-sm-2 col-form-label">{{ __('Tussenvoegsels') }}</label>
                                <div class="col-sm-7">
                                    <div class="form-group{{ $errors->has('insertions') ? ' has-danger' : '' }}">
                                        <input class="form-control{{ $errors->has('insertions') ? ' is-invalid' : '' }}"
                                               name="insertions" id="input-insertions" type="text"
                                               placeholder="{{ __('Tussenvoegsels') }}" readonly=""  value="{{ $users->insertions??'N/A' }}"/>
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <label class="col-sm-2 col-form-label">{{ __('Achternaam') }}</label>
                                <div class="col-sm-7">
                                    <div class="form-group{{ $errors->has('last_name') ? ' has-danger' : '' }}">
                                        <input class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}"
                                               name="last_name" id="input-last_name" type="text"
                                               placeholder="{{ __('Achternaam') }}" readonly="" value="{{ $users->lastname??'N/A' }}"/>
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <label class="col-sm-2 col-form-label">{{ __('Geslacht') }}</label>
                                <div class="col-sm-7">
                                    <div class="form-group{{ $errors->has('gender') ? ' has-danger' : '' }}">
                                        <input class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}"
                                               name="gender" id="input-gender" type="text"
                                               placeholder="{{ __('Achternaam') }}" readonly="" value="{{ $users->gender??'N/A' }}"/>
                                    </div>
                                </div>
                            </div>



                            <div class="row">
                                <label class="col-sm-2 col-form-label">{{ __('Email') }}</label>
                                <div class="col-sm-7">
                                    <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                        <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                               name="email" id="input-email" type="email"
                                               placeholder="{{ __('Email') }}" readonly="" value="{{ $users->email??'N/A' }}"/>
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <label class="col-sm-2 col-form-label">{{ __('Mobile') }}</label>
                                <div class="col-sm-7">
                                    <div class="form-group{{ $errors->has('mobile') ? ' has-danger' : '' }}">
                                        <input class="form-control{{ $errors->has('mobile') ? ' is-invalid' : '' }}"
                                               name="mobile" id="input-mobile" type="text"
                                               placeholder="{{ __('Mobile') }}" readonly="" value="{{ $users->mobile??'N/A' }}"/>
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <label class="col-sm-2 col-form-label">{{ __('Phone') }}</label>
                                <div class="col-sm-7">
                                    <div class="form-group{{ $errors->has('phone') ? ' has-danger' : '' }}">
                                        <input class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}"
                                               name="phone" id="input-phone" type="text"
                                               placeholder="{{ __('Phone') }}" readonly=""  value="{{ $users->phone_number??'N/A' }}"/>
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
                    @if(!($details->service=='wbso' && $details->wbso_type=='performa'))
                    <div class="card ">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">Project(s) Data</h4>
                            <p class="card-category"></p>
                        </div>
                        <div class="card-body ">


                            <div class="row">
                                <label class="col-sm-2 col-form-label">{{ __('Datepicker') }}</label>
                                <div class="col-sm-7">
                                    <div class="form-group{{ $errors->has('datepicker') ? ' has-danger' : '' }}">
                                        <input  required="" class="form-control{{ $errors->has('datepicker') ? ' is-invalid' : '' }}"
                                               name="datepicker" id="input-datepicker" type="text"
                                               placeholder="{{ __('Datepicker') }}" value='{{ date("d F Y", strtotime($details->start_date)) }} - {{ date("d F Y", strtotime($details->end_date)) }}'/>
                                        
                                    </div>
                                </div>
                            </div>

                            @if($details->service=='wbso' || $details->service=='via')
                            <div class="row">
                                <label class="col-sm-2 col-form-label">{{ __('In MOnths') }}</label>
                                <div class="col-sm-7">
                                    <div class="form-group{{ $errors->has('in_month') ? ' has-danger' : '' }}">
                                        <input required="" class="form-control{{ $errors->has('in_month') ? ' is-invalid' : '' }}"
                                               name="in_month" id="input-in_month" min=0.1 step=0.01
                                               placeholder="{{ __('In MOnths') }}" value="{{ $details->in_months }}"/>
                                    </div>
                                </div>
                            </div>

                            @endif


                            <div class="row">
                                <label class="col-sm-2 col-form-label">{{ $details->service }} {{ __(' number') }}</label>
                                <div class="col-sm-7">
                                    <div class="form-group{{ $errors->has('ref_number') ? ' has-danger' : '' }}">
                                        <input  required="" class="form-control{{ $errors->has('ref_number') ? ' is-invalid' : '' }}"
                                               name="ref_number" id="input-ref_number" type="text"
                                               placeholder="{{ $details->service }} {{ __(' number') }}" value="{{ $details->ref_number }}"/>
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <label class="col-sm-2 col-form-label">{{ __('Hour rate') }}</label>
                                <div class="col-sm-7">
                                    <div class="form-group{{ $errors->has('hour_rate') ? ' has-danger' : '' }}">
                                        <input required="" class="form-control{{ $errors->has('hour_rate') ? ' is-invalid' : '' }}"
                                               name="hour_rate" id="input-hour_rate" type="text"
                                               placeholder="Hour rate" value="{{ $details->hour_rate }}"/>
                                    </div>
                                </div>
                            </div>
                            
                            @foreach($projects as $key => $project)
                                @if($details->service=='via' || $details->service=='mit')
                                <div class="project-detail col-lg-9 col-md-9 col-sm-12 col-12">
                                    <div class="form-group col d-flex flex-wrap align-items-center px-0 custom-addition">
                                        @if($key==0)
                                        <h4>Project Detail</h4>
                                        @endif
                                        <button onclick="redirectPage('/company/{{ $companyid }}/service/{{ $details->slug }}/project/{{ $project->id }}')" title="View Detail" type="button" class="btn btn-warning rounded-circle ml-auto p-0 text-center viewProject"><i class="fa fa-eye" aria-hidden="true"></i></button>
                                    </div>
                                    {{--
                                    <div class="row">
                                        <label class="col-sm-2 col-form-label">{{ __('Project number') }}</label>
                                        <div class="col-sm-7">
                                            <div class="form-group{{ $errors->has('project_number') ? ' has-danger' : '' }}">
                                                <input required="" class="form-control{{ $errors->has('project_number') ? ' is-invalid' : '' }}"
                                                name="project_number[{{$project->id}}]" id="input-project_number" type="text"
                                                placeholder="{{ __('Project number') }}" value="{{ $project->number }}"/>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    --}}

                                    <div class="row">
                                        <label class="col-sm-2 col-form-label">{{ __('Project name') }}</label>
                                        <div class="col-sm-7">
                                            <div class="form-group{{ $errors->has('project_name') ? ' has-danger' : '' }}">
                                                <input  required="" class="form-control{{ $errors->has('project_name') ? ' is-invalid' : '' }}"
                                                       name="project_name[{{$project->id}}]" id="input-project_name" type="text"
                                                       placeholder="{{ __('Project name') }}" value="{{ $project->name }}"/>
                                                
                                            </div>
                                        </div>
                                    </div>

                                    @endif

                                    @if($details->service=='via')
                                    <div class="row">
                                        <label class="col-sm-2 col-form-label">{{ __('Hours of the project') }}</label>
                                        <div class="col-sm-7">
                                            <div class="form-group{{ $errors->has('project_hours') ? ' has-danger' : '' }}">
                                                <input  required="" class="form-control{{ $errors->has('project_hours') ? ' is-invalid' : '' }}"
                                                       name="project_hours[{{$project->id}}]" id="input-project_hours" type=number min=0 step=0.01
                                                       placeholder="{{ __('Hours of the project') }}" value="{{ $project->hours }}"/>
                                               
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endif
                            
                            @endforeach




                                @if($details->service=='wbso')
                                <div class="project-detail  col-lg-9 col-md-9 col-sm-12 col-12">
                                    @foreach($projects as $key => $project)
                                    <div class="form-group col d-flex flex-wrap align-items-center px-0 custom-addition">
                                        @if($key==0)
                                        <h4>Project Detail</h4>
                                        @endif
                                        <button onclick="redirectPage('/company/{{ $companyid }}/service/{{ $details->slug }}/project/{{ $project->id }}')" title="View Detail" type="button" class="btn btn-warning rounded-circle ml-auto p-0 text-center viewProject"><i class="fa fa-eye" aria-hidden="true"></i></button>
                                    </div>
                                    <div class="repeatable">
                                        {{--
                                        <div class="row">
                                            <label class="col-sm-2 col-form-label">{{ __('Project number') }}</label>
                                            <div class="col-sm-7">
                                                <div class="form-group{{ $errors->has('project_number') ? ' has-danger' : '' }}">
                                                    <input  required="" class="form-control{{ $errors->has('project_number') ? ' is-invalid' : '' }}"
                                                           name="project_number[{{$project->id}}]" id="input-project_number" type="text"
                                                           placeholder="{{ __('Project number') }}" value="{{ $project->number }}"/>
                                                </div>
                                            </div>
                                        </div>
                                        --}}

                                        <div class="row">
                                            <label class="col-sm-2 col-form-label">{{ __('Project name') }}</label>
                                            <div class="col-sm-7">
                                                <div class="form-group{{ $errors->has('project_name') ? ' has-danger' : '' }}">
                                                    <input  required="" class="form-control{{ $errors->has('project_name') ? ' is-invalid' : '' }}"
                                                           name="project_name[{{$project->id}}]" id="input-project_name" type="text"
                                                           placeholder="{{ __('Project name') }}" value="{{ $project->name }}"/>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <label class="col-sm-2 col-form-label">{{ __('Hours of the project') }}</label>
                                            <div class="col-sm-7">
                                                <div class="form-group{{ $errors->has('project_hours') ? ' has-danger' : '' }}">
                                                    <input required="" class="form-control{{ $errors->has('project_hours') ? ' is-invalid' : '' }} input-project_hours"
                                                           name="project_hours[{{$project->id}}]" id="input-project_hours" type=number min=0 step=0.01
                                                           placeholder="{{ __('Hours of the project') }}" value="{{ $project->hours }}"/>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                    </div>
                                    @endforeach
                                </div>
                                @endif

                            


                            @if($details->service=='wbso')
                            <div class="row">
                                <label class="col-sm-2 col-form-label">{{ __('Total hours') }}</label>
                                <div class="col-sm-7">
                                    <div class="form-group{{ $errors->has('total_hours') ? ' has-danger' : '' }}">
                                        <input class="form-control{{ $errors->has('total_hours') ? ' is-invalid' : '' }}"
                                               name="total_hours" id="input-total_hours" type="text"
                                               placeholder="{{ __('Total hours') }}" readonly=""  value="{{ $details->total_hours?$details->total_hours:'N/A' }}"/>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <label class="col-sm-2 col-form-label">{{ __('Amount total') }}</label>
                                <div class="col-sm-7">
                                    <div class="form-group{{ $errors->has('amount_total') ? ' has-danger' : '' }}">
                                        <input required="" class="form-control{{ $errors->has('amount_total') ? ' is-invalid' : '' }}"
                                               name="amount_total" id="input-amount_total" type="text"
                                               placeholder="{{ __('Amount total') }}" value="{{ $details->total_amount?$details->total_amount:'N/A' }}" />
                                        
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <label class="col-sm-2 col-form-label">{{ __('Amount per month') }}</label>
                                <div class="col-sm-7">
                                    <div class="form-group{{ $errors->has('amount_per_month') ? ' has-danger' : '' }}">
                                        <input class="form-control{{ $errors->has('amount_per_month') ? ' is-invalid' : '' }}"
                                               name="amount_per_month" id="input-amount_per_month" type="text"
                                               placeholder="{{ __('Amount per month') }}" value="{{ $details->amount_per_month?$details->amount_per_month:'N/A' }}" <?php if($companies->legal_form!='eenmanszaak' && $companies->legal_form!='V.O.F'){ ?> readonly="" <?php } ?> />
                                    </div>
                                </div>
                            </div>

                            @endif








                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    @if(!($details->service=='wbso' && $details->wbso_type=='performa'))
                    <div class="card">
                        <div class="card-header card-header-primary d-flex flex-wrap align-items-center">
                            <h4 class="card-title ">Additional Pdf</h4>
                        </div>
                        <div class="card-body container-fluid">
                            <div class="center-box">
                                <div class="row">
                                    <div class="col-12">
                                        
                                            <div class="dropzone-wrapper">
                                                <div class="dropzone-desc w-100">
                                                    <i class="material-icons">file_upload</i>
                                                    <p>Choose a pdf file or drag it here.</p>
                                                </div>
                                                <input type="file" accept=".pdf" name="additional_file" id="logo" class="dropzone">
                                            </div>
                                            @if ($errors->has('additional_file'))
                                            <span id="logo-error" class="error text-danger col-8 offset-2"
                                                for="input-logo">{{ $errors->first('additional_file') }}</span>
                                            @endif
                                            <div class="preview-zone ">
                                                <div class="box-body preview-pdf mt-4">
                                                    <img src="{{ asset('logo.png') }}" alt="Company Logo" />
                                                </div>
                                            </div>
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
                    @endif
                    <div class="text-right bg-transparent footer-double-btn">
                        @if($details->service=='wbso')
                        <a href="javascript:void(0);" type="submit" class="btn btn-primary submitButton" id="generate-xml">{{ __('Generate Xml') }}</a>
                        @endif
                        @if(!($details->service=='wbso' && $details->wbso_type=='performa'))
                        <a href="javascript:void(0);" type="submit" class="btn btn-primary submitButton" id="generate_pdf">{{ __('Generate Pdf') }}</a>
                        @endif
                        <a href="javascript:void(0);" type="submit" class="btn btn-primary submitButton" id="update-project">{{ __('Update') }}</a>
                        <button style="display: none;" type="submit" id="hidden_submit"></button>
                    </div>
                    
                </div>
            </div>
        </div>
        </form>
    </div>
@endsection

@section('page-script')
    <script>
        function redirectPage(route){
            var base_url = window.location.origin;
            window.location.href = base_url+route;
        }
    </script>

    <script>

        $(document).on('submit' , '#main-form' , function(){
            $("#ajax_loader").show();
        })

        $("#generate-xml").click(function(){
            $("#main-form").attr("action","{{ route('generate.xml' , $details->slug) }}");
            $("#main-form").submit();
        })

        $("#generate_pdf").click(function(){
            $("#main-form").attr("action","{{ route('generate.pdf' , $details->slug) }}");
            $("#main-form").submit();
        })

        $("#update-project").click(function(){
            $("#main-form").attr("action","{{ route('pdfs.updateProject' , $details->slug) }}");
            $("#hidden_submit").click();


        })
    </script>


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
            function onSelectDate() {
                var startDate = $('#input-datepicker').data('daterangepicker').startDate.format('YYYY-MM-DD');
                var endDate = $('#input-datepicker').data('daterangepicker').endDate.format('YYYY-MM-DD');
            }
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

        $('#input-company').change(function() {
            var companyId=$(this).val();
            // var urlSpliter = window.location.pathname.split('/');
            var urlSpliter = window.location.pathname.split('/')
            var newUrl = "";
            urlSpliter.forEach((item,index)=>{
                if(index!=0&& index!=2){
                    newUrl = newUrl+"/"+item;
                }
                if(index==2){
                    newUrl = newUrl+"/"+companyId;
                }
            });


            window.location.href = newUrl
            
        });

        $("#input-in_month").keyup(function(){
            var amount_total = $("#input-amount_total").val();
            $("#input-amount_per_month").val(amount_total/($(this).val()))
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
