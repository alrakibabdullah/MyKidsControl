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
            </div>
            <!-- right column -->
            <div class="col-md-12">
                <!-- general form elements disabled -->
                <div class="card card-warning">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Manage School information</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Serial</th>
                                    <th>Name</th>
                                    <th>Code</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Logo</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php $i=1; @endphp
                                @foreach($school as $item)
                                <tr>
                                    <td>{{$i}}</td>
                                    <td>{{$item->school_name}}</td>
                                    <td>{{$item->school_code}}</td>
                                    <td>{{$item->email ?? ''}}</td>
                                    <td>{{$item->phone}}</td>
                                    <td><img src="{{$item->logo}}" alt="" style="width: 80px; height:60px"></td>
                                    <td>@php
                                        if($item->status == 1){
                                        echo  "<div class='badge badge-success badge-shadow'>Active</div>";
                                        }else{
                                        echo  "<div class='badge badge-danger badge-shadow'>Inactive</div>";
                                        }
                                        @endphp
                                    </td>
                                    <td>
                                        <a href="{{route('school.edit',$item->id)}}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
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
	</div>
</section>
 <!-- Large modal -->
 <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
 aria-hidden="true">
<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="myLargeModalLabel">School Profile
             {{-- <button onclick="PrintJobCard()" class="btn btn-primary"> Print </button></h5> --}}
            </h5>
            <div class="text-left">
                <button type="button" class="close text-right" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
             </div>
        </div>
        <div class="modal-body" id="view-model">
            Content goes here....
        </div>
    </div>
</div>
</div>
@endsection
@section('script')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>


@endsection