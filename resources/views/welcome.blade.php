@extends('layouts.app')
@section('content')
    <section class="no-padding adv-search-section">
        <!-- Slider main container -->
        <div id="swiper1" class="swiper-container" style="height: 487px !important;">
            <!-- Additional required wrapper -->
            <div class="swiper-wrapper" >
                <!-- Slides -->
                <div class="swiper-slide">
                    <div class="slide-bg swiper-lazy" data-background="images/slides/1.jpg"></div>
                    <!-- Preloader image -->
                    <div class="swiper-lazy-preloader swiper-lazy-preloader-white"></div>
                    <div class="container">
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="slide-bg swiper-lazy" data-background="images/slides/2.jpg"></div>
                    <!-- Preloader image -->
                    <div class="swiper-lazy-preloader swiper-lazy-preloader-white"></div>
                    <div class="container">

                    </div>
                    <div class="video-slide">
                        <video poster="images/slides/2.jpg" preload="auto" loop="" autoplay="" muted="">
                            <source src='images\slides\2.mp4' type='video/mp4'></source>
                        </video>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="slide-bg swiper-lazy" data-background="images/slides/3.jpg"></div>
                    <!-- Preloader image -->
                    <div class="swiper-lazy-preloader swiper-lazy-preloader-white"></div>
                    <div class="container">
                    </div>
                </div>
            </div>
        </div>
            <div class="adv-search-cont">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-lg-11 adv-search-icons">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs adv-search-tabs" role="tablist">
                                <li role="presentation" class="active" data-toggle="tooltip" data-placement="top" title="apartments"><a href="#apartments" aria-controls="apartments" role="tab" data-toggle="tab" id="adv-search-tab1"><i class="fa fa-building"></i></a></li>
                                <li role="presentation" data-toggle="tooltip" data-placement="top" title="houses"><a href="#houses" aria-controls="houses" role="tab" data-toggle="tab" id="adv-search-tab2"><i class="fa fa-home"></i></a></li>
                                <li role="presentation" data-toggle="tooltip" data-placement="top" title="commercials"><a href="#commercials" aria-controls="commercials" role="tab" data-toggle="tab" id="adv-search-tab3"><i class="fa fa-industry"></i></a></li>
                                <li role="presentation" data-toggle="tooltip" data-placement="top" title="lands"><a href="#lands" aria-controls="lands" role="tab" data-toggle="tab" id="adv-search-tab4"><i class="fa fa-tree"></i></a></li>
                            </ul>
                        </div>
                        <div class="col-lg-1 visible-lg">
                            <a id="adv-search-hide" href="#"><i class="jfont">&#xe801;</i></a>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row tab-content">
                        <div role="tabpanel" class="col-xs-12 adv-search-outer tab-pane fade in active" id="apartments">
                            <form action="{{ route('searchListing') }}" class="apartament_form" method="post">
                                {{ csrf_field()  }}
                                <input type="hidden" name="listing_type" value="2">
                                <div class="row">
                                    <br>
                                    <div class="col-xs-12 col-sm-6 col-lg-4">
                                        <input id="geocomplete" name="address" type="text" class="input-full main-input" required placeholder="Address">
                                        <div id="submit-property-map" style="display: none" class="submit-property-map"></div>
                                        <div class="row" style="display: none">
                                            <div class="col-xs-12 col-sm-6 margin-top-15">
                                                <input name="lng" type="text" class="input-full main-input input-last" placeholder="Longitude" readonly="readonly">
                                            </div>
                                            <div class="col-xs-12 col-sm-6 margin-top-15">
                                                <input name="lat" type="text" class="input-full main-input input-last" placeholder="Latitude" readonly="readonly">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <select name="rent" id="rent" class="selectpicker"   title="Rent">
                                                <option value="500-700">$500 - $700</option>
                                                <option value="700-900">$700 - $900</option>
                                                <option value="900-1300">$900 - $1300</option>
                                                <option value="1300-1800">$1300 - $1800</option>
                                                <option value="1800-2100">$1800 - $2100</option>
                                                <option value="2100-2150">$2100 - $2150</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-3">
                                        <select name="beds_baths[]" class="selectpicker" multiple="" title="Beds X Baths">
                                            <optgroup label="Beds" data-max-options="1">
                                                <option value="all">All Beds</option>
                                                <option value="1">1 Bed</option>
                                                <option value="2">2 Beds</option>
                                                <option value="3">3 Beds</option>
                                                <option value="4">4+  Beds</option>
                                            </optgroup>
                                            <optgroup label="Baths" data-max-options="1">
                                                <option value="all_baths">All Baths</option>
                                                <option value="1">1+ Baths</option>
                                                <option value="2">2+ Baths</option>
                                                <option value="3">3+ Baths</option>
                                            </optgroup>
                                        </select>
                                    </div>
                                    <div class="col-sm-12 col-md-6 col-lg-2  adv-search-button-cont">
                                        <button type="submit" class="button-primary  appartament_search">
                                            <span>{{ Lang::get('home.search_btn') }}</span>
                                            <div class="button-triangle"></div>
                                            <div class="button-triangle2"></div>
                                            <div class="button-icon"><i class="fa fa-search"></i></div>
                                        </button>
                                    </div>
                                </div>

                            </form>
                        </div>
                        <div role="tabpanel" class="col-xs-12 adv-search-outer tab-pane fade" id="houses">
                            <form action="{{ route('searchListing') }}" class="apartament_form" method="post">
                                {{ csrf_field()  }}
                                <input type="hidden" name="listing_type" value="7">
                                <div class="row">
                                    <br>
                                    <div class="col-xs-12 col-sm-6 col-lg-4">
                                        <input id="geocomplete1" name="address" type="text" class="input-full main-input" required placeholder="Address">
                                        <div id="submit-property-map" style="display: none" class="submit-property-map"></div>
                                        <div class="row" style="display: none">
                                            <div class="col-xs-12 col-sm-6 margin-top-15">
                                                <input name="lng" type="text" class="input-full main-input input-last" placeholder="Longitude" readonly="readonly">
                                            </div>
                                            <div class="col-xs-12 col-sm-6 margin-top-15">
                                                <input name="lat" type="text" class="input-full main-input input-last" placeholder="Latitude" readonly="readonly">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <select name="rent" id="rent" class="selectpicker"   title="Rent">
                                            <option value="500-700">$500 - $700</option>
                                            <option value="700-900">$700 - $900</option>
                                            <option value="900-1300">$900 - $1300</option>
                                            <option value="1300-1800">$1300 - $1800</option>
                                            <option value="1800-2100">$1800 - $2100</option>
                                            <option value="2100-2150">$2100 - $2150</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-3">
                                        <select name="beds_baths[]" class="selectpicker" multiple="" title="Beds X Baths">
                                            <optgroup label="Beds" data-max-options="1">
                                                <option value="all">All Beds</option>
                                                <option value="1">1 Bed</option>
                                                <option value="2">2 Beds</option>
                                                <option value="3">3 Beds</option>
                                                <option value="4">4+  Beds</option>
                                            </optgroup>
                                            <optgroup label="Baths" data-max-options="1">
                                                <option value="all_baths">All Baths</option>
                                                <option value="1">1+ Baths</option>
                                                <option value="2">2+ Baths</option>
                                                <option value="3">3+ Baths</option>
                                            </optgroup>
                                        </select>
                                    </div>
                                    <div class="col-sm-12 col-md-6 col-lg-2  adv-search-button-cont">
                                        <button type="submit" class="button-primary  appartament_search">
                                            <span>{{ Lang::get('home.search_btn') }}</span>
                                            <div class="button-triangle"></div>
                                            <div class="button-triangle2"></div>
                                            <div class="button-icon"><i class="fa fa-search"></i></div>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div role="tabpanel" class="col-xs-12 adv-search-outer tab-pane fade" id="commercials">
                            <form action="{{ route('searchListing') }}" class="apartament_form" method="post">
                                {{ csrf_field()  }}
                                <input type="hidden" name="listing_type" value="5">
                                <div class="row">
                                    <br>
                                    <div class="col-xs-12 col-sm-6 col-lg-4">
                                        <input id="geocomplete2" name="address" type="text" class="input-full main-input" required placeholder="Address">
                                        <div id="submit-property-map" style="display: none" class="submit-property-map"></div>
                                        <div class="row" style="display: none">
                                            <div class="col-xs-12 col-sm-6 margin-top-15">
                                                <input name="lng" type="text" class="input-full main-input input-last" placeholder="Longitude" readonly="readonly">
                                            </div>
                                            <div class="col-xs-12 col-sm-6 margin-top-15">
                                                <input name="lat" type="text" class="input-full main-input input-last" placeholder="Latitude" readonly="readonly">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <select name="rent" id="rent" class="selectpicker"   title="Rent">
                                            <option value="500-700">$500 - $700</option>
                                            <option value="700-900">$700 - $900</option>
                                            <option value="900-1300">$900 - $1300</option>
                                            <option value="1300-1800">$1300 - $1800</option>
                                            <option value="1800-2100">$1800 - $2100</option>
                                            <option value="2100-2150">$2100 - $2150</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-3">
                                        <select name="beds_baths[]" class="selectpicker" multiple="" title="Beds X Baths">
                                            <optgroup label="Beds" data-max-options="1">
                                                <option value="all">All Beds</option>
                                                <option value="1">1 Bed</option>
                                                <option value="2">2 Beds</option>
                                                <option value="3">3 Beds</option>
                                                <option value="4">4+  Beds</option>
                                            </optgroup>
                                            <optgroup label="Baths" data-max-options="1">
                                                <option value="all_baths">All Baths</option>
                                                <option value="1">1+ Baths</option>
                                                <option value="2">2+ Baths</option>
                                                <option value="3">3+ Baths</option>
                                            </optgroup>
                                        </select>
                                    </div>
                                    <div class="col-sm-12 col-md-6 col-lg-2  adv-search-button-cont">
                                        <button type="submit" class="button-primary  appartament_search">
                                            <span>{{ Lang::get('home.search_btn') }}</span>
                                            <div class="button-triangle"></div>
                                            <div class="button-triangle2"></div>
                                            <div class="button-icon"><i class="fa fa-search"></i></div>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div role="tabpanel" class="col-xs-12 adv-search-outer tab-pane fade" id="lands">
                            <form action="{{ route('searchListing') }}" class="apartament_form" method="post">
                                {{ csrf_field()  }}
                                <input type="hidden" name="listing_type" value="3">
                                <div class="row">
                                    <br>
                                    <div class="col-xs-12 col-sm-6 col-lg-4">
                                        <input id="geocomplete3" name="address" type="text" class="input-full main-input" required placeholder="Address">
                                        <div id="submit-property-map" style="display: none" class="submit-property-map"></div>
                                        <div class="row" style="display: none">
                                            <div class="col-xs-12 col-sm-6 margin-top-15">
                                                <input name="lng" type="text" class="input-full main-input input-last" placeholder="Longitude" readonly="readonly">
                                            </div>
                                            <div class="col-xs-12 col-sm-6 margin-top-15">
                                                <input name="lat" type="text" class="input-full main-input input-last" placeholder="Latitude" readonly="readonly">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <select name="rent" id="rent" class="selectpicker"   title="Rent">
                                            <option value="500-700">$500 - $700</option>
                                            <option value="700-900">$700 - $900</option>
                                            <option value="900-1300">$900 - $1300</option>
                                            <option value="1300-1800">$1300 - $1800</option>
                                            <option value="1800-2100">$1800 - $2100</option>
                                            <option value="2100-2150">$2100 - $2150</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-3">
                                        <select name="beds_baths[]" class="selectpicker" multiple="" title="Beds X Baths">
                                            <optgroup label="Beds" data-max-options="1">
                                                <option value="all">All Beds</option>
                                                <option value="1">1 Bed</option>
                                                <option value="2">2 Beds</option>
                                                <option value="3">3 Beds</option>
                                                <option value="4">4+  Beds</option>
                                            </optgroup>
                                            <optgroup label="Baths" data-max-options="1">
                                                <option value="all_baths">All Baths</option>
                                                <option value="1">1+ Baths</option>
                                                <option value="2">2+ Baths</option>
                                                <option value="3">3+ Baths</option>
                                            </optgroup>
                                        </select>
                                    </div>
                                    <div class="col-sm-12 col-md-6 col-lg-2  adv-search-button-cont">
                                        <button type="submit" class="button-primary  appartament_search">
                                            <span>{{ Lang::get('home.search_btn') }}</span>
                                            <div class="button-triangle"></div>
                                            <div class="button-triangle2"></div>
                                            <div class="button-icon"><i class="fa fa-search"></i></div>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
    </section>
    <section class="section-light bottom-padding-45 section-both-shadow">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-9">
                    <h5 class="subtitle-margin special-color">{{ Lang::get('pages.highly_recom') }}</h5>
                    <h1 class="special-color">{{ Lang::get('home.feat_offer') }}<span class="special-color">.</span></h1>
                </div>
                <div class="col-xs-12 col-sm-3">
                    <a href="#" class="navigation-box navigation-box-next" id="featured-offers-owl-next"><div class="navigation-triangle"></div><div class="navigation-box-icon"><i class="jfont">&#xe802;</i></div></a>
                    <a href="#" class="navigation-box navigation-box-prev" id="featured-offers-owl-prev"><div class="navigation-triangle"></div><div class="navigation-box-icon"><i class="jfont">&#xe800;</i></div></a>
                </div>
                <div class="col-xs-12">
                    <div class="title-separator-secondary"></div>
                </div>
            </div>
        </div>
        <div class="featured-offers-container">
            <div class="owl-carousel" id="featured-offers-owl">
                <span style="display: none"> {{ $count = 0 }}</span>
                @if($listing->first())
                    @foreach($listing as $lis)
                        <div class="featured-offer-col">
                            <span style="display: none">{{ $count++ }}</span>
                            <div class="featured-offer-front">
                                <div class="featured-offer-photo">
                                    @if($lis->ListingsImages()->first())
                                        <img src="{{ asset('assets/images').'/'.$lis->ListingsImages()->first()->image }}" alt="">
                                    @else
                                        <img src="{{ asset('images/featured-offer7.jpg') }}" alt="">
                                    @endif
                                </div>
                                <div class="featured-offer-text">
                                    <h4 class="featured-offer-title"><i class=" fa fa-map-marker"></i>  {{ $lis->address }}</h4>
                                    <p>{{ str_limit($lis->description , 150) }}</p>
                                </div>
                                <div class="featured-offer-params">
                                    <div class="featured-area">
                                        <img src="images\area-icon.png" alt="">54m<sup>2</sup>
                                    </div>
                                    <div class="featured-rooms">
                                        <img src="images\rooms-icon.png" alt="">3
                                    </div>
                                    <div class="featured-baths">
                                        <img src="images\bathrooms-icon.png" alt="">1
                                    </div>
                                </div>
                                <div class="featured-price">
                                    $ 320 000
                                </div>
                            </div>
                            <div class="featured-offer-back">
                                <div id="featured-map{{$count}}" class="featured-offer-map"></div>
                                <div class="button">
                                    <a href="{{ route('singleListing' , ['id' => $lis->id]) }}" class="button-primary">
                                        <span>read more</span>
                                        <div class="button-triangle"></div>
                                        <div class="button-triangle2"></div>
                                        <div class="button-icon"><i class="fa fa-search"></i></div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </section>
    <section class="testimonials parallax">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-9">
                    <h5 class="subtitle-margin second-color">recommendations</h5>
                    <h1 class="second-color">our clients say<span class="special-color">.</span></h1>
                </div>
                <div class="col-xs-12 col-sm-3">
                    <a href="#" class="navigation-box navigation-box-next" id="testimonials-owl-next"><div class="navigation-triangle"></div><div class="navigation-box-icon"><i class="jfont">&#xe802;</i></div></a>
                    <a href="#" class="navigation-box navigation-box-prev" id="testimonials-owl-prev"><div class="navigation-triangle"></div><div class="navigation-box-icon"><i class="jfont">&#xe800;</i></div></a>
                </div>
                <div class="col-xs-12">
                    <div class="title-separator-secondary"></div>
                </div>
            </div>
        </div>

        <div class="container margin-top-90">
            <div class="row">
                <div class="col-xs-12 owl-carousel" id="testimonials-owl">
                    <div class="testimonial">
                        <img src="images\testimonials1.jpg" alt="" class="testimonials-photo">
                        <div class="testimonials-content">
                            <p class="lead">Smith’s Family</p>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>

                        </div>
                        <div class="big-triangle">
                        </div>
                        <div class="big-icon"><i class="fa fa-quote-right fa-lg"></i></div>
                    </div>
                    <div class="testimonial">
                        <img src="images\testimonials2.jpg" alt="" class="testimonials-photo">
                        <div class="testimonials-content">
                            <p class="lead">Meggy Johnson</p>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                            <div class="big-triangle">
                            </div>
                            <div class="big-icon"><i class="fa fa-quote-right fa-lg"></i></div>
                        </div>
                    </div>
                    <div class="testimonial">
                        <img src="images\testimonials3.jpg" alt="" class="testimonials-photo">
                        <div class="testimonials-content">
                            <p class="lead">Paola Brown &amp; Tommy</p>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                            <div class="big-triangle">
                            </div>
                            <div class="big-icon"><i class="fa fa-quote-right fa-lg"></i></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>

    <section class="section-light top-padding-45 bottom-padding-45">
        <div class="container">
            <div class="row count-container">
                <div class="col-xs-6 col-lg-3">
                    <div class="number" id="number1">
                        <div class="number-img">
                            <i class="fa fa-building"></i>
                        </div>
                        <span class="number-label text-color2">APARTMENTS</span>
                        <span class="number-big text-color3 count" data-from="0" data-to="130" data-speed="2000"></span>
                    </div>
                </div>
                <div class="col-xs-6 col-lg-3 number_border">
                    <div class="number" id="number2">
                        <div class="number-img">
                            <i class="fa fa-home"></i>
                        </div>
                        <span class="number-label text-color2">HOUSES</span>
                        <span class="number-big text-color3 count" data-from="0" data-to="107" data-speed="2000"></span>
                    </div>
                </div>
                <div class="col-xs-6 col-lg-3 number_border3">
                    <div class="number" id="number3">
                        <div class="number-img">
                            <i class="fa fa-industry"></i>
                        </div>
                        <span class="number-label text-color2">COMMERCIAL</span>
                        <span class="number-big text-color3 count" data-from="0" data-to="149" data-speed="2000"></span>
                    </div>
                </div>
                <div class="col-xs-6 col-lg-3 number_border">
                    <div class="number" id="number4">
                        <div class="number-img">
                            <i class="fa fa-tree"></i>
                        </div>
                        <span class="number-label text-color2">LAND</span>
                        <span class="number-big text-color3 count" data-from="0" data-to="25" data-speed="2000"></span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div style="display: none">{{ $counts = 1 }}</div>
@endsection
@section('scripts')
    <script type="text/javascript">
        google.maps.event.addDomListener(window, 'load', init);
        function init() {
            @foreach($listing as $lis)
                mapInitAddress("{{ $lis->address }}","featured-map{{$counts++}}","images/pin-house.png", false);
            @endforeach
        }

    </script>
    <script>
        $(document).ready(function () {
            $( "select[name='beds_baths']" ).selectpicker();
            $( "select[name='rent']" ).selectpicker();
        })
    </script>
@endsection

