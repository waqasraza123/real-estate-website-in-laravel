@extends('layouts.app')

@section('content')

    <section class="short-image no-padding blog-short-title">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-lg-12 short-image-title">
                    <h5 class="subtitle-margin second-color">{{ Lang::get('profile.dashboard_profile') }}</h5>
                    <h1 class="second-color">My Reviews</h1>
                    <div class="short-title-separator"></div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-light section-top-shadow">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-md-9 col-md-push-3">
                    <div class="row">
                        {{--Notify massages--}}

                        @if(Session::has('success'))
                            <div class="success-box margin-top-30">
                                <p>{{ Session::get('success') }}</p>
                                <div class="small-triangle"></div>
                                <div class="small-icon"><i class="jfont"></i></div>
                            </div>
                        @endif

                        @if(Session::has('error'))
                            <div class="error-box margin-top-30">
                                <p>{{ Session::get('error') }}</p>
                                <div class="small-triangle"></div>
                                <div class="small-icon"><i class="jfont"></i></div>
                            </div>
                        @endif

                        {{-- end notify Massage--}}
                        <div class="col-xs-12">
                            <h5 class="subtitle-margin">My</h5>
                            <h1>Reviews<span class="special-color">.</span></h1>
                            <div class="title-separator-primary"></div>
                        </div>
                    </div>
                    @if(!$reviews->first())
                        <div class="row">
                            <div class="col-lg-12">
                                <h5 class="labeles">
                                    0 Review
                                </h5>
                            </div>
                        </div>
                    @else
                        <table class="table table-bordered margin-top-60">
                            <tr>
                                <th>
                                    Listing
                                </th>
                                <th>
                                    Title
                                </th>
                                <th>
                                    View
                                </th>
                                <th>
                                    Edit
                                </th>
                                <th>
                                    Delete
                                </th>
                            </tr>
                            <div style="display: none"> {{ $count = 0 }}</div>
                            @foreach($reviews as $review)
                                <div style="display: none"> {{ $count ++ }}</div>
                                <tr>
                                    <td>
                                        {{ $review->Listing()->first()->address }}
                                    </td>
                                    <td>
                                        {{ $review->title }}
                                    </td>
                                    <td>
                                        <a href="{{ route('singleListing' , ['id' => $review->Listing()->first()->id  , 'title' => $review->Listing()->first()->title]) }}" class="btn btn-info">
                                            <i class="fa fa-info"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="#review-modal{{ $count }}" data-toggle="modal" class="btn btn-warning">
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                        <div class="modal fade apartment-modal" id="review-modal{{ $count }}">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-body">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                        <form name="contact-from" action="{{ route('writeReviews') }}" method="post">
                                                            {{ csrf_field() }}
                                                            <input type="hidden" value="{{ $review->id }}" name="id">
                                                            <input name="title" value="{{ $review->title }}" type="text" class="input-full main-input" placeholder="Title">
                                                            <textarea name="description" class="input-full agent-textarea main-input" placeholder="Review">{{ $review->description }}</textarea>
                                                            <div class="form-submit-cont">
                                                                <button type="submit" href="#" class="button-primary pull-right">
                                                                    <span>Save</span>
                                                                    <div class="button-triangle"></div>
                                                                    <div class="button-triangle2"></div>
                                                                    <div class="button-icon"><i class="fa fa-paper-plane"></i></div>
                                                                </button>
                                                                <div class="clearfix"></div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div><!-- /.modal-content -->
                                            </div><!-- /.modal-dialog -->
                                        </div><!-- /.modal -->
                                    </td>
                                    <td>
                                        <a href="{{ route('deleteReviews' , ['id' => $review->id]) }}" class="btn btn-danger">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    @endif

                    <div class="row margin-top-60"></div>
                </div>
                @include('user.parts.left_side')
            </div>
        </div>
    </section>

@endsection

@section('scripts')

@endsection

