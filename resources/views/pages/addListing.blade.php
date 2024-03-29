@extends('layouts.app')


@section('content')
<section class="short-image no-padding blog-short-title">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-lg-12 short-image-title">
                <h5 class="subtitle-margin second-color">{{ Lang::get('pages.add_listing') }}</h5>
                <h1 class="second-color">{{ Lang::get('profile.m_a') }}</h1>
                <div class="short-title-separator"></div>
            </div>
        </div>
    </div>
</section>

<section class="section-light  section-top-shadow">
    <div class="container">
            <div class="center-button-cont" style="text-align: right">
                <button  type="button" class="button-secondary" id="save_for_later">
                    <span>{{ Lang::get('listing.s_l') }}</span>
                    <div class="button-triangle"></div>
                    <div class="button-triangle2"></div>
                    <div class="button-icon"><i class="jfont fa-lg"></i></div>
                </button>
            </div>
    </div>
    <form name="offer-from" id="listing_form" action="{{ route('submitListing') }}" method="post" enctype="multipart/form-data">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-md-12">
                    <h3 class="title-negative-margin">{{ Lang::get('listing.header') }}<span class="special-color">.</span></h3>
                    <div class="title-separator-primary"></div>
                    <div class="dark-col margin-top-60">
                        <div class="row">
                            @if($errors->all())
                                <div class="alert alert-danger fade in" style="margin: 0px auto;">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    @foreach($errors->all() as $error)
                                        <br>{{$error}}
                                    @endforeach
                                </div>
                                <br>
                            @endif
                                {{ csrf_field() }}
                                <input type="hidden" name="wq-street_address" class="wq-street_address">
                                <input type="hidden" name="wq-street_number" class="wq-street_number">
                                <input type="hidden" name="wq-intersection" class="wq-intersection">
                                <input type="hidden" name="wq-route" class="wq-route">
                                <input type="hidden" name="wq-sublocality" class="wq-sublocality">
                                {{--<input type="hidden" name="wq-locality" class="wq-locality">--}}
                                <input type="hidden" name="wq-administrative_area_level_1" class="wq-administrative_area_level_1">
                                <input type="hidden" name="wq-administrative_area_level_2" class="wq-administrative_area_level_2">
                                <input type="hidden" name="wq-administrative_area_level_3" class="wq-administrative_area_level_3">
                                <input type="hidden" name="wq-administrative_area_level_4" class="wq-administrative_area_level_4">
                                <input type="hidden" name="wq-administrative_area_level_5" class="wq-administrative_area_level_5">
                                <input type="hidden" name="wq-country" class="wq-country">
                                <input type="hidden" name="wq-neighborhood" class="wq-neighborhood">
                            <div class="grid">
                                <div class="col-xs-12">
                                    <h4 class="special-color" style="font-size: 24px;margin-top: 10px;margin-bottom: 20px; text-transform: capitalize">{{ Lang::get('listing.address') }}</h4>
                                    <div class="margin-top-15">
                                        <input id="geocomplete" value="{{ old('address') }}" name="address" type="text" class="input-full main-input" placeholder="{{ Lang::get('listing.address') }}">
                                        <div id="submit-property-map" class="submit-property-map" style="height: 300px;"></div>
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-6 margin-top-15">
                                                <input name="lng" value="{{ old('lng') }}" type="hidden" class="input-full main-input input-last" placeholder="Longitude" readonly="readonly">
                                            </div>
                                            <div class="col-xs-12 col-sm-6 margin-top-15">
                                                <input name="lat" value="{{ old('lat') }}" type="hidden" class="input-full main-input input-last" placeholder="Latitude" readonly="readonly">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="grid">
                                <div class="col-sm-4 col-xs-12">
                                    <h5 class="labeles">{{ Lang::get('profile.city') }}</h5>
                                    <input name="city" type="text" value="{{ old('city') }}" class="input-full main-input" placeholder="">
                                </div>
                                <div class="col-sm-4 col-xs-12">
                                    <h5 class="labeles">{{ Lang::get('profile.state') }}</h5>
                                    <input name="state" type="text" value="{{ old('state') }}" class="input-full main-input" placeholder="">
                                </div>
                                <div class="col-sm-4 col-xs-12">
                                    <h5 class="labeles">{{ Lang::get('pages.z_c') }}</h5>
                                    <input name="zip_code" type="text" value="{{ old('zip_code') }}" class="input-full main-input" placeholder="">
                                </div>

                            </div>
                            <div class="grid">
                                <div class="col-sm-6 col-xs-12">
                                    <h5 class="labeles">{{ Lang::get('pages.n_a') }}</h5>
                                    <input name="name" type="text" value="{{ old('name') }}" class="input-full main-input" placeholder="">
                                </div>
                                <div class="col-sm-6 col-xs-12">
                                    <h5 class="labeles">{{ Lang::get('pages.sc_d') }}</h5>
                                    <input name="school_dc" type="text" value="{{ old('school_dc') }}" class="input-full main-input" placeholder="">
                                </div>
                            </div>
                            <div class="grid">
                                <!-- ko foreach: PropertyTypes -->
                                <div class="col-xs-12">
                                    <br>
                                    <br>
                                    <h4 style="font-size: 24px;margin-top: 10px;margin-bottom: 20px;">
                                        {{ Lang::get('listing.listing_type') }}
                                    </h4>
                                    <br>
                                </div>
                            </div>
                            <div id="cloning_area">
                                <div class="grid">
                                    <div class="col-sm-3  col-xs-12" >
                                        <div class="radioGroup">
                                            <input type="radio" required class="primaryRadio" @if(old('listing_type') == 2) checked @endif value="2" id="propType2" name="listing_type[]" title="">
                                            <label  for="propType2"><span data-bind="text: Description" class="spanes">{{ Lang::get('listing.appartament') }}</span></label>
                                        </div>
                                    </div>
                                    <div class="col-sm-3  col-xs-12" >
                                        <div class="radioGroup">
                                            <input type="radio" required class="primaryRadio"  value="7" @if(old('listing_type') == 7) checked @endif id="propType7" name="listing_type[]" title="">
                                            <label  for="propType7"><span data-bind="text: Description" class="spanes">{{ Lang::get('listing.condo') }}</span></label>
                                        </div>
                                    </div>
                                    <div class="col-sm-3  col-xs-12" >
                                        <div class="radioGroup">
                                            <input type="radio" required class="primaryRadio"  value="5" @if(old('listing_type') == 5) checked @endif id="propType5" name="listing_type[]" title="">
                                            <label  for="propType5"><span data-bind="text: Description" class="spanes">{{ Lang::get('listing.townhome') }}</span></label>
                                        </div>
                                    </div>
                                    <div class="col-sm-3  col-xs-12" >
                                        <div class="radioGroup">
                                            <input type="radio" required class="primaryRadio"  value="3" @if(old('listing_type') == 3) checked @endif id="propType3" name="listing_type[]" title="">
                                            <label  for="propType3"><span data-bind="text: Description" class="spanes">{{ Lang::get('listing.single_home') }}</span></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="grid">
                                    <div class="col-sm-4  col-xs-12">
                                        <h5 class="labeles">{{ Lang::get('listing.beds') }}</h5>
                                        <select name="beds_count[]" id="beds" class="selectpicker beds"  title="" style="display: none;">
                                            <option value="-1">{{ Lang::get('pages.st') }}</option>
                                            <option value="1" @if(old('beds_count') == 1) selected @endif>1.0</option>
                                            <option value="2" @if(old('beds_count') == 2) selected @endif>2.0</option>
                                            <option value="3" @if(old('beds_count') == 3) selected @endif>3.0</option>
                                            <option value="4" @if(old('beds_count') == 4) selected @endif>4.0</option>
                                            <option value="5" @if(old('beds_count') == 5) selected @endif>5.0</option>
                                            <option value="6" @if(old('beds_count') == 6) selected @endif>6.0</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-4 col-xs-12">
                                        <h5 class="labeles">{{ Lang::get('listing.baths') }}</h5>
                                        <select name="baths_count[]" id="baths" class="selectpicker baths" title="" style="display: none;">
                                            <option value="1" @if(old('baths_count') == 1) selected @endif>1.0</option>
                                            <option value="1.5" @if(old('baths_count') == 1.5) selected @endif>1.5</option>
                                            <option value="2" @if(old('baths_count') == 2) selected @endif>2.0</option>
                                            <option value="2.5" @if(old('baths_count') == 2.5) selected @endif>2.5</option>
                                            <option value="3" @if(old('baths_count') == 3) selected @endif>3.0</option>
                                            <option value="3.5" @if(old('baths_count') == 3.5) selected @endif>3.5</option>
                                            <option value="4" @if(old('baths_count') == 4) selected @endif>4.0</option>
                                            <option value="4.5" @if(old('baths_count') == 4.5) selected @endif>4.5</option>
                                            <option value="5" @if(old('baths_count') == 5) selected @endif>5.0</option>
                                            <option value="5.5" @if(old('baths_count') == 5.5) selected @endif>5.5</option>
                                            <option value="6" @if(old('baths_count') == 6) selected @endif>6.0</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-4 col-xs-12">
                                        <h5 class="labeles">{{ Lang::get('listing.square') }}</h5>
                                        <input name="square_feet[]" value="{{ old('square_feet') }}" type="text" placeholder="SF" maxlength="9"   min="1" class="input-full main-input" title="">
                                    </div>
                                </div>
                                <div class="grid">
                                    <div class="col-sm-4 col-xs-12">
                                        <h5 class="labeles">{{ Lang::get('listing.rent') }}</h5>
                                        <input name="rent[]" type="text" value="{{ old('rent') }}" class="input-full main-input" placeholder="0$">
                                    </div>
                                    <div class="col-sm-4 col-xs-12">
                                        <h5 class="labeles">{{ Lang::get('listing.deposit') }}</h5>
                                        <input name="deposit[]" type="text" value="{{ old('deposit') }}" class="input-full main-input" placeholder="0$">
                                    </div>
                                    <div class="col-sm-2 col-xs-12">

                                        <h5 class="labeles">
                                            {{ Lang::get('listing.available') }}
                                        </h5>
                                        {{Form::select('available_date[]', ['Available Now' => 'Available Now', 'Available Soon' => 'Available Soon', 'Not Available' => 'Not Available'], old('available_date'), ['class' => 'input-full main-input  selectpicker '])}}

                                    </div>
                                    <div class="col-sm-2 col-xs-12">
                                        <h5 class="labeles"> {{ Lang::get('listing.lase_length') }}</h5>
                                        <input name="lease_length[]"  value="{{ old('lease_length') }}" type="text" class="input-full main-input" placeholder="12 mos">
                                    </div>
                                </div>
                            </div>
                            <div class="grid" id="cloned_arae"></div>
                            <div class="grid">
                                <div class="col-sm-12 col-xs-12 text-center">
                                    <a href="#" id="clone_button" class="button-primary">
                                        <span>{{ Lang::get('pages.a_m') }}</span>
                                        <div class="button-triangle"></div>
                                        <div class="button-triangle2"></div>
                                        <div class="button-icon"><i class="fa fa-lg fa-plus"></i></div>
                                    </a>
                                </div>
                            </div>
                            <div class="grid">
                                <div class="col-xs-12">
                                    <h4 class="special-color" style="font-size: 24px;margin-top: 10px;margin-bottom: 20px;">{{ Lang::get('pages.f_i') }}</h4>
                                </div>
                            </div>
                            <div class="grid">
                                <div class="col-xs-12" style="margin-bottom: 20px">
                                    <input type="file" name="featured" class="form-control">
                                </div>
                            </div>
                            <br>
                            <div class="grid">
                                <div class="col-xs-12">
                                    <h4 class="special-color" style="font-size: 24px;margin-top: 10px;margin-bottom: 20px;">{{ Lang::get('listing.photos') }}</h4>
                                </div>
                            </div>

                            <div class="grid">
                                <div class="col-xs-12">
                                    <input name="files[]" id="file-upload" class="form-control" type="file" multiple>
                                </div>
                            </div>
                            <br>

                            <div class="grid">
                                <div class="col-xs-12">
                                    <h4 class="special-color" style="font-size: 24px;margin-top: 10px;margin-bottom: 20px;">{{ Lang::get('listing.acceptable') }}</h4>
                                </div>
                            </div>
                            <div class="grid">
                                <div class="col-xs-12 col-lg-6 margin-top-15">
                                    <div class="checkboxGroup" style="  margin-left: 10px;  padding: 10px;">
                                        <input type="checkbox"  value="1" @if(old('broken_lease') == 1)  checked @endif id="c12" name="broken_lease" class="main-checkbox" >
                                        <label for="c12"><span></span>{{ Lang::get('listing.b_l') }}-{{ Lang::get('listing.h_o') }} <input name="br_le_ye" class="input_no_border" value="{{ old('br_le_ye') }}" type="text">yr(s) </label><br>
                                    </div>
                                    <div class="checkboxGroup" style="  margin-left: 10px;  padding: 10px;">
                                        <input type="checkbox" value="1" @if(old('eviction') == 1)  checked @endif id="c13" name="eviction" class="main-checkbox" >
                                        <label for="c13"><span></span>{{ Lang::get('listing.e_v') }}-{{ Lang::get('listing.h_o') }} <input name="ev_ye" class="input_no_border" value="{{ old('ev_ye') }}" type="text">yr(s)</label><br>
                                    </div>
                                    <div class="checkboxGroup" style=" margin-left: 10px;  padding: 10px;">
                                        <input type="checkbox" value="1" @if(old('misdemeanor') == 1)  checked @endif id="c14" name="misdemeanor" class="main-checkbox" >
                                        <label for="c14"><span></span>{{ Lang::get('listing.mis') }}-{{ Lang::get('listing.h_o') }} <input name="mis_ye" class="input_no_border" value="{{ old('mis_ye') }}" type="text">yr(s)</label><br>
                                    </div>
                                    <div class="checkboxGroup" style=" margin-left: 10px;  padding: 10px;">
                                        <input type="checkbox" value="1" @if(old('falonies') == 1)  checked @endif id="c15" name="falonies" class="main-checkbox" >
                                        <label for="c15"><span></span>{{ Lang::get('listing.fels') }} -{{ Lang::get('listing.h_o') }} <input name="fe_ye" class="input_no_border" value="{{ old('fe_ye') }}" type="text">yr(s)</label><br>
                                    </div>
                                    <div class="checkboxGroup" style=" margin-left: 10px;  padding: 10px;">
                                        <input type="checkbox" value="1" @if(old('section_8') == 1)  checked @endif id="c16" name="section_8" class="main-checkbox" >
                                        <label for="c16"><span></span>{{ Lang::get('listing.sec_8') }}</label><br>
                                    </div>
                                    <div class="checkboxGroup" style=" margin-left: 10px;  padding: 10px;">
                                        <input type="checkbox" value="1" @if(old('hud') == 1)  checked @endif id="c17" name="hud" class="main-checkbox" >
                                        <label for="c17"><span></span>HUD</label><br>
                                    </div>
                                    <div class="checkboxGroup" style=" margin-left: 10px;  padding: 10px;">
                                        <input type="checkbox" value="1" @if(old('income_r') == 1)  checked @endif id="c18" name="income_r" class="main-checkbox" >
                                        <label for="c18"><span></span>{{ Lang::get('listing.in_r') }}</label><br>
                                    </div>
                                    <div class="checkboxGroup" style=" margin-left: 10px;  padding: 10px;">
                                        <input type="checkbox" value="1" @if(old('credit') == 1)  checked @endif id="c21" name="credit" class="main-checkbox" >
                                        <label for="c21"><span></span>{{ Lang::get('listing.cre') }}</label><br>
                                    </div>

                                    <div class="checkboxGroup" style=" margin-left: 10px;  padding: 10px;">
                                        <input type="checkbox" value="1" @if(old('bankruptcy') == 1)  checked @endif id="c19" name="bankruptcy" class="main-checkbox" >
                                        <label for="c19"><span></span>{{ Lang::get('pages.bank') }}-{{ Lang::get('listing.h_o') }} <input name="ba_ye" value="{{ old('ba_ye') }}" class="input_no_border" type="text">yr(s)</label><br>
                                    </div>
                                    <div class="checkboxGroup" style=" margin-left: 10px;  padding: 10px;">
                                        <input type="checkbox" value="1" @if(old('foreclosure') == 1)  checked @endif id="c20" name="foreclosure" class="main-checkbox" >
                                        <label for="c20"><span></span>{{ Lang::get('listing.forec') }}-{{ Lang::get('listing.h_o') }} <input name="fo_ye" value="{{ old('fo_ye') }}" class="input_no_border" type="text">yr(s)</label><br>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-lg-6 margin-top-15">
                                    <div class="checkboxGroup" style=" margin-left: 10px;  padding: 10px;">
                                        <input type="checkbox" value="1" @if(old('office') == 1)  checked @endif id="office" name="foreclosure" class="main-checkbox" >
                                        <label for="office"><span></span>{{ Lang::get('pages.office') }} <button  type="button" class="btn btn-primary shome pull-right"  style="margin-left: 20px;"><i class="fa fa-info"></i></button></label><br>
                                    </div>
                                    <div class="checkboxGroup" style=" margin-left: 10px;  padding: 10px;">
                                        <input type="checkbox" value="1" @if(old('crimes') == 1)  checked @endif id="crimes" name="foreclosure" class="main-checkbox" >
                                        <label for="crimes"><span></span>{{ Lang::get('pages.crimes') }} <button  type="button" class="btn btn-primary sprofile pull-right"  style="margin-left: 20px;"><i class="fa fa-info"></i></button></label><br>
                                    </div>
                                    <div class="checkboxGroup" style=" margin-left: 10px;  padding: 10px;">
                                        <input type="checkbox" value="1" @if(old('justi') == 1)  checked @endif id="justi" name="foreclosure" class="main-checkbox" >
                                        <label for="justi"><span></span>{{ Lang::get('pages.justi') }} <button  type="button" class="btn btn-primary smessages pull-right" style="margin-left: 20px;" ><i class="fa fa-info"></i></button></label><br>
                                    </div>
                                    <div class="checkboxGroup" style=" margin-left: 10px;  padding: 10px;">
                                        <input type="checkbox" value="1" @if(old('victim') == 1)  checked @endif id="victim" name="foreclosure" class="main-checkbox" >
                                        <label for="victim"><span></span>{{ Lang::get('pages.victim') }} <button  type="button" class="btn btn-primary ssettings pull-right" style="margin-left: 20px;" ><i class="fa fa-info"></i></button></label><br>
                                    </div>
                                    <div class="checkboxGroup" style=" margin-left: 10px;  padding: 10px;">
                                        <input type="checkbox" value="1" @if(old('minor') == 1)  checked @endif id="minor" name="foreclosure" class="main-checkbox" >
                                        <label for="minor"><span></span>Minor Offences <button  type="button" class="btn btn-primary sminor pull-right" style="margin-left: 20px;" ><i class="fa fa-info"></i></button></label><br>
                                    </div>
                                    <div class="apartment-stacked-tabs">
                                        <!-- Nav tabs -->
                                        <div class="tab-content " style="padding: 0px; border:none;">
                                            <div role="tabpanel" class="tab-pane " id="shome">
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
                                            <div role="tabpanel" class="tab-pane " id="sminor">
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
                                                        <li>
                                                            <span class="custom-ul-bullet"></span>
                                                                Recreational Drug Use

                                                        </li>
                                                    </div>
                                                    <div class="col-lg-6 col-xs-12">
                                                        <li>
                                                            <span class="custom-ul-bullet"></span>
                                                            Public Intoxication
                                                        </li>

                                                        <li>
                                                            <span class="custom-ul-bullet"></span>
                                                            Other
                                                        </li>

                                                        <li>
                                                            <span class="custom-ul-bullet"></span>
                                                            Minor Drug Charge
                                                        </li>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                </ul>
                                            </div>
                                            <div role="tabpanel" class="tab-pane" id="sprofile">
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
                                            <div role="tabpanel" class="tab-pane" id="smessages">
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
                                            <div role="tabpanel" class="tab-pane" id="ssettings">
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
                                        </div>
                                    </div>
                                </div>
                            </div>
                                <div class="descriptionAmenitiesWrapper">
                                <div class="grid">
                                    <div class="col-xs-12">
                                        <h4 class="special-color" style="font-size: 24px;margin-top: 10px;margin-bottom: 20px;">{{ Lang::get('listing.descirption') }} </h4>
                                    </div>
                                </div>
                                <div class="grid">
                                    <textarea id="description" name="description"  rows="6" class="input-full main-input property-textarea" placeholder="{{ Lang::get('listing.tell_us') }}" title="">{{ old('description') }}</textarea>
                                </div>
                                <div class="grid">
                                    <div class="col-xs-12 margin-top-15">
                                        <div class="row">
                                            <div class="checkboxGroup" style="  float:left; margin-left: 10px;  padding: 10px;">
                                                <input type="checkbox" value="1" @if(old('dogs') == 1)  checked @endif id="c10" name="dogs" class="main-checkbox" >
                                                <label for="c10"><span></span>{{ Lang::get('listing.dogs_ok') }}</label><br>
                                            </div>
                                            <div class="checkboxGroup" style="  float:left; margin-left: 10px;  padding: 10px;">
                                                <input type="checkbox" value="1" @if(old('loft_box') == 1)  checked @endif id="c100" name="loft_box" class="main-checkbox" >
                                                <label for="c100"><span></span>{{Lang::get('listing.Lofts_box')}}</label><br>
                                            </div>
                                            <div class="checkboxGroup" style="  float:left; margin-left: 10px;  padding: 10px;">
                                                <input type="checkbox" value="1" @if(old('all_box') == 1)  checked @endif id="Dens_box" name="all_box" class="main-checkbox" >
                                                <label for="Dens_box"><span></span>{{Lang::get('listing.Dens_box')}} </label><br>
                                            </div>
                                            <div class="checkboxGroup" style="  float:left; margin-left: 10px;  padding: 10px;">
                                                <input type="checkbox" value="1" @if(old('all_bills') == 1)  checked @endif id="All_Bills" name="all_bills" class="main-checkbox" >
                                                <label for="All_Bills"><span></span>{{Lang::get('listing.All_Bills')}}</label><br>
                                            </div>
                                            <div class="checkboxGroup" style="  float:left; margin-left: 10px;  padding: 10px;">
                                                <input type="checkbox" value="1" @if(old('all_townl') == 1)  checked @endif id="Townhomes" name="all_townl" class="main-checkbox" >
                                                <label for="Townhomes"><span></span>{{Lang::get('listing.Townhomes')}} </label><br>
                                            </div>
                                            <div class="checkboxGroup" style="  float:left; margin-left: 10px;  padding: 10px;">
                                                <input type="checkbox" value="1" @if(old('cats') == 1)  checked @endif id="c2" name="cats" class="main-checkbox">
                                                <label for="c2"><span></span>{{ Lang::get('listing.cats_ok') }}</label><br>
                                            </div>
                                            <div class="checkboxGroup" style="  float:left; margin-left: 10px;  padding: 10px;">
                                                <input type="checkbox" id="c3" @if(old('no_pets') == 1)  checked @endif name="no_pets" value="1" class="main-checkbox">
                                                <label for="c3"><span></span>{{ Lang::get('listing.no_pets') }}</label><br>
                                            </div>
                                            <div class="checkboxGroup" style="  float:left; margin-left: 10px;  padding: 10px;">
                                                <input type="checkbox" id="c4" @if(old('furnished') == 1)  checked @endif name="furnished" value="1" class="main-checkbox">
                                                <label for="c4"><span></span>{{ Lang::get('listing.furnished') }}</label><br>
                                            </div>
                                            <div class="checkboxGroup" style="  float:left; margin-left: 10px;  padding: 10px;">
                                                <input type="checkbox" value="1" @if(old('no_smocking') == 1)  checked @endif id="c5" name="no_smocking" class="main-checkbox">
                                                <label for="c5"><span></span>{{ Lang::get('listing.no_smo') }}</label><br>
                                            </div>
                                            <div class="checkboxGroup" style="  float:left; margin-left: 10px;  padding: 10px;">
                                                <input type="checkbox"  value="1" @if(old('wheelchair') == 1)  checked @endif id="c6" name="wheelchair" class="main-checkbox">
                                                <label for="c6"><span></span>{{ Lang::get('listing.wheel_access') }}</label>
                                            </div>
                                            <div class="checkboxGroup" style="  float:left; margin-left: 10px;  padding: 10px;">
                                                <input type="checkbox"  value="1" @if(old('washer_dryer') == 1)  checked @endif id="c11" name="washer_dryer" class="main-checkbox">
                                                <label for="c11"><span></span>{{ Lang::get('pages.w_ad') }}</label>
                                            </div>
                                            <div class="checkboxGroup" style="  float:left; margin-left: 10px;  padding: 10px;">
                                                <input type="checkbox"  value="1" @if(old('washer_dryer_hockups') == 1)  checked @endif id="c7" name="washer_dryer_hockups" class="main-checkbox">
                                                <label for="c7"><span></span>{{ Lang::get('pages.w_h') }}</label>
                                            </div>
                                            <div class="checkboxGroup" style="  float:left; margin-left: 10px;  padding: 10px;">
                                                <input type="checkbox"  value="1" @if(old('onsite_laundry') == 1)  checked @endif id="c8" name="onsite_laundry" class="main-checkbox">
                                                <label for="c8"><span></span>{{ Lang::get('pages.o_n') }}</label>
                                            </div>
                                            <div class="checkboxGroup" style="  float:left; margin-left: 10px;  padding: 10px;">
                                                <input type="checkbox"  value="1" @if(old('fitness_center') == 1)  checked @endif id="c9" name="fitness_center" class="main-checkbox">
                                                <label for="c9"><span></span>{{ Lang::get('pages.f_c') }}</label>
                                            </div>
                                            <div class="checkboxGroup" style="  float:left; margin-left: 10px;  padding: 10px;">
                                                <input type="checkbox"  value="1" @if(old('pool') == 1)  checked @endif id="c40" name="pool" class="main-checkbox">
                                                <label for="c40"><span></span>{{ Lang::get('pages.p_l') }}</label>
                                            </div>
                                            <div class="checkboxGroup" style="  float:left; margin-left: 10px;  padding: 10px;">
                                                <input type="checkbox"  value="1" @if(old('yard') == 1)  checked @endif id="c41" name="yard" class="main-checkbox">
                                                <label for="c41"><span></span>{{ Lang::get('pages.yard') }}</label>
                                            </div>
                                            <div class="checkboxGroup" style="  float:left; margin-left: 10px;  padding: 10px;">
                                                <input type="checkbox"  value="1" @if(old('hard_floor') == 1)  checked @endif id="c42" name="hard_floor" class="main-checkbox">
                                                <label for="c42"><span></span>{{ Lang::get('pages.h_f') }}</label>
                                            </div>
                                            <div class="checkboxGroup" style="  float:left; margin-left: 10px;  padding: 10px;">
                                                <input type="checkbox"  value="1" @if(old('wal_closet') == 1)  checked @endif id="c43" name="wal_closet" class="main-checkbox">
                                                <label for="c43"><span></span>{{ Lang::get('pages.w_cl') }}</label>
                                            </div>
                                            <div class="checkboxGroup" style="  float:left; margin-left: 10px;  padding: 10px;">
                                                <input type="checkbox"  value="1" @if(old('updated_kitchen') == 1)  checked @endif id="c44" name="updated_kitchen" class="main-checkbox">
                                                <label for="c44"><span></span>{{ Lang::get('pages.upde_kitc') }}</label>
                                            </div>
                                            <div class="checkboxGroup" style="  float:left; margin-left: 10px;  padding: 10px;">
                                                <input type="checkbox"  value="1" @if(old('close_public') == 1)  checked @endif id="c45" name="close_public" class="main-checkbox">
                                                <label for="c45"><span></span>{{ Lang::get('pages.clo_tr') }}</label>
                                            </div>
                                            <div class="checkboxGroup" style="  float:left; margin-left: 10px;  padding: 10px;">
                                                <input type="checkbox"  value="1" @if(old('dog_park') == 1)  checked @endif id="c46" name="dog_park" class="main-checkbox">
                                                <label for="c46"><span></span>{{ Lang::get('pages.d_pa') }}</label>
                                            </div>
                                            <div class="checkboxGroup" style="float:left; margin-left: 10px;  padding: 10px;">
                                                <input type="checkbox" value="1" @if(old('move_in') == 1)  checked @endif id="c22" name="move_in" class="main-checkbox" >
                                                <label for="c22"><span></span>{{ Lang::get('listing.m_i_s') }}</label><br>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="grid">
                                    <div class="cell-sm-4">
                                        <select multiple id="parking" class="selectpicker parking" name="parking_type[]"  title="" style="display: none;">
                                            <option value="1" @if(old('parking_type') == 1)  selected @endif>{{ Lang::get('listing.surfact_lot') }}</option>
                                            <option value="3" @if(old('parking_type') == 3)  selected @endif>{{ Lang::get('listing.covered') }}</option>
                                            <option value="4" @if(old('parking_type') == 4)  selected @endif>{{ Lang::get('listing.street') }}</option>
                                            <option value="5" @if(old('parking_type') == 5)  selected @endif>{{ Lang::get('listing.garage') }}</option>
                                            <option value="7" @if(old('parking_type') == 7)  selected @endif>{{ Lang::get('listing.other') }}</option>
                                        </select>
                                    </div>
                                    <div class="cell-sm-4">
                                        <input id="parkingFee-clone" name="parking_fee" value="{{ old('parking_fee') }}" type="text" placeholder="{{ Lang::get('listing.parking_fee') }}" class="input-full main-input" maxlength="11" title="" style="text-align: right;">
                                    </div>
                                </div>
                            </div>
                            <div class="termswrapper">
                                <div class="grid">
                                    <div class="checkboxGroup terms col-sm-7">
                                        <input id="agree" name="agree" type="checkbox" class="main-checkbox" data-bind="checked: Extras.IsAgreed" title="">
                                        <label for="agree">
                                        <span></span>
                                        </label>
                                        <div>
                                            {{ Lang::get('listing.long_first') }}
                                            <a href="{{ route('equalOpportunity') }}" target="_blank">{{ Lang::get('listing.non') }}</a>
                                            {{ Lang::get('listing.and') }}
                                            <a href="{{ route('termOfService') }}" target="_blank">{{ Lang::get('listing.terms') }}</a>
                                            and the
                                            <a href="{{ route('addAListingTerms') }}" target="_blank">{{ Lang::get('listing.listing_terms') }}</a>.
                                        </div>
                                        <div class="errorMsg" data-bind="validationMessage: Extras.IsAgreed" style="display: none;"></div>
                                    </div>
                                    <div class="col-sm-12 col-xs-12 col-md-4 col-lg-4 catpchat" style="margin-left: 68px">
                                        <div class="abs_red_non_vizible">

                                        </div>
                                        <br>
                                        {!! Recaptcha::render(['callback' => 'callback']) !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12">
                    <div class="row">
                        <div class="center-button-cont margin-top-60">
                            <button type="submit" id="submit_button" class="button-primary" >
                                <span>{{ Lang::get('listing.submit') }}</span>
                                <div class="button-triangle"></div>
                                <div class="button-triangle2"></div>
                                <div class="button-icon"><i class="fa fa-lg fa-home"></i></div>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</section>
<div class="modal fade apartment-modal" id="capcha-modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <div class="modal-title">
                    <h1></h1>
                </div>
                <p class="negative-margin forgot-info">Please ensure that you are human</p>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>

@endsection
@section('scripts')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script type="text/javascript">

        $(function() {


            $('.shome').click(function () {
                $('.tab-pane').removeClass('active')
                $('#shome').addClass('active');
            });
            $('.smessages').click(function () {
                $('.tab-pane').removeClass('active')
                $('#smessages').addClass('active');
            });
            $('.ssettings').click(function () {
                $('.tab-pane').removeClass('active')
                $('#ssettings').addClass('active');
            });
            $('.sprofile').click(function () {
                $('.tab-pane').removeClass('active')
                $('#sprofile').addClass('active');
            });

            $('.sminor').click(function () {
                $('.tab-pane').removeClass('active')
                $('#sminor').addClass('active');
            });

            $(".availability").select2({
            })
            $("#parking").select2({
                placeholder: '{{ Lang::get('pages.p_a') }}'
            })
            $('#parking').on('select2:close', function (evt) {
                var uldiv = $('.select2-container').find('ul')
                var count = uldiv.find('li').length - 1;
                if(count <= 0){
                    uldiv.find("li").find(".select2-search__field").val('{{ Lang::get('pages.p_a') }}')
                }else{
                    uldiv.find("li").find(".select2-search__field").val('')
                    uldiv.html('<li style="font-weight: 600;font-size: 110%;padding: 12px;">' + count + ' items selected</li>')
                }
            });


           /* $('#submit_button').click(function (event) {
                var address = $('#geocomplete').val();
                $.ajax({
                    url : '{{ route('checkingAddress') }}',
                    type:'post',
                    data:{adr:address},
                    success:function (res) {
                        console.log(res);
                    }
                });
                event.stopImmediatePropagation();
                event.preventDefault()
            });*/
            $('#datepicker').daterangepicker({
                    singleDatePicker: true,
                    showDropdowns: true
                },
                function(start, end, label) {
                    var years = moment().diff(start, 'years');
                });
            initAutocompleteAddress()
            function initAutocompleteAddress(){
                autocomplete = new google.maps.places.Autocomplete(
                    (document.getElementById('geocomplete')),
                    {types: ['geocode']});

                // When the user selects an address from the dropdown, populate the address
                // fields in the form.
                google.maps.event.addListener(autocomplete, 'place_changed', function() {
                    var place = autocomplete.getPlace();
                   // console.log(place.address_components)
                    //console.log(place.address_components)
                   /* $.each(place.address_components, function (i, v) {
                        console.log(v.types[0], v.long_name)

                    })
                    $.ajax({
                        url:'/'
                        data
                    })*/
                });
            }
        });
    </script>
    <script>
        $( document ).ready( function () {


           (function() {
                var count = 1;

              $('#clone_button').click(function () {

                    var source = $('#cloning_area'),
                        clone = source.clone();
                    /*Incrementind Radio Buttons Id*/

                  /*Incrementind Radio Buttons name*/
                  clone.find(':input[type="radio"]').attr('name', function(i, val) {
                      return val + count;
                  });

                  /*Incrementind Radio Buttons  Label For*/
                    clone.find('label').attr('for' , function(i, val) {
                      return val + count;
                    })
                  clone.find('input[name="available_date[]"]').select2();
                  clone.find('.dropdown-toggle').remove();
                  clone.find('select').attr('id' , function(i, val) {
                      return val + count;
                  }).selectpicker()


                    clone.appendTo('#cloned_arae');

                    count++;
                });

            })();

            $("#listing_form").validate({
                ignore:"",
                rules: {
                    first_name: "required",
                    address: "required",
                    listing_type: {
                        required: true
                    },
                    beds_count: "required",
                    phone: "required",
                    last_name: "required",
                    email: {
                        required: true,
                        email: true
                    },
                    agree: "required",
                    description: "required",
                    state: "required",
                    zip_code: "required",
                    name: "required",
                    city: "required"
                },
                messages: {
                    first_name: "Please enter your First Name",
                    beds_count: "Please enter Beds count",
                    listing_type: "Please choose Listing Type",
                    address: "Please enter a address",
                    phone: "Please enter your Phone number",
                    last_name: "Please enter your Last Name",
                    password: {
                        required: "Please provide a password",
                        minlength: "Your password must be at least 5 characters long"
                    },
                    confirm_password: {
                        required: "Please provide a password",
                        minlength: "Your password must be at least 5 characters long",
                        equalTo: "Please enter the same password as above"
                    },
                    email: "Please enter a valid email address",
                    agree: "Please accept our policy"
                },
                errorElement: "em",
                errorPlacement: function (error, element) {
                    // Add the `help-block` class to the error element
                    error.addClass("help-block");

                    if (element.prop("type") === "radio" || element.prop("type") === "checkbox") {
                        error.insertAfter(element.next());
                    } else {
                        error.insertAfter(element);
                    }
                },
                highlight: function (element, errorClass, validClass) {
                    $(element).parents(".col-sm-5").addClass("has-error").removeClass("has-success");
                },
                unhighlight: function (element, errorClass, validClass) {
                    $(element).parents(".col-sm-5").addClass("has-success").removeClass("has-error");
                }
            });
            $(document).delegate('#save_for_later' , 'click'  ,function () {
                    var datas = $("#listing_form").serialize();
                    var recaptcha = $("#g-recaptcha-response").val();
                    if (recaptcha === "") {
                        $('.g-recaptcha').attr('style', 'border:2px solid red !important;width: 306px;height: 80px;');
                        $('.g-recaptcha').focus();
                    } else {
                        $('.g-recaptcha').attr('style', '');
                        $.ajax({
                            type: 'post',
                            url: '{{ route('saveListing') }}',
                            data: datas,
                            success: function (res) {
                                if (res.massage == 'true') {
                                    window.location.href = 'account/savedListings/'+res.id+''
                                }
                            },
                            error: function (data) {
                                var errors = data.responseJSON;
                                var mailfail = '<em id="email-error" class="error help-block">' + errors.email[0] + '</em>';
                                var fistfail = '<em id="email-error" class="error help-block">' + errors.first_name[0] + '</em>';
                                var lastfail = '<em id="email-error" class="error help-block">' + errors.last_name[0] + '</em>';
                                var phonefail = '<em id="email-error" class="error help-block">' + errors.phone[0] + '</em>';
                                $('.email_fails').append(mailfail);
                                $('.first_name_fails').append(fistfail);
                                $('.last_name_fails').append(lastfail);
                                $('.phone_fails').append(phonefail);
                            }
                        });
                    }
            });


            $("#listing_form").submit(function(event) {
               if( $("#listing_form").valid()) {
                   var recaptcha = $("#g-recaptcha-response").val();
                   if (recaptcha === "") {
                       event.preventDefault();
                       $('.g-recaptcha').attr('style', 'border:2px solid red !important;width: 306px;height: 80px;')
                   }
               }
            });

        });
    </script>
    <script type="text/javascript">
        function callback(){
            $('.g-recaptcha').attr('style', '');
        }
    </script>
@endsection
