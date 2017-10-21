@extends('admin.layout.app')


@section('content')

    <section class="content-header">
        <h1>
            Listings
            <small>List  of listings</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Listings</li>
        </ol>
    </section>

    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title pull-left">Listings  Table</h3>

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
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>Listing</th>
                                <th>Status</th>
                                <th>Approved</th>
                                <th>Featured</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($listings->first())
                                @foreach($listings as $listing)
                                    <tr>
                                        <td>{{ $listing->address }}</td>
                                        <td>{{ $listing->listing_status	}}</td>
                                        <td>
                                            <form action="{{ route('admPostEditListing') }}" method="post" enctype="multipart/form-data">
                                                {{ csrf_field() }}
                                                <input type="hidden" name="id" value="{{ $listing->id }}">
                                                <div class="form-group">
                                                    <input type="radio" value="" name="approved" @if($listing->approved == null) checked @endif onchange="this.form.submit()"> No
                                                    <input type="radio" value="1" name="approved" @if($listing->approved != null) checked @endif onchange="this.form.submit()"> Yes
                                                </div>
                                            </form>
                                        </td>
                                        <td>
                                            <form action="{{ route('admPostEditListing') }}" method="post" enctype="multipart/form-data">
                                                {{ csrf_field() }}
                                                <input type="hidden" name="id" value="{{ $listing->id }}">
                                                <div class="form-group">
                                                    <input type="radio" value="" name="featured" @if($listing->featured == null) checked @endif onchange="this.form.submit()"> No
                                                    <input type="radio" value="1" name="featured" @if($listing->featured != null) checked @endif onchange="this.form.submit()"> Yes
                                                </div>
                                            </form>
                                        </td>
                                        <td><a href="{{ route('admEditListing' , ['id' => $listing->id ]) }}" class="btn btn-warning"><i class="fa fa-pencil"></i></a></td>
                                        <td><a href="{{ route('admDeleteListing' , ['id' => $listing->id]) }}" class="btn btn-danger"><i class="fa fa-trash"></i></a></td>
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Listing</th>
                                <th>Status</th>
                                <th>Approved</th>
                                <th>Featured</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                            </tfoot>
                        </table>
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