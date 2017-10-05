@extends('admin.layout.app')


@section('content')

    <section class="content-header">
        <h1>
            Footer
            <small>Content</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Footer</li>
        </ol>
    </section>

    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title pull-left">Footer  Content</h3>

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
                            <div class="col-md-8 col-md-offset-2">
                                <form action="{{ route('admPostFooter') }}" method="post" class="form-horizontal">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <label for="" class="control-label col-md-3">Footer Text</label>
                                        <div class="col-md-9">
                                            <textarea name="text" id=""class="form-control" >{{ $footer ? $footer->text : '' }}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="control-label col-md-3">Address</label>
                                        <div class="col-md-9">
                                            <input name="address" id="" class="form-control" value="{{ $footer ? $footer->address : '' }}" >
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="control-label col-md-3">Phone</label>
                                        <div class="col-md-9">
                                            <input name="phone" id="" class="form-control" value="{{ $footer ? $footer->phone : '' }}" >
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="control-label col-md-3">Email</label>
                                        <div class="col-md-9">
                                            <input name="email" id="" class="form-control" value="{{ $footer ? $footer->email : '' }}" >
                                        </div>
                                    </div>
                                    <div class="form-group text-center">
                                        <button class="btn btn-primary" type="submit">Save</button>
                                    </div>
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