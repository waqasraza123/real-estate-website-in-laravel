@extends('layouts.app')

@section('content')
    <section class="short-image no-padding blog-short-title">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-lg-12 short-image-title">
                    <h5 class="subtitle-margin second-color">add listing</h5>
                    <h1 class="second-color">Agents</h1>
                    <div class="short-title-separator"></div>
                </div>
            </div>
        </div>
    </section>
    <section class="section-light ">
        <div class="container">
            <div class="row">
                <div class="col-xs-8 col-xs-offset-2">
                    @if($errors->all())
                        <div class="alert alert-danger fade in" style="margin: 0px auto;">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            @foreach($errors->all() as $error)
                                <br>{{$error}}
                            @endforeach
                        </div>
                        <br>
                    @endif
                    @if(Session::has('sucess'))
                        <div class="success-box margin-top-30" style="margin: 0px auto;">
                            {{ Session::get('sucess') }}
                        </div>
                        <br>
                    @endif
                    {{ Form::open(['url' => route('PostagentForm') , 'method' => 'post' , 'class' => 'form-horizontal']) }}
                        <div class="form-group">
                            <label for="" class="control-label col-lg-3">Name *</label>
                            <div class="col-lg-9">
                                {{ Form::text('name' , old('name')  , ['class' => 'input-full main-input']) }}
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="control-label col-lg-3">Email *</label>
                            <div class="col-lg-9">
                                {{ Form::email('email' , old('email')  , ['class' => 'input-full main-input']) }}
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="control-label col-lg-3">Phone *</label>
                            <div class="col-lg-9">
                                {{ Form::text('phone' , old('phone')  , ['class' => 'input-full main-input']) }}
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="control-label col-lg-3">License Number *</label>
                            <div class="col-lg-9">
                                {{ Form::text('license_number' , old('license_number')  , ['class' => 'input-full main-input']) }}
                            </div>
                        </div>
                        <div class="form-group text-right">
                            <div class="col-xs-12">
                                <button type="submit" class="button-primary ">
                                    <span>send</span>
                                    <div class="button-triangle"></div>
                                    <div class="button-triangle2"></div>
                                    <div class="button-icon"><i class="fa fa-pencil"></i></div>
                                </button>
                            </div>

                        </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </section>
@endsection

