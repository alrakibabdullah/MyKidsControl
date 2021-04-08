@extends('admin.layouts.app')
@section('title')
    <title>{{ config('app.name') }} | Manage Child</title>
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
                        <h1>Manage Child</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Child </li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- right column -->
                    <div class="col-md-12">
                        <!-- general form elements disabled -->
                        <div class="card card-warning">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Manage Child information</h3>
                                    <a href="{{route('customer.create')}}" class="btn btn-success" style="float: right"> + Add New </a>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                        <tr>
                                            <th>Serial</th>
                                            <th>Name</th>
                                            <th>Phone</th>
                                            <th>Email</th>
                                            <th>Status</th>
                                        <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @php $i=1; @endphp
                                        @foreach($child as $data)
                                            <tr>
                                                <td>{{$i}}</td>
                                                <td>{{$data->name}}</td>
                                                <td>{{$data->phone}}</td>
                                                <td>{{$data->email}}</td>
                                                <td>
                                                    @php
                                            if($data->status == 1){
                                            echo  "<div class='badge badge-success badge-shadow'>Active</div>";
                                            }else{
                                            echo  "<div class='badge badge-danger badge-shadow'>Blocked</div>";
                                            }
                                            @endphp
                                                </td>
                                                <td>
                                                    <a href="{{route('child.edit',$data->id)}}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
                                                    <a href="#"  style="display: inline;" class="btn btn-success btn-sm" onclick="ViewParentProfile({{$data->id}})"  data-toggle="modal"
                                                        data-target=".bd-example-modal-lg"><i class="far fa-user-circle"></i></a>
                                                        <a href="{{route('child.schedule',$data->id)}}" class="btn btn-warning btn-sm"><i class="fas fa-clock"></i></a>
                                                </td>
                                            </tr>
                                            @php $i++; @endphp
                                        @endforeach
                                        </tbody>
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
 <!-- Large modal -->
 <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
 aria-hidden="true">
<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="myLargeModalLabel">Parents Profile
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
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        });
        var token = $("input[name=_token]").val();
        function ViewParentProfile(id) {
            var datastr = "id=" + id + "&token=" + token;
            $.ajax({
                type: "POST",
                url: "<?php echo route('parent-profile'); ?>",
                data: datastr,
                cache: false,
                success: function(data) {
                    $('#view-model').html(data);
                },
                error: function(jqXHR, status, err) {
//                    alert(status);
                    console.log(err);
                },
                complete: function() {
                    // alert("Complete");
                }
            });
        }

    </script>
@endsection