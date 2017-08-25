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
            <div class="white_bg" style="background: white; padding-left: 20px">
                <form action="{{ route('searchListing') }}" class="apartament_form" method="post" style="margin-bottom: 0px">
                    {{ csrf_field()  }}
                    <input type="hidden" name="listing_type" value="2">
                    <div class="row">
                        <br>
                        <div class="col-xs-12 col-sm-6 col-lg-4">
                            <input id="geocomplete" name="address" type="text" class="input-full main-input" required placeholder="Localization">
                            <div id="submit-property-map" style="display: none" class="submit-property-map"></div>
                            <div class="row" style="display: none">
                                <div class="col-xs-12 col-sm-6 margin-top-15">
                                    <input name="lng" type="text" class="input-full main-input input-last" placeholder="Longitude" readonly="readonly">
                                </div>
                                <div class="col-xs-12 col-sm-6 margin-top-15">
                                    <input name="lat" type="text" class="input-full main-input input-last" placeholder="Latitude" readonly="readonly">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <select name="rent" id="rent" class="selectpicker"   title="Rent">
                                <option value="500-700">$500 - $700</option>
                                <option value="700-900">$700 - $900</option>
                                <option value="900-1300">$900 - $1300</option>
                                <option value="1300-1800">$1300 - $1800</option>
                                <option value="1800-2100">$1800 - $2100</option>
                                <option value="2100-2150">$2100 - $2150</option>
                            </select>
                        </div>
                        <div class="col-lg-3">
                            <select name="beds_baths[]" class="selectpicker" multiple="" title="Beds X Baths">
                                <optgroup label="Beds" data-max-options="1">
                                    <option value="all">All Beds</option>
                                    <option value="1">1 Bed</option>
                                    <option value="2">2 Beds</option>
                                    <option value="3">3 Beds</option>
                                    <option value="4">4+  Beds</option>
                                </optgroup>
                                <optgroup label="Baths" data-max-options="1">
                                    <option value="all_baths">All Baths</option>
                                    <option value="1">1+ Baths</option>
                                    <option value="2">2+ Baths</option>
                                    <option value="3">3+ Baths</option>
                                </optgroup>
                            </select>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-2  adv-search-button-cont">
                            <button type="submit" class="button-primary  appartament_search">
                                <span>{{ Lang::get('home.search_btn') }}</span>
                                <div class="button-triangle"></div>
                                <div class="button-triangle2"></div>
                                <div class="button-icon"><i class="fa fa-search"></i></div>
                            </button>
                        </div>
                    </div>
                    {{-- <div class="row">

                     </div>
                     <div class="container">
                         <div class="row">

                         </div>
                     </div>--}}
                </form>
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
                     <div>
                         <i class="fa fa-map-marker list-offer-localization hidden-xs"></i>
                        <h4 class="list-offer-title">{{ $listing->address }}</h4>
                     </div>
                    <div class="list-offer">
                        <div class="list-offer-left">
                            <div class="list-offer-front">
                                <div class="list-offer-photo">
                                    <img src="{{ asset('assets/images').'/'.$listing->ListingsImages()->first()->image }}" alt="">
                                </div>
                                <div class="list-offer-params">
                                    <div class="list-area">
                                        <img src="images\area-icon.png" alt="">54m<sup>2</sup>
                                    </div>
                                    <div class="list-rooms">
                                        <img src="images\rooms-icon.png" alt="">3
                                    </div>
                                    <div class="list-baths">
                                        <img src="images\bathrooms-icon.png" alt="">1
                                    </div>
                                </div>
                            </div>

                        </div>
                        <a class="list-offer-right-large" href="estate-details-right-sidebar.html" style="min-width: 320px">
                            <div class="list-offer-text">
                                <i class="fa fa-clock-o list-offer-localization hidden-xs"></i>
                                {{ $listing->created_at->diffInhours() }}HR
                                <div class="clearfix"></div>
                                <h4>
                                    {{ $listing->rent }}$
                                </h4>
                                <br>
                               {{ $listing->beds_count }} Bed
                                <br>
                                Available {{ \Carbon\Carbon::parse($listing->available_date)->format('m/d/y') }}
                                <br>
                                <i class="fa fa-phone" aria-hidden="true"></i>
                                {{ App\User::where('id' ,$listing->user_id)->pluck('phone')->first() }}
                                <div class="clearfix"></div>
                                  {{--  {{ $listing->description }}--}}
                                <div class="clearfix"></div>
                            </div>
                            <div class="price-list-cont">
                                <div class="list-price">
                                    <i class="fa fa-envelope-o"></i>
                                    Email Property
                                </div>
                            </div>
                        </a>
                        <div class="clearfix"></div>
                    </div>
                    @endforeach



                </div>
            </div>

        </div>
        @else
            <div class="error-box margin-top-30">
                <p>Sorry nothing Match to your creterias</p>
                <div class="small-triangle"></div>
                <div class="small-icon"><i class="jfont"></i></div>
            </div>

        @endif
    </div>

@endsection
@section('scripts')
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
                zoom: 10,
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
            //move-listener
            var move=google.maps.event.addListener(map,'mousemove',function(e){
                var locations = [];
                var array = [];
                array.push(e.latLng.lat(), e.latLng.lng());
                locations.push(array);
                console.log(locations);




                console.log(locations);
                var lat = [];
                var lng = [];
                lat.push(e.latLng.lat());
                lng.push(e.latLng.lng());
                poly.getPath().push(e.latLng);

               /* jQuery(document).ready(function($) {
                    $.ajax({

                    })
                })*/
            });
            //mouseup-listener
            google.maps.event.addListenerOnce(map,'mouseup',function(e){
                google.maps.event.removeListener(move);
                var path=poly.getPath();
                poly.setMap(null);

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

@endsection