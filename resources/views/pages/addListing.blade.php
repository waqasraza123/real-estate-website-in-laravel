@extends('layouts.app')

@section('content')

    <script type="text/javascript">
        var LogManagerConfig = {
            Source: 'Apartments',
            PostUrl: '/services/log/',
            MachineKey: 'YxwBztCTXwXDODUAsYkPXA=='
        }

        window._moduleLoadTimeout = 30;
    </script>
    <div class="addEditWrapper" id="addEditWrapper" style="display: block;">
        <!-- Sticky Header -->
        <div class="stickyHeader js-stickyHeader" id="stickyHeader">
            <div class="cell-xs-12">

                <div class="overCenter">
                    <button type="button" class="primary inverted back"
                            data-bind="click: backtoListings, visible: isSignedIn()"><i
                                class="menuArrowLeftIcon"></i><span> Listings</span></button>
                    <i class="aptsLogoMarkIcon saveSpinner"
                       data-bind="css: { active: SupportAnimation() &amp;&amp; (IsSaving() || IsSubmitting()) }"></i>
                    <i class="spinner saveSpinner"
                       data-bind="css: { active: !SupportAnimation() &amp;&amp; (IsSaving() || IsSubmitting()) }"></i>
                    <!--Submit Listing Action Btn  Green-->
                    <button type="button" class="primary" id="headerSubmit"
                            data-bind="click: Save.bind($data, ButtonAction.Green), text: ButtonAction.Green.Text, visible: ShowActionButtons() &amp;&amp; !IsSaving() &amp;&amp; !IsSubmitting()">
                        Submit rental
                    </button>
                    <!--Save for Later Action Btn White-->
                    <button type="button" class="primary inverted" id="headerSave"
                            data-bind="click: Save.bind($data, ButtonAction.White), text: ButtonAction.White.Text, visible: ShowActionButtons() &amp;&amp; !IsSaving() &amp;&amp; !IsSubmitting()">
                        Save for later
                    </button>
                    <a class="marketingUrl" href="http://www.listonapartments.com/" target="_blank"
                       data-bind="visible: !isSignedIn() &amp;&amp; !StreetAddress()" style="display: none;">Why list
                        with us?</a>
                    <h1 data-bind="css: { center: isSignedIn() }" class="center"><span data-bind="text: StreetHeader">One step. Millions of renters.</span><span
                                class="cityStateHeader" data-bind="text: CityStateHeader"></span></h1>
                    <p class="savedMessage" data-bind="text: ListingSavedMessage"></p>
                </div>
            </div>
        </div>
        <!-- Sticky Header END-->
        <!-- Property Details -->
        <div class="propertyDetailsWrapper">

            <!--Title-->
            <div class="grid">
                <div class="cell-xs-12">
                    <h2>Details</h2>
                </div>
            </div>

            <!--Quick Search-->
            <div class="grid">
                <div class="cell-xs-12 quickSearch">
                    <input id="locationAddressLookup" type="search" placeholder="Search By Address"
                           data-bind="value: Location.AddressDisplay, attr: { disabled: ListingKey() }, css: { errorElem: Location.ErrorMessage() } "
                           class="" title="">
                    <i class="searchIcon"
                       data-bind="visible: !Location.AddressDisplay() &amp;&amp; !Location.ErrorMessage()"></i>
                    <i class="circleCheckmarkIcon"
                       data-bind="visible: Location.AddressDisplay() &amp;&amp; !Location.ErrorMessage() &amp;&amp; !OwnedListingError()"
                       style="display: none;"></i>
                    <i class="errorIcon" data-bind="visible: Location.ErrorMessage() || OwnedListingError()"
                       style="display: none;"></i>
                    <input id="locationUnitNumber" type="text" placeholder="Unit #" maxlength="5"
                           data-bind="value: Location.Address.UnitNumber, attr: { disabled: isUnitNumberDisabled() }"
                           required="true" title="">
                </div>
            </div>
            <div>
                <div class="quickSearchError">
                    <span class="errorMsg typeaheadError" data-bind="text: Location.ErrorMessage"></span>
                    <span class="errorMsg unitError" data-bind="validationMessage: Location.Address.UnitNumber"
                          style="display: none;"></span>
                </div>
            </div>
            <div class="grid" data-bind="visible: Location.AddressDisplay() &amp;&amp; Location.Geo.Latitude()"
                 style="display: none;">
                <div class="cell-xs-12">
                    <div class="mapArea">
                        <ul class="mapNavToolbar">
                            <li data-bind="click: zoomIn"><i class="mapZoomInIcon"></i></li>
                            <li data-bind="click: zoomOut" class="zoomOut"><i class="mapZoomOutIcon"></i></li>
                            <li data-bind="click: toggleMapType" class="mapType"><span
                                        data-bind="text: mapType() == 'road' ? 'Aerial' : 'Map' ">Aerial</span></li>
                        </ul>
                        <div id="map" class="mapArea"></div>
                    </div>
                </div>
            </div>
            <!--Listing Type-->
            <div class="grid">
                <div class="cell-xs-12">
                    <h3>Listing Type</h3>
                </div>
                <div class="cell-xs-12">
                    <form id="listingTypeRadios" class="listingRadios">
                        <!-- ko foreach: PropertyTypes -->
                        <div class="radioGroupWrapper"
                             data-bind="css: { errorElem: $parent.PropertyTypeErrorMessage() } ">
                            <div class="radioGroup">
                                <input type="radio" class="primaryRadio"
                                       data-bind="value: ko.observable($data.Id), checked: $parent.PropertyTypeId, attr: {id: 'propType' + $data.Id, disabled: $parent.ListingKey() }"
                                       value="2" id="propType2" name="ko_unique_1" title="">
                                <label data-bind="attr: { for: 'propType' + $data.Id }" for="propType2"><span
                                            data-bind="text: Description">Apartment</span></label>
                            </div>
                        </div>

                        <div class="radioGroupWrapper"
                             data-bind="css: { errorElem: $parent.PropertyTypeErrorMessage() } ">
                            <div class="radioGroup">
                                <input type="radio" class="primaryRadio"
                                       data-bind="value: ko.observable($data.Id), checked: $parent.PropertyTypeId, attr: {id: 'propType' + $data.Id, disabled: $parent.ListingKey() }"
                                       value="7" id="propType7" name="ko_unique_2" title="">
                                <label data-bind="attr: { for: 'propType' + $data.Id }" for="propType7"><span
                                            data-bind="text: Description">Condo</span></label>
                            </div>
                        </div>

                        <div class="radioGroupWrapper"
                             data-bind="css: { errorElem: $parent.PropertyTypeErrorMessage() } ">
                            <div class="radioGroup">
                                <input type="radio" class="primaryRadio"
                                       data-bind="value: ko.observable($data.Id), checked: $parent.PropertyTypeId, attr: {id: 'propType' + $data.Id, disabled: $parent.ListingKey() }"
                                       value="5" id="propType5" name="ko_unique_3" title="">
                                <label data-bind="attr: { for: 'propType' + $data.Id }" for="propType5"><span
                                            data-bind="text: Description">Townhome</span></label>
                            </div>
                        </div>

                        <div class="radioGroupWrapper"
                             data-bind="css: { errorElem: $parent.PropertyTypeErrorMessage() } ">
                            <div class="radioGroup">
                                <input type="radio" class="primaryRadio"
                                       data-bind="value: ko.observable($data.Id), checked: $parent.PropertyTypeId, attr: {id: 'propType' + $data.Id, disabled: $parent.ListingKey() }"
                                       value="3" id="propType3" name="ko_unique_4" title="">
                                <label data-bind="attr: { for: 'propType' + $data.Id }" for="propType3"><span
                                            data-bind="text: Description">Single Family Home</span></label>
                            </div>
                        </div>
                        <!-- /ko -->
                    </form>
                </div>
            </div>
            <div class="grid">
                <div class="cell-xs-12">
                    <span class="errorMsg" data-bind="text: PropertyTypeErrorMessage"></span>
                </div>
            </div>
            <!--Listing Info Row 1-->
            <div class="grid">
                <div class="cell-sm-4">
                    <h3>Beds</h3>
                    <select id="beds" name="beds" class="btn-group bootstrap-select beds"
                            data-bind="value: Details.BedType, options: Beds, optionsText: 'Description', optionsValue: 'Id'"
                            required="true" title="" style="display: none;">
                        <option value="-1">Studio</option>
                        <option value="1">1.0</option>
                        <option value="2">2.0</option>
                        <option value="3">3.0</option>
                        <option value="4">4.0</option>
                        <option value="5">5.0</option>
                        <option value="6">6.0</option>
                    </select>
                    <div class="btn-group bootstrap-select beds">
                        <button type="button" class="btn dropdownToggle selectpicker btn-default" data-toggle="dropdown"
                                data-id="beds" title="1.0"><span class="filter-option pull-left">1.0</span>&nbsp;<span
                                    class="caret"></span></button>
                        <div class="dropdownMenu open" role="combobox">
                            <ul class="dropdownMenu inner selectpicker" role="menu">
                                <li rel="0"><a tabindex="0" class="" style=""><span class="text">Studio</span><i
                                                class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
                                <li rel="1" class="selected"><a tabindex="0" class="" style=""><span
                                                class="text">1.0</span><i
                                                class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
                                <li rel="2"><a tabindex="0" class="" style=""><span class="text">2.0</span><i
                                                class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
                                <li rel="3"><a tabindex="0" class="" style=""><span class="text">3.0</span><i
                                                class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
                                <li rel="4"><a tabindex="0" class="" style=""><span class="text">4.0</span><i
                                                class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
                                <li rel="5"><a tabindex="0" class="" style=""><span class="text">5.0</span><i
                                                class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
                                <li rel="6"><a tabindex="0" class="" style=""><span class="text">6.0</span><i
                                                class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <span class="errorMsg" data-bind="validationMessage: Details.BedType" style="display: none;"></span>
                </div>
                <div class="cell-sm-4">
                    <h3>Baths</h3>
                    <select id="baths" class="selectpicker baths"
                            data-bind="value: Details.BathType, options: Baths, optionsText: 'Description', optionsValue: 'Id'"
                            required="true" title="" style="display: none;">
                        <option value="0.5">0.5</option>
                        <option value="1">1.0</option>
                        <option value="1.5">1.5</option>
                        <option value="2">2.0</option>
                        <option value="2.5">2.5</option>
                        <option value="3">3.0</option>
                        <option value="3.5">3.5</option>
                        <option value="4">4.0</option>
                        <option value="4.5">4.5</option>
                        <option value="5">5.0</option>
                        <option value="5.5">5.5</option>
                        <option value="6">6.0</option>
                    </select>
                    <div class="btn-group bootstrap-select baths">
                        <button type="button" class="btn dropdownToggle selectpicker btn-default" data-toggle="dropdown"
                                data-id="baths" title="1.0"><span class="filter-option pull-left">1.0</span>&nbsp;<span
                                    class="caret"></span></button>
                        <div class="dropdownMenu open" role="combobox">
                            <ul class="dropdownMenu inner selectpicker" role="menu">
                                <li rel="0"><a tabindex="0" class="" style=""><span class="text">0.5</span><i
                                                class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
                                <li rel="1" class="selected"><a tabindex="0" class="" style=""><span
                                                class="text">1.0</span><i
                                                class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
                                <li rel="2"><a tabindex="0" class="" style=""><span class="text">1.5</span><i
                                                class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
                                <li rel="3"><a tabindex="0" class="" style=""><span class="text">2.0</span><i
                                                class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
                                <li rel="4"><a tabindex="0" class="" style=""><span class="text">2.5</span><i
                                                class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
                                <li rel="5"><a tabindex="0" class="" style=""><span class="text">3.0</span><i
                                                class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
                                <li rel="6"><a tabindex="0" class="" style=""><span class="text">3.5</span><i
                                                class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
                                <li rel="7"><a tabindex="0" class="" style=""><span class="text">4.0</span><i
                                                class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
                                <li rel="8"><a tabindex="0" class="" style=""><span class="text">4.5</span><i
                                                class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
                                <li rel="9"><a tabindex="0" class="" style=""><span class="text">5.0</span><i
                                                class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
                                <li rel="10"><a tabindex="0" class="" style=""><span class="text">5.5</span><i
                                                class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
                                <li rel="11"><a tabindex="0" class="" style=""><span class="text">6.0</span><i
                                                class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <span class="errorMsg" data-bind="validationMessage: Details.BathType"
                          style="display: none;"></span>
                </div>
                <div class="cell-sm-4">
                    <h3>Square Feet</h3>
                    <input id="sf" type="text" placeholder="SF" maxlength="9"
                           data-bind="value: Details.SquareFeet, inputMask: { maskType: 'integer', enable: true, customOptions: {allowMinus: false, suffix: ' SF'}}"
                           required="true" min="1" title="Please enter square footage." data-orig-title=""
                           style="display: none;"><input id="sf-clone" type="text" placeholder="SF" maxlength="9"
                                                         required="true" min="1" title="Please enter square footage."
                                                         data-orig-title="" style="text-align: right;">
                    <span class="errorMsg" data-bind="validationMessage: Details.SquareFeet"
                          style="display: none;"></span>
                </div>
            </div>
            <!--Listing Info Row 2-->
            <div class="grid">
                <div class="cell-xs-12 rowReset">
                    <div class="cell-sm-6 cell-md-4">
                        <h3>Rent</h3>
                        <input id="rent" type="text" placeholder="$ /mo" maxlength="8"
                               data-bind="value: Details.Rent, inputMask: { maskType: 'nodecimalcurrency', enable: true, customOptions: {allowMinus: false, suffix: ' /mo'}}"
                               required="true" min="1" max="999999" title="Please enter rent." data-orig-title=""
                               style="display: none;"><input id="rent-clone" type="text" placeholder="$ /mo"
                                                             maxlength="8" required="true" min="1" max="999999"
                                                             title="Please enter rent." data-orig-title=""
                                                             style="text-align: right;">
                        <span class="errorMsg" data-bind="validationMessage: Details.Rent"
                              style="display: none;"></span>
                    </div>
                    <div class="cell-sm-6 cell-md-4">
                        <h3>Deposit</h3>
                        <input id="deposit" type="text" placeholder="$0" maxlength="10"
                               data-bind="value: Details.Deposit, inputMask: { maskType: 'nodecimalcurrency', enable: true, customOptions: {allowMinus: false }}"
                               title="" style="display: none;"><input id="deposit-clone" type="text" placeholder="$0"
                                                                      maxlength="10" title=""
                                                                      style="text-align: right;">
                        <span class="errorMsg" data-bind="validationMessage: Details.Deposit"
                              style="display: none;"></span>
                    </div>
                    <div class="cell-sm-12 cell-md-4">
                        <div class="grid">
                            <div class="cell-xs-6 noPadding">
                                <h3>Available</h3>
                                <div id="dateAvailableWrapper" class="input-group date">
                                    <span class="input-group-addon" onclick="$('#datepicker').focus();"><i
                                                class="icon-th calendarIcon"></i></span>
                                    <input id="datepicker" type="text" data-bind="value: Details.DateAvailable"
                                           placeholder="Date" readonly="" required="true" title="">
                                </div>
                                <span class="errorMsg" data-bind="validationMessage: Details.DateAvailable"
                                      style="display: none;"></span>
                            </div>
                            <div class="cell-xs-6">
                                <h3>Lease Length</h3>
                                <input id="leaselength" type="text" placeholder="mos" maxlength="3" min="1" max="36"
                                       data-bind="value: Details.LeaseLength, inputMask: { maskType: 'integer', enable: true, customOptions: {allowMinus: false, suffix: ' mos', min: '1', max: '36'}}"
                                       required="true" title="" style="display: none;"><input id="leaselength-clone"
                                                                                              type="text"
                                                                                              placeholder="mos"
                                                                                              maxlength="3" min="1"
                                                                                              max="36" required="true"
                                                                                              title=""
                                                                                              style="text-align: right;">
                                <span class="errorMsg" data-bind="validationMessage: Details.LeaseLength"
                                      style="display: none;"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Photos-->
            <div class="grid">
                <div class="cell-xs-12">
                    <h2>Photos</h2>
                </div>
            </div>
            <div class="grid noMargin">

                <div class="photosWrapper"
                     data-bind="style:{'width' : Photos.Community().length == 0 ? '100%' : '' }, css: { 'nonDraggable' : !isBrowserDraggable }"
                     style="width: 100%;">

                    <!-- before photos are uploaded-->
                    <div class="noPhotos"
                         data-bind="visible: Photos.Community().length == 0, css: { 'dragOver' : noPhotosDropZoneDragOver }">
                        <div class="grid noMargin">
                            <!-- ko if: isBrowserDraggable-->
                            <div class="cell-sm-3">
                            <span data-bind="fileUpload: {
                                onAdd: handleOnAddPhoto,
                                onSend: handleOnSendPhoto,
                                onProgress: handleOnProgress,
                                onDone: handleOnDone,
                                onFail: handleOnFail,
								onFileDrop: handleFileDrop,
								onFileChange: handleFileChange,
                                clickPublisher: uploadPhotosListeners,
                                dropOnDocument : true,
                                dropZone: '.noPhotos',
                                dropZoneEnter : noPhotosdropZoneEnter,
                                dropZoneLeave: noPhotosdropZoneLeave,
                                autoUpload: false},
                                click: uploadPhotoClick">
                                <button type="button" class="primary inverted addPhotoBtn">Add Photos</button>
                            <input type="file" class="imageUpload" name="files[]" multiple=""></span>
                            </div>
                            <div class="cell-sm-9">
                                <h4 data-bind="visible: !noPhotosDropZoneDragOver()">Drop photos here or use the button
                                    on the left to add photos</h4>
                                <h4 class="dropPhotoText" data-bind="visible: noPhotosDropZoneDragOver"
                                    style="display: none;">Drop Photos Now</h4>
                            </div>
                            <!-- /ko-->
                            <!-- ko if: !isBrowserDraggable --><!-- /ko -->
                        </div>
                    </div>
                    <div class="photoSizeText"
                         data-bind="visible: Photos.Community().length == 0, css: { 'dragOver' : noPhotosDropZoneDragOver }">
                        Photos must be in jpg/jpeg, gif, or png format and at most 75 megabytes in size.
                    </div>

                    <!--After Photos Are Uploaded-->
                    <div class="withPhotos" data-bind="visible: Photos.Community().length > 0" style="display: none;">
                        <div class="grid">
                            <ul class="photosContainer ui-sortable"
                                data-bind="photoSortable: { data: Photos.Community, itemKey: 'key', options: { cursor: 'move', placeholder: 'cell-sm-3 sortPlaceHolder photoWrapper', tolerance: 'pointer', containment: '#addEditWrapper' } }"></ul>
                            <div class="cell-sm-3 photoDropContainer">
                                <div class="photoDropWrapper">
                                    <div class="photoDrop"
                                         data-bind="css: { 'dragOver' : withPhotosDropZoneDragOver, 'nonDraggable' : !isBrowserDraggable }">
                                        <div class="dropPhotoText" data-bind="visible: withPhotosDropZoneDragOver"
                                             style="display: none;">Drop Photos Now
                                        </div>
                                        <!-- ko if: isBrowserDraggable -->
                                        <div class="dragAndDropText" data-bind="visible: !withPhotosDropZoneDragOver()">
                                            Drop photos here or add photos using the button below.
                                        </div>
                                        <!-- /ko -->
                                        <!-- ko if: !isBrowserDraggable --><!-- /ko -->

                                        <span data-bind="fileUpload: {
                                        onAdd: handleOnAddPhoto,
                                        onSend: handleOnSendPhoto,
                                        onProgress: handleOnProgress,
                                        onDone: handleOnDone,
                                        onFail: handleOnFail,
										onFileDrop: handleFileDrop,
										onFileChange: handleFileChange,
                                        clickPublisher: uploadPhotosListeners,
                                        dropOnDocument : false,
                                        dropZone: '.photoDrop',
                                        dropZoneEnter: withPhotosdropZoneEnter,
                                        dropZoneLeave: withPhotosdropZoneLeave,
                                        autoUpload: false},
                                        click: uploadPhotoClick">
                                        <button class="primary inverted">Add Photos</button>
                                    <input type="file" name="files[]" multiple=""></span>
                                    </div>
                                    <div class="subText">
                                        Photos must be in jpg/jpeg, gif, or png format and at most 75 megabytes in size.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--Contact-->
            <div class="grid contactInfo">
                <div class="cell-xs-12">
                    <h2>Contact</h2>
                </div>
                <div class="cell-sm-4">
                    <input id="firstname" type="text" placeholder="First Name" data-bind="value: Contact.FirstName"
                           maxlength="15" required="true" title="">
                    <span class="errorMsg" data-bind="validationMessage: Contact.FirstName"
                          style="display: none;"></span>
                </div>
                <div class="cell-sm-4">
                    <input id="lastname" type="text" placeholder="Last Name" data-bind="value: Contact.LastName"
                           maxlength="25" required="true" title="">
                    <span class="errorMsg" data-bind="validationMessage: Contact.LastName"
                          style="display: none;"></span>
                </div>
                <div class="cell-sm-4 checkboxWrapper">
                    <div class="checkboxGroup">
                        <input id="hideContact" type="checkbox" class="primaryCheckbox"
                               data-bind="checked: Contact.HideMyPersonalInfo" title="">
                        <label for="hideContact"><span class="checkLabel">Hide my name on Apartments.com</span></label>
                    </div>
                </div>
                <div class="cell-sm-4 email">
                    <input type="text" id="email" placeholder="Email"
                           data-bind="value: Contact.Email, enable: enableEmail" maxlength="100" required="true"
                           title="">
                    <span class="errorMsg" data-bind="validationMessage: Contact.Email" style="display: none;"></span>
                </div>
                <div class="cell-sm-4">
                    <input id="phone" type="text" placeholder="Phone"
                           data-bind="value: Contact.Phone, inputMask: { maskType: 'phone', enable: true, customOptions: {placeholder: 'Phone'}}"
                           required="true" title="Please enter a phone number." data-orig-title=""
                           style="display: none;"><input id="phone-clone" type="text" placeholder="Phone"
                                                         required="true" title="Please enter a phone number."
                                                         data-orig-title="">
                    <span class="errorMsg" data-bind="validationMessage: Contact.Phone" style="display: none;"></span>
                </div>
                <div class="cell-sm-4">
                    <select id="contactpreference" class="selectpicker contactpreference"
                            data-bind="options: ContactPreferenceTypes, optionsText: 'Description', optionsValue: 'Id', value: Contact.ContactPreference, optionsCaption: 'Contact Preference'"
                            required="true" title="" style="display: none;">
                        <option value="">Contact Preference</option>
                        <option value="3">Phone &amp; Email</option>
                        <option value="2">Phone Only</option>
                        <option value="1">Email Only</option>
                    </select>
                    <div class="btn-group bootstrap-select contactpreference">
                        <button type="button" class="btn dropdownToggle selectpicker btn-default" data-toggle="dropdown"
                                data-id="contactpreference" title="Contact Preference"><span
                                    class="filter-option pull-left ddPlaceholder">Contact Preference</span>&nbsp;<span
                                    class="caret"></span></button>
                        <div class="dropdownMenu open" role="combobox">
                            <ul class="dropdownMenu inner selectpicker" role="menu">
                                <li rel="0" class="selected"><a tabindex="0" class="" style=""><span class="text">Contact Preference</span><i
                                                class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
                                <li rel="1"><a tabindex="0" class="" style=""><span
                                                class="text">Phone &amp; Email</span><i
                                                class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
                                <li rel="2"><a tabindex="0" class="" style=""><span class="text">Phone Only</span><i
                                                class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
                                <li rel="3"><a tabindex="0" class="" style=""><span class="text">Email Only</span><i
                                                class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <span class="errorMsg" data-bind="validationMessage: Contact.ContactPreference"
                          style="display: none;"></span>
                </div>
                <div class="cell-xs-12 msg">
                    <span class="emailChangeMsg" data-bind="text: EmailChangeMsg"></span>
                </div>
            </div>
            <!-- Property Details END-->
            <!-- Property Details -->
            <div class="descriptionAmenitiesWrapper">
                <div class="grid">
                    <div class="cell-sm-12">
                        <h2>Description &amp; Amenities <span>(Optional)</span></h2>
                    </div>
                </div>
                <!-- error msg-->
                <div class="grid">
                    <div class="cell-sm-12">
                        <textarea id="description" rows="6" data-bind="value: Extras.Description"
                                  placeholder="Tell us about your place." title=""></textarea>
                        <span class="errorMsg" data-bind="validationMessage: Extras.Description"
                              style="display: none;"></span>
                    </div>
                </div>
                <!--Amenities-->
                <div class="grid">
                    <div class="cell-xs-12 amenitiesCheckboxWrapper">
                        <div class="checkboxGroup">
                            <input id="dogOk" type="checkbox" data-bind="checked: Extras.IsDogAllowed"
                                   class="primaryCheckbox" title="">
                            <label for="dogOk"><span>Dogs OK</span></label>
                        </div>
                        <div class="checkboxGroup">
                            <input id="catOk" type="checkbox" data-bind="checked: Extras.IsCatAllowed"
                                   class="primaryCheckbox" title="">
                            <label for="catOk"><span>Cats OK</span></label>
                        </div>

                        <div class="checkboxGroup">
                            <input id="noPets" type="checkbox" data-bind="checked: Extras.IsPetsAllowed"
                                   class="primaryCheckbox" title="">
                            <label for="noPets"><span>No Pets</span></label>
                        </div>

                        <div class="checkboxGroup">
                            <input id="furnished" type="checkbox" data-bind="checked: Extras.IsFurnished"
                                   class="primaryCheckbox" title="">
                            <label for="furnished"><span>Furnished</span></label>
                        </div>

                        <div class="checkboxGroup">
                            <input id="noSmoking" type="checkbox" data-bind="checked: Extras.IsNoSmoking"
                                   class="primaryCheckbox" title="">
                            <label for="noSmoking"><span>No smoking</span></label>
                        </div>

                        <div class="checkboxGroup">
                            <input id="wheelchair" type="checkbox" data-bind="checked: Extras.IsWheelchairAccessible"
                                   class="primaryCheckbox" title="">
                            <label for="wheelchair"><span>Wheelchair Access</span></label>
                        </div>
                    </div>
                </div>
                <!--Amenities Row 2-->
                <div class="grid">
                    <div class="cell-sm-4">
                        <select id="laundry" class="selectpicker laundry"
                                data-bind="options: LaundryTypes, optionsText: 'Description', optionsValue: 'Id', value: Extras.LaundryType, optionsCaption: 'Laundry Type'"
                                title="" style="display: none;">
                            <option value="">Laundry Type</option>
                            <option value="81">Washer/Dryer</option>
                            <option value="82">Washer/Dryer Hookup</option>
                            <option value="48">Laundry Facilities</option>
                        </select>
                        <div class="btn-group bootstrap-select laundry">
                            <button type="button" class="btn dropdownToggle selectpicker btn-default"
                                    data-toggle="dropdown" data-id="laundry" title="Laundry Type"><span
                                        class="filter-option pull-left ddPlaceholder">Laundry Type</span>&nbsp;<span
                                        class="caret"></span></button>
                            <div class="dropdownMenu open" role="combobox">
                                <ul class="dropdownMenu inner selectpicker" role="menu">
                                    <li rel="0" class="selected"><a tabindex="0" class="" style=""><span class="text">Laundry Type</span><i
                                                    class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
                                    <li rel="1"><a tabindex="0" class="" style=""><span class="text">Washer/Dryer</span><i
                                                    class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
                                    <li rel="2"><a tabindex="0" class="" style=""><span
                                                    class="text">Washer/Dryer Hookup</span><i
                                                    class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
                                    <li rel="3"><a tabindex="0" class="" style=""><span
                                                    class="text">Laundry Facilities</span><i
                                                    class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="cell-sm-4">
                        <select id="parking" class="selectpicker parking"
                                data-bind="options: ParkingTypes, optionsText: 'Description', optionsValue: 'Id', value: Extras.ParkingType, optionsCaption: 'Parking Type'"
                                title="" style="display: none;">
                            <option value="">Parking Type</option>
                            <option value="1">Surface Lot</option>
                            <option value="3">Covered</option>
                            <option value="4">Street</option>
                            <option value="5">Garage</option>
                            <option value="7">Other</option>
                        </select>
                        <div class="btn-group bootstrap-select parking">
                            <button type="button" class="btn dropdownToggle selectpicker btn-default"
                                    data-toggle="dropdown" data-id="parking" title="Parking Type"><span
                                        class="filter-option pull-left ddPlaceholder">Parking Type</span>&nbsp;<span
                                        class="caret"></span></button>
                            <div class="dropdownMenu open" role="combobox">
                                <ul class="dropdownMenu inner selectpicker" role="menu">
                                    <li rel="0" class="selected"><a tabindex="0" class="" style=""><span class="text">Parking Type</span><i
                                                    class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
                                    <li rel="1"><a tabindex="0" class="" style=""><span
                                                    class="text">Surface Lot</span><i
                                                    class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
                                    <li rel="2"><a tabindex="0" class="" style=""><span class="text">Covered</span><i
                                                    class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
                                    <li rel="3"><a tabindex="0" class="" style=""><span class="text">Street</span><i
                                                    class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
                                    <li rel="4"><a tabindex="0" class="" style=""><span class="text">Garage</span><i
                                                    class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
                                    <li rel="5"><a tabindex="0" class="" style=""><span class="text">Other</span><i
                                                    class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="cell-sm-4">
                        <input id="parkingFee" type="text" placeholder="Parking Fee $ /mo" maxlength="11"
                               data-bind="value: Extras.ParkingFee, disable: IsParkingFeeDisabled(), inputMask: { maskType: 'nodecimalcurrency', enable: true, customOptions: {allowMinus: false, suffix: ' /mo'}}"
                               title="" disabled="" style="display: none;"><input id="parkingFee-clone" type="text"
                                                                                  placeholder="Parking Fee $ /mo"
                                                                                  maxlength="11" title="" disabled=""
                                                                                  style="text-align: right;">
                    </div>
                </div>
            </div>
            <div class="termsWrapper">
                <div class="termsInnerWrapper">
                    <div id="reCaptchaWidget" class="reCaptchaWidget">
                        <div style="width: 304px; height: 78px;">
                            <div>

                            </div>
                            <textarea id="g-recaptcha-response" name="g-recaptcha-response" class="g-recaptcha-response"
                                      style="width: 250px; height: 40px; border: 1px solid #c1c1c1; margin: 10px 25px; padding: 0px; resize: none;  display: none; "></textarea>
                        </div>
                    </div>
                    <div class="checkboxGroup terms">
                        <input id="agreeToTerms" type="checkbox" class="primaryCheckbox"
                               data-bind="checked: Extras.IsAgreed" title="">
                        <label for="agreeToTerms">
                        <span>
                            By checking this box I agree as follows: I am the owner of this property or have authority to transact on behalf of this property; I will provide accurate and
                            <a href="http://www.apartments.com/advertise/disclaimers/equal-opportunity-in-housing-statement/"
                               target="_blank">non discriminatory</a>
                            information; and I will comply with the
                            <a href="http://www.apartments.com/advertise/disclaimers/terms-of-service/" target="_blank">Apartments.com Terms of Service</a>
                            and the
                            <a href="http://www.apartments.com/advertise/disclaimers/add-a-listing-terms-of-service/"
                               target="_blank">Add a Listing Terms of Service</a>.
                        </span>
                        </label>
                        <div class="errorMsg" data-bind="validationMessage: Extras.IsAgreed"
                             style="display: none;"></div>
                    </div>
                </div>
            </div>
            <div id="addEditModalContainer"></div>
        </div>
        <footer>
            <div class="grid">
                <div class="logoWrapper clearfix">
                    <div class="logo cell-sm-4 cell-md-4 cell-lg-4">
                        <div class="apartmentFinderLogo"></div>
                    </div>
                    <div class="logo cell-sm-4 cell-md-4 cell-lg-4">
                        <div class="apartmentsLogo"></div>
                    </div>
                    <div class="logo cell-sm-4 cell-md-4 cell-lg-4">
                        <div class="apartmentHomeLivingLogo"></div>
                    </div>
                </div>

                <div class="cell-xs-12 siteLinks">
                    <a href="http://www.apartments.com/advertise/disclaimers/terms-of-service/" target="_blank">Terms Of
                        Service</a> |
                    <a href="http://www.apartments.com/advertise/disclaimers/privacy-statement/" target="_blank">Privacy
                        Statement</a> |
                    <a href="http://www.apartments.com/advertise/disclaimers/equal-opportunity-in-housing-statement/"
                       target="_blank">Equal Housing</a> |
                    <a href="http://www.apartments.com/advertise/disclaimers/avoid-scams-and-fraud/" target="_blank">Avoid
                        Scams &amp; Fraud</a> |
                    <a href="http://www.apartments.com/advertise/disclaimers/equal-opportunity-in-housing-statement/"
                       target="_blank">Equal Housing Opportunity</a>
                </div>

                <div class="cell-xs-12">
                    <p class="copyrightInfo">© 2017 CoStar Group, Inc.</p>
                    <p class="equalHousing"><i class="ehoIcon"></i>Equal Housing Opportunity</p>
                </div>
            </div>
        </footer>
    </div>

@endsection

@section('scripts')
    <script src="scripts\scripts.en-us.bundle.js?v=pRDsCpBD_JLn8uh6burEmqmUTN0vD5ClE6SPpKw0t_o"></script>
    <script>
        require(['configuration'], function(configuration) {
            configuration.configure({
                debugLevel: 0,
                mode: 'desktop',
                operatingSystemType: 'macos',
            });
        });
    </script>
    <script src="{{ asset('js/bundle.js') }}"></script>
    <script src="{{ asset('js/listing.js') }}"></script>
    <script src="{{ asset('js/addlisting.js') }}"></script>
@endsection