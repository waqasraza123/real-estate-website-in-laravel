@extends('layouts.app')
<style>
    .polygon {
        position: absolute;
        right: 73px;
        top: 11px;
        padding: 5px;
        background: rgba(0, 0, 0, 0.4);
        z-index: 999999;
        text-align: -webkit-center;
        color: white;
        cursor: pointer;
        line-height: 22px;
    }
    .polygon i {
        line-height: 22px;
    }

    .erease{
        right: 20px;
        top: 105px;
        display: none;
        position: absolute;
        padding: 5px;
        background: rgba(0, 0, 0, 0.4);
        z-index: 999999;
        text-align: -webkit-center;
        color: white;
        cursor: pointer;
        line-height: 22px;
    }
</style>
@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="white_bg" style="background: white; padding-left: 20px; padding-right: 20px">
                <div class="row">
                        <div class="success-box margin-top-30" style="display: none">
                            <p>Successfully saved</p>
                            <div class="small-triangle"></div>
                            <div class="small-icon"><i class="jfont"></i></div>
                        </div>
                    <div class="col-xs-12 col-lg-10">
                        <form action="{{ route('searchListing') }}" class="apartament_form " method="get" style="margin-bottom: 0px">
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
                                <br>
                                <div class="col-xs-12 col-sm-6 col-lg-2">
                                    <input id="autocomplete" class="input-full main-input"  value="" onFocus="geolocate()" type="text" placeholder="{{ Lang::get('listing.address') }}" name="address">
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
                                            <input name="lat" type="text" class="input-full lat main-input input-last" placeholder="Latitude" readonly="readonly">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-xs-12 form-">
                                    <div class="dropdown btn-group bootstrap-select show-tick  ">
                                        <button id="min-max-price-range" class="btn dropdown-toggle btn-default " href="#" data-toggle="dropdown" style="text-align: left">{!!  Lang::get('pages.r_e') !!}<strong class="caret"></strong>
                                        </button>
                                        <div class="dropdown-menu col-sm-2" style="padding-top:10px;">
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
                                            <ul  id="price-max" class="   price-range text-right list-unstyled hide">
                                                <li data-value="1500">
                                                    <span>$1500</span></li>
                                                <li data-value="1700">
                                                    <span>$1700</span></li>
                                                <li data-value="1900">
                                                    <span>$1900</span></li>
                                                <li data-value="2100">
                                                    <span>$2100</span></li>
                                                <li data-value="2300">
                                                    <span>$2300</span>
                                                </li>
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
                                <div class="col-lg-8 col-xs-12">
                                    <div class="row">
                                        <div class="col-lg-3 col-xs-12">
                                            <select name="beds_baths[]" class="selectpicker" multiple="" title="{{ Lang::get('listing.beds') }} X {{ Lang::get('listing.baths') }}">
                                                <optgroup label="{{ Lang::get('listing.beds') }}" data-max-options="1">
                                                    <option value="all">{{ Lang::get('home.all_be') }}</option>
                                                    <option value="any_bed">Any Bed</option>
                                                    <option value="1">1 Bed</option>
                                                    <option value="2">2 {{ Lang::get('listing.beds') }}</option>
                                                    <option value="3">3 {{ Lang::get('listing.beds') }}</option>
                                                    <option value="4">4+  {{ Lang::get('listing.beds') }}</option>
                                                </optgroup>
                                                <optgroup label="{{ Lang::get('listing.baths') }}" data-max-options="1">
                                                    <option value="all_baths">{{ Lang::get('home.all_ba') }}</option>
                                                    <option value="any_bath">Any Bath</option>
                                                    <option value="1">1+ {{ Lang::get('listing.baths') }}</option>
                                                    <option value="2">2+ {{ Lang::get('listing.baths') }}</option>
                                                    <option value="3">3+ {{ Lang::get('listing.baths') }}</option>
                                                </optgroup>
                                            </select>
                                        </div>
                                        <div class="col-lg-3 col-xs-12">
                                            <a href="#" class="boldet_link ">
                                                {{ Lang::get('pages.f_is') }}
                                            </a>
                                        </div>
                                        <div class="col-sm-12 col-md-6 col-lg-3 col-xs-12 text-center  adv-search-button-cont">
                                            <button type="submit" class="button-primary  appartament_search">
                                                <span>{{ Lang::get('home.search_btn') }}</span>
                                                <div class="button-triangle"></div>
                                                <div class="button-triangle2"></div>
                                                <div class="button-icon"><i class="fa fa-search"></i></div>
                                            </button>
                                        </div>
                                        <div class="col-sm-12 col-md-6 col-lg-3 col-xs-12 text-center  adv-search-button-cont">
                                            <button type="submit" class="button-primary  pull-rigth appartament_search"> {{ Lang::get('pages.s_s') }}
                                                <div class="button-triangle"></div>
                                                <div class="button-triangle2"></div>
                                                <div class="button-icon"><i class="fa fa-search-plus"></i></div>
                                            </button>

                                        </div>
                                        @if(Request::path() == 'filter_listings')
                                            <div class="col-lg-1">
                                                <a href="{{ route('clearFilter') }}" class=" btn btn-primary" style="    height: 50px; line-height: 41px;">
                                                    Clear
                                                </a>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-xs-12 col-lg-6">
                        @if(Auth::user())
                        <form action="{{ route('saveSearch') }}" class="apartament_form pull-right" id="save_search" method="post">
                            {{ csrf_field() }}
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
                            <input type="hidden" name="address" value="{{ old('address') }}">
                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                            <input type="hidden" name="rent" value="{{ old('rent') }}">
                            <input type="hidden" name="listing_type" value="{{ old('listing_type') }}">
                            @if(array_key_exists('beds_baths' , old()))
                                @if(array_key_exists('0' , old('beds_baths')))
                                <input type="hidden" name="beds" value="{{ old('beds_baths')[0] }}">
                                @endif
                                @if(array_key_exists('1' , old('beds_baths')))
                                    <input type="hidden" name="baths" value="{{ old('beds_baths')[1] }}">
                                @endif
                            @endif

                        </form>
                            @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        @if($listings)
        <div class="col-lg-7 " style="    padding-right: 0;">
            <div id="offers-map">

            </div>
            <div class="polygon">
                <i class="fa fa-map"></i>
                Polygon
            </div>
            <div class="erease">
                <i class="fa fa-pencil"></i>
                Erase
            </div>
        </div>
        <div class="col-lg-5 " id="offers-list" style="background: white;  overflow-y: scroll">
            <div class="row"  style="overflow: scroll">
                <div class="col-xs-12 test">
                    <div class="abs_f_h">
                        <form action="{{ route('filterListings') }}" method="get">
                            <div class="desktopView clearfix" id="advancedFilters">
                            <h4 class="amenitiesHeading">{{ Lang::get('pages.c_n') }}</h4>
                            <div class="grid">
                                <div class="col-xs-12 col-md-12 col-lg-6 margin-top-15">
                                    <div class="row">
                                        <div class="checkboxGroup" style=" margin-left: 10px;  padding: 10px;">
                                            <input type="checkbox" value="broken_lease" id="c12" name="filter[]" class="main-checkbox">
                                            <label for="c12"><span></span>{{ Lang::get('listing.b_l') }}</label><br>
                                        </div>
                                        <div class="checkboxGroup" style=" margin-left: 10px;  padding: 10px;">
                                            <input type="checkbox" value="eviction" id="c13" name="filter[]" class="main-checkbox">
                                            <label for="c13"><span></span>{{ Lang::get('listing.e_v') }}</label><br>
                                        </div>
                                        <div class="checkboxGroup" style=" margin-left: 10px;  padding: 10px;">
                                            <input type="checkbox" value="misdemeanor" id="c14" name="filter[]" class="main-checkbox">
                                            <label for="c14"><span></span>{{ Lang::get('listing.mis') }}</label><br>
                                        </div>
                                        <div class="checkboxGroup" style=" margin-left: 10px;  padding: 10px;">
                                            <input type="checkbox" value="falonies" id="c15" name="filter[]" class="main-checkbox">
                                            <label for="c15"><span></span>{{ Lang::get('listing.fels') }}</label><br>
                                        </div>
                                        <div class="checkboxGroup" style=" margin-left: 10px;  padding: 10px;">
                                            <input type="checkbox" value="section_8" id="c16" name="filter[]" class="main-checkbox">
                                            <label for="c16"><span></span>{{ Lang::get('listing.sec_8') }}</label><br>
                                        </div>
                                        <div class="checkboxGroup" style=" margin-left: 10px;  padding: 10px;">
                                            <input type="checkbox" value="hud" id="c17" name="filter[]" class="main-checkbox">
                                            <label for="c17"><span></span>HUD</label><br>
                                        </div>
                                        <div class="checkboxGroup" style=" margin-left: 10px;  padding: 10px;">
                                            <input type="checkbox" value="income_r" id="c18" name="filter[]" class="main-checkbox">
                                            <label for="c18"><span></span>{{ Lang::get('listing.in_r') }}</label><br>
                                        </div>
                                        <div class="checkboxGroup" style=" margin-left: 10px;  padding: 10px;">
                                            <input type="checkbox" value="bankruptcy" id="c19" name="filter[]" class="main-checkbox">
                                            <label for="c19"><span></span>{{ Lang::get('pages.bank') }}</label><br>
                                        </div>
                                        <div class="checkboxGroup" style=" margin-left: 10px;  padding: 10px;">
                                            <input type="checkbox" value="foreclosure" id="c20" name="filter[]" class="main-checkbox">
                                            <label for="c20"><span></span>{{ Lang::get('listing.forec') }}</label><br>
                                        </div>
                                        <div class="checkboxGroup" style=" margin-left: 10px;  padding: 10px;">
                                            <input type="checkbox" value="credit" id="c21" name="filter[]" class="main-checkbox">
                                            <label for="c21"><span></span>{{ Lang::get('listing.cre') }}</label><br>
                                        </div>
                                        <div class="checkboxGroup" style=" margin-left: 10px;  padding: 10px;">
                                            <input type="checkbox" value="move_in" id="c22" name="filter[]" class="main-checkbox">
                                            <label for="c22"><span></span>{{ Lang::get('listing.m_i_s') }}</label><br>
                                        </div>
                                        <div class="checkboxGroup" style=" margin-left: 10px;  padding: 10px;">
                                            <input  name="filter[]" id="noSmocking" type="checkbox" value="no_smocking" class="main-checkbox">
                                            <label for="noSmocking"><span></span>{{ Lang::get('listing.no_smo') }}</label>
                                        </div>
                                        <div class="checkboxGroup" style=" margin-left: 10px;  padding: 10px;">
                                            <input name="filter[]" id="UnitAmenities_131072" type="checkbox" value="wheelchair" class="main-checkbox">
                                            <label for="UnitAmenities_131072"><span></span>{{ Lang::get('listing.wheel_access') }}</label>
                                        </div>
                                        <div class="checkboxGroup" style=" margin-left: 10px;  padding: 10px;">
                                            <input name="filter[]" id="UnitAmenities_1048576" type="checkbox" value="washer_dryer_hockups" class="main-checkbox">
                                            <label for="UnitAmenities_1048576"><span></span>{{ Lang::get('pages.w_h') }}</label>
                                        </div>
                                        <div class="checkboxGroup" style=" margin-left: 10px;  padding: 10px;">
                                            <input name="filter[]" id="CommunityAmenities_256" type="checkbox" value="fitness_center" class="main-checkbox">
                                            <label for="CommunityAmenities_256"><span></span>{{ Lang::get('pages.f_c') }}</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-md-12 col-lg-6 margin-top-15">
                                    <div class="row">
                                        <div class="checkboxGroup" style=" margin-left: 10px;  padding: 10px;">
                                            <input type="checkbox" value="fitness_center"  id="office" name="filter[]" class="main-checkbox" >
                                            <label for="office"><span></span>{{ Lang::get('pages.office') }} <button  type="button" class="btn btn-primary shome pull-right toltip_button"  style="margin-left: 20px;"><i class="fa fa-info"></i></button></label><br>
                                        </div>
                                        <div class="absalutx">
                                            <ul class="custom-ul">
                                                <div class="col-lg-6 col-xs-12">
                                                    <li>
                                                        <span class="custom-ul-bullet"></span>
                                                        {{ Lang::get('pages.batt') }}
                                                    </li>
                                                    <li>
                                                        <span class="custom-ul-bullet"></span>
                                                        {{ Lang::get('pages.big') }}
                                                    </li>
                                                    <li>
                                                        <span class="custom-ul-bullet"></span>
                                                        {{ Lang::get('pages.crim') }}
                                                    </li>
                                                    <li>
                                                        <span class="custom-ul-bullet"></span>
                                                        {{ Lang::get('pages.false') }}
                                                    </li>
                                                    <li>
                                                        <span class="custom-ul-bullet"></span>
                                                        {{ Lang::get('pages.homes') }}
                                                    </li>

                                                </div>
                                                <div class="col-lg-6 col-xs-12">
                                                    <li>
                                                        <span class="custom-ul-bullet"></span>
                                                        {{ Lang::get('pages.mayem') }}
                                                    </li>
                                                    <li>
                                                        <span class="custom-ul-bullet"></span>
                                                        {{ Lang::get('pages.public') }}
                                                    </li>

                                                    <li>
                                                        <span class="custom-ul-bullet"></span>
                                                        {{ Lang::get('pages.robery') }}
                                                    </li>
                                                </div>
                                                <div class="clearfix"></div>
                                            </ul>
                                        </div>
                                        <div class="checkboxGroup" style=" margin-left: 10px;  padding: 10px;">
                                            <input type="checkbox" value="fitness_center"  id="crimes" name="filter[]" class="main-checkbox" >
                                            <label for="crimes"><span></span>{{ Lang::get('pages.crimes') }} <button  type="button" class="btn btn-primary sprofile pull-right toltip_button"  style="margin-left: 20px;"><i class="fa fa-info"></i></button></label><br>
                                        </div>
                                        <div class="absalutx">
                                            <ul class="custom-ul">
                                                <div class="col-lg-6 col-xs-12">
                                                    <li>
                                                        <span class="custom-ul-bullet"></span>
                                                        {{ Lang::get('pages.arson') }}
                                                    </li>
                                                    <li>
                                                        <span class="custom-ul-bullet"></span>
                                                        {{ Lang::get('pages.black') }}
                                                    </li>
                                                    <li>
                                                        <span class="custom-ul-bullet"></span>
                                                        {{ Lang::get('pages.bri') }}
                                                    </li>
                                                    <li>
                                                        <span class="custom-ul-bullet"></span>
                                                        {{ Lang::get('pages.bulg') }}
                                                    </li>
                                                    <li>
                                                        <span class="custom-ul-bullet"></span>
                                                        {{ Lang::get('pages.embez') }}
                                                    </li>
                                                    <li>
                                                        <span class="custom-ul-bullet"></span>
                                                        {{ Lang::get('pages.extori') }}
                                                    </li>
                                                    <li>
                                                        <span class="custom-ul-bullet"></span>
                                                        {{ Lang::get('pages.falsep') }}
                                                    </li>
                                                    <li>
                                                        <span class="custom-ul-bullet"></span>
                                                        {{ Lang::get('pages.fraud') }}
                                                    </li>
                                                </div>
                                                <div class="col-lg-6 col-xs-12">
                                                    <li>
                                                        <span class="custom-ul-bullet"></span>
                                                        {{ Lang::get('pages.larceny') }}
                                                    </li>
                                                    <li>
                                                        <span class="custom-ul-bullet"></span>
                                                        {{ Lang::get('pages.payola') }}
                                                    </li>
                                                    <li>
                                                        <span class="custom-ul-bullet"></span>
                                                        {{ Lang::get('pages.pick') }}
                                                    </li>
                                                    <li>
                                                        <span class="custom-ul-bullet"></span>
                                                        {{ Lang::get('pages.prosse') }}
                                                    </li>
                                                    <li>
                                                        <span class="custom-ul-bullet"></span>
                                                        {{ Lang::get('pages.robber') }}
                                                    </li>
                                                    <li>
                                                        <span class="custom-ul-bullet"></span>
                                                        {{ Lang::get('pages.tax') }}
                                                    </li>
                                                    <li>
                                                        <span class="custom-ul-bullet"></span>
                                                        {{ Lang::get('pages.theft') }}
                                                    </li>
                                                </div>
                                                <div class="clearfix"></div>
                                            </ul>
                                        </div>
                                        <div class="checkboxGroup" style=" margin-left: 10px;  padding: 10px;">
                                            <input type="checkbox" value="no_smocking"   id="justi" name="filter[]" class="main-checkbox" >
                                            <label for="justi"><span></span>{{ Lang::get('pages.justi') }} <button  type="button" class="btn btn-primary smessages pull-right toltip_button" style="margin-left: 20px;" ><i class="fa fa-info"></i></button></label><br>
                                        </div>
                                        <div class="absalutx">
                                            <ul class="custom-ul">
                                                <div class="col-lg-6 col-xs-12">
                                                    <li>
                                                        <span class="custom-ul-bullet"></span>
                                                        {{ Lang::get('pages.com') }}
                                                    </li>
                                                    <li>
                                                        <span class="custom-ul-bullet"></span>
                                                        {{ Lang::get('pages.malf') }}
                                                    </li>
                                                    <li>
                                                        <span class="custom-ul-bullet"></span>
                                                        {{ Lang::get('pages.misc') }}
                                                    </li>
                                                    <li>
                                                        <span class="custom-ul-bullet"></span>
                                                        {{ Lang::get('pages.misp') }}
                                                    </li>
                                                </div>
                                                <div class="col-lg-6 col-xs-12">
                                                    <li>
                                                        <span class="custom-ul-bullet"></span>
                                                        {{ Lang::get('pages.obst') }}
                                                    </li>
                                                    <li>
                                                        <span class="custom-ul-bullet"></span>
                                                        {{ Lang::get('pages.perj') }}
                                                    </li>
                                                    <li>
                                                        <span class="custom-ul-bullet"></span>
                                                        {{ Lang::get('pages.perv') }}
                                                    </li>
                                                </div>
                                                <div class="clearfix"></div>
                                            </ul>
                                        </div>
                                        <div class="checkboxGroup" style=" margin-left: 10px;  padding: 10px;">
                                            <input type="checkbox" value="no_smocking" id="victim" name="filter[]" class="main-checkbox" >
                                            <label for="victim"><span></span>{{ Lang::get('pages.victim') }} <button  type="button" class="btn btn-primary ssettings pull-right toltip_button" style="margin-left: 20px;" ><i class="fa fa-info"></i></button></label><br>
                                        </div>
                                        <div class="absalutx">
                                            <ul class="custom-ul">
                                                <div class="col-lg-6 col-xs-12">

                                                    <li>
                                                        <span class="custom-ul-bullet"></span>
                                                        {{ Lang::get('pages.apos') }}
                                                    </li>
                                                    <li>
                                                        <span class="custom-ul-bullet"></span>
                                                        {{ Lang::get('pages.gamb') }}
                                                    </li>

                                                </div>
                                                <div class="col-lg-6 col-xs-12">
                                                    <li>
                                                        <span class="custom-ul-bullet"></span>
                                                        {{ Lang::get('pages.dueling') }}
                                                    </li>

                                                    <li>
                                                        <span class="custom-ul-bullet"></span>
                                                        Drugs
                                                    </li>
                                                    <li>
                                                        <span class="custom-ul-bullet"></span>
                                                        {{ Lang::get('pages.exh') }}
                                                    </li>
                                                </div>
                                                <div class="clearfix"></div>
                                            </ul>
                                        </div>
                                        <div class="checkboxGroup" style=" margin-left: 10px;  padding: 10px;">
                                            <input type="checkbox" value="no_smocking" id="minor" name="filter[]" class="main-checkbox" >
                                            <label for="minor"><span></span>Minor Offences<button  type="button" class="btn btn-primary ssettings pull-right toltip_button" style="margin-left: 20px;" ><i class="fa fa-info"></i></button></label><br>
                                        </div>
                                        <div class="absalutx">
                                            <ul class="custom-ul">
                                                <div class="col-lg-6 col-xs-12">
                                                    <li>
                                                        <span class="custom-ul-bullet"></span>
                                                       DWI
                                                    </li>
                                                    <li>
                                                        <span class="custom-ul-bullet"></span>
                                                       DUI
                                                    </li>
                                                </div>
                                                <div class="col-lg-6 col-xs-12">
                                                    <li>
                                                        <span class="custom-ul-bullet"></span>
                                                       Public Intoxication
                                                    </li>

                                                    <li>
                                                        <span class="custom-ul-bullet"></span>
                                                        Recreational Drug Use
                                                    </li>
                                                    <li>
                                                        <span class="custom-ul-bullet"></span>
                                                        Minor Drug Charge
                                                    </li>
                                                </div>
                                                <div class="clearfix"></div>
                                            </ul>
                                        </div>
                                        <div class="checkboxGroup" style=" margin-left: 10px;  padding: 10px;">
                                            <input  name="filter[]" id="PetFriendly_1" type="checkbox" value="dogs" class="main-checkbox">
                                            <label for="PetFriendly_1"><span></span>{{ Lang::get('listing.dogs_ok') }}</label>
                                        </div>
                                        <div class="checkboxGroup" style=" margin-left: 10px;  padding: 10px;">
                                            <input name="filter[]" id="PetFriendly_2" type="checkbox" value="cats" class="main-checkbox">
                                            <label for="PetFriendly_2"><span></span>{{ Lang::get('listing.cats_ok') }}</label>
                                        </div>
                                        <div class="checkboxGroup" style="margin-left: 10px;  padding: 10px;">
                                            <input type="checkbox" value="loft_box"  id="c100" name="filter[]" class="main-checkbox" >
                                            <label for="c100"><span></span>{{Lang::get('listing.Lofts_box')}}</label><br>
                                        </div>
                                        <div class="checkboxGroup" style="   margin-left: 10px;  padding: 10px;">
                                            <input type="checkbox" value="all_box" @if(old('all_box') == 1)  checked @endif id="Dens_box" name="filter[]" class="main-checkbox" >
                                            <label for="Dens_box"><span></span>{{Lang::get('listing.Dens_box')}} </label><br>
                                        </div>
                                        <div class="checkboxGroup" style="   margin-left: 10px;  padding: 10px;">
                                            <input type="checkbox" value="all_bills" @if(old('all_bills') == 1)  checked @endif id="All_Bills" name="filter[]" class="main-checkbox" >
                                            <label for="All_Bills"><span></span>{{Lang::get('listing.All_Bills')}}</label><br>
                                        </div>
                                        <div class="checkboxGroup" style="   margin-left: 10px;  padding: 10px;">
                                            <input type="checkbox" value="all_townl" @if(old('all_townl') == 1)  checked @endif id="Townhomes" name="filter[]" class="main-checkbox" >
                                            <label for="Townhomes"><span></span>{{Lang::get('listing.Townhomes')}} </label><br>
                                        </div>
                                        <div class="checkboxGroup" style=" margin-left: 10px;  padding: 10px;">
                                            <input  name="filter[]" id="PetFriendly_3" type="checkbox" value="no_pets" class="main-checkbox">
                                            <label for="PetFriendly_3"><span></span>{{ Lang::get('listing.no_pets') }}</label>
                                        </div>
                                        <div class="checkboxGroup" style=" margin-left: 10px;  padding: 10px;">
                                            <input  name="filter[]" id="AdditionalAmenities_128" type="checkbox" value="furnished" class="main-checkbox">
                                            <label for="AdditionalAmenities_128"><span></span>{{ Lang::get('listing.furnished') }}</label>
                                        </div>
                                        <div class="checkboxGroup" style=" margin-left: 10px;  padding: 10px;">
                                            <input name="filter[]" id="UnitAmenities_2" type="checkbox" value="washer_dryer" class="main-checkbox">
                                            <label for="UnitAmenities_2"><span></span>{{ Lang::get('pages.w_ad') }}</label>
                                        </div>
                                        <div class="checkboxGroup" style=" margin-left: 10px;  padding: 10px;">
                                            <input name="filter[]" id="CommunityAmenities_2097152" type="checkbox" value="onsite_laundry" class="main-checkbox">
                                            <label for="CommunityAmenities_2097152"><span></span>{{ Lang::get('pages.o_n') }}</label>
                                        </div>
                                        <div class="checkboxGroup" style=" margin-left: 10px;  padding: 10px;">
                                            <input name="filter[]" id="CommunityAmenities_512" type="checkbox" value="pool" class="main-checkbox">
                                            <label for="CommunityAmenities_512"><span></span>{{ Lang::get('pages.p_l') }}</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <button type="button" class="button-primary  text-center appartament_done">
                                <span>{{ Lang::get('pages.c_lo') }}</span>
                                <div class="button-triangle"></div>
                                <div class="button-triangle2"></div>
                            </button>
                            <button type="submit" class="button-primary  text-center ">
                                <span>{{ Lang::get('pages.f_is') }}</span>
                                <div class="button-triangle"></div>
                                <div class="button-triangle2"></div>
                            </button>
                        </div>
                        </form>
                    </div>
                    <?php
                        function limit_text($text, $limit) {
                            if (str_word_count($text, 0) > $limit) {
                                $words = str_word_count($text, 2);
                                $pos = array_keys($words);
                                $text = substr($text, 0, $pos[$limit]) . '...';
                            }
                            return $text;
                        }
                    ?>
                    <div class="ajax_list">
                    @if($listings)
                        @foreach($listings as $listing)
                        <a href="{{ route('singleListing' , ['id' => $listing->id , 'title' => $listing->title]) }}" class="list-agency row">
                            <div class="list-agency-left col-xs-12 col-sm-6 col-md-6 col-lg-12">
                                <div class="full_blue">
                                    <h2> {{ $listing->name }}</h2>
                                </div>
                                @if(App\ListingImage::where('listing_id' , $listing->id)->first())
                                    <img src="{{ asset('assets/images').'/'.App\ListingImage::where('listing_id' , $listing->id)->whereNotNull('featured')->pluck('image')->first() }}" alt="" width="100%" height="auto">
                                @endif
                            </div>
                            <a class="list-agency-right-large col-xs-12 col-sm-6 col-md-6 col-lg-12" href="{{ route('singleListing' , ['id' => $listing->listing_id , 'title' => $listing->title]) }}" >
                                <div class="list-agency-text" style="padding-bottom: 0px">
                                    <h4 class="list-agency-title"><i class="fa fa-map-marker"></i>  {{ $listing->address }}</h4>
                                    <div class="list-agency-separator"></div>
                                </div>
                            </a>
                            <div class="list-agency-right-large col-xs-12 col-sm-6 col-md-6 col-lg-6 ">
                                <div class="list-agency-text">
                                    <h4 class="list-agency-title"><i class="fa fa-phone"></i>  {{ App\User::where('id' ,$listing->user_id)->pluck('phone')->first() }}</h4>
                                </div>
                            </div>
                            <div class="col-lg-6 col-xs-12">
                                <div class="list-agency-text">
                                <h4 class="list-agency-title"><span  data-toggle="tooltip" data-placement="bottom" title="Last Updated"><i class="fa fa-clock-o"  ></i> {{ \Carbon\Carbon::parse($listing->updated_at)->diffInDays() }} Days</span> </h4>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <ul class="app_attr_list">
                                <li class="">
                                    <span class="team-icon-circle">
                                        <i class="fa fa-map-marker" style="line-height: 22px;"></i>
                                    </span>
                                    <span>{{ $listing->name }}</span>
                                </li>
                                <li class="">
                                    <span class="team-icon-circle">
                                        <i class="fa fa-dollar" style="line-height: 22px;"></i>
                                    </span>
                                    <span>{{ $listing->ListingAttr()->first()->rent }} </span>
                                </li>
                                <li class="">
                                    <span class="team-icon-circle">
                                        <i class="fa fa-bed fa-sm" style="line-height: 22px;"></i>
                                    </span>
                                    <span><a href="#"> {{ $listing->beds_count }} Bed</a></span>
                                </li>
                            </ul>
                            <a href="{{ route('singleListing' , ['id' => $listing->listing_id , 'title' => $listing->title]) }}" class="small-triangle"></a>
                            <div class="small-triangle2"></div>
                            <a class="small-icon" href="{{ route('singleListing' , ['id' => $listing->listing_id , 'title' => $listing->title]) }}"><i class="jfont fa-2x"></i></a>
                        </a>
                    @endforeach
                    @endif
                    </div>
                </div>
            </div>
        </div>
        @else
            <section class="short-image no-padding blog-short-title">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-lg-12 short-image-title">
                            <h1 class="second-color">Nothing Found</h1>
                            <div class="short-title-separator"></div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="section-light section-top-shadow">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <h1 class="error-subtitle text-color4">We couldn`t find any result for your search criterias </h1>
                            <p class="margin-top-105 centered-text">Please modify your search.</p>
                        </div>
                    </div>
                </div>
            </section>
        @endif
    </div>

@endsection
@section('scripts')
    <script>
        $(".toltip_button").click(function(){
            if ($(this).parent().parent().next().hasClass('absalutx')) {
                $(this).parent().parent().next().addClass("absalut");
                $(this).parent().parent().next().removeClass("absalutx");
            }else{
                $(this).parent().parent().next().addClass("absalutx");
                $(this).parent().parent().next().toggleClass("absalut");
            }
        });
        $('#min-max-price-range').click(function (event) {
            setTimeout(function(){ $('.price-label').first().focus();	},0);
        });
        var priceLabelObj;
        $('.price-label').bind("mouseenter focus mouseleave", function (event) {
            priceLabelObj=$(this);
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
            if(nextElm.length){
                $( ".price-label" ).eq(curElmIndex+1).focus();
            }else{
                $('#min-max-price-range').dropdown('toggle');
            }
        });

    </script>
    <script>
    $(document).ready(function () {
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

    <script type="text/javascript">
        var mapMarkers = [];
        var polyline;
        var map;
        var markerCluster;

        function offersMapInitt(id, locations) {
            var mapOptions = {
                zoom: 15,
                disableDefaultUI: false,
                mapTypeControl: true,
                mapTypeControlOptions: {
                    position: google.maps.ControlPosition.LEFT_TOP
                },
                zoomControl: true,
                zoomControlOptions: {
                    position: google.maps.ControlPosition.RIGHT_CENTER
                },
                scaleControl: true,
                streetViewControl: true,
                streetViewControlOptions: {
                    position: google.maps.ControlPosition.RIGHT_CENTER
                },
                scrollwheel: false,
                center: new google.maps.LatLng(locations[0][0], locations[0][1]),
                mapTypeId: google.maps.MapTypeId.ROADMAP,
                styles: mapStyle
            };
            var mapElement = document.getElementById(id);
            var polyShape;
            window.map = new google.maps.Map(mapElement, mapOptions);
            var LatLngList = [];
            var i = 0;

            var polygon = [];
            for (i = 0; i < locations.length; i++) {
                var pos = new google.maps.LatLng(locations[i][0], locations[i][1]);
                polygon.push(pos);
                var marker = new google.maps.Marker({
                    position: pos,
                    map: map,
                    title: '',
                    icon: locations[i][2]
                });
                mapMarkers[i] = marker;
                var infoBoxContent = document.createElement("div");
                infoBoxContent.className = "infobox-wrapper";
                infoBoxContent.innerHTML = "<a class='infobox-main' href='" + locations[i][6] + "'><div class='infobox-image'><img src=" + locations[i][3] + " alt='" + locations[i][4] + "' /></div><div class='infobox-text'>" + locations[i][4] + "</div><div class='infobox-price'>$" + locations[i][5] + "</div></a>";
                mapMarkers[i].infobox = new InfoBox({
                    content: infoBoxContent,
                    disableAutoPan: false,
                    pixelOffset: new google.maps.Size(30, -150),
                    zIndex: null,
                    boxStyle: {
                    },
                    closeBoxMargin: "0px",
                    closeBoxURL: "images/infobox-close.png",
                    infoBoxClearance: new google.maps.Size(1, 1)
                });

                google.maps.event.addListener(marker, 'click', (function(marker, i) {
                    return function() {
                        var j = 0;
                        for (j = 0; j < mapMarkers.length; j++) {
                            mapMarkers[j].infobox.close();
                        }
                        mapMarkers[i].infobox.open(map, this);
                    }
                })(marker, i));

                LatLngList[i] = pos;
            }

            var markerClusterStyle = [{
                url: 'images/pin-empty.png',
                height: 80,
                width: 48,
                textSize: 16,
                textColor: '#3798dd'
            }];

            markerCluster = new MarkerClusterer(map, mapMarkers, {styles:markerClusterStyle});
            minClusterZoom = 7;
            markerCluster.setMaxZoom(minClusterZoom);
            var oms = new OverlappingMarkerSpiderfier(map, {markersWontMove: true, markersWontHide: true, keepSpiderfied: true, legWeight: 2 });
            for (var i = 0; i < mapMarkers.length; i ++) {
                oms.addMarker(mapMarkers[i]);  // <-- here
            }
        }

        google.maps.event.addDomListener(window, 'load', init);
        function init() {
            var locations = [
                @foreach($langLtd as $lang)
                {!!  $lang !!}
                @endforeach
            ];
            offersMapInitt("offers-map",locations);
        }



        function drawFreeHand(){
            //the polygon
            window.polyline=new google.maps.Polyline({map:map,clickable:false});
            var move=google.maps.event.addListener(map,'mousemove',function(e){
                polyline.getPath().push(e.latLng);
            });
            //mouseup-listener
            google.maps.event.addListenerOnce(map,'mouseup',function(e){
                google.maps.event.removeListener(move);
                var path=polyline.getPath();
                var sending_data = polyline.getPath().getArray();
                sending_data = JSON.stringify(sending_data);
                window.poly=new google.maps.Polygon({map:map,path:path});
                $.ajax({
                    'type' : 'post',
                    'url' : '{{ route('searchListingAjax') }}',
                    'data' : {datas:sending_data},
                    success:function (res) {
                        markerCluster.clearMarkers();
                        var newLangLtd = [];
                        for (i = 0; i < res.length; i++) {
                            var latLng = new google.maps.LatLng(res[i][0], res[i][1]);
                            if (google.maps.geometry.poly.containsLocation(latLng, poly)) {
                                $('.ajax_list').html('');
                                 newLangLtd.push(res[i]);
                            }
                        }

                        for (i = 0; i < newLangLtd.length; i++) {

                            var newTemplate = document.createElement("a");
                            newTemplate.className = 'list-agency row';
                            newTemplate.innerHTML = '<div class="list-agency-left col-xs-12 col-sm-6 col-md-6 col-lg-12">' +
                                '<div class="full_blue">' +
                                '<h2>'+newLangLtd[i][7]+'</h2>' +
                                '</div>'+
                                '<img src="'+newLangLtd[i][3]+'" alt="" width="100%" height="auto">'+
                                '<a class="list-agency-right-large col-xs-12 col-sm-6 col-md-6 col-lg-12" href="' + newLangLtd[i][6] + '" >' +
                                '<div class="list-agency-text" style="padding-bottom: 0px">'+
                                '<h4 class="list-agency-title"><i class="fa fa-map-marker"></i>' + newLangLtd[i][4] +'</h4>'+
                                '<div class="list-agency-separator"></div>'+
                                '</div>'+
                                '</a>'+
                                '<div class="list-agency-right-large col-xs-12 col-sm-6 col-md-6 col-lg-6 ">'+
                                '<div class="list-agency-text">'+
                                '<h4 class="list-agency-title"><i class="fa fa-phone"></i>'+newLangLtd[i][8]+'</h4>'+
                                '</div>'+
                                '</div>'+
                                 '<div class="col-lg-6 col-xs-12">'+
                                '<div class="list-agency-text">'+
                                '<h4 class="list-agency-title">' +
                                '<span  data-toggle="tooltip" data-placement="bottom" title="Last Updated"><i class="fa fa-clock-o"  ></i>' +
                                ''+newLangLtd[i][9]+' Days</span>' +
                                '</h4>'+
                                '</div>'+
                                '</div>'+
                                '<div class="clearfix"></div>'+
                                '<ul class="app_attr_list">'+
                                '<li class="">'+
                                '<span class="team-icon-circle">'+
                                '<i class="fa fa-map-marker" style="line-height: 22px;"></i>'+
                                '</span>'+
                                '<span>'+newLangLtd[i][7]+'</span>'+
                                '</li>'+
                                '<li class="">'+
                                '<span class="team-icon-circle">'+
                                '<i class="fa fa-dollar" style="line-height: 22px;"></i>'+
                                '</span>'+
                                '<span>'+newLangLtd[i][5]+'</span>'+
                                '</li>'+
                                '<li class="">'+
                                '<span class="team-icon-circle">'+
                                '<i class="fa fa-bed fa-sm" style="line-height: 22px;"></i>'+
                                '</span>'+
                                '<span><a href="#">'+newLangLtd[i][10]+' Bed</a></span>'+
                                '</li>'+
                                '</ul>'+
                                '<a href="'+ newLangLtd[i][6] + '" class="small-triangle"></a>'+
                                '<div class="small-triangle2"></div>'+
                                '<a class="small-icon" href="'+ newLangLtd[i][6] + '"><i class="jfont fa-2x"></i></a>'+
                                '</div>';

                            $('.ajax_list').append(newTemplate);
                            var latLngs = new google.maps.LatLng(newLangLtd[i][0], newLangLtd[i][1]);
                            var marker = new google.maps.Marker({
                                position: latLngs,
                                map: map,
                                title: '',
                                icon: newLangLtd[i][2]
                            });
                            mapMarkers.push(marker);
                            var infoBoxContent = document.createElement("div");
                            infoBoxContent.className = "infobox-wrapper";
                            infoBoxContent.innerHTML = "<a class='infobox-main' href='" + newLangLtd[i][6] + "'><div class='infobox-image'><img src=" + newLangLtd[i][3] + " alt='" + newLangLtd[i][4] + "' /></div><div class='infobox-text'>" + newLangLtd[i][4] + "</div><div class='infobox-price'>$" + newLangLtd[i][5] + "</div></a>";
                            mapMarkers[i].infobox = new InfoBox({
                                content: infoBoxContent,
                                disableAutoPan: false,
                                pixelOffset: new google.maps.Size(30, -150),
                                zIndex: null,
                                boxStyle: {
                                },
                                closeBoxMargin: "0px",
                                closeBoxURL: "images/infobox-close.png",
                                infoBoxClearance: new google.maps.Size(1, 1)
                            });
                            google.maps.event.addListener(marker, 'click', (function(marker, i) {
                                return function() {
                                    var j = 0;
                                    for (j = 0; j < mapMarkers.length; j++) {
                                        mapMarkers[j].infobox.close();
                                    }
                                    mapMarkers[i].infobox.open(map, this);
                                }
                            })(marker, i));
                            mapMarkers[i].setMap(map);
                        }


                        $('.erease').show()
                    }
                });

                google.maps.event.clearListeners(map.getDiv(), 'mousedown');
                enable()
            });
        }

        function disable(){
            map.setOptions({
                draggable: false,
                zoomControl: false,
                scrollwheel: false,
                disableDoubleClickZoom: false
            });
        }

        function enable(){
            map.setOptions({
                draggable: true,
                zoomControl: true,
                scrollwheel: true,
                disableDoubleClickZoom: true
            });
        }

        $(".polygon").click(function(e) {
            e.preventDefault();
            clearMarkers();
            disable();
            google.maps.event.addDomListener(map.getDiv(),'mousedown',function(e){
                drawFreeHand()
            });

        });

        // Sets the map on all markers in the array.
        function setMapOnAll(map) {
            for (var i = 0; i < mapMarkers.length; i++) {
                mapMarkers[i].setMap(map);
            }

        }

        // Removes the markers from the map, but keeps them in the array.
        function clearMarkers() {
            for (var i = 0; i < mapMarkers.length; i++ ) {
                mapMarkers[i].setMap(null);

            }
            mapMarkers.length = 0;
        }

        // Shows any markers currently in the array.
        function showMarkers() {
            setMapOnAll(map);
        }


        function removeLine() {
            poly.setMap(null);
        }



        $('.erease').click(function () {
            clearMarkers();
            poly.setMap(null);
            polyline.setMap(null);
            $.ajax({
                'type': 'post',
                'url': '{{ route('erease') }}',
                success: function (res) {
                    for (i = 0; i < res.length; i++) {
                        var latLng = new google.maps.LatLng(res[i][0], res[i][1]);
                            var marker = new google.maps.Marker({
                                position: latLng,
                                map: map,
                                title: '',
                                icon: res[i][2]
                            });
                        mapMarkers.push(marker);
                        var infoBoxContent = document.createElement("div");
                        infoBoxContent.className = "infobox-wrapper";
                        infoBoxContent.innerHTML = "<a class='infobox-main' href='" + res[i][6] + "'><div class='infobox-image'><img src=" + res[i][3] + " alt='" + res[i][4] + "' /></div><div class='infobox-text'>" + res[i][4] + "</div><div class='infobox-price'>$" + res[i][5] + "</div></a>";
                            mapMarkers[i].infobox = new InfoBox({
                                content: infoBoxContent,
                                disableAutoPan: false,
                                pixelOffset: new google.maps.Size(30, -150),
                                zIndex: null,
                                boxStyle: {
                                },
                                closeBoxMargin: "0px",
                                closeBoxURL: "images/infobox-close.png",
                                infoBoxClearance: new google.maps.Size(1, 1)
                            });

                            google.maps.event.addListener(marker, 'click', (function(marker, i) {
                                return function() {
                                    var j = 0;
                                    for (j = 0; j < mapMarkers.length; j++) {
                                        mapMarkers[j].infobox.close();
                                    }
                                    mapMarkers[i].infobox.open(map, this);
                                }
                            })(marker, i));
                            mapMarkers[i].setMap(map);
                    }
                    $('.erease').hide()
                }
            })
        })
    </script>

    <script>

        $('.boldet_link').click(function () {
            $('.abs_f_h').show();
        });

        $('.appartament_done').click(function () {
            $('.abs_f_h').hide();
        });

        $('.primaryCheckbox').on('change' )

        $( "#save_search" ).on( "submit", function( event ) {
            event.preventDefault();
            console.log(  );
            $.ajax({
                type:'post',
                url: '{{ route('saveSearch') }}',
                data: $( this ).serialize(),
                success:function (res) {
                    if(res.sucess == 'true'){
                            $('.success-box').removeAttr('style').show()
                    }
                }
            })
        });
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
                    $(".wq-country-name").val(v.long_name)
                }if(v.types[0] == 'neighborhood') {
                    $(".wq-neighborhood").val(v.long_name)
                }if(v.types[0] == 'postal_code'){
                    $("input[name=zip_code]").val(v.long_name)
                }

                console.log(v.types[0], v.long_name)
            })
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