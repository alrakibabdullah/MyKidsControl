@extends('school.layouts.app')
@section('title')
    <title>{{ config('app.name') }}  | Manage Payment History</title>
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
                    <h1>Manage Payment History</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Manage Payment History</li>
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
                            <h3 class="card-title">Manage Payment History information</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Serial</th>
                                    <th>Parent Name</th>
                                    <th>Amount</th>
                                    <th>Date</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php $i=1; @endphp
                                @foreach($parent_payment as $item)
                                <tr>
                                    <td>{{$i}}</td>
                                    <td>{{$item->parent->name ?? ''}}</td>
                                    <td>{{$item->credit}}</td>
                                    <td>{{$item->date}}</td>
                                    
                                    {{-- <td>
                                        <a href="{{route('school.edit',$item->id)}}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
                                    </td> --}}
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
@endsection
@section('script')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>


@endsection