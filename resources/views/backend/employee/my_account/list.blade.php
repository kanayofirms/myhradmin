@extends('backend.layouts.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">My Account</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Setting</a></li>
                            <li class="breadcrumb-item active">My Account</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">

                        @include('_message')

                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title">My Account</h3>
                            </div>

                            <form action="{{ url('employee/my_account/update') }}" class="form-horizontal" method="post"
                                enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="card card-body">
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Manager Name
                                            <span style="color: red;">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" value="{{ $getRecord->name }}" name="name"
                                                class="form-control" required placeholder="John Doe">
                                            <span style="color:red;">{{ $errors->first('name') }}</span>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Email
                                            <span style="color: red;">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="email" value="{{ $getRecord->email }}" name="email"
                                                class="form-control" required placeholder="managerceo@mailnator.com">
                                            <span style="color:red;">{{ $errors->first('email') }}</span>

                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Profile Image
                                            <span style="color: red;"></span></label>
                                        <div class="col-sm-10">
                                            <input type="file" name="profile_image" class="form-control">
                                            @if (!empty($getRecord->profile_image))
                                                @if (file_exists('upload/' . $getRecord->profile_image))
                                                    <img src="{{ url('upload/' . $getRecord->profile_image) }}"
                                                        style="height: 90px; width: 90px;">
                                                @endif
                                            @endif

                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Password
                                            <span style="color: red;">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" name="password" class="form-control"
                                                placeholder="Enter Password">
                                            (Leave Blank If You Are Not Changing The Password)
                                        </div>
                                    </div>

                                    <div class="card-footer">
                                        <a href="{{ url('employee/my_account') }}" class="btn btn-default">Back</a>
                                        <button type="submit" class="btn btn-primary float-right">Update</button>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
