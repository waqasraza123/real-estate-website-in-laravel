@extends('layouts.app')

@section('content')

    <section class="short-image no-padding blog-short-title">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-lg-12 short-image-title">
                    <h5 class="subtitle-margin second-color">{{ Lang::get('profile.dashboard_profile') }}</h5>
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
                        {{--Notify massages--}}

                        @if(Session::has('success'))
                            <div class="success-box margin-top-30">
                                <p>{{ Session::get('success') }}</p>
                                <div class="small-triangle"></div>
                                <div class="small-icon"><i class="jfont"></i></div>
                            </div>
                        @endif

                        @if(Session::has('error'))
                            <div class="error-box margin-top-30">
                                <p>{{ Session::get('error') }}</p>
                                <div class="small-triangle"></div>
                                <div class="small-icon"><i class="jfont"></i></div>
                            </div>
                        @endif

                       {{-- end notify Massage--}}
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

                    @if($listings->first())
                        @foreach($listings as $listing)
                           <div class="row">
                                <div class="col-md-12 col-lg-12  margin-top-60">
                                    <article class="blog-grid1-item zoom-cont">
                                        <figure class="">
                                            @if($listing->ListingsImages()->first())
                                                <a href="{{ route('singleListing' , ['id' => $listing->id]) }}"><img src="{{ asset('assets/images').'/'.$listing->ListingsImages()->first()->image }}" alt=""  style="width: 240px !important"></a>
                                            @endif
                                        </figure>
                                        <div class="blog-grid1-post-content" style="width: 100%">
                                            <div class="blog-grid1-topline">
                                                <div class="blog-grid1-date pull-right"><i class="fa fa-calendar-o"></i>{{ $listing->created_at  }}</div>
                                                <div class="clearfix"></div>
                                            </div>
                                            <a href="{{ route('singleListing' , ['id' => $listing->id]) }}" class="blog-grid1-title"><h4>{{ $listing->address }}</h4></a>
                                            <div class="blog-grid1-separator"></div>
                                            <p>{{ $listing->description }}</p>
                                            <a href="{{ route('deleteListing' , ['id' => $listing->id]) }}" class="blog-grid1-button" style="right:10px; left: auto">
                                                <span><i class="fa fa-trash-o"></i></span>
                                                <div class="blog-grid1-triangle"></div>
                                            </a>
                                            <a href="{{ route('editListing' , ['id' => $listing->id]) }}" class="blog-grid1-button" style="right:70px; left: auto">
                                                <span><i class="fa fa-pencil"></i></span>
                                                <div class="blog-grid1-triangle"></div>
                                            </a>
                                        </div>
                                    </article>
                                </div>
                           </div>
                        @endforeach
                    @else
                    <div class="row">
                        <div class="col-lg-12">
                            <h5 class="labeles">
                                0 Listings
                            </h5>
                        </div>
                    </div>
                    @endif
                    <div class="row margin-top-60"></div>
                </div>
                @include('user.parts.left_side')
            </div>
        </div>
    </section>

@endsection

@section('scripts')

@endsection

