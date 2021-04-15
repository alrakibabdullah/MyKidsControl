@extends('admin.layouts.app')
@section('title')
    <title>{{ config('app.name') }}  | Add School</title>
    <meta name="csrf-token" content="{{csrf_token()}}">
@endsection
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>School Form</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">School Form</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-10">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
              
            <!-- Horizontal Form -->
                <div class="card card-info customer-form">
                  <div class="card-header">
                    <h3 class="card-title">Add School</h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form class="form-horizontal" action="{{route('school.update',$data->id)}}" method="post" enctype="multipart/form-data">
                      @csrf
                      @method('patch')
                    <div class="card-body">
                      <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label">School Name <span style="color: red">*</span> </label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" value="{{$data->school_name}}" name="school_name" placeholder="School Name">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label">School Code <span style="color: red">*</span> </label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" name="school_code" value="{{$data->school_code}}" placeholder="School Code" readonly>
                        </div>
                      </div>	                                   	                  
                      <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label">Phone Number<span style="color: red">*</span></label>
                        <div class="col-sm-9">
                          <input type="number" class="form-control" value="{{$data->phone}}" name="phone" placeholder="Phone Number">				
                        </div>
                      </div>		                  

                      <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label">Email</label>
                        <div class="col-sm-9">
                          <input type="email" id="email" class="form-control" value="{{$data->email}}" name="email" placeholder="Email">				
                        </div>
                        <div style="margin-left: 200px">
                            <p id="uname_response" ></p>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label">Address</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" value="{{$data->address}}" name="address" placeholder="Address">				
                        </div>
                      </div>
                      
                      <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label"></label>
                        <div class="col-sm-9">
                            <img src="{{$data->logo}}" alt="" style="height: 80px; width:120px">			
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label">Logo</label>
                        <div class="col-sm-9">
                          <input type="file" class="form-control" name="logo" placeholder="Logo">				
                        </div>
                      </div>		                  		                  		                  
                      <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-3 col-form-label">Status</label>
                        <div class="col-sm-9">
                          <select name="status" id="" class="form-control" required>
                                <option value="1" @php if ($data['status'] == 1) { echo "selected"; } @endphp>Active</option>
                                <option value="0" @php if ($data['status'] == 0) { echo "selected"; } @endphp>Inactive</option>
                            </select>
                        </div>
                      </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                      <button type="submit" class="btn btn-info">Update</button>
                    </div>
                    <!-- /.card-footer -->
                  </form>
            </div>
        </div>
            <!-- /.card -->

            </div>
		</div>
	</div>
</section>
@endsection
@section('script')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>


@endsection