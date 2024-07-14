@extends('backend.layouts.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Departments</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6" style="text-align:right;">

                        <a href="{{ url('admin/departments/add') }}" class="btn btn-primary">
                            Add Departments
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
                        {{-- Search start --}}
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Search Departments</h3>
                            </div>

                            <form action="" method="GET">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-md-3">
                                            <label for="">ID</label>
                                            <input type="text" class="form-control" name="id" placeholder="ID"
                                                value="{{ Request()->id }}">
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label for="">Department Name</label>
                                            <input type="text" class="form-control" name="department_name"
                                                placeholder="Enter Department Name"
                                                value="{{ Request()->department_name }}">
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label for="">Locations Name</label>
                                            <input type="text" class="form-control" name="street_address"
                                                placeholder="Enter Locations Name" value="{{ Request()->street_address }}">
                                        </div>

                                        <div class="form-group col-md-2">
                                            <button class="btn btn-primary" type="submit"
                                                style="margin-top: 30px;">Search</button>
                                            <a href="{{ url('admin/departments') }}" class="btn btn-success"
                                                style="margin-top: 30px;">Reset</a>

                                        </div>

                                    </div>
                                </div>
                            </form>
                        </div>
                        {{-- Search end --}}

                        @include('_message')

                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Departments List</h3>
                            </div>

                            <div class="card-body p-0">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Department Name</th>
                                            <th>Manager Name</th>
                                            <th>Locations Name</th>
                                            <th>Created At</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($getRecord as $value)
                                            <tr>
                                                <td>{{ $value->id }}</td>
                                                <td>{{ $value->department_name }}</td>
                                                <td>
                                                    @if ($value->manager_id == 1)
                                                        ChiChi
                                                    @else
                                                        Emeka
                                                    @endif
                                                </td>
                                                <td>{{ $value->street_address }}</td>
                                                <td>{{ date('d-m-Y H:i A', strtotime($value->created_at)) }}</td>
                                                <td>
                                                    <a href="{{ url('admin/departments/edit/' . $value->id) }}"
                                                        class="btn btn-primary">Edit</a>
                                                    <a href="{{ url('admin/departments/delete/' . $value->id) }}"
                                                        onclick="return confirm('Are you sure you want to delete?')"
                                                        class="btn btn-danger">Delete</a>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="100%">No Record Found.</td>
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
