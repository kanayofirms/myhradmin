@extends('backend.layouts.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">View Payroll</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">View</a></li>
                            <li class="breadcrumb-item active">Payroll</li>
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
                                <h3 class="card-title">View Payroll</h3>
                            </div>

                            <form class="form-horizontal" method="post" enctype="multipart/form-data">

                                <div class="card card-body">

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">ID
                                            <span style="color: red;">*</span></label>
                                        <div class="col-sm-10">
                                            {{ $getRecord->id }}
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Employee Name
                                            <span style="color: red;">*</span></label>
                                        <div class="col-sm-10">
                                            {{ $getRecord->employee_id }}

                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Worked Days
                                            <span style="color: red;">*</span></label>
                                        <div class="col-sm-10">
                                            {{ $getRecord->number_of_days_worked }}
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Bonus
                                            <span style="color: red;">*</span></label>
                                        <div class="col-sm-10">
                                            {{ $getRecord->bonus }}
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Overtime
                                            <span style="color: red;">*</span></label>
                                        <div class="col-sm-10">
                                            {{ $getRecord->overtime }}
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Gross Salary
                                            <span style="color: red;">*</span></label>
                                        <div class="col-sm-10">
                                            {{ $getRecord->gross_salary }}
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Cash Advance
                                            <span style="color: red;">*</span></label>
                                        <div class="col-sm-10">
                                            {{ $getRecord->cash_advance }}
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Late Hours
                                            <span style="color: red;">*</span></label>
                                        <div class="col-sm-10">
                                            {{ $getRecord->late_hours }}
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Absent Days
                                            <span style="color: red;">*</span></label>
                                        <div class="col-sm-10">
                                            {{ $getRecord->absent_days }}
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">SSS Contribution
                                            <span style="color: red;">*</span></label>
                                        <div class="col-sm-10">
                                            {{ $getRecord->sss_contribution }}
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Health Insurance
                                            <span style="color: red;">*</span></label>
                                        <div class="col-sm-10">
                                            {{ $getRecord->insure_health }}
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Total Deduction
                                            <span style="color: red;">*</span></label>
                                        <div class="col-sm-10">
                                            {{ $getRecord->total_deduction }}
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Net Pay
                                            <span style="color: red;">*</span></label>
                                        <div class="col-sm-10">
                                            {{ $getRecord->net_pay }}
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Payroll Monthly
                                            <span style="color: red;">*</span></label>
                                        <div class="col-sm-10">
                                            {{ $getRecord->payroll_monthly }}
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Created At
                                            <span style="color: red;">*</span></label>
                                        <div class="col-sm-10">
                                            {{ date('d-m-Y H:i A', strtotime($getRecord->created_at)) }}
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Updated At
                                            <span style="color: red;">*</span></label>
                                        <div class="col-sm-10">
                                            {{ date('d-m-Y H:i A', strtotime($getRecord->updated_at)) }}
                                        </div>
                                    </div>

                                </div>
                                <div class="card-footer">
                                    <a href="{{ url('admin/payroll') }}" class="btn btn-default">Back</a>

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
