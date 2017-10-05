@extends(config('blog.layout_path'))


@section('content')

    <div class="main">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="/">Home</a></li>
                <li><a href="{{ config('blog.base_path') }}">{{ config('blog.base_name') }}</a></li>
                <li><a href="{{ $post->Category->url }}">{{ $post->Category->name }}</a></li>
                <li class="active">{{ $post->title }}</li>

            </ul>
            <div class="row margin-bottom-40">

                <div class="col-md-9 col-sm-9">
                    <div class="content-page">
                        <h1>{{ $post->title }}</h1>

                        @if ($post->image != '')
                        <p><img style="width:100%" src="{{ $post->image }}" alt="" class="img-responsive"></p>
                        @endif

                        <div class="post_header">
                            {!! $post->chapo !!}
                        </div>

                        <div class="post_content">
                            {!! $post->content !!}
                        </div>
                    </div>
                </div>

                @include('blog::sidebar')

            </div>

        </div>
    </div>

@endsection