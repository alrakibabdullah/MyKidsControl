<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->
      <li class="nav-item">
        <a href="{{route('dashboard')}}" class="nav-link {{ (request()->is('admin/dashboard')) ? 'active' : '' }}">
          <i class="nav-icon fas fa-tachometer-alt"></i>
          <p>
            Dashboard
          </p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{route('country.index')}}" class="nav-link {{ (request()->is('admin/country')) ? 'active' : '' }}">
          <i class="nav-icon fas fa-th"></i>
          <p>
            Country
          </p>
        </a>
      </li>
      <li class="nav-item
      {{ request()->is('admin/customer/create') ? 'menu-open' : '' }}
      {{ request()->is('admin/customer') ? 'menu-open' : '' }}
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
            <a href="{{route('customer.create')}}" class="nav-link {{ (request()->is('admin/customer/create')) ? 'active' : '' }}">
              <i class="far fa-circle nav-icon"></i>
              <p>Add</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('customer.index')}}" class="nav-link {{ (request()->is('admin/customer')) ? 'active' : '' }}">
              <i class="far fa-circle nav-icon"></i>
              <p>Manage</p>
            </a>
          </li>
        </ul>
      </li>
      <li class="nav-item
      {{ request()->is('admin/child') ? 'menu-open' : '' }}
      ">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-edit"></i>
          <p>
            Child
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
            <a href="{{route('child.index')}}" class="nav-link {{ (request()->is('admin/child')) ? 'active' : '' }}">
              <i class="far fa-circle nav-icon"></i>
              <p>Manage</p>
            </a>
          </li>
        </ul>
      </li>
      <li class="nav-item">
        <a href="{{route('website.index')}}" class="nav-link {{ (request()->is('admin/website')) ? 'active' : '' }}">
          <i class="nav-icon fas fa-th"></i>
          <p>
            Websites
          </p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{route('discount.index')}}" class="nav-link {{ (request()->is('admin/discount')) ? 'active' : '' }}">
          <i class="nav-icon fas fa-th"></i>
          <p>
            Discount
          </p>
        </a>
      </li>
      <li class="nav-item
      {{ request()->is('admin/site-setting') ? 'menu-open' : '' }}
      ">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-edit"></i>
          <p>
            Settings
            <i class="fas fa-angle-left right"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item {{ (request()->is('admin/site-setting')) ? 'active' : '' }}">
            <a href="{{route('site-setting')}}" class="nav-link {{ (request()->is('admin/site-setting')) ? 'active' : '' }}">
              <i class="far fa-circle nav-icon"></i>
              <p>Website Setting</p>
            </a>
          </li>
        </ul>
      </li>
      <li class="nav-item">
        <a href="{{route('change-password')}}" class="nav-link {{ (request()->is('admin/change-password')) ? 'active' : '' }}">
          <i class="nav-icon fas fa-file"></i>
          <p>Change Password</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{route('inactive-user')}}" class="nav-link {{ (request()->is('admin/inactive-user')) ? 'active' : '' }}">
          <i class="nav-icon fas fa-file"></i>
          <p>Inactive User</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{route('email-template')}}" class="nav-link {{ (request()->is('admin/email-template')) ? 'active' : '' }}">
          <i class="nav-icon fas fa-file"></i>
          <p>Email template</p>
        </a>
      </li>
    </ul>
  </nav>