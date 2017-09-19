@extends('layouts.app')

@section('content')
    <section class="short-image no-padding" >
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-lg-12 short-image-title">
                    <h1 class="subtitle-margin second-color">Terms of Service </h1>
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
                        <h1 class="title-negative-margin">{{ Lang::get('terms.terms_1') }}<span class="special-color">.</span></h1>
                        <br>
                        <h3  class="title-negative-margin">{{ Lang::get('terms.terms_h_1') }}<span class="special-color">.</span></h3>

                        <p class="">
                            {{ Lang::get('terms.terms_t_1') }}
                        </p>
                        <br>

                        <h3  class="title-negative-margin">{{ Lang::get('terms.terms_h_2') }}<span class="special-color">.</span></h3>
                        <br>
                        <p class="">
                            {{ Lang::get('terms.terms_t_2') }}
                        </p>
                        <br>
                        <h3  class="title-negative-margin ">{{ Lang::get('terms.terms_h_3') }}<span class="special-color">.</span></h3>
                        <br>
                        <p class="">
                            {{ Lang::get('terms.terms_t_3') }}
                        </p>
                        <br>
                        <h3  class="title-negative-margin ">{{ Lang::get('terms.terms_h_4') }}<span class="special-color">.</span></h3>
                        <br>
                        <p class="">
                            {{ Lang::get('terms.terms_t_4') }}
                        </p>
                    </article>
                </div>
            </div>
        </div>
    </section>
@endsection