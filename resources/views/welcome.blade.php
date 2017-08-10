@extends('layouts.app')
@section('content')
    <div id="homepageContentWrapper" class="contentWrapper">
        <section class="homepageHero" title="Apartments for rent at Apartments.com">
            <div class="mainSearchWrap" id="mainSearchWrap">
                <h1 class="mainTitle" id="quickSearchMainTitle">Rent an Apartment. Find your home.</h1>
                <section id="quickSearch" class="quickSearch">
                    <!--[if IE 9 ]>
                        <div class="quickSearchWrapper ie9">
                    <!--[if (gt IE 9)|!(IE)]><!-->
                    <div class="quickSearchWrapper">
                        <!--<![endif]-->
                        <ul id="quickSearchPropertyStyles" class="propertyStyles allTypes">
                            <li data-propertystyle="" class="active"><a>All</a></li>
                            <li data-propertystyle="1" class=""><a href="javascript:void(0)">Apartments</a></li>
                            <li data-propertystyle="4" class=""><a href="https://www.apartments.com/condos/">Condos</a>
                            </li>
                            <li data-propertystyle="2" class=""><a href="https://www.apartments.com/houses/">Homes</a>
                            </li>
                            <li data-propertystyle="16" class=""><a href="https://www.apartments.com/townhomes/">Townhomes</a>
                            </li>
                        </ul>

                        <div class="inputWrapper">
                            <input type="text" id="quickSearchLookup" class="quickSearchLookup hasPrefilledValue"
                                   autocorrect="false" placeholder="Search by Location or Point of Interest">

                            <div id="minMaxRangeControl" class="dropDownContainerWrapper">

                                <div class="rentRangeSelector dropDownContainer"
                                     data-bind="css: { active: isOpen() }, event: { keydown: keyDown }">
                                    <a role="button" title="Rent Range" type="button"
                                       class="btn btn-default rentselector"
                                       data-bind="click: selectorClicked, clickBubble: true">
                                        <span data-bind="text: selectedDisplayValue()">Rent Range</span>&nbsp;<span
                                                class="caret"></span>
                                    </a>
                                    <div class="dropdownContent">


                                        <div class="ranges">

                                            <div class="grid firstChild">

                                                <div class="cell-xs-6">
                                                    <input maxlength="6" type="tel" pattern="$?(\d|\,)*"
                                                           placeholder="Min Rent" class="minRentInput active"
                                                           data-bind="css: { active: isMinRentActive() }, event: { focus: minRentFocus, blur: rentInputBlur }, value: minRent, clickBubble: false">
                                                </div>

                                                <div class="cell-xs-6">
                                                    <input maxlength="6" type="tel" pattern="$?(\d|\,)*"
                                                           placeholder="Max Rent" class="maxRentInput"
                                                           data-bind="css: { active: !isMinRentActive() }, event: { focus: maxRentFocus, blur: rentInputBlur }, value: maxRent, clickBubble: false">
                                                </div>

                                            </div>


                                        </div>
                                        <ul class="minRentOptions js-minRentOptions active"
                                            data-bind="css: { active: isMinRentActive() }, click: minRentOptionsClicked, clickBubble: false">
                                            <li class="active" data-value=""
                                                data-bind="css: { active: isMinRangeOptionActive($element) }, scrollIntoView: isMinRangeOptionActive($element) &amp;&amp; isOpen(), visible: isMinRangeOptionVisible($element)">
                                                No Min
                                            </li>
                                            <li data-value="500"
                                                data-bind="css: { active: isMinRangeOptionActive($element) }, scrollIntoView: isMinRangeOptionActive($element) &amp;&amp; isOpen(), visible: isMinRangeOptionVisible($element)">
                                                $500
                                            </li>
                                            <li data-value="700"
                                                data-bind="css: { active: isMinRangeOptionActive($element) }, scrollIntoView: isMinRangeOptionActive($element) &amp;&amp; isOpen(), visible: isMinRangeOptionVisible($element)">
                                                $700
                                            </li>
                                            <li data-value="900"
                                                data-bind="css: { active: isMinRangeOptionActive($element) }, scrollIntoView: isMinRangeOptionActive($element) &amp;&amp; isOpen(), visible: isMinRangeOptionVisible($element)">
                                                $900
                                            </li>
                                            <li data-value="1100"
                                                data-bind="css: { active: isMinRangeOptionActive($element) }, scrollIntoView: isMinRangeOptionActive($element) &amp;&amp; isOpen(), visible: isMinRangeOptionVisible($element)">
                                                $1,100
                                            </li>
                                            <li data-value="1300"
                                                data-bind="css: { active: isMinRangeOptionActive($element) }, scrollIntoView: isMinRangeOptionActive($element) &amp;&amp; isOpen(), visible: isMinRangeOptionVisible($element)">
                                                $1,300
                                            </li>
                                            <li data-value="1500"
                                                data-bind="css: { active: isMinRangeOptionActive($element) }, scrollIntoView: isMinRangeOptionActive($element) &amp;&amp; isOpen(), visible: isMinRangeOptionVisible($element)">
                                                $1,500
                                            </li>
                                        </ul>
                                        <ul id="maxRentOptions" class="maxRentOptions js-maxRentOptions"
                                            data-bind="css: { active: !isMinRentActive() }, visible: !minRentHasValue(), click: maxRentOptionsClicked, clickBubble: false">
                                            <li data-value="1100"
                                                data-bind="css: { active: isMaxRangeOptionActive($element) }, scrollIntoView: isMaxRangeOptionActive($element) &amp;&amp; !isMinRentActive()">
                                                $1,100
                                            </li>
                                            <li data-value="1300"
                                                data-bind="css: { active: isMaxRangeOptionActive($element) }, scrollIntoView: isMaxRangeOptionActive($element) &amp;&amp; !isMinRentActive()">
                                                $1,300
                                            </li>
                                            <li data-value="1500"
                                                data-bind="css: { active: isMaxRangeOptionActive($element) }, scrollIntoView: isMaxRangeOptionActive($element) &amp;&amp; !isMinRentActive()">
                                                $1,500
                                            </li>
                                            <li data-value="1700"
                                                data-bind="css: { active: isMaxRangeOptionActive($element) }, scrollIntoView: isMaxRangeOptionActive($element) &amp;&amp; !isMinRentActive()">
                                                $1,700
                                            </li>
                                            <li data-value="1900"
                                                data-bind="css: { active: isMaxRangeOptionActive($element) }, scrollIntoView: isMaxRangeOptionActive($element) &amp;&amp; !isMinRentActive()">
                                                $1,900
                                            </li>
                                            <li data-value="2100"
                                                data-bind="css: { active: isMaxRangeOptionActive($element) }, scrollIntoView: isMaxRangeOptionActive($element) &amp;&amp; !isMinRentActive()">
                                                $2,100
                                            </li>
                                            <li class="active" data-value=""
                                                data-bind="css: { active: isMaxRangeOptionActive($element) }, scrollIntoView: isMaxRangeOptionActive($element) &amp;&amp; !isMinRentActive()">
                                                No Max
                                            </li>
                                        </ul>

                                        <ul class="maxRentOptions js-customMaxRentOptions"
                                            data-bind="foreach: maxRentValues, css: { active: !isMinRentActive() }, visible: minRentHasValue(), click: maxRentOptionsClicked, clickBubble: false"
                                            style="display: none;">
                                            <li data-bind="text: text, attr: { 'data-value': value },  css: { active: $parent.isMaxRangeOptionActive($element) }, scrollIntoView: $parent.isMaxRangeOptionActive($element) &amp;&amp; !$parent.isMinRentActive()"
                                                data-value="0" class="active">$0
                                            </li>

                                            <li data-bind="text: text, attr: { 'data-value': value },  css: { active: $parent.isMaxRangeOptionActive($element) }, scrollIntoView: $parent.isMaxRangeOptionActive($element) &amp;&amp; !$parent.isMinRentActive()"
                                                data-value="250">$250
                                            </li>

                                            <li data-bind="text: text, attr: { 'data-value': value },  css: { active: $parent.isMaxRangeOptionActive($element) }, scrollIntoView: $parent.isMaxRangeOptionActive($element) &amp;&amp; !$parent.isMinRentActive()"
                                                data-value="500">$500
                                            </li>

                                            <li data-bind="text: text, attr: { 'data-value': value },  css: { active: $parent.isMaxRangeOptionActive($element) }, scrollIntoView: $parent.isMaxRangeOptionActive($element) &amp;&amp; !$parent.isMinRentActive()"
                                                data-value="750">$750
                                            </li>

                                            <li data-bind="text: text, attr: { 'data-value': value },  css: { active: $parent.isMaxRangeOptionActive($element) }, scrollIntoView: $parent.isMaxRangeOptionActive($element) &amp;&amp; !$parent.isMinRentActive()"
                                                data-value="1000">$1,000
                                            </li>

                                            <li data-bind="text: text, attr: { 'data-value': value },  css: { active: $parent.isMaxRangeOptionActive($element) }, scrollIntoView: $parent.isMaxRangeOptionActive($element) &amp;&amp; !$parent.isMinRentActive()"
                                                data-value="1250">$1,250
                                            </li>

                                            <li data-bind="text: text, attr: { 'data-value': value },  css: { active: $parent.isMaxRangeOptionActive($element) }, scrollIntoView: $parent.isMaxRangeOptionActive($element) &amp;&amp; !$parent.isMinRentActive()"
                                                data-value="" class="active">No Max
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div id="bedBathControl" class="dropDownContainerWrapper">
                                <!-- ko if: isActive() --><!-- /ko -->
                                <div class="bedBathSelector dropDownContainer" data-bind="css: { active: isActive }">
                                    <a role="button" title="Bedrooms &amp; Bathrooms" class="btn btn-default"
                                       data-bind="click: toggleActive, clickBubble: true">
                                        <span data-bind="text: selectedDisplay">Beds x Baths</span>&nbsp;<span
                                                class="caret"></span>
                                    </a>

                                    <div class="dropdownContent">
                                        <h4>BEDS</h4>
                                        <ul>
                                            <li data-bind="clickSetValue: beds, clickBubble: false" data-value="">

                                                <input type="radio" class="primaryRadio" name="bedGroup" value=""
                                                       data-bind="reverseInputBinding: bedOptions, checked: beds, preventBubble: 'click', enable: isEnabled(6 ,')'"
                                                       data-text="All Beds">
                                                <label><span>All Beds</span></label>
                                            </li>
                                            <li data-bind="clickSetValue: beds, clickBubble: false" data-value="-1">

                                                <input type="radio" class="primaryRadio" name="bedGroup" value="-1"
                                                       data-bind="reverseInputBinding: bedOptions, checked: beds, preventBubble: 'click', enable: isEnabled(6 ,'-1)'"
                                                       data-text="Studio">
                                                <label><span>Studio</span></label>
                                            </li>
                                            <li data-bind="clickSetValue: beds, clickBubble: false" data-value="1">

                                                <input type="radio" class="primaryRadio" name="bedGroup" value="1"
                                                       data-bind="reverseInputBinding: bedOptions, checked: beds, preventBubble: 'click', enable: isEnabled(6 ,'1)'"
                                                       data-text="1 Bed">
                                                <label><span>1 Bed</span></label>
                                            </li>
                                            <li data-bind="clickSetValue: beds, clickBubble: false" data-value="2">

                                                <input type="radio" class="primaryRadio" name="bedGroup" value="2"
                                                       data-bind="reverseInputBinding: bedOptions, checked: beds, preventBubble: 'click', enable: isEnabled(6 ,'2)'"
                                                       data-text="2 Beds">
                                                <label><span>2 Beds</span></label>
                                            </li>
                                            <li data-bind="clickSetValue: beds, clickBubble: false" data-value="3">

                                                <input type="radio" class="primaryRadio" name="bedGroup" value="3"
                                                       data-bind="reverseInputBinding: bedOptions, checked: beds, preventBubble: 'click', enable: isEnabled(6 ,'3)'"
                                                       data-text="3 Beds">
                                                <label><span>3 Beds</span></label>
                                            </li>
                                            <li data-bind="clickSetValue: beds, clickBubble: false" data-value="4">

                                                <input type="radio" class="primaryRadio" name="bedGroup" value="4"
                                                       data-bind="reverseInputBinding: bedOptions, checked: beds, preventBubble: 'click', enable: isEnabled(6 ,'4)'"
                                                       data-text="4+ Beds">
                                                <label><span>4+ Beds</span></label>
                                            </li>
                                        </ul>
                                        <h4>BATHS</h4>
                                        <ul>
                                            <li data-bind="clickSetValue: baths, clickBubble: false" data-value="">

                                                <input type="radio" class="primaryRadio" name="bathGroup" value=""
                                                       data-bind="reverseInputBinding: bathOptions, checked: baths, preventBubble: 'click', enable: isEnabled(7 ,')'"
                                                       data-text="All Baths">
                                                <label><span>All Baths</span></label>
                                            </li>
                                            <li data-bind="clickSetValue: baths, clickBubble: false" data-value="1">

                                                <input type="radio" class="primaryRadio" name="bathGroup" value="1"
                                                       data-bind="reverseInputBinding: bathOptions, checked: baths, preventBubble: 'click', enable: isEnabled(7 ,'1)'"
                                                       data-text="1+ Baths">
                                                <label><span>1+ Baths</span></label>
                                            </li>
                                            <li data-bind="clickSetValue: baths, clickBubble: false" data-value="2">

                                                <input type="radio" class="primaryRadio" name="bathGroup" value="2"
                                                       data-bind="reverseInputBinding: bathOptions, checked: baths, preventBubble: 'click', enable: isEnabled(7 ,'2)'"
                                                       data-text="2+ Baths">
                                                <label><span>2+ Baths</span></label>
                                            </li>
                                            <li data-bind="clickSetValue: baths, clickBubble: false" data-value="3">

                                                <input type="radio" class="primaryRadio" name="bathGroup" value="3"
                                                       data-bind="reverseInputBinding: bathOptions, checked: baths, preventBubble: 'click', enable: isEnabled(7 ,'3)'"
                                                       data-text="3+ Baths">
                                                <label><span>3+ Baths</span></label>
                                            </li>
                                        </ul>
                                    </div>

                                </div>
                            </div>


                            <a href="https://www.apartments.com/search/" class="go" title="Search apartments for rent">
                                <span>Go</span>
                            </a>
                        </div>
                        <p class="errorMessage">You must choose a place to search</p>
                    </div>
                </section>
            </div>
            <div class="homepageHeroImage"></div>
            <div class="geoHomepageHeroImage"
                 style="background-image: url(&quot;/a/d1c889/modules/homepage/content/images/heroes/generic/1920.jpg&quot;);"></div>
        </section>


        <div class="infoWrapper">


            <section class="subTaglineText">
                <h2>What are you looking for?</h2>
                <p>Behind each apartment for rent<span id="textBlurb"> in Clifton</span>, every innovative tool and
                    local neighborhood we scour, there's a team driven to help find your next rental home.</p>
            </section>


            <section id="widgetContainer" class="widget clearfix widgetFive featuredListing">
                <div class="widgetSearch widgetLarge widget1" data-ga-label="Parking"
                     data-href="https://www.apartments.com/clifton-nj/parking/" data-clickthru="true">
                    <div class="image"
                         style="background-image: url('/a/e5c07c/modules/homepage/content/images/search/950_parking.jpg')"></div>
                    <div class="widgetText">
                        <h3>Parking</h3>
                        <p>Check out rentals with plenty of parking in Clifton, New Jersey</p>
                    </div>
                </div>
                <div class="widgetSearch  widget2" data-ga-label="Pet Friendly"
                     data-href="https://www.apartments.com/clifton-nj/pet-friendly/" data-clickthru="true">
                    <div class="image"
                         style="background-image: url('/a/5b8a7c/modules/homepage/content/images/search/950_pets.jpg')"></div>
                    <div class="widgetText">
                        <h3>Pet Friendly</h3>
                        <p>Explore rentals your four-legged friends can call home too in Clifton, New Jersey</p>
                    </div>
                </div>
                <div class="widgetSearch  widget3" data-ga-label="Laundry Facilities"
                     data-href="https://www.apartments.com/clifton-nj/laundry-facilities/" data-clickthru="true">
                    <div class="image"
                         style="background-image: url('/a/a657e0/modules/homepage/content/images/search/950_laundryfacilities.jpg')"></div>
                    <div class="widgetText">
                        <h3>On-Site Laundry</h3>
                        <p>Clean your duds close to home in Clifton, New Jersey</p>
                    </div>
                </div>
                <div class="widgetSearch widgetLarge widget4" data-ga-label="Plan Commute"
                     data-href="https://www.apartments.com/clifton-nj/?mmv=2" data-clickthru="true">
                    <div class="image"
                         style="background-image: url('/a/9ac4cb/modules/homepage/content/images/search/950_plancommute.jpg')"></div>
                    <div class="widgetText">
                        <h3>Be close to work</h3>
                        <p>Simplify your commute, search for rentals within 45 minutes of work</p>
                    </div>
                </div>
                <div class="widgetSearch  widget5" data-ga-label="Houses"
                     data-href="https://www.apartments.com/houses/clifton-nj/" data-clickthru="true">
                    <div class="image"
                         style="background-image: url('/a/0b8328/modules/homepage/content/images/search/950_home.jpg')"></div>
                    <div class="widgetText">
                        <h3>Rent a home</h3>
                        <p>Looking for a little more space, view home rentals in Clifton, New Jersey</p>
                    </div>
                </div>

                <div id="featuredListing" class="widgetFeaturedListing" data-listing-id="w1b22rl"
                     data-listing-url="https://www.apartments.com/ave-clifton-clifton-nj/w1b22rl/"
                     data-listing-type-id="4" data-phonenumber="844-453-1005" data-lang="en">


                    <div class="media"
                         style="background-image: url('https://images1.apartments.com/i2/dAEdPAoHQz4_yLliMej5hqXg-jL_OjMEarFvV6Gr398/111/ave-clifton-clifton-nj-building-photo.jpg')"></div>


                    <div class="info">
                        <div class="top">
                            <div class="addressAmenities left">


                                <h3><a class="titleUrl" href="javascript:void(0)" title="AVE Clifton">AVE Clifton</a>
                                </h3>

                                <p class="ellipsis">

                    <span class="address">
                        743 Passaic Ave Clifton, NJ 07012
                    </span>

                                    <span class="neighborhood">
                            - <a href="https://www.apartments.com/rosemawr-clifton-nj/" title="Rosemawr">Rosemawr</a>
                        </span>
                                </p>


                                <ul class="amenities">
                                    <li class="petIcon" title="Dogs"></li>
                                    <li class="catIcon" title="Cats"></li>
                                    <li class="carIcon" title="Parking"></li>
                                </ul>

                            </div>
                            <div class="pricePhone right">

                                <div class="price">
                                    $2,395 +
                                </div>


                                <div class="phone">
                                    <i class="phoneIcon"></i>
                                    <span>844-453-1005</span>
                                </div>
                            </div>
                        </div>
                        <div class="bottom">


                            <div class="beds left">
                                <span>1 Bedroom &amp; 2 Bedrooms</span>
                            </div>


                            <div class="CTA right">
                                <a href="javascript:void(0)" title="Contact Property"
                                   class="checkAvailability primary btn">
                                    <i class="emailIcon"></i>
                                    <span>Contact Property</span>
                                </a>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="widgetStatic widgetListYourRental">
                    <i class="keyIcon"></i>
                    <h2>List Your Rental</h2>
                    <p>Put your property in front of millions of renters who use Apartments.com. Post your rental in
                        minutes.</p>
                    <div class="actions">
                        <a href="/add-edit-listing/" target="_blank"
                           title="List your apartment, condo, house, or townhouse for rent on Apartments.com"
                           data-ga-label="add_listing" data-clickthru="true">Free Listing</a>
                    </div>
                </div>
                <div class="widgetStatic widgetRentersResources">
                    <i class="addListingIcon"></i>
                    <h2>Renter's Resources</h2>
                    <p>Stay on top of the latest advice from Apartments.com from how to style your apartment to moving
                        tips.</p>
                    <div class="actions">
                        <a href="http://www.apartments.com/blog/" target="_blank" title="Renter's Resources"
                           data-ga-label="renter_blog">Learn More</a>
                    </div>
                </div>
                <div class="widgetStatic widgetMobile">
                    <i class="iphoneIcon"></i>
                    <h2>Mobile Apps</h2>
                    <p>Wherever you go, we'll be with you. Web, tablet or mobile: Your choice!</p>
                    <ul>
                        <li><a href="https://play.google.com/store/apps/details?id=com.apartments.mobile.android"
                               target="_blank" id="googlePlayAction" title="Get the Apartments.com app for Android"
                               class="googlePlay" rel="nofollow" data-ga-label="Android"></a></li>
                        <li><a href="https://itunes.apple.com/app/id319836632"
                               title="Get the Apartments.com app for iOS" target="_blank" id="appStoreAction"
                               class="appStore" rel="nofollow" data-ga-label="iOS"></a></li>
                    </ul>
                </div>
                <div class="widgetVideo" itemprop="video" itemscope="" itemtype="http://schema.org/VideoObject">
                    <div class="image"></div>
                    <button id="videoPlayIcon" class="videoPlayIconLarge video" data-videoid="7d3b0t"
                            data-ga-label="MyRenterStory"></button>
                </div>
            </section>


            <section class="subTaglineText subTaglineTextBottom">
                <h2>#1 Apartment Listing Website</h2>
                <p>We simplify the process of finding a new apartment by offering renters the most comprehensive
                    database including millions of detailed and accurate apartment listings across the United States.
                    Our innovative technology includes the POLYGON™ search tool that allows users to define their own
                    search areas on a map and a "Plan Commute" feature that helps users search for rentals in proximity
                    to their office.</p>
                <p>Apartments.com is supported by the industry's largest professional research team, which has visited
                    and photographed over 400,000 properties nationwide. Our team makes over 1 million calls each month
                    to apartment owners and property managers, collecting and verifying current availabilities, rental
                    rates, pet policies, fees, leasing incentives, concessions, and more.</p>
            </section>
        </div>
        <div id="contactLead" class="contactLead" data-backdrop="static">

            <div class="contactLeadWrapper" id="contactLeadForm">
                <button type="button" class="closeIcon" data-dismiss="modal"></button>
                <h3>
                    <i class="phoneIcon"></i>
                    <span class="contactPhone"></span>
                </h3>
                <div class="contactForm">

                    <div class="cell-xs-6 first-input">
                        <input class="contactFormFirstName" type="text" placeholder="First Name *">
                    </div>
                    <div class="cell-xs-6 last-input">
                        <input class="contactFormLastName" type="text" placeholder="Last Name *">
                    </div>

                    <div class="cell-xs-6 first-input">
                        <input class="contactFormEmail" type="email" placeholder="Email Address *">
                    </div>
                    <div class="cell-xs-6 last-input">
                        <input class="contactFormPhoneNumber" id="phone" type="tel" placeholder="Phone">
                    </div>


                    <div class="cell-xs-12" id="ContactViaContainer">
                        <select id="ContactVia" class="selectpicker" type="text" style="display: none;">
                            <option id="defaultContactSelect" value="-1">Contact Via</option>
                            <option value="1">Phone</option>
                            <option value="2">Email</option>
                        </select>
                        <div class="btn-group bootstrap-select">
                            <button type="button" class="btn dropdownToggle selectpicker btn-default"
                                    data-toggle="dropdown" data-id="ContactVia" title="Contact Via"><span
                                        class="filter-option pull-left">Contact Via</span>&nbsp;<span
                                        class="caret"></span></button>
                            <div class="dropdownMenu open" role="combobox">
                                <ul class="dropdownMenu inner selectpicker" role="menu">
                                    <li rel="0" class="selected"><a tabindex="0" class="" style=""><span class="text">Contact Via</span><i
                                                    class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
                                    <li rel="1"><a tabindex="0" class="" style=""><span class="text">Phone</span><i
                                                    class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
                                    <li rel="2"><a tabindex="0" class="" style=""><span class="text">Email</span><i
                                                    class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="cell-xs-12" id="MaxRentContainer">

                        <input id="MaxRent" class="contactFormMaxRent" type="text" inputmode="numeric"
                               pattern="$?(\d|\,)*" placeholder="Max Rent" maxlength="6">
                    </div>

                    <div class="cell-xs-12" id="BedsBathsContainer">
                        <div class="cell-xs-6 first-input" id="bedContainer">
                            <select id="Beds" class="selectpicker" type="text" style="display: none;">
                                <option id="defaultBedSelect" value="-1">Beds</option>
                                <option value="0">Studio</option>
                                <option value="1">1 Bed</option>
                                <option value="2">2 Beds</option>
                                <option value="3">3 Beds</option>
                                <option value="4">4+ Beds</option>

                            </select>
                            <div class="btn-group bootstrap-select">
                                <button type="button" class="btn dropdownToggle selectpicker btn-default"
                                        data-toggle="dropdown" data-id="Beds" title="Beds"><span
                                            class="filter-option pull-left">Beds</span>&nbsp;<span class="caret"></span>
                                </button>
                                <div class="dropdownMenu open" role="combobox">
                                    <ul class="dropdownMenu inner selectpicker" role="menu">
                                        <li rel="0" class="selected"><a tabindex="0" class="" style=""><span
                                                        class="text">Beds</span><i
                                                        class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
                                        <li rel="1"><a tabindex="0" class="" style=""><span class="text">Studio</span><i
                                                        class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
                                        <li rel="2"><a tabindex="0" class="" style=""><span class="text">1 Bed</span><i
                                                        class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
                                        <li rel="3"><a tabindex="0" class="" style=""><span class="text">2 Beds</span><i
                                                        class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
                                        <li rel="4"><a tabindex="0" class="" style=""><span class="text">3 Beds</span><i
                                                        class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
                                        <li rel="5"><a tabindex="0" class="" style=""><span
                                                        class="text">4+ Beds</span><i
                                                        class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="cell-xs-6 last-input" id="bathContainer">
                            <select id="Baths" class="selectpicker" type="text" style="display: none;">
                                <option id="defaultBathSelect" value="-1">Baths</option>
                                <option value="1">1+ Baths</option>
                                <option value="2">2+ Baths</option>
                                <option value="3">3+ Baths</option>
                            </select>
                            <div class="btn-group bootstrap-select">
                                <button type="button" class="btn dropdownToggle selectpicker btn-default"
                                        data-toggle="dropdown" data-id="Baths" title="Baths"><span
                                            class="filter-option pull-left">Baths</span>&nbsp;<span
                                            class="caret"></span></button>
                                <div class="dropdownMenu open" role="combobox">
                                    <ul class="dropdownMenu inner selectpicker" role="menu">
                                        <li rel="0" class="selected"><a tabindex="0" class="" style=""><span
                                                        class="text">Baths</span><i
                                                        class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
                                        <li rel="1"><a tabindex="0" class="" style=""><span class="text">1+ Baths</span><i
                                                        class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
                                        <li rel="2"><a tabindex="0" class="" style=""><span class="text">2+ Baths</span><i
                                                        class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
                                        <li rel="3"><a tabindex="0" class="" style=""><span class="text">3+ Baths</span><i
                                                        class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="cell-xs-12">
                        <div class="calendar-input">
                            <i class="calendarIcon"></i>
                            <input class="contactFormMoveInDate" type="text" placeholder="Move-In Date *">
                            <div class="datepicker dropdown-menu">
                                <div class="datepicker-days" style="display: block;">
                                    <table class=" table-condensed">
                                        <thead>
                                        <tr>
                                            <th class="prev disabled"></th>
                                            <th class="next"></th>
                                            <th colspan="4" class="switch">August 2017</th>
                                            <th class="close"><a href="javascript:void();">Done</a></th>
                                        </tr>
                                        <tr>
                                            <th class="dow">S</th>
                                            <th class="dow">M</th>
                                            <th class="dow">T</th>
                                            <th class="dow">W</th>
                                            <th class="dow">T</th>
                                            <th class="dow">F</th>
                                            <th class="dow">S</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td class="day  pastMin disabled old">30</td>
                                            <td class="day  pastMin disabled old">31</td>
                                            <td class="day  pastMin disabled">1</td>
                                            <td class="day  pastMin disabled">2</td>
                                            <td class="day  pastMin disabled">3</td>
                                            <td class="day  pastMin disabled">4</td>
                                            <td class="day  pastMin disabled">5</td>
                                        </tr>
                                        <tr>
                                            <td class="day  pastMin disabled">6</td>
                                            <td class="day  pastMin disabled">7</td>
                                            <td class="day  pastMin disabled">8</td>
                                            <td class="day  pastMin disabled">9</td>
                                            <td class="day  active">10</td>
                                            <td class="day ">11</td>
                                            <td class="day ">12</td>
                                        </tr>
                                        <tr>
                                            <td class="day ">13</td>
                                            <td class="day ">14</td>
                                            <td class="day ">15</td>
                                            <td class="day ">16</td>
                                            <td class="day ">17</td>
                                            <td class="day ">18</td>
                                            <td class="day ">19</td>
                                        </tr>
                                        <tr>
                                            <td class="day ">20</td>
                                            <td class="day ">21</td>
                                            <td class="day ">22</td>
                                            <td class="day ">23</td>
                                            <td class="day ">24</td>
                                            <td class="day ">25</td>
                                            <td class="day ">26</td>
                                        </tr>
                                        <tr>
                                            <td class="day ">27</td>
                                            <td class="day ">28</td>
                                            <td class="day ">29</td>
                                            <td class="day ">30</td>
                                            <td class="day ">31</td>
                                            <td class="day  new">1</td>
                                            <td class="day  new">2</td>
                                        </tr>
                                        <tr>
                                            <td class="day  new">3</td>
                                            <td class="day  new">4</td>
                                            <td class="day  new">5</td>
                                            <td class="day  new">6</td>
                                            <td class="day  new">7</td>
                                            <td class="day  new">8</td>
                                            <td class="day  new">9</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="datepicker-months" style="display: none;">
                                    <table class="table-condensed">
                                        <thead>
                                        <tr>
                                            <th class="prev disabled"></th>
                                            <th class="next"></th>
                                            <th colspan="4" class="switch">2017</th>
                                            <th class="close"><a href="javascript:void();">Done</a></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td colspan="7"><span class="month">Jan</span><span class="month">Feb</span><span
                                                        class="month">Mar</span><span class="month">Apr</span><span
                                                        class="month">May</span><span class="month">Jun</span><span
                                                        class="month">Jul</span><span class="month">Aug</span><span
                                                        class="month">Sep</span><span class="month">Oct</span><span
                                                        class="month">Nov</span><span class="month">Dec</span></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="datepicker-years" style="display: none;">
                                    <table class="table-condensed">
                                        <thead>
                                        <tr>
                                            <th class="prev disabled"></th>
                                            <th class="next"></th>
                                            <th colspan="4" class="switch">2010-2019</th>
                                            <th class="close"><a href="javascript:void();">Done</a></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td colspan="7"><span class="year old">2009</span><span
                                                        class="year">2010</span><span class="year">2011</span><span
                                                        class="year">2012</span><span class="year">2013</span><span
                                                        class="year">2014</span><span class="year">2015</span><span
                                                        class="year">2016</span><span
                                                        class="year active">2017</span><span
                                                        class="year">2018</span><span class="year">2019</span><span
                                                        class="year old">2020</span></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="cell-xs-12" id="ReasonForMovingContainer">
                        <select id="ReasonForMoving" class="selectpicker" type="text" style="display: none;">
                            <option id="defaulReasonSelect" value="-1">Reason for Moving</option>
                            <option value="1">More/Less Space</option>
                            <option value="2">Job Change</option>
                            <option value="3">Family Event</option>
                            <option value="4">Relocation</option>
                            <option value="5">Other</option>
                        </select>
                        <div class="btn-group bootstrap-select">
                            <button type="button" class="btn dropdownToggle selectpicker btn-default"
                                    data-toggle="dropdown" data-id="ReasonForMoving" title="Reason for Moving"><span
                                        class="filter-option pull-left">Reason for Moving</span>&nbsp;<span
                                        class="caret"></span></button>
                            <div class="dropdownMenu open" role="combobox">
                                <ul class="dropdownMenu inner selectpicker" role="menu">
                                    <li rel="0" class="selected"><a tabindex="0" class="" style=""><span class="text">Reason for Moving</span><i
                                                    class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
                                    <li rel="1"><a tabindex="0" class="" style=""><span
                                                    class="text">More/Less Space</span><i
                                                    class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
                                    <li rel="2"><a tabindex="0" class="" style=""><span class="text">Job Change</span><i
                                                    class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
                                    <li rel="3"><a tabindex="0" class="" style=""><span class="text">Family Event</span><i
                                                    class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
                                    <li rel="4"><a tabindex="0" class="" style=""><span class="text">Relocation</span><i
                                                    class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
                                    <li rel="5"><a tabindex="0" class="" style=""><span class="text">Other</span><i
                                                    class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
                                </ul>
                            </div>
                        </div>

                    </div>

                    <div class="cell-xs-12 contactFormMessageWrapper">
                        <textarea class="contactFormMessage" placeholder="Message"></textarea>
                    </div>

                    <input type="checkbox" id="emailListings" class="optin primaryCheckbox emailListings" checked="">
                    <label class="emailListingsLabel" for="emailListings"><span>Email me listings and apartment related info.</span></label>


                    <div class="cell-xs-12 submitError">
                        <input type="hidden" id="submitGeneralError">
                    </div>
                    <a href="javascript:void(0);" class="primary contactFormAction"><i class="emailIcon"></i>Contact
                        Property</a>
                </div>
            </div>


        </div>
        <section>

            <section id="linksSection" class="linksSection clamped">
                <div class="clearfix">
                    <div class="linksColumn">
                        <h3>Top Markets</h3>
                        <ul>
                            <li><a href="/atlanta-ga/" title="Atlanta, GA Apartments for Rent">Atlanta Apartments</a>
                            </li>
                            <li><a href="/austin-tx/" title="Austin, TX Apartments for Rent">Austin Apartments</a></li>
                            <li><a href="/baltimore-md/" title="Baltimore, MD Apartments for Rent">Baltimore
                                    Apartments</a></li>
                            <li><a href="/boston-ma/" title="Boston, MA Apartments for Rent">Boston Apartments</a></li>
                            <li><a href="/chicago-il/" title="Chicago, IL Apartments for Rent">Chicago Apartments</a>
                            </li>
                            <li><a href="/cincinnati-oh/" title="Cincinnati, OH Apartments for Rent">Cincinnati
                                    Apartments</a></li>
                            <li><a href="/dallas-tx/" title="Dallas, TX Apartments for Rent">Dallas Apartments</a></li>
                            <li><a href="/denver-co/" title="Denver, CO Apartments for Rent">Denver Apartments</a></li>
                            <li><a href="/detroit-mi/" title="Detroit, MI Apartments for Rent">Detroit Apartments</a>
                            </li>
                        </ul>
                    </div>
                    <div class="linksColumn">
                        <h3>&nbsp;</h3>
                        <ul>
                            <li><a href="/houston-tx/" title="Houston, TX Apartments for Rent">Houston Apartments</a>
                            </li>
                            <li><a href="/irvine-ca/" title="Apartments for Rent in Irvine CA">Irvine Apartments</a>
                            </li>
                            <li><a href="/los-angeles-ca/" title="Los Angeles (LA), CA Apartments for Rent">Los Angeles
                                    Apartments</a></li>
                            <li><a href="/miami-fl/" title="Miami, FL Apartments for Rent">Miami Apartments</a></li>
                            <li><a href="/nashville-tn/" title="Nashville, TN Apartments for Rent">Nashville
                                    Apartments</a></li>
                            <li><a href="/nj/" title="Apartments for Rent in NJ">New Jersey Apartments</a></li>
                            <li><a href="/new-york-ny/" title="Apartments for Rent in NYC">New York City Apartments</a>
                            </li>
                            <li><a href="/orlando-fl/" title="Orlando, FL Apartments for Rent">Orlando Apartments</a>
                            </li>
                            <li><a href="/philadelphia-pa/" title="Philadelphia, PA Apartments for Rent">Philadelphia
                                    Apartments</a></li>
                        </ul>
                    </div>
                    <div class="linksColumn linksBorderColumn">
                        <h3>&nbsp;</h3>
                        <ul>
                            <li><a href="/phoenix-az/" title="Phoenix, AZ Apartments for Rent">Phoenix Apartments</a>
                            </li>
                            <li><a href="/portland-or/" title="Portland, OR Apartments for Rent">Portland Apartments</a>
                            </li>
                            <li><a href="/queens-ny/" title="Queens, NY Apartments for Rent">Queens Apartments</a></li>
                            <li><a href="/san-antonio-tx/" title="San Antonio, TX Apartments for Rent">San Antonio
                                    Apartments</a></li>
                            <li><a href="/san-diego-ca/" title="San Diego, CA Apartments for Rent">San Diego
                                    Apartments</a></li>
                            <li><a href="/san-francisco-ca/" title="San Francisco (SF), CA Apartments for Rent">San
                                    Francisco Apartments</a></li>
                            <li><a href="/seattle-wa/" title="Seattle, WA Apartments for Rent">Seattle Apartments</a>
                            </li>
                            <li><a href="/tampa-fl/" title="Tampa, FL Apartments for Rent">Tampa Apartments</a></li>
                            <li><a href="/washington-dc/" title="Washington DC Apartments for Rent">Washington DC
                                    Apartments</a></li>
                        </ul>
                    </div>
                    <div class="linksColumn">
                        <h3>Popular Searches</h3>
                        <ul>
                            <li><a href="/reviews/" title="Search Recent Apartment Reviews">Apartment Reviews</a></li>
                            <li><a href="/pet-friendly-apartments/" title="Pet Friendly Apartments for Rent">Pet
                                    Friendly Apartments</a></li>
                            <li><a href="/malls/" title="Apartments Near Shopping Malls">Apartments Near Malls</a></li>
                            <li><a href="/transit/" title="Apartments Near Metro and Transit Stations">Apartments Near
                                    Transit</a></li>
                            <li><a href="/airports/" title="Apartments Near Airports">Apartments Near Airports</a></li>
                            <li><a href="/no-fee-apartments-nyc/" title="NYC No Fee Apartments">No Fee Apartments
                                    NYC</a></li>
                            <li><a href="/luxury-apartments-nyc/" title="NYC Luxury Apartments">Luxury NYC
                                    Apartments</a></li>
                            <li><a href="/fort-smith-ar/" title="Apartments for Rent in Fort Smith AR">Fort Smith AR
                                    Apartments</a></li>
                            <li><a href="/fayetteville-ar/" title="Apartments for Rent in Fayetteville AR">Fayetteville
                                    AR Apartments</a></li>
                        </ul>
                    </div>
                    <div class="linksColumn linksBorderColumn">
                        <h3>&nbsp;</h3>
                        <ul>
                            <li><a href="/houses/charlotte-nc/" title="Houses for Rent in Charlotte, NC">Charlotte Homes
                                    for Rent</a></li>
                            <li><a href="/houses/houston-tx/" title="Houses for Rent in Houston, TX">Houston Homes for
                                    Rent</a></li>
                            <li><a href="/houses/las-vegas-nv/" title="Houses for Rent in Las Vegas, NV">Las Vegas Homes
                                    for Rent</a></li>
                            <li><a href="/houses/orlando-fl/" title="Houses for Rent in Orlando, FL">Orlando Homes for
                                    Rent</a></li>
                            <li><a href="/houses/phoenix-az/" title="Houses for Rent in Phoenix, AZ">Phoenix Homes for
                                    Rent</a></li>
                            <li><a href="/houses/san-antonio-tx/" title="Houses for Rent in San Antonio, TX">San Antonio
                                    Homes for Rent</a></li>
                            <li><a href="/houses/san-diego-ca/" title="Houses for Rent in San Diego, CA">San Diego Homes
                                    for Rent</a></li>
                            <li><a href="/pittsburg-ks/" title="Apartments for Rent in Pittsburg KS">Pittsburg KS
                                    Apartments</a></li>
                            <li><a href="/burlington-ia/" title="Apartments for Rent in Burlington IA">Burlington Iowa
                                    Apartments</a></li>
                        </ul>
                    </div>
                    <div class="linksColumn linksLastColumn">
                        <h3>Neighborhood Guides</h3>
                        <ul>
                            <li><a href="/brickell-miami-fl/#guide">Living in Brickell</a></li>
                            <li><a href="/bronx-ny/#guide">Living in The Bronx</a></li>
                            <li><a href="/east-atlanta-atlanta-ga/#guide">Living in East Atlanta</a></li>
                            <li><a href="/central-east-austin-austin-tx/#guide">Living in East Austin</a></li>
                            <li><a href="/lincoln-park-chicago-il/#guide">Living in Lincoln Park</a></li>
                            <li><a href="/san-diego-ca/#guide">Living in San Diego</a></li>
                            <li><a href="/san-francisco-ca/#guide">Living in San Francisco</a></li>
                            <li><a href="/upper-west-side-new-york-ny/#guide">Living in Upper West Side</a></li>
                            <li><a href="/downtown-dallas-dallas-tx/#guide">Living in Downtown Dallas</a></li>
                        </ul>
                    </div>
                </div>
                <a href="javascript:void(0);">+ View more</a></section>

        </section>

    </div>
@endsection
@section('scripts')
        <script src="{{ asset('js/jquery.min.js') }}"></script>
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>
@endsection

