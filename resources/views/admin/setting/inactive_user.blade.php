@extends('admin.layouts.app')
@section('title')
    <title>{{ config('app.name') }}  |  Parent</title>
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
            </div>
            <!-- right column -->
            <div class="col-md-12">
                <!-- general form elements disabled -->
                <div class="card card-warning">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Manage Parent information</h3>
                        </div>
                        
                        <!-- /.card-header -->
                        <div class="card-body">
                            {{-- <form action="" method="get">
                                @csrf
    
                                <div class="row">
                                    <div class="col-xl-2 col-md-2">
                                        <div class="form-group row mb-4">
                                            <label class="col-form-label col-12">
                                                <b> From <i class="text-danger">*</i> </b>
                                            </label>
                                            <div class="col-sm-12 col-md-9">
                                                <option value=""></option>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-2 col-md-2">
                                        <div class="form-group row mb-4">
                                            <label class="col-form-label col-12">
                                                <p></p>
                                            </label>
                                            <div class="col-sm-12 col-md-9">
                                                <input type="submit" class="btn btn-success" value="Filter">
                                            </div>
                                        </div>
                                    </div>
    
                                </div>
                            </form> --}}
                            <form method="post" action="{{ route('email-marketing') }}">
                                @csrf
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th class="text-center pt-3">
                                        <div class="custom-checkbox custom-checkbox-table custom-control">
                                            <input type="checkbox" data-checkboxes="mygroup"
                                                   data-checkbox-role="dad"
                                                   class="custom-control-input" id="checkbox-all"
                                                   name="all_data" value="all" onclick="toggle(this);">
                                            <label for="checkbox-all" class="custom-control-label"> </label>
                                            <button type="submit" name="btn" class="btn btn-success"><i class="fas fa-mail-bulk"></i></Button>
                      
                                        </div>
                                    </th>
                                    <th>Serial</th>
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>Inactive</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php $i=1; @endphp
                                @foreach($customers as $item)
                                <tr>
                                    <td class="text-center pt-2">
                                        <div class="custom-checkbox custom-control">
                                            <input type="checkbox" data-checkboxes="mygroup"
                                                   class="custom-control-input"
                                                   id="checkbox-{{$i}}" name="id[]"
                                                   value="{{$item->email}}">
                                            <label for="checkbox-{{$i}}"
                                                   class="custom-control-label">&nbsp;</label>
                                        </div>
                                    </td>
                                    <td>{{$i}}</td>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->phone}}</td>
                                    <td>{{$item->email}}</td>
                                    <td>@php
                                        if($item->status == 1){
                                        echo  "<div class='badge badge-success badge-shadow'>Unblock</div>";
                                        }else{
                                        echo  "<div class='badge badge-danger badge-shadow'>Block</div>";
                                        }
                                        @endphp
                                    </td>
                                    @php
                                                $start_time = \Carbon\Carbon::parse($item->last_login);
                                                $finish_time = \Carbon\Carbon::parse(Carbon\Carbon::now());
                                                $result = $start_time->diffInDays($finish_time, false);
                                            @endphp
                                    <td>{{$result}} Days</td>
                                </tr>
                                @php $i++; @endphp
                                @endforeach
                            </table>
                        </form>
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
	</div>
</section>

@endsection
@section('script')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
    function toggle(source) {
    var checkboxes = document.querySelectorAll('input[type="checkbox"]');
    for (var i = 0; i < checkboxes.length; i++) {
        if (checkboxes[i] != source)
            checkboxes[i].checked = source.checked;
    }
}
</script>

@endsection