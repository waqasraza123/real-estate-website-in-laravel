@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4" style="margin-top: 20px">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" id="registerForm" action="{{ route('register') }}">
                        {{ csrf_field() }}
                        <input id="first_name" type="text" class="input-full main-input" placeholder="First Name" name="first_name" value="{{ old('first_name') }}" required autofocus>
                        @if ($errors->has('name'))
                            <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                        @endif
                        <input id="last_name" type="text" class="input-full main-input" placeholder="Last Name" name="last_name" value="{{ old('last_name') }}" required autofocus>
                        @if ($errors->has('name'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                        @endif
                        <input id="email" type="email" class="input-full main-input" name="email" placeholder="{{ Lang::get('pages.email') }}" value="{{ old('email') }}" required>
                        @if ($errors->has('email'))
                            <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                        @endif
                        <input id="password" type="password" class="input-full main-input" placeholder="{{ Lang::get('pages.pass') }}" name="password" required>
                        @if ($errors->has('password'))
                            <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                        @endif
                        <input id="password-confirm" type="password" class="input-full main-input" placeholder="{{ Lang::get('pages.confirm_pass') }}" name="password_confirmation" required>
                    </form>
                    <button type="submit" form="registerForm" class="button-primary  button-full">
                        <span>{{ Lang::get('pages.sign_up') }}</span>
                        <div class="button-triangle"></div>
                        <div class="button-triangle2"></div>
                        <div class="button-icon"><i class="fa fa-user"></i></div>
                    </button>
                    <div class="clearfix"></div>
                    <p class="login-or">{{ Lang::get('pages.or') }}</p>
                    <a href="redirect" class="facebook-button">
                        <i class="fa fa-facebook"></i>
                        <span>{{ Lang::get('pages.sign_face') }}</span>
                    </a>
                    <a href="{{ route('social.redirect', ['provider' => 'google']) }}" class="google-button margin-top-15">
                        <i class="fa fa-google-plus"></i>
                        <span>{{ Lang::get('pages.sign_google') }}</span>
                    </a>
                    <p class="modal-bottom">{{ Lang::get('pages.already_reg') }}<a href="#" class="login-link">{{ Lang::get('pages.login') }}</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
