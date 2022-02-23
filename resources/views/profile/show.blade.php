@extends('layouts.app', ['activePage' => 'profile', 'titlePage' => __('User Profile')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-8">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">{{$user->username}}</h4>
                            <p class="card-category"> {{ $user->fullname}}</p>
                        </div>
                        <div class="card-body">
                            @if (session('status'))
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="alert {{(session('status')=='You do not have permission to do this.') ? 'alert-danger' : 'alert-success'}}">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <i class="material-icons">close</i>
                                            </button>
                                            <span>{{ session('status') }}</span>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            <div class="row">
                                <div class="offset-1 col-2">
                                    <label for="">{{__("Username:")}}</label>
                                </div>
                                <div class="col-9">
                                    <h4>{{$user->username}}</h4>
                                </div>
                            </div>
                            <div class="row">
                                <div class="offset-1 col-2">
                                    <label for="">{{__("First name:")}}</label>
                                </div>
                                <div class="col-9">
                                    <h4>{{$user->firstname}}</h4>
                                </div>
                            </div>
                            <div class="row">
                                <div class="offset-1 col-2">
                                    <label for="">{{__("Last Name:")}}</label>
                                </div>
                                <div class="col-9">
                                    <h4>{{$user->lastname}}</h4>
                                </div>
                            </div>
                            <div class="row">
                                <div class="offset-1 col-2">
                                    <label for="">{{__("Email:")}}</label>
                                </div>
                                <div class="col-9">
                                    <h4>{{$user->email}}</h4>
                                </div>
                            </div>
                            <div class="row">
                                <div class="offset-1 col-2">
                                    <label for="">{{__("Role:")}}</label>
                                </div>
                                <div class="col-9">
                                    <h4>{{$user->hasRole('super admin')?'Super Admin':($user->hasRole('super user')?'Super User':'User')}}</h4>
                                </div>
                            </div>



                            <div class="row">
                                <div class="offset-1 col-2">
                                    <label for="">{{__("Titel:")}}</label>
                                </div>
                                <div class="col-9">
                                    <h4>{{$user->title?$user->title:'---'}}</h4>
                                </div>
                            </div>
                            <div class="row">
                                <div class="offset-1 col-2">
                                    <label for="">{{__("Tussenvoegsels:")}}</label>
                                </div>
                                <div class="col-9">
                                    <h4>{{$user->insertions?$user->insertions:'---'}}</h4>
                                </div>
                            </div>
                            <div class="row">
                                <div class="offset-1 col-2">
                                    <label for="">{{__("Geslacht:")}}</label>
                                </div>
                                <div class="col-9">
                                    <h4>{{$user->gender?$user->gender:'---'}}</h4>
                                </div>
                            </div>



                            <div class="row">
                                <div class="offset-1 col-2">
                                    <label for="">{{__("Phone number:")}}</label>
                                </div>
                                <div class="col-9">
                                    <h4>{{$user->phone_number}}</h4>
                                </div>
                            </div>
                            <div class="row">
                                <div class="offset-1 col-2">
                                    <label for="">{{__("Mobile:")}}</label>
                                </div>
                                <div class="col-9">
                                    <h4>{{$user->mobile?$user->mobile:'---'}}</h4>
                                </div>
                            </div>
                            <div class="row">
                                <div class="offset-1 col-2">
                                    <label for="">{{__("Created by:")}}</label>
                                </div>
                                <div class="col-9">
                                    <h4>
                                        <a href="{{route('profile.show',$user->createdBy == null ? 1 : $user->createdBy->id)}}">{{$user->createdBy == null ? "Unknown" : $user->createdBy->username}}</a>
                                    </h4>
                                </div>
                            </div>
                            <div class="row">
                                <div class="offset-1 col-2">
                                    <label for="">{{__("Email verified at")}}</label>
                                </div>
                                <div class="col-9">
                                    <h4>{{$user->email_verified_at}}</h4>
                                </div>
                            </div>
                            <div class="row">
                                <div class="offset-1 col-2">
                                    <label for="">{{__("Created at")}}</label>
                                </div>
                                <div class="col-9">
                                    <h4>{{$user->created_at}}</h4>
                                </div>
                            </div>
                            <div class="row">
                                <div class="offset-9 col-2">
                                    <a href="{{route('profile.edit', $user)}}">
                                        <button type="button" class="btn btn-primary btn-lg">Edit Profile</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            @canImpersonate
                            <a href="{{ route('impersonate', $user->id) }}" class="btn btn-info">Impersonate this user</a>
                            @endCanImpersonate
                        </div>
                    </div>
                </div>
                <?php if(isset($user->company->name)){ ?>
                <div class="col-4">
                    <div class="card" style="width: 18rem;">
                        <?php if(isset($user->company->logo)){ ?>
                        	<img class="card-img-top"
                             src="{{$user->company->logo == 'logo.png' ? asset('logo.png') : asset(env('STORAGENAME').'/'.$user->company->logo)}}"
                             alt="Company Logo">
                        <?php }else{ ?>
                       	 <img class="card-img-top"
                             src="{{ asset('logo.png') }}"
                             alt="Company Logo">
                        <?php } ?>
                        <div class="card-body">
                            <h2 class="card-title">{{$user->company->name}}</h2>
                            </div>
                        </div>
                </div>
                 <?php } ?>
            </div>
        </div>
    </div>
@endsection
