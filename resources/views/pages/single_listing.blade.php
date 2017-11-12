@extends('layouts.app')

@section('content')


    <section class="section-dark no-padding">
        <!-- Slider main container -->
        <div id="swiper-gallery" class="swiper-container">
            <!-- Additional required wrapper -->
            <div class="swiper-wrapper">
                <!-- Slides -->
                <div class="swiper-slide">
                    <div id="featured-map" class="featured-offer-map"></div>
                    <!-- Preloader image -->
                    <div class="swiper-lazy-preloader swiper-lazy-preloader-white"></div>
                </div>
                @foreach($listing->ListingsImages()->get() as $images)
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

    </section>
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
                            <!-- Slides -->

                            @foreach($listing->ListingsImages()->get() as $images)
                                <div class="swiper-slide">
                                    <img class="slide-thumb" src="{{ asset('assets/images').'/'.$images->image }}" alt="" width="150px">
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
                                <h3>{{ $listing->address }}<span class="special-color">.</span></h3>
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

                    <div class="row margin-top-15">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <h4 class="">{{ Lang::get('pages.app_ametites') }}<span class="">.</span></h4>
                            <div class="title-separator-primary"></div>
                            <div class="row margin-top-30">
                                <div class="col-md-4 text-center">
                                    <div class="agent-icon-circle-2 details-image pull-left hidden-xs">
                                        <i class="featuresIcon"></i>
                                    </div>
                                    <div class="details-title pull-left">
                                        <h5 class="subtitle-margin"> </h5>
                                        <h4>Unique Features<span class="special-color">.</span></h4>
                                    </div>
                                    <div class="clearfix"></div>
                                    <ul class="no_padding">
                                        @if($listing->no_smocking == '1')
                                            <li class="no_style"><span class="bullet">•</span> {{ Lang::get('listing.no_smo') }}</li>
                                        @endif
                                        @if($listing->wheelchair == '1')
                                            <li class="no_style"><span class="bullet">•</span> {{ Lang::get('listing.wheel_access') }}</li>
                                        @endif
                                        @if($listing->furnished == '1')
                                            <li class="no_style"><span class="bullet">•</span> {{ Lang::get('listing.furnished') }}</li>
                                        @endif
                                            <li class="no_style"><span class="bullet">•</span> Bedrooms {{ $listing->beds_count }}</li>
                                            <li class="no_style"><span class="bullet">•</span> Bathrooms {{ $listing->baths_count }}</li>
                                    </ul>
                                </div>
                                <div class="col-md-4 text-center">
                                    <div class="agent-icon-circle-2 details-image pull-left hidden-xs">
                                        <i class="petIcon"></i>
                                    </div>
                                    <div class="details-title pull-left">
                                        <h5 class="subtitle-margin"> </h5>
                                        <h4>Pet Policy<span class="special-color">.</span></h4>
                                    </div>
                                    <div class="clearfix"></div>
                                    <ul class="no_padding">
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
                                </div>
                                <div class="col-md-4 text-center">
                                    <div class="agent-icon-circle-2 details-image pull-left hidden-xs">
                                        <i class="parkingIcon"></i>
                                    </div>
                                    <div class="details-title pull-left">
                                        <h5 class="subtitle-margin"> </h5>
                                        <h4>{{ Lang::get('listing.parking_type') }}<span class="special-color">.</span></h4>
                                    </div>
                                    <div class="clearfix"></div>
                                    <ul class="no_padding">
                                        <li class="no_style" style="list-style: none;text-align:left"><span class="bullet">•</span>
                                            @if($listing->parking_type == '1')
                                                {{ Lang::get('listing.surfact_lot') }}
                                            @elseif($listing->parking_type == '3')
                                                {{ Lang::get('listing.covered') }}
                                            @elseif($listing->parking_type == '4')
                                                {{ Lang::get('listing.street') }}
                                            @elseif($listing->parking_type == '5')
                                                {{ Lang::get('listing.garage') }}
                                            @elseif($listing->parking_type == '7')
                                                {{ Lang::get('listing.other') }}
                                            @endif
                                        </li>
                                        <li style="list-style: none;text-align:left">
                                            <span class="bullet">•</span>
                                            Parking Fee {{ $listing->parking_fee }}$/mo
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-md-4 text-center">
                                    <div class="agent-icon-circle-2 details-image pull-left hidden-xs">
                                        <i class="leaseIcon"></i>
                                    </div>
                                    <div class="details-title pull-left">
                                        <h5 class="subtitle-margin"> </h5>
                                        <h4>Lease Length<span class="special-color">.</span></h4>
                                    </div>
                                    <div class="clearfix"></div>
                                    <ul class="no_padding">
                                        <li class="no_style" >
                                            {{ $listing->lease_length }}
                                        </li>

                                    </ul>
                                </div>
                                <div class="col-md-4 text-center">
                                    <div class="agent-icon-circle-2 details-image pull-left hidden-xs">
                                        <i class="propertyIcon"></i>
                                    </div>
                                    <div class="details-title pull-left">
                                        <h5 class="subtitle-margin"> </h5>
                                        <h4>ACCEPTABLE ISSUES <span class="special-color">.</span></h4>
                                    </div>
                                    <div class="clearfix"></div>
                                    <ul class="no_padding">
                                        <li class="no_style" style="list-style: none;text-align:left"><span class="bullet">•</span>
                                            @if($listing->broken_lease == '1')
                                                {{ Lang::get('listing.b_l') }}-{{ Lang::get('listing.h_o') }} {{ $listing->br_le_ye }}
                                            @endif
                                            @if($listing->eviction == '1')
                                                {{ Lang::get('listing.e_v') }}-{{ Lang::get('listing.h_o') }} {{ $listing->ev_ye }}
                                            @endif
                                            @if($listing->misdemeanor == '1')
                                                {{ Lang::get('listing.mis') }}
                                            @endif
                                            @if($listing->falonies == '1')
                                                {{ Lang::get('listing.garage') }}
                                            @endif
                                            @if($listing->section_8 == '1')
                                                {{ Lang::get('listing.other') }}
                                            @endif
                                            @if($listing->hud == '1')
                                                {{ Lang::get('listing.other') }}
                                            @endif
                                            @if($listing->income_r == '1')
                                                {{ Lang::get('listing.other') }}
                                            @endif
                                            @if($listing->bankruptcy == '1')
                                                {{ Lang::get('listing.other') }}
                                            @endif
                                            @if($listing->foreclosure == '1')
                                                {{ Lang::get('listing.forec') }}
                                            @endif
                                            @if($listing->credit == '1')
                                                {{ Lang::get('listing.other') }}
                                            @endif
                                            @if($listing->move_in == '1')
                                                {{ Lang::get('listing.other') }}
                                            @endif
                                        </li>
                                        <li style="list-style: none;text-align:left">
                                            <span class="bullet">•</span>
                                            Parking Fee {{ $listing->parking_fee }}$/mo
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-md-4 text-center">
                                    <div class="agent-icon-circle-2 details-image pull-left hidden-xs">
                                        <i class="propertyIcon"></i>
                                    </div>
                                    <div class="details-title pull-left">
                                        <h5 class="subtitle-margin"> </h5>
                                        <h4>ACCEPTABLE ISSUES <span class="special-color">.</span></h4>
                                    </div>
                                    <div class="clearfix"></div>
                                    <ul class="no_padding">
                                        <li class="no_style" style="list-style: none;text-align:left"><span class="bullet">•</span>
                                            @if($listing->possession == '1')
                                                {{ Lang::get('listing.surfact_lot') }}
                                            @endif
                                            @if($listing->possession_w == '1')
                                                {{ Lang::get('listing.covered') }}
                                            @endif
                                            @if($listing->assault == '1')
                                                {{ Lang::get('listing.as') }}
                                            @endif
                                            @if($listing->herassment == '1')
                                                {{ Lang::get('listing.garage') }}
                                            @endif
                                            @if($listing->theft_of == '1')
                                                {{ Lang::get('listing.other') }}
                                            @endif
                                            @if($listing->dwi == '1')
                                                {{ Lang::get('listing.other') }}
                                            @endif
                                            @if($listing->dui == '1')
                                                {{ Lang::get('listing.other') }}
                                            @endif
                                            @if($listing->disorderly == '1')
                                                {{ Lang::get('listing.other') }}
                                            @endif
                                            @if($listing->theft == '1')
                                                {{ Lang::get('listing.other') }}
                                            @endif
                                            @if($listing->credit == '1')
                                                {{ Lang::get('listing.cre') }}
                                            @endif
                                            @if($listing->move_in == '1')
                                                {{ Lang::get('listing.other') }}
                                            @endif
                                        </li>
                                        <li style="list-style: none;text-align:left">
                                            <span class="bullet">•</span>
                                            Parking Fee {{ $listing->parking_fee }}$/mo
                                        </li>
                                    </ul>
                                </div>
                            </div>



                            {{--<div class="">${{ $listing->rent }}</div>
                            <div class="details-parameters">
                                <div class="details-parameters-cont">
                                    <div class="details-parameters-name">bedrooms</div>
                                    <div class="details-parameters-val">{{ $listing->beds_count }}</div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="details-parameters-cont">
                                    <div class="details-parameters-name">bathrooms</div>
                                    <div class="details-parameters-val">{{ $listing->baths_count }}</div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="details-parameters-cont">
                                    <div class="details-parameters-name">{{ Lang::get('listing.parking_type') }}</div>
                                    <div class="details-parameters-val">
                                        @if($listing->parking_type == '1')
                                            {{ Lang::get('listing.surfact_lot') }}
                                        @elseif($listing->parking_type == '3')
                                            {{ Lang::get('listing.covered') }}
                                        @elseif($listing->parking_type == '4')
                                            {{ Lang::get('listing.street') }}
                                        @elseif($listing->parking_type == '5')
                                            {{ Lang::get('listing.garage') }}
                                        @elseif($listing->parking_type == '7')
                                            {{ Lang::get('listing.other') }}
                                        @endif
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="details-parameters-cont">
                                    <div class="details-parameters-name"></div>
                                    <div class="details-parameters-val">
                                        {{ $listing->parking_fee }}$/mo
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>--}}
                        </div>




                       {{-- <div class="col-xs-6 col-sm-4">
                            <ul class="details-ticks">
                                @if($listing->dogs == '1')
                                    <li><i class="jfont">&#xe815;</i>{{ Lang::get('listing.dogs_ok') }}</li>
                                @endif
                                @if($listing->cats == '1')
                                    <li><i class="jfont">&#xe815;</i>{{ Lang::get('listing.cats_ok') }}</li>
                                @endif
                                @if($listing->no_pets == '1')
                                    <li><i class="jfont">&#xe815;</i>{{ Lang::get('listing.no_pets') }}</li>
                                @endif
                                @if($listing->furnished == '1')
                                    <li><i class="jfont">&#xe815;</i>{{ Lang::get('listing.furnished') }}</li>
                                @endif
                            </ul>
                        </div>
                        <div class="col-xs-6 col-sm-4">
                            <ul class="details-ticks">
                                @if($listing->no_smocking == '1')
                                    <li><i class="jfont">&#xe815;</i>{{ Lang::get('listing.no_smo') }}</li>
                                @endif
                                @if($listing->wheelchair == '1')
                                    <li><i class="jfont">&#xe815;</i>{{ Lang::get('listing.wheel_access') }}</li>
                                @endif
                            </ul>

                        </div>--}}
                    </div>
                    <div class="row margin-top-15">
                        <div class="col-xs-12 apartment-tabs">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation" class="active">
                                    <a href="#tab-map" aria-controls="tab-map" role="tab" data-toggle="tab">
                                        <span>Map</span>
                                        <div class="button-triangle2"></div>
                                    </a>
                                </li>
                                <li role="presentation">
                                    <a href="#tab-street-view" aria-controls="tab-street-view" role="tab" data-toggle="tab">
                                        <span>Street view</span>
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
                            <h3 class="title-negative-margin">Reviews<span class="special-color">.</span></h3>
                            <div class="title-separator-primary"></div>
                        </div>
                    </div>
                    <div class="row margin-top-60">
                        <div class="col-xs-8">
                            <div class="quote-box box_2" >
                                <h5>Apartment Reviews</h5>
                                <br>
                                @if(!$listing->Reviews()->first())
                                    <p>There are no reviews for this property. Be the first to add a review on this property</p>
                                @endif
                                <button type="button" href="#" id="show_review_box" class="button-primary ">
                                    <span>Write a Review</span>
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
                    <div class="row margin-top-60">
                        <div class="col-xs-12">
                            <h3 class="title-negative-margin">contact the REPRESENTATIVE<span class="special-color">.</span></h3>
                            <div class="title-separator-primary"></div>
                        </div>
                    </div>
                    <div class="row margin-top-60">
                        <div class="col-xs-8 col-xs-offset-2 col-sm-3 col-sm-offset-0">
                            <h5 class="subtitle-margin"> </h5>
                            <h3 class="title-negative-margin">{{ $listing->User()->first()->first_name }} {{ $listing->User()->first()->last_name }}<span class="special-color">.</span></h3>
                            <a href="#" class="agent-photo">
                                <img src="{{ asset('assets/images').'/'.$listing->User()->first()->avatar }}" alt="" class="img-responsive">
                            </a>
                        </div>
                        <div class="col-xs-12 col-sm-9">
                            <div class="agent-social-bar">
                                <div class="pull-left">
									<span class="agent-icon-circle">
										<i class="fa fa-phone"></i>
									</span>
                                    <span class="agent-bar-text">{{ $listing->User()->first()->phone }}</span>
                                </div>
                                <div class="pull-left">
									<span class="agent-icon-circle">
										<i class="fa fa-envelope fa-sm"></i>
									</span>
                                    <span class="agent-bar-text">{{ $listing->User()->first()->email }}</span>
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
                                <input name="email" value="@if(Auth::user()){{ Auth::user()->email }} @endif" type="email" class="input-full main-input" placeholder="Your email">
                                <textarea name="message" class="input-full agent-textarea main-input" placeholder="Your question"></textarea>
                                <div class="form-submit-cont">
                                    <button type="submit" href="#" class="button-primary pull-right">
                                        <span>send</span>
                                        <div class="button-triangle"></div>
                                        <div class="button-triangle2"></div>
                                        <div class="button-icon"><i class="fa fa-paper-plane"></i></div>
                                    </button>
                                    <div class="clearfix"></div>
                                </div>
                            </form>
                        </div>
                    </div>
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

