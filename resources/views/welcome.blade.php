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
        <div class="adv-search-cont" >
                <div class="container">
                    <div class="row">
                        <h1 class="h_p_h">
                            Find Home...No Matter Your Past
                        </h1>
                        <div class="col-lg-8 col-xs-12 col-lg-offset-2 adv-search-icons">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs adv-search-tabs" role="tablist" style="margin-bottom:16px ">
                                <li role="presentation" class="active" data-toggle="tooltip" data-placement="top" title=""><a href="#apartments" aria-controls="apartments" role="tab" data-toggle="tab" id="adv-search-tab1">{{ Lang::get('listing.appartament') }}</a></li>
                                <li role="presentation" data-toggle="tooltip" data-placement="top" title=""><a href="#houses" aria-controls="houses" role="tab" data-toggle="tab" id="adv-search-tab2">{{ Lang::get('listing.condo') }}</a></li>
                                <li role="presentation" data-toggle="tooltip" data-placement="top" title=""><a href="#commercials" aria-controls="commercials" role="tab" data-toggle="tab" id="adv-search-tab3">{{ Lang::get('listing.townhome') }}</a></li>
                                <li role="presentation" data-toggle="tooltip" data-placement="top" title=""><a href="#lands" aria-controls="lands" role="tab" data-toggle="tab" id="adv-search-tab4">{{ Lang::get('listing.single_home') }}</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-xs-12 col-lg-offset-2 " >
                            <div class="row tab-content" style="background: transparent">
                                <div role="tabpanel" class="adv-search-outer tab-pane fade in active" id="apartments">
                                    <form action="{{ route('searchListing') }}" class="apartament_form" method="get">
                                        {{ csrf_field()  }}
                                        <input type="hidden" name="wq-street_address" class="wq-street_address">
                                        <input type="hidden" name="wq-street_number" class="wq-street_number">
                                        <input type="hidden" name="wq-intersection" class="wq-intersection">
                                        <input type="hidden" name="wq-route" class="wq-route">
                                        <input type="hidden" name="wq-sublocality" class="wq-sublocality">
                                        <input type="hidden" name="wq-locality" class="wq-locality">
                                        <input type="hidden" name="wq-administrative_area_level_1" class="wq-administrative_area_level_1">
                                        <input type="hidden" name="wq-administrative_area_level_2" class="wq-administrative_area_level_2">
                                        <input type="hidden" name="wq-administrative_area_level_3" class="wq-administrative_area_level_3">
                                        <input type="hidden" name="wq-administrative_area_level_4" class="wq-administrative_area_level_4">
                                        <input type="hidden" name="wq-administrative_area_level_5" class="wq-administrative_area_level_5">
                                        <input type="hidden" name="wq-country" class="wq-country">
                                        <input type="hidden" name="wq-neighborhood" class="wq-neighborhood">
                                        <input type="hidden" name="listing_type" value="2">
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-12 col-lg-6" style="padding: 0px !important">
                                                <input id="autocomplete" class="input-full main-input"  value="{{ old('address') }}" onFocus="geolocate()" type="text" placeholder="{{ Lang::get('pages.e_n') }}" name="address">
                                                <table id="address" style="display: none">
                                                    <input class="field"  id="street_number" type="hidden">
                                                    <input class="field"  id="route" type="hidden">
                                                    <input class="field" id="locality" name="city"  type="hidden">
                                                    <input class="field" id="administrative_area_level_1" name="state" type="hidden">
                                                    <input class="field" id="postal_code"  type="hidden">
                                                    <input class="field"  id="country" type="hidden">
                                                </table>
                                                <div id="submit-property-map" style="display: none" class="submit-property-map"></div>
                                                <div class="row" style="display: none">
                                                    <div class="col-xs-12 col-sm-6 margin-top-15">
                                                        <input name="lng" type="text" class="input-full lng main-input input-last" placeholder="Longitude" readonly="readonly">
                                                    </div>
                                                    <div class="col-xs-12 col-sm-6 margin-top-15">
                                                        <input name="lat" type="text" class="input-full main-input lat input-last" placeholder="Latitude" readonly="readonly" value="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-xs-12" style="padding: 0px !important">
                                                <div class=" btn-group bootstrap-select show-tick  ">
                                                    <button id="min-max-price-range" class="btn dropdown-toggle btn-default " href="#" data-toggle="dropdown" style="text-align: left">{!! Lang::get('pages.r_e') !!}<strong class="caret"></strong>
                                                    </button>
                                                    <div class=" dropdown-menu col-sm-2" style="padding-top:10px;">
                                                        <div class="col-xs-6">
                                                            <input name="min" class="form-control price-label" placeholder="Min" data-dropdown-id="price-min"/>
                                                        </div>
                                                        <div class="col-xs-6">
                                                            <input name="max" class="form-control price-label" placeholder="Max" data-dropdown-id="price-max"/>
                                                        </div>
                                                        <div class="clearfix"></div>
                                                        <ul  id="price-min" class="   price-range list-unstyled">
                                                            <li data-value="500">
                                                                <span>$500</span>
                                                            </li>
                                                            <li data-value="700">
                                                                <span>$700</span></li>
                                                            <li data-value="900">
                                                                <span>$900</span></li>
                                                            <li data-value="1100">
                                                                <span>$1100</span></li>
                                                            <li data-value="1300">
                                                                <span>$1300</span></li>
                                                            <li data-value="1500">
                                                                <span>$1500</span>
                                                            </li>
                                                        </ul>
                                                        <ul  id="price-max" class="price-range text-right list-unstyled hide">
                                                            <li data-value="1500">
                                                                <span>$1500</span></li>
                                                            <li data-value="1700">
                                                                <span>$1700</span></li>
                                                            <li data-value="1900">
                                                                <span>$1900</span></li>
                                                            <li data-value="2100">
                                                                <span>$2100</span></li>
                                                            <li data-value="2300">
                                                                <span>$2300</span></li>
                                                            <li data-value="2500">
                                                                <span>$2500</span>
                                                            </li>
                                                            <li data-value="2500+">
                                                                <span>$2500+</span>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-lg-3 col-xs-12" style="padding: 0px !important">
                                                <select name="beds_baths[]" class="selectpicker" multiple="" title="{{ Lang::get('listing.beds') }} X {{ Lang::get('listing.baths') }}">
                                                    <optgroup label="{{ Lang::get('listing.beds') }}" data-max-options="1">

                                                        <option value="any_bed">Any Bed</option>
                                                        <option value="1">1 Bed</option>
                                                        <option value="2">2 {{ Lang::get('listing.beds') }}</option>
                                                        <option value="3">3 {{ Lang::get('listing.beds') }}</option>
                                                        <option value="4">4+  {{ Lang::get('listing.beds') }}</option>
                                                    </optgroup>
                                                    <optgroup label="{{ Lang::get('listing.baths') }}" data-max-options="1">

                                                        <option value="any_bath">Any Bath</option>
                                                        <option value="1">1+ {{ Lang::get('listing.baths') }}</option>
                                                        <option value="2">2+ {{ Lang::get('listing.baths') }}</option>
                                                        <option value="3">3+ {{ Lang::get('listing.baths') }}</option>
                                                    </optgroup>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12 col-md-6 col-xs-12 col-lg-12  adv-search-button-cont text-center    ">
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
                                    <form action="{{ route('searchListing') }}" class="apartament_form" >
                                        {{ csrf_field()  }}
                                        <input type="hidden" name="wq-street_address" class="wq-street_address">
                                        <input type="hidden" name="wq-street_number" class="wq-street_number">
                                        <input type="hidden" name="wq-intersection" class="wq-intersection">
                                        <input type="hidden" name="wq-route" class="wq-route">
                                        <input type="hidden" name="wq-sublocality" class="wq-sublocality">
                                        <input type="hidden" name="wq-locality" class="wq-locality">
                                        <input type="hidden" name="wq-administrative_area_level_1" class="wq-administrative_area_level_1">
                                        <input type="hidden" name="wq-administrative_area_level_2" class="wq-administrative_area_level_2">
                                        <input type="hidden" name="wq-administrative_area_level_3" class="wq-administrative_area_level_3">
                                        <input type="hidden" name="wq-administrative_area_level_4" class="wq-administrative_area_level_4">
                                        <input type="hidden" name="wq-administrative_area_level_5" class="wq-administrative_area_level_5">
                                        <input type="hidden" name="wq-country" class="wq-country">
                                        <input type="hidden" name="wq-neighborhood" class="wq-neighborhood">
                                        <input type="hidden" name="listing_type" value="7">
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-12 col-lg-6" style="padding: 0px !important">
                                                <input id="autocomplete1" class="input-full main-input"  value="{{ old('address') }}" onFocus="geolocate()" type="text" placeholder="{{ Lang::get('pages.e_n') }}" name="address">
                                                <table id="address" style="display: none">
                                                    <input class="field"  id="street_number" type="hidden">
                                                    <input class="field"  id="route" type="hidden">
                                                    <input class="field" id="locality" name="city"  type="hidden">
                                                    <input class="field" id="administrative_area_level_1" name="state" type="hidden">
                                                    <input class="field" id="postal_code"  type="hidden">
                                                    <input class="field"  id="country" type="hidden">
                                                </table>
                                                <div id="submit-property-map" style="display: none" class="submit-property-map"></div>
                                                <div class="row" style="display: none">
                                                    <div class="col-xs-12 col-sm-6 margin-top-15">
                                                        <input name="lng" type="text" class="input-full lng main-input input-last" placeholder="Longitude" readonly="readonly">
                                                    </div>
                                                    <div class="col-xs-12 col-sm-6 margin-top-15">
                                                        <input name="lat" type="text" class="input-full main-input lat input-last" placeholder="Latitude" readonly="readonly" value="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-xs-12" style="padding: 0px !important">
                                                <div class=" btn-group bootstrap-select show-tick  ">
                                                    <button id="min-max-price-range" class="btn dropdown-toggle btn-default " href="#" data-toggle="dropdown" style="text-align: left">{!! Lang::get('pages.r_e') !!}<strong class="caret"></strong>
                                                    </button>
                                                    <div class=" dropdown-menu col-sm-2" style="padding-top:10px;">
                                                        <div class="col-xs-6">
                                                            <input name="min" class="form-control price-label" placeholder="Min" data-dropdown-id="price-min1"/>
                                                        </div>
                                                        <div class="col-xs-6">
                                                            <input name="max" class="form-control price-label" placeholder="Max" data-dropdown-id="price-max1"/>
                                                        </div>
                                                        <div class="clearfix"></div>
                                                        <ul  id="price-min1" class="   price-range list-unstyled">
                                                            <li data-value="500">
                                                                <span>$500</span>
                                                            </li>
                                                            <li data-value="700">
                                                                <span>$700</span></li>
                                                            <li data-value="900">
                                                                <span>$900</span></li>
                                                            <li data-value="1100">
                                                                <span>$1100</span></li>
                                                            <li data-value="1300">
                                                                <span>$1300</span></li>
                                                            <li data-value="1500">
                                                                <span>$1500</span>
                                                            </li>
                                                        </ul>
                                                        <ul  id="price-max1" class="price-range text-right list-unstyled hide">
                                                            <li data-value="1500">
                                                                <span>$1500</span></li>
                                                            <li data-value="1700">
                                                                <span>$1700</span></li>
                                                            <li data-value="1900">
                                                                <span>$1900</span></li>
                                                            <li data-value="2100">
                                                                <span>$2100</span></li>
                                                            <li data-value="2300">
                                                                <span>$2300</span></li>
                                                            <li data-value="2500">
                                                                <span>$2500</span>
                                                            </li>
                                                            <li data-value="2500+">
                                                                <span>$2500+</span>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-lg-3 col-xs-12" style="padding: 0px !important">
                                                <select name="beds_baths[]" class="selectpicker" multiple="" title="{{ Lang::get('listing.beds') }} X {{ Lang::get('listing.baths') }}">
                                                    <optgroup label="{{ Lang::get('listing.beds') }}" data-max-options="1">

                                                        <option value="any_bed">Any Bed</option>
                                                        <option value="1">1 Bed</option>
                                                        <option value="2">2 {{ Lang::get('listing.beds') }}</option>
                                                        <option value="3">3 {{ Lang::get('listing.beds') }}</option>
                                                        <option value="4">4+  {{ Lang::get('listing.beds') }}</option>
                                                    </optgroup>
                                                    <optgroup label="{{ Lang::get('listing.baths') }}" data-max-options="1">

                                                        <option value="any_bath">Any Bath</option>
                                                        <option value="1">1+ {{ Lang::get('listing.baths') }}</option>
                                                        <option value="2">2+ {{ Lang::get('listing.baths') }}</option>
                                                        <option value="3">3+ {{ Lang::get('listing.baths') }}</option>
                                                    </optgroup>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12 col-md-6 col-xs-12 col-lg-12  adv-search-button-cont text-center    ">
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
                                    <form action="{{ route('searchListing') }}" class="apartament_form" >
                                        {{ csrf_field()  }}
                                        <input type="hidden" name="wq-street_address" class="wq-street_address">
                                        <input type="hidden" name="wq-street_number" class="wq-street_number">
                                        <input type="hidden" name="wq-intersection" class="wq-intersection">
                                        <input type="hidden" name="wq-route" class="wq-route">
                                        <input type="hidden" name="wq-sublocality" class="wq-sublocality">
                                        <input type="hidden" name="wq-locality" class="wq-locality">
                                        <input type="hidden" name="wq-administrative_area_level_1" class="wq-administrative_area_level_1">
                                        <input type="hidden" name="wq-administrative_area_level_2" class="wq-administrative_area_level_2">
                                        <input type="hidden" name="wq-administrative_area_level_3" class="wq-administrative_area_level_3">
                                        <input type="hidden" name="wq-administrative_area_level_4" class="wq-administrative_area_level_4">
                                        <input type="hidden" name="wq-administrative_area_level_5" class="wq-administrative_area_level_5">
                                        <input type="hidden" name="wq-country" class="wq-country">
                                        <input type="hidden" name="wq-neighborhood" class="wq-neighborhood">
                                        <input type="hidden" name="listing_type" value="5">
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-12 col-lg-6" style="padding: 0px !important">
                                                <input id="autocomplete2" class="input-full main-input"  value="{{ old('address') }}" onFocus="geolocate()" type="text" placeholder="{{ Lang::get('pages.e_n') }}" name="address">
                                                <table id="address" style="display: none">
                                                    <input class="field"  id="street_number" type="hidden">
                                                    <input class="field"  id="route" type="hidden">
                                                    <input class="field" id="locality" name="city"  type="hidden">
                                                    <input class="field" id="administrative_area_level_1" name="state" type="hidden">
                                                    <input class="field" id="postal_code"  type="hidden">
                                                    <input class="field"  id="country" type="hidden">
                                                </table>
                                                <div id="submit-property-map" style="display: none" class="submit-property-map"></div>
                                                <div class="row" style="display: none">
                                                    <div class="col-xs-12 col-sm-6 margin-top-15">
                                                        <input name="lng" type="text" class="input-full lng main-input input-last" placeholder="Longitude" readonly="readonly">
                                                    </div>
                                                    <div class="col-xs-12 col-sm-6 margin-top-15">
                                                        <input name="lat" type="text" class="input-full main-input lat input-last" placeholder="Latitude" readonly="readonly" value="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-xs-12" style="padding: 0px !important">
                                                <div class=" btn-group bootstrap-select show-tick  ">
                                                    <button id="min-max-price-range" class="btn dropdown-toggle btn-default " href="#" data-toggle="dropdown" style="text-align: left">{!! Lang::get('pages.r_e') !!}<strong class="caret"></strong>
                                                    </button>
                                                    <div class=" dropdown-menu col-sm-2" style="padding-top:10px;">
                                                        <div class="col-xs-6">
                                                            <input name="min" class="form-control price-label" placeholder="Min" data-dropdown-id="price-min2"/>
                                                        </div>
                                                        <div class="col-xs-6">
                                                            <input name="max" class="form-control price-label" placeholder="Max" data-dropdown-id="price-max2"/>
                                                        </div>
                                                        <div class="clearfix"></div>
                                                        <ul  id="price-min2" class="   price-range list-unstyled">
                                                            <li data-value="500">
                                                                <span>$500</span>
                                                            </li>
                                                            <li data-value="700">
                                                                <span>$700</span></li>
                                                            <li data-value="900">
                                                                <span>$900</span></li>
                                                            <li data-value="1100">
                                                                <span>$1100</span></li>
                                                            <li data-value="1300">
                                                                <span>$1300</span></li>
                                                            <li data-value="1500">
                                                                <span>$1500</span>
                                                            </li>
                                                        </ul>
                                                        <ul  id="price-max2" class="price-range text-right list-unstyled hide">
                                                            <li data-value="1500">
                                                                <span>$1500</span></li>
                                                            <li data-value="1700">
                                                                <span>$1700</span></li>
                                                            <li data-value="1900">
                                                                <span>$1900</span></li>
                                                            <li data-value="2100">
                                                                <span>$2100</span></li>
                                                            <li data-value="2300">
                                                                <span>$2300</span></li>
                                                            <li data-value="2500">
                                                                <span>$2500</span>
                                                            </li>
                                                            <li data-value="2500+">
                                                                <span>$2500+</span>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-lg-3 col-xs-12" style="padding: 0px !important">
                                                <select name="beds_baths[]" class="selectpicker" multiple="" title="{{ Lang::get('listing.beds') }} X {{ Lang::get('listing.baths') }}">
                                                    <optgroup label="{{ Lang::get('listing.beds') }}" data-max-options="1">

                                                        <option value="any_bed">Any Bed</option>
                                                        <option value="1">1 Bed</option>
                                                        <option value="2">2 {{ Lang::get('listing.beds') }}</option>
                                                        <option value="3">3 {{ Lang::get('listing.beds') }}</option>
                                                        <option value="4">4+  {{ Lang::get('listing.beds') }}</option>
                                                    </optgroup>
                                                    <optgroup label="{{ Lang::get('listing.baths') }}" data-max-options="1">

                                                        <option value="any_bath">Any Bath</option>
                                                        <option value="1">1+ {{ Lang::get('listing.baths') }}</option>
                                                        <option value="2">2+ {{ Lang::get('listing.baths') }}</option>
                                                        <option value="3">3+ {{ Lang::get('listing.baths') }}</option>
                                                    </optgroup>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12 col-md-6 col-xs-12 col-lg-12  adv-search-button-cont text-center    ">
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
                                    <form action="{{ route('searchListing') }}" class="apartament_form" >
                                        <input type="hidden" name="wq-street_address" class="wq-street_address">
                                        <input type="hidden" name="wq-street_number" class="wq-street_number">
                                        <input type="hidden" name="wq-intersection" class="wq-intersection">
                                        <input type="hidden" name="wq-route" class="wq-route">
                                        <input type="hidden" name="wq-sublocality" class="wq-sublocality">
                                        <input type="hidden" name="wq-locality" class="wq-locality">
                                        <input type="hidden" name="wq-administrative_area_level_1" class="wq-administrative_area_level_1">
                                        <input type="hidden" name="wq-administrative_area_level_2" class="wq-administrative_area_level_2">
                                        <input type="hidden" name="wq-administrative_area_level_3" class="wq-administrative_area_level_3">
                                        <input type="hidden" name="wq-administrative_area_level_4" class="wq-administrative_area_level_4">
                                        <input type="hidden" name="wq-administrative_area_level_5" class="wq-administrative_area_level_5">
                                        <input type="hidden" name="wq-country" class="wq-country">
                                        <input type="hidden" name="wq-neighborhood" class="wq-neighborhood">
                                        {{ csrf_field()  }}
                                        <input type="hidden" name="listing_type" value="3">
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-12 col-lg-6" style="padding: 0px !important">
                                                <input id="autocomplete3" class="input-full main-input"  value="{{ old('address') }}" onFocus="geolocate()" type="text" placeholder="{{ Lang::get('pages.e_n') }}" name="address">
                                                <table id="address" style="display: none">
                                                    <input class="field"  id="street_number" type="hidden">
                                                    <input class="field"  id="route" type="hidden">
                                                    <input class="field" id="locality" name="city"  type="hidden">
                                                    <input class="field" id="administrative_area_level_1" name="state" type="hidden">
                                                    <input class="field" id="postal_code"  type="hidden">
                                                    <input class="field"  id="country" type="hidden">
                                                </table>
                                                <div id="submit-property-map" style="display: none" class="submit-property-map"></div>
                                                <div class="row" style="display: none">
                                                    <div class="col-xs-12 col-sm-6 margin-top-15">
                                                        <input name="lng" type="text" class="input-full lng main-input input-last" placeholder="Longitude" readonly="readonly">
                                                    </div>
                                                    <div class="col-xs-12 col-sm-6 margin-top-15">
                                                        <input name="lat" type="text" class="input-full main-input lat input-last" placeholder="Latitude" readonly="readonly" value="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-xs-12" style="padding: 0px !important">
                                                <div class=" btn-group bootstrap-select show-tick  ">
                                                    <button id="min-max-price-range" class="btn dropdown-toggle btn-default " href="#" data-toggle="dropdown" style="text-align: left">{!! Lang::get('pages.r_e') !!}<strong class="caret"></strong>
                                                    </button>
                                                    <div class=" dropdown-menu col-sm-2" style="padding-top:10px;">
                                                        <div class="col-xs-6">
                                                            <input name="min" class="form-control price-label" placeholder="Min" data-dropdown-id="price-min3"/>
                                                        </div>
                                                        <div class="col-xs-6">
                                                            <input name="max" class="form-control price-label" placeholder="Max" data-dropdown-id="price-max3"/>
                                                        </div>
                                                        <div class="clearfix"></div>
                                                        <ul  id="price-min3" class="   price-range list-unstyled">
                                                            <li data-value="500">
                                                                <span>$500</span>
                                                            </li>
                                                            <li data-value="700">
                                                                <span>$700</span></li>
                                                            <li data-value="900">
                                                                <span>$900</span></li>
                                                            <li data-value="1100">
                                                                <span>$1100</span></li>
                                                            <li data-value="1300">
                                                                <span>$1300</span></li>
                                                            <li data-value="1500">
                                                                <span>$1500</span>
                                                            </li>
                                                        </ul>
                                                        <ul  id="price-max3" class="price-range text-right list-unstyled hide">
                                                            <li data-value="1500">
                                                                <span>$1500</span></li>
                                                            <li data-value="1700">
                                                                <span>$1700</span></li>
                                                            <li data-value="1900">
                                                                <span>$1900</span></li>
                                                            <li data-value="2100">
                                                                <span>$2100</span></li>
                                                            <li data-value="2300">
                                                                <span>$2300</span></li>
                                                            <li data-value="2500">
                                                                <span>$2500</span>
                                                            </li>
                                                            <li data-value="2500+">
                                                                <span>$2500+</span>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-lg-3 col-xs-12" style="padding: 0px !important">
                                                <select name="beds_baths[]" class="selectpicker" multiple="" title="{{ Lang::get('listing.beds') }} X {{ Lang::get('listing.baths') }}">
                                                    <optgroup label="{{ Lang::get('listing.beds') }}" data-max-options="1">
                                                        <option value="any_bed">Any Bed</option>
                                                        <option value="1">1 Bed</option>
                                                        <option value="2">2 {{ Lang::get('listing.beds') }}</option>
                                                        <option value="3">3 {{ Lang::get('listing.beds') }}</option>
                                                        <option value="4">4+  {{ Lang::get('listing.beds') }}</option>
                                                    </optgroup>
                                                    <optgroup label="{{ Lang::get('listing.baths') }}" data-max-options="1">
                                                        <option value="any_bath">Any Bath</option>
                                                        <option value="1">1+ {{ Lang::get('listing.baths') }}</option>
                                                        <option value="2">2+ {{ Lang::get('listing.baths') }}</option>
                                                        <option value="3">3+ {{ Lang::get('listing.baths') }}</option>
                                                    </optgroup>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12 col-md-6 col-xs-12 col-lg-12  adv-search-button-cont text-center    ">
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
                </div>
            </div>
        <div class="transparend_bottom">
            <div class="btn-group gouped_button ">
                <a href="#" class="button-alternative new_class_button">
                        <span>{{ Lang::get('pages.m_u') }}</span>
                    </a>
                <a href="#" class="button-alternative new_class_button">
                        <span>{{ Lang::get('pages.b_ac') }}</span>
                    </a>
                <a href="#" class="button-alternative new_class_button">
                        <span>{{ Lang::get('pages.b_r') }}</span>
                    </a>
                <a href="#" class="button-alternative new_class_button">
                        <span>{{ Lang::get('pages.e_v') }}</span>
                    </a>
                <a href="#" class="button-alternative new_class_button">
                        <span>{{ Lang::get('pages.f_ic') }}</span>
                    </a>
                <a href="#" class="button-alternative new_class_button">
                        <span>{{ Lang::get('pages.b_acc') }}</span>
                    </a>
                <a href="#" class="button-alternative new_class_button">
                        <span>{{ Lang::get('pages.f_o') }}</span>
                    </a>
                <a href="#" class="button-alternative new_class_button">
                        <span>{{ Lang::get('pages.b_sa') }}</span>
                    </a>
            </div>
        </div>
    </section>
    <section class="section-light bottom-padding-45 section-both-shadow" style="padding-top: 50px">
        <div class="container">
            <div class="row margin-top-60">
                <div class="col-xs-12 col-sm-12 col-lg-12">
                    <h1 class="special-color subtitle-margin">2nd Chance Leasing<span class="special-color">.</span></h1>
                    <h3 class="subtitle-margin" style="font-weight: lighter">{{ Lang::get('pages.home_big') }}</h3>
                    <div class="title-separator-secondary"></div>
                    <br>
                    <br>
                    <p class="chance_p">
                        {!!  Lang::get('pages.home_big_2') !!}
                    </p>
                </div>
            </div>
            <div class="row margin-top-60">
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
                                    @if($lis->ListingsImages()->where('featured', "1")->first())
                                        <img src="{{ asset('assets/images').'/'.$lis->ListingsImages()->whereNotNull('featured')->first()->image }}" alt="">
                                    @else
                                        <img src="{{ asset('images/featured-offer7.jpg') }}" alt="">
                                    @endif
                                </div>
                                <div class="featured-offer-text">
                                    <h4 class="featured-offer-title"><i class=" fa fa-map-marker"></i>  {{ $lis->name }}</h4>
                                    <p>{{ str_limit($lis->description , 150) }}</p>
                                </div>
                                <a href="{{ route('singleListing' , ['id' => $lis->id  , 'title' => $lis->title]) }}" class="button-primary">
                                    <span>{{ Lang::get('home.read_more') }}</span>
                                    <div class="button-triangle"></div>
                                    <div class="button-triangle2"></div>
                                    <div class="button-icon"><i class="fa fa-search"></i></div>
                                </a>
                            </div>
                            <div class="featured-offer-back">
                                <div id="featured-map{{$count}}" class="featured-offer-map"></div>
                                <div class="button">
                                    <a href="{{ route('singleListing' , ['id' => $lis->id  , 'title' => $lis->title]) }}" class="button-primary">
                                        <span>{{ Lang::get('home.read_more') }}</span>
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


    <section class="section-light top-padding-45 bottom-padding-45">
        <div class="container">
            <div class="row count-container">
                <div class="col-xs-6 col-lg-3">
                    <div class="number" id="number1">
                        <div class="number-img">
                            <i class="fa fa-building"></i>
                        </div>
                        <span class="number-label text-color2">{{ Lang::get('listing.appartament') }}</span>
                        <span class="number-big text-color3 count" data-from="0" data-to="{{ count(App\ListingAttribute::where('listing_type'  , '2')->get()->toArray()) }}" data-speed="2000"></span>
                    </div>
                </div>
                <div class="col-xs-6 col-lg-3 number_border">
                    <div class="number" id="number2">
                        <div class="number-img">
                            <i class="fa fa-home"></i>
                        </div>
                        <span class="number-label text-color2">{{ Lang::get('listing.condo') }}</span>
                        <span class="number-big text-color3 count" data-from="0" data-to="{{ count(App\ListingAttribute::where('listing_type'  , '7')->get()->toArray()) }}" data-speed="2000"></span>
                    </div>
                </div>
                <div class="col-xs-6 col-lg-3 number_border3">
                    <div class="number" id="number3">
                        <div class="number-img">
                            <i class="fa fa-industry"></i>
                        </div>
                        <span class="number-label text-color2">{{ Lang::get('listing.townhome') }}</span>
                        <span class="number-big text-color3 count" data-from="0" data-to="{{ count(App\ListingAttribute::where('listing_type'  , '5')->get()->toArray()) }}" data-speed="2000"></span>
                    </div>
                </div>
                <div class="col-xs-6 col-lg-3 number_border">
                    <div class="number" id="number4">
                        <div class="number-img">
                            <i class="fa fa-tree"></i>
                        </div>
                        <span class="number-label text-color2">{{ Lang::get('listing.single_home') }}</span>
                        <span class="number-big text-color3 count" data-from="0" data-to="{{ count(App\ListingAttribute::where('listing_type'  , '3')->get()->toArray()) }}" data-speed="2000"></span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div style="display: none">{{ $counts = 1 }}</div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function () {
            $( "select[name='beds_baths']" ).selectpicker();
            $( "select[name='rent']" ).selectpicker();
            $('#min-max-price-range').click(function (event) {
                setTimeout(function(){ $('.price-label').first().focus();	},0);
            });
            var priceLabelObj;
            $('.price-label').bind("mouseenter focus mouseleave", function (event) {
                priceLabelObj = $(this);
                $('.price-range').addClass('hide');
                $('#'+$(this).data('dropdownId')).removeClass('hide');
            });

            $(".price-range li").click(function(){
                if(!priceLabelObj){
                    $(".price-label").get(0).focus()
                }
                priceLabelObj.attr('value', $(this).attr('data-value'));
                var curElmIndex=$( ".price-label" ).index( priceLabelObj );
                var nextElm=$( ".price-label" ).eq(curElmIndex+1);

                if(curElmIndex == 0){
                    $('.minp').text('$' + priceLabelObj.val() + '-');
                }else if(curElmIndex == 1){
                    $('.maxp').text('$' + priceLabelObj.val());
                }
                if(curElmIndex == 2){
                    $('.minp').text('$' + priceLabelObj.val() + '-');
                }else if(curElmIndex == 3){
                    $('.maxp').text('$' + priceLabelObj.val());
                }
                if(curElmIndex == 4){
                    $('.minp').text('$' + priceLabelObj.val() + '-');
                }else if(curElmIndex == 5){
                    $('.maxp').text('$' + priceLabelObj.val());
                }
                if(curElmIndex == 6){
                    $('.minp').text('$' + priceLabelObj.val() + '-');
                }else if(curElmIndex == 7){
                    $('.maxp').text('$' + priceLabelObj.val());
                }

                if(nextElm.length){
                    $( ".price-label" ).eq(curElmIndex+1).focus();
                }else{
                    $('#min-max-price-range').dropdown('toggle');
                }
            });
        })
    </script>
    <script type="text/javascript">
        google.maps.event.addDomListener(window, 'load', init);
        function init() {
            @foreach($listing as $lis)
                mapInitAddress("{{ $lis->address }}","featured-map{{$counts++}}","images/pin-house.png", false);
            @endforeach
        }

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
            autocomplete1 = new google.maps.places.Autocomplete(
                /** @type {!HTMLInputElement} */(document.getElementById('autocomplete1')),
                {types: ['geocode']});
            autocomplete2 = new google.maps.places.Autocomplete(
                /** @type {!HTMLInputElement} */(document.getElementById('autocomplete2')),
                {types: ['geocode']});
            autocomplete3 = new google.maps.places.Autocomplete(
                /** @type {!HTMLInputElement} */(document.getElementById('autocomplete3')),
                {types: ['geocode']});

            // When the user selects an address from the dropdown, populate the address
            // fields in the form.
            autocomplete.addListener('place_changed', fillInAddress);
            autocomplete1.addListener('place_changed', fillInAddressOne);
            autocomplete2.addListener('place_changed', fillInAddressSecond);
            autocomplete3.addListener('place_changed', fillInAddressThird);
        }

        function fillInAddress() {
            // Get the place details from the autocomplete object.
            var place = autocomplete.getPlace();
            //console.log(place.address_components)
            $.each(place.address_components, function (i, v) {
                if(v.types[0] == 'street_address'){
                    $(".wq-street_address").val(v.long_name)
                }if(v.types[0] == 'street_number'){
                    $(".wq-street_number").val(v.long_name)
                }if(v.types[0] == 'intersection'){
                    $(".wq-intersection").val(v.long_name)
                }if(v.types[0] == 'route'){
                    $(".wq-route").val(v.long_name)
                }if(v.types[0] == 'sublocality'){
                    $(".wq-sublocality").val(v.long_name)
                }
                if(v.types[0] == 'locality'){
                    $("input[name=city]").val(v.long_name)
                    $(".wq-locality").val(v.long_name)
                }if(v.types[0] == 'administrative_area_level_1'){
                    $("input[name=state]").val(v.long_name)
                    $(".wq-administrative_area_level_1").val(v.long_name)
                }if(v.types[0] == 'administrative_area_level_2'){
                    $(".wq-administrative_area_level_2").val(v.long_name)
                }if(v.types[0] == 'administrative_area_level_3'){
                    $(".wq-administrative_area_level_3").val(v.long_name)
                }if(v.types[0] == 'administrative_area_level_4'){
                    $(".wq-administrative_area_level_4").val(v.long_name)
                }if(v.types[0] == 'administrative_area_level_5'){
                    $(".wq-administrative_area_level_5").val(v.long_name)
                }if(v.types[0] == 'country') {
                    $(".wq-country").val(v.long_name)
                }if(v.types[0] == 'neighborhood') {
                    $(".wq-neighborhood").val(v.long_name)
                }if(v.types[0] == 'postal_code'){
                    $("input[name=zip_code]").val(v.long_name)
                }

            });
            $('.lat').attr("value", place.geometry.location.lat());
            $('.lng').attr("value", place.geometry.location.lng());
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

        function fillInAddressOne() {
            // Get the place details from the autocomplete object.
            var place = autocomplete1.getPlace();
            //console.log(place.address_components)
            $.each(place.address_components, function (i, v) {
                if(v.types[0] == 'street_address'){
                    $(".wq-street_address").val(v.long_name)
                }if(v.types[0] == 'street_number'){
                    $(".wq-street_number").val(v.long_name)
                }if(v.types[0] == 'intersection'){
                    $(".wq-intersection").val(v.long_name)
                }if(v.types[0] == 'route'){
                    $(".wq-route").val(v.long_name)
                }if(v.types[0] == 'sublocality'){
                    $(".wq-sublocality").val(v.long_name)
                }
                if(v.types[0] == 'locality'){
                    $("input[name=city]").val(v.long_name)
                    $(".wq-locality").val(v.long_name)
                }if(v.types[0] == 'administrative_area_level_1'){
                    $("input[name=state]").val(v.long_name)
                    $(".wq-administrative_area_level_1").val(v.long_name)
                }if(v.types[0] == 'administrative_area_level_2'){
                    $(".wq-administrative_area_level_2").val(v.long_name)
                }if(v.types[0] == 'administrative_area_level_3'){
                    $(".wq-administrative_area_level_3").val(v.long_name)
                }if(v.types[0] == 'administrative_area_level_4'){
                    $(".wq-administrative_area_level_4").val(v.long_name)
                }if(v.types[0] == 'administrative_area_level_5'){
                    $(".wq-administrative_area_level_5").val(v.long_name)
                }if(v.types[0] == 'country') {
                    $(".wq-country").val(v.long_name)
                }if(v.types[0] == 'neighborhood') {
                    $(".wq-neighborhood").val(v.long_name)
                }if(v.types[0] == 'postal_code'){
                    $("input[name=zip_code]").val(v.long_name)
                }

            });
            $('.lat').attr("value", place.geometry.location.lat());
            $('.lng').attr("value", place.geometry.location.lng());
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

        function fillInAddressSecond() {
            // Get the place details from the autocomplete object.
            var place = autocomplete2.getPlace();
            //console.log(place.address_components)
            $.each(place.address_components, function (i, v) {
                if(v.types[0] == 'street_address'){
                    $(".wq-street_address").val(v.long_name)
                }if(v.types[0] == 'street_number'){
                    $(".wq-street_number").val(v.long_name)
                }if(v.types[0] == 'intersection'){
                    $(".wq-intersection").val(v.long_name)
                }if(v.types[0] == 'route'){
                    $(".wq-route").val(v.long_name)
                }if(v.types[0] == 'sublocality'){
                    $(".wq-sublocality").val(v.long_name)
                }
                if(v.types[0] == 'locality'){
                    $("input[name=city]").val(v.long_name)
                    $(".wq-locality").val(v.long_name)
                }if(v.types[0] == 'administrative_area_level_1'){
                    $("input[name=state]").val(v.long_name)
                    $(".wq-administrative_area_level_1").val(v.long_name)
                }if(v.types[0] == 'administrative_area_level_2'){
                    $(".wq-administrative_area_level_2").val(v.long_name)
                }if(v.types[0] == 'administrative_area_level_3'){
                    $(".wq-administrative_area_level_3").val(v.long_name)
                }if(v.types[0] == 'administrative_area_level_4'){
                    $(".wq-administrative_area_level_4").val(v.long_name)
                }if(v.types[0] == 'administrative_area_level_5'){
                    $(".wq-administrative_area_level_5").val(v.long_name)
                }if(v.types[0] == 'country') {
                    $(".wq-country").val(v.long_name)
                }if(v.types[0] == 'neighborhood') {
                    $(".wq-neighborhood").val(v.long_name)
                }if(v.types[0] == 'postal_code'){
                    $("input[name=zip_code]").val(v.long_name)
                }

            });
            $('.lat').attr("value", place.geometry.location.lat());
            $('.lng').attr("value", place.geometry.location.lng());
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

        function fillInAddressThird() {
            // Get the place details from the autocomplete object.
            var place = autocomplete3.getPlace();
            //console.log(place.address_components)
            $.each(place.address_components, function (i, v) {
                if(v.types[0] == 'street_address'){
                    $(".wq-street_address").val(v.long_name)
                }if(v.types[0] == 'street_number'){
                    $(".wq-street_number").val(v.long_name)
                }if(v.types[0] == 'intersection'){
                    $(".wq-intersection").val(v.long_name)
                }if(v.types[0] == 'route'){
                    $(".wq-route").val(v.long_name)
                }if(v.types[0] == 'sublocality'){
                    $(".wq-sublocality").val(v.long_name)
                }
                if(v.types[0] == 'locality'){
                    $("input[name=city]").val(v.long_name)
                    $(".wq-locality").val(v.long_name)
                }if(v.types[0] == 'administrative_area_level_1'){
                    $("input[name=state]").val(v.long_name)
                    $(".wq-administrative_area_level_1").val(v.long_name)
                }if(v.types[0] == 'administrative_area_level_2'){
                    $(".wq-administrative_area_level_2").val(v.long_name)
                }if(v.types[0] == 'administrative_area_level_3'){
                    $(".wq-administrative_area_level_3").val(v.long_name)
                }if(v.types[0] == 'administrative_area_level_4'){
                    $(".wq-administrative_area_level_4").val(v.long_name)
                }if(v.types[0] == 'administrative_area_level_5'){
                    $(".wq-administrative_area_level_5").val(v.long_name)
                }if(v.types[0] == 'country') {
                    $(".wq-country").val(v.long_name)
                }if(v.types[0] == 'neighborhood') {
                    $(".wq-neighborhood").val(v.long_name)
                }if(v.types[0] == 'postal_code'){
                    $("input[name=zip_code]").val(v.long_name)
                }

            });
            $('.lat').attr("value", place.geometry.location.lat());
            $('.lng').attr("value", place.geometry.location.lng());
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
@endsection

