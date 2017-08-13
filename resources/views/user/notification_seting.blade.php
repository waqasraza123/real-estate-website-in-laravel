@extends('user.layouts')



@section('content')
    <section class="headerSearch extendedSearch" id="headerSearch">
<span class="lookup">
    <input type="text" id="headerSearchBarLookup" class="headerSearchBarLookup hasPrefilledValue" placeholder="City, State or Zip">
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

                    <li id="UserNotificationSettingsLnk" class="active"><a href="https://www.apartments.com/my-account/#UserNotificationSettings"><i class="emailIcon"></i> <span>Notifications Settings</span></a></li>
                    <li id="AccountSettingsLnk" class=""><a href="https://www.apartments.com/my-account/#AccountSettings"><i class="userIcon"></i> <span>My Profile</span></a></li>
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
            <div id="UserNotificationSettings">
                <div class="UserNotificationSettingsWrapper" id="UserNotificationSettingsWrapper">

                    <h3 class="myAccountHeaderTitle">Notification Settings</h3>
                    <!-- Saved Searches -->
                    <div class="settingWrapper">
                        <h4>Saved Searches</h4>
                        <span class="infoTxt">Receive updates on apartments in areas you have saved.</span>

                        <div class="radioWrapper">

                            <div class="radioGroup">
                                <input type="radio" id="IsSavedSearchEnabledActive" class="primaryRadio" name="IsSavedSearchEnabled" value="true" data-bind="checked:Settings.IsSavedSearchEnabled, checkedValue: true">
                                <label for="IsSavedSearchEnabledActive">
                                    <span class="radioLabel">On</span>
                                </label>

                                <input type="radio" id="IsSavedSearchEnabledInactive" class="primaryRadio" name="IsSavedSearchEnabled" value="false" data-bind="checked:Settings.IsSavedSearchEnabled, checkedValue: false">
                                <label for="IsSavedSearchEnabledInactive">
                                    <span class="radioLabel">Off</span>
                                </label>
                            </div>

                        </div>


                    </div>
                    <!-- Favorites -->
                    <div class="settingWrapper">
                        <h4>Favorites</h4>
                        <span class="infoTxt">Receive updates on your favorite apartments.</span>

                        <div class="radioWrapper">
                            <div class="radioGroup">

                                <input type="radio" id="IsFavEnabledActive" class="primaryRadio" name="IsFavEnabled" value="true" data-bind="checked:Settings.IsFavEnabled, checkedValue: true">
                                <label for="IsFavEnabledActive">
                                    <span class="radioLabel">On</span>
                                </label>

                                <input type="radio" id="IsFavEnabledInactive" class="primaryRadio" name="IsFavEnabled" value="false" data-bind="checked:Settings.IsFavEnabled, checkedValue: false">
                                <label for="IsFavEnabledInactive">
                                    <span class="radioLabel">Off</span>
                                </label>
                            </div>
                        </div>


                    </div>
                    <!-- Delivery Options -->
                    <div class="settingWrapper">
                        <h4>Delivery Options</h4>

                        <div class="alertFreqWrapper">
                            <label>Alert Frequency</label>
                            <select id="baths" class="selectpicker" data-bind="options: Settings.DeliveryOptions,
                       optionsText: 'name',
                       optionsValue: 'id',
                       value: Settings.SelectedAlertFrequency" style="display: none;"><option value="1">Immediate</option><option value="2">Daily</option><option value="3">Weekly</option></select><div class="btn-group bootstrap-select"><button type="button" class="btn dropdownToggle selectpicker btn-default" data-toggle="dropdown" data-id="baths" title="Daily"><span class="filter-option pull-left">Daily</span>&nbsp;<span class="caret"></span></button><div class="dropdownMenu open" role="combobox"><ul class="dropdownMenu inner selectpicker" role="menu"><li rel="0"><a tabindex="0" class="" style=""><span class="text">Immediate</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li><li rel="1" class="selected"><a tabindex="0" class="" style=""><span class="text">Daily</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li><li rel="2"><a tabindex="0" class="" style=""><span class="text">Weekly</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li></ul></div></div>
                        </div>

                    </div>

                    <div class="saveBtnWrapper">
                        <button class="large primary pull-right" id="saveBtn" data-bind="click: updateUser, visible: visibleBtn">Save</button>

                        <div class="isLoading" data-bind="visible: isLoading" style="display: none;"></div>

                        <div class="isComplete fadeOut" id="messagePrompt">Your settings have been saved</div>

                    </div>
                </div></div>

            <div id="AccountSettings"></div>
        </div>
    </div>
@endsection