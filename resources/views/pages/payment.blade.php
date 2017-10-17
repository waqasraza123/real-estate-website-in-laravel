@extends('layouts.app')


@section('content')
    <section class="short-image no-padding blog-short-title">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-lg-12 short-image-title">
                    <h5 class="subtitle-margin second-color">Payment</h5>
                    <h1 class="second-color"></h1>
                    <div class="short-title-separator"></div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-light  section-top-shadow">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="price-table" style="max-width:600px ">
                        <div class="price-table-header">
                            <h5 class="second-color subtitle-margin">starter</h5>
                            <h2 class="second-color">package 1<span class="third-color">.</span></h2>
                            <div class="price-table-triangle"></div>
                            <div class="price-table-icon">
                            @if($type == 'user')
                                $40
                            @elseif($type == 'agent')
                                $20
                             @endif
                            </div>
                        </div>

                        <div class="price-table-footer">
                            <div class="price-table-triangle2"></div>
                            <a href="#" class="button-primary  pull-right">
                                <span>Checkout</span>
                                <div class="button-triangle"></div>
                                <div class="button-triangle2"></div>
                                <div class="button-icon"><i class="jfont"></i></div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection