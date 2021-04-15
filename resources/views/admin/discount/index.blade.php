@extends('admin.layouts.app')
@section('title')
<title>{{ config('app.name') }} | Manage Discount</title>
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
                    <h1>Discount Form</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Discount Form</li>
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
                <div class="col-md-4">
                    <!-- general form elements -->
                    <div class="card card-primary discount-form">
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        <div class="card-header">
                            <h3 class="card-title">Add Discount</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" action="{{route('discount.store')}}" method="post">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">School Name<span style="color: red">*</span></label>
                                    <select name="school_id" id="" class="form-control" required>
                                        <option value="" selected disabled>--select--</option>
                                        @foreach ($school as $item)
                                            <option value="{{$item->id}}">{{$item->school_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="title">Discount Title<span style="color: red">*</span></label>
                                    <input type="text" name="title" class="form-control" id="title" placeholder="Discount Title">
                                </div>
                                <div class="form-group">
                                    <label for="flat_amount">Flat Amount</label>
                                    <input type="number" name="flat_amount" class="form-control" id="flat_amount" placeholder="Discount Amount">
                                </div>
                                <div class="form-group">
                                    <label for="percent_amount">Percent Amount(%)</label>
                                    <input type="number" name="percent_amount" class="form-control" id="percent_amount" placeholder="Discount Amount">
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->

                </div>
                <!--/.col (left) -->
                <!-- right column -->
                <div class="col-md-8">
                    <!-- general form elements disabled -->
                    <div class="card card-warning">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Manage Discount information</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>Serial</th>
                                        <th>School Name</th>
                                        <th>title</th>
                                        <th>Flat Amount</th>
                                        <th>Percent Amount</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php $i=1; @endphp
                                    @foreach($discounts as $item)
                                    <tr>
                                        <td>{{$i}}</td>
                                        parent
                                        <td>{{$item->school->school_name ?? ''}}</td>
                                        <td>{{$item->title}}</td>
                                        <td>{{$item->flat_amount}}</td>
                                        <td>{{$item->percent_amount}}</td>
                                        <td>
                                            <button data-id="{{$item->id}}" class="btn btn-primary edit" >
                                                <span class="fa fa-edit"></span>
                                            </button>
                                        </td>
                                    </tr>
                                    @php $i++; @endphp
                                    @endforeach
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card-header -->

                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!--/.col (right) -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

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
                   url: "discount/"+id+'/edit',
                   type: "get",
                   data:data,
                   success: function (response) {
                       // console.log(response);
                       $('.discount-form').html(response);
                   },
                   error: function(jqXHR, textStatus, errorThrown) {
                       console.log(textStatus, errorThrown);
                   }
               });
           });
           
      
       
   
   });
   </script>
@endsection