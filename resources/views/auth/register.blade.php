@extends('layouts.app', ['class' => 'off-canvas-sidebar', 'activePage' => 'register', 'title' => __(env("APP_NAME"))])

@section('content')
<div class="container" style="height: auto;">
  <div class="row align-items-center">
    <div class="col-lg-4 col-md-6 col-sm-8 ml-auto mr-auto">
      <form class="form" method="POST" action="{{ route('register') }}">
        @csrf

        <div class="card card-login card-hidden mb-3">
          <div class="card-header card-header-primary text-center">
            <h4 class="card-title"><strong>{{ __('Register') }}</strong></h4>
          </div>
          <div class="card-body ">
            <div class="bmd-form-group{{ $errors->has('username') ? ' has-danger' : '' }}">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                      <i class="material-icons">face</i>
                  </span>
                </div>
                <input type="text" name="username" class="form-control" placeholder="{{ __('Username ') }}" value="{{ old('username') }}" required>
              </div>
              @if ($errors->has('username'))
                <div id="username-error" class="error text-danger pl-3" for="username" style="display: block;">
                  <strong>{{ $errors->first('username') }}</strong>
                </div>
              @endif
            </div>
            <div class="bmd-form-group{{ $errors->has('firstname') ? ' has-danger' : '' }}">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                      <i class="material-icons">face</i>
                  </span>
                </div>
                <input type="text" name="firstname" class="form-control" placeholder="{{ __('First name') }}" value="{{ old('firstname') }}" required>
              </div>
              @if ($errors->has('firstname'))
                <div id="name-error" class="error text-danger pl-3" for="firstname" style="display: block;">
                  <strong>{{ $errors->first('firstname') }}</strong>
                </div>
              @endif
            </div>
            <div class="bmd-form-group{{ $errors->has('lastname') ? ' has-danger' : '' }}">
                  <div class="input-group">
                      <div class="input-group-prepend">
                  <span class="input-group-text">
                      <i class="material-icons">face</i>
                  </span>
                      </div>
                      <input type="text" name="lastname" class="form-control" placeholder="{{ __('Last name') }}" value="{{ old('lastname') }}" required>
                  </div>
                  @if ($errors->has('lastname'))
                      <div id="name-error" class="error text-danger pl-3" for="lastname" style="display: block;">
                          <strong>{{ $errors->first('lastname') }}</strong>
                      </div>
                  @endif
            </div>
            <div class="bmd-form-group{{ $errors->has('email') ? ' has-danger' : '' }} mt-3">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="material-icons">email</i>
                  </span>
                </div>
                <input type="email" name="email" class="form-control" placeholder="{{ __('Email...') }}" value="{{ old('email') }}" required>
              </div>
              @if ($errors->has('email'))
                <div id="email-error" class="error text-danger pl-3" for="email" style="display: block;">
                  <strong>{{ $errors->first('email') }}</strong>
                </div>
              @endif
            </div>
            <div class="bmd-form-group{{ $errors->has('phone_number') ? ' has-danger' : '' }} mt-3">
                  <div class="input-group">
                      <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="material-icons">settings_phone</i>
                  </span>
                      </div>
                      <input type="phone_number" name="phone_number" class="form-control" placeholder="{{ __('Phone number...') }}" value="{{ old('phone_number') }}" required>
                  </div>
                  @if ($errors->has('phone_number'))
                      <div id="phone_number-error" class="error text-danger pl-3" for="phone_number" style="display: block;">
                          <strong>{{ $errors->first('phone_number') }}</strong>
                      </div>
                  @endif
            </div>
            <div class="bmd-form-group{{ $errors->has('password') ? ' has-danger' : '' }} mt-3">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="material-icons">lock_outline</i>
                  </span>
                </div>
                <input type="password" name="password" id="password" class="form-control" placeholder="{{ __('Password...') }}" required>
              </div>
              @if ($errors->has('password'))
                <div id="password-error" class="error text-danger pl-3" for="password" style="display: block;">
                  <strong>{{ $errors->first('password') }}</strong>
                </div>
              @endif
            </div>
            <div class="bmd-form-group{{ $errors->has('password_confirmation') ? ' has-danger' : '' }} mt-3">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="material-icons">lock_outline</i>
                  </span>
                </div>
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="{{ __('Confirm Password...') }}" required>
              </div>
              @if ($errors->has('password_confirmation'))
                <div id="password_confirmation-error" class="error text-danger pl-3" for="password_confirmation" style="display: block;">
                  <strong>{{ $errors->first('password_confirmation') }}</strong>
                </div>
              @endif
            </div>
            {{--<div class="form-check mr-auto ml-3 mt-3">--}}
              {{--<label class="form-check-label">--}}
                {{--<input class="form-check-input" type="checkbox" id="policy" name="policy" {{ old('policy', 1) ? 'checked' : '' }} >--}}
                {{--<span class="form-check-sign">--}}
                  {{--<span class="check"></span>--}}
                {{--</span>--}}
                {{--{{ __('I agree with the ') }} <a href="#">{{ __('Privacy Policy') }}</a>--}}
              {{--</label>--}}
            {{--</div>--}}
          </div>
          <div class="card-footer justify-content-center">
            <button type="submit" class="btn btn-primary btn-link btn-lg">{{ __('Create account') }}</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
