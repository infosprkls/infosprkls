@extends('layouts.app', ['activePage' => 'profile', 'titlePage' => __('Company page')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-9 col-lg-12 col-md-12 col-12">
                    <div class="card">

                        <div class="card-header card-header-primary d-flex flex-wrap align-items-center">
                            <h4 class="card-title text-xs-center">{{$company->name}}</h4>
                            <div class="ml-auto content-right content-btn-4">
                                <a class="btn btn-secondary btn-custom tooltiped" href="{{route('company-documents',$company->id)}}">
                                    <i class="material-icons">assignment</i>
                                    <span>
                                         {{ __('Documents') }}
                                    </span>
                                   
                                    <div class="tooltip"> 
                                        <div class="arrow"></div> 
                                        <div class="tooltip-inner">View company documents</div> 
                                    </div>
                                </a>
                                <a class="btn btn-secondary btn-custom tooltiped" href="{{route('company-invoice',$company->id)}}">
                                    <i class="material-icons">assignment</i>
                                    <span>
                                         {{ __('Invoices') }}
                                    </span>
                                    <div class="tooltip"> 
                                        <div class="arrow"></div> 
                                        <div class="tooltip-inner">View company invoice</div> 
                                    </div>
                                </a>

                                <a class="btn btn-secondary btn-custom tooltiped" href="{{route('company-pdf',$company->id)}}">
                                    <i class="material-icons">assignment</i>
                                    <span>
                                         {{ __('View Services') }}
                                    </span>
                                   
                                    <div class="tooltip"> 
                                        <div class="arrow"></div> 
                                        <div class="tooltip-inner">View Services</div> 
                                    </div>
                                </a>
                                <a class="btn btn-secondary btn-custom tooltiped" href="{{route('company.user.create',$company->id)}}">
                                    <i class="material-icons">add_box</i>
                                    <span>
                                         {{ __('Add User') }}
                                    </span>
                                   
                                    <div class="tooltip"> 
                                        <div class="arrow"></div> 
                                        <div class="tooltip-inner">Add User</div> 
                                    </div>
                                </a>

                            </div>
                        </div>
                        <div class="card-body">
                            @if (session('status'))
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="alert alert-success">
                                            <button type="button" class="close" data-dismiss="alert"
                                                    aria-label="Close">
                                                <i class="material-icons">close</i>
                                            </button>
                                            <span>{{ session('status') }}</span>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            <h4 class="mt-2 mb-3 font-weight-bold">OrganisatiegegevensDeelnemer</h4>
                            <div class="row">
                                <div class="col-xl-4 col-lg-4 col-md-3 col-sm-4 col-12 col-form-label align-self-center pb-xs-0">
                                    <label for="">{{__("Name:")}}</label>
                                </div>
                                <div class="col-lg-7 col-md-7 col-sm-8 col-12  align-self-center">
                                    <h4>{{$company->name}}</h4>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-4 col-lg-4 col-md-3 col-sm-4 col-12 col-form-label align-self-center pb-xs-0">
                                    <label for="">{{__("Rechtsvorm:")}}</label>
                                </div>
                                <div class="col-lg-7 col-md-7 col-sm-8 col-12  align-self-center">
                                    <h4>{{$company->legal_form}}</h4>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-4 col-lg-4 col-md-3 col-sm-4 col-12 col-form-label align-self-center pb-xs-0">
                                    <label for="">{{__("HourType:")}}</label>
                                </div>
                                <div class="col-lg-7 col-md-7 col-sm-8 col-12  align-self-center">
                                    <h4><?php  echo ($company->hour_type == "round")?"Full Hour":"Decimal";?></h4>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-4 col-lg-4 col-md-3 col-sm-4 col-12 col-form-label align-self-center pb-xs-0">
                                    <label for="">{{__("FiscaalNummer:")}}</label>
                                </div>
                                <div class="col-lg-7 col-md-7 col-sm-8 col-12  align-self-center">
                                    <h4>{{$company->fiscal_number}}</h4>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-4 col-lg-4 col-md-3 col-sm-4 col-12 col-form-label align-self-center pb-xs-0">
                                    <label for="">{{__("KvKNummer:")}}</label>
                                </div>
                                <div class="col-lg-7 col-md-7 col-sm-8 col-12  align-self-center">
                                    <h4>{{$company->kvk}}</h4>
                                </div>
                            </div>
                            <h4 class="mt-2 mb-3 font-weight-bold">Adres</h4>
                            <div class="row">
                                <div class="col-xl-4 col-lg-4 col-md-3 col-sm-4 col-12 col-form-label align-self-center pb-xs-0">
                                    <label for="">{{__("Straatnaam:")}}</label>
                                </div>
                                <div class="col-lg-7 col-md-7 col-sm-8 col-12  align-self-center">
                                    <h4>{{$company->streat_name}}</h4>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-4 col-lg-4 col-md-3 col-sm-4 col-12 col-form-label align-self-center pb-xs-0">
                                    <label for="">{{__("Huisnummer:")}}</label>
                                </div>
                                <div class="col-lg-7 col-md-7 col-sm-8 col-12  align-self-center">
                                    <h4>{{$company->house_number}}</h4>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-4 col-lg-4 col-md-3 col-sm-4 col-12 col-form-label align-self-center pb-xs-0">
                                    <label for="">{{__("Huisnummertoevoeging:")}}</label>
                                </div>
                                <div class="col-lg-7 col-md-7 col-sm-8 col-12  align-self-center">
                                    <h4>{{$company->addition}}</h4>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-4 col-lg-4 col-md-3 col-sm-4 col-12 col-form-label align-self-center pb-xs-0">
                                    <label for="">{{__("Postcode:")}}</label>
                                </div>
                                <div class="col-lg-7 col-md-7 col-sm-8 col-12  align-self-center">
                                    <h4>{{$company->post_code}}</h4>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-4 col-lg-4 col-md-3 col-sm-4 col-12 col-form-label align-self-center pb-xs-0">
                                    <label for="">{{__("Plaatsnaam:")}}</label>
                                </div>
                                <div class="col-lg-7 col-md-7 col-sm-8 col-12  align-self-center">
                                    <h4>{{$company->place_name}}</h4>
                                </div>
                            </div>
                            <h4 class="mt-2 mb-3 font-weight-bold">CommunicatieadressenDeelnemer</h4>
                            <div class="row border-bottom">
                                <div class="col-xl-4 col-lg-4 col-md-3 col-sm-4 col-12 col-form-label align-self-center pb-xs-0">
                                    <label for="">{{__("Internetadres:")}}</label>
                                </div>
                                <div class="col-lg-7 col-md-7 col-sm-8 col-12  align-self-center">
                                    <h4>{{$company->www}}</h4>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-xl-4 col-lg-4 col-md-3 col-sm-4 col-12 col-form-label align-self-center pb-xs-0">
                                    <label for="">{{__("Created by:")}}</label>
                                </div>
                                <div class="col-lg-7 col-md-7 col-sm-8 col-12  align-self-center">
                                    <h4>
                                        <a href="{{route('companies.show',$company->createdBy == null ? 1 : $company->createdBy->id)}}">{{$company->createdBy == null ? "Unknown" : $company->createdBy->username}}</a>
                                    </h4>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-4 col-lg-4 col-md-3 col-sm-4 col-12 col-form-label align-self-center pb-xs-0">
                                    <label for="">{{__("Created at")}}</label>
                                </div>
                                <div class="col-lg-7 col-md-7 col-sm-8 col-12  align-self-center">
                                    <h4>{{$company->created_at}}</h4>
                                </div>
                            </div>
                            <div class="row">
                                <div class="text-right col-12 ">
                                    <a href="{{route('companies.edit', $company)}}">
                                        <button type="button" class="btn btn-primary">Edit Company</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">

                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-12 col-12">
                    <div class="card custom-card-width">
                    	<img class="card-img-top"
                             src="{{$company->logo == 'logo.png' ? asset('logo.png') : asset(env('STORAGENAME').'/'.$company->logo)}}"
                             alt="Company Logo">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
