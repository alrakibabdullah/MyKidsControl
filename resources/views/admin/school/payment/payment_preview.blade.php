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
                  <form class="form-horizontal" action="{{route('payment.store')}}" method="post" enctype="multipart/form-data" onSubmit="return confirm('Do you want to submit?') ">
                      @csrf
                    <div class="card-body">
                      <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label">School Code</label>
                        <div class="col-sm-9">
                          <input type="text" id="school_code" value="{{Session::get('school_code')}}" class="form-control" onchange="SchoolCodeHandler(this.value)" name="school_code" placeholder="Enter School Code" required>				
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label">School Name <span style="color: red">*</span> </label>
                        <div class="col-sm-9">
                          <input type="text" id="school_name" class="form-control" value="{{Session::get('school_name')}}" name="school_name" placeholder="School Name" readonly>
                        </div>
                      </div>		                                   	                  
                      <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label">Payment Method<span style="color: red">*</span></label>
                        <div class="col-sm-9">
                            <select name="payment_method" id="" class="form-control" required>
                                <option value="" disabled selected>--select--</option>
                                <option value="Bank">Bank</option>
                                <option value="Cash">Cash</option>
                                <option value="1" @php if (Session::get('payment_method') == 'Bank') { echo "selected"; } @endphp>Bank</option>
                              <option value="0" @php if (Session::get('payment_method') == 'Cash') { echo "selected"; } @endphp>Cash</option>
                            </select>				
                        </div>
                      </div>		                  
                      <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label">Flat Amount</label>
                        <div class="col-sm-9">
                          <input type="number" value="{{Session::get('flat_amount')}}" id="email" class="form-control" name="flat_amount" placeholder="Flat amount">				
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label">Percentage Amount(%)</label>
                        <div class="col-sm-9">
                          <input type="number" id="email" value="{{Session::get('percent_amount')}}" class="form-control" name="percent_amount" placeholder="Percentage amount">				
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="start_date" class="col-sm-3 col-form-label">Start Date</label>
                        <div class="col-sm-9">
                          <input type="date" id="start_date" value="{{Session::get('start_date')}}" class="form-control" name="start_date" required>				
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="end_date" class="col-sm-3 col-form-label">End Date</label>
                        <div class="col-sm-9">
                          <input type="date" id="end_date" value="{{Session::get('end_date')}}" class="form-control" name="end_date" required>				
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="note" class="col-sm-3 col-form-label">Note</label>
                        <div class="col-sm-9">
                          <textarea type="date" id="note" class="form-control" name="note" placeholder="Note">{{Session::get('note')}}</textarea>				
                        </div>
                      </div>		                  		                  		                  
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                      <button type="submit" class="btn btn-info">Submit</button>
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

<script>
  $(document).ready(function(){
         $.ajaxSetup({
             headers: {
                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
             }
         });
         token = $( "input[value='_token']" ).val();
 });
 </script>
 {{-- <script>
  
  function SchoolCodeHandler(school_code) {
          
          var datastr = "school_code=" + school_code  + "&token="+token;
          // alert(datastr);
          $.ajax({
              type: "post",
              
              data:datastr,
              cache:false,
              success:function (data) {
                  if(data.school.length !=0) {
                      $('#school_name').val(data.school.school_name);
                  }

              },
              error: function (jqXHR, status, err) {
                  
                  console.log(err);
              },
              complete: function () {
                  // alert("Complete");
              }
          });
      }
</script> --}}
<script>
  $( document ).ready(function() {
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });
      token = $( "input[value='_token']" ).val();
      
      $("#school_code").keyup(function(){    
          var school_code = $(this).val().trim();
          // alert(school_code);
          if(school_code != ''){    
              $.ajax({
url: "{{route('get-school-code-handler-info')}}",
              type: 'post',
              data: {school_code: school_code},
              success: function(data){
                  console.log(data.data.school_name);
                  $('#school_name').val(data.data.school_name);
                  // $('#school_name').html(response);  
                  }
              });
          }    
      });
      
  });    
</script>
@endsection