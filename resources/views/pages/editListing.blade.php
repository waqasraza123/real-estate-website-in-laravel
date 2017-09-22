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
            <input type="hidden" value="{{ $listing->id }}" name="id">
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

                                        {{-- <input name="address" type="text" class="input-full main-input" placeholder="Search By Adress" style="width: 80%; float: left">
                                         <i class="fa fa-search" style="position: absolute;right: 243px;font-size: 29px;top: 8px;"></i>
                                         <input type="text" name="unit" class="input-full main-input" placeholder="Unit #" style="width: 20%; float:right;">--}}
                                        <div class="margin-top-60">
                                            <input value="{{ $listing->address }}" id="geocomplete" name="address" type="text" class="input-full main-input" placeholder="{{ Lang::get('listing.address') }}">
                                            <div id="submit-property-map" class="submit-property-map" style="height: 300px;"></div>
                                            <div class="row">
                                                <div class="col-xs-12 col-sm-6 margin-top-15">
                                                    <input name="lng" type="hidden" class="input-full main-input input-last" placeholder="Longitude" readonly="readonly">
                                                </div>
                                                <div class="col-xs-12 col-sm-6 margin-top-15">
                                                    <input name="lat" type="hidden" class="input-full main-input input-last" placeholder="Latitude" readonly="readonly">
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
                                    <div class="cell-sm-4">
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
                                    <div class="cell-sm-4">
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
                                    <div class="cell-sm-4">
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
                                        <div id="dateAvailableWrapper" class="input-group date">
                                            <h5 class="labeles">
                                                {{ Lang::get('listing.available') }}
                                            </h5>
                                            <input  class="input-full main-input" id="datepicker" type="text" name="available_date" value="{{ Carbon\Carbon::parse($listing->available_date)->format('m/d/Y') }}" placeholder="Date" readonly="" required="true" title="">
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <h5 class="labeles">{{ Lang::get('listing.lase_length') }}</h5>
                                        <input name="lease_length" value="{{ $listing->lease_length }}" type="text" class="input-full main-input" placeholder="12 mos">
                                    </div>
                                </div>
                                <div class="grid">
                                    <div class="col-xs-12">
                                        <h4 class="special-color" style="font-size: 24px;margin-top: 10px;margin-bottom: 20px;">{{ Lang::get('listing.photos') }}</h4>
                                    </div>
                                </div>
                                <div class="grid">
                                    <div class="col-xs-10 col-xs-offset-1">
                                        <div class="masonry-grid masonry-offers masonry-grid-short margin-top-60" style="position: relative;">
                                        @foreach($listing->ListingsImages()->get() as $images)
                                                <div class="masonry-grid-sizer"></div>
                                            <div class="masonry-grid-item" style="position: absolute; left: 0px; top: 0px;">
                                                <a href="#" class="zoom-cont2">
                                                    <div class="grid-offer-photo">
                                                        <img src=" {{ asset('assets/images').'/'.$images->image }}" class="zoom" alt="">
                                                        <div class="type-container">

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
                                            </div>
                                        </div>
                                    </div>
                                    <div class="grid">
                                        <div class="cell-sm-4">
                                            <select id="laundry" class="selectpicker laundry"  name="loundry_type" title="" style="display: none;">
                                                <option value="">{{ Lang::get('listing.laundry_type') }}</option>
                                                <option value="81" @if($listing->loundry_type == '81')  selected  @endif>{{ Lang::get('listing.wash_dryer') }}</option>
                                                <option value="82" @if($listing->loundry_type == '82')  selected  @endif>{{ Lang::get('listing.wash_hokup') }}</option>
                                                <option value="48" @if($listing->loundry_type == '48')  selected  @endif>{{ Lang::get('listing.laundry_fac') }}</option>
                                            </select>
                                        </div>
                                        <div class="cell-sm-4">
                                            <select id="parking" class="selectpicker parking" name="parking_type"  title="" style="display: none;">
                                                <option value="">{{ Lang::get('listing.parking_type') }}</option>
                                                <option value="1" @if($listing->parking_type == '1')  selected  @endif>{{ Lang::get('listing.surfact_lot') }}</option>
                                                <option value="3" @if($listing->parking_type == '3')  selected  @endif>{{ Lang::get('listing.covered') }}</option>
                                                <option value="4" @if($listing->parking_type == '4')  selected  @endif>{{ Lang::get('listing.street') }}</option>
                                                <option value="5" @if($listing->parking_type == '5')  selected  @endif>{{ Lang::get('listing.garage') }}</option>
                                                <option value="7" @if($listing->parking_type == '7')  selected  @endif>{{ Lang::get('listing.other') }}</option>
                                            </select>
                                        </div>
                                        <div class="cell-sm-4">
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
