<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<style>
    /* Add this CSS to your stylesheet */
    .sb-sidenav.accordion .nav-link.active {
        background-color: rgba(0, 0, 0, 0.2);
    }
</style>

<nav class="sb-sidenav accordion bg-dark text-light" id="sidenavAccordion">
    <div class="sb-sidenav-menu">
        <div class="nav">
            <div class="sb-sidenav-menu-heading"></div>
            <a class="nav-link @if(Request::is('dashboard')) active @endif" href="/dashboard">
                <div class="text-light text-center me-2 d-flex align-items-center justify-content-center">
                    <i class="material-icons opacity-10">dashboard</i>
                </div>
                <span class="nav-link-text ms-1 text-light">Dashboard</span>
            </a>

            <div class="sb-sidenav-menu-heading">Data</div>
            <li class="nav-item">
                <a class="nav-link text-light @if(Request::is('kriteria*') || Request::is('subkriteria*')) active @endif" href="../kriteria">
                    <div class="text-light text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">list</i>
                    </div>
                    <span class="nav-link-text ms-1">Kriteria</span>
                </a>
            </li>


            <li class="nav-item">
                <a class="nav-link text-light @if(Request::is('alternatif*') || Request::is('alternatif_detail*'))  active @endif" href="../alternatif">
                    <div class="text-light text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons">person_outline</i>
                    </div>
                    <span class="nav-link-text ms-1">Alternatif</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link text-light dropdown-toggle @if(Request::is('perhitungan*')) active @endif"
                    data-toggle="collapse" href="#collapsePerhitungan" role="button" aria-expanded="false"
                    aria-controls="collapsePerhitungan">
                    <div class="text-light text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons">table_view</i>
                    </div>
                    <span class="nav-link-text ms-1">Perhitungan</span>
                </a>
                <div class="collapse @if(Request::is('perhitungan*')) show @endif" id="collapsePerhitungan">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link text-light @if(Request::is('perhitungan')) active @endif"
                                style="padding-left: 35px;" href="../perhitungan">
                                <div class="text-light text-center me-2 d-flex align-items-center justify-content-center">
                                    <i class="material-icons">grid_on</i>
                                </div>
                                <span class="nav-link-text ms-1">Matrix Kriteria</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-light @if(Request::is('perhitungan_subkriteria') || Request::is('perhitungan_subkriteria/matrix*')) active @endif"
                                style="padding-left: 35px;" href="../perhitungan_subkriteria">
                                <div class="text-light text-center me-2 d-flex align-items-center justify-content-center">
                                    <i class="material-icons">grid_on</i>
                                </div>
                                <span class="nav-link-text ms-1">Matrix Subkriteria</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-light @if(Request::is('perhitungan_subkriteria/alternatif')) active @endif"
                                style="padding-left: 35px;" href="../perhitungan_subkriteria/alternatif">
                                <div class="text-light text-center me-2 d-flex align-items-center justify-content-center">
                                    <i class="material-icons">calculate</i>
                                </div>
                                <span class="nav-link-text ms-1">Hitung Alternatif</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-light @if(Request::is('perhitungan_subkriteria/prangkingan')) active @endif"
                                style="padding-left: 35px;" href="../perhitungan_subkriteria/prangkingan">
                                <div class="text-light text-center me-2 d-flex align-items-center justify-content-center">
                                    <i class="material-icons">emoji_events</i>
                                </div>
                                <span class="nav-link-text ms-1">Prangkingan</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>


            @if (Auth::user()->admin == 'staff hrd')
            <li class="nav-item">
                <a class="nav-link text-light @if(Request::is('datapengguna')) active @endif" href="../datapengguna">
                    <div class="text-light text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons">people</i>
                    </div>
                    <span class="nav-link-text ms-1">Data Pengguna</span>
                </a>
            </li>
            @endcan
        </div>
    </div>
</nav>
