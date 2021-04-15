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
                    <h3 class="card-title">Add Parent</h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form class="form-horizontal" action="{{route('school-customer.store')}}" method="post" enctype="multipart/form-data">
                      @csrf
                    <div class="card-body">
                      <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label">Name <span style="color: red">*</span> </label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" name="name" placeholder="Name">
                        </div>
                      </div>		                  
                      <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label">Code <span style="color: red">*</span> </label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" name="code" placeholder="Code">
                        </div>
                      </div>		                  	                  
                      <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label">Phone Number<span style="color: red">*</span></label>
                        <div class="col-sm-9">
                          <input type="number" class="form-control" name="phone" placeholder="Phone Number">				
                        </div>
                      </div>		                  

                      <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label">Email</label>
                        <div class="col-sm-9">
                          <input type="email" id="email" class="form-control" name="email" placeholder="Email">				
                        </div>
                        <div style="margin-left: 200px">
                            <p id="uname_response" ></p>
                        </div>
                        
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label">Address</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" name="address" placeholder="Address">				
                        </div>
                      </div>		                  

                      <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label">Image</label>
                        <div class="col-sm-9">
                          <input type="file" class="form-control" name="image" placeholder="Image">				
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label">Password<span style="color: red">*</span></label>
                        <div class="col-sm-9">
                          <input type="password" class="form-control" name="password" placeholder="Password">				
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label">Confirm Password<span style="color: red">*</span></label>
                        <div class="col-sm-9">
                          <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password">				
                        </div>
                      </div>			                  		                  
                      <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-3 col-form-label">Status</label>
                        <div class="col-sm-9">
                          <select name="status" id="" class="form-control" required>
                              <option value="1">Active</option>
                              <option value="0 ">Inactive</option>
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
		</div>
	</div>
</section>
@endsection
@section('script')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){
           $.ajaxSetup({
               headers: {
                   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               }
           });
           token = $( "input[value='_token']" ).val();
   
   
           $('.edit').on('click',function(){
               var id = $(this).attr("data-id");
               data = {
                   "_token": token,
                   "id":id
               };
               $.ajax({
                   url: "customer/"+id+'/edit',
                   type: "get",
                   data:data,
                   success: function (response) {
                       // console.log(response);
                       $('.customer-form').html(response);
                   },
                   error: function(jqXHR, textStatus, errorThrown) {
                       console.log(textStatus, errorThrown);
                   }
               });
           });
           
      
       
   
   });
   </script>

@endsection