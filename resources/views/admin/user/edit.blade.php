@extends('admin.layout.app')

@section('content')
    <section class="content-header">
        <h1>
            Users
            <small>Edit User</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Users</a></li>
            <li class="active">Edit User</li>
        </ol>
    </section>

    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Edit  User</h3>
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
                        <form action="{{ route('postEditUser') }}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <input type="hidden" name="id" value="{{ $user->id }}">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="email" name="email"  value="{{ $user->email}}" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">First Name</label>
                                <input type="text" name="first_name" value="{{ $user->first_name }}" class="form-control" id="exampleInputEmail1" placeholder="Enter First Name">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Last Name</label>
                                <input type="text" name="last_name" value="{{ $user->last_name }}" class="form-control" id="exampleInputEmail1" placeholder="Enter Last Name">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Phone</label>
                                <input type="text" name="phone" value="{{ $user->phone}}" class="form-control" id="exampleInputEmail1" placeholder="Enter Phone">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Password</label>
                                <input type="password" name="password" class="form-control" id="exampleInputEmail1" placeholder="Enter Password">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Confirm Password</label>
                                <input type="password" name="password_confirmation" class="form-control" id="exampleInputEmail1" placeholder="Confirm Passsword">
                            </div>
                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-primary">Edit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection