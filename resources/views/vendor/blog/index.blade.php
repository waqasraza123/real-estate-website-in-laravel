@extends('layouts.app')

@section('content')

    <section class="short-image no-padding blog-short-title">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-lg-12 short-image-title">
                    <h5 class="subtitle-margin second-color">from</h5>
                    <h1 class="second-color">our blog</h1>
                    <div class="short-title-separator"></div>
                </div>
            </div>
        </div>
    </section>
    <section class="section-light section-top-shadow">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-md-9">
                    @foreach($posts as $post)
                        <article class="archive-item zoom-cont2">
                            <h2 class="title-negative-margin">{{ $post->title }}<span
                                        class="special-color">.</span></h2>
                            <a href="#" class="title-link"><div class="blog-top-icon pull-left"><i class="fa fa-calendar-o"></i>28/09/15</div></a>
                            <a href="#" class="title-link"><div class="blog-top-icon pull-left"><i class="fa fa-comment-o"></i>2</div></a>
                            <div class="clearfix"></div>
                            <div class="title-separator-primary"></div>
                            <figure><a href="{{$post->url}}"><img src="{{ $post->image }}" alt="" class="zoom"></a></figure>
                            <div class="blog-text">{!! $post->chapo !!}</div>
                        </article>
                    @endforeach
                </div>
                <div class="col-md-3 col-xs-12">
                    @include('blog::sidebar')
                </div>
            </div>
        </div>
    </section>
@endsection