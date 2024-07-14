@extends('backend.layouts.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Departments</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Edit</a></li>
                            <li class="breadcrumb-item active">Departments</li>
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
                                <h3 class="card-title">Edit Departments</h3>
                            </div>

                            <form action="{{ url('admin/departments/edit/' . $getRecord->id) }}" class="form-horizontal"
                                method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="card card-body">

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Department Name
                                            <span style="color: red;">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" value="{{ $getRecord->department_name }}"
                                                name="department_name" class="form-control"
                                                placeholder="Enter Department Name" required>
                                        </div>
                                    </div>


                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Manager Name (Manager ID)
                                            <span style="color: red;">*</span></label>
                                        <div class="col-sm-10">
                                            <select name="manager_id" class="form-control" required>
                                                <option value="">Select Manager</option>
                                                <option {{ $getRecord->manager_id == 1 ? 'selected' : '' }} value="1">
                                                    ChiChi</option>
                                                <option {{ $getRecord->manager_id == 2 ? 'selected' : '' }}
                                                    value="2">Emeka</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Location (Locations ID)
                                            <span style="color: red;">*</span></label>
                                        <div class="col-sm-10">
                                            <select name="locations_id" class="form-control" required>
                                                <option value="">Select Location</option>

                                            </select>
                                        </div>
                                    </div>

                                </div>

                                <div class="card-footer">
                                    <a href="{{ url('admin/departments') }}" class="btn btn-default">Back</a>
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
