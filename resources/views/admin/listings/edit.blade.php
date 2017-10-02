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
                        <form action="{{ route('admPostEditListing') }}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <input type="hidden" name="id" value="{{ $listing->id }}">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Featured</label>
                                <br>
                                <input type="radio" value="" name="featured" @if($listing->featured == null) checked @endif> Non Featured
                                <input type="radio" value="1" name="featured" @if($listing->featured != null) checked @endif> Featured
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Approval</label>
                                <br>
                                <input type="radio" value="" name="approved" @if($listing->approved == null) checked @endif> Not Approved
                                <input type="radio" value="1" name="approved" @if($listing->approved != null) checked @endif> Approved
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