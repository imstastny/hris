<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="{{ asset('layout/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('layout/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block"> {{ Auth::user()->name }}</a>
                <a href="#" class="d-block"> {{ Auth::user()->nik }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item nav-item{{request()->is('dashboard') ? ' menu-is-opening menu-open' : ''}}">
                    <a href="{{route ('dashboard') }}" class="nav-link{{request()->is('dashboard') ? '' : ''}}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>

                </li>
                <li class="nav-item{{request()->is('cuti')  ? ' menu-open' : ''}}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-plus-square"></i>
                        <p>
                            Pengajuan
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('cuti.index')}}" class="nav-link{{request()->is('cuti') ? ' active' : ''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Pengajuan Cuti</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('izin.index') }}" class="nav-link{{request()->is('izin') ? ' active' : ''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Pengajuan Izin</p>
                            </a>
                        </li>
                        <!-- <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Inactive Page</p>
                            </a>
                        </li> -->
                    </ul>
                </li>
                <li class="nav-item{{request()->is('cuti')  ? ' menu-open' : ''}}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-plus-square"></i>
                        <p>
                            Persetujuan
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('cuti.admin')}}" class="nav-link{{request()->is('cuti/admin') ? ' active' : ''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Persetujuan Cuti</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('izin.admin') }}" class="nav-link{{request()->is('izin') ? ' active' : ''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Persetujuan Izin</p>
                            </a>
                        </li>
                        <!-- <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Inactive Page</p>
                            </a>
                        </li> -->
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="{{route('profil.show')}}" class="nav-link">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            Profil
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('kelola.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-user-friends"></i>
                        <p>
                            Kelola Karyawan
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Simple Link
                            <span class="right badge badge-danger">New</span>
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{route('logout') }}" class="nav-link " onclick="event.preventDefault();
                         document.getElementById('formLogout').submit()">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>
                            Log out
                            <i class="right fas fa-angle"></i>
                        </p>
                    </a>
                    <form id="formLogout" action="{{route('logout') }}" method="post">@csrf</form>

                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>