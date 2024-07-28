@extends('backend.layouts.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Position</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Edit</a></li>
                            <li class="breadcrumb-item active">Position</li>
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
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title">Edit Position</h3>
                            </div>

                            <form action="{{ url('admin/position/edit/' . $getRecord->id) }}" class="form-horizontal"
                                method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="card card-body">
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Position Name
                                            <span style="color: red;">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" value="{{ $getRecord->position_name }}"
                                                name="position_name" class="form-control" required
                                                placeholder="Enter Position Name">
                                            <span style="color:red;">{{ $errors->first('position_name') }}</span>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Daily Rate
                                            <span style="color: red;">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="number" value="{{ $getRecord->daily_rate }}" name="daily_rate"
                                                class="form-control" required placeholder="Enter Daily Rate">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Monthly Rate
                                            <span style="color: red;">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="number" value="{{ $getRecord->monthly_rate }}" name="monthly_rate"
                                                class="form-control" required placeholder="Enter Monthly Rate">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Working Days Per Month
                                            <span style="color: red;">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="number" value="{{ $getRecord->working_days_per_month }}"
                                                name="working_days_per_month" class="form-control" required
                                                placeholder="Enter Working Days Per Month">
                                        </div>
                                    </div>

                                    <div class="card-footer">
                                        <a href="{{ url('admin/position') }}" class="btn btn-default">Back</a>
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
