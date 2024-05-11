<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('dashboard')}}" class="brand-link">
      <img src="{{asset('assets/frontend/images/logo3.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
       style="opacity: .8">
      <span class="brand-text font-weight-light">Dashboard</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('assets/frontend/images/logo3.png')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
            @guest
            @if (Route::has('postLogin'))
                {{-- <li class="nav-item "> --}}
                    <a class="btn btn-success" href="{{ route('postLogin') }}">{{ __('Sign In') }}   </a>
                {{-- </li> --}}
            @endif

        @else
            {{-- <li class="nav-item dropdown"> --}}
                <a class="d-block">
                    {{ Auth::user()->name }}
                </a>

            {{-- </li> --}}
        @endguest
          {{-- <a href="#" class="d-block">Admin {{ Auth::user()->name }}</a> --}}
        </div>
      </div>

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
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

          <li class="nav-item">
            {{-- <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./index.html" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard v1</p>
                </a>
              </li> --}}
              {{-- <li class="nav-item">
                <a href="./index2.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard v2</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./index3.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard v3</p>
                </a>
              </li>
            </ul>
          </li>--}}
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
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Pages
                <i class="fas fa-angle-left right"></i>
                {{-- <span class="badge badge-info right">6</span> --}}
              </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{route('show.slider')}}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Slider</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{route('show.about')}}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>About</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{route('show.service')}}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Service</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{route('show.product')}}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>product</p>
                    </a>
                  </li>
            </ul>
          </li>


          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Data
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('show.user')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Users</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{route('show.team')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Teams</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('show.product')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Gallery</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('show.partner')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Prtners</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('show.blog')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Blogs</p>
                </a>
              </li>

            </ul>
          </li>
          <li class="nav-header">EXAMPLES</li>

          <li class="nav-item">
            <a href="{{route('show.settings')}}" class="nav-link">
              <i class="nav-icon far fa-wrench"></i>
              <ion-icon name="settings-outline"></ion-icon>
              <p>
                Settings
              </p>
            </a>
          </li>


          <li class="nav-item">
            <a href="{{route('show.gallery')}}" class="nav-link">
              <i class="nav-icon far fa-image"></i>
              <p>
                Gallery
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{route('show.social')}}" class="nav-link">
              <i class="nav-icon fas fa-ellipsis-h"></i>
              <p>
                Social Media
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('show.footer')}}" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Footer
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{route('show.contact')}}" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Contact Us</p>
            </a>
          </li>


      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
