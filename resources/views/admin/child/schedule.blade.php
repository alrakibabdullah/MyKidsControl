@extends('admin.layouts.app')
@section('title')
    <title>{{ config('app.name') }}  |  Child Schedules</title>
@endsection
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1> Child Schedules</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Child Schedules</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

<section class="content">
    <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          	<div class="col-md-8 offset-2 mt-5">

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
                <div class="card">
                    <div class="card-header">
                      <h4 class="card-title">Schedules</h4>
                    </div>
                    <div class="card-body">
                      <!-- the events -->
                      <div id="external-events">
                          @foreach ($schedule as $item)
                            <div class="external-event bg-success" style="position: relative;">{{$item->title}}</div>
                            <div class="row">
                                <div style="padding: 5px;">{{$item->from_time}}  -</div>
                                <div style="padding: 5px;">{{$item->to_time}}</div>
                            </div>
                            <div class="row">
                                <div style="padding: 5px;">
                                    <div class="icheck-primary d-inline">
                                    <input type="radio" id="radioPrimary{{$item->id+1}}" name="{{$item->id+1}}" @php if ($item['saturday'] == 1) { echo "checked"; } @endphp>
                                    <label for="radioPrimary{{$item->id+1}}">Sat
                                    </label>
                                  </div>
                                </div>
                                <div style="padding: 5px;">
                                    <div class="icheck-primary d-inline">
                                    <input type="radio" id="radioPrimary{{$item->id+8}}" name="{{$item->id+8}}" @php if ($item['sunday'] == 1) { echo "checked"; } @endphp>
                                    <label for="radioPrimary{{$item->id+8}}">Sun
                                    </label>
                                  </div>
                                </div>
                                <div style="padding: 5px;">
                                    <div class="icheck-primary d-inline">
                                    <input type="radio" id="radioPrimary{{$item->id+17}}" name="{{$item->id+17}}" @php if ($item['monday'] == 1) { echo "checked"; } @endphp>
                                    <label for="radioPrimary{{$item->id+17}}">Mon
                                    </label>
                                  </div>
                                </div>
                                <div style="padding: 5px;">
                                    <div class="icheck-primary d-inline">
                                    <input type="radio" id="radioPrimary{{$item->id+25}}" name="{{$item->id+25}}" @php if ($item['tuesday'] == 1) { echo "checked"; } @endphp>
                                    <label for="radioPrimary{{$item->id+25}}">Tues
                                    </label>
                                  </div>
                                </div>
                                <div style="padding: 5px;">
                                    <div class="icheck-primary d-inline">
                                    <input type="radio" id="radioPrimary{{$item->id+34}}" name="{{$item->id+34}}" @php if ($item['wednesday'] == 1) { echo "checked"; } @endphp>
                                    <label for="radioPrimary{{$item->id+34}}">Wed
                                    </label>
                                  </div>
                                </div>
                                <div style="padding: 5px;">
                                    <div class="icheck-primary d-inline">
                                    <input type="radio" id="{{$item->id+42}}" name="{{$item->id+42}}" @php if ($item['thursday'] == 1) { echo "checked"; } @endphp>
                                    <label for="radioPrimary{{$item->id+42}}">Thu
                                    </label>
                                  </div>
                                </div>
                                <div style="padding: 5px;">
                                    <div class="icheck-primary d-inline">
                                    <input type="radio" id="radioPrimary{{$item->id+51}}" name="{{$item->id+51}}" @php if ($item['friday'] == 1) { echo "checked"; } @endphp>
                                    <label for="radioPrimary{{$item->id+51}}">Fri
                                    </label>
                                  </div>
                                </div>
                            </div>
                          @endforeach
{{--                         
                        <div class="external-event bg-warning" style="position: relative;">Go home</div>
                        <div class="external-event bg-info" style="position: relative;">Do homework</div>
                        <div class="external-event bg-primary" style="position: relative;">Work on UI design</div>
                        <div class="external-event bg-danger" style="position: relative;">Sleep tight</div> --}}
                      </div>
                    </div>
                    <!-- /.card-body -->
                  </div>
	            </div>
	            <!-- /.card -->
			</div>
		</div>
	</div>
</section>
@endsection
@section('script')

@endsection