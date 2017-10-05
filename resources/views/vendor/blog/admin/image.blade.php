@extends('admin.layout.app')

@section('content')
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-12">
                <div class="box">
                    <div class="box-body">
                        <h1 class="col-md-offset-2">Add an Image to a Post</h1>

                        {!! Form::open(['files' => true] ) !!}

                        <input type="hidden" id="post_id" value="{{ $post->id }}"/>
                        <input type="hidden" id="_token" value="{!! csrf_token() !!}"/>

                        {!! Form::file('image') !!}

                        {!! Form::submit() !!}

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@section('footer-scripts')

@endsection
