@extends('admin.layout.app')

@section('content')
    <section class="content-header">
        <h1>
            Dashboard
            <small>Logo </small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Logo</a></li>
            <li class="active">Logo </li>
        </ol>
    </section>

    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Logo</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        @if(Session::has('success'))
                            <div class="callout callout-success">
                                <p>{{ Session::get('success') }}</p>
                            </div>
                        @endif
                        @if($errors->all())
                            <div class="callout callout-danger">
                                @foreach($errors->all() as $error)
                                    <p>{{ $error }}</p>
                                @endforeach
                            </div>
                        @endif
                        <div class="">
                            <p>
                                Current Logo
                            </p>
                            @if($logo)
                                <img src="" alt="">
                            @endif
                        </div>
                        <form action="{{ route('admPostLogo') }}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="exampleInputFile">Logo</label>
                                <p>The image must have max width 452px and max height 80px</p>
                                <input type="file" name="image" id="exampleInputFile">
                            </div>
                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-primary">Change</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection


