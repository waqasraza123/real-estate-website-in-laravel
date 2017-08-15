@extends('layouts.app')

<style>
    .checkboxGroup{
        float:left;
        margin-left: 10px;
        padding: 10px;
    }
</style>
@section('content')
<section class="short-image no-padding blog-short-title">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-lg-12 short-image-title">
                <h5 class="subtitle-margin second-color">add listing</h5>
                <h1 class="second-color">my account</h1>
                <div class="short-title-separator"></div>
            </div>
        </div>
    </div>
</section>

<section class="section-light section-top-shadow">
    <form name="offer-from" action="#" enctype="multipart/form-data">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-md-12">
                    <h3 class="title-negative-margin">One step. Millions of renters<span class="special-color">.</span></h3>
                    <div class="title-separator-primary"></div>
                    <div class="dark-col margin-top-60">
                        <div class="row">
                            <div class="grid">
                                <div class="col-xs-12">
                                    <h4 class="special-color" style="font-size: 24px;margin-top: 10px;margin-bottom: 20px;">Details</h4>
                                    <br>
                                </div>
                            </div>
                            <div class="grid">
                                <div class="col-xs-12">
                                    <input name="adress" type="text" class="input-full main-input" placeholder="Search By Adress" style="width: 80%; float: left">
                                    <i class="fa fa-search" style="position: absolute;right: 243px;font-size: 29px;top: 8px;"></i>
                                    <input type="text" class="input-full main-input" placeholder="Unit #" style="width: 20%; float:right;">
                                </div>
                            </div>
                            <div class="grid">
                                <!-- ko foreach: PropertyTypes -->
                                <div class="col-xs-12">
                                    <br>
                                    <br>
                                    <h4 style="font-size: 24px;margin-top: 10px;margin-bottom: 20px;">
                                        Listing Type
                                    </h4>
                                    <br>
                                </div>
                            </div>
                            <div class="grid">
                                <div class="col-sm-3" >
                                    <div class="radioGroup">
                                        <input type="radio" class="primaryRadio"  value="2" id="propType2" name="ko_unique_1" title="">
                                        <label  for="propType2"><span data-bind="text: Description" class="spanes">Apartment</span></label>
                                    </div>
                                </div>
                                <div class="col-sm-3" >
                                    <div class="radioGroup">
                                        <input type="radio" class="primaryRadio"  value="7" id="propType7" name="ko_unique_2" title="">
                                        <label  for="propType7"><span data-bind="text: Description" class="spanes">Condo</span></label>
                                    </div>
                                </div>
                                <div class="col-sm-3" >
                                    <div class="radioGroup">
                                        <input type="radio" class="primaryRadio"  value="5" id="propType5" name="ko_unique_3" title="">
                                        <label  for="propType5"><span data-bind="text: Description" class="spanes">Townhome</span></label>
                                    </div>
                                </div>
                                <div class="col-sm-3" >
                                    <div class="radioGroup">
                                        <input type="radio" class="primaryRadio"  value="3" id="propType3" name="ko_unique_4" title="">
                                        <label  for="propType3"><span data-bind="text: Description" class="spanes">Single Family Home</span></label>
                                    </div>
                                </div>
                            </div>
                            <div class="grid">
                                <div class="cell-sm-4">
                                    <h5 class="labeles">Beds</h5>
                                    <select id="beds" class="selectpicker beds" data-bind="value: Details.BedType, options: Beds, optionsText: 'Description', optionsValue: 'Id'" required="true" title="" style="display: none;"><option value="-1">Studio</option><option value="1">1.0</option><option value="2">2.0</option><option value="3">3.0</option><option value="4">4.0</option><option value="5">5.0</option><option value="6">6.0</option></select>
                                </div>
                                <div class="cell-sm-4">
                                    <h5 class="labeles">Baths</h5>
                                    <select id="baths" class="selectpicker baths" data-bind="value: Details.BathType, options: Baths, optionsText: 'Description', optionsValue: 'Id'" required="true" title="" style="display: none;"><option value="0.5">0.5</option><option value="1">1.0</option><option value="1.5">1.5</option><option value="2">2.0</option><option value="2.5">2.5</option><option value="3">3.0</option><option value="3.5">3.5</option><option value="4">4.0</option><option value="4.5">4.5</option><option value="5">5.0</option><option value="5.5">5.5</option><option value="6">6.0</option></select>
                                </div>
                                <div class="cell-sm-4">
                                    <h5 class="labeles">Square Feet</h5>
                                    <input  type="text" placeholder="SF" maxlength="9"  required="true" min="1" class="input-full main-input" title="">
                                </div>
                            </div>
                            <div class="grid">
                                <div class="col-sm-4">
                                    <h5 class="labeles">Rent</h5>
                                    <input name="rent" type="text" class="input-full main-input" placeholder="0$">
                                </div>
                                <div class="col-sm-4">
                                    <h5 class="labeles">Deposit</h5>
                                    <input name="deposit" type="text" class="input-full main-input" placeholder="0$">
                                </div>
                                <div class="col-sm-2">
                                    <div id="dateAvailableWrapper" class="input-group date">
                                        <h5 class="labeles">
                                            Available
                                        </h5>
                                        <input class="input-full main-input" id="datepicker" type="text" name="datepicker" placeholder="Date" readonly="" required="true" title="">
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <h5 class="labeles">Lease Length</h5>
                                    <input name="bedrooms" type="text" class="input-full main-input" placeholder="12 mos">
                                </div>
                            </div>
                            <div class="grid">
                                <div class="col-xs-12">
                                    <h4 class="special-color" style="font-size: 24px;margin-top: 10px;margin-bottom: 20px;">Photos</h4>
                                </div>
                            </div>
                            <div class="grid noMargin">
                                <div class="col-xs-12 ">
                                    <input id="file-upload" name="files[]" type="file" multiple="">
                                </div>
                            </div>
                            <div class="grid">
                                <div class="cell-xs-12">
                                    <h4 class="special-color" style="font-size: 24px;margin-top: 10px;margin-bottom: 20px;">Contact</h4>
                                </div>
                                <div class="cell-sm-4">
                                    <input name="firstname" type="text" placeholder="First Name" class="input-full main-input" maxlength="15" required="true" title="">
                                </div>
                                <div class="cell-sm-4">
                                    <input name="lastname" type="text" placeholder="Last Name" class="input-full main-input" maxlength="25" required="true" title="">
                                </div>

                                <div class="cell-sm-4">
                                    <input type="text" name="email" placeholder="Email" class="input-full main-input" maxlength="100" required="true" title="">
                                </div>
                                <div class="cell-sm-4">
                                    <input name="phone" type="text" placeholder="Phone" class="input-full main-input">
                                </div>
                                <div class="cell-sm-4">
                                    <select name="contactpreference" class="selectpicker contactpreference" data-bind="options: ContactPreferenceTypes, optionsText: 'Description', optionsValue: 'Id', value: Contact.ContactPreference, optionsCaption: 'Contact Preference'" required="true" title="" style="display: none;"><option value="">Contact Preference</option><option value="3">Phone &amp; Email</option><option value="2">Phone Only</option><option value="1">Email Only</option></select>
                                </div>
                                <div class="cell-sm-4 ">
                                    <div class="">
                                        <input type="checkbox" id="c1" name="cc" class="main-checkbox">
                                        <label for="c1" style="font-size: 15px"><span></span>Hide my name on Apartments.com</label><br>
                                    </div>
                                </div>
                                <div class="cell-xs-12 msg">
                                    <span class="emailChangeMsg" data-bind="text: EmailChangeMsg"></span>
                                </div>
                            </div>
                            <div class="descriptionAmenitiesWrapper">
                                <div class="grid">
                                    <div class="col-xs-12">
                                        <h4 class="special-color" style="font-size: 24px;margin-top: 10px;margin-bottom: 20px;">Description & Amenities <span style="color: #999;text-transform: lowercase;font-size: 16px;">(optional)</span></h4>
                                    </div>
                                </div>
                                <div class="grid">
                                    <textarea id="description" name="description" rows="6" class="input-full main-input property-textarea" placeholder="Tell us about your place." title=""></textarea>
                                </div>
                                <div class="grid">
                                    <div class="col-xs-12 margin-top-15">
                                        <div class="row">
                                            <div class="checkboxGroup">
                                                <input type="checkbox" id="c10" name="cc" class="main-checkbox">
                                                <label for="c10"><span></span>Dogs ok</label><br>
                                            </div>
                                            <div class="checkboxGroup">
                                                <input type="checkbox" id="c2" name="cc" class="main-checkbox">
                                                <label for="c2"><span></span>Cats Ok</label><br>
                                            </div>
                                            <div class="checkboxGroup">
                                                <input type="checkbox" id="c3" name="cc" class="main-checkbox">
                                                <label for="c3"><span></span>No Pets</label><br>
                                            </div>
                                            <div class="checkboxGroup">
                                                <input type="checkbox" id="c4" name="cc" class="main-checkbox">
                                                <label for="c4"><span></span>Furnished</label><br>
                                            </div>
                                            <div class="checkboxGroup">
                                                <input type="checkbox" id="c5" name="cc" class="main-checkbox">
                                                <label for="c5"><span></span>No Smoking</label><br>
                                            </div>
                                            <div class="checkboxGroup">
                                                <input type="checkbox" id="c6" name="cc" class="main-checkbox">
                                                <label for="c6"><span></span>Wheelchair Access</label>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- <div class="col-xs-12 col-sm-4 col-md-6 col-lg-4 margin-top-15">
                                         <input type="checkbox" id="c7" name="cc" class="main-checkbox">
                                         <label for="c7"><span></span>Lift</label><br>
                                         <input type="checkbox" id="c8" name="cc" class="main-checkbox">
                                         <label for="c8"><span></span>Garage</label><br>
                                         <input type="checkbox" id="c9" name="cc" class="main-checkbox">
                                         <label for="c9"><span></span>Security</label><br>
                                         <input type="checkbox" id="c10" name="cc" class="main-checkbox">
                                         <label for="c10"><span></span>High Standard</label><br>
                                         <input type="checkbox" id="c11" name="cc" class="main-checkbox">
                                         <label for="c11"><span></span>City Centre</label><br>
                                         <input type="checkbox" id="c12" name="cc" class="main-checkbox">
                                         <label for="c12"><span></span>Furniture</label>
                                     </div>
                                     <div class="col-xs-12 col-sm-4 col-md-6 col-lg-4 margin-top-15">
                                         <input type="checkbox" id="c13" name="cc" class="main-checkbox">
                                         <label for="c13"><span></span>Another Option</label><br>
                                         <input type="checkbox" id="c14" name="cc" class="main-checkbox">
                                         <label for="c14"><span></span>Another Option</label><br>
                                         <input type="checkbox" id="c15" name="cc" class="main-checkbox">
                                         <label for="c15"><span></span>Another Option</label><br>
                                         <input type="checkbox" id="c16" name="cc" class="main-checkbox">
                                         <label for="c16"><span></span>Another Option</label><br>
                                         <input type="checkbox" id="c17" name="cc" class="main-checkbox">
                                         <label for="c17"><span></span>Another Option</label><br>
                                         <input type="checkbox" id="c18" name="cc" class="main-checkbox">
                                         <label for="c18"><span></span>Another Option</label>
                                     </div>--}}
                                </div>
                                <div class="grid">
                                    <div class="cell-sm-4">
                                        <select id="laundry" class="selectpicker laundry"  name="laundry" title="" style="display: none;"><option value="">Laundry Type</option><option value="81">Washer/Dryer</option><option value="82">Washer/Dryer Hookup</option><option value="48">Laundry Facilities</option></select>
                                    </div>
                                    <div class="cell-sm-4">
                                        <select id="parking" class="selectpicker parking" name="parking"  title="" style="display: none;"><option value="">Parking Type</option><option value="1">Surface Lot</option><option value="3">Covered</option><option value="4">Street</option><option value="5">Garage</option><option value="7">Other</option></select>
                                    </div>
                                    <div class="cell-sm-4">
                                        <input id="parkingFee-clone" name="parking_fee" type="text" placeholder="Parking Fee $ /mo" class="input-full main-input" maxlength="11" title="" style="text-align: right;" class="">
                                    </div>
                                </div>
                            </div>
                            <div class="termswrapper">
                                <div class="grid">
                                    <div class="checkboxGroup terms col-sm-7">
                                        <input id="agreeToTerms" type="checkbox" class="main-checkbox" data-bind="checked: Extras.IsAgreed" title="">
                                        <label for="agreeToTerms">
                                        <span>

                                        </span>
                                            By checking this box I agree as follows: I am the owner of this property or have authority to transact on behalf of this property; I will provide accurate and
                                            <a href="http://www.apartments.com/advertise/disclaimers/equal-opportunity-in-housing-statement/" target="_blank">non discriminatory</a>
                                            information; and I will comply with the
                                            <a href="http://www.apartments.com/advertise/disclaimers/terms-of-service/" target="_blank">Apartments.com Terms of Service</a>
                                            and the
                                            <a href="http://www.apartments.com/advertise/disclaimers/add-a-listing-terms-of-service/" target="_blank">Add a Listing Terms of Service</a>.
                                        </label>
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
                    <div class="center-button-cont margin-top-60">
                        <a href="#" class="button-primary">
                            <span>Submit rental</span>
                            <div class="button-triangle"></div>
                            <div class="button-triangle2"></div>
                            <div class="button-icon"><i class="fa fa-lg fa-home"></i></div>
                        </a>
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
            $('input[name="datepicker"]').daterangepicker({
                    singleDatePicker: true,
                    showDropdowns: true
                },
                function(start, end, label) {
                    var years = moment().diff(start, 'years');
                });
        });
    </script>
@endsection
