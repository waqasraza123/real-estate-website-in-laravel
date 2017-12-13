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
                    <div class="col-xs-12 col-lg-8">
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
                                <div class="col-xs-12 col-sm-6 col-lg-4">
                                    <input id="autocomplete" class="input-full main-input"  value="{{ old('address') }}" onFocus="geolocate()" type="text" placeholder="{{ Lang::get('listing.address') }}" name="address">
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
                                <div class="col-lg-3 col-xs-12 form-">
                                    <div class="dropdown btn-group bootstrap-select show-tick  ">
                                        <button id="min-max-price-range" class="btn dropdown-toggle btn-default " href="#" data-toggle="dropdown" style="text-align: left"><span class="minp">Rent</span><span class="maxp">Range</span><strong class="caret"></strong>
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
                                                    <span>$1500</span></li>
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
                                                    <span>$2300</span></li>
                                                <li data-value="2500">
                                                    <span>$2500</span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-xs-12">
                                    <select name="beds_baths[]" class="selectpicker" multiple="" title="Beds X Baths">
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
                                <div class="col-sm-12 col-md-6 col-lg-2 col-xs-12 text-center  adv-search-button-cont">
                                    <button type="submit" class="button-primary  appartament_search">
                                        <span>{{ Lang::get('home.search_btn') }}</span>
                                        <div class="button-triangle"></div>
                                        <div class="button-triangle2"></div>
                                        <div class="button-icon"><i class="fa fa-search"></i></div>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-xs-12 col-lg-4">
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
                                <button type="submit" class="button-primary  appartament_search" style="margin-right: 60px;margin-top: 26px;"> Save Search
                                <div class="button-triangle"></div>
                                <div class="button-triangle2"></div>
                                <div class="button-icon"><i class="fa fa-search-plus"></i></div>
                            </button>
                        </form>
                            @endif
                    </div>
                </div>
            </div>
        </div>



    </div>
    <div class="row">
        @if($listings->first())
        <div class="col-lg-7 " style="    padding-right: 0;">
            <div class="polygon">
                Polygon
                <i class="fa fa-map-o">

                </i>
            </div>
            <div id="offers-map"></div>
        </div>
        <div class="col-lg-5 " id="offers-list" style="background: white;  overflow-y: scroll">
            <div class="row"  style="overflow: scroll">
                <div class="col-xs-12">
                    @foreach($listings as $listing)
                        <div class="list-agency row">
                            <div class="list-agency-left col-xs-6">
                                @if($listing->ListingsImages()->where('featured', "1")->first())
                                    <img src="{{ asset('assets/images').'/'.$listing->ListingsImages()->whereNotNull('featured')->first()->image }}" alt="" width="100%" height="250px">
                                @endif
                                <div class="list-agency-description">
                                    <div class="team-desc-line">
												<span class="team-icon-circle">
													<i class="fa fa-house" style="line-height: 22px;"></i>
												</span>
                                        <span>{{ $listing->name }}</span>
                                    </div>
                                    <div class="team-desc-line">
												<span class="team-icon-circle">
													<i class="fa fa-dollar" style="line-height: 22px;"></i>
												</span>
                                        <span>{{ $listing->rent }} </span>
                                    </div>
                                    <div class="team-desc-line">
												<span class="team-icon-circle">
													<i class="fa fa-bed fa-sm" style="line-height: 22px;"></i>
												</span>
                                        <span><a href="#"> {{ $listing->beds_count }} Bed</a></span>
                                    </div>
                                    <div class="team-desc-line">
												<span class="team-icon-circle">
													<i class="fa fa-phone" style="line-height: 22px;"></i>
												</span>
                                        <span><a href="#">{{ App\User::where('id' ,$listing->user_id)->pluck('phone')->first() }}</a></span>
                                    </div>
                                </div>
                            </div>
                            <a class="list-agency-right-large col-xs-6" href="{{ route('singleListing' , ['id' => $listing->listing_id , 'title' => $listing->title]) }}">
                                <div class="list-agency-text">
                                    <h4 class="list-agency-title"><i class="fa fa-map-marker"></i>  {{ $listing->address }}</h4>
                                    <div class="list-agency-separator"></div>
                                    <p class="text-justified">{{ $listing->description }}</p>
                                </div>

                            </a>
                            <div class="small-triangle"></div>
                            <div class="small-triangle2"></div>
                            <a class="small-icon" href="{{ route('singleListing' , ['id' => $listing->listing_id , 'title' => $listing->title]) }}"><i class="jfont fa-2x"></i></a>
                        </div>
                    @endforeach
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
        $('#min-max-price-range').click(function (event) {
            setTimeout(function(){ $('.price-label').first().focus();	},0);
        });
        var priceLabelObj;
        $('.price-label').focus(function (event) {
            priceLabelObj=$(this);
            $('.price-range').addClass('hide');
            $('#'+$(this).data('dropdownId')).removeClass('hide');
        });

        $(".price-range li").click(function(){
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
        function offersMapInitt(id, locations) {
            var mapOptions = {
                zoom: 1,
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
            var mapMarkers = [];
            var polygon = [];
            for (i = 0; i < locations.length; i++) {
                var pos = new google.maps.LatLng(locations[i][0], locations[i][1]);
                polygon.push(pos)
                var marker = new google.maps.Marker({
                    position: pos,
                    map: map,
                    title: '',
                    icon: locations[i][2]
                });
                mapMarkers[i] = marker;
                var infoBoxContent = document.createElement("div");
                infoBoxContent.className = "infobox-wrapper";
                infoBoxContent.innerHTML = "<a class='infobox-main' href='" + locations[i][3] + "'><div class='infobox-image'><img src='" + locations[i][4] + "' alt='" + locations[i][5] + "' /></div><div class='infobox-text'>" + locations[i][5] + "</div><div class='infobox-price'>" + locations[i][6] + "</div></a>";
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

            var bermudaTriangle = new google.maps.Polygon({
                paths: polygon
            });


            bermudaTriangle.setMap(map);
            var bounds = new google.maps.LatLngBounds();
            for (var i = 0, LtLgLen = LatLngList.length; i < LtLgLen; i++) {
                bounds.extend(LatLngList[i]);
            }
            map.fitBounds(bounds);

            var markerClusterStyle = [{
                url: 'images/pin-empty.png',
                height: 80,
                width: 48,
                textSize: 16,
                textColor: '#3798dd'
            }];


            var markerCluster = new MarkerClusterer(map, mapMarkers, {styles:markerClusterStyle});
            minClusterZoom = 14;
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
            var  poly=new google.maps.Polyline({map:map,clickable:false});
            var move=google.maps.event.addListener(map,'mousemove',function(e){
                poly.getPath().push(e.latLng);
            });
            //mouseup-listener
            google.maps.event.addListenerOnce(map,'mouseup',function(e){
                google.maps.event.removeListener(move);
                var path=poly.getPath();
                var sending_data = poly.getPath().getArray();
                sending_data = JSON.stringify(sending_data);
                poly.setMap(null);
                $.ajax({
                    'type' : 'post',
                    'url' : '{{ route('searchListingAjax') }}',
                    'data' : {datas:sending_data},
                });


                poly=new google.maps.Polygon({map:map,path:path});
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
            console.log("draws");
            disable();
            google.maps.event.addDomListener(map.getDiv(),'mousedown',function(e){
                drawFreeHand()
            });

        });



    </script>

    <script>
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
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDF8NFf6d_o4NsjkrwdPgrboEDUo0SMgkE&language=en&libraries=places&callback=initAutocomplete"
            async defer></script>
@endsection