@extends('layouts.app')
@section('content')
    <section class="no-padding adv-search-section">
        <!-- Slider main container -->
        <div id="swiper1" class="swiper-container" style="height: 487px !important;">
            <!-- Additional required wrapper -->
            <div class="swiper-wrapper" >
                <!-- Slides -->
                <div class="swiper-slide">
                    <div class="slide-bg swiper-lazy" data-background="{{$slider_images ?  asset('assets/images/'.$slider_images->image_1) : 'images/slides/1.jpg' }}"></div>
                    <!-- Preloader image -->
                    <div class="swiper-lazy-preloader swiper-lazy-preloader-white"></div>
                    <div class="container">
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="slide-bg swiper-lazy" data-background="{{$slider_images ?  asset('assets/images/'.$slider_images->image_2) : 'images/slides/2.jpg' }}"></div>
                    <!-- Preloader image -->
                    <div class="swiper-lazy-preloader swiper-lazy-preloader-white"></div>
                    <div class="container">

                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="slide-bg swiper-lazy" data-background="{{$slider_images ?  asset('assets/images/'.$slider_images->image_3) : 'images/slides/3.jpg' }}"></div>
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
                                <li role="presentation" class="active" data-toggle="tooltip" data-placement="top" title="{{ Lang::get('listing.appartament') }}"><a href="#apartments" aria-controls="apartments" role="tab" data-toggle="tab" id="adv-search-tab1"><i class="fa fa-building"></i></a></li>
                                <li role="presentation" data-toggle="tooltip" data-placement="top" title="{{ Lang::get('listing.condo') }}"><a href="#houses" aria-controls="houses" role="tab" data-toggle="tab" id="adv-search-tab2"><i class="fa fa-home"></i></a></li>
                                <li role="presentation" data-toggle="tooltip" data-placement="top" title="{{ Lang::get('listing.townhome') }}"><a href="#commercials" aria-controls="commercials" role="tab" data-toggle="tab" id="adv-search-tab3"><i class="fa fa-industry"></i></a></li>
                                <li role="presentation" data-toggle="tooltip" data-placement="top" title="{{ Lang::get('listing.single_home') }}"><a href="#lands" aria-controls="lands" role="tab" data-toggle="tab" id="adv-search-tab4"><i class="fa fa-tree"></i></a></li>
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
                                        <input id="autocomplete" class="input-full main-input" onFocus="geolocate()" type="text" placeholder="{{ Lang::get('listing.address') }}">

                                        <table id="address" style="display: none">
                                            <input class="field"  id="street_number" type="hidden">
                                            <input class="field"  id="route" type="hidden">
                                            <input class="field" id="locality"  type="hidden">
                                            <input class="field" id="administrative_area_level_1" name="state" type="hidden">
                                            <input class="field" id="postal_code"  type="hidden">
                                            <input class="field"  id="country" type="hidden">
                                        </table>
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
                                        <select name="rent" id="rent" class="selectpicker"   title="{{ Lang::get('listing.rent') }}">
                                                <option value="500-700">$500 - $700</option>
                                                <option value="700-900">$700 - $900</option>
                                                <option value="900-1300">$900 - $1300</option>
                                                <option value="1300-1800">$1300 - $1800</option>
                                                <option value="1800-2100">$1800 - $2100</option>
                                                <option value="2100-2150">$2100 - $2150</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-3">
                                        <select name="beds_baths[]" class="selectpicker" multiple="" title="{{ Lang::get('listing.beds') }} X {{ Lang::get('listing.baths') }}">
                                            <optgroup label="{{ Lang::get('listing.beds') }}" data-max-options="1">
                                                <option value="all">{{ Lang::get('home.all_be') }}</option>
                                                <option value="1">1 Bed</option>
                                                <option value="2">2 {{ Lang::get('listing.beds') }}</option>
                                                <option value="3">3 {{ Lang::get('listing.beds') }}</option>
                                                <option value="4">4+  {{ Lang::get('listing.beds') }}</option>
                                            </optgroup>
                                            <optgroup label="{{ Lang::get('listing.baths') }}" data-max-options="1">
                                                <option value="all_baths">{{ Lang::get('home.all_ba') }}</option>
                                                <option value="1">1+ {{ Lang::get('listing.baths') }}</option>
                                                <option value="2">2+ {{ Lang::get('listing.baths') }}</option>
                                                <option value="3">3+ {{ Lang::get('listing.baths') }}</option>
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
                                        <input type="hidden">
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
                                        <select name="rent" id="rent" class="selectpicker"   title="{{ Lang::get('listing.rent') }}">
                                            <option value="500-700">$500 - $700</option>
                                            <option value="700-900">$700 - $900</option>
                                            <option value="900-1300">$900 - $1300</option>
                                            <option value="1300-1800">$1300 - $1800</option>
                                            <option value="1800-2100">$1800 - $2100</option>
                                            <option value="2100-2150">$2100 - $2150</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-3">
                                        <select name="beds_baths[]" class="selectpicker" multiple="" title="{{ Lang::get('listing.beds') }} X {{ Lang::get('listing.baths') }}">
                                            <optgroup label="{{ Lang::get('listing.beds') }}" data-max-options="1">
                                                <option value="all">{{ Lang::get('home.all_be') }}</option>
                                                <option value="1">1 Bed</option>
                                                <option value="2">2 {{ Lang::get('listing.beds') }}</option>
                                                <option value="3">3 {{ Lang::get('listing.beds') }}</option>
                                                <option value="4">4+  {{ Lang::get('listing.beds') }}</option>
                                            </optgroup>
                                            <optgroup label="{{ Lang::get('listing.baths') }}" data-max-options="1">
                                                <option value="all_baths">{{ Lang::get('home.all_ba') }}</option>
                                                <option value="1">1+ {{ Lang::get('listing.baths') }}</option>
                                                <option value="2">2+ {{ Lang::get('listing.baths') }}</option>
                                                <option value="3">3+ {{ Lang::get('listing.baths') }}</option>
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
                                        <select name="rent" id="rent" class="selectpicker"   title="{{ Lang::get('listing.rent') }}">

                                            <option value="500-700">$500 - $700</option>
                                            <option value="700-900">$700 - $900</option>
                                            <option value="900-1300">$900 - $1300</option>
                                            <option value="1300-1800">$1300 - $1800</option>
                                            <option value="1800-2100">$1800 - $2100</option>
                                            <option value="2100-2150">$2100 - $2150</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-3">
                                        <select name="beds_baths[]" class="selectpicker" multiple="" title="{{ Lang::get('listing.beds') }} X {{ Lang::get('listing.baths') }}">
                                            <optgroup label="{{ Lang::get('listing.beds') }}" data-max-options="1">
                                                <option value="all">{{ Lang::get('home.all_be') }}</option>
                                                <option value="1">1 Bed</option>
                                                <option value="2">2 {{ Lang::get('listing.beds') }}</option>
                                                <option value="3">3 {{ Lang::get('listing.beds') }}</option>
                                                <option value="4">4+  {{ Lang::get('listing.beds') }}</option>
                                            </optgroup>
                                            <optgroup label="{{ Lang::get('listing.baths') }}" data-max-options="1">
                                                <option value="all_baths">{{ Lang::get('home.all_ba') }}</option>
                                                <option value="1">1+ {{ Lang::get('listing.baths') }}</option>
                                                <option value="2">2+ {{ Lang::get('listing.baths') }}</option>
                                                <option value="3">3+ {{ Lang::get('listing.baths') }}</option>
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
                                        <select name="rent" id="rent" class="selectpicker"   title="{{ Lang::get('listing.rent') }}">
                                            <option value="500-700">$500 - $700</option>
                                            <option value="700-900">$700 - $900</option>
                                            <option value="900-1300">$900 - $1300</option>
                                            <option value="1300-1800">$1300 - $1800</option>
                                            <option value="1800-2100">$1800 - $2100</option>
                                            <option value="2100-2150">$2100 - $2150</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-3">
                                        <select name="beds_baths[]" class="selectpicker" multiple="" title="{{ Lang::get('listing.beds') }} X {{ Lang::get('listing.baths') }}">
                                            <optgroup label="{{ Lang::get('listing.beds') }}" data-max-options="1">
                                                <option value="all">{{ Lang::get('home.all_be') }}</option>
                                                <option value="1">1 Bed</option>
                                                <option value="2">2 {{ Lang::get('listing.beds') }}</option>
                                                <option value="3">3 {{ Lang::get('listing.beds') }}</option>
                                                <option value="4">4+  {{ Lang::get('listing.beds') }}</option>
                                            </optgroup>
                                            <optgroup label="{{ Lang::get('listing.baths') }}" data-max-options="1">
                                                <option value="all_baths">{{ Lang::get('home.all_ba') }}</option>
                                                <option value="1">1+ {{ Lang::get('listing.baths') }}</option>
                                                <option value="2">2+ {{ Lang::get('listing.baths') }}</option>
                                                <option value="3">3+ {{ Lang::get('listing.baths') }}</option>
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
                    <h5 class="subtitle-margin special-color">{{ Lang::get('home.highly_recom') }}</h5>
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
                                    @if($lis->ListingsImages()->whereNotNull('featured')->first())
                                        <img src="{{ asset('assets/images').'/'.$lis->ListingsImages()->whereNotNull('featured')->first()->image }}" alt="">
                                    @else
                                        <img src="{{ asset('images/featured-offer7.jpg') }}" alt="">
                                    @endif
                                </div>
                                <div class="featured-offer-text">
                                    <h4 class="featured-offer-title"><i class=" fa fa-map-marker"></i>  {{ $lis->address }}</h4>
                                    <p>{{ str_limit($lis->description , 150) }}</p>
                                </div>
                                <a href="{{ route('singleListing' , ['id' => $lis->id  , 'title' => $lis->title]) }}" class="button-primary">
                                    <span>read more</span>
                                    <div class="button-triangle"></div>
                                    <div class="button-triangle2"></div>
                                    <div class="button-icon"><i class="fa fa-search"></i></div>
                                </a>
                            </div>
                            <div class="featured-offer-back">
                                <div id="featured-map{{$count}}" class="featured-offer-map"></div>
                                <div class="button">
                                    <a href="{{ route('singleListing' , ['id' => $lis->id  , 'title' => $lis->title]) }}" class="button-primary">
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
                        <span class="number-label text-color2">{{ Lang::get('listing.appartament') }}</span>
                        <span class="number-big text-color3 count" data-from="0" data-to="{{ count(App\Listing::where('listing_status'  , 'done')->where('listing_type' , '2')->get()->toArray()) }}" data-speed="2000"></span>
                    </div>
                </div>
                <div class="col-xs-6 col-lg-3 number_border">
                    <div class="number" id="number2">
                        <div class="number-img">
                            <i class="fa fa-home"></i>
                        </div>
                        <span class="number-label text-color2">{{ Lang::get('listing.condo') }}</span>
                        <span class="number-big text-color3 count" data-from="0" data-to="{{ count(App\Listing::where('listing_status' , 'done')->where('listing_type' , '7')->get()->toArray()) }}" data-speed="2000"></span>
                    </div>
                </div>
                <div class="col-xs-6 col-lg-3 number_border3">
                    <div class="number" id="number3">
                        <div class="number-img">
                            <i class="fa fa-industry"></i>
                        </div>
                        <span class="number-label text-color2">{{ Lang::get('listing.townhome') }}</span>
                        <span class="number-big text-color3 count" data-from="0" data-to="{{ count(App\Listing::where('listing_status'  , 'done')->where('listing_type' , '5')->get()->toArray()) }}" data-speed="2000"></span>
                    </div>
                </div>
                <div class="col-xs-6 col-lg-3 number_border">
                    <div class="number" id="number4">
                        <div class="number-img">
                            <i class="fa fa-tree"></i>
                        </div>
                        <span class="number-label text-color2">{{ Lang::get('listing.single_home') }}</span>
                        <span class="number-big text-color3 count" data-from="0" data-to="{{ count(App\Listing::where('listing_status'  , 'done')->where('listing_type' , '3')->get()->toArray()) }}" data-speed="2000"></span>
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
    <script>
        // This example displays an address form, using the autocomplete feature
        // of the Google Places API to help users fill in the information.

        // This example requires the Places library. Include the libraries=places
        // parameter when you first load the API. For example:
        // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

        var placeSearch, autocomplete;
        var componentForm = {
            street_number: 'short_name',
            route: 'long_name',
            locality: 'long_name',
            administrative_area_level_1: 'long_name',
            country: 'long_name',
            postal_code: 'short_name'
        };

        function initAutocomplete() {
            // Create the autocomplete object, restricting the search to geographical
            // location types.
            autocomplete = new google.maps.places.Autocomplete(
                /** @type {!HTMLInputElement} */(document.getElementById('autocomplete')),
                {types: ['geocode']});

            // When the user selects an address from the dropdown, populate the address
            // fields in the form.
            autocomplete.addListener('place_changed', fillInAddress);
        }

        function fillInAddress() {
            // Get the place details from the autocomplete object.
            var place = autocomplete.getPlace();

            for (var component in componentForm) {
                document.getElementById(component).value = '';
                document.getElementById(component).disabled = false;
            }

            // Get each component of the address from the place details
            // and fill the corresponding field on the form.
            for (var i = 0; i < place.address_components.length; i++) {
                var addressType = place.address_components[i].types[0];
                if (componentForm[addressType]) {
                    var val = place.address_components[i][componentForm[addressType]];
                    document.getElementById(addressType).value = val;
                }
            }
        }

        // Bias the autocomplete object to the user's geographical location,
        // as supplied by the browser's 'navigator.geolocation' object.
        function geolocate() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    var geolocation = {
                        lat: position.coords.latitude,
                        lng: position.coords.longitude
                    };
                    var circle = new google.maps.Circle({
                        center: geolocation,
                        radius: position.coords.accuracy
                    });
                    autocomplete.setBounds(circle.getBounds());
                });
            }
        }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDF8NFf6d_o4NsjkrwdPgrboEDUo0SMgkE&language=en&libraries=places&callback=initAutocomplete"
            async defer></script>
    </body>
    </html>
@endsection

