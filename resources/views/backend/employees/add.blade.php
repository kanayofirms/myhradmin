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

                        <form action="" class="form-horizontal" method="post" enctype="multipart/form-data">

                            <div class="card card-body">
                                <div class="form-group row">
                                    <label for="" class="col-sm-2 col-form-label">First Name 
                                        <span style="color: red;">*</span></label>
                                    <div class="col-sm-10">
                                        <input type="text" name="name" class="form-control" required
                                        placeholder="Enter First Name">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="" class="col-sm-2 col-form-label">Surname 
                                        <span style="color: red;">  </span></label>
                                    <div class="col-sm-10">
                                        <input type="text" name="last_name" class="form-control"
                                        placeholder="Enter Surname">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="" class="col-sm-2 col-form-label">Email ID 
                                        <span style="color: red;">*</span></label>
                                    <div class="col-sm-10">
                                        <input type="email" name="email" class="form-control" required
                                        placeholder="Enter Email ID">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="" class="col-sm-2 col-form-label">Phone Number 
                                        <span style="color: red;"></span></label>
                                    <div class="col-sm-10">
                                        <input type="text" name="phone_number" class="form-control" 
                                        placeholder="Enter Phone Number">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="" class="col-sm-2 col-form-label">Employment Date
                                        <span style="color: red;">*</span></label>
                                    <div class="col-sm-10">
                                        <input type="date" name="hire_date" class="form-control" required
                                        placeholder="Enter Employment Date">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="" class="col-sm-2 col-form-label">Job Title
                                        <span style="color: red;">*</span></label>
                                    <div class="col-sm-10">
                                        <select name="job_id" id="" class="form-control" required>
                                            <option value="">Select Job Title</option>
                                            <option value="">Web Developer</option>
                                            <option value="">Product Designer</option>
                                        </select>
                                    </div>
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