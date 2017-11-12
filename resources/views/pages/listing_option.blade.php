@extends('layouts.app')

@section('content')
    <section class="short-image no-padding blog-short-title">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-lg-12 short-image-title">
                    <h5 class="subtitle-margin second-color">add listing</h5>
                    <h1 class="second-color">Agent & Owner</h1>
                    <div class="short-title-separator"></div>
                </div>
            </div>
        </div>
    </section>
    <section class="section-light" style="min-height: 600px">
        <div class="container">
            <div class="row">
                <div class="col-xs-8 col-xs-offset-2">
                    <div class="row">
                        <div class="col-md-6 text-center">
                            <a href="{{ route('addListing') }}" class="button-primary">
                                <span>{{ Lang::get('pages.owners') }}</span>
                                <div class="button-triangle"></div>
                                <div class="button-triangle2"></div>
                                <div class="button-icon"><i class="fa fa-user"></i></div>
                            </a>
                        </div>
                        <div class="col-md-6 text-center">
                            <a href="{{ route('agentForm') }}" class="button-primary">
                                <span>{{ Lang::get('pages.agents') }}</span>
                                <div class="button-triangle"></div>
                                <div class="button-triangle2"></div>
                                <div class="button-icon"><i class="fa fa-users"></i></div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

