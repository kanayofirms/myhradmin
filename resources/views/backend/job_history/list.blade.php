@extends('backend.layouts.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Job History</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6" style="text-align:right;">

                        <a href="{{ url('admin/job_history/add') }}" class="btn btn-primary">
                            Add Job History
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

                        @include('_message')

                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Job History List</h3>
                            </div>
                            <div class="card-body p-0">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Employee Name (Employee ID)</th>
                                            <th>Start Date</th>
                                            <th>End Date</th>
                                            <th>Job Name (Job ID)</th>
                                            <th>Department Name (Department ID)</th>
                                            <th>Created At</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($getRecord as $value)
                                        <tr>
                                            <td>{{ $value->id }}</td>
                                            <td>{{ !empty($value->get_user_name_single->name) ? $value->get_user_name_single->name : '' }} {{ !empty($value->get_user_name_single->last_name) ? $value->get_user_name_single->last_name : '' }}</td>
                                            <td>{{ date('d-m-Y', strtotime($value->start_date)) }}</td>
                                            <td>{{ date('d-m-Y', strtotime($value->end_date)) }}</td>
                                            <td>{{ !empty($value->get_job_single->job_title) ? $value->get_job_single->job_title : '' }}</td>
                                            <td>
                                                @if(!@empty($value->department_id == 1))
                                                Customer Care Department
                                                @else
                                                Sales Department
                                                @endif
                                            </td>
                                            <td>{{ date('d-m-Y H:i A', strtotime($value->created_at)) }}</td>
                                        </tr>
                                        @empty
                                        <tr colspan="100%">
                                            No Record Found.
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
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

