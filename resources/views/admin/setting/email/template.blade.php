@extends('admin.layouts.app')
@section('title')
    <title>{{ config('app.name') }}  | Add Email Description</title>
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
                    <h1>Email Description Form</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Email Description Form</li>
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
                    <h3 class="card-title">Add Email Description</h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form class="form-horizontal" action="{{route('save.email-details')}}" method="post" enctype="multipart/form-data">
                      @csrf
                    <div class="card-body">
                      <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label">Subject <span style="color: red">*</span> </label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" value="{{$data->subject ?? ''}}" name="subject" placeholder="Email Subject">
                        </div>
                      </div>		                  
                      		                  	                  
                      <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label">Description<span style="color: red">*</span></label>
                        <div class="col-sm-9">
                          <textarea type="number" class="form-control" name="description" placeholder="Description">{{$data->description ?? ''}}	</textarea>			
                        </div>
                      </div>		                  

                    </div>
                                            <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-info">Save</button>
                        <button type="reset" class="btn btn-default">Cancel</button>
                      </div>
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