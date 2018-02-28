@extends('layouts.app')

@section('content')


    <section class="section-dark no-padding">

                <!-- Slider main container -->
                <div id="swiper-gallery" class="swiper-container">
                    <!-- Additional required wrapper -->
                    <div class="swiper-wrapper">
                        <!-- Slides -->
                        <div class="swiper-slide">
                            <div class="slide-bg swiper-lazy">
                                <div id="featured-map" class="featured-offer-map"></div>
                            </div>
                            <!-- Preloader image -->
                            <div class="swiper-lazy-preloader swiper-lazy-preloader-white"></div>
                        </div>
                        @foreach($listing->ListingsImages()->orderBy('featured' , 'desc')->get() as $images)
                            <div class="swiper-slide">
                                <div class="slide-bg swiper-lazy" data-background="{{ asset('assets/images').'/'.$images->image }}"></div>
                                <!-- Preloader image -->
                                <div class="swiper-lazy-preloader swiper-lazy-preloader-white"></div>
                            </div>
                        @endforeach
                    </div>
                    <div class="slide-buttons slide-buttons-center">
                        <a href="#" class="navigation-box navigation-box-next slide-next"><div class="navigation-triangle"></div><div class="navigation-box-icon"><i class="jfont">&#xe802;</i></div></a>
                        <div id="slide-more-cont"></div>
                        <a href="#" class="navigation-box navigation-box-prev slide-prev"><div class="navigation-triangle"></div><div class="navigation-box-icon"><i class="jfont">&#xe800;</i></div></a>
                    </div>

                </div>
                <section class="thumbs-slider section-both-shadow">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-1">
                                <a href="#" class="thumb-box thumb-prev pull-left"><div class="navigation-triangle"></div><div class="navigation-box-icon"><i class="jfont">&#xe800;</i></div></a>
                            </div>
                            <div class="col-xs-10">
                                <!-- Slider main container -->
                                <div id="swiper-thumbs" class="swiper-container">
                                    <!-- Additional required wrapper -->
                                    <div class="swiper-wrapper">
                                        @foreach($listing->ListingsImages()->orderBy('featured' , 'desc')->get() as $images)
                                            <div class="swiper-slide">
                                                <img class="slide-thumb" src="{{ asset('assets/images').'/'.$images->image }}" alt="" width="150px" height="83px">
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-1">
                                <a href="#" class="thumb-box thumb-next pull-right"><div class="navigation-triangle"></div><div class="navigation-box-icon"><i class="jfont">&#xe802;</i></div></a>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="section-light no-bottom-padding" style="padding-top: 0 !important;">
                    <div class="container">
                        <!-- Apartment Name -->

                        <div class="row margin-top-60">
                            <div class="col-xs-12">
                                <h3 class="title-negative-margin">{{ $listing->name }}<span class="special-color">.</span></h3>
                                <div class="title-separator-primary"></div>
                            </div>
                        </div>
                        <!-- Contact Seller Area -->
                        <div class="row margin-top-60">
                            <div class="col-xs-12">
                                <h3 class="title-negative-margin">{{ Lang::get('pages.c_re') }}<span class="special-color">.</span></h3>
                                <div class="title-separator-primary"></div>
                            </div>
                        </div>
                        <div class="row margin-top-60">

                            <div class=" col-sm-3 ">
                                <div class="full_blue">
                                    <h2>
                                        <i class="fa fa-phone"></i>
                                        {{ $listing->User()->first()->phone }}
                                    </h2>
                                </div>
                                <h5 class="subtitle-margin"> </h5>
                                {{--<h3 class="title-negative-margin">{{ $listing->User()->first()->first_name }} {{ $listing->User()->first()->last_name }}<span class="special-color">.</span></h3>--}}
                                @if($listing->move_in)
                                    <a href="#" class="agent-photo">
                                        <img src="{{ asset('images/apartment-move-in-specials.jpg') }}" alt="" class="img-responsive">
                                    </a>
                                @endif
                            </div>
                            <div class=" col-sm-9 ">
                                <div class="agent-social-bar">
                                    <div class="pull-left">

                                    </div>
                                    <div class="pull-right">
                                        <div class="pull-right">
                                            <a class="agent-icon-circle" href="{{ $listing->User()->first()->facebook_link }}">
                                                <i class="fa fa-facebook"></i>
                                            </a>
                                        </div>
                                        <div class="pull-right">
                                            <a class="agent-icon-circle icon-margin" href="{{ $listing->User()->first()->google_link }}">
                                                <i class="fa fa-google-plus"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <form name="contact-from" action="{{ route('mailToClient') }}" method="post">
                                    {{ csrf_field() }}
                                    <input type="hidden" value="{{ $listing->User()->first()->email }}" name="sending_email">
                                    <input name="name" value="@if(Auth::user()){{ Auth::user()->first_name }} @endif" type="text" class="input-long main-input" placeholder="Your name">
                                    <input name="phone" value="@if(Auth::user()){{ Auth::user()->phone }} @endif" type="text" class="input-short pull-right main-input" placeholder="Your phone">
                                    <input name="email" value="" type="email" class="input-full main-input" placeholder="Your email">
                                    <textarea name="message" class="input-full agent-textarea main-input" placeholder="{{ Lang::get('pages.y_q') }}"></textarea>
                                    <div class="form-submit-cont">
                                        <button type="submit" href="#" class="button-primary pull-right">
                                            <span>{{ Lang::get('pages.s_e') }}</span>
                                            <div class="button-triangle"></div>
                                            <div class="button-triangle2"></div>
                                            <div class="button-icon"><i class="fa fa-paper-plane"></i></div>
                                        </button>
                                        <div class="clearfix"></div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </section>
    <section class="section-light no-bottom-padding">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="row">
                        @if(Session::has('addet'))
                            <div class="success-box">
                                <p>{{ Session::get('addet') }}</p>
                                <div class="small-triangle"></div>
                                <div class="small-icon"><i class="jfont"></i></div>
                            </div>
                        @endif
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="details-image pull-left hidden-xs">
                                <i class="fa fa-home"></i>
                            </div>
                            <div class="details-title pull-left">
                                <h5 class="subtitle-margin"> </h5>
                                <h3>{{ $listing->address }}</h3>
                            </div>
                            @if(Auth::user())
                                <div class="details-title pull-right">
                                    <div class="details-image pull-left hidden-xs favorite_link">
                                        @if($hasfavorite == null)
                                        <a href="{{ route('addFavorite' , ['user_id' => Auth::user()->id , 'listing_id' => $listing->id]) }}">
                                            <i class="fa fa-heart-o"></i>
                                        </a>
                                        @else
                                            <a href="#">
                                                <i class="fa fa-heart"></i>
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            @endif
                            <div class="clearfix"></div>
                            <div class="title-separator-primary"></div>
                            <p class="details-desc">{{ $listing->description }}</p>
                        </div>
                    </div>
                    @if($listing->ListingAttr()->get())
                    <div class="row margin-top-15">
                        <div class="col-xs-12 apartment-tabs">
                            <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation" class="active">
                                    <a href="#tab-all" aria-controls="tab-map" role="tab" data-toggle="tab">
                                        <span>{{ Lang::get('pages.a_l') }}</span>
                                        <div class="button-triangle2"></div>
                                    </a>
                                </li>

                                @foreach($listing->ListingAttr()->get() as $lis)
                                    @if($lis->beds_count == 1)
                                        <li role="presentation">
                                            <a href="#tab-4" aria-controls="tab-street-view" role="tab" data-toggle="tab">
                                                    <span>
                                                        1 {{ Lang::get('pages.b_e') }}
                                                    </span>
                                                <div class="button-triangle2"></div>
                                            </a>
                                        </li>
                                        @break
                                    @endif
                                @endforeach
                                @foreach($listing->ListingAttr()->get() as $lis)
                                    @if($lis->beds_count == 2)
                                        <li role="presentation">
                                            <a href="#tab-3" aria-controls="tab-street-view" role="tab" data-toggle="tab">
                                                    <span>
                                                        2 {{ Lang::get('pages.b_e') }}
                                                    </span>
                                                <div class="button-triangle2"></div>
                                            </a>
                                        </li>
                                        @break
                                    @endif
                                @endforeach
                                @foreach($listing->ListingAttr()->get() as $lis)
                                    @if($lis->beds_count == 3)
                                        <li role="presentation">
                                            <a href="#tab-2" aria-controls="tab-street-view" role="tab" data-toggle="tab">
                                                    <span>
                                                        3 {{ Lang::get('pages.b_e') }}
                                                    </span>
                                                <div class="button-triangle2"></div>
                                            </a>
                                        </li>
                                        @break
                                    @endif
                                @endforeach
                                @foreach($listing->ListingAttr()->get() as $lis)
                                    @if($lis->beds_count == 4)
                                        <li role="presentation">
                                            <a href="#tab-1" aria-controls="tab-street-view" role="tab" data-toggle="tab">
                                                <span>
                                                    4 {{ Lang::get('pages.b_e') }}
                                                </span>
                                                <div class="button-triangle2"></div>
                                            </a>
                                        </li>
                                        @break
                                    @endif
                                @endforeach
                            </ul>
                        <!-- Tab panes -->
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane active" id="tab-all">
                                    <table class="table table-bordered table-responsive">
                                        <thead>
                                        <tr>
                                            <th>{{ Lang::get('pages.ty') }}</th>
                                            <th>{{ Lang::get('pages.beds') }}</th>
                                            <th>{{ Lang::get('pages.baths') }}</th>
                                            <th>{{ Lang::get('pages.s_f') }}</th>
                                            <th>{{ Lang::get('pages.rent') }}</th>
                                            <th>{{ Lang::get('pages.deposit') }}</th>
                                            <th>{{ Lang::get('pages.ava_date') }}</th>
                                            <th>{{ Lang::get('pages.l_l') }}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($listing->ListingAttr()->get() as $lis)
                                                <tr>
                                                    <td>
                                                        @if($lis->listing_type == '2')
                                                            {{ Lang::get('listing.appartament') }}
                                                        @elseif($lis->listing_type == '7')
                                                            {{ Lang::get('listing.condo') }}
                                                        @elseif($lis->listing_type == '5')
                                                            {{ Lang::get('listing.townhome') }}
                                                        @elseif($lis->listing_type == '3')
                                                            {{ Lang::get('listing.single_home') }}
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if($lis->beds_count == -1)
                                                            studio apartment
                                                        @else
                                                            {{ $lis->beds_count }} {{ Lang::get('pages.b_e') }}
                                                        @endif
                                                    </td>
                                                    <td>
                                                        {{ $lis->baths_count }} {{ Lang::get('pages.b_a') }}
                                                    </td>

                                                    <td>
                                                        {{ $lis->square_feet }} SF
                                                    </td>
                                                    <td>
                                                       $ {{ $lis->rent }}
                                                    </td>
                                                    <td>
                                                        $ {{ $lis->deposit }}
                                                    </td>
                                                    <td>
                                                       {{ $lis->available_date }}
                                                    </td>
                                                    <td>
                                                        {{ $lis->lease_length }}
                                                    </td>
                                                </tr>

                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div role="tabpanel" class="tab-pane" id="tab-4">
                                    <table class="table table-bordered table-responsive">
                                        <thead>
                                        <tr>
                                            <th>{{ Lang::get('pages.ty') }}</th>
                                            <th>{{ Lang::get('pages.beds') }}</th>
                                            <th>{{ Lang::get('pages.baths') }}</th>
                                            <th>{{ Lang::get('pages.s_f') }}</th>
                                            <th>{{ Lang::get('pages.rent') }}</th>
                                            <th>{{ Lang::get('pages.deposit') }}</th>
                                            <th>{{ Lang::get('pages.ava_date') }}</th>
                                            <th>{{ Lang::get('pages.l_l') }}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($listing->ListingAttr()->get() as $lis)
                                            @if($lis->beds_count == 1)
                                                <tr>
                                                    <td>
                                                        @if($lis->listing_type == '2')
                                                            {{ Lang::get('listing.appartament') }}
                                                        @elseif($lis->listing_type == '7')
                                                            {{ Lang::get('listing.condo') }}
                                                        @elseif($lis->listing_type == '5')
                                                            {{ Lang::get('listing.townhome') }}
                                                        @elseif($lis->listing_type == '3')
                                                            {{ Lang::get('listing.single_home') }}
                                                        @endif
                                                    </td>
                                                    <td>
                                                        {{ $lis->beds_count }} {{ Lang::get('pages.b_e') }}
                                                    </td>
                                                    <td>
                                                        {{ $lis->baths_count }} {{ Lang::get('pages.b_a') }}
                                                    </td>

                                                    <td>
                                                        {{ $lis->square_feet }} SF
                                                    </td>
                                                    <td>
                                                        $ {{ $lis->rent }}
                                                    </td>
                                                    <td>
                                                        $ {{ $lis->deposit }}
                                                    </td>
                                                    <td>
                                                        {{ $lis->available_date }}
                                                    </td>
                                                    <td>
                                                        {{ $lis->lease_length }}
                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div role="tabpanel" class="tab-pane" id="tab-3">
                                    <table class="table table-bordered table-responsive">
                                        <thead>
                                        <tr>
                                            <th>{{ Lang::get('pages.ty') }}</th>
                                            <th>{{ Lang::get('pages.beds') }}</th>
                                            <th>{{ Lang::get('pages.baths') }}</th>
                                            <th>{{ Lang::get('pages.s_f') }}</th>
                                            <th>{{ Lang::get('pages.rent') }}</th>
                                            <th>{{ Lang::get('pages.deposit') }}</th>
                                            <th>{{ Lang::get('pages.ava_date') }}</th>
                                            <th>{{ Lang::get('pages.l_l') }}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($listing->ListingAttr()->get() as $lis)
                                            @if($lis->beds_count == 2)
                                                <tr>
                                                    <td>
                                                        @if($lis->listing_type == '2')
                                                            {{ Lang::get('listing.appartament') }}
                                                        @elseif($lis->listing_type == '7')
                                                            {{ Lang::get('listing.condo') }}
                                                        @elseif($lis->listing_type == '5')
                                                            {{ Lang::get('listing.townhome') }}
                                                        @elseif($lis->listing_type == '3')
                                                            {{ Lang::get('listing.single_home') }}
                                                        @endif
                                                    </td>
                                                    <td>
                                                        {{ $lis->beds_count }} {{ Lang::get('pages.b_e') }}
                                                    </td>
                                                    <td>
                                                        {{ $lis->baths_count }} {{ Lang::get('pages.b_a') }}
                                                    </td>

                                                    <td>
                                                        {{ $lis->square_feet }} SF
                                                    </td>
                                                    <td>
                                                        $ {{ $lis->rent }}
                                                    </td>
                                                    <td>
                                                        $ {{ $lis->deposit }}
                                                    </td>
                                                    <td>
                                                        {{ $lis->available_date }}
                                                    </td>
                                                    <td>
                                                        {{ $lis->lease_length }}
                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div role="tabpanel" class="tab-pane" id="tab-2">
                                            <table class="table table-bordered table-responsive">
                                                <thead>
                                                <tr>
                                                    <th>{{ Lang::get('pages.ty') }}</th>
                                                    <th>{{ Lang::get('pages.beds') }}</th>
                                                    <th>{{ Lang::get('pages.baths') }}</th>
                                                    <th>{{ Lang::get('pages.s_f') }}</th>
                                                    <th>{{ Lang::get('pages.rent') }}</th>
                                                    <th>{{ Lang::get('pages.deposit') }}</th>
                                                    <th>{{ Lang::get('pages.ava_date') }}</th>
                                                    <th>{{ Lang::get('pages.l_l') }}</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($listing->ListingAttr()->get() as $lis)
                                                    @if($lis->beds_count == 3)
                                                        <tr>
                                                            <td>
                                                                @if($lis->listing_type == '2')
                                                                    {{ Lang::get('listing.appartament') }}
                                                                @elseif($lis->listing_type == '7')
                                                                    {{ Lang::get('listing.condo') }}
                                                                @elseif($lis->listing_type == '5')
                                                                    {{ Lang::get('listing.townhome') }}
                                                                @elseif($lis->listing_type == '3')
                                                                    {{ Lang::get('listing.single_home') }}
                                                                @endif
                                                            </td>
                                                            <td>
                                                                {{ $lis->beds_count }} {{ Lang::get('pages.b_e') }}
                                                            </td>
                                                            <td>
                                                                {{ $lis->baths_count }} {{ Lang::get('pages.b_a') }}
                                                            </td>

                                                            <td>
                                                                {{ $lis->square_feet }} SF
                                                            </td>
                                                            <td>
                                                                $ {{ $lis->rent }}
                                                            </td>
                                                            <td>
                                                                 $ {{ $lis->deposit }}
                                                            </td>
                                                            <td>
                                                                {{ $lis->available_date }}
                                                            </td>
                                                            <td>
                                                                {{ $lis->lease_length }}
                                                            </td>
                                                        </tr>
                                                    @endif
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                <div role="tabpanel" class="tab-pane" id="tab-1">
                                    <table class="table table-bordered table-responsive">
                                        <thead>
                                        <tr>
                                            <th>{{ Lang::get('pages.ty') }}</th>
                                            <th>{{ Lang::get('pages.beds') }}</th>
                                            <th>{{ Lang::get('pages.baths') }}</th>
                                            <th>{{ Lang::get('pages.s_f') }}</th>
                                            <th>{{ Lang::get('pages.rent') }}</th>
                                            <th>{{ Lang::get('pages.deposit') }}</th>
                                            <th>{{ Lang::get('pages.ava_date') }}</th>
                                            <th>{{ Lang::get('pages.l_l') }}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($listing->ListingAttr()->get() as $lis)
                                            @if($lis->beds_count == 4)
                                                <tr>
                                                    <td>
                                                        @if($lis->listing_type == '2')
                                                            {{ Lang::get('listing.appartament') }}
                                                        @elseif($lis->listing_type == '7')
                                                            {{ Lang::get('listing.condo') }}
                                                        @elseif($lis->listing_type == '5')
                                                            {{ Lang::get('listing.townhome') }}
                                                        @elseif($lis->listing_type == '3')
                                                            {{ Lang::get('listing.single_home') }}
                                                        @endif
                                                    </td>
                                                    <td>
                                                        {{ $lis->beds_count }} {{ Lang::get('pages.b_e') }}
                                                    </td>
                                                    <td>
                                                        {{ $lis->baths_count }} {{ Lang::get('pages.b_a') }}
                                                    </td>

                                                    <td>
                                                        {{ $lis->square_feet }} SF
                                                    </td>
                                                    <td>
                                                        $ {{ $lis->rent }}
                                                    </td>
                                                    <td>
                                                        {{ $lis->available_date }}
                                                    </td>
                                                    <td>
                                                        {{ $lis->lease_length }}
                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                    <div class="row margin-top-15">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
                            <div class="details-image pull-left hidden-xs">
                                <div class="agent-icon-circle-2 details-image pull-left hidden-xs">
                                    <i class="propertyIcon"></i>
                                </div>
                            </div>
                            <div class="details-title pull-left">
                                <h5 class="subtitle-margin">&nbsp;</h5>
                                <h4>{{ Lang::get('pages.acept_isse') }}</h4>
                            </div>
                            <div class="clearfix"></div>
                            <div class="title-separator-primary"></div>
                            <ul class="no_padding row" style="padding-top: 20px">
                                <li class="no_style col-lg-6 col-sm-12 col-xs-12" style="list-style: none;text-align:left">
                                    @if($listing->broken_lease == '1')
                                        <span class="bullet">•</span>
                                        {{ Lang::get('listing.b_l') }}-{{ Lang::get('listing.h_o') }} {{ $listing->br_le_ye }} years
                                        <br>
                                    @endif
                                    @if($listing->eviction == '1')
                                        <span class="bullet">•</span>
                                        {{ Lang::get('listing.e_v') }}-{{ Lang::get('listing.h_o') }} {{ $listing->ev_ye }} years
                                        <br>
                                    @endif
                                    @if($listing->misdemeanor == '1')
                                        <span class="bullet">•</span>
                                        {{ Lang::get('listing.mis') }} -{{ Lang::get('listing.h_o') }}
                                        <br>
                                    @endif
                                    @if($listing->falonies == '1')
                                        <span class="bullet">•</span>
                                        {{ Lang::get('listing.fels') }}
                                        <br>
                                    @endif
                                    @if($listing->section_8 == '1')
                                        <span class="bullet">•</span>
                                        {{ Lang::get('listing.sec_8') }}
                                        <br>
                                    @endif
                                    @if($listing->hud == '1')
                                        <span class="bullet">•</span>
                                        HUD
                                        <br>
                                    @endif
                                    @if($listing->income_r == '1')
                                        <span class="bullet">•</span>
                                        {{ Lang::get('listing.in_r') }}
                                        <br>
                                    @endif
                                    @if($listing->bankruptcy == '1')
                                        <span class="bullet">•</span>
                                        Bankruptcy-{{ Lang::get('listing.h_o') }} {{ $listing->ba_ye }} years
                                        <br>
                                    @endif
                                    @if($listing->foreclosure == '1')
                                        <span class="bullet">•</span>
                                        {{ Lang::get('listing.forec') }}-{{ Lang::get('listing.h_o') }} {{ $listing->fo_ye }} years
                                        <br>
                                    @endif
                                    @if($listing->credit == '1')
                                        <span class="bullet">•</span>
                                        {{ Lang::get('listing.cre') }}
                                        <br>
                                    @endif
                                    @if($listing->move_in == '1')
                                        <span class="bullet">•</span>
                                        {{ Lang::get('listing.m_i_s') }}
                                        <br>
                                    @endif
                                </li>
                                <li class="no_style col-lg-6 col-sm-12 col-xs-12" style="list-style: none;text-align:left">
                                    @if($listing->possession == '1')
                                        {{ Lang::get('listing.pos') }}
                                        <br>
                                    @endif
                                    @if($listing->possession_w == '1')
                                        {{ Lang::get('listing.pos_w') }}
                                        <br>
                                    @endif
                                    @if($listing->assault == '1')
                                        {{ Lang::get('listing.as') }}
                                        <br>
                                    @endif
                                    @if($listing->herassment == '1')
                                        Harassment
                                        <br>
                                    @endif
                                    @if($listing->theft_of == '1')
                                        {{ Lang::get('listing.th_o_h') }}
                                        <br>
                                    @endif
                                    @if($listing->dwi == '1')
                                        DWI
                                        <br>
                                    @endif
                                    @if($listing->dui == '1')
                                        DUI
                                        <br>
                                    @endif
                                    @if($listing->disorderly == '1')
                                        {{ Lang::get('listing.di_xc') }}
                                        <br>
                                    @endif
                                    @if($listing->theft == '1')
                                        {{ Lang::get('listing.theft') }}
                                        <br>
                                    @endif
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="details-image pull-left hidden-xs">
                                <div class="agent-icon-circle-2 details-image pull-left hidden-xs">
                                    <i class="petIcon"></i>
                                </div>
                            </div>
                            <div class="details-title pull-left">
                                <h5 class="subtitle-margin">&nbsp;</h5>
                                <h4>{{ Lang::get('pages.pet_p') }}</h4>
                            </div>
                            <div class="clearfix"></div>
                            <div class="title-separator-primary"></div>
                            <ul class="no_padding margin-top-15">
                                @if($listing->dogs == '1')
                                    <li class="no_style"><span class="bullet">•</span>{{ Lang::get('listing.dogs_ok') }}</li>
                                @endif
                                @if($listing->cats == '1')
                                    <li class="no_style"><span class="bullet">•</span>{{ Lang::get('listing.cats_ok') }}</li>
                                @endif
                                @if($listing->no_pets == '1')
                                    <li class="no_style"><span class="bullet">•</span>{{ Lang::get('listing.no_pets') }}</li>
                                @endif
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
                            <div class="details-image pull-left hidden-xs">
                                <div class="agent-icon-circle-2 details-image pull-left hidden-xs">
                                    <i class="parkingIcon"></i>
                                </div>
                            </div>
                            <div class="details-title pull-left">
                                <h5 class="subtitle-margin">&nbsp;</h5>
                                <h4>{{ Lang::get('listing.parking_type') }}</h4>
                            </div>
                            <div class="clearfix"></div>

                            <div class="title-separator-primary"></div>
                            <ul class="no_padding margin-top-15">
                                @if($listing->parking_type != NULL)
                                    @foreach(json_decode($listing->parking_type) as $parking_type)
                                        @if($parking_type == '1')
                                            <li class="no_style" style="list-style: none;text-align:left"><span class="bullet">•</span>
                                                {{ Lang::get('listing.surfact_lot') }}
                                            </li>
                                        @endif
                                        @if($parking_type == '3')
                                            <li class="no_style" style="list-style: none;text-align:left"><span class="bullet">•</span>
                                                {{ Lang::get('listing.covered') }}
                                            </li>
                                        @endif
                                        @if($parking_type == '4')
                                            <li class="no_style" style="list-style: none;text-align:left"><span class="bullet">•</span>
                                                {{ Lang::get('listing.street') }}
                                            </li>
                                        @endif
                                        @if($parking_type == '5')
                                            <li class="no_style" style="list-style: none;text-align:left"><span class="bullet">•</span>
                                                {{ Lang::get('listing.garage') }}
                                            </li>
                                        @endif
                                        @if($parking_type == '7')
                                            <li class="no_style" style="list-style: none;text-align:left"><span class="bullet">•</span>
                                                {{ Lang::get('listing.other') }}
                                            </li>
                                        @endif
                                    @endforeach
                                @endif
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
                            <div class="details-image pull-left hidden-xs">
                                <div class="agent-icon-circle-2 details-image pull-left hidden-xs">
                                    <i class="leaseIcon"></i>
                                </div>
                            </div>
                            <div class="details-title pull-left">
                                <h5 class="subtitle-margin">&nbsp;</h5>
                                <h4>{{ Lang::get('pages.sc_d') }}</h4>
                            </div>
                            <div class="clearfix"></div>
                            <div class="title-separator-primary"></div>
                            <ul class="no_padding margin-top-15">
                                <li class="no_style" >
                                    <span class="bullet">•</span>
                                    {{ $listing->school_dc }}
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="details-image pull-left hidden-xs">
                                <div class="agent-icon-circle-2 details-image pull-left hidden-xs">
                                    <i class="featuresIcon"></i>
                                </div>
                            </div>
                            <div class="details-title pull-left">
                                <h5 class="subtitle-margin">&nbsp;</h5>
                                <h4>{{ Lang::get('pages.uniq') }}</h4>
                            </div>
                            <div class="clearfix"></div>
                            <div class="title-separator-primary"></div>
                            <ul class="no_padding margin-top-15">
                                <li class="no_style" >
                                    @if($listing->furnished == '1')
                                        <span class="bullet">•</span>
                                        {{ Lang::get('listing.furnished') }}
                                    @endif
                                    @if($listing->no_smocking == '1')
                                            <br>
                                        <span class="bullet">•</span>
                                        {{ Lang::get('listing.no_smo') }}
                                    @endif
                                    @if($listing->wheelchair == '1')
                                            <br>
                                        <span class="bullet">•</span>
                                        {{ Lang::get('listing.wheel_access') }}
                                    @endif
                                    @if($listing->washer_dryer == '1')
                                            <br>
                                        <span class="bullet">•</span>
                                            {{ Lang::get('pages.w_ad') }}
                                    @endif
                                    @if($listing->washer_dryer_hockups == '1')
                                            <br>
                                        <span class="bullet">•</span>
                                            {{ Lang::get('pages.w_h') }}
                                    @endif
                                    @if($listing->onsite_laundry == '1')
                                            <br>
                                        <span class="bullet">•</span>
                                            {{ Lang::get('pages.o_n') }}
                                    @endif
                                    @if($listing->fitness_center == '1')
                                            <br>
                                        <span class="bullet">•</span>
                                            {{ Lang::get('pages.f_c') }}
                                    @endif
                                    @if($listing->pool == '1')
                                            <br>
                                        <span class="bullet">•</span>
                                            {{ Lang::get('pages.p_l') }}
                                    @endif
                                    @if($listing->yard == '1')
                                        <br>
                                        <span class="bullet">•</span>
                                        {{ Lang::get('pages.yard') }}
                                    @endif
                                    @if($listing->hard_floor == '1')
                                        <br>
                                        <span class="bullet">•</span>
                                        {{ Lang::get('pages.h_f') }}
                                    @endif
                                    @if($listing->wal_closet == '1')
                                        <br>
                                        <span class="bullet">•</span>
                                        {{ Lang::get('pages.w_cl') }}
                                    @endif
                                    @if($listing->updated_kitchen == '1')
                                        <br>
                                        <span class="bullet">•</span>
                                        {{ Lang::get('pages.upde_kitc') }}
                                    @endif
                                    @if($listing->close_public == '1')
                                        <br>
                                        <span class="bullet">•</span>
                                        {{ Lang::get('pages.clo_tr') }}
                                    @endif
                                    @if($listing->dog_park == '1')
                                        <br>
                                        <span class="bullet">•</span>
                                        {{ Lang::get('pages.d_pa') }}
                                    @endif
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <div class="row margin-top-15">
                        <div class="col-xs-12 apartment-tabs">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation" class="active">
                                    <a href="#tab-map" aria-controls="tab-map" role="tab" data-toggle="tab">
                                        <span>{{ Lang::get('pages.map') }}</span>
                                        <div class="button-triangle2"></div>
                                    </a>
                                </li>
                                <li role="presentation">
                                    <a href="#tab-street-view" aria-controls="tab-street-view" role="tab" data-toggle="tab">
                                        <span>{{ Lang::get('pages.str_view') }}</span>
                                        <div class="button-triangle2"></div>
                                    </a>
                                </li>
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane active" id="tab-map">
                                    <div id="estate-map" class="details-map"></div>
                                </div>
                                <div role="tabpanel" class="tab-pane" id="tab-street-view">
                                    <div id="estate-street-view" class="details-map"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Reviews Area -->
                    <div class="row margin-top-60">
                        <div class="col-xs-12">
                            <h3 class="title-negative-margin">{{ Lang::get('pages.revie') }}</h3>
                            <div class="title-separator-primary"></div>
                        </div>
                    </div>
                    <div class="row margin-top-60">
                        <div class="col-xs-8">
                            <div class="quote-box box_2" >
                                <h5>{{ Lang::get('pages.app_reviewss') }}</h5>
                                <br>
                                @if(!$listing->Reviews()->first())
                                    <p>{{ Lang::get('pages.reviews') }}</p>
                                @endif
                                <button type="button" href="#" id="show_review_box" class="button-primary ">
                                    <span>{{ Lang::get('pages.w_re') }}</span>
                                    <div class="button-triangle"></div>
                                    <div class="button-triangle2"></div>
                                    <div class="button-icon"><i class="fa fa-quote-right"></i></div>
                                </button>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="col-xs-12 hidden_box margin-top-15">
                            <form name="contact-from" action="{{ route('writeReviews') }}" method="post">
                                {{ csrf_field() }}
                                <input type="hidden" value="{{ $listing->id }}" name="listing_id">
                                @if(Auth::user())
                                    <input type="hidden" value="{{ $listing->User()->first()->id }}" name="user_id">
                                @endif
                                <input name="title" value="" type="text" class="input-full main-input" placeholder="Title">
                                <textarea name="description" class="input-full agent-textarea main-input" placeholder="Review"></textarea>
                                <div class="form-submit-cont">
                                    <button type="submit" href="#" class="button-primary pull-right">
                                        <span>Write</span>
                                        <div class="button-triangle"></div>
                                        <div class="button-triangle2"></div>
                                        <div class="button-icon"><i class="fa fa-paper-plane"></i></div>
                                    </button>
                                    <div class="clearfix"></div>
                                </div>
                            </form>
                        </div>
                        <div class="clearfix"></div>
                        @if($listing->Reviews()->first())
                            <div class="col-xs-12">
                                @foreach($listing->Reviews()->get() as $review)
                                    <div class="quote-box box_2 margin-top-15" >
                                        <h5>{{ $review->title }}</h5>
                                        <br>
                                        <p>{{ $review->description }}</p>
                                        <div class="small-triangle"></div>
                                        <div class="small-icon"><i class="fa fa-quote-right"></i></div>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                    <!-- Contact Seller Area -->
                    <div class="margin-top-45"></div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('scripts')
    <!-- google maps initialization -->
    <script type="text/javascript">
        google.maps.event.addDomListener(window, 'load', init);
        function init() {
            mapInit({{ $listing->lat }}, {{ $listing->lng }},"estate-map","{{ asset('images/pin-house.png') }}", true);
            streetViewInit({{ $listing->lat }}, {{ $listing->lng }},"estate-street-view");
        }
    </script>
    <script type="text/javascript">
        google.maps.event.addDomListener(window, 'load', init);
        function init() {
                mapInitAddress("{{ $listing->address }}","featured-map","{{ asset('images/pin-house.png') }}", false);
        }

    </script>
    <script>
        $(document).ready(function () {

            $('#show_review_box').click(function () {
                $('.hidden_box').css('display' , 'block' )
            })
        })
    </script>

@endsection

