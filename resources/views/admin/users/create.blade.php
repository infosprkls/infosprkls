@extends('layouts.app', ['activePage' => 'user-management', 'titlePage' => __('User Management')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            @if($errors->any())
            <div class="alert alert-danger">
                <li>{{$errors->first()}}</li>
            </div>
            @endif
            
            <div class="row">
                <div class="col-md-12">
                    <form method="POST" action="{{ route('users.store') }}" autocomplete="off" class="form-horizontal">
                        @csrf
                        @method('post')
                        <div class="card ">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">{{ __('Add User') }}</h4>
                                <p class="card-category"></p>
                            </div>
                            <div class="card-body ">
                                <div class="row">
                                    <div class="col-md-12 text-right">
                                        <a href="{{ route('users.index') }}"
                                           class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                                    </div>
                                </div>
                                @if($isadmin || $isuperuser)
                                @include('admin.users.partials.role')
                                @endif
								@if ($isadmin)
                                <div class="row" id="company_section">
                                    <label class="col-sm-2 col-form-label">{{ __('Company') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('company') ? ' has-danger' : '' }}">
                                            <select required class="form-control" name="company_id" id="input-company">
                                                <option value="">Select Company</option>
												@foreach($companies as $company)
                                                    <option {{ $companyid==$company->id?'SELECTED':'' }}
                                                        value="{{$company->id}}">{{$company->name}}</option>
                                                @endforeach
												
                                            </select>
                                            @if ($errors->has('company'))
                                                <span id="company-error" class="error text-danger"
                                                      for="input-company">{{ $errors->first('company') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="row financial_access_container" style="display: none">
                                    <label class="col-sm-2 col-form-label">{{ __('Financial Access') }}</label>
                                    <div class="col-sm-7">
                                        <select class="form-control" name="financial_access" id="input-role">
                                            <option value="0">No</option>
                                            <option value="1">Yes</option>
                                        </select>
                                    </div>
                                </div>
								@endif
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Email') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                                   name="email" id="input-email" type="email"
                                                   placeholder="{{ __('Email') }}" value="{{ old('email') }}" required/>
                                            @if ($errors->has('email'))
                                                <span id="email-error" class="error text-danger"
                                                      for="input-email">{{ $errors->first('email') }}</span>
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
                                                   placeholder="{{ __('Title') }}" value="{{ old('title') }}" />
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
                                                   placeholder="{{ __('VOorletters') }}" value="{{ old('initials') }}" />
                                            @if ($errors->has('initials'))
                                                <span id="vOorletters-error" class="error text-danger"
                                                      for="input-vOorletters">{{ $errors->first('initials') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Voornaam') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('firstname') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('firstname') ? ' is-invalid' : '' }}"
                                                   name="firstname" id="input-voornaam" type="text"
                                                   placeholder="{{ __('Voornaam') }}" value="{{ old('firstname') }}" />
                                            @if ($errors->has('firstname'))
                                                <span id="voornaam-error" class="error text-danger"
                                                      for="input-voornaam">{{ $errors->first('firstname') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Tussenvoegsels') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('insertions') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('insertions') ? ' is-invalid' : '' }}"
                                                   name="insertions" id="input-tussenvoegsels" type="text"
                                                   placeholder="{{ __('Tussenvoegsels') }}" value="{{ old('insertions') }}" />
                                            @if ($errors->has('insertions'))
                                                <span id="tussenvoegsels-error" class="error text-danger"
                                                      for="input-tussenvoegsels">{{ $errors->first('insertions') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Achternaam') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('lastname') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('lastname') ? ' is-invalid' : '' }}"
                                                   name="lastname" id="input-achternaam" type="text"
                                                   placeholder="{{ __('Achternaam') }}" value="{{ old('lastname') }}" />
                                            @if ($errors->has('lastname'))
                                                <span id="achternaam-error" class="error text-danger"
                                                      for="input-achternaam">{{ $errors->first('lastname') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Geslacht') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('gender') ? ' has-danger' : '' }}">
                                            <select class="form-control" name="gender" id="input-company">
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                                
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
                                                   placeholder="{{ __('Mobile') }}" value="{{ old('mobile') }}" />
                                            @if ($errors->has('mobile'))
                                                <span id="mobile-error" class="error text-danger"
                                                      for="input-mobile">{{ $errors->first('mobile') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Phone') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('phone') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}"
                                                   name="phone_number" id="input-phone" type="number"
                                                   placeholder="{{ __('Phone') }}" value="{{ old('phone_number') }}" />
                                            @if ($errors->has('phone_number'))
                                                <span id="phone-error" class="error text-danger"
                                                      for="input-phone">{{ $errors->first('phone_number') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-sm-2 col-form-label"
                                           for="input-password">{{ __(' Password') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                                            <input required
                                                class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                                type="password" name="password" id="input-password"
                                                placeholder="{{ __('Password') }}" value="" />
                                            @if ($errors->has('password'))
                                                <span id="name-error" class="error text-danger"
                                                      for="input-name">{{ $errors->first('password') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label"
                                           for="input-password-confirmation">{{ __('Confirm Password') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group">
                                            <input required class="form-control" name="password_confirmation"
                                                   id="input-password-confirmation" type="password"
                                                   placeholder="{{ __('Confirm Password') }}" value="" />
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="card-footer ml-auto mr-auto">
                                <button type="submit" class="btn btn-primary">{{ __('Add User') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
jQuery(document).on("change","[name=company_id]",function()
{
    var val = jQuery(this).val();
    if(val == 1)
    {
        jQuery(".financial_access_container").show();
    }
    else
    {
        jQuery('[name=financial_access]').val(0);
        jQuery(".financial_access_container").hide();
    }
})
</script>