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
                <ul class="breadcrumb">
                    <li><a href="/">Home</a></li>
                    <li class="active">{{ $category->name }}</li>
                </ul>
                <div class="col-xs-12 col-md-9">
                    @each('blog::post.listView', $posts, 'post')
                    {{ $posts->render() }}
                </div>
                @include('blog::sidebar')
            </div>
        </div>
    </section>

@endsection

