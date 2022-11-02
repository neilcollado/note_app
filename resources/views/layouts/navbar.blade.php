<!-- Navbar -->
<nav id="main-navbar" class="navbar navbar-expand-lg navbar-light bg-white fixed-top p-1">
    <!-- Container wrapper -->
    <div class="container-fluid">
        <!-- Toggler -->
        <button
            id="toggler"
                data-mdb-toggle="sidenav"
                data-mdb-target="#sidenav-1"
                class="btn bg-transparent shadow-0"
                aria-controls="#sidenav-1"
                aria-haspopup="true"
            >
            <i class="fas fa-bars fa-2x"></i>
        </button>
        <!-- Toggler -->
        <!-- Right links -->
        <ul class="navbar-nav ms-auto d-flex flex-row">
            <!-- Notifications -->
            <div class="dropdown">
                <a
                    class="nav-link me-3 dropdown-toggle hidden-arrow"
                    href="#"
                    id="navbarDropdownMenuLink"
                    role="button"
                    data-mdb-toggle="dropdown"
                    aria-expanded="false">

                    <i class="fas fa-bell fa-lg" style="color: #3D5584"></i>
                    <span class="badge rounded-pill badge-notification bg-danger">1</span>
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
                    <li>
                        <a class="dropdown-item" href="#">Some news</a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="#">Another news</a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </li>
                </ul>
            </div>
        </ul>
    </div>
    <!-- Container wrapper -->
</nav>
<!-- Navbar -->