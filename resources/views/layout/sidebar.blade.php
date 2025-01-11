<div class="sidebar" data-background-color="dark">
    <div class="sidebar-logo">
        <!-- Logo Header -->
        <div class="logo-header" data-background-color="dark">
            <a href="/" class="logo">
                <img src="{{ asset('assets/img/logobkad.png') }}" alt="navbar brand" class="navbar-brand" height="100" />
            </a>
            <div class="nav-toggle">
                <button class="btn btn-toggle toggle-sidebar">
                    <i class="gg-menu-right"></i>
                </button>
                <button class="btn btn-toggle sidenav-toggler">
                    <i class="gg-menu-left"></i>
                </button>
            </div>
            <button class="topbar-toggler more">
                <i class="gg-more-vertical-alt"></i>
            </button>
        </div>
        <!-- End Logo Header -->
    </div>
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <ul class="nav nav-secondary">
                <li class="nav-item active">
                    <a href="{{ url('index') }}">
                        <i class="fas fa-home"></i>
                        <p>Dashboard</p>
                        {{-- <span class="caret"></span> --}}
                    </a>

                </li>



                <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#forms">
                        <i class="fas fa-pen-square"></i>
                        <p>Data</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="forms">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="{{ url('/surat-masuk') }}">
                                    <span class="sub-item">Surat Masuk</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('form') }}">
                                    <span class="sub-item">Tambah Surat Masuk</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>


                </li>
                <li class="nav-item active">
                    <a href="{{ url('/') }}">
                        <i class="fas fa-sign-out-alt"></i>
                        <p>Logout</p>

                    </a>
                    </a>

                </li>


            </ul>
        </div>
    </div>
</div>
<!-- End Sidebar -->
