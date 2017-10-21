@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4" style="margin-top:  20px">
            <div class="panel panel-default">
                <div class="panel-heading">Login</div>
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" id="loginForm" action="{{ route('login') }}">
                        {{ csrf_field() }}
                        <input id="email" type="email" class="input-full main-input" name="email" value="{{ old('email') }}" required autofocus placeholder="{{ Lang::get('pages.email') }}">
                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                        <input id="password" type="password" class="input-full main-input" name="password" required placeholder="{{ Lang::get('pages.pass') }}">
                        @if ($errors->has('password'))
                            <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                        @endif
                    </form>
                    <button type="submit" form="loginForm" class="button-primary  button-full">
                        <span>{{ Lang::get('pages.login') }}</span>
                        <div class="button-triangle"></div>
                        <div class="button-triangle2"></div>
                        <div class="button-icon"><i class="fa fa-user"></i></div>
                    </button>
                    <a href="#" class="forgot-link pull-right">{{ Lang::get('pages.forgot_pass') }}</a>
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
                    <p class="modal-bottom">{{ Lang::get('pages.dont_account') }} <a href="/register" class="register-link">{{ Lang::get('pages.sign_up') }}</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
