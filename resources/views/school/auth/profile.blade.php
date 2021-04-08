@extends('school.layouts.app')
@section('title')
    <title>{{ config('app.name') }}  | Edit School</title>
@endsection
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit School Form</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Edit School Form</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

<section class="content">
    <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          	<div class="col-md-8 offset-2 mt-5">

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
		            <div class="card card-info">
		              <div class="card-header" style="text-align: right">
                        <h3 class="card-title">Update User</h3>
                        {{-- <a href="{{route('user.create')}}" class="btn btn-success"> + Add New </a> --}}
		              </div>
		              <!-- /.card-header -->
		              <!-- form start -->
		              <form action="{{route('save.school-profile')}}" method="post" enctype="multipart/form-data">
                        @csrf
		                <div class="card-body">
		                  <div class="form-group row">
		                    <label for="inputEmail3" class="col-sm-3 col-form-label">School Name</label>
		                    <div class="col-sm-9">
                            <input type="text" class="form-control" value="{{$user_by_id->school_name ?? ''}}" name="school_name" placeholder="School Name">
                            
		                    </div>
		                  </div>		                  		                  	                  
		                  <div class="form-group row">
		                    <label for="inputEmail3" class="col-sm-3 col-form-label">Phone Number</label>
		                    <div class="col-sm-9">
		                      <input type="number" class="form-control" value="{{$user_by_id->phone ?? ''}}" name="phone" placeholder="Phone Number">				
		                    </div>
		                  </div>		                  

		                  <div class="form-group row">
		                    <label for="inputEmail3" class="col-sm-3 col-form-label">Email</label>
		                    <div class="col-sm-9">
		                      <input type="email" class="form-control" value="{{$user_by_id->email ?? ''}}" name="email" placeholder="Email">				
		                    </div>
		                  </div>		                  

		                  <div class="form-group row">
		                    <label for="inputEmail3" class="col-sm-3 col-form-label">Address</label>
		                    <div class="col-sm-9">
		                      <input type="text" class="form-control" value="{{$user_by_id->address ?? ''}}" name="address" placeholder="Address">				
		                    </div>
		                  </div>		                  

		                  <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">Image</label>
		                    <div class="col-sm-9">
                                <img src="{{ $user_by_id->logo ?? ''}}" style="height: 50px;width: 50px">
		                      <input type="file" class="form-control" name="logo" placeholder="Image">				
		                      <input type="hidden" class="form-control" value="{{$user_by_id->logo}}" name="old_image" placeholder="Image">				
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
	            <!-- /.card -->
			</div>
		</div>
	</div>
</section>
@endsection
@section('script')

@endsection