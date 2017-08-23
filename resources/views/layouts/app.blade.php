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
                                {{--<ul class="dropdown-menu">
                                    <li><a href="index-1.html">Homepage 1 - slider</a></li>
                                    <li><a href="index-map.html">Homepage 1 - map</a></li>
                                    <li><a href="index2.html">Homepage 2 - slider</a></li>
                                    <li><a href="index2-map.html">Homepage 2 - map</a></li>
                                    <li><a href="index3.html">One Page Single Propery - slider</a></li>
                                    <li><a href="index3-street-view.html">One Page Single Propery - panorama!</a></li>
                                </ul>--}}
                            </li>
                           {{-- <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Listings</a>
                                <ul class="dropdown-menu">
                                    <li class="dropdown-submenu">
                                        <a tabindex="-1" href="listing-grid-right-sidebar.html">Grid Listing</a>
                                        <ul class="dropdown-menu">
                                            <li><a href="listing-grid-right-sidebar.html">Right Sidebar</a></li>
                                            <li><a href="listing-grid-left-sidebar.html">Left Sidebar</a></li>
                                            <li><a href="listing-grid-no-sidebar.html">No Sidebar</a></li>
                                        </ul>
                                    </li>
                                    <li class="dropdown-submenu">
                                        <a tabindex="-1" href="listing-masonry-right-sidebar.html">Masonry Listing</a>
                                        <ul class="dropdown-menu">
                                            <li><a href="listing-masonry-right-sidebar.html">Right Sidebar</a></li>
                                            <li><a href="listing-masonry-left-sidebar.html">Left Sidebar</a></li>
                                            <li><a href="listing-masonry-no-sidebar.html">No Sidebar</a></li>
                                        </ul>
                                    </li>
                                    <li class="dropdown-submenu">
                                        <a tabindex="-1" href="listing-list-right-sidebar.html">Classic Listing</a>
                                        <ul class="dropdown-menu">
                                            <li><a href="listing-list-right-sidebar.html">Right Sidebar</a></li>
                                            <li><a href="listing-list-left-sidebar.html">Left Sidebar</a></li>
                                            <li><a href="listing-list-no-sidebar.html">No Sidebar</a></li>
                                        </ul>
                                    </li>
                                    <li class="dropdown-submenu">
                                        <a tabindex="-1" href="estate-details-right-sidebar.html">Single Property</a>
                                        <ul class="dropdown-menu">
                                            <li><a href="estate-details-right-sidebar.html">Right Sidebar</a></li>
                                            <li><a href="estate-details-left-sidebar.html">Left Sidebar</a></li>
                                            <li><a href="estate-details-no-sidebar.html">No Sidebar</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Agencies</a>
                                <ul class="dropdown-menu">
                                    <li class="dropdown-submenu">
                                        <a tabindex="-1" href="agencies-listing-right-sidebar.html">Agencies Listing</a>
                                        <ul class="dropdown-menu">
                                            <li><a href="agencies-listing-right-sidebar.html">Right Sidebar</a></li>
                                            <li><a href="agencies-listing-left-sidebar.html">Left Sidebar</a></li>
                                            <li><a href="agencies-listing-no-sidebar.html">No Sidebar</a></li>
                                        </ul>
                                    </li>
                                    <li class="dropdown-submenu">
                                        <a tabindex="-1" href="agency-details-right-sidebar.html">Agency Details</a>
                                        <ul class="dropdown-menu">
                                            <li><a href="agency-details-right-sidebar.html">Right Sidebar</a></li>
                                            <li><a href="agency-details-left-sidebar.html">Left Sidebar</a></li>
                                            <li><a href="agency-details-no-sidebar.html">No Sidebar</a></li>
                                        </ul>
                                    </li>
                                    <li class="dropdown-submenu">
                                        <a tabindex="-1" href="agents-right-sidebar.html">Agents List</a>
                                        <ul class="dropdown-menu">
                                            <li><a href="agents-right-sidebar.html">Right Sidebar</a></li>
                                            <li><a href="agents-left-sidebar.html">Left Sidebar</a></li>
                                            <li><a href="agents-no-sidebar.html">No Sidebar</a></li>
                                        </ul>
                                    </li>
                                    <li class="dropdown-submenu">
                                        <a tabindex="-1" href="agent-right-sidebar.html">Agent Details</a>
                                        <ul class="dropdown-menu">
                                            <li><a href="agent-right-sidebar.html">Right Sidebar</a></li>
                                            <li><a href="agent-left-sidebar.html">Left Sidebar</a></li>
                                            <li><a href="agent-no-sidebar.html">No Sidebar</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Pages</a>
                                <ul class="dropdown-menu">
                                    <li class="dropdown-submenu">
                                        <a tabindex="-1" href="typography-no-sidebar.html">Typography &amp; Elements</a>
                                        <ul class="dropdown-menu">
                                            <li><a href="typography-no-sidebar.html">No Sidebar</a></li>
                                            <li><a href="typography-right-sidebar.html">Right Sidebar</a></li>
                                            <li><a href="typography-left-sidebar.html">Left Sidebar</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="404.html">Error 404</a></li>
                                    <li class="dropdown-submenu">
                                        <a tabindex="-1" href="rtl-index.html">RTL Pages</a>
                                        <ul class="dropdown-menu">
                                            <li><a href="rtl-index.html">RTL Homepage</a></li>
                                            <li><a href="rtl-page.html">RTL Estate details</a></li>
                                        </ul>
                                    </li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="#login-modal" data-toggle="modal">Login</a></li>
                                    <li><a href="#register-modal" data-toggle="modal">Register</a></li>
                                    <li><a href="#forgot-modal" data-toggle="modal">Forgotten Password</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="my-offers.html">My account - Offers</a></li>
                                    <li><a href="my-profile.html">My account - Profile</a></li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Blog</a>
                                <ul class="dropdown-menu">
                                    <li><a href="archive-grid.html">Default Grid</a></li>
                                    <li class="dropdown-submenu">
                                        <a tabindex="-1" href="archive-grid2-right-sidebar.html">Masonry Grid</a>
                                        <ul class="dropdown-menu">
                                            <li><a href="archive-grid2-right-sidebar.html">Right Sidebar</a></li>
                                            <li><a href="archive-grid2-left-sidebar.html">Left Sidebar</a></li>
                                            <li><a href="archive-grid2-no-sidebar.html">No Sidebar</a></li>
                                        </ul>
                                    </li>
                                    <li class="dropdown-submenu">
                                        <a tabindex="-1" href="archive-right-sidebar.html">Classic List</a>
                                        <ul class="dropdown-menu">
                                            <li><a href="archive-right-sidebar.html">Right Sidebar</a></li>
                                            <li><a href="archive-left-sidebar.html">Left Sidebar</a></li>
                                            <li><a href="archive-no-sidebar.html">No Sidebar</a></li>
                                        </ul>
                                    </li>
                                    <li class="dropdown-submenu">
                                        <a tabindex="-1" href="blog-right-sidebar.html">Single Post</a>
                                        <ul class="dropdown-menu">
                                            <li><a href="blog-right-sidebar.html">Right Sidebar</a></li>
                                            <li><a href="blog-left-sidebar.html">Left Sidebar</a></li>
                                            <li><a href="blog-no-sidebar.html">No Sidebar</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Contact Us</a>
                                <ul class="dropdown-menu">
                                    <li><a href="contact1.html">Contact version 1</a></li>
                                    <li><a href="contact2.html">Contact version 2</a></li>
                                </ul>
                            </li>--}}
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
                        <input name="login" type="email" class="input-full main-input" placeholder="Your email">
                        <a href="my-profile.html" class="button-primary  button-full">
                            <span>{{ Lang::get('pages.reset_pass') }}</span>
                            <div class="button-triangle"></div>
                            <div class="button-triangle2"></div>
                            <div class="button-icon"><i class="fa fa-user"></i></div>
                        </a>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
        {{--<div id="signupContainer">
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
                            --}}{{--<div class="checkboxGroup">
                                <input id="emailAlerts" type="checkbox" class="primaryCheckbox" checked="">
                                <label for="emailAlerts"><span class="checkLabel">Receive email alerts when new rentals are available</span></label>
                            </div>
                            <div class="checkboxGroup">
                                <input id="landlordIndustryProfessional" type="checkbox" class="primaryCheckbox">
                                <label for="landlordIndustryProfessional"><span class="checkLabel">I am a landlord or industry professional.</span></label>
                            </div>
                            <p class="terms">
                                By registering, I accept the Apartments.com <a class="greenLink" target="_blank" href="">Terms of Use.</a>
                            </p>--}}{{--
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
                                <button type="submit"  id="signupBtn" form="registerForm" class="primary">Sign Up</button>
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
            </div>--}}

    </div>
    <script type="text/javascript" src="{{ asset('js\jQuery\jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js\jQuery\jquery-ui.min.js') }}"></script>

    <!-- Bootstrap-->
    <script type="text/javascript" src="{{ asset('bootstrap\bootstrap.min.js') }}"></script>

    <!-- Google Maps -->
    <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDF8NFf6d_o4NsjkrwdPgrboEDUo0SMgkE&amp;sensor=false&amp;libraries=places"></script>

    <!-- plugins script -->
    <script type="text/javascript" src="{{ asset('js\plugins.js') }}"></script>

    <!-- template scripts -->
    <script type="text/javascript" src="{{ asset('mail\validate.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/date/moment.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/date/daterangepicker.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js\apartment.js') }}"></script>

    @yield('scripts')
    </body>
</html>