@extends('admin.layout.app')


@section('content')

    <section class="content-header">
        <h1>
            Slider
            <small>Content</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Slider</li>
        </ol>
    </section>

    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title pull-left">Slider  Content</h3>

                        <div class="clearfix"></div>
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
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="box box-widget">
                                            <div class="box-header with-border">
                                                Image First
                                            </div>
                                            <div class="box-body">
                                                <img class="img-responsive pad" src="{{$images ?  asset('assets/images/'.$images->image_1): '' }}" alt="Photo">
                                                <hr>
                                                <form action="{{ route('admPostSliderImages') }}" method="post" enctype="multipart/form-data">
                                                    {{ csrf_field() }}
                                                    <div class="form-group">
                                                        <input type="file" name="image_1">
                                                    </div>
                                                    <div class="form-group text-center">
                                                        <button type="submit" class="btn btn-primary">Upload</button>
                                                    </div>
                                                </form>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="box box-widget">
                                            <div class="box-header with-border">
                                                Image Second
                                            </div>
                                            <div class="box-body">
                                                <img class="img-responsive pad" src="{{ $images ? asset('assets/images/'.$images->image_2) : '' }}" alt="Photo">
                                                <hr>
                                                <form action="{{ route('admPostSliderImages') }}" method="post" enctype="multipart/form-data">
                                                    {{ csrf_field() }}
                                                    <div class="form-group">
                                                        <input type="file" name="image_2">
                                                    </div>
                                                    <div class="form-group text-center">
                                                        <button type="submit" class="btn btn-primary">Upload</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="box box-widget">
                                            <div class="box-header with-border">
                                                Image Third
                                            </div>
                                            <div class="box-body">
                                                <img class="img-responsive pad" src="{{$images ?  asset('assets/images/'.$images->image_3) : '' }}" alt="Photo">
                                                <hr>
                                                <form action="{{ route('admPostSliderImages') }}" method="post" enctype="multipart/form-data">
                                                    {{ csrf_field() }}
                                                    <div class="form-group">
                                                        <input type="file" name="image_3">
                                                    </div>
                                                    <div class="form-group text-center">
                                                        <button type="submit" class="btn btn-primary">Upload</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8 col-md-offset-2">
                                <form action="{{ route('admPostFooter') }}" method="post" class="form-horizontal">

                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>
    </section>

@endsection

@section('scripts')
    <script src="{{ asset('admin_files/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin_files/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
    <!-- SlimScroll -->
    <script src="{{ asset('admin_files/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
    <!-- FastClick -->
    <script src="{{ asset('admin_files/bower_components/fastclick/lib/fastclick.js') }}"></script>
    <script>
        $(function () {
            $('#example1').DataTable()
            $('#example2').DataTable({
                'paging'      : true,
                'lengthChange': false,
                'searching'   : false,
                'ordering'    : true,
                'info'        : true,
                'autoWidth'   : false
            })
        })
    </script>
@endsection