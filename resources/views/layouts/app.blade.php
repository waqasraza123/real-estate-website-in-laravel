<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>2ndChanceLeasing | Find a Home</title>
    <meta name="keywords" content="Download, Apartment, Premium, Real Estate, HMTL, Site Template, property, mortgage, CSS">
    <meta name="description" content="Download Apartment - Premium Real Estate HMTL Site Template">
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{ asset('bootstrap\bootstrap.min.css') }}">
    <!-- Font awesome styles -->
    <link rel="stylesheet" href="{{ asset('apartment-font\css\font-awesome.min.css') }}">
    <!-- Custom styles -->
    <link rel='stylesheet' type='text/css' href='http://fonts.googleapis.com/css?family=Roboto:400,400italic,300,300italic,500,500italic,700,700italic&amp;subset=latin,latin-ext'>
    <link rel="stylesheet" type="text/css" href="{{ asset('css\plugins.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css\style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css\init.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css\apartment-layout.css') }}">
    <link id="skin" rel="stylesheet" type="text/css" href="{{ asset('css\apartment-colors-blue.css') }}">
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
    <body>
    <div class="loader-bg"></div>
    <div id="wrapper">
        <header class=" mainHeader" id="mainHeader">
            <nav class="mainHeaderNavigation" id="mainHeaderNavigation">
                <div class="menuSection">
                    <button id="headerMenuLink" type="button" class="dropdownToggle primary homeBtn">
                        <i class="fa fa-bars"></i><span>Menu</span>
                    </button>
                    <div id="menuNavWrapper" class="menuNavWrapper">
                        <div id="menuNavContainer">
                            <div class="menuOpenWrapper">
                                <span id="menuHeader" class="menuHeader"><i class="fa fa-bars"></i><span class="menuText">Menu</span></span>
                                <ul id="menuNavigation" class="menuNavigation">
                                    <li><a href="#" rel="nofollow" data-requirelogin="true">Customer Tools</a></li>
                                    <li><a id="menuNavLnkSaveSearches" href="#" rel="nofollow" data-requirelogin="true">My Saved Searches</a></li>
                                    <li><a id="menuNavLnkFavorites" href="#" rel="nofollow">My Favorites</a></li>
                                    <li id="menuNavLnkUserNotificationSettings"><a href="#" rel="nofollow"><span>Notification Settings</span></a></li>
                                    <li>
                                        <a href="index.html" class="expandable" data-requirelogin="false">Apartments For Rent <i class="mapZoomInIcon"></i></a>
                                        <ul class="submenu">
                                            <li><a href="#">Austin Apartments</a></li>
                                            <li><a href="#">Boston Apartments</a></li>
                                            <li><a href="#">Charlotte Apartments</a></li>
                                            <li><a href="#">Chicago Apartments</a></li>
                                            <li><a href="#">Houston Apartments</a></li>
                                            <li><a href="#">Las Vegas Apartments</a></li>
                                            <li><a href="#">Los Angeles Apartments</a></li>
                                            <li><a href="#">New York City Apartments</a></li>
                                            <li><a href="#">San Diego Apartments</a></li>
                                            <li><a href="#">Seattle Apartments</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="#" class="expandable" data-requirelogin="false">Homes For Rent <i class="mapZoomInIcon"></i></a>
                                        <ul class="submenu">
                                            <li><a href="#">Charlotte Houses for Rent</a></li>
                                            <li><a href="#">Dallas Houses for Rent</a></li>
                                            <li><a href="#">Fresno Houses for Rent</a></li>
                                            <li><a href="#">Houston Houses for Rent</a></li>
                                            <li><a href="#">Louisville Houses for Rent</a></li>
                                            <li><a href="#">Memphis Houses for Rent</a></li>
                                            <li><a href="#">Nashville Houses for Rent</a></li>
                                            <li><a href="#">Phoenix Houses for Rent</a></li>
                                            <li><a href="#">San Antonio Houses for Rent</a></li>
                                            <li><a href="#">Tampa Houses for Rent</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="#" class="expandable" data-requirelogin="false">Condos For Rent <i class="mapZoomInIcon"></i></a>
                                        <ul class="submenu">
                                            <li><a href="#">Atlanta Condos for Rent</a></li>
                                            <li><a href="#">Charlotte Condos for Rent</a></li>
                                            <li><a href="#">Chicago Condos for Rent</a></li>
                                            <li><a href="#">Houston Condos for Rent</a></li>
                                            <li><a href="#">Jacksonville Condos for Rent</a></li>
                                            <li><a href="#">Las Vegas Condos for Rent</a></li>
                                            <li><a href="#">Miami Condos for Rent</a></li>
                                            <li><a href="#">Nashville Condos for Rent</a></li>
                                            <li><a href="#">Orlando Condos for Rent</a></li>
                                            <li><a href="#">San Diego Condos for Rent</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="#" class="expandable" data-requirelogin="false">Townhomes for Rent <i class="mapZoomInIcon"></i></a>
                                        <ul class="submenu">
                                            <li><a href="#atlanta-ga/">Atlanta Townhomes for Rent</a></li>
                                            <li><a href="#charlotte-nc/">Charlotte Townhomes for Rent</a></li>
                                            <li><a href="#dallas-tx/">Dallas Townhomes for Rent</a></li>
                                            <li><a href="#denver-co/">Denver Townhomes for Rent</a></li>
                                            <li><a href="#houston-tx/">Houston Townhomes for Rent</a></li>
                                            <li><a href="#jacksonville-fl/">Jacksonville Townhomes for Rent</a></li>
                                            <li><a href="#nashville-tn/">Nashville Townhomes for Rent</a></li>
                                            <li><a href="#omaha-ne/">Omaha Townhomes for Rent</a></li>
                                            <li><a href="#raleigh-nc/">Raleigh Townhomes for Rent</a></li>
                                            <li><a href="#san-antonio-tx/">San Antonio Townhomes for Rent</a></li>
                                        </ul>
                                    </li>


                                    <li><a id="menuNavLnkMobileApps" target="_blank" href="" data-requirelogin="false">Mobile Apps</a></li>

                                </ul>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="headerSwitchLanguageWrapper">
                    @if(app()->getLocale() == 'en')
                        <a href="/setlang/es" class="headerSwitchLanguage"><i class="fa fa-globe"></i>Español</a>
                    @else
                        <a href="/setlang/en" class="headerSwitchLanguage"><i class="fa fa-globe"></i>English</a>
                    @endif
                </div>

                <div class="logoSpacer"></div>

                <div class="logo">
                    <a href="{{ route('homes')}}">
                        @if($logo_image)
                            <img src="{{ asset('assets/images/'.$logo_image->image) }}" alt=" Logo">
                        @else
                            <img src="{{ asset('images\logo-dark.png') }}" alt=" Logo">
                        @endif
                    </a>
                </div>

                <div class="loginPrevNextWrapper">
                    <div id="headerLoginSection" class="loginSection">
                        @if(!Auth::user())
                        <a href="#register-modal" class="js-headerSignUp headerSignUp" data-toggle="modal">{{ Lang::get('pages.sign_up') }}</a>
                        <span>/</span>
                        <a href="#login-modal" class="js-headerSignin headerSignIn" data-toggle="modal">{{ Lang::get('pages.login') }}</a>
                        @else
                            <div class="username" data-toggle="dropdown">
                                <span>{{ Auth::user()->first_name }} </span>
                                <i class="fa fa-chevron-down" data-toggle="dropdown"></i>
                                <div class="userMenu" id="userMenu">
                                    <ul class="userMenuDropdown">
                                        <li> <a id="headerMyAccount" href="{{ route('account' , ['id' => Auth::user()->id]) }}">My Account</a></li>
                                        <li><a id="headerSignOut" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Sign Out</a></li>
                                    </ul>
                                </div>
                            </div>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        @endif
                    </div>

                </div>

                <a href="{{ route('chooseType') }}" id="headerAddListing" title="Add a Listing">
                    <span>Add a Listing</span>
                </a>
            </nav>
        </header>
        @yield('content')
        <footer class="large-cont">
            <div class="container">
                <div class="row">
                    <div class="col-xs-6 col-sm-6 col-lg-3">
                        <h4 class="second-color">{{ Lang::get('pages.contact_us') }}<span class="special-color">.</span></h4>
                        <div class="footer-title-separator"></div>
                        <p class="footer-p">{{ $footer_content ?  $footer_content->text  : 'Please edit this text on the admin side'}}</p>
                        <address>
                            <span><i class="fa fa-map-marker"></i>{{ $footer_content ?  $footer_content->address  : 'Please edit this text on the admin side'}}</span>
                            <div class="footer-separator"></div>
                            <span><i class="fa fa-envelope fa-sm"></i><a href="#">{{ $footer_content ?  $footer_content->email  : 'Please edit this text on the admin side'}}</a></span>
                            <div class="footer-separator"></div>
                            <span><i class="fa fa-phone"></i>{{ $footer_content ?  $footer_content->phone  : 'Please edit this text on the admin side'}}</span>
                        </address>
                        <div class="clear"></div>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-lg-3">
                        <h4 class="second-color">{{ Lang::get('pages.quick_links') }}<span class="special-color">.</span></h4>
                        <div class="footer-title-separator"></div>
                        <ul class="footer-ul">
                            <li><span class="custom-ul-bullet"></span><a href="index-1.html">{{ Lang::get('pages.home') }}</a></li>
                            <li><span class="custom-ul-bullet"></span><a href="listing-grid-right-sidebar.html">{{ Lang::get('pages.listing') }}</a></li>
                            <li><span class="custom-ul-bullet"></span><a href="agencies-listing-right-sidebar.html">{{ Lang::get('pages.agencies') }}</a></li>
                            <li><span class="custom-ul-bullet"></span><a href="archive-grid.html">{{ Lang::get('blog') }}</a></li>
                            <li><span class="custom-ul-bullet"></span><a href="contact1.html">{{ Lang::get('pages.contact_us') }}</a></li>
                            <li><span class="custom-ul-bullet"></span><a href="submit-property.html">{{ Lang::get('pages.add_listing') }}</a></li>
                        </ul>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-lg-3">
                        <h4 class="second-color">{{ Lang::get('pages.from_blog') }}<span class="special-color">.</span></h4>
                        <div class="footer-title-separator"></div>
                        <div class="row">
                            <div class="col-xs-6 col-sm-12">
                                <article>
                                    <a href="blog-right-sidebar.html"><img src="{{ asset('images\footer-blog1.jpg') }}" alt="" class="footer-blog-image"></a>
                                    <div class="footer-blog-title"><a href="blog-right-sidebar.html">This post title, lorem ipsum dolor sit</a></div>
                                    <div class="footer-blog-date"><i class="fa fa-calendar-o"></i>28/09/15</div>
                                    <div class="clearfix"></div>
                                </article>
                                <div class="footer-blog-separator hidden-xs"></div>
                            </div>
                            <div class="col-xs-6 col-sm-12">
                                <article>
                                    <a href="blog-right-sidebar.html"><img src="{{ asset('images\footer-blog2.jpg') }}" alt="" class="footer-blog-image"></a>
                                    <div class="footer-blog-title"><a href="blog-right-sidebar.html">This post title, lorem ipsum dolor sit</a></div>
                                    <div class="footer-blog-date"><i class="fa fa-calendar-o"></i>28/09/15</div>
                                    <div class="clearfix"></div>
                                </article>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-lg-3">
                        <h4 class="second-color">{{ Lang::get('pages.newslater') }}<span class="special-color">.</span></h4>
                        <div class="footer-title-separator"></div>
                        <p class="footer-p">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        <form class="form-inline footer-newsletter">
                            <input type="email" class="form-control" id="exampleInputEmail2" placeholder="enter your email">
                            <button type="submit" class="btn"><i class="fa fa-lg fa-paper-plane"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </footer>
        <footer class="small-cont">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-md-6 small-cont">
                        <img src="{{ asset('images\logo-light.png') }}" alt="" class="img-responsive footer-logo">
                    </div>
                    <div class="col-xs-12 col-md-6 footer-copyrights">
                    </div>
                </div>
            </div>
        </footer>

        <!-- Move to top button -->

        <div class="move-top">
            <div class="big-triangle-second-color"></div>
            <div class="big-icon-second-color"><i class="jfont fa-lg">&#xe803;</i></div>
        </div>

        <!-- Login modal -->
        <div class="modal fade apartment-modal" id="login-modal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <div class="modal-title">
                            <h1>{{ Lang::get('pages.login') }}<span class="special-color">.</span></h1>
                            <div class="short-title-separator"></div>
                        </div>
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
                        <p class="modal-bottom">{{ Lang::get('pages.dont_account') }} <a href="#" class="register-link">{{ Lang::get('pages.sign_up') }}</a></p>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

        <!-- Register modal -->
        <div class="modal fade apartment-modal" id="register-modal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <div class="modal-title">
                            <h1>{{ Lang::get('pages.sign_up') }}<span class="special-color">.</span></h1>
                            <div class="short-title-separator"></div>
                        </div>
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
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

        <!-- Forgotten password modal -->
        <div class="modal fade apartment-modal" id="forgot-modal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <div class="modal-title">
                            <h1>{{ Lang::get('pages.forgot_pass_2') }}<span class="special-color">?</span></h1>
                            <div class="short-title-separator"></div>
                        </div>
                        <p class="negative-margin forgot-info">{{ Lang::get('pages.insertadd') }}<br>{{ Lang::get('pages.send_pass') }}</p>
                        <form class="form-horizontal" method="POST" action="{{ route('password.email') }}">
                        {{ csrf_field() }}
                        <input name="email" type="email" class="input-full main-input" placeholder="Your email">
                        <button type="submit" href="my-profile.html" class="button-primary  button-full">
                            <span>{{ Lang::get('pages.reset_pass') }}</span>
                            <div class="button-triangle"></div>
                            <div class="button-triangle2"></div>
                            <div class="button-icon"><i class="fa fa-user"></i></div>
                        </button>
                        </form>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
    </div>
    <script type="text/javascript" src="{{ asset('js\jQuery\jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js\jQuery\jquery-ui.min.js') }}"></script>

    <!-- Bootstrap-->
    <script type="text/javascript" src="{{ asset('bootstrap\bootstrap.min.js') }}"></script>

    <!-- Google Maps -->
    <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDF8NFf6d_o4NsjkrwdPgrboEDUo0SMgkE&amp;sensor=false&amp;libraries=places"></script>

    <!-- plugins script -->
    <script type="text/javascript" src="{{ asset('js\plugins.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js\jquery.validate.js') }}"></script>

    <!-- template scripts -->
    <script type="text/javascript" src="{{ asset('mail\validate.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/date/moment.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/date/daterangepicker.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js\apartment.js') }}"></script>
    <script>
        $('#headerMenuLink').click(function () {
            $('#menuNavContainer').addClass('openik');

        });
        $('#menuHeader').click(function(){
            $('#menuNavContainer').removeClass('openik');
        })
        @if(Auth::user())
            $('#headerMyAccount').click(function(){
                window.location.href = '{{ route('account' , ['id' => Auth::user()->id]) }}'
            })
        @endif
    </script>
    @yield('scripts')
    @yield('footer-scripts')
    </body>
</html>