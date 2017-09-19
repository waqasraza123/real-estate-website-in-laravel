@extends('layouts.app')

@section('content')
    <section class="short-image no-padding" >
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-lg-12 short-image-title">
                    <h5 class="subtitle-margin second-color">Add a Listing </h5>
                    <h1 class="second-color">Terms of Service</h1>
                    <div class="short-title-separator"></div>
                </div>
            </div>
        </div>
    </section>
    <section class="section-light section-top-shadow">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <article class="dark-col">
                        <h1 class="title-negative-margin">{{ Lang::get('terms.a_lisitng_term_header') }}<span class="special-color">.</span></h1>
                        <p class="blog-text">
                            {{ Lang::get('terms.terms_listing_text_first') }}
                        </p>
                        <p class="blog-text">
                            {{ Lang::get('terms.terms_listing_text_second') }}
                        </p>
                        <h3 class="title-negative-margin">{{ Lang::get('terms.misc') }}<span class="special-color">.</span></h3>
                        <p class="blog-text">
                            {{ Lang::get('terms.terms_listing_text_third') }}
                        </p>
                        <p class="blog-text">
                            {{ Lang::get('terms.terms_listing_footer') }}
                        </p>
                    </article>
                </div>
            </div>
        </div>
    </section>
@endsection