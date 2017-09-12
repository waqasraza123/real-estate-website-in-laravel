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
                            <h1>Saved Searches<span class="special-color">.</span> @if($searches->first()) ({{ count($searches) }}) @endif</h1>
                            <div class="title-separator-primary"></div>
                        </div>
                    </div>
                    @if($searches->first())
                        <div class="row">

                            @foreach($searches as $serch)
                                <div class="col-md-6 col-lg-6 col-xs-12 margin-top-60">
                                    <form action="{{ route('searchSavedSeraches') }}" method="post">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="address" value="{{ $serch->address }}">
                                        <input type="hidden" name="rent" value="{{ $serch->rent }}">
                                        <input type="hidden" name="listing_type" value="{{ $serch->listing_type }}">
                                        <input type="hidden" name="beds" value="{{ $serch->beds }}">
                                        <input type="hidden" name="baths" value="{{ $serch->baths }}">
                                        <div class="neighbourhood-col">
                                            <div class="neighbourhood-item">
                                                <div class="neighbourhood-photo">
                                                    <img src="{{ asset('images\featured-offer1.jpg') }}" alt="">
                                                </div>
                                                <div class="neighbourhood-text">
                                                    <h4 class="neighbourhood-title">{{ $serch->name }}</h4>
                                                    <p><i class="fa fa-map-marker"></i>{{ $serch->address }}</p>
                                                </div>
                                            </div>
                                            <button type="submit" class="button-fourth center-button-cont scroll">
                                                <span>Open</span>
                                                <div class="button-triangle"></div>
                                                <div class="button-triangle2"></div>
                                                <div class="button-icon"><i class="fa fa-calendar-check-o"></i></div>
                                            </button>
                                        </div>


                                    </form>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="row">
                            <div class="col-lg-12">
                                <h5 class="labeles">
                                    0 Saved
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

