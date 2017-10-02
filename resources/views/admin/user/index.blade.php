@extends('admin.layout.app')


@section('content')

    <section class="content-header">
        <h1>
            Users
            <small>List of users</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Users</li>
        </ol>
    </section>

    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title pull-left">Users  Table</h3>
                        <a href="{{ route('admUsersCreate') }}" class="btn btn-info pull-right">Create a new User </a>
                        <div class="clearfix"></div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($users->first())
                                @foreach($users as $user)
                                    <tr>
                                        <td>{{ $user->first_name }}</td>
                                        <td>{{ $user->last_name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->phone }}</td>
                                        <td><a href="{{ route('admEditUsers' , ['id' => $user->id ]) }}" class="btn btn-warning"><i class="fa fa-pencil"></i></a></td>
                                        <td><a href="{{ route('admDeleteUsers' , ['id' => $user->id]) }}" class="btn btn-danger"><i class="fa fa-trash"></i></a></td>
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>Phone</th>
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