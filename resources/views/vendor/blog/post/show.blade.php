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
                    <article class="archive-item zoom-cont2">
                        <h2 class="title-negative-margin">{{ $post->title }}<span class="special-color">.</span></h2>
                        <a href="#" class="title-link"><div class="blog-top-icon pull-left"><i class="fa fa-calendar-o"></i>{{ \Carbon\Carbon::parse($post->created_at)->format('d/m/y') }}</div></a>
                        <a href="#" class="title-link"><div class="blog-top-icon pull-left"><i class="fa fa-comment-o"></i>{{ count($comments) }}</div></a>
                        <div class="clearfix"></div>
                        <div class="title-separator-primary"></div>
                        <figure>
                            <a href="{{$post->url}}">
                                @if ($post->image != '')
                                    <img src="{{ $post->image }}" alt="" class="zoom">
                                @endif
                            </a>
                        </figure>
                        <div class="blog-text">
                                {!! $post->chapo !!}
                            <br><br>
                                {!! $post->content !!}
                        </div>
                        <div class="agent-social-bar margin-top-30">
                            <div class="pull-left icon-margin blog-big-icon">
                                <i class="fa fa-tag fa-2x"></i>
                            </div>
                            @if($tags->first())
                                @foreach($tags as $tag)
                                    <a class="pull-left tag-div" href="#">
                                        <span>{{ $tag->name }}</span>
                                        <div class="button-triangle2"></div>
                                    </a>
                                @endforeach
                            @endif
                            <div class="clearfix"></div>
                        </div>
                    </article>
                    <!-- Comment Area -->
                    <div class="margin-top-90"></div>
                    <h4 class="title-negative-margin">{{ count($comments) }} comments<span class="special-color">.</span></h4>
                    <div class="title-separator-primary"></div>
                    @if($comments->first())
                        @foreach($comments as $comment)
                            <div class="post-comment margin-top-45">
                                <div class="comment-left">
                                    <img src="@if($comment->user) @if($comment->User->avatar) {{ asset('assets\images').'/'.$comment->User->avatar }}  @else {{ asset('images\agent3.jpg') }}@endif @else {{ asset('images\agent3.jpg') }} @endif" alt="">
                                </div>
                                <div class="comment-right">
                                    <div class="comment-author">
                                        @if($comment->user)
                                            {{ $comment->User->first_name }}
                                        @else
                                            Guest
                                        @endif
                                    </div>
                                    <div class="comment-date">{{ \Carbon\Carbon::parse($comment->created_at)->format('d/m/y') }}</div>
                                    <div class="comment-text">{{ $comment->text }}</div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        @endforeach
                    @endif
                    <!-- End Comment Area -->


                    <!-- Start Comment Form -->
                    <div class="comment-form-cont">
                        <h4 class="title-negative-margin">leave a reply<span class="special-color">.</span></h4>
                        @if(Auth::user())
                            <p>Logged in as <a href="{{ route('account' , ['id' => Auth::user()->id]) }}">{{ Auth::user()->first_name }}</a>.</p>
                        @endif
                        @if($errors->all())
                            <div class="alert alert-danger fade in" style="margin: 0px auto;">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                @foreach($errors->all() as $error)
                                    <br>{{$error}}
                                @endforeach
                            </div>
                            <br>
                        @endif
                        @if(Session::has('success'))
                            <div class="success-box margin-top-30" style="margin: 0px auto;">
                                {{ Session::get('success') }}
                            </div>
                            <br>
                        @endif
                        <form name="comment-from" action="{{ route('addBlogComments') }}" method="post">
                            {{ csrf_field() }}
                            @if(Auth::user())
                                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                            @endif
                            <input type="hidden" name="post_id" value="{{ $post->id }}">
                            <textarea name="text" class="input-full agent-textarea main-input" placeholder="Reply"></textarea>
                            <div class="form-submit-cont">
                                <button type="submit" class="button-primary pull-right">
                                    <span>send</span>
                                    <div class="button-triangle"></div>
                                    <div class="button-triangle2"></div>
                                    <div class="button-icon"><i class="fa fa-pencil"></i></div>
                                </button>
                                <div class="clearfix"></div>
                            </div>
                        </form>
                    </div>

                    <!-- End Comment Form -->
                </div>
                <div class="col-xs-12 col-md-3">
                    @include('blog::sidebar')
                </div>
            </div>
        </div>
    </section>

@endsection