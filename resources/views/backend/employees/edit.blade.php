@extends('backend.layouts.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Employees</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Edit</a></li>
                            <li class="breadcrumb-item active">Employees</li>
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
                                <h3 class="card-title">Edit Employees</h3>
                            </div>

                            <form action="{{ url('admin/employees/edit/' . $getRecord->id) }}" class="form-horizontal"
                                method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="card card-body">
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">First Name
                                            <span style="color: red;">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" value="{{ $getRecord->name }}" name="name"
                                                class="form-control" required placeholder="Enter First Name">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Surname
                                            <span style="color: red;"> </span></label>
                                        <div class="col-sm-10">
                                            <input type="text" value="{{ $getRecord->last_name }}" name="last_name"
                                                class="form-control" placeholder="Enter Surname">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Email ID
                                            <span style="color: red;">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="email" value="{{ $getRecord->email }}" name="email"
                                                class="form-control" placeholder="Enter Email ID" required>
                                            <span style="color:red;">{{ $errors->first('email') }}</span>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Password
                                            <span style="color: red;">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="password" value="" name="password" class="form-control"
                                                placeholder="Enter Password">
                                            <span style="color:red;">{{ $errors->first('password') }}</span>
                                            (Leave Blank If You Are Not Changing The Password)
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Phone Number
                                            <span style="color: red;"></span></label>
                                        <div class="col-sm-10">
                                            <input type="number" value="{{ $getRecord->phone_number }}" name="phone_number"
                                                class="form-control" placeholder="Enter Phone Number">
                                            <span style="color:red;">{{ $errors->first('phone_number') }}</span>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Profile Image
                                            <span style="color: red;"></span></label>
                                        <div class="col-sm-10">
                                            <input type="file" name="profile_image" class="form-control">
                                            @if (!@empty($getRecord->profile_image))
                                                @if (file_exists('upload/' . $getRecord->profile_image))
                                                    <img src="{{ url('upload/' . $getRecord->profile_image) }}"
                                                        style="height: 70px; width: 70px;">
                                                @endif
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Employment Date
                                            <span style="color: red;">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="date" value="{{ $getRecord->hire_date }}" name="hire_date"
                                                class="form-control" placeholder="Enter Employment Date" required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Job Title
                                            <span style="color: red;">*</span></label>
                                        <div class="col-sm-10">
                                            <select name="job_id" class="form-control" required>

                                                @foreach ($getJobs as $value_job)
                                                    <option {{ $value_job->id == $getRecord->job_id ? 'selected' : '' }}
                                                        value="{{ $value_job->id }}">{{ $value_job->job_title }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Salary
                                            <span style="color: red;">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="number" value="{{ $getRecord->salary }}" name="salary"
                                                class="form-control" placeholder="Enter Salary" required>
                                            <span style="color:red;">{{ $errors->first('salary') }}</span>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Commission
                                            <span style="color: red;">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="number" value="{{ $getRecord->commission_pct }}"
                                                name="commission_pct" class="form-control"
                                                placeholder="Enter Commission PCT" required>
                                            <span style="color:red;">{{ $errors->first('commission_pct') }}</span>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Manager Name
                                            <span style="color: red;">*</span></label>
                                        <div class="col-sm-10">
                                            <select name="manager_id" class="form-control" required>
                                                <option value="">Select Manager Name</option>
                                                @foreach ($getManagers as $valueM)
                                                    <option {{ $valueM->id == $getRecord->manager_id ? 'selected' : '' }}
                                                        value="{{ $valueM->id }}">
                                                        {{ $valueM->manager_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Department Name
                                            <span style="color: red;">*</span></label>
                                        <div class="col-sm-10">
                                            <select name="department_id" class="form-control" required>
                                                <option value="">Select Department Name</option>
                                                @foreach ($getDepartments as $valueD)
                                                    <option
                                                        {{ $valueD->id == $getRecord->department_id ? 'selected' : '' }}
                                                        value="{{ $valueD->id }}">{{ $valueD->department_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Position Name
                                            <span style="color: red;">*</span></label>
                                        <div class="col-sm-10">
                                            <select name="position_id" class="form-control" required>
                                                <option value="">Select Position Name</option>
                                                @foreach ($getPosition as $valueP)
                                                    <option {{ $valueP->id == $getRecord->position_id ? 'selected' : '' }}
                                                        value="{{ $valueP->id }}">
                                                        {{ $valueP->position_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Interview
                                            <span style="color: red;">*</span></label>
                                        <div class="col-sm-10">
                                            <select name="interview" class="form-control" required>
                                                <option value="">Select Interview</option>

                                                <option {{ $getRecord->interview == '0' ? 'selected' : '' }}
                                                    value="0">
                                                    Cancel
                                                </option>
                                                <option {{ $getRecord->interview == '1' ? 'selected' : '' }}
                                                    value="1">
                                                    Pending
                                                </option>
                                                <option {{ $getRecord->interview == '2' ? 'selected' : '' }}
                                                    value="2">
                                                    Completed
                                                </option>

                                            </select>
                                        </div>
                                    </div>

                                </div>

                                <div class="card-footer">
                                    <a href="{{ url('admin/employees') }}" class="btn btn-default">Back</a>
                                    <button type="submit" class="btn btn-primary float-right">Update</button>
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
