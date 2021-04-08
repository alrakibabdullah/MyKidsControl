<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->
      <li class="nav-item">
        <a href="{{route('school-dashboard')}}" class="nav-link {{ (request()->is('school/dashboard')) ? 'active' : '' }}">
          <i class="nav-icon fas fa-tachometer-alt"></i>
          <p>
            Dashboard
          </p>
        </a>
      </li>
      <li class="nav-item
      {{ request()->is('school/school-customer/create') ? 'menu-open' : '' }}
      {{ request()->is('school/school-customer') ? 'menu-open' : '' }}
      ">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-edit"></i>
          <p>
            Parent
            <i class="fas fa-angle-left right"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="{{route('school-customer.create')}}" class="nav-link {{ (request()->is('school/school-customer/create')) ? 'active' : '' }}">
              <i class="far fa-circle nav-icon"></i>
              <p>Add</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('school-customer.index')}}" class="nav-link {{ (request()->is('school/school-customer')) ? 'active' : '' }}">
              <i class="far fa-circle nav-icon"></i>
              <p>Manage</p>
            </a>
          </li>
        </ul>
      </li>
      
      <li class="nav-item">
        <a href="{{route('school-change-password')}}" class="nav-link {{ (request()->is('school/change-password')) ? 'active' : '' }}">
          <i class="nav-icon fas fa-file"></i>
          <p>Change Password</p>
        </a>
      </li>
      <li class="nav-item
      {{ request()->is('school/payment.history') ? 'menu-open' : '' }}
      ">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-edit"></i>
          <p>
            Report
            <i class="fas fa-angle-left right"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          {{-- <li class="nav-item">
            <a href="{{route('child.create')}}" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Add</p>
            </a>
          </li> --}}
          <li class="nav-item">
            <a href="{{route('payment.history')}}" class="nav-link {{ (request()->is('school/payment.history')) ? 'active' : '' }}">
              <i class="far fa-circle nav-icon"></i>
              <p>Payment History</p>
            </a>
          </li>
        </ul>
      </li>
    </ul>
  </nav>