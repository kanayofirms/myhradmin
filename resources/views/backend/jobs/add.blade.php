@extends('backend.layouts.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Jobs</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Add</a></li>
                            <li class="breadcrumb-item active">Jobs</li>
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
                                <h3 class="card-title">Add Jobs</h3>
                            </div>

                            <form action="{{ url('admin/jobs/add') }}" class="form-horizontal" method="post"
                                enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="card card-body">
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Job Title
                                            <span style="color: red;">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" value="{{ old('job_title') }}" name="job_title"
                                                class="form-control" required placeholder="Developer Operation">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Min Salary
                                            <span style="color: red;">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="number" value="{{ old('min_salary') }}" name="min_salary"
                                                class="form-control" required placeholder="100000">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Max Salary
                                            <span style="color: red;">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" value="{{ old('max_salary') }}" name="max_salary"
                                                class="form-control" required placeholder="1000000">
                                        </div>
                                    </div>

                                </div>

                                <div class="card-footer">
                                    <a href="{{ url('admin/jobs') }}" class="btn btn-default">Back</a>
                                    <button type="submit" class="btn btn-primary float-right">Submit</button>
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

