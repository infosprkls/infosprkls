@extends('layouts.app', ['activePage' => 'profile', 'titlePage' => __('User Profile')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form method="post" action="{{ route('profile.password', $user->id) }}" class="form-horizontal">
                        @csrf
                        @method('put')

                        <div class="card ">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">{{ __('Change password') }}</h4>
                                <p class="card-category">{{ __('Password') }}</p>
                            </div>
                            <div class="card-body ">
                                @if (session('status_password'))
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="alert alert-success">
                                                <button type="button" class="close" data-dismiss="alert"
                                                        aria-label="Close">
                                                    <i class="material-icons">close</i>
                                                </button>
                                                <span>{{ session('status_password') }}</span>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                <div class="row">
                                    <label class="col-sm-2 col-form-label"
                                           for="input-current-password">{{ __('Current Password') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('old_password') ? ' has-danger' : '' }}">
                                            <input
                                                class="form-control{{ $errors->has('old_password') ? ' is-invalid' : '' }}"
                                                input type="password" name="old_password" id="input-current-password"
                                                placeholder="{{ __('Current Password') }}" value="" required/>
                                            @if ($errors->has('old_password'))
                                                <span id="name-error" class="error text-danger"
                                                      for="input-name">{{ $errors->first('old_password') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label"
                                           for="input-password">{{ __('New Password') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                                            <input
                                                class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                                name="password" id="input-password" type="password"
                                                placeholder="{{ __('New Password') }}" value="" required/>
                                            @if ($errors->has('password'))
                                                <span id="password-error" class="error text-danger"
                                                      for="input-password">{{ $errors->first('password') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label"
                                           for="input-password-confirmation">{{ __('Confirm New Password') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group">
                                            <input class="form-control" name="password_confirmation"
                                                   id="input-password-confirmation" type="password"
                                                   placeholder="{{ __('Confirm New Password') }}" value="" required/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer ml-auto mr-auto">
                                <button type="submit" class="btn btn-primary">{{ __('Change password') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <form method="post" action="{{ route('profile.update', $user->id) }}" autocomplete="off"
                          class="form-horizontal">
                        @csrf
                        @method('put')
                        @include('includes.errors')

                        <div class="card ">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">{{ __('Edit Profile') }}</h4>
                                <p class="card-category">{{ __('User information') }}</p>
                            </div>
                            <div class="card-body ">
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
                                {{--Firstname --}}
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('First name') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('firstname') ? ' has-danger' : '' }}">
                                            <input
                                                class="form-control{{ $errors->has('firstname') ? ' is-invalid' : '' }}"
                                                name="firstname" id="input-firstname" type="text"
                                                placeholder="{{ __('First name') }}"
                                                value="{{ old('firstname', $user->firstname) }}"
                                                required="true"
                                                aria-required="true"/>
                                            @if ($errors->has('firstname'))
                                                <span id="name-error" class="error text-danger"
                                                      for="input-firstname">{{ $errors->first('firstname') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                {{--Lastname --}}
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Last name') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('lastname') ? ' has-danger' : '' }}">
                                            <input
                                                class="form-control{{ $errors->has('lastname') ? ' is-invalid' : '' }}"
                                                name="lastname" id="input-lastname" type="text"
                                                placeholder="{{ __('Last name') }}"
                                                value="{{ old('lastname', $user->lastname) }}" required="true"
                                                aria-required="true"/>
                                            @if ($errors->has('lastname'))
                                                <span id="name-error" class="error text-danger"
                                                      for="input-lastname">{{ $errors->first('lastname') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>



                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Titel') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('title') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}"
                                                   name="title" id="input-titel" type="text"
                                                   placeholder="{{ __('Titel') }}" value="{{ old('title', $user->title) }}"/>
                                            @if ($errors->has('title'))
                                                <span id="titel-error" class="error text-danger"
                                                      for="input-titel">{{ $errors->first('title') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('VOorletters') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('initials') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('initials') ? ' is-invalid' : '' }}"
                                                   name="initials" id="input-vOorletters" type="text"
                                                   placeholder="{{ __('VOorletters') }}" value="{{ old('initials', $user->initials) }}" required/>
                                            @if ($errors->has('initials'))
                                                <span id="vOorletters-error" class="error text-danger"
                                                      for="input-vOorletters">{{ $errors->first('initials') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>


                                <!-- <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Voornaam') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('firstname') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('firstname') ? ' is-invalid' : '' }}"
                                                   name="firstname" id="input-voornaam" type="text"
                                                   placeholder="{{ __('Voornaam') }}" value="{{ old('firstname', $user->firstname) }}" required/>
                                            @if ($errors->has('firstname'))
                                                <span id="voornaam-error" class="error text-danger"
                                                      for="input-voornaam">{{ $errors->first('firstname') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div> -->

                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Tussenvoegsels') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('insertions') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('insertions') ? ' is-invalid' : '' }}"
                                                   name="insertions" id="input-tussenvoegsels" type="text"
                                                   placeholder="{{ __('Tussenvoegsels') }}" value="{{ old('insertions', $user->insertions) }}"/>
                                            @if ($errors->has('insertions'))
                                                <span id="tussenvoegsels-error" class="error text-danger"
                                                      for="input-tussenvoegsels">{{ $errors->first('insertions') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                               <!--  <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Achternaam') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('lastname') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('lastname') ? ' is-invalid' : '' }}"
                                                   name="lastname" id="input-achternaam" type="text"
                                                   placeholder="{{ __('Achternaam') }}" value="{{ old('lastname', $user->lastname) }}" required/>
                                            @if ($errors->has('lastname'))
                                                <span id="achternaam-error" class="error text-danger"
                                                      for="input-achternaam">{{ $errors->first('lastname') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div> -->

                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Geslacht') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('gender') ? ' has-danger' : '' }}">
                                            <select class="form-control" name="gender" id="input-company">
                                            <option {{ $user->gender=='Male'?'SELECTED':'' }} value="Male">Male</option>
                                            <option {{ $user->gender=='Female'?'SELECTED':'' }} value="Female">Female</option>
                                                
                                            </select>
                                            @if ($errors->has('gender'))
                                                <span id="geslacht-error" class="error text-danger"
                                                      for="input-geslacht">{{ $errors->first('gender') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Mobile') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('mobile') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('mobile') ? ' is-invalid' : '' }}"
                                                   name="mobile" id="input-mobile" type="number"
                                                   placeholder="{{ __('Mobile') }}" value="{{ old('mobile', $user->mobile) }}"/>
                                            @if ($errors->has('mobile'))
                                                <span id="mobile-error" class="error text-danger"
                                                      for="input-mobile">{{ $errors->first('mobile') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>



                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Phone Number') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('phone_number') ? ' has-danger' : '' }}">
                                            <input
                                                class="form-control{{ $errors->has('phone_number') ? ' is-invalid' : '' }}"
                                                name="phone_number" id="input-phoneNumber" type="text"
                                                placeholder="{{ __('Phone Number') }}"
                                                value="{{ old('phone_number', $user->phone_number) }}" aria-required="true"/>
                                            @if ($errors->has('phone_number'))
                                                <span id="name-error" class="error text-danger"
                                                      for="input-phoneNumber">{{ $errors->first('phone_number') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
								<input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                                   name="email" id="input-email" type="hidden"
                                                   placeholder="{{ __('Email') }}"
                                                   value="{{ old('email', $user->email) }}" />
                            </div>
                            <div class="card-footer ml-auto mr-auto">
                                <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
								<a href="{{route('profile.show', $user)}}" class="btn btn-primary">{{ __('Cancel') }}</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            
        </div>
    </div>
@endsection
