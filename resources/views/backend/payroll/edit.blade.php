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
                            <li class="breadcrumb-item"><a href="#">Edit</a></li>
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
                                <h3 class="card-title">Edit Pay Roll</h3>
                            </div>

                            <form action="{{ url('admin/payroll/edit/' . $getRecord->id) }}" class="form-horizontal"
                                method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="card card-body">

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Employee Name
                                            <span style="color: red;">*</span></label>
                                        <div class="col-sm-10">
                                            <select name="employee_id" id="" class="form-control">
                                                <option value="">Select Employee Name</option>
                                                @foreach ($getEmployee as $valueE)
                                                    <option {{ $valueE->id == $getRecord->employee_id ? 'selected' : '' }}
                                                        value="{{ $valueE->id }}">
                                                        {{ $valueE->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Worked Days
                                            <span style="color: red;">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="number" value="{{ $getRecord->number_of_days_worked }}"
                                                name="number_of_days_worked" class="form-control"
                                                placeholder="Enter Number Of Day Worked" required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Bonus
                                            <span style="color: red;">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="number" value="{{ $getRecord->bonus }}" name="bonus"
                                                class="form-control" placeholder="Enter Bonus" required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Overtime
                                            <span style="color: red;">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="number" value="{{ $getRecord->overtime }}" name="overtime"
                                                class="form-control" placeholder="Enter Overtime" required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Gross Salary
                                            <span style="color: red;">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="number" value="{{ $getRecord->gross_salary }}" name="gross_salary"
                                                class="form-control" placeholder="Enter Gross Salary" required>
                                        </div>
                                    </div>


                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Cash Advance
                                            <span style="color: red;">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="number" value="{{ $getRecord->cash_advance }}" name="cash_advance"
                                                class="form-control" placeholder="Enter Cash Advance" required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Late Hours
                                            <span style="color: red;">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="number" value="{{ $getRecord->late_hours }}" name="late_hours"
                                                class="form-control" placeholder="Enter Late Hours" required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Absent Days
                                            <span style="color: red;">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="number" value="{{ $getRecord->absent_days }}" name="absent_days"
                                                class="form-control" placeholder="Enter Absent Days" required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">SSS Contribution
                                            <span style="color: red;">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" value="{{ $getRecord->sss_contribution }}"
                                                name="sss_contribution" class="form-control"
                                                placeholder="Enter SSS Contribution" required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Health Insurance
                                            <span style="color: red;">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" value="{{ $getRecord->insure_health }}"
                                                name="insure_health" class="form-control"
                                                placeholder="Enter Health Insurance" required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Total Deduction
                                            <span style="color: red;">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" value="{{ $getRecord->total_deduction }}"
                                                name="total_deduction" class="form-control"
                                                placeholder="Enter Total Deduction" required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Net Pay
                                            <span style="color: red;">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="number" value="{{ $getRecord->net_pay }}" name="net_pay"
                                                class="form-control" placeholder="Enter Net Pay" required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Payroll Monthly
                                            <span style="color: red;">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="number" value="{{ $getRecord->payroll_monthly }}"
                                                name="payroll_monthly" class="form-control"
                                                placeholder="Enter Payroll Monthly" required>
                                        </div>
                                    </div>

                                    <div class="card-footer">
                                        <a href="{{ url('admin/payroll') }}" class="btn btn-default">Back</a>
                                        <button type="submit" class="btn btn-primary float-right">Update</button>
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
