@extends('school.layouts.app')
@section('title')
    <title>{{ config('app.name') }}  | Add Parent</title>
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
                    <h1>Parent Form</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Parent Form</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

 <!-- Main content -->
 <section class="content">
  <div class="container-fluid">
      <div class="row">
          <!-- left column -->
          <div class="col-md-12">
              <!-- general form elements -->
              <div class="card card-primary">
                  @if ($errors->any())
                      <div class="alert alert-danger">
                          <ul>
                              @foreach ($errors->all() as $error)
                                  <li>{{ $error }}</li>
                              @endforeach
                          </ul>
                      </div>
                  @endif
                  <div class="card-header" style="text-align: right">
                      <h3 class="card-title">Update Customer</h3>
                      <a href="{{route('school-customer.index')}}" class="btn btn-success"> + Add New </a>
                    </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form class="form-horizontal" action="{{route('school-customer.update',$data->id)}}" method="post" enctype="multipart/form-data">
                      @csrf
                      @method('patch')
                    <div class="card-body">
                      <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label">Name</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" value="{{$data->name}}" name="name" placeholder="Name">
                        </div>
                      </div>		                  
                      <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label">Code</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" value="{{$data->code}}" name="code" placeholder="Code">
                        </div>
                      </div>                                                
                      <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label">Phone Number</label>
                        <div class="col-sm-9">
                          <input type="number" class="form-control" value="{{$data->phone}}" name="phone" placeholder="Phone Number">				
                        </div>
                      </div>		                  

                      <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label">Email</label>
                        <div class="col-sm-9">
                          <input type="email" id="email" value="{{$data->email}}" class="form-control" name="email" placeholder="Email">				
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label">Address</label>
                        <div class="col-sm-9">
                          <input type="text" value="{{$data->address}}" class="form-control" name="address" placeholder="Address">				
                        </div>
                      </div>		                  
                      
                      <div class="form-group row">
                          
                        <label for="inputEmail3" class="col-sm-3 col-form-label"></label>
                        <div class="col-sm-9">
                          <img src="{{$data->image}}" alt="" style="height: 80px; width:120px">
                        </div>
                      </div>
                      <div class="form-group row">
                          
                        <label for="inputEmail3" class="col-sm-3 col-form-label">Image</label>
                        <div class="col-sm-9">
                          <input type="file" class="form-control" name="image" placeholder="Image">				
                        </div>
                      </div>		                  		                  
                      <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-3 col-form-label">Status</label>
                        <div class="col-sm-9">
                          <select name="status" id="" class="form-control">
                              <option value="1" @php if ($data['status'] == 1) { echo "selected"; } @endphp>Active</option>
                              <option value="0" @php if ($data['status'] == 0) { echo "selected"; } @endphp>Inactive</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                      <button type="submit" class="btn btn-info">Save</button>
                    </div>
                    <!-- /.card-footer -->
                  </form>
              </div>
              <!-- /.card -->

          </div>
          <!--/.col (left) -->
          <!-- right column -->
          
          <!--/.col (right) -->
      </div>
      <!-- /.row -->
  </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
@endsection
@section('script')
@endsection
        
        
       
