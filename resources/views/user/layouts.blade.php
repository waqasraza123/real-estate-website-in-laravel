<!DOCTYPE>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="format-detection" content="telephone=no">
    <meta name="format-detection" content="email=no">
    <meta name="HandheldFriendly" content="true">
    <title>Apartments.com: Apartments and Homes for Rent </title>
    <link href="{{ asset('css/style.css') }}" type="text/css" rel="stylesheet">
    <link href="{{ asset('css/home.css') }}" type="text/css" rel="stylesheet">
    <link href="{{ asset('css/listing.css') }}" type="text/css" rel="stylesheet">
    <script>
        window.Laravel = {!! json_encode([
                'csrfToken' => csrf_token(),
            ]) !!};
    </script>

</head>
<body class="desktop ">

<div class="mainWrapper">
    <header class=" mainHeader" id="mainHeader">
        <nav class="mainHeaderNavigation" id="mainHeaderNavigation">
            <div class="menuSection">
                <button id="headerMenuLink" type="button" class="dropdownToggle primary homeBtn">
                    <i class="hamburgerIcon"></i><span>Menu</span>
                </button>
                <div id="menuNavWrapper" class="menuNavWrapper">
                    <div id="menuNavContainer">
                        <div class="menuOpenWrapper">
                            <span id="menuHeader" class="menuHeader"><i class="hamburgerIcon"></i><span
                                        class="menuText">Menu</span></span>
                            <ul id="menuNavigation" class="menuNavigation">
                                <li><a href="#" rel="nofollow"
                                       data-requirelogin="true">Customer Tools</a></li>
                                <li><a id="menuNavLnkSaveSearches"
                                       href="#" rel="nofollow"
                                       data-requirelogin="true">My Saved Searches</a></li>
                                <li><a id="menuNavLnkFavorites"
                                       href="#" rel="nofollow">My
                                        Favorites</a></li>
                                <li id="menuNavLnkUserNotificationSettings"><a
                                            href="#"
                                            rel="nofollow"><span>Notification Settings</span></a></li>
                                <li>
                                    <a href="/" class="expandable" data-requirelogin="false">Apartments
                                        For Rent <i class="mapZoomInIcon"></i></a>
                                    <ul class="submenu">
                                        <li><a href="">Austin Apartments</a></li>
                                        <li><a href="">Boston Apartments</a></li>
                                        <li><a href="">Charlotte Apartments</a>
                                        </li>
                                        <li><a href="">Chicago Apartments</a></li>
                                        <li><a href="">Houston Apartments</a></li>
                                        <li><a href="">Las Vegas Apartments</a>
                                        </li>
                                        <li><a href="">Los Angeles
                                                Apartments</a></li>
                                        <li><a href="">New York City
                                                Apartments</a></li>
                                        <li><a href="">San Diego Apartments</a>
                                        </li>
                                        <li><a href="">Seattle Apartments</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="" class="expandable"
                                       data-requirelogin="false">Homes For Rent <i class="mapZoomInIcon"></i></a>
                                </li>
                                <li>
                                    <a href="" class="expandable"
                                       data-requirelogin="false">Condos For Rent <i class="mapZoomInIcon"></i></a>
                                </li>
                                <li>
                                    <a href="" class="expandable"
                                       data-requirelogin="false">Townhomes for Rent <i class="mapZoomInIcon"></i></a>
                                </li>
                                <li><a id="menuNavLnkMobileApps" target="_blank"
                                       href="//" data-requirelogin="false">Mobile
                                        Apps</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="headerSwitchLanguageWrapper">
                <a href="" title="Español" data-culture="es-US"
                   class="headerSwitchLanguage"><i class="worldIcon"></i>Español</a>
            </div>
            <div class="logoSpacer"></div>
            <div class="logo">
                <a href="/">
                    <img src="{{ asset('images/apartments-for-rent-logo.png') }}" alt="Apartments.com Logo">
                </a>
            </div>
            <div class="loginPrevNextWrapper">
                <div id="headerLoginSection" class="loginSection">
                    @if(!Auth::user())
                        <a href="javascript:void(0);" class="" data-toggle="modal" data-target="#createAccountModal">Sign Up</a>
                        <span>/</span>
                        <a href="javascript:void(0);" data-toggle="modal" data-target="#loginModal" >Sign In</a>
                    @else
                        <a href="{{ route('account' , ['id' => Auth::user()->id]) }}">{{ Lang::get('profile.m_a') }}</a>
                        <span>/</span>
                        <a href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            Logout
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    @endif
                </div>

            </div>

            <a href="{{ route('addListing') }}" id="headerAddListing" href="javascript:void(0);" title="Add a Listing">
                <span>Add a Listing</span>
            </a>
        </nav>
    </header>
    @yield('content')
    <div id="signupContainer">
        <div class="modal createAccountModal fade" id="createAccountModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
            <div class="modalContainer">
                <div class="modalContent">
                    <div class="modalHeader">
                        <button type="button" class="close closeIcon" data-dismiss="modal"></button>
                        <h2 id="signupModalHeader">Sign Up</h2>
                        <h4 class="modalSubTitle">Please sign up to keep track of your favorites and saved searches.</h4>
                    </div>
                    <div class="modalBody">
                        <span id="signupError" class="error"></span>
                        <section class="loginForm">
                            <form class="form-horizontal" method="POST" id="registerForm" action="{{ route('register') }}">
                                {{ csrf_field() }}

                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                    <label for="name" class="col-md-4 control-label">Name</label>

                                    <div class="col-md-6">
                                        <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                        @if ($errors->has('name'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                    <label for="password" class="col-md-4 control-label">Password</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control" name="password" required>

                                        @if ($errors->has('password'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                                    <div class="col-md-6">
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                    </div>
                                </div>
                            </form>
                            {{--<div class="checkboxGroup">
                                <input id="emailAlerts" type="checkbox" class="primaryCheckbox" checked="">
                                <label for="emailAlerts"><span class="checkLabel">Receive email alerts when new rentals are available</span></label>
                            </div>
                            <div class="checkboxGroup">
                                <input id="landlordIndustryProfessional" type="checkbox" class="primaryCheckbox">
                                <label for="landlordIndustryProfessional"><span class="checkLabel">I am a landlord or industry professional.</span></label>
                            </div>
                            <p class="terms">
                                By registering, I accept the Apartments.com <a class="greenLink" target="_blank" href="">Terms of Use.</a>
                            </p>--}}
                            <section class="loginSocial">
                                <ul>
                                    <li>
                                        <span>Sign up with</span>
                                    </li>
                                    <li>
                                        <a href="redirect" id="facebookLogin" class="socialBtn facebookBtn"><i class="facebookLogoIcon"></i></a>
                                    </li>
                                    <li>
                                        <a href="{{ route('social.redirect', ['provider' => 'google']) }}" id="googleLogin" class="socialBtn googleplusBtn"><i class="googleLogoIcon"></i></a>
                                    </li>

                                </ul>
                                <button type="submit" id="signupBtn" form="registerForm" class="primary">Sign Up</button>
                                <i id="signupSpinner" class="aptsLogoMarkIcon rotate"></i>
                                <i id="signupSpinnerFallback" class="spinner"></i>
                            </section>
                        </section>
                        <section class="alreadyMember">
                            <p><a id="signupSignin" class="action" href="javascript:void(0);">Sign In</a> if you are already a member </p>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal loginSocialModal  fade" data-backdrop="static" id="loginModal" tabindex="-1"  aria-hidden="false">
        <div class="modalContainer">
            <div class="modalContent">
                <div class="modalHeader">
                    <button type="button" class="close closeIcon" data-dismiss="modal"></button>
                </div>
                <div class="modalBody">
                    <h2 id="loginModalHeader">Sign In</h2>
                    <h4 id="loginModalSubHeader" class="modalSubTitle">Please sign in to keep track of your favorites and saved searches.</h4>
                    <p id="loginError" class="error"></p>
                    <section class="loginForm">
                        <form class="form-horizontal" method="POST" id="loginForm" action="{{ route('login') }}">
                            {{ csrf_field() }}
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-4 control-label">E-Mail Address</label>
                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus placeholder="Email">
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password" class="col-md-4 control-label">Password</label>
                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" name="password" required placeholder="Password">
                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                                    <strong>{{ $errors->first('password') }}</strong>
                                                </span>
                                    @endif
                                </div>
                            </div>
                        </form>
                        <p class="forgotPassword">
                            <a id="loginForgotPassword" class="action" href="#">Forgot Password?</a>
                        </p>
                        <section class="loginSocial">
                            <span>Sign in with</span>
                            <a href="redirect" id="facebookLogin" class="socialBtn facebookBtn"><i class="facebookLogoIcon"></i></a>
                            <a href="{{ route('social.redirect', ['provider' => 'google']) }}" id="googleLogin" class="socialBtn googleplusBtn"><i class="googleLogoIcon"></i></a>
                            <button type="submit" id="signIn" form="loginForm" class="primary signInBtn">Done</button>
                            <i id="loginSpinner" class="aptsLogoMarkIcon rotate"></i>
                            <i id="loginSpinnerFallback" class="spinner"></i>
                        </section>
                    </section>
                    <p class="notMember">
                        <a id="signUp" class="action" href="javascript:void(0);">Sign up</a> if you are not a member
                    </p>
                </div>
            </div>
        </div>
    </div>
    @yield('scripts')
</div>
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/dropzone.js') }}"></script>
<script src="{{ asset('js/init.js') }}"></script>
<script src="{{ asset('js/listing.js') }}"></script>
<script src="{{ asset('js/bundle.js') }}"></script>
<script src="{{ asset('js/addlisting.js') }}"></script>
<script src="{{ asset('js/home.js') }}"></script>

</body>
</html>