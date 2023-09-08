<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>SPK AHP</title>
    <link rel="icon" type="image/x-icon" href="/beranda/assets/img/logo.png" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic"
        rel="stylesheet" type="text/css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.css" rel="stylesheet" />
    <link href="/beranda/assets/css/styles.css" rel="stylesheet" />
</head>

<body
    style="background-image: url('/beranda/assets/img/bg.jpg'); background-repeat: no-repeat; background-size: cover;">

    <div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="logoutModalLabel">Konfirmasi Logout</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Apakah Anda yakin ingin keluar?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" form="logoutForm" class="btn btn-secondary">Ya, Keluar</button>
                </div>
            </div>
        </div>
    </div>

    <nav class="navbar navbar-expand-lg navbar-light fixed-top py-2 bg-light" id="mainNav">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand text-info" href="/"><img src="/beranda/assets/img/logo.png" width=30px />SPK AHP</a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
                aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto my-2 my-lg-0">
                    @auth
                    <li class="nav-item"><a class="nav-link text-info" href="/dashboard">Dashboard</a></li>
                    <li class="nav-item">
                        <form id="logoutForm" action="/logout" method="post">
                            @csrf
                            <a class="nav-link text-info" style="cursor: pointer" data-bs-toggle="modal"
                                data-bs-target="#logoutModal"> Logout
                            </a>
                        </form>
                    </li>
                    @endauth

                    @guest
                    <li class="nav-item"><a class="nav-link text-info" href="/login"><i
                                class="bi bi-box-arrow-in-right"></i>
                            Login</a></li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <header class="masthead">
        <div class="container px-4">
            <div class="row align-items-center justify-content-center text-center mt-3">
                <div class="col-lg-8 align-self-end">
                    <img src="/beranda/assets/img/logo.png" width=200px />
                    <h4 class="text-white font-weight-bold">PT. Indah Persada Tech</h4>
                    <hr class="divider" />
                </div>
                <div class="col-lg-6 align-self-baseline">
                    <p class="text-white-75">Sistem Pendukung keputusan pemilihan karyawan PHK
                        pada PT. Indah Persada Tech menggunakan
                        Metode Analytical Hierarchy Process (AHP)</p>
                </div>
            </div>
        </div>
    </header>

    <footer class="bg-light fixed-bottom py-3">
        <div class="container px-4 px-lg-5">
            <div class="small text-center text-muted">Copyright &copy;
                <?= Date('Y'); ?> - spk ahp
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.js"></script>
    <script src="/beranda/assets/js/scripts.js"></script>
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</body>

</html>
