@extends('layouts.app')

@section('content')
    <section class="short-image no-padding" >
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-lg-12 short-image-title">
                    <h1 class="subtitle-margin second-color">Equal Opportunity in </h1>
                    <h1 class="second-color">Housing Statement</h1>
                    <div class="short-title-separator"></div>
                </div>
            </div>
        </div>
    </section>
    <section class="section-light section-top-shadow">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <article class="dark-col ">
                        <h1 class="title-negative-margin">{{ Lang::get('terms.equal_header') }}<span class="special-color">.</span></h1>
                        <br>
                        <br>
                        <h3  class="title-negative-margin">{{ Lang::get('terms.equal_first_small_header') }}<span class="special-color">.</span></h3>
                        <p class="blog-text">
                            {{ Lang::get('terms.equal_text_1') }}
                        </p>
                        <p class="">
                            {{ Lang::get('terms.equal_text_2') }}
                        </p>
                        <h3  class="title-negative-margin blog-text">{{ Lang::get('terms.equal_header_2') }}<span class="special-color">.</span></h3>
                        <p class="blog-text">
                            {{ Lang::get('terms.law_1') }}
                        </p>
                        <p class="blog-text">
                            {{ Lang::get('terms.law_2') }}
                        </p>
                        <p class="blog-text">
                            {{ Lang::get('terms.law_3') }}
                        </p>
                        <p class="blog-text">
                            {{ Lang::get('terms.law_4') }}
                        </p>
                        <p class="blog-text">
                            {{ Lang::get('terms.law_5') }}
                        </p>
                        <p class="blog-text">
                            {{ Lang::get('terms.law_6') }}
                        </p>
                        <p class="blog-text">
                            {{ Lang::get('terms.law_7') }}
                        </p>
                    </article>
                </div>
            </div>
        </div>
    </section>
@endsection