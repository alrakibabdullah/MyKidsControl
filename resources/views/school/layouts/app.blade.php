<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Kids Control | Dashboard</title>
  @yield('title')
  @include('admin.layouts.css')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
  @php $logo = App\Models\SiteImage::first() @endphp
  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    @if(!empty($logo->logo))
    <img class="animation__shake" src="{{$logo->logo ?? ''}}" alt="kidscontrol" height="60" width="60">
    @else
    <img class="animation__shake" src="{{asset('assets/backend/images/')}}/kidscontrol.jpg" alt="kidscontrol" height="60" width="60">
    @endif
  </div>

  <!-- Navbar -->
  @include('admin.layouts.header')
  <!-- /.navbar -->
  @php $user = App\Models\Admin::where('id',Session::get('adminId'))->first(); @endphp
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('school-dashboard')}}" class="brand-link">
      @if(!empty($logo->logo))
      <img src="{{$logo->logo ?? ''}}" alt="kidscontrol" class="brand-image img-circle elevation-3" style="opacity: .8">
      @else
      <img src="{{asset('assets/backend/images/')}}/kidscontrol.jpg" alt="kidscontrol" class="brand-image img-circle elevation-3" style="opacity: .8">
      @endif
      <span class="brand-text font-weight-light">Kids Control</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{$user->image ?? ''}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{Session::get('schoolName')}}</a>
        </div>
      </div>
      <!-- Sidebar Menu -->
      @include('school.layouts.sidebar')
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  @yield('content')
  <footer class="main-footer">
    <strong>Copyright &copy; 2020-2021 <a href="#">Kids Control</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 0.0.0
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

    @yield('script')

  
  @include('admin/layouts.js')
</body>
</html>
