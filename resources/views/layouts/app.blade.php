<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Apartment - Premium Real Estate HMTL Site Template</title>
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
        <header>
            <div class="top-bar-wrapper">
                <div class="container top-bar">
                    <div class="row">
                        <div class="col-xs-5 col-sm-8">
                            @if(app()->getLocale() == 'en')
                            <div class="top-mail pull-left hidden-xs">
							<span class="top-icon-circle">
								<i class="fa fa-globe fa-sm"></i>
							</span>
                                <a href="/setlang/es" class="top-bar-text">Espanol</a>
                            </div>
                            @else
                            <div class="top-mail pull-left hidden-xs">
                            <span class="top-icon-circle">
                                <i class="fa fa-globe fa-sm"></i>
                            </span>
                                <a href="/setlang/en" class="top-bar-text">English</a>
                            </div>
                            @endif
                            <div class="top-phone pull-left hidden-xxs">
							<span class="top-icon-circle">
								<i class="fa fa-phone"></i>
							</span>
                                <span class="top-bar-text">(0)-123-456-789</span>
                            </div>
                            <div class="top-localization pull-left hidden-sm hidden-md hidden-xs">
							<span class="top-icon-circle pull-left">
								<i class="fa fa-map-marker"></i>
							</span>
                                <span class="top-bar-text">{{ Lang::get('pages.top_small_text') }}</span>
                            </div>
                        </div>
                        <div class="col-xs-7 col-sm-4">
                            <div class="top-social-last top-dark pull-right" data-toggle="tooltip" data-placement="bottom" title="Login/Register">
                                @if(!Auth::user())
                                <a class="top-icon-circle" href="#login-modal" data-toggle="modal">
                                    <i class="fa fa-lock"></i>
                                </a>
                                @else
                                    <a class="top-icon-circle" href="{{ route('account' , ['id' => Auth::user()->id]) }}" data-toggle="modal">
                                        <i class="fa fa-user"></i>
                                    </a>
                                @endif
                            </div>
                            @if(Auth::user())
                                <div class="top-social top-dark pull-right">
                                    <a class="top-icon-circle" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <i class="fa fa-lg fa-sign-out"></i>
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </div>
                            @endif
                            <div class="top-social pull-right">
                                <a class="top-icon-circle" href="#">
                                    <i class="fa fa-facebook"></i>
                                </a>
                            </div>
                            <div class="top-social pull-right">
                                <a class="top-icon-circle" href="#">
                                    <i class="fa fa-twitter"></i>
                                </a>
                            </div>
                            <div class="top-social pull-right">
                                <a class="top-icon-circle" href="#">
                                    <i class="fa fa-google-plus"></i>
                                </a>
                            </div>
                            <div class="top-social pull-right">
                                <a class="top-icon-circle" href="#">
                                    <i class="fa fa-skype"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div><!-- /.top-bar -->
            </div><!-- /.Page top-bar-wrapper -->
            <nav class="navbar main-menu-cont">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar icon-bar1"></span>
                            <span class="icon-bar icon-bar2"></span>
                            <span class="icon-bar icon-bar3"></span>
                        </button>
                        <a href="/" title="" class="navbar-brand">
                            <img src="{{ asset('images\logo-dark.png') }}" alt="Apartment - Premium Real Estate Template">
                        </a>
                    </div>
                    <div id="navbar" class="navbar-collapse collapse">
                        <ul class="nav navbar-nav navbar-right">
                            <li class="dropdown">
                                <a href="/" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Home</a>
                            </li>
                            <li><a href="{{ route('addListing') }}" class="special-color">{{ Lang::get('pages.add_listing') }}</a></li>
                        </ul>
                    </div>
                </div>
            </nav><!-- /.mani-menu-cont -->
        </header>
        @yield('content')
        <footer class="large-cont">
            <div class="container">
                <div class="row">
                    <div class="col-xs-6 col-sm-6 col-lg-3">
                        <h4 class="second-color">{{ Lang::get('pages.contact_us') }}<span class="special-color">.</span></h4>
                        <div class="footer-title-separator"></div>
                        <p class="footer-p">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        <address>
                            <span><i class="fa fa-map-marker"></i>00456 Some Address line</span>
                            <div class="footer-separator"></div>
                            <span><i class="fa fa-envelope fa-sm"></i><a href="#">email@domain.tld</a></span>
                            <div class="footer-separator"></div>
                            <span><i class="fa fa-phone"></i>01-23456789</span>
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
                            <span>Sing In</span>
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
                        <p class="modal-bottom">{{ Lang::get('pages.dont_account') }} <a href="#" class="register-link">{{ Lang::get('pages.register') }}</a></p>
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
                            <h1>{{ Lang::get('pages.register') }}<span class="special-color">.</span></h1>
                            <div class="short-title-separator"></div>
                        </div>
                        <form class="form-horizontal" method="POST" id="registerForm" action="{{ route('register') }}">
                            {{ csrf_field() }}
                                <input id="name" type="text" class="input-full main-input" placeholder="Name" name="name" value="{{ old('name') }}" required autofocus>
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
                        <p class="modal-bottom">{{ Lang::get('pages.already_reg') }}<a href="#" class="login-link">SING IN</a></p>
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

    @yield('scripts')
    </body>
</html>