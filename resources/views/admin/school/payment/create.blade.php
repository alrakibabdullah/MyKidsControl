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
                    <h1>School Payment Form</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">School Payment Form</li>
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
                    <h3 class="card-title">Add School Payment</h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form class="form-horizontal" action="{{route('payment.store')}}" method="post" enctype="multipart/form-data">
                      @csrf
                    <div class="card-body">
                      <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label">School Name <span style="color: red">*</span> </label>
                        <div class="col-sm-9">
                            <select name="school_id" id="" class="form-control" required>
                                <option value="" disabled selected>--select--</option>
                                @foreach ($school as $item)
                                    <option value="{{$item->id}}">{{$item->school_name}}({{$item->school_code}})</option>
                                @endforeach
                            </select>
                        </div>
                      </div>		                                   	                  
                      <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label">Payment Method<span style="color: red">*</span></label>
                        <div class="col-sm-9">
                            <select name="payment_method" id="" class="form-control" required>
                                <option value="" disabled selected>--select--</option>
                                <option value="Bank">Bank</option>
                                <option value="Cash">Cash</option>
                            </select>				
                        </div>
                      </div>		                  
                      <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label">Amount</label>
                        <div class="col-sm-9">
                          <input type="number" id="email" class="form-control" name="amount" placeholder="amount">				
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label">Date</label>
                        <div class="col-sm-9">
                          <input type="date" id="email" class="form-control" name="date" placeholder="Email">				
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label">Note</label>
                        <div class="col-sm-9">
                          <textarea type="date" id="note" class="form-control" name="note" placeholder="Note"></textarea>				
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