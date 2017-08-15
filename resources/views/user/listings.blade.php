@extends('layouts.app')

@section('content')

    <section class="short-image no-padding blog-short-title">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-lg-12 short-image-title">
                    <h5 class="subtitle-margin second-color">dashboard</h5>
                    <h1 class="second-color">My Listings</h1>
                    <div class="short-title-separator"></div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-light section-top-shadow">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-md-9 col-md-push-3">
                    <div class="row">
                        <div class="col-xs-12">
                            <h5 class="subtitle-margin">My</h5>
                            <h1>  Listings<span class="special-color">.</span></h1>
                            <div class="title-separator-primary"></div>
                        </div>
                    </div>
                    <form action="search_listing">
                        {{csrf_field()}}
                        <div class="row">
                            <div class="col-lg-9">
                                <h5 class="labeles">Search By:</h5>
                                <input type="text" name="address" id="headerSearchBarLookup" class="input-full main-input" placeholder="Address">
                            </div>
                           <div class="col-lg-3">
                               <h5 class="labeles">     </h5>
                               <a href="#" class="button-primary">
                                   <span>Search</span>
                                   <div class="button-triangle"></div>
                                   <div class="button-triangle2"></div>
                                   <div class="button-icon"><i class="fa fa-search"></i></div>
                               </a>
                           </div>
                        </div>
                    </form>
                    {{--Checking here the listing`s that came from db--}}

                    <div class="row">
                        <div class="col-lg-12">
                            <h5 class="labeles">
                                0 Listings
                            </h5>
                        </div>
                    </div>
                    <div class="row margin-top-60"></div>
                </div>
                @include('user.parts.left_side')
            </div>
        </div>
    </section>

@endsection

