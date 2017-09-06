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
                            <h1>Favorites<span class="special-color">.</span></h1>
                            <div class="title-separator-primary"></div>
                        </div>
                    </div>
                    @if($list->first())
                        @foreach($list as $lis)
                            <div class="row">
                                <div class="col-md-12 col-lg-12  margin-top-60">
                                    <article class="blog-grid1-item zoom-cont">
                                        <figure class="">
                                            <a href="blog-right-sidebar.html"><img src="{{ asset('assets/images').'/'.$lis->Listing()->first()->ListingsImages()->first()->image }}" alt=""  style="width: 240px !important"></a>
                                        </figure>
                                        <div class="blog-grid1-post-content" style="width: 100%">
                                            <div class="blog-grid1-topline">
                                                <div class="blog-grid1-date pull-right"><i class="fa fa-calendar-o"></i>{{ $lis->Listing()->first()->created_at  }}</div>
                                                <div class="clearfix"></div>
                                            </div>
                                            <a href="{{ route('singleListing' , ['id' => $lis->Listing()->first()->id] ) }}" class="blog-grid1-title"><h4>{{ $lis->Listing()->first()->address }}</h4></a>
                                            <div class="blog-grid1-separator"></div>
                                            <p>{{ $lis->Listing()->first()->description  }}</p>
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

