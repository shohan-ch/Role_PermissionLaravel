<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="{{ route('admin_dashboard') }}" class="brand-link">
    <img src="{{ asset('admin-asset/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
      class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">{{ config('app.name') }}</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    {{-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="{{ asset('admin-asset/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
  </div>
  <div class="info">
    <a href="{{ route('dashboard') }}" class="d-block">{{Auth::user()->name}}</a>
  </div>
  </div> --}}

  <!-- SidebarSearch Form -->
  <div class="form-inline">
    <div class="input-group" data-widget="sidebar-search">
      <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
      <div class="input-group-append">
        <button class="btn btn-sidebar">
          <i class="fas fa-search fa-fw"></i>
        </button>
      </div>
    </div>
  </div>

  <!-- Sidebar Menu -->
  <nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      {{-- <li class="nav-item">
          <a href="pages/widgets.html" class="nav-link">
            <i class="nav-icon fas fa-th"></i>
            <p>
              Widgets
              <span class="right badge badge-danger">New</span>
            </p>
          </a>
        </li> --}}

      <li class="nav-item">
        <a href="" class="nav-link">
          <i class="nav-icon fa fa-list-alt"></i>
          <p>
            Categories

          </p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ route('module.create') }}" class="nav-link">
          <i class="nav-icon fa fa-list-alt"></i>
          <p>
            Modules

          </p>
        </a>
      </li>

      <li class="nav-item">
        <a href="{{ route('role.create') }}" class="nav-link">
          <i class="nav-icon fa fa-list-alt"></i>
          <p>
            Roles

          </p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ route('user.create') }}" class="nav-link">
          <i class="nav-icon fa fa-list-alt"></i>
          <p>
            Users

          </p>
        </a>
      </li>


      {{-- <li class="nav-item">
        <a href="{{ route('product.index') }}" class="nav-link {{ Request::is('admin/service*') ? 'active' : '' }}">
      <i class="nav-icon fas fa-camera-retro"></i>
      <p>
        Products

      </p>
      </a>
      </li>

      <li class="nav-item">
        <a href="{{ route('order.index') }}" class="nav-link {{ Request::is('admin/order*') ? 'active' : '' }}">
          <i class="nav-icon fa fa-list-alt"></i>
          <p>
            Orders

          </p>
        </a>
      </li> --}}
      {{-- 
      <li class="nav-item">
        <a href="{{ route('banner.index') }}" class="nav-link {{ Request::is('admin/banner*') ? 'active' : '' }}">
      <i class="nav-icon fas fa-camera-retro"></i>
      <p>
        Banner

      </p>
      </a>
      </li>

      <li class="nav-item">
        <a href="{{ route('category.index') }}" class="nav-link {{ Request::is('admin/category*') ? 'active' : '' }}">
          <i class="nav-icon fa fa-list-alt"></i>
          <p>
            Categories

          </p>
        </a>
      </li>


      <li class="nav-item">
        <a href="{{ route('food.index') }}" class="nav-link {{ Request::is('admin/food*') ? 'active' : '' }}">
          <i class="nav-icon fas fa-carrot"></i>
          <p>
            Foods Menu

          </p>
        </a>
      </li>

      <li class="nav-item">
        <a href="{{ route('specialFood.index') }}"
          class="nav-link {{ Request::is('admin/specialFood*') ? 'active' : '' }}">
          <i class="nav-icon fas fa-air-freshener"></i>
          <p>
            Special Foods
          </p>
        </a>
      </li>


      <li class="nav-item">
        <a href="{{ route('reservation.index') }}"
          class="nav-link {{ Request::is('admin/reservation*') ? 'active' : '' }}">
          <i class="nav-icon fas fa-hotel"></i>
          <p>
            Reservation

          </p>
        </a>
      </li>


      <li class="nav-item">
        <a href="{{ route('gallery.index') }}" class="nav-link {{ Request::is('admin/gallery*') ? 'active' : '' }}">
          <i class="nav-icon fas fa-photo-video"></i>
          <p>
            Gallery
          </p>
        </a>
      </li>

      <li class="nav-item">
        <a href="{{ route('review.index') }}" class="nav-link {{ Request::is('admin/review*') ? 'active' : '' }}">
          <i class="nav-icon fas fa-star"></i>
          <p>
            Reviews
          </p>
        </a>
      </li>


      <li class="nav-item">
        <a href="{{ route('event.index') }}" class="nav-link {{ Request::is('admin/event*') ? 'active' : '' }}">
          <i class="nav-icon fas fa-address-card"></i>
          <p>
            Event
          </p>
        </a>
      </li>


      <li class="nav-item">
        <a href="{{ route('contact.index') }}" class="nav-link {{ Request::is('admin/contact*') ? 'active' : '' }}">
          <i class="nav-icon fas fa-envelope-open"></i>
          <p>
            Mails
          </p>
        </a>
      </li>


      <li class="nav-item">
        <a href="{{ route('about.index') }}" class="nav-link {{ Request::is('admin/about*') ? 'active' : '' }}">
          <i class="nav-icon fas fa-address-card"></i>
          <p>
            About Us
          </p>
        </a>
      </li>


      <li class="nav-item menu-open">
        <a href="#" class="nav-link {{ Request::is('admin/theme/status*') ? 'active' : '' }}">
          <i class="nav-icon fas fa-table"></i>
          <p>
            Theme
            <i class="fas fa-angle-left right"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="{{ route('theme', ['template' => 'theme1']); }}" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Theme 1</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('theme', ['template' => 'theme2']); }}" class="nav-link active">
              <i class="far fa-circle nav-icon"></i>
              <p>Theme 2</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('theme', ['template' => 'theme3']); }}" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Theme 3</p>
            </a>
          </li>
        </ul>
      </li> --}}




    </ul>


  </nav>
  <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>