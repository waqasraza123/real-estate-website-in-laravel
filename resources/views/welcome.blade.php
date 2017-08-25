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
                        {{--<div class="row">
                            <div class="col-xs-12 col-sm-10 col-md-8 col-lg-6 col-sm-offset-2 col-md-offset-4 col-lg-offset-6 slide-desc-col animated fadeInDown slide-desc-1">
                                <div class="slide-desc pull-right">
                                    <div class="slide-desc-text">

                                        <div class="estate-type">apartment</div>
                                        <div class="transaction-type">sale</div>
                                        <h4>Fort Collins, Colorado 80523, USA</h4>
                                        <div class="clearfix"></div>

                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                            Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                        </p>
                                    </div>
                                    <div class="slide-desc-params">
                                        <div class="slide-desc-area">
                                            <img src="images\area-icon.png" alt="">54m<sup>2</sup>
                                        </div>
                                        <div class="slide-desc-rooms">
                                            <img src="images\rooms-icon.png" alt="">3
                                        </div>
                                        <div class="slide-desc-baths">
                                            <img src="images\bathrooms-icon.png" alt="">1
                                        </div>
                                        <div class="slide-desc-parking">
                                            <img src="images\parking-icon.png" alt="">1
                                        </div>
                                    </div>
                                    <div class="slide-desc-price">
                                        $ 320 000
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="slide-buttons slide-buttons-right">
                                    <a href="#" class="navigation-box navigation-box-next slide-next"><div class="navigation-triangle"></div><div class="navigation-box-icon"><i class="jfont">&#xe802;</i></div></a>
                                    <a href="estate-details-right-sidebar.html" class="navigation-box navigation-box-more slide-more"><div class="navigation-triangle"></div><div class="navigation-box-icon"><i class="jfont fa-lg">&#xe813;</i></div></a>
                                    <a href="#" class="navigation-box navigation-box-prev slide-prev"><div class="navigation-triangle"></div><div class="navigation-box-icon"><i class="jfont">&#xe800;</i></div></a>
                                </div>
                            </div>
                        </div>--}}
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="slide-bg swiper-lazy" data-background="images/slides/2.jpg"></div>
                    <!-- Preloader image -->
                    <div class="swiper-lazy-preloader swiper-lazy-preloader-white"></div>
                    <div class="container">
                       {{-- <div class="row">
                            <div class="col-xs-12 col-sm-10 col-md-8 col-lg-6 slide-desc-col animated slide-desc-2">
                                <div class="slide-desc pull-left">
                                    <div class="slide-desc-text">

                                        <div class="estate-type">house</div>
                                        <div class="transaction-type">sale</div>
                                        <h4>West Fourth Street, New York 10003, USA</h4>
                                        <div class="clearfix"></div>

                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                            Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                                    </div>
                                    <div class="slide-desc-params">
                                        <div class="slide-desc-area">
                                            <img src="images\area-icon.png" alt="">350m<sup>2</sup>
                                        </div>
                                        <div class="slide-desc-rooms">
                                            <img src="images\rooms-icon.png" alt="">8
                                        </div>
                                        <div class="slide-desc-baths">
                                            <img src="images\bathrooms-icon.png" alt="">3
                                        </div>
                                        <div class="slide-desc-parking">
                                            <img src="images\parking-icon.png" alt="">2
                                        </div>
                                    </div>
                                    <div class="slide-desc-price">
                                        $ 650 000
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="slide-buttons slide-buttons-left">
                                    <a href="#" class="navigation-box navigation-box-next slide-next"><div class="navigation-triangle"></div><div class="navigation-box-icon"><i class="jfont">&#xe802;</i></div></a>
                                    <a href="estate-details-right-sidebar.html" class="navigation-box navigation-box-more slide-more"><div class="navigation-triangle"></div><div class="navigation-box-icon"><i class="jfont fa-lg">&#xe813;</i></div></a>
                                    <a href="#" class="navigation-box navigation-box-prev slide-prev"><div class="navigation-triangle"></div><div class="navigation-box-icon"><i class="jfont">&#xe800;</i></div></a>
                                </div>
                            </div>
                        </div>--}}
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
                                        <input id="geocomplete" name="address" type="text" class="input-full main-input" required placeholder="Localization">
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
                               {{-- <div class="row">

                                </div>
                                <div class="container">
                                    <div class="row">

                                    </div>
                                </div>--}}
                            </form>
                        </div>
                        <div role="tabpanel" class="col-xs-12 adv-search-outer tab-pane fade" id="houses">
                            <form action="{{ route('searchListing') }}" class="apartament_form" method="post">
                                {{ csrf_field()  }}
                                <input type="hidden" name="listing_type" value="2">
                                <div class="row">
                                    <br>
                                    <div class="col-xs-12 col-sm-6 col-lg-4">
                                        <input id="geocomplete" name="address" type="text" class="input-full main-input" required placeholder="Localization">
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
                                {{-- <div class="row">

                                 </div>
                                 <div class="container">
                                     <div class="row">

                                     </div>
                                 </div>--}}
                            </form>
                        </div>
                        <div role="tabpanel" class="col-xs-12 adv-search-outer tab-pane fade" id="commercials">
                            <div class="row">
                                <div class="col-xs-12 col-sm-6 col-lg-3">
                                    <select name="transaction3" class="bootstrap-select" title="Transaction:" multiple="">
                                        <option>{{ Lang::get('home.for_sale') }}
                                        <option>{{ Lang::get('home.for_rent') }}
                                    </select>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-lg-3">
                                    <select name="country3" class="bootstrap-select" title="Country:" multiple="" data-actions-box="true">

                                        <option>United States
                                        <option>Canada
                                        <option>Mexico
                                    </select>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-lg-3">
                                    <select name="city3" class="bootstrap-select" title="City:" multiple="" data-actions-box="true">
                                        <option>New York
                                        <option>Los Angeles
                                        <option>Chicago
                                        <option>Houston
                                        <option>Philadelphia
                                        <option>Phoenix
                                        <option>Washington
                                        <option>Salt Lake City
                                        <option>Detroit
                                        <option>Boston
                                    </select>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-lg-3">
                                    <select name="location3" class="bootstrap-select" title="Location:" multiple="" data-actions-box="true">
                                        <option>Some location 1
                                        <option>Some location 2
                                        <option>Some location 3
                                        <option>Some location 4
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-6 col-lg-3">
                                    <select name="type3" class="bootstrap-select short-margin" title="Type:" multiple="">
                                        <option>Shop/service
                                        <option>Factory
                                        <option>Warehouse
                                        <option>Office
                                        <option>Other
                                    </select>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-lg-3">
                                    <div class="adv-search-range-cont">
                                        <label for="slider-range-price3-value" class="adv-search-label">{{ Lang::get('home.price') }}</label>
                                        <span>$</span>
                                        <input type="text" id="slider-range-price3-value" readonly="" class="adv-search-amount">
                                        <div class="clearfix"></div>
                                        <div id="slider-range-price3" data-min="0" data-max="300000" class="slider-range"></div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-lg-3">
                                    <div class="adv-search-range-cont">
                                        <label for="slider-range-area3-value" class="adv-search-label">{{ Lang::get('home.area') }}</label>
                                        <span>m<sup>2</sup></span>
                                        <input type="text" id="slider-range-area3-value" readonly="" class="adv-search-amount">
                                        <div class="clearfix"></div>
                                        <div id="slider-range-area3" data-min="0" data-max="180" class="slider-range"></div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-lg-3">
                                    <div class="adv-search-range-cont">
                                        <label for="slider-range-bedrooms3-value" class="adv-search-label">{{ Lang::get('home.rooms') }}</label>
                                        <input type="text" id="slider-range-bedrooms3-value" readonly="" class="adv-search-amount">
                                        <div class="clearfix"></div>
                                        <div id="slider-range-bedrooms3" data-min="1" data-max="10" class="slider-range"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div role="tabpanel" class="col-xs-12 adv-search-outer tab-pane fade" id="lands">
                            <div class="row">
                                <div class="col-xs-12 col-sm-6 col-lg-3">
                                    <select name="transaction4" class="bootstrap-select" title="Transaction:" multiple="">
                                        <option>{{ Lang::get('home.for_sale') }}
                                        <option>{{ Lang::get('home.for_rent') }}
                                    </select>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-lg-3">
                                    <select name="country4" class="bootstrap-select" title="Country:" multiple="" data-actions-box="true">
                                        <option>United States
                                        <option>Canada
                                        <option>Mexico
                                    </select>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-lg-3">
                                    <select name="city4" class="bootstrap-select" title="City:" multiple="" data-actions-box="true">
                                        <option>New York
                                        <option>Los Angeles
                                        <option>Chicago
                                        <option>Houston
                                        <option>Philadelphia
                                        <option>Phoenix
                                        <option>Washington
                                        <option>Salt Lake City
                                        <option>Detroit
                                        <option>Boston
                                    </select>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-lg-3">
                                    <select name="location4" class="bootstrap-select" title="Location:" multiple="" data-actions-box="true">
                                        <option>Some location 1
                                        <option>Some location 2
                                        <option>Some location 3
                                        <option>Some location 4
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-6 col-lg-3">
                                    <select name="type4" class="bootstrap-select short-margin" title="Type:" multiple="">
                                        <option>Field
                                        <option>Recreational
                                        <option>Orchard
                                        <option>Forest
                                        <option>Other
                                    </select>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-lg-3">
                                    <div class="adv-search-range-cont">
                                        <label for="slider-range-price4-value" class="adv-search-label">{{ Lang::get('home.price') }}</label>
                                        <span>$</span>
                                        <input type="text" id="slider-range-price4-value" readonly="" class="adv-search-amount">
                                        <div class="clearfix"></div>
                                        <div id="slider-range-price4" data-min="0" data-max="300000" class="slider-range"></div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-lg-3">
                                    <div class="adv-search-range-cont">
                                        <label for="slider-range-area4-value" class="adv-search-label">{{ Lang::get('home.area') }}</label>
                                        <span>ha</span>
                                        <input type="text" id="slider-range-area4-value" readonly="" class="adv-search-amount">
                                        <div class="clearfix"></div>
                                        <div id="slider-range-area4" data-min="0" data-max="500" class="slider-range"></div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-lg-3">

                                </div>
                            </div>

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
                <div class="featured-offer-col">
                    <div class="featured-offer-front">
                        <div class="featured-offer-photo">
                            <img src="images\featured-offer1.jpg" alt="">
                            <div class="type-container">
                                <div class="estate-type">{{ Lang::get('home.appartament') }}</div>
                                <div class="transaction-type">{{ Lang::get('home.sale') }}</div>
                            </div>
                        </div>
                        <div class="featured-offer-text">
                            <h4 class="featured-offer-title">250 South Dr, Fort Collins, Colorado 80523, USA</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
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
                        <div id="featured-map1" class="featured-offer-map"></div>
                        <div class="button">
                            <a href="estate-details-right-sidebar.html" class="button-primary">
                                <span>read more</span>
                                <div class="button-triangle"></div>
                                <div class="button-triangle2"></div>
                                <div class="button-icon"><i class="fa fa-search"></i></div>
                            </a>
                        </div>
                    </div>

                </div>
                <div class="featured-offer-col">
                    <div class="featured-offer-front">
                        <div class="featured-offer-photo">
                            <img src="images\featured-offer2.jpg" alt="">
                            <div class="type-container">
                                <div class="estate-type">{{ Lang::get('home.appartament') }}</div>
                                <div class="transaction-type">{{ Lang::get('home.sale') }}</div>
                            </div>
                        </div>
                        <div class="featured-offer-text">
                            <h4 class="featured-offer-title">West Fourth Street, New York 10003, USA</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        </div>
                        <div class="featured-offer-params">
                            <div class="featured-area">
                                <img src="images\area-icon.png" alt="">70m<sup>2</sup>
                            </div>
                            <div class="featured-rooms">
                                <img src="images\rooms-icon.png" alt="">4
                            </div>
                            <div class="featured-baths">
                                <img src="images\bathrooms-icon.png" alt="">1
                            </div>
                        </div>
                        <div class="featured-price">
                            $ 350 000
                        </div>
                    </div>
                    <div class="featured-offer-back">
                        <div id="featured-map2" class="featured-offer-map"></div>
                        <div class="button">
                            <a href="estate-details-right-sidebar.html" class="button-primary">
                                <span>read more</span>
                                <div class="button-triangle"></div>
                                <div class="button-triangle2"></div>
                                <div class="button-icon"><i class="fa fa-search"></i></div>
                            </a>
                        </div>
                    </div>

                </div>
                <div class="featured-offer-col">
                    <div class="featured-offer-front">
                        <div class="featured-offer-photo">
                            <img src="images\featured-offer3.jpg" alt="">
                            <div class="type-container">
                                <div class="estate-type">house</div>
                                <div class="transaction-type">{{ Lang::get('home.sale') }}</div>
                            </div>
                        </div>
                        <div class="featured-offer-text">
                            <h4 class="featured-offer-title">500 E. Elwood St. Phoenix, AZ 85034, USA</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        </div>
                        <div class="featured-offer-params">
                            <div class="featured-area">
                                <img src="images\area-icon.png" alt="">250m<sup>2</sup>
                            </div>
                            <div class="featured-rooms">
                                <img src="images\rooms-icon.png" alt="">7
                            </div>
                            <div class="featured-baths">
                                <img src="images\bathrooms-icon.png" alt="">3
                            </div>
                        </div>
                        <div class="featured-price">
                            $ 650 000
                        </div>
                    </div>
                    <div class="featured-offer-back">
                        <div id="featured-map3" class="featured-offer-map"></div>
                        <div class="button">
                            <a href="estate-details-right-sidebar.html" class="button-primary">
                                <span>read more</span>
                                <div class="button-triangle"></div>
                                <div class="button-triangle2"></div>
                                <div class="button-icon"><i class="fa fa-search"></i></div>
                            </a>
                        </div>
                    </div>

                </div>
                <div class="featured-offer-col">
                    <div class="featured-offer-front">
                        <div class="featured-offer-photo">
                            <img src="images\featured-offer4.jpg" alt="">
                            <div class="type-container">
                                <div class="estate-type">{{ Lang::get('home.appartament') }}</div>
                                <div class="transaction-type">{{ Lang::get('home.sale') }}</div>
                            </div>
                        </div>
                        <div class="featured-offer-text">
                            <h4 class="featured-offer-title">N. Willamette Blvd., Portland, OR 97203-5798, USA</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        </div>
                        <div class="featured-offer-params">
                            <div class="featured-area">
                                <img src="images\area-icon.png" alt="">40m<sup>2</sup>
                            </div>
                            <div class="featured-rooms">
                                <img src="images\rooms-icon.png" alt="">2
                            </div>
                            <div class="featured-baths">
                                <img src="images\bathrooms-icon.png" alt="">1
                            </div>
                        </div>
                        <div class="featured-price">
                            $ 299 000
                        </div>
                    </div>
                    <div class="featured-offer-back">
                        <div id="featured-map4" class="featured-offer-map"></div>
                        <div class="button">
                            <a href="estate-details-right-sidebar.html" class="button-primary">
                                <span>read more</span>
                                <div class="button-triangle"></div>
                                <div class="button-triangle2"></div>
                                <div class="button-icon"><i class="fa fa-search"></i></div>
                            </a>
                        </div>
                    </div>

                </div>
                <div class="featured-offer-col">
                    <div class="featured-offer-front">
                        <div class="featured-offer-photo">
                            <img src="images\featured-offer5.jpg" alt="">
                            <div class="type-container">
                                <div class="estate-type">apartment</div>
                                <div class="transaction-type">{{ Lang::get('home.sale') }}</div>
                            </div>
                        </div>
                        <div class="featured-offer-text">
                            <h4 class="featured-offer-title">One Brookings Drive St. Louis, Missouri 63130-4899, USA</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        </div>
                        <div class="featured-offer-params">
                            <div class="featured-area">
                                <img src="images\area-icon.png" alt="">80m<sup>2</sup>
                            </div>
                            <div class="featured-rooms">
                                <img src="images\rooms-icon.png" alt="">3
                            </div>
                            <div class="featured-baths">
                                <img src="images\bathrooms-icon.png" alt="">1
                            </div>
                        </div>
                        <div class="featured-price">
                            $ 390 000
                        </div>
                    </div>
                    <div class="featured-offer-back">
                        <div id="featured-map5" class="featured-offer-map"></div>
                        <div class="button">
                            <a href="estate-details-right-sidebar.html" class="button-primary">
                                <span>read more</span>
                                <div class="button-triangle"></div>
                                <div class="button-triangle2"></div>
                                <div class="button-icon"><i class="fa fa-search"></i></div>
                            </a>
                        </div>
                    </div>

                </div>
                <div class="featured-offer-col">
                    <div class="featured-offer-front">
                        <div class="featured-offer-photo">
                            <img src="images\featured-offer6.jpg" alt="">
                            <div class="type-container">
                                <div class="estate-type">apartment</div>
                                <div class="transaction-type">{{ Lang::get('home.sale') }}</div>
                            </div>
                        </div>
                        <div class="featured-offer-text">
                            <h4 class="featured-offer-title">One Neumann Drive Aston, Philadelphia 19014-1298, USA</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
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
                        <div id="featured-map6" class="featured-offer-map"></div>
                        <div class="button">
                            <a href="estate-details-right-sidebar.html" class="button-primary">
                                <span>read more</span>
                                <div class="button-triangle"></div>
                                <div class="button-triangle2"></div>
                                <div class="button-icon"><i class="fa fa-search"></i></div>
                            </a>
                        </div>
                    </div>

                </div>
                <div class="featured-offer-col">
                    <div class="featured-offer-front">
                        <div class="featured-offer-photo">
                            <img src="images\featured-offer7.jpg" alt="">
                            <div class="type-container">
                                <div class="estate-type">{{  Lang::get('home.house') }}</div>
                                <div class="transaction-type">{{ Lang::get('home.sale') }}</div>
                            </div>
                        </div>
                        <div class="featured-offer-text">
                            <h4 class="featured-offer-title">200 South Dr, Fort Collins, Colorado 80523, USA</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
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
                        <div id="featured-map7" class="featured-offer-map"></div>
                        <div class="button">
                            <a href="estate-details-right-sidebar.html" class="button-primary">
                                <span>{{ Lang::get('home.read_more') }}</span>
                                <div class="button-triangle"></div>
                                <div class="button-triangle2"></div>
                                <div class="button-icon"><i class="fa fa-search"></i></div>
                            </a>
                        </div>
                    </div>

                </div>
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
   {{-- <section class="section-dark">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-lg-12">
                    <h5 class="subtitle-margin">latest from</h5>
                    <h1 class="">our blog<span class="special-color">.</span></h1>
                </div>

                <div class="col-xs-12">
                    <div class="title-separator-primary"></div>
                </div>
            </div>
        </div>
        <div class="container blog-grid1-container">
            <div class="row">
                <div class="col-md-12 col-lg-6 blog-grid1-left-col">
                    <article class="blog-grid1-item zoom-cont">
                        <figure class=""><a href="blog-right-sidebar.html"><img src="images\blog-grid1a.jpg" alt="" class="zoom"></a></figure>
                        <div class="blog-grid1-post-content">
                            <div class="blog-grid1-topline">
                                <div class="blog-grid1-author pull-left"><i class="fa fa-user"></i>Admin</div>
                                <div class="blog-grid1-date pull-right"><i class="fa fa-calendar-o"></i>28/09/15</div>
                                <div class="clearfix"></div>
                            </div>
                            <a href="blog-right-sidebar.html" class="blog-grid1-title"><h4>It’s much cheaper to buy than to rent</h4></a>
                            <div class="blog-grid1-separator"></div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et. Lorem ipsum dolor sit amet...</p>
                            <a href="blog-right-sidebar.html" class="blog-grid1-button">
                                <span>read more</span>
                                <div class="blog-grid1-triangle"></div>
                            </a>
                        </div>
                    </article>
                </div>
                <div class="col-md-12 col-lg-6 blog-grid1-right-col">
                    <article class="blog-grid1-item zoom-cont">
                        <figure class=""><a href="blog-right-sidebar.html"><img src="images\blog-grid1b.jpg" alt="" class="zoom"></a></figure>
                        <div class="blog-grid1-post-content">
                            <div class="blog-grid1-topline">
                                <div class="blog-grid1-author pull-left"><i class="fa fa-user"></i>Admin</div>
                                <div class="blog-grid1-date pull-right"><i class="fa fa-calendar-o"></i>28/09/15</div>
                                <div class="clearfix"></div>
                            </div>
                            <a href="blog-right-sidebar.html" class="blog-grid1-title"><h4>It’s much cheaper to buy than to rent</h4></a>
                            <div class="blog-grid1-separator"></div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et. Lorem ipsum dolor sit amet...</p>
                            <a href="blog-right-sidebar.html" class="blog-grid1-button">
                                <span>read more</span>
                                <div class="blog-grid1-triangle"></div>
                            </a>
                        </div>
                    </article>
                </div>
                <div class="col-md-12 col-lg-6 blog-grid1-left-col">
                    <article class="blog-grid1-item zoom-cont">
                        <div class="blog-grid1-post-content">
                            <div class="blog-grid1-topline">
                                <div class="blog-grid1-author pull-left"><i class="fa fa-user"></i>Admin</div>
                                <div class="blog-grid1-date pull-right"><i class="fa fa-calendar-o"></i>28/09/15</div>
                                <div class="clearfix"></div>
                            </div>
                            <a href="blog-right-sidebar.html" class="blog-grid1-title"><h4>It’s much cheaper to buy than to rent</h4></a>
                            <div class="blog-grid1-separator"></div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et. Lorem ipsum dolor sit amet...</p>
                            <a href="blog-right-sidebar.html" class="blog-grid1-button-right">
                                <span>read more</span>
                                <div class="blog-grid1-triangle"></div>
                            </a>
                        </div>
                        <figure class=""><a href="blog-right-sidebar.html"><img src="images\blog-grid1e.jpg" alt="" class="zoom"></a></figure>
                    </article>
                </div>
                <div class="col-md-12 col-lg-6 blog-grid1-right-col">
                    <article class="blog-grid1-item zoom-cont">
                        <div class="blog-grid1-post-content">
                            <div class="blog-grid1-topline">
                                <div class="blog-grid1-author pull-left"><i class="fa fa-user"></i>Admin</div>
                                <div class="blog-grid1-date pull-right"><i class="fa fa-calendar-o"></i>28/09/15</div>
                                <div class="clearfix"></div>
                            </div>
                            <a href="blog-right-sidebar.html" class="blog-grid1-title"><h4>It’s much cheaper to buy than to rent</h4></a>
                            <div class="blog-grid1-separator"></div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et. Lorem ipsum dolor sit amet...</p>
                            <a href="blog-right-sidebar.html" class="blog-grid1-button-right">
                                <span>read more</span>
                                <div class="blog-grid1-triangle"></div>
                            </a>
                        </div>
                        <figure class=""><a href="blog-right-sidebar.html"><img src="images\blog-grid1d.jpg" alt="" class="zoom"></a></figure>
                    </article>
                </div>
            </div>
        </div>
    </section>--}}
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

@endsection
@section('scripts')
    <script type="text/javascript">
        google.maps.event.addDomListener(window, 'load', init);
        function init() {

            mapInitAddress("narodowa 18 Pruszków","featured-map1","images/pin-house.png", false);

            //mapInit(40.6128,-73.7903,"featured-map1","images/pin-house.png", false);
            mapInit(40.7222,-73.7903,"featured-map2","/images/pin-apartment.png", false);
            mapInit(41.0306,-73.7669,"featured-map3","/images/pin-land.png", false);
            mapInit(41.3006,-72.9440,"featured-map4","/images/pin-commercial.png", false);
            mapInit(42.2418,-74.3626,"featured-map5","/images/pin-house.png", false);
            mapInit(38.8974,-77.0365,"featured-map6","/images/pin-apartment.png", false);
            mapInit(38.7860,-77.0129,"featured-map7","/images/pin-house.png", false);

            mapInit(41.2693,-70.0874,"grid-map1","images/pin-house.png", false);
            mapInit(33.7544,-84.3857,"grid-map2","images/pin-apartment.png", false);
            mapInit(33.7337,-84.4443,"grid-map3","images/pin-land.png", false);
            mapInit(33.8588,-84.4858,"grid-map4","images/pin-commercial.png", false);
            mapInit(34.0254,-84.3560,"grid-map5","images/pin-apartment.png", false);
            mapInit(40.6128,-73.9976,"grid-map6","images/pin-house.png", false);
        }

    </script>
    <script>
        $(document).ready(function () {
            $( "select[name='beds_baths']" ).selectpicker();
            $( "select[name='rent']" ).selectpicker();

            /*$('.appartament_search').click(function () {
                var datas = $('.apartament_form').serialize();
                var beds = $( "select[name='beds_baths']" ).val();
                console.log(beds);
                $.ajax({
                    type:'post',
                    url : '{{ route('searchListing') }}',
                    data: datas,
                    success:function (res) {

                    }
                })
            });
          
*/

            var defaultBounds = new google.maps.LatLngBounds(
                new google.maps.LatLng(-33.8902, 151.1759),
                new google.maps.LatLng(-33.8474, 151.2631));


            var input = document.getElementById('searchTextField');
            var options = {
                bounds: defaultBounds,
                types: ['establishment']
            };
            autocomplete = new google.maps.places.Autocomplete(input, options);

        })
    </script>
@endsection

