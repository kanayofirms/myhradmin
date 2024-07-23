@extends('backend.layouts.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Pay Roll</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Add</a></li>
                            <li class="breadcrumb-item active">Pay Roll</li>
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
                                <h3 class="card-title">Add Pay Roll</h3>
                            </div>

                            <form action="{{ url('') }}" class="form-horizontal" method="post"
                                enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="card card-body">

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Employee Name
                                            <span style="color: red;">*</span></label>
                                        <div class="col-sm-10">
                                            <select name="employee_id" id="" class="form-control">
                                                <option value="">Select Employee Name</option>

                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Number Of Day Worked
                                            <span style="color: red;">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="number" value="{{ old('number_of_days_worked') }}"
                                                name="number_of_days_worked" class="form-control"
                                                placeholder="Enter Number Of Day Worked" required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Bonus
                                            <span style="color: red;">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="number" value="{{ old('bonus') }}" name="bonus"
                                                class="form-control" placeholder="Enter Bonus" required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Overtime
                                            <span style="color: red;">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="number" value="{{ old('overtime') }}" name="overtime"
                                                class="form-control" placeholder="Enter Overtime" required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Gross Salary
                                            <span style="color: red;">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="number" value="{{ old('gross_salary') }}" name="gross_salary"
                                                class="form-control" placeholder="Enter Gross Salary" required>
                                        </div>
                                    </div>


                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Cash Advance
                                            <span style="color: red;">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="number" value="{{ old('cash_advance') }}" name="cash_advance"
                                                class="form-control" placeholder="Enter Cash Advance" required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Late Hours
                                            <span style="color: red;">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="number" value="{{ old('late_hours') }}" name="late_hours"
                                                class="form-control" placeholder="Enter Late Hours" required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Absent Days
                                            <span style="color: red;">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="number" value="{{ old('absent_days') }}" name="absent_days"
                                                class="form-control" placeholder="Enter Absent Days" required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">SSS Contribution
                                            <span style="color: red;">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="number" value="{{ old('sss_contribution') }}"
                                                name="sss_contribution" class="form-control"
                                                placeholder="Enter SSS Contribution" required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Health Insurance
                                            <span style="color: red;">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="number" value="{{ old('insure_health') }}"
                                                name="insure_health" class="form-control"
                                                placeholder="Enter Health Insurance" required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Total Deduction
                                            <span style="color: red;">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="number" value="{{ old('total_deduction') }}"
                                                name="total_deduction" class="form-control"
                                                placeholder="Enter Total Deduction" required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Net Pay
                                            <span style="color: red;">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="number" value="{{ old('net_pay') }}" name="net_pay"
                                                class="form-control" placeholder="Enter Net Pay" required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Payroll Monthly
                                            <span style="color: red;">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="number" value="{{ old('payroll_monthly') }}"
                                                name="payroll_monthly" class="form-control"
                                                placeholder="Enter Payroll Monthly" required>
                                        </div>
                                    </div>

                                    <div class="card-footer">
                                        <a href="{{ url('admin/payroll') }}" class="btn btn-default">Back</a>
                                        <button type="submit" class="btn btn-primary float-right">Submit</button>
                                    </div>

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
