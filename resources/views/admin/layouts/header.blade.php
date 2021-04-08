<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>
    @php $user = App\Models\Admin::where('id',Session::get('adminId'))->first(); @endphp
    @php $school_logo = App\Models\School::where('id',Session::get('schoolId'))->first(); @endphp
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="dropdown user user-menu open">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
          @if(!empty(Session::get('adminName')))
          <span class="hidden-xs">{{Session::get('adminName')}}</span>
          @else
          <span class="hidden-xs">{{Session::get('schoolName')}}</span>
          @endif
        </a>
        <ul class="dropdown-menu">
          <!-- User image -->
          <li class="user-header">
            @if(!empty($user))
            <img src="{{$user->image}}" class="img-circle" alt="User Image">
            @else
            <img src="{{$school_logo->logo}}" class="img-circle" alt="School Logo">
            @endif
            <p>
              @if(!empty(Session::get('adminName')))
              <span class="hidden-xs">{{Session::get('adminName')}}</span>
              @else
              <span class="hidden-xs">{{Session::get('schoolName')}}</span>
              @endif
            </p>
          </li>
          <!-- Menu Footer-->
          <li class="user-footer">
            <div class="pull-left">
              @if(!empty(Session::get('adminName')))
              <a href="{{route('profile')}}" style="float: left;" class="btn btn-default btn-flat">Profile</a>
              @endif
            </div>
            <div class="pull-right">
              @if(!empty(Session::get('adminName')))
              <a href="{{route('admin-logout')}}" style="float: right;" class="btn btn-default btn-flat">Sign out</a>
              @else
              <a href="{{route('school-logout')}}" style="float: right;" class="btn btn-default btn-flat">Sign out</a>
              @endif
            </div>
          </li>
        </ul>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
    </ul>
  </nav>