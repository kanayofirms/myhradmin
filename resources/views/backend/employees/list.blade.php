@extends('backend.layouts.app')

@section('content') 

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Employees</h1>
          </div><!-- /.col -->
          <div class="col-sm-6" style="text-align:right;">
            <a href="{{ url('admin/employees/add') }}" class="btn btn-primary">
              Add Employees
            </a>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    {{-- @include('_message') --}}

    <section class="content">
      <div class="container-fluid">
          
            <div class="row">
                <section class="col-md-12">
                  <div class="card">
                    <div class="card-header">

                      <h3 class="card-title">Search Employees</h3>
                      
                    </div>

                    <form action="" method="get">
                      <div class="card-body">
                        <div class="row">

                          <div class="form-group col-md-3">
                            <label for="">First Name</label>
                            <input type="text" name="" class="form-control" placeholder="First Name">
                          </div>

                          <div class="form-group col-md-3">
                            <label for="">Surname</label>
                            <input type="text" name="" class="form-control" placeholder="Surname">
                          </div>

                        </div>
                      </div>
                    </form>
                  </div>
                </section>
            </div>
        </div>
    </section>

    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


  @endsection