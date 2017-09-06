@extends('layouts.app')

@section('content')


    <section class="section-dark no-padding">
        <!-- Slider main container -->
        <div id="swiper-gallery" class="swiper-container">
            <!-- Additional required wrapper -->
            <div class="swiper-wrapper">
                <!-- Slides -->
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
                        <div class="col-xs-12 col-sm-7 col-md-8 col-lg-9">
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
                                        <a href="{{ route('addFavorite' , ['user_id' => Auth::user()->id , 'listing_id' => $listing->id]) }}">
                                            <i class="fa fa-heart"></i>
                                        </a>
                                    </div>
                                </div>
                            @endif
                            <div class="clearfix"></div>
                            <div class="title-separator-primary"></div>
                            <p class="details-desc">{{ $listing->description }}</p>
                        </div>
                        <div class="col-xs-12 col-sm-5 col-md-4 col-lg-3">

                            <div class="details-parameters-price">${{ $listing->rent }}</div>
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
                            </div>
                        </div>
                    </div>
                    <div class="row margin-top-45">
                        <div class="col-xs-6 col-sm-4">
                            <ul class="details-ticks">
                                <li><i class="jfont">&#xe815;</i>Air conditioning</li>
                                <li><i class="jfont">&#xe815;</i>Internet</li>
                                <li><i class="jfont">&#xe815;</i>Cable TV</li>
                                <li><i class="jfont">&#xe815;</i>Balcony</li>
                            </ul>
                        </div>
                        <div class="col-xs-6 col-sm-4">
                            <ul class="details-ticks">
                                <li><i class="jfont">&#xe815;</i>Garage</li>
                                <li><i class="jfont">&#xe815;</i>Lift</li>
                                <li><i class="jfont">&#xe815;</i>High standard</li>
                                <li><i class="jfont">&#xe815;</i>City Centre</li>
                            </ul>

                        </div>
                        <div class="col-xs-6 col-sm-4">
                            <ul class="details-ticks">
                                <li><i class="jfont">&#xe815;</i>nostrud exercitation</li>
                                <li><i class="jfont">&#xe815;</i>nostrud exercitation</li>
                                <li><i class="jfont">&#xe815;</i>nostrud exercitation</li>
                                <li><i class="jfont">&#xe815;</i>nostrud exercitation</li>
                            </ul>
                        </div>
                    </div>
                    <div class="row margin-top-45">
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
                    <div class="row margin-top-60">
                        <div class="col-xs-12">
                            <h3 class="title-negative-margin">contact the seller<span class="special-color">.</span></h3>
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
                            <form name="contact-from" action="#">
                                <input name="name" type="text" class="input-long main-input" placeholder="Your name">
                                <input name="phone" type="text" class="input-short pull-right main-input" placeholder="Your phone">
                                <input name="mail" type="email" class="input-full main-input" placeholder="Your email">
                                <textarea name="message" class="input-full agent-textarea main-input" placeholder="Your question"></textarea>
                                <div class="form-submit-cont">
                                    <a href="#" class="button-primary pull-right">
                                        <span>send</span>
                                        <div class="button-triangle"></div>
                                        <div class="button-triangle2"></div>
                                        <div class="button-icon"><i class="fa fa-paper-plane"></i></div>
                                    </a>
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

@endsection

