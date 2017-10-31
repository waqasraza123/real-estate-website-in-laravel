@extends('layouts.app')

@section('content')
    <section class="short-image no-padding blog-short-title">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-lg-12 short-image-title">
                    <h5 class="subtitle-margin second-color">{{ Lang::get('pages.add_listing') }}</h5>
                    <h1 class="second-color">my account</h1>
                    <div class="short-title-separator"></div>
                </div>
            </div>
        </div>
    </section>
    <section class="section-light section-top-shadow">
        <form name="offer-from" action="{{ route('postEditListing') }}" method="post" enctype="multipart/form-data">
            <input type="hidden" value="{{ $listing->id }}" name="listingid">
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

                                <div class="grid">
                                    <div class="col-xs-12">
                                        <h4 class="special-color" style="font-size: 24px;margin-top: 10px;margin-bottom: 20px; text-transform: capitalize">{{ Lang::get('listing.address') }}</h4>
                                        <div class="margin-top-60">
                                            <input value="{{ $listing->address }}" id="geocomplete" name="address" type="text" class="input-full main-input" placeholder="{{ Lang::get('listing.address') }}">
                                            <div id="submit-property-map" class="submit-property-map" style="height: 300px;"></div>
                                            <div class="row">
                                                <div class="col-xs-12 col-sm-6 margin-top-15">
                                                    <input name="lng" value="{{ $listing->lng }}" type="hidden" class="input-full main-input input-last" placeholder="Longitude" readonly="readonly">
                                                </div>
                                                <div class="col-xs-12 col-sm-6 margin-top-15">
                                                    <input name="lat" value="{{ $listing->lat }}" type="hidden" class="input-full main-input input-last" placeholder="Latitude" readonly="readonly">
                                                </div>
                                            </div>
                                        </div>
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
                                <div class="grid">
                                    <div class="col-sm-3" >
                                        <div class="radioGroup">
                                            <input type="radio" class="primaryRadio"  value="2" @if($listing->listing_type == '2')  checked  @endif id="propType2" name="listing_type" title="">
                                            <label  for="propType2"><span data-bind="text: Description" class="spanes">{{ Lang::get('listing.appartament') }}</span></label>
                                        </div>
                                    </div>
                                    <div class="col-sm-3" >
                                        <div class="radioGroup">
                                            <input type="radio" class="primaryRadio" @if($listing->listing_type == '7')  checked  @endif  value="7" id="propType7" name="listing_type" title="">
                                            <label  for="propType7"><span data-bind="text: Description" class="spanes">{{ Lang::get('listing.condo') }}</span></label>
                                        </div>
                                    </div>
                                    <div class="col-sm-3" >
                                        <div class="radioGroup">
                                            <input type="radio" class="primaryRadio" @if($listing->listing_type == '5')  checked  @endif  value="5" id="propType5" name="listing_type" title="">
                                            <label  for="propType5"><span data-bind="text: Description" class="spanes">{{ Lang::get('listing.townhome') }}</span></label>
                                        </div>
                                    </div>
                                    <div class="col-sm-3" >
                                        <div class="radioGroup">
                                            <input type="radio" class="primaryRadio" @if($listing->listing_type == '3')  checked  @endif  value="3" id="propType3" name="listing_type" title="">
                                            <label  for="propType3"><span data-bind="text: Description" class="spanes">{{ Lang::get('listing.single_home') }}</span></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="grid">
                                    <div class="col-sm-4">
                                        <h5 class="labeles">{{ Lang::get('listing.beds') }}</h5>
                                        <select name="beds_count" id="beds" class="selectpicker beds" data-bind="value: Details.BedType, options: Beds, optionsText: 'Description', optionsValue: 'Id'" required="true" title="" style="display: none;">
                                            <option value="">Studio</option>
                                            <option value="1" @if($listing->beds_count == '1')  selected  @endif>1.0</option>
                                            <option value="2" @if($listing->beds_count == '2')  selected  @endif>2.0</option>
                                            <option value="3" @if($listing->beds_count == '3')  selected  @endif>3.0</option>
                                            <option value="4" @if($listing->beds_count == '4')  selected  @endif>4.0</option>
                                            <option value="5" @if($listing->beds_count == '5')  selected  @endif>5.0</option>
                                            <option value="6" @if($listing->beds_count == '6')  selected  @endif>6.0</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-4">
                                        <h5 class="labeles">{{ Lang::get('listing.baths') }}</h5>
                                        <select name="baths_count" id="baths" class="selectpicker baths" data-bind="value: Details.BathType, options: Baths, optionsText: 'Description', optionsValue: 'Id'" required="true" title="" style="display: none;">
                                            <option value="0.5" @if($listing->baths_count == '0.5')  selected  @endif>0.5</option>
                                            <option value="1"   @if($listing->baths_count == '1')  selected  @endif>1.0</option>
                                            <option value="1.5" @if($listing->baths_count == '1.5')  selected  @endif>1.5</option>
                                            <option value="2"   @if($listing->baths_count == '2')  selected  @endif>2.0</option>
                                            <option value="2.5" @if($listing->baths_count == '2.5')  selected  @endif>2.5</option>
                                            <option value="3"   @if($listing->baths_count == '3')  selected  @endif>3.0</option>
                                            <option value="3.5" @if($listing->baths_count == '3.5')  selected  @endif>3.5</option>
                                            <option value="4"   @if($listing->baths_count == '4')  selected  @endif>4.0</option>
                                            <option value="4.5" @if($listing->baths_count == '4.5')  selected  @endif>4.5</option>
                                            <option value="5"   @if($listing->baths_count == '5')  selected  @endif>5.0</option>
                                            <option value="5.5" @if($listing->baths_count == '5.5')  selected  @endif>5.5</option>
                                            <option value="6"   @if($listing->baths_count == '6')  selected  @endif>6.0</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-4">
                                        <h5 class="labeles">{{ Lang::get('listing.square') }}</h5>
                                        <input name="square_feet" type="text" value="{{ $listing->square_feet }}" placeholder="SF" maxlength="9"  required="true" min="1" class="input-full main-input" title="">
                                    </div>
                                </div>
                                <div class="grid">
                                    <div class="col-sm-4">
                                        <h5 class="labeles">{{ Lang::get('listing.rent') }}</h5>
                                        <input name="rent" value="{{ $listing->rent }}" type="text" class="input-full main-input" placeholder="0$">
                                    </div>
                                    <div class="col-sm-4">
                                        <h5 class="labeles">{{ Lang::get('listing.deposit') }}</h5>
                                        <input name="deposit" value="{{ $listing->deposit }}" type="text" class="input-full main-input" placeholder="0$">
                                    </div>
                                    <div class="col-sm-2">
                                        <h5 class="labeles">
                                            {{ Lang::get('listing.available') }}
                                        </h5>
                                        <input  class="input-full main-input" id="datepicker" type="text" name="available_date" value="{{ Carbon\Carbon::parse($listing->available_date)->format('m/d/Y') }}" placeholder="Date" readonly="" required="true" title="">
                                    </div>
                                    <div class="col-sm-2">
                                        <h5 class="labeles">{{ Lang::get('listing.lase_length') }}</h5>
                                        <input name="lease_length" value="{{ $listing->lease_length }}" type="text" class="input-full main-input" placeholder="12 mos">
                                    </div>
                                </div>
                                <div class="grid">
                                    <div class="col-xs-12">
                                        <h4 class="special-color" style="font-size: 24px;margin-top: 10px;margin-bottom: 20px;">{{ Lang::get('listing.acceptable') }}</h4>
                                    </div>
                                </div>
                                <div class="grid">
                                        <div class="col-xs-12 col-lg-6 margin-top-15">
                                            <div class="row">
                                                <div class="checkboxGroup" style=" margin-left: 10px;  padding: 10px;">
                                                    <input type="checkbox" value="1" @if($listing->broken_lease == 1)  checked @endif id="c12" name="broken_lease" class="main-checkbox" >
                                                    <label for="c12"><span></span>Broken lease (how many/how old)</label><br>
                                                </div>
                                                <div class="checkboxGroup" style=" margin-left: 10px;  padding: 10px;">
                                                    <input type="checkbox" value="1" @if($listing->eviction == 1)  checked @endif id="c13" name="eviction" class="main-checkbox" >
                                                    <label for="c13"><span></span>Eviction (how many/how old)</label><br>
                                                </div>
                                                <div class="checkboxGroup" style=" margin-left: 10px;  padding: 10px;">
                                                    <input type="checkbox" value="1" @if($listing->misdemeanor == 1)  checked @endif id="c14" name="misdemeanor" class="main-checkbox" >
                                                    <label for="c14"><span></span>Misdemeanor (how old)</label><br>
                                                </div>
                                                <div class="checkboxGroup" style=" margin-left: 10px;  padding: 10px;">
                                                    <input type="checkbox" value="1" @if($listing->falonies == 1)  checked @endif id="c15" name="falonies" class="main-checkbox" >
                                                    <label for="c15"><span></span>Felonies (how old)</label><br>
                                                </div>
                                                <div class="checkboxGroup" style=" margin-left: 10px;  padding: 10px;">
                                                    <input type="checkbox" value="1" @if($listing->section_8 == 1)  checked @endif id="c16" name="section_8" class="main-checkbox" >
                                                    <label for="c16"><span></span>Section 8</label><br>
                                                </div>
                                                <div class="checkboxGroup" style=" margin-left: 10px;  padding: 10px;">
                                                    <input type="checkbox" value="1" @if($listing->hud == 1)  checked @endif id="c17" name="hud" class="main-checkbox" >
                                                    <label for="c17"><span></span>HUD</label><br>
                                                </div>
                                                <div class="checkboxGroup" style=" margin-left: 10px;  padding: 10px;">
                                                    <input type="checkbox" value="1" @if($listing->income_r == 1)  checked @endif id="c18" name="income_r" class="main-checkbox" >
                                                    <label for="c18"><span></span>Income Restricted</label><br>
                                                </div>
                                                <div class="checkboxGroup" style=" margin-left: 10px;  padding: 10px;">
                                                    <input type="checkbox" value="1" @if($listing->bankruptcy == 1)  checked @endif id="c19" name="bankruptcy" class="main-checkbox" >
                                                    <label for="c19"><span></span>Bankruptcy (how old)</label><br>
                                                </div>
                                                <div class="checkboxGroup" style=" margin-left: 10px;  padding: 10px;">
                                                    <input type="checkbox" value="1" @if($listing->foreclosure == 1)  checked @endif id="c20" name="foreclosure" class="main-checkbox" >
                                                    <label for="c20"><span></span>Foreclosure (how old)</label><br>
                                                </div>
                                                <div class="checkboxGroup" style=" margin-left: 10px;  padding: 10px;">
                                                    <input type="checkbox" value="1" @if($listing->credit == 1)  checked @endif id="c21" name="credit" class="main-checkbox" >
                                                    <label for="c21"><span></span>Credit</label><br>
                                                </div>
                                                <div class="checkboxGroup" style=" margin-left: 10px;  padding: 10px;">
                                                    <input type="checkbox" value="1" @if($listing->move_in == 1)  checked @endif id="c22" name="move_in" class="main-checkbox" >
                                                    <label for="c22"><span></span>Move-In Specials</label><br>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-lg-6 margin-top-15">
                                            <div class="row">
                                                <div class="checkboxGroup" style=" margin-left: 10px;  padding: 10px;">
                                                    <input type="checkbox" value="1" @if($listing->possession == 1)  checked @endif id="c23" name="possession" class="main-checkbox" >
                                                    <label for="c23"><span></span>Possession</label><br>
                                                </div>
                                                <div class="checkboxGroup" style=" margin-left: 10px;  padding: 10px;">
                                                    <input type="checkbox" value="1" @if($listing->possession_w == 1)  checked @endif id="c24" name="possession_w" class="main-checkbox" >
                                                    <label for="c24"><span></span>Possession w/intent to sell</label><br>
                                                </div>
                                                <div class="checkboxGroup" style=" margin-left: 10px;  padding: 10px;">
                                                    <input type="checkbox" value="1" @if($listing->assault == 1)  checked @endif id="c25" name="assault" class="main-checkbox" >
                                                    <label for="c25"><span></span>Assault</label><br>
                                                </div>
                                                <div class="checkboxGroup" style=" margin-left: 10px;  padding: 10px;">
                                                    <input type="checkbox" value="1" @if($listing->herassment == 1)  checked @endif id="c26" name="herassment" class="main-checkbox" >
                                                    <label for="c26"><span></span>Harassment</label><br>
                                                </div>
                                                <div class="checkboxGroup" style=" margin-left: 10px;  padding: 10px;">
                                                    <input type="checkbox" value="1" @if($listing->theft_of == 1)  checked @endif id="c27" name="theft_of" class="main-checkbox" >
                                                    <label for="c27"><span></span>Theft of habitat</label><br>
                                                </div>
                                                <div class="checkboxGroup" style=" margin-left: 10px;  padding: 10px;">
                                                    <input type="checkbox" value="1" @if($listing->dwi == 1)  checked @endif id="c28" name="dwi" class="main-checkbox" >
                                                    <label for="c28"><span></span>DWI</label><br>
                                                </div>
                                                <div class="checkboxGroup" style=" margin-left: 10px;  padding: 10px;">
                                                    <input type="checkbox" value="1" @if($listing->dui == 1)  checked @endif id="c29" name="dui" class="main-checkbox" >
                                                    <label for="c29"><span></span>DUI</label><br>
                                                </div>
                                                <div class="checkboxGroup" style=" margin-left: 10px;  padding: 10px;">
                                                    <input type="checkbox" value="1" @if($listing->disorderly == 1)  checked @endif id="c30" name="disorderly" class="main-checkbox" >
                                                    <label for="c30"><span></span>Disorderly conduct</label><br>
                                                </div>
                                                <div class="checkboxGroup" style=" margin-left: 10px;  padding: 10px;">
                                                    <input type="checkbox" value="1" @if($listing->theft == 1)  checked @endif id="c31" name="theft" class="main-checkbox" >
                                                    <label for="c31"><span></span>Theft</label><br>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <div class="grid">
                                    <div class="col-xs-12">
                                        <h4 class="special-color" style="font-size: 24px;margin-top: 10px;margin-bottom: 20px;">{{ Lang::get('listing.photos') }}</h4>
                                    </div>
                                </div>
                                <div class="grid">
                                    <div class="col-lg-10 col-lg-offset-1 col-xs-12">
                                        <div class="masonry-grid masonry-offers masonry-grid-short margin-top-60" style="position: relative;">
                                        @foreach($listing->ListingsImages()->get() as $images)
                                                <div class="masonry-grid-sizer"></div>
                                            <div class="masonry-grid-item" style="position: absolute; left: 0px; top: 0px;">
                                                <a href="#" class="zoom-cont2">
                                                    <div class="grid-offer-photo">
                                                        <img src=" {{ asset('assets/images').'/'.$images->image }}" class="zoom" alt="">
                                                        <div class="type-container">
                                                            @if($images->featured == '1')
                                                                <a href="" class="transaction-type" style="cursor: pointer;color: white; margin-right: 10px">  Featured</a>
                                                            @else
                                                                <a href="{{ route('makeFeatureImage' , ['id' => $images->id , 'listing_id' => $listing->id]) }}" class="estate-type" style="cursor: pointer;color: white; margin-right: 10px"> Make Featured</a>
                                                            @endif
                                                            <a href="{{ route('delListingImages' , ['id' => $images->id]) }}" class="estate-type" style="cursor: pointer;color: white">delete</a>
                                                        </div>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                </a>
                                            </div>
                                        @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class="grid noMargin">
                                    <div class="col-xs-12 ">
                                        <input id="file-upload" name="files[]"  type="file" multiple="">
                                    </div>
                                </div>
                                <div class="grid">
                                    <div class="col-xs-12">
                                        <h4 class="special-color" style="font-size: 24px;margin-top: 10px;margin-bottom: 20px;">Featured Image</h4>
                                    </div>
                                </div>
                                <div class="grid">
                                    <div class="col-xs-12">
                                        <input type="file" name="featured" >
                                    </div>
                                </div>
                                <div class="descriptionAmenitiesWrapper">
                                    <div class="grid">
                                        <div class="col-xs-12">
                                            <h4 class="special-color" style="font-size: 24px;margin-top: 10px;margin-bottom: 20px;">{{ Lang::get('listing.descirption') }}<span style="color: #999;text-transform: lowercase;font-size: 16px;">({{ Lang::get('listing.optional') }})</span></h4>
                                        </div>
                                    </div>
                                    <div class="grid">
                                        <textarea id="description"  name="description" rows="6" class="input-full main-input property-textarea" placeholder="{{ Lang::get('listing.tell_us') }}" title="">{{ $listing->description }}</textarea>
                                    </div>
                                    <div class="grid">
                                        <div class="col-xs-12 margin-top-15">
                                            <div class="row">
                                                <div class="checkboxGroup" style="  float:left; margin-left: 10px;  padding: 10px;">
                                                    <input type="checkbox" @if($listing->dogs == '1')  checked  @endif value="1" id="c10" name="dogs" class="main-checkbox">
                                                    <label for="c10"><span></span>{{ Lang::get('listing.dogs_ok') }}</label><br>
                                                </div>
                                                <div class="checkboxGroup" style="  float:left; margin-left: 10px;  padding: 10px;">
                                                    <input type="checkbox"@if($listing->cats == '1')  checked  @endif value="1" id="c2" name="cats" class="main-checkbox">
                                                    <label for="c2"><span></span>{{ Lang::get('listing.cats_ok') }}</label><br>
                                                </div>
                                                <div class="checkboxGroup" style="  float:left; margin-left: 10px;  padding: 10px;">
                                                    <input type="checkbox" @if($listing->no_pets == '1')  checked  @endif id="c3" name="no_pets" value="1" class="main-checkbox">
                                                    <label for="c3"><span></span>{{ Lang::get('listing.no_pets') }}</label><br>
                                                </div>
                                                <div class="checkboxGroup" style="  float:left; margin-left: 10px;  padding: 10px;">
                                                    <input type="checkbox" @if($listing->furnished == '1')  checked  @endif id="c4" name="furnished" value="1" class="main-checkbox">
                                                    <label for="c4"><span></span>{{ Lang::get('listing.furnished') }}</label><br>
                                                </div>
                                                <div class="checkboxGroup" style="  float:left; margin-left: 10px;  padding: 10px;">
                                                    <input type="checkbox" @if($listing->no_smocking == '1')  checked  @endif value="1" id="c5" name="no_smocking" class="main-checkbox">
                                                    <label for="c5"><span></span>{{ Lang::get('listing.no_smo') }}</label><br>
                                                </div>
                                                <div class="checkboxGroup" style="  float:left; margin-left: 10px;  padding: 10px;">
                                                    <input type="checkbox" @if($listing->wheelchair == '1')  checked  @endif  value="1" id="c6" name="wheelchair" class="main-checkbox">
                                                    <label for="c6"><span></span>{{ Lang::get('listing.wheel_access') }}</label>
                                                </div>
                                                <div class="checkboxGroup" style="  float:left; margin-left: 10px;  padding: 10px;">
                                                    <input type="checkbox"  value="1" @if($listing->washer_dryer == 1)  checked @endif id="c11" name="washer_dryer" class="main-checkbox">
                                                    <label for="c11"><span></span>Washer Dryer</label>
                                                </div>
                                                <div class="checkboxGroup" style="  float:left; margin-left: 10px;  padding: 10px;">
                                                    <input type="checkbox"  value="1" @if($listing->washer_dryer_hockups == 1)  checked @endif id="c7" name="washer_dryer_hockups" class="main-checkbox">
                                                    <label for="c7"><span></span>Washer Dryer Hockups</label>
                                                </div>
                                                <div class="checkboxGroup" style="  float:left; margin-left: 10px;  padding: 10px;">
                                                    <input type="checkbox"  value="1" @if($listing->onsite_laundry == 1)  checked @endif id="c8" name="onsite_laundry" class="main-checkbox">
                                                    <label for="c8"><span></span>Onsite Laundry</label>
                                                </div>
                                                <div class="checkboxGroup" style="  float:left; margin-left: 10px;  padding: 10px;">
                                                    <input type="checkbox"  value="1" @if($listing->fitness_center == 1)  checked @endif id="c9" name="fitness_center" class="main-checkbox">
                                                    <label for="c9"><span></span>Fitness Center</label>
                                                </div>
                                                <div class="checkboxGroup" style="  float:left; margin-left: 10px;  padding: 10px;">
                                                    <input type="checkbox"  value="1" @if($listing->pool == 1)  checked @endif id="c10" name="pool" class="main-checkbox">
                                                    <label for="c10"><span></span>Pool</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="grid">
                                        <div class="col-sm-4">
                                            <select id="parking" class="selectpicker parking" name="parking_type"  title="" style="display: none;">
                                                <option value="">{{ Lang::get('listing.parking_type') }}</option>
                                                <option value="1" @if($listing->parking_type == '1')  selected  @endif>{{ Lang::get('listing.surfact_lot') }}</option>
                                                <option value="3" @if($listing->parking_type == '3')  selected  @endif>{{ Lang::get('listing.covered') }}</option>
                                                <option value="4" @if($listing->parking_type == '4')  selected  @endif>{{ Lang::get('listing.street') }}</option>
                                                <option value="5" @if($listing->parking_type == '5')  selected  @endif>{{ Lang::get('listing.garage') }}</option>
                                                <option value="7" @if($listing->parking_type == '7')  selected  @endif>{{ Lang::get('listing.other') }}</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-4">
                                            <input id="parkingFee-clone" value="{{ $listing->parking_fee }}" name="parking_fee" type="text" placeholder="{{ Lang::get('listing.parking_fee') }}" class="input-full main-input" maxlength="11" title="" style="text-align: right;" class="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="center-button-cont margin-top-60">
                            <button type="submit" class="button-primary">
                                <span>{{ Lang::get('listing.submit') }}</span>
                                <div class="button-triangle"></div>
                                <div class="button-triangle2"></div>
                                <div class="button-icon"><i class="fa fa-lg fa-home"></i></div>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </section>


@endsection
@section('scripts')
    <script type="text/javascript">
        $(function() {
            $('input[name="available_date"]').daterangepicker({
                    singleDatePicker: true,
                    showDropdowns: true
                },
                function(start, end, label) {
                    var years = moment().diff(start, 'years');
                });
        });
    </script>
    <script>
        $( document ).ready( function () {
            $("#listing_form").validate({
                rules: {
                    first_name: "required",
                    address: "required",
                    listing_type: "required",
                    beds_count: "required",
                    phone: "required",
                    last_name: "required",
                    email: {
                        required: true,
                        email: true
                    }
                },
                messages: {
                    first_name: "Please enter your Firstname",
                    beds_count: "Please enter Beds count",
                    listing_type: "Please choose Listing Type",
                    address: "Please enter a address",
                    phone: "Please enter your Phone number",
                    last_name: "Please enter your Lastname",
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

                    if (element.prop("type") === "checkbox") {
                        error.insertAfter(element.parent("label"));
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
        });
    </script>
@endsection
