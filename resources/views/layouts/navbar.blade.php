<nav class="sb-topnav navbar navbar-expand navbar-light bg-dark">
    <a class="navbar-brand m-0" href="/dashboard">
        <span class="ms-1 font-weight-bold text-dark">SPK AHP KARYAWAN PHK</span>
    </a>

    <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0 my-2 my-md-0" id="sidebarToggle" href="#!"><i
            class="fas fa-bars"></i></button>

    <ul class="navbar-nav d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-capitalize" id="navbarDropdown" href="#" role="button"
                data-bs-toggle="dropdown" aria-expanded="false"><span
                    class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">{{
                    Auth()->user()->name }}</span> <i class="fas fa-user fa-fw"></i></a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="/">Home Page</a></li>
                <li>
                    <hr class="dropdown-divider" />
                </li>
                <li>
                    <form id="logoutForm" action="/logout" method="post">
                        @csrf

                        <button class="dropdown-item px-3 bg-light border-0 text-dark"
                            onclick="showConfirmationModal(event)">Logout</button>
                    </form>
                </li>

            </ul>
        </li>
    </ul>
</nav>