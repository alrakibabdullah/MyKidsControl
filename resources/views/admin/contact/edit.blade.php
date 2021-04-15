@extends('admin.layouts.app')
@section('title')
    <title>{{ config('app.name') }}  | Edit Contact</title>
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
                    <h1>Contact edit Form</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Contact Form</li>
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
                    </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form class="form-horizontal" action="{{route('contact.update',$data->id)}}" method="post" enctype="multipart/form-data">
                      @csrf
                    <div class="card-body">
                      <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label">Name</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" value="{{$data->name}}" name="name" placeholder="First Name">
                        </div>
                      </div>		                  
                                                                      
                      <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label">Email</label>
                        <div class="col-sm-9">
                          <input type="email" class="form-control" value="{{$data->email}}" name="email">				
                        </div>
                      </div>		                  

                      <div class="form-group row">
                        <label for="subject" class="col-sm-3 col-form-label">Subject</label>
                        <div class="col-sm-9">
                          <input type="text" id="subject" value="{{$data->subject}}" class="form-control" name="subject" placeholder="Subject">				
                        </div>
                        
                      </div>
                                                

                      <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label">Description</label>
                        <div class="col-sm-9">
                          <textarea type="text" class="form-control" name="description" placeholder="Description">{{$data->description}}</textarea>			
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
        
        
       
