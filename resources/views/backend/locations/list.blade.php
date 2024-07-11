@extends('backend.layouts.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Locations</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6" style="text-align:right;">

                        <a href="{{ url('admin/locations/add') }}" class="btn btn-primary">
                            Add Locations
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

                        {{-- Search start --}}
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Search Locations</h3>
                            </div>

                            <form action="" method="get">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-md-3">
                                            <label for="">ID</label>
                                            <input type="text" name="id" value="{{ Request()->id }}"
                                                class="form-control" placeholder="ID">
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label for="">Street Address</label>
                                            <input type="text" name="street_address"
                                                value="{{ Request()->street_address }}" class="form-control"
                                                placeholder="Enter Street Address">
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label for="">Postal Code</label>
                                            <input type="number" name="postal_code" value="{{ Request()->postal_code }}"
                                                class="form-control" placeholder="Enter Postal Code">
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label for="">City</label>
                                            <input type="text" name="city" value="{{ Request()->city }}"
                                                class="form-control" placeholder="Enter City">
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label for="">State/Province</label>
                                            <input type="text" name="state_province"
                                                value="{{ Request()->state_province }}" class="form-control"
                                                placeholder="Enter State/Province">
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label for="">Country</label>
                                            <input type="text" name="country_name" value="{{ Request()->country_name }}"
                                                class="form-control" placeholder="Enter Country">
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label for="">Created At</label>
                                            <input type="date" name="created_at" value="{{ Request()->created_at }}"
                                                class="form-control">
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label for="">Updated At</label>
                                            <input type="date" name="updated_at" value="{{ Request()->updated_at }}"
                                                class="form-control">
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label for="">From Date (Start Date)</label>
                                            <input type="date" name="start_date" value="{{ Request()->start_date }}"
                                                class="form-control">
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label for="">To Date (End Date)</label>
                                            <input type="date" name="end_date" value="{{ Request()->end_date }}"
                                                class="form-control">
                                        </div>

                                        <div class="form-group col-md-2">
                                            <button class="btn btn-primary" type="submit" style="margin-top: 30px;">Search
                                            </button>
                                            <a href="{{ url('admin/locations') }}" class="btn btn-success"
                                                style="margin-top: 30px;">Reset</a>

                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                        {{-- Search end --}}

                        @include('_message')

                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Locations List</h3>
                            </div>

                            <div class="card-body p-0">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Street Address</th>
                                            <th>Postal Code</th>
                                            <th>City</th>
                                            <th>State/Province</th>
                                            <th>Country</th>
                                            <th>Created At</th>
                                            <th>Updated At</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($getRecord as $value)
                                            <tr>
                                                <td>{{ $value->id }}</td>
                                                <td>{{ $value->street_address }}</td>
                                                <td>{{ $value->postal_code }}</td>
                                                <td>{{ $value->city }}</td>
                                                <td>{{ $value->state_province }}</td>
                                                <td>{{ $value->country_name }}</td>
                                                <td>{{ date('d-m-Y H:i A', strtotime($value->created_at)) }}</td>
                                                <td>{{ date('d-m-Y H:i A', strtotime($value->updated_at)) }}</td>
                                                <td>
                                                    <p>
                                                        <a href="{{ url('admin/locations/edit/' . $value->id) }}"
                                                            class="btn btn-primary">Edit</a>
                                                    </p>
                                                    <p>
                                                        <a href="{{ url('admin/locations/delete/' . $value->id) }}"
                                                            class="btn btn-danger"
                                                            onclick="return confirm('Are you sure you want to delete?')">Delete</a>
                                                    </p>

                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="100%">No Record Found.</td>
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
