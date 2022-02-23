@extends('layouts.app', ['activePage' => 'user-management', 'titlePage' => __('User Management')])

@section('content')
    <div class="content">
        <div class="container-fluid">
             @if (session('status'))
                <div class="row">
                    <div class="col-sm-12">
                        <div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <i class="material-icons">close</i>
                            </button>
                            <span>{{ session('status') }}</span>
                        </div>
                    </div>
                </div>
            @endif
            <div class="row">
                <div class="col-md-12">
                    <form method="post" action="{{ route('users.update', $user) }}" autocomplete="off"
                          class="form-horizontal">
                        @csrf
                        @method('put')
                        @include('includes.errors')
                        <div class="card ">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">{{ __('Edit User') }}</h4>
                                <p class="card-category"></p>
                            </div>
                            <div class="card-body ">
                                <div class="row">
                                    <div class="col-md-12 text-right">
                                        <a href="{{ route('users.index') }}"
                                           class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                                    </div>
                                </div>
                               

                                @include('admin.users.partials.role')

                                 <div class="row" id="company_section"
                                  @if(isset($user->roles->first()->name) && $user->roles->first()->name=="super admin"){{'style=display:none'}} @endif >
                                    <label class="col-sm-2 col-form-label">{{ __('Company') }}</label>
                                    @if(isset($user->company->id))
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('company_id') ? ' has-danger' : '' }}">
                                            @if(auth()->user()->hasRole('super admin'))
                                                <select class="form-control"  name="company_id" id="input-company_id">
                                                    <option value="{{$user->company->id}}" selected>{{$user->company->name}}</option>
                                                    @foreach($companies->except($user->company->id) as $company)
                                                        <option value="{{$company->id}}">{{$company->name}}</option>
                                                    @endforeach
                                                </select>
                                            @else
                                                <input class="form-control" type="text" value="{{$user->company->name}}" disabled>
                                            @endif
                                            @if ($errors->has('company_id'))
                                                <span id="company_id-error" class="error text-danger" for="input-company_id">{{ $errors->first('company_id') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    @else
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('company_id') ? ' has-danger' : '' }}">
                                                <select class="form-control"  name="company_id" id="input-company_id">
                                                    @foreach($companies as $company)
                                                        <option value="{{$company->id}}">{{$company->name}}</option>
                                                    @endforeach
                                                </select>
                                            @if ($errors->has('company_id'))
                                                <span id="company_id-error" class="error text-danger" for="input-company_id">{{ $errors->first('company_id') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    @endif
                                </div>
                                <div class="row financial_access_container" <?php if(isset($user->company->id) && $user->company->id != 1){ echo "style='display:none'"; } ?>>
                                    <label class="col-sm-2 col-form-label">{{ __('Financial Access') }}</label>
                                    <div class="col-sm-7">
                                        <select class="form-control" name="financial_access" id="input-role">
                                            <option value="0" <?php if(isset($user) && $user->financial_access == 0){ echo "selected"; } ?>>No</option>
                                            <option value="1" <?php if(isset($user) && $user->financial_access == 1){ echo "selected"; } ?>>Yes</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Email') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                                   name="email" id="input-email" type="email"
                                                   placeholder="{{ __('Email') }}"
                                                   value="{{ old('email', $user->email) }}" required/>
                                            @if ($errors->has('email'))
                                                <span id="email-error" class="error text-danger"
                                                      for="input-email">{{ $errors->first('email') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                
















                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Title') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('title') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}"
                                                   name="title" id="input-titel" type="text"
                                                   placeholder="{{ __('Title') }}" value="{{$user->title}}"/>
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
                                                   placeholder="{{ __('VOorletters') }}" value="{{$user->initials}}" />
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
                                                   placeholder="{{ __('Voornaam') }}" value="{{$user->firstname}}" />
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
                                                   placeholder="{{ __('Tussenvoegsels') }}" value="{{$user->insertions}}" />
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
                                                   placeholder="{{ __('Achternaam') }}" value="{{$user->lastname}}" />
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
                                                   placeholder="{{ __('Mobile') }}" value="{{$user->mobile}}" />
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
                                                   placeholder="{{ __('Phone') }}" value="{{$user->phone_number}}" />
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
                                            <input
                                                class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                                input type="password" name="password" id="input-password"
                                                placeholder="{{ __('Password') }}"/>
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
                                            <input class="form-control" name="password_confirmation"
                                                   id="input-password-confirmation" type="password"
                                                   placeholder="{{ __('Confirm Password') }}"/>
                                        </div>
                                    </div>
                                </div>





                            </div>
                            <div class="card-footer ml-auto mr-auto">
                                <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
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