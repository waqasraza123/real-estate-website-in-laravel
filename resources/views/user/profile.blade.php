@extends('user.layouts')

<link rel="stylesheet" href="{{ asset('css/account.css') }}">
@section('content')
    <section class="headerSearch extendedSearch" id="headerSearch">
        <span class="lookup">
            <input type="text" id="headerSearchBarLookup" class="headerSearchBarLookup hasPrefilledValue"
                   placeholder="City, State or Zip">
            <a id="searchIcon" class="searchIcon"></a>
        </span>
        <a href="javascript:void(0);" class="go">Go</a>
    </section>
    <div class="pageWrap">
        <section id="myProfileSidebar" class="sidebar myProfileSidebar">
            <div class="myProfileSidebar">
                <ul>
                    <li id="MyListingsLnk"><a href="https://www.apartments.com/my-listings/"><i class="singleBuildingIcon"></i> <span>My Listings</span></a></li>
                    <li id="ReviewsDashboardLnk"><a href="https://www.apartments.com/reviews-dashboard/"><i class="postCommentFilledIcon"></i> <span>Reviews Dashboard</span></a></li>
                    <li id="SavedSearchesLnk"><a href="https://www.apartments.com/my-account/#SavedSearches"><i class="savedSearchesIcon"></i> <span>My Saved Searches</span></a></li>
                    <li id="FavoriteListingsLnk"><a href="https://www.apartments.com/my-account/#FavoriteListings"><i class="favoriteFilledIcon"></i> <span>My Favorites</span></a></li>
                    <li id="UserNotificationSettingsLnk"><a href="https://www.apartments.com/my-account/#UserNotificationSettings"><i class="emailIcon"></i> <span>Notifications Settings</span></a></li>
                    <li id="AccountSettingsLnk" class="active"><a href="https://www.apartments.com/my-account/#AccountSettings"><i class="userIcon"></i> <span>My Profile</span></a></li>
                </ul>

            </div>
        </section>
        <div id="mainMyAccount">
            <!-- Please wait -->
            <section class="pleaseWait" id="myAccountSpinner" style="display: none;">
                <p>Loading Results...</p>
            </section>
            <div id="MyProperties"></div>
            <div id="SavedSearches"></div>
            <div id="FavoriteListings"></div>
            <div id="UserNotificationSettings"></div>
            <div id="AccountSettings">
                <section class="mainAccountHeader">
                    <h3 class="pageResult">Account Settings</h3>
                    <p id="resetPasswordOK" class="success"></p>
                </section>
                <div id="AccountSettingsBody" style="overflow: auto; height: 600px;">
                    <section class="acctInfo">
                        <section>
                            <div class="listGroup" data-bind="validationOptions: { insertMessages: false}">
                                <label class="formLabel" for="settingsLanguagePreference">Communication Language Preference</label>
                                <!-- ko foreach: LookupValues.SupportedLanguages -->
                                <input type="radio" name="settingsLanguagePreference" data-bind="value: Value, checked: $parent.AccountSettings.LanguagePreference, attr: { id: Value() + 'Language' }" value="en-US" title="" id="en-USLanguage">
                                <label class="optLabel" data-bind="text: Text, attr: { for: Value() + 'Language' } " for="en-USLanguage">English</label>

                                <input type="radio" name="settingsLanguagePreference" data-bind="value: Value, checked: $parent.AccountSettings.LanguagePreference, attr: { id: Value() + 'Language' }" value="es-US" title="" id="es-USLanguage">
                                <label class="optLabel" data-bind="text: Text, attr: { for: Value() + 'Language' } " for="es-USLanguage">Español</label>
                                <!-- /ko -->
                            </div>
                        </section>
                        <section class="acctList">
                            <div class="listGroup">
                                <label class="formLabel" for="settingsEmail">Email</label>
                                <input id="settingsEmail" type="text" data-bind="value: AccountSettings.Email" required="true" title=""><span class="validationError" style="display: none;"></span>
                            </div>
                        </section>
                        <section class="acctList" data-bind="visible: !IsExternalSignedIn()">
                            <div class="listGroup">
                                <label class="formLabel" for="settingsPassword">Password <a href="#" class="greenLnk" data-bind="click: ChangePassword">Change password</a></label>
                                <input id="settingsPassword" type="password" disabled="" value="******" onfocus="$(this).blur();">
                            </div>
                        </section>
                    </section>

                    <section class="acctInfo main-info">
                        <section class="acctList">
                            <div class="listGroup">
                                <label class="formLabel" for="settingsFirstName">First Name*</label>
                                <input id="settingsFirstName" type="text"  required="true" title="">
                                <span class="validationError" style="display: none;"></span>
                            </div>
                            <div class="listGroup">
                                <label class="formLabel" for="settingsLastName">Last Name*</label>
                                <input id="settingsLastName" type="text" data-bind="value: AccountSettings.LastName" required="true" title=""><span class="validationError" style="display: none;"></span>
                            </div>
                            <div class="listGroup">
                                <label class="formLabel" for="settingsCity">City</label>
                                <input id="settingsCity" type="text" data-bind="value: AccountSettings.Address.City" title=""><span class="validationError" style="display: none;"></span>
                            </div>
                            <div class="listGroup">
                                <label class="formLabel" for="settingsState">State</label>
                                <select id="settingsState" class="selectpicker selectDropdown stateSelect" data-bind="options: LookupValues.States,
                        optionsText: 'StateName',
                        optionsValue: 'StateCode',
                        optionsCaption: 'Choose a State',
                        value: AccountSettings.Address.StateCode" title="" style="display: none;"><option value="">Choose a State</option><option value="AK">Alaska</option><option value="AL">Alabama</option><option value="AR">Arkansas</option><option value="AZ">Arizona</option><option value="CA">California</option><option value="CO">Colorado</option><option value="CT">Connecticut</option><option value="DC">District of Columbia</option><option value="DE">Delaware</option><option value="FL">Florida</option><option value="GA">Georgia</option><option value="HI">Hawaii</option><option value="IA">Iowa</option><option value="ID">Idaho</option><option value="IL">Illinois</option><option value="IN">Indiana</option><option value="KS">Kansas</option><option value="KY">Kentucky</option><option value="LA">Louisiana</option><option value="MA">Massachusetts</option><option value="MD">Maryland</option><option value="ME">Maine</option><option value="MI">Michigan</option><option value="MN">Minnesota</option><option value="MO">Missouri</option><option value="MS">Mississippi</option><option value="MT">Montana</option><option value="NC">North Carolina</option><option value="ND">North Dakota</option><option value="NE">Nebraska</option><option value="NH">New Hampshire</option><option value="NJ">New Jersey</option><option value="NM">New Mexico</option><option value="NV">Nevada</option><option value="NY">New York</option><option value="OH">Ohio</option><option value="OK">Oklahoma</option><option value="OR">Oregon</option><option value="PA">Pennsylvania</option><option value="RI">Rhode Island</option><option value="SC">South Carolina</option><option value="SD">South Dakota</option><option value="TN">Tennessee</option><option value="TX">Texas</option><option value="UT">Utah</option><option value="VA">Virginia</option><option value="VT">Vermont</option><option value="WA">Washington</option><option value="WI">Wisconsin</option><option value="WV">West Virginia</option><option value="WY">Wyoming</option></select><div class="btn-group bootstrap-select selectDropdown stateSelect"><button type="button" class="btn dropdownToggle selectpicker btn-default" data-toggle="dropdown" data-id="settingsState" title="Choose a State"><span class="filter-option pull-left">Choose a State</span>&nbsp;<span class="caret"></span></button><div class="dropdownMenu open" role="combobox"><ul class="dropdownMenu inner selectpicker" role="menu"><li rel="0" class="selected"><a tabindex="0" class="" style=""><span class="text">Choose a State</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li><li rel="1"><a tabindex="0" class="" style=""><span class="text">Alaska</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li><li rel="2"><a tabindex="0" class="" style=""><span class="text">Alabama</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li><li rel="3"><a tabindex="0" class="" style=""><span class="text">Arkansas</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li><li rel="4"><a tabindex="0" class="" style=""><span class="text">Arizona</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li><li rel="5"><a tabindex="0" class="" style=""><span class="text">California</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li><li rel="6"><a tabindex="0" class="" style=""><span class="text">Colorado</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li><li rel="7"><a tabindex="0" class="" style=""><span class="text">Connecticut</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li><li rel="8"><a tabindex="0" class="" style=""><span class="text">District of Columbia</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li><li rel="9"><a tabindex="0" class="" style=""><span class="text">Delaware</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li><li rel="10"><a tabindex="0" class="" style=""><span class="text">Florida</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li><li rel="11"><a tabindex="0" class="" style=""><span class="text">Georgia</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li><li rel="12"><a tabindex="0" class="" style=""><span class="text">Hawaii</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li><li rel="13"><a tabindex="0" class="" style=""><span class="text">Iowa</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li><li rel="14"><a tabindex="0" class="" style=""><span class="text">Idaho</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li><li rel="15"><a tabindex="0" class="" style=""><span class="text">Illinois</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li><li rel="16"><a tabindex="0" class="" style=""><span class="text">Indiana</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li><li rel="17"><a tabindex="0" class="" style=""><span class="text">Kansas</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li><li rel="18"><a tabindex="0" class="" style=""><span class="text">Kentucky</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li><li rel="19"><a tabindex="0" class="" style=""><span class="text">Louisiana</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li><li rel="20"><a tabindex="0" class="" style=""><span class="text">Massachusetts</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li><li rel="21"><a tabindex="0" class="" style=""><span class="text">Maryland</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li><li rel="22"><a tabindex="0" class="" style=""><span class="text">Maine</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li><li rel="23"><a tabindex="0" class="" style=""><span class="text">Michigan</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li><li rel="24"><a tabindex="0" class="" style=""><span class="text">Minnesota</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li><li rel="25"><a tabindex="0" class="" style=""><span class="text">Missouri</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li><li rel="26"><a tabindex="0" class="" style=""><span class="text">Mississippi</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li><li rel="27"><a tabindex="0" class="" style=""><span class="text">Montana</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li><li rel="28"><a tabindex="0" class="" style=""><span class="text">North Carolina</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li><li rel="29"><a tabindex="0" class="" style=""><span class="text">North Dakota</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li><li rel="30"><a tabindex="0" class="" style=""><span class="text">Nebraska</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li><li rel="31"><a tabindex="0" class="" style=""><span class="text">New Hampshire</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li><li rel="32"><a tabindex="0" class="" style=""><span class="text">New Jersey</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li><li rel="33"><a tabindex="0" class="" style=""><span class="text">New Mexico</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li><li rel="34"><a tabindex="0" class="" style=""><span class="text">Nevada</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li><li rel="35"><a tabindex="0" class="" style=""><span class="text">New York</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li><li rel="36"><a tabindex="0" class="" style=""><span class="text">Ohio</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li><li rel="37"><a tabindex="0" class="" style=""><span class="text">Oklahoma</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li><li rel="38"><a tabindex="0" class="" style=""><span class="text">Oregon</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li><li rel="39"><a tabindex="0" class="" style=""><span class="text">Pennsylvania</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li><li rel="40"><a tabindex="0" class="" style=""><span class="text">Rhode Island</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li><li rel="41"><a tabindex="0" class="" style=""><span class="text">South Carolina</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li><li rel="42"><a tabindex="0" class="" style=""><span class="text">South Dakota</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li><li rel="43"><a tabindex="0" class="" style=""><span class="text">Tennessee</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li><li rel="44"><a tabindex="0" class="" style=""><span class="text">Texas</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li><li rel="45"><a tabindex="0" class="" style=""><span class="text">Utah</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li><li rel="46"><a tabindex="0" class="" style=""><span class="text">Virginia</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li><li rel="47"><a tabindex="0" class="" style=""><span class="text">Vermont</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li><li rel="48"><a tabindex="0" class="" style=""><span class="text">Washington</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li><li rel="49"><a tabindex="0" class="" style=""><span class="text">Wisconsin</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li><li rel="50"><a tabindex="0" class="" style=""><span class="text">West Virginia</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li><li rel="51"><a tabindex="0" class="" style=""><span class="text">Wyoming</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li></ul></div></div><span class="validationError" style="display: none;"></span>
                            </div>
                            <div class="listGroup petsGroup" data-bind="validationOptions: { insertMessages: false}">
                                <label class="formLabel">Pets</label>
                                <!-- ko foreach: LookupValues.Pets -->
                                <input type="checkbox" name="settingsPets" class="primaryCheckbox" data-bind="value: Id, checked: $parent.AccountSettings.Pets, attr: { id: 'pet' + Name() }" value="3" title="" id="petDogs">
                                <label class="optLabel" data-bind="attr: { for: 'pet' + Name() } " for="petDogs"><span data-bind="text: Name">Dogs</span></label>

                                <input type="checkbox" name="settingsPets" class="primaryCheckbox" data-bind="value: Id, checked: $parent.AccountSettings.Pets, attr: { id: 'pet' + Name() }" value="2" title="" id="petCats">
                                <label class="optLabel" data-bind="attr: { for: 'pet' + Name() } " for="petCats"><span data-bind="text: Name">Cats</span></label>

                                <input type="checkbox" name="settingsPets" class="primaryCheckbox" data-bind="value: Id, checked: $parent.AccountSettings.Pets, attr: { id: 'pet' + Name() }" value="6" title="" id="petOthers">
                                <label class="optLabel" data-bind="attr: { for: 'pet' + Name() } " for="petOthers"><span data-bind="text: Name">Others</span></label>
                                <!-- /ko -->
                            </div>
                            <div class="listGroup">
                                <label class="formLabel" for="settingsBirthday">Birthday</label>
                                <input id="settingsBirthday" placeholder="12/31/1970" class="birthdayInput" type="text" data-bind="value: AccountSettings.Birthdate, inputMask: { maskType: 'datetime', enable: true, alias: 'mm/dd/yyyy' }" title="" style="display: none;"><input id="settingsBirthday-clone" placeholder="12/31/1970" class="birthdayInput" type="text" title=""><span class="validationError" style="display: none;"></span>
                            </div>
                            <div class="listGroup" data-bind="validationOptions: { insertMessages: false}">
                                <label class="formLabel">Gender</label>
                                <!-- ko foreach: LookupValues.GenderTypes -->
                                <input type="radio" name="settingsGender" data-bind="value: Id, checked: $parent.AccountSettings.Gender, attr: {id: 'gender' + Name() }" value="2" title="" id="genderFemale">
                                <label class="optLabel" data-bind="text: Name, attr: { for: 'gender' + Name() } " for="genderFemale">Female</label>

                                <input type="radio" name="settingsGender" data-bind="value: Id, checked: $parent.AccountSettings.Gender, attr: {id: 'gender' + Name() }" value="1" title="" id="genderMale">
                                <label class="optLabel" data-bind="text: Name, attr: { for: 'gender' + Name() } " for="genderMale">Male</label>
                                <!-- /ko -->
                            </div>

                            <div class="listGroup" data-bind="validationOptions: { insertMessages: false}">
                                <label class="formLabel" for="settingsMarialStatus">Marital Status</label>
                                <!-- ko foreach: LookupValues.MaritalStatuses -->
                                <input type="radio" name="settingsMaritalStatus" data-bind="value: Id, checked: $parent.AccountSettings.MaritalStatus, attr: { id: Name() + 'Status' }" value="2" title="" id="MarriedStatus">
                                <label class="optLabel" data-bind="text: Name, attr: { for: Name() + 'Status' } " for="MarriedStatus">Married</label>

                                <input type="radio" name="settingsMaritalStatus" data-bind="value: Id, checked: $parent.AccountSettings.MaritalStatus, attr: { id: Name() + 'Status' }" value="1" title="" id="SingleStatus">
                                <label class="optLabel" data-bind="text: Name, attr: { for: Name() + 'Status' } " for="SingleStatus">Single</label>
                                <!-- /ko -->
                            </div>
                            <div class="listGroup">
                                <label class="formLabel" for="settingsIncomeRange">Income Range</label>
                                <select id="settingsIncomeRange" class="selectpicker selectDropdown incomeSelect" data-bind="options: LookupValues.Incomes,
                        optionsText: 'Value',
                        optionsValue: 'Id',
                        optionsCaption: 'Choose Income Range',
                        value: AccountSettings.Income" title="" style="display: none;"><option value="">Choose Income Range</option><option value="1">$0-35K</option><option value="2">36K-75K</option><option value="3">75K-125K</option><option value="4">126K+</option></select><div class="btn-group bootstrap-select selectDropdown incomeSelect"><button type="button" class="btn dropdownToggle selectpicker btn-default" data-toggle="dropdown" data-id="settingsIncomeRange" title="Choose Income Range"><span class="filter-option pull-left">Choose Income Range</span>&nbsp;<span class="caret"></span></button><div class="dropdownMenu open" role="combobox"><ul class="dropdownMenu inner selectpicker" role="menu"><li rel="0" class="selected"><a tabindex="0" class="" style=""><span class="text">Choose Income Range</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li><li rel="1"><a tabindex="0" class="" style=""><span class="text">$0-35K</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li><li rel="2"><a tabindex="0" class="" style=""><span class="text">36K-75K</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li><li rel="3"><a tabindex="0" class="" style=""><span class="text">75K-125K</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li><li rel="4"><a tabindex="0" class="" style=""><span class="text">126K+</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li></ul></div></div><span class="validationError" style="display: none;"></span>
                            </div>
                            <div class="listGroup">
                                <label class="formLabel" for="settingsNumOfChildren">Number of Children</label>
                                <select id="settingsNumOfChildren" class="selectpicker selectDropdown childrenSelect" data-bind="options: LookupValues.NumberOfChildren,
                        optionsText: 'Text',
                        optionsValue: 'Value',
                        optionsCaption: 'Choose # of Children',
                        value: AccountSettings.Children" title="" style="display: none;"><option value="">Choose # of Children</option><option value="0">None</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option></select><div class="btn-group bootstrap-select selectDropdown childrenSelect"><button type="button" class="btn dropdownToggle selectpicker btn-default" data-toggle="dropdown" data-id="settingsNumOfChildren" title="Choose # of Children"><span class="filter-option pull-left">Choose # of Children</span>&nbsp;<span class="caret"></span></button><div class="dropdownMenu open" role="combobox"><ul class="dropdownMenu inner selectpicker" role="menu"><li rel="0" class="selected"><a tabindex="0" class="" style=""><span class="text">Choose # of Children</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li><li rel="1"><a tabindex="0" class="" style=""><span class="text">None</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li><li rel="2"><a tabindex="0" class="" style=""><span class="text">1</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li><li rel="3"><a tabindex="0" class="" style=""><span class="text">2</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li><li rel="4"><a tabindex="0" class="" style=""><span class="text">3</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li><li rel="5"><a tabindex="0" class="" style=""><span class="text">4</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li><li rel="6"><a tabindex="0" class="" style=""><span class="text">5</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li><li rel="7"><a tabindex="0" class="" style=""><span class="text">6</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li><li rel="8"><a tabindex="0" class="" style=""><span class="text">7</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li><li rel="9"><a tabindex="0" class="" style=""><span class="text">8</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li><li rel="10"><a tabindex="0" class="" style=""><span class="text">9</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li><li rel="11"><a tabindex="0" class="" style=""><span class="text">10</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li></ul></div></div><span class="validationError" style="display: none;"></span>
                            </div>
                            <div class="listGroup">
                                <label class="formLabel" for="settingsMobilePhone">Mobile Phone</label>
                                <input id="settingsMobilePhone" placeholder="(555) 555-5555" class="mobileSelect" type="text" data-bind="value: AccountSettings.Phone, inputMask: { maskType: 'phone', enable: true }" title="" style="display: none;"><input id="settingsMobilePhone-clone" placeholder="(555) 555-5555" class="mobileSelect" type="text" title=""><span class="validationError" style="display: none;"></span>
                            </div>

                        </section>
                    </section>

                    <section class="acctInfo social">
                        <div id="saveSettingsMessage"></div>
                        <button id="saveSettings" type="button" data-bind="click: SaveSettings" class="primary large">Save Settings</button>
                        <i id="saveSetttingSpinner" class="spinner"></i>
                    </section>

                    <section class="acctInfo social">
                        <h2>Facebook &amp; Google+ Connect</h2>
                        <p data-bind="text: SocialConnectText">Quick sync your Apartments.com account with your Facebook or Google+ accounts. Your privacy is important to us and we never post without your permission.</p>
                        <button type="button" class="btn googleBtn" data-bind="click: SyncGoogle"><i class="googleLogoIcon"></i> <span data-bind="text: GoogleSyncLbl">Sync with Google+</span></button>
                        <button type="button" class="btn facebookBtn" data-bind="click: SyncFacebook"><i class="facebookLogoIcon"></i> <span data-bind="text: FacebookSyncLbl">Sync with Facebook</span></button>
                    </section>
                </div>
            </div>
        </div>
    </div>
@endsection