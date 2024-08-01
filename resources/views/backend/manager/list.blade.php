@extends('backend.layouts.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Manager</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6" style="text-align:right;">

                        <form action="{{ url('admin/manager_export') }}" method="get">
                            <input type="hidden" name="start_date" value="{{ Request()->start_date }}">
                            <input type="hidden" name="end_date" value="{{ Request()->end_date }}">
                            <a class="btn btn-success"
                                href="{{ url('admin/manager_export?start_date=' . Request::get('start_date') . '&end_date=' . Request::get('end_date')) }}">Excel
                                Export</a>
                        </form>

                        <a href="{{ url('admin/manager/add') }}" class="btn btn-primary" style="margin-top: 5px;">
                            Add Manager
                        </a>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <section class="content">
            <div class="container-fluid">

                <div class="row">
                    <section class="col-md-12">
                        <div class="card">
                            <div class="card-header">

                                <h3 class="card-title">Search Manager</h3>

                            </div>

                            <form action="" method="get">
                                <div class="card-body">
                                    <div class="row">

                                        <div class="form-group col-md-3">
                                            <label for="">ID</label>
                                            <input type="text" name="id" class="form-control"
                                                value="{{ Request()->id }}" placeholder="ID">
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label for="">Manager Name</label>
                                            <input type="text" value="{{ Request()->manager_name }}" name="manager_name"
                                                class="form-control" placeholder="John Doe">
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label for="">Manager Email</label>
                                            <input type="email" value="{{ Request()->manager_email }}"
                                                name="manager_email" class="form-control" placeholder="johndoe@gmail.com">
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label for="">Manager Phone</label>
                                            <input type="number" value="{{ Request()->manager_phone }}"
                                                name="manager_phone" class="form-control" placeholder="08083093091">
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label for="">From (Start Date)</label>
                                            <input type="date" value="{{ Request()->start_date }}" name="start_date"
                                                class="form-control">
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label for="">To (End Date)</label>
                                            <input type="date" value="{{ Request()->end_date }}" name="end_date"
                                                class="form-control">
                                        </div>

                                        <div class="form-group col-md-2">
                                            <button class="btn btn-primary" type="submit"
                                                style="margin-top: 30px;">Search</button>
                                            <a href="{{ url('admin/manager') }}" class="btn btn-success"
                                                style="margin-top: 30px;">Reset</a>
                                        </div>

                                    </div>
                                </div>
                            </form>
                        </div>

                        @include('_message')

                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Manager List</h3>
                            </div>

                            <div class="card-body p-0">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Manager Name</th>
                                            <th>Manager email</th>
                                            <th>Manager Phone</th>
                                            <th>Created At</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($getRecord as $value)
                                            <tr>
                                                <td>{{ $value->id }}</td>
                                                <td>{{ $value->manager_name }}</td>
                                                <td>{{ $value->manager_email }}</td>
                                                <td>{{ $value->manager_phone }}</td>
                                                <td>{{ date('d-m-Y H:i A', strtotime($value->created_at)) }}</td>
                                                <td>
                                                    <a href="{{ url('admin/manager/edit/' . $value->id) }}"
                                                        class="btn btn-primary">Edit</a>
                                                    <a href="{{ url('admin/manager/delete/' . $value->id) }}"
                                                        onclick="return confirm('Are you sure you want to delete?')"
                                                        class="btn btn-danger">Delete</a>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="100%">Record Not Found.</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                                <div style="padding:10px; float:right;">
                                    {!! $getRecord->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}
                                </div>
                            </div>

                        </div>
                    </section>
                </div>
            </div>
        </section>

        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
