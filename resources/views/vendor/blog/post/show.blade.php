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
    <section class="section-light section-top-shadow">.
        <div class="container">
            <div class="row">
                <div class="row margin-bottom-40">
        <div class="col-xs-12 col-md-9">
            <article class="archive-item zoom-cont2">
                <h1>{{ $post->title }}</h1>
                <a href="#" class="title-link"><div class="blog-top-icon pull-left"><i class="fa fa-calendar-o"></i>28/09/15</div></a>
                <a href="#" class="title-link"><div class="blog-top-icon pull-left"><i class="fa fa-comment-o"></i>2</div></a>
                <div class="clearfix"></div>
                <div class="title-separator-primary"></div>
                <figure>
                    <a href="{{$post->url}}">
                        @if ($post->image != '')
                            <img src="{{ $post->image }}" alt="" class="zoom">
                        @endif
                    </a>

                </figure>
                <div class="post_header">
                    {!! $post->chapo !!}
                </div>

                <div class="post_content">
                    {!! $post->content !!}
                </div>
            </article>
        </div>
        @include('blog::sidebar')
    </div>
            </div>
        </div>
    </section>

@endsection