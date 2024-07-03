@extends('backend.layouts.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Job Grades</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6" style="text-align:right;">

                        <a href="{{ url('admin/job_grades/add') }}" class="btn btn-primary">
                            Add Job Grades
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
                                <h3 class="card-title">
                                    Search Job Grades
                                </h3>
                            </div>

                            <form action="" method="get">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-md-1">
                                            <label for="">ID</label>
                                            <input type="text" name="id" class="form-control" value=""
                                                placeholder="ID">
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label for="">Grade Level</label>
                                            <input type="text" name="grade_level" class="form-control" value=""
                                                placeholder="A">
                                        </div>

                                        <div class="form-group col-md-2">
                                            <label for="">Lowest Salary</label>
                                            <input type="number" name="lowest_sal" class="form-control" value=""
                                                placeholder="1000">
                                        </div>

                                        <div class="form-group col-md-2">
                                            <label for="">Highest Salary</label>
                                            <input type="number" name="highest_sal" class="form-control" value=""
                                                placeholder="5000">
                                        </div>

                                        <div class="form-group col-md-2">
                                            <label for="">Created At</label>
                                            <input type="date" name="created_at" class="form-control" value="">
                                        </div>

                                        <div class="form-group col-md-2">
                                            <label for="">Updated At</label>
                                            <input type="date" name="updated_at" class="form-control" value="">
                                        </div>

                                        <div class="form-group col-md-2">
                                            <button class="btn btn-primary" type="submit" style="margin-top: 30px;">Search
                                            </button>
                                            <a href="{{ url('admin/job_grades') }}" class="btn btn-success"
                                                style="margin-top: 30px;">Reset</a>

                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                        @include('_message')

                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Job Grades List</h3>
                            </div>
                            <div class="card-body p-0">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Grade Level</th>
                                            <th>Lowest Salary</th>
                                            <th>Highest Salary</th>
                                            <th>Created At</th>
                                            <th>Updated At</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($getRecord as $value)
                                            <tr>
                                                <td>{{ $value->id }}</td>
                                                <td>{{ $value->grade_level }}</td>
                                                <td>{{ $value->lowest_sal }}</td>
                                                <td>{{ $value->highest_sal }}</td>
                                                <td>{{ date('d-m-Y H:i A', strtotime($value->created_at)) }}</td>
                                                <td>{{ date('d-m-Y H:i A', strtotime($value->updated_at)) }}</td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="100%">No Record Found.</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                            {!! $getRecord->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}
                        </div>
                    </section>
                </div>
            </div>

        </section>


        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
