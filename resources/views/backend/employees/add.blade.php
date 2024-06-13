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
              <li class="breadcrumb-item"><a href="#">Add</a></li>
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
                            <h3 class="card-title">Add Employees</h3>
                        </div>

                        <form accept="{{ url('admin/employees/add') }}" class="form-horizontal" 
                        method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="card card-body">
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">First Name 
                                        <span style="color: red;">*</span></label>
                                    <div class="col-sm-10">
                                        <input type="text" value="{{ old('name') }}" name="name" class="form-control" required
                                        placeholder="Enter First Name">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Surname 
                                        <span style="color: red;">  </span></label>
                                    <div class="col-sm-10">
                                        <input type="text" value="{{ old('last_name') }}" name="last_name" class="form-control"
                                        placeholder="Enter Surname">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Email ID 
                                        <span style="color: red;">*</span></label>
                                    <div class="col-sm-10">
                                        <input type="email" value="{{ old('email') }}" name="email" 
                                        class="form-control" placeholder="Enter Email ID" required>
                                        <span style="color:red;">{{ $errors->first('email') }}</span>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Phone Number 
                                        <span style="color: red;"></span></label>
                                    <div class="col-sm-10">
                                        <input type="number" value="{{ old('phone_number') }}" name="phone_number" 
                                        class="form-control" placeholder="Enter Phone Number">
                                        <span style="color:red;">{{ $errors->first('phone_number') }}</span>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Employment Date
                                        <span style="color: red;">*</span></label>
                                    <div class="col-sm-10">
                                        <input type="date" value="{{ old('hire_date') }}" name="hire_date" 
                                        class="form-control" placeholder="Enter Employment Date" required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Job Title
                                        <span style="color: red;">*</span></label>
                                    <div class="col-sm-10">
                                        <select name="job_id" class="form-control" required>
                                            <option value="">Select Job Title</option>
                                            <option value="1">Web Developer</option>
                                            <option value="2">Product Designer</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Salary 
                                        <span style="color: red;">*</span></label>
                                    <div class="col-sm-10">
                                        <input type="number" value="{{ old('salary') }}" name="salary" 
                                        class="form-control" placeholder="Enter Salary"  required>
                                        <span style="color:red;">{{ $errors->first('salary') }}</span>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Commission 
                                        <span style="color: red;">*</span></label>
                                    <div class="col-sm-10">
                                        <input type="number" value="{{ old('commission_pct') }}" name="commission_pct" 
                                        class="form-control" placeholder="Enter Commission PCT" required>
                                        <span style="color:red;">{{ $errors->first('commission_pct') }}</span>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Manager Name
                                        <span style="color: red;">*</span></label>
                                    <div class="col-sm-10">
                                        <select name="manager_id" class="form-control" required>
                                            <option value="">Select Manager Name</option>
                                            <option value="1">Emeka</option>
                                            <option value="2">Nnenna</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Department Name
                                        <span style="color: red;">*</span></label>
                                    <div class="col-sm-10">
                                        <select name="department_id" class="form-control" required>
                                            <option value="">Select Department Name</option>
                                            <option value="1">Customer Care Department</option>
                                            <option value="2">Sales Department</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="card-footer">
                                <a href="{{ url('admin/employees') }}" class="btn btn-default">Cancel</a>
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