@extends('backend.layouts.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Position</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6" style="text-align:right;">

                        <form action="{{ url('admin/payroll_export') }}

                        " method="get">
                            <input type="hidden" name="start_date" value="{{ Request()->start_date }}">
                            <input type="hidden" name="end_date" value="{{ Request()->end_date }}">

                            <a href="{{ url('admin/payroll_export?start_date=' . Request::get('start_date') . '&end_date=' . Request::get('end_date')) }}"
                                class="btn btn-success">Excel Export</a>
                        </form>
                        {{-- <br> --}}
                        <a href="{{ url('admin/position/add') }}" class="btn btn-primary" style="margin-top: 5px;">
                            Add Position
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
                                <h3 class="card-title">Search Position</h3>
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
                                            <label for="">Position Name</label>
                                            <input type="text" class="form-control" name="position_name"
                                                placeholder="John" value="{{ Request()->position_name }}">
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label for="">Daily Rate</label>
                                            <input type="text" class="form-control" name="daily_rate" placeholder="30"
                                                value="{{ Request()->daily_rate }}">
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label for="">Monthly Rate</label>
                                            <input type="text" class="form-control" name="monthly_rate" placeholder="30"
                                                value="{{ Request()->monthly_rate }}">
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label for="">Working Days Per Month</label>
                                            <input type="text" class="form-control" name="working_days_per_month"
                                                placeholder="30" value="{{ Request()->working_days_per_month }}">
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label for="">Start Date</label>
                                            <input type="date" class="form-control" name="start_date"
                                                value="{{ Request()->start_date }}">
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label for="">End Date</label>
                                            <input type="date" class="form-control" name="end_date"
                                                value="{{ Request()->end_date }}">
                                        </div>

                                        <div class="form-group col-md-2">
                                            <button class="btn btn-primary" type="submit"
                                                style="margin-top: 30px;">Search</button>
                                            <a href="{{ url('admin/position') }}" class="btn btn-success"
                                                style="margin-top: 30px;">Reset</a>

                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                        @include('_message')

                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Position List</h3>
                            </div>
                            <div class="card-body p-0">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Position Name</th>
                                            <th>Daily Rate</th>
                                            <th>Monthly Rate</th>
                                            <th>Working Days Per Month</th>
                                            <th>Created At</th>
                                            <th>Updated At</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @forelse ($getRecord as $value)
                                            <tr>
                                                <td>{{ $value->id }}</td>
                                                <td>{{ $value->position_name }}</td>
                                                <td>{{ $value->daily_rate }}</td>
                                                <td>{{ $value->monthly_rate }}</td>
                                                <td>{{ $value->working_days_per_month }}</td>
                                                <td>{{ date('d-m-Y H:i A', strtotime($value->created_at)) }}</td>
                                                <td>{{ date('d-m-Y H:i A', strtotime($value->updated_at)) }}</td>
                                                <td>
                                                    {{-- <a href="{{ url('admin/payroll/view/' . $value->id) }}"
                                                        class="btn btn-info">View
                                                    </a> --}}

                                                    <a href="{{ url('admin/position/edit/' . $value->id) }}"
                                                        class="btn btn-primary">Edit
                                                    </a>

                                                    <a href="{{ url('admin/position/delete/' . $value->id) }}"
                                                        class="btn btn-danger"
                                                        onclick="return confirm('Are you sure you want to delete?')">Delete
                                                    </a>
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
