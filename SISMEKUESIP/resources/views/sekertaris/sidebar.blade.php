<nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="container-fluid">
      <!-- Toggler -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <!-- Brand -->
     <a href="/">SISMEKUESIP</a>
      <!-- User -->
      <ul class="nav align-items-center d-md-none">
        <li class="nav-item dropdown">
          <a class="nav-link nav-link-icon" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="ni ni-bell-55"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right" aria-labelledby="navbar-default_dropdown_1">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Something else here</a>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <div class="media align-items-center">
              <span class="avatar avatar-sm rounded-circle">
                <img alt="Image placeholder" src="{{ asset('argon/assets/img/theme/team-1-800x800.jpg') }}">
              </span>
            </div>
          </a>
          <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
            <div class=" dropdown-header noti-title">
              <h6 class="text-overflow m-0">Welcome!</h6>
            </div>
            <a href="./examples/profile.html" class="dropdown-item">
              <i class="ni ni-single-02"></i>
              <span>My profile</span>
            </a>
            <a href="./examples/profile.html" class="dropdown-item">
              <i class="ni ni-settings-gear-65"></i>
              <span>Settings</span>
            </a>
            <a href="./examples/profile.html" class="dropdown-item">
              <i class="ni ni-calendar-grid-58"></i>
              <span>Activity</span>
            </a>
            <a href="./examples/profile.html" class="dropdown-item">
              <i class="ni ni-support-16"></i>
              <span>Support</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="{{url('/')}} " class="dropdown-item">
              <i class="ni ni-user-run"></i>
              <span>Logout</span>
            </a>
          </div>
        </li>
      </ul>
      <!-- Collapse -->
      <div class="collapse navbar-collapse" id="sidenav-collapse-main">
        <!-- Collapse header -->
        <div class="navbar-collapse-header d-md-none">
          <div class="row">
            <div class="col-6 collapse-brand">
              <a href="./index.html">
                <img src="{{ asset('argon/assets/img/brand/blue.png') }}">
              </a>
            </div>
            <div class="col-6 collapse-close">
              <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                <span></span>
                <span></span>
              </button>
            </div>
          </div>
        </div>
        <!-- Form -->
        <form class="mt-4 mb-3 d-md-none">
          <div class="input-group input-group-rounded input-group-merge">
            <input type="search" class="form-control form-control-rounded form-control-prepended" placeholder="Search" aria-label="Search">
            <div class="input-group-prepend">
              <div class="input-group-text">
                <span class="fa fa-search"></span>
              </div>
            </div>
          </div>
        </form>
        <!-- Navigation -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="/dashboard1">
              <i class="ni ni-tv-2 text-primary"></i> Dashboard
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/pengarsipan">
              <i class="ni ni-folder-17 text-danger"></i> Manage Pengarsipan
            </a>
          </li>
          {{-- <li class="nav-item">
            <a class="nav-link" href="/jadwalKegiatan">
              <i class="ni ni-calendar-grid-58 text-green"></i> Manage jadwal Kegiatan
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/dokumentasi">
              <i class="ni ni-image text-yellow"></i> Manage Dokumentasi
            </a>
          </li> --}}
          <li class="nav-item">
            <a class="nav-link" href="">
              <svg class="bi bi-info-circle-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M8 16A8 8 0 108 0a8 8 0 000 16zm.93-9.412l-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM8 5.5a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"></path>
              </svg>
              About
              {{-- <i class="ni ni-collection"></i> About --}}
            </a>
          </li>
          {{-- <li class="nav-item">
            <a class="nav-link" href="./examples/profile.html">
              </i> User profile
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./examples/tables.html">
              Tables
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./examples/login.html">
              <i class="ni ni-key-25 text-info"></i> Login
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./examples/register.html">
              <i class="ni ni-circle-08 text-pink"></i> Register
            </a>
          </li>
        </ul> --}}
        <!-- Divider -->
        <hr class="my-3">
        <!-- Heading -->

        <!-- Navigation -->
        <ul class="navbar-nav mb-md-3">
          {{-- <li class="nav-item">
            <a class="nav-link" href="">
              <i class="ni ni-single-copy-04 text-yelow "></i>Laporan Keuangan
            </a>
          </li> --}}


        </ul>
      </div>
    </div>
  </nav>
