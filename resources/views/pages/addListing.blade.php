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

<section class="section-light  section-top-shadow">
    <div class="container">
            <div class="center-button-cont" style="text-align: right">
                <button  type="button" class="button-secondary" id="save_for_later">
                    <span>Save for later</span>
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

                            <div class="grid">
                                <div class="col-xs-12">
                                    <h4 class="special-color" style="font-size: 24px;margin-top: 10px;margin-bottom: 20px; text-transform: capitalize">{{ Lang::get('listing.address') }}</h4>

                                   {{-- <input name="address" type="text" class="input-full main-input" placeholder="Search By Adress" style="width: 80%; float: left">
                                    <i class="fa fa-search" style="position: absolute;right: 243px;font-size: 29px;top: 8px;"></i>
                                    <input type="text" name="unit" class="input-full main-input" placeholder="Unit #" style="width: 20%; float:right;">--}}
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
                                        <input type="radio" class="primaryRadio" @if(old('listing_type') == 2) checked @endif value="2" id="propType2" name="listing_type" title="">
                                        <label  for="propType2"><span data-bind="text: Description" class="spanes">{{ Lang::get('listing.appartament') }}</span></label>
                                    </div>
                                </div>
                                <div class="col-sm-3" >
                                    <div class="radioGroup">
                                        <input type="radio" class="primaryRadio"  value="7" @if(old('listing_type') == 7) checked @endif id="propType7" name="listing_type" title="">
                                        <label  for="propType7"><span data-bind="text: Description" class="spanes">{{ Lang::get('listing.condo') }}</span></label>
                                    </div>
                                </div>
                                <div class="col-sm-3" >
                                    <div class="radioGroup">
                                        <input type="radio" class="primaryRadio"  value="5" @if(old('listing_type') == 5) checked @endif id="propType5" name="listing_type" title="">
                                        <label  for="propType5"><span data-bind="text: Description" class="spanes">{{ Lang::get('listing.townhome') }}</span></label>
                                    </div>
                                </div>
                                <div class="col-sm-3" >
                                    <div class="radioGroup">
                                        <input type="radio" class="primaryRadio"  value="3" @if(old('listing_type') == 3) checked @endif id="propType3" name="listing_type" title="">
                                        <label  for="propType3"><span data-bind="text: Description" class="spanes">{{ Lang::get('listing.single_home') }}</span></label>
                                    </div>
                                </div>
                            </div>
                            <div class="grid">
                                <div class="cell-sm-4">
                                    <h5 class="labeles">{{ Lang::get('listing.beds') }}</h5>
                                    <select name="beds_count" id="beds" class="selectpicker beds" data-bind="value: Details.BedType, options: Beds, optionsText: 'Description', optionsValue: 'Id'"  title="" style="display: none;">
                                        <option value="-1">Studio</option>
                                        <option value="1" @if(old('beds_count') == 1) selected @endif>1.0</option>
                                        <option value="2" @if(old('beds_count') == 2) selected @endif>2.0</option>
                                        <option value="3" @if(old('beds_count') == 3) selected @endif>3.0</option>
                                        <option value="4" @if(old('beds_count') == 4) selected @endif>4.0</option>
                                        <option value="5" @if(old('beds_count') == 5) selected @endif>5.0</option>
                                        <option value="6" @if(old('beds_count') == 6) selected @endif>6.0</option>
                                    </select>
                                </div>
                                <div class="cell-sm-4">
                                    <h5 class="labeles">{{ Lang::get('listing.baths') }}</h5>
                                    <select name="baths_count" id="baths" class="selectpicker baths" data-bind="value: Details.BathType, options: Baths, optionsText: 'Description', optionsValue: 'Id'"  title="" style="display: none;">
                                        <option value="0.5" @if(old('baths_count') == 0.5) selected @endif>0.5</option>
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
                                <div class="cell-sm-4">
                                    <h5 class="labeles">{{ Lang::get('listing.square') }}</h5>
                                    <input name="square_feet" value="{{ old('square_feet') }}" type="text" placeholder="SF" maxlength="9"   min="1" class="input-full main-input" title="">
                                </div>
                            </div>
                            <div class="grid">
                                <div class="col-sm-4">
                                    <h5 class="labeles">{{ Lang::get('listing.rent') }}</h5>
                                    <input name="rent" type="text" value="{{ old('rent') }}" class="input-full main-input" placeholder="0$">
                                </div>
                                <div class="col-sm-4">
                                    <h5 class="labeles">{{ Lang::get('listing.deposit') }}</h5>
                                    <input name="deposit" type="text" value="{{ old('deposit') }}" class="input-full main-input" placeholder="0$">
                                </div>
                                <div class="col-sm-2">
                                    <div id="dateAvailableWrapper" class="input-group date">
                                        <h5 class="labeles">
                                            {{ Lang::get('listing.available') }}
                                        </h5>
                                        <input value="{{ old('available_date') }}"  class="input-full main-input" id="datepicker" type="text" name="available_date" placeholder="Date" readonly=""  title="">
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <h5 class="labeles"> {{ Lang::get('listing.lase_length') }}</h5>
                                    <input name="lease_length"  value="{{ old('lease_length') }}" type="text" class="input-full main-input" placeholder="12 mos">
                                </div>
                            </div>
                            <div class="grid">
                                <div class="col-xs-12">
                                    <h4 class="special-color" style="font-size: 24px;margin-top: 10px;margin-bottom: 20px;">{{ Lang::get('listing.photos') }}</h4>
                                </div>
                            </div>
                            <div class="grid noMargin">
                                <div class="col-xs-12 ">
                                    <input id="file-upload" name="files[]" type="file" multiple="">
                                </div>
                            </div>
                            <div class="grid">
                                <div class="cell-xs-12">
                                    <h4 class="special-color" style="font-size: 24px;margin-top: 10px;margin-bottom: 20px;">{{ Lang::get('listing.contact') }}</h4>
                                </div>
                                <div class="cell-sm-4">
                                    <input name="first_name"  type="text" value="@if(Auth::user()) {{ Auth::user()->first_name }} @else {{ old('first_name') }} @endif" placeholder="{{ Lang::get('listing.first_name') }}" class="input-full main-input" maxlength="15"  title="">
                                </div>
                                <div class="cell-sm-4">
                                    <input name="last_name" type="text" value="@if(Auth::user()) {{ Auth::user()->last_name }} @else {{ old('last_name') }} @endif" placeholder="{{ Lang::get('listing.last_name') }}" class="input-full main-input" maxlength="25"  title="">
                                </div>

                                <div class="cell-sm-4">
                                    <input type="text" name="email"  value="@if(Auth::user()){{ Auth::user()->email }} @else {{ old('email') }}  @endif" placeholder="{{ Lang::get('listing.email') }}" class="input-full main-input" maxlength="100"  title="">
                                </div>
                                <div class="cell-sm-4">
                                    <input name="phone" value="@if(Auth::user()) {{ Auth::user()->phone }} @else  {{ old('phone') }}  @endif" type="text" placeholder="{{ Lang::get('listing.phone') }}" class="input-full main-input">
                                </div>
                                <div class="cell-sm-4">
                                    <select name="contact_type" class="selectpicker contactpreference" data-bind="options: ContactPreferenceTypes, optionsText: 'Description', optionsValue: 'Id', value: Contact.ContactPreference, optionsCaption: 'Contact Preference'"  title="" style="display: none;">
                                        <option value="">{{ Lang::get('listing.contact_ref') }}</option>
                                        <option value="3" @if(old('contact_type') == 3)  selected @endif>{{ Lang::get('listing.phone_email') }}</option>
                                        <option value="2" @if(old('contact_type') == 2)  selected  @endif>{{ Lang::get('listing.email_only') }}</option>
                                        <option value="1" @if(old('contact_type') == 1)  selected  @endif>{{ Lang::get('listing.phone_only') }}</option>
                                    </select>
                                </div>
                                <div class="cell-sm-4 ">
                                    <div class="">
                                        <input type="checkbox" id="c1"  @if(old('contact_type') == 3)  checked @endif name="contact_type" class="main-checkbox">
                                        <label for="c1" style="font-size: 15px"><span></span>{{ Lang::get('listing.hide_name') }}</label><br>
                                    </div>
                                </div>
                                <div class="cell-xs-12 msg">
                                    <span class="emailChangeMsg" data-bind="text: EmailChangeMsg"></span>
                                </div>
                            </div>
                            <div class="descriptionAmenitiesWrapper">
                                <div class="grid">
                                    <div class="col-xs-12">
                                        <h4 class="special-color" style="font-size: 24px;margin-top: 10px;margin-bottom: 20px;">{{ Lang::get('listing.descirption') }} <span style="color: #999;text-transform: lowercase;font-size: 16px;">({{ Lang::get('listing.optional') }})</span></h4>
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
                                        </div>
                                    </div>
                                </div>
                                <div class="grid">
                                    <div class="cell-sm-4">
                                        <select id="laundry" class="selectpicker laundry"  name="loundry_type" title="" style="display: none;">
                                            <option value="">{{ Lang::get('listing.laundry_type') }}</option>
                                            <option value="81" @if(old('loundry_type') == 81)  selected @endif>{{ Lang::get('listing.wash_dryer') }}</option>
                                            <option value="82" @if(old('loundry_type') == 82)  selected @endif>{{ Lang::get('listing.wash_hokup') }}</option>
                                            <option value="48" @if(old('loundry_type') == 48)  selected @endif>{{ Lang::get('listing.laundry_fac') }}</option>
                                            </select>
                                    </div>
                                    <div class="cell-sm-4">
                                        <select id="parking" class="selectpicker parking" name="parking_type"  title="" style="display: none;">
                                            <option value="">{{ Lang::get('listing.parking_type') }}</option>
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
                                    <div class="col-sm-4" style="margin-left: 68px">
                                        <br>
                                        {!! Recaptcha::render() !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12">
                    <div class="row">
                        <div class="center-button-cont margin-top-60">
                            <button type="submit" id="submit_button" class="button-primary">
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
                    agree: "required"
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
                    console.log(element);
                    // Add the `help-block` class to the error element
                    error.addClass("help-block");

                    if (element.prop("type") === "radio") {
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
            $(document).delegate('#save_for_later' , 'click'  ,function () {
            if( $("#listing_form").valid()){
                    var datas = $("#listing_form").serialize();
                    var recaptcha = $("#g-recaptcha-response").val();
                    if (recaptcha === "") {
                        event.preventDefault();
                        $('#capcha-modal').show();
                        $('#capcha-modal').addClass('in');
                    }else{
                        $.ajax({
                            type:'post',
                            url: '{{ route('saveListing') }}',
                            data: datas,
                            success:function(res){
                                console.log(res);
                            }
                        });
                    }

                }
            });


            $("#listing_form").submit(function(event) {
               if( $("#listing_form").valid()) {
                   var recaptcha = $("#g-recaptcha-response").val();
                   if (recaptcha === "") {
                       event.preventDefault();
                       $('#capcha-modal').show();
                       $('#capcha-modal').addClass('in');
                   }
               }
            });
            $('.close').click(function () {
                $('#capcha-modal').hide();
                $('#capcha-modal').removeClass('in');
            })
        });
    </script>
@endsection
