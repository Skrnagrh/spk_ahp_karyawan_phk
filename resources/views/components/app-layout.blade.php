<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>SPK AHP | @yield('title')</title>
    <link rel="icon" type="image/x-icon" href="/beranda/assets/img/logo.png" />

    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="/dashboard/css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    <link id="pagestyle" href="{{ asset('/') }}css/material-dashboard.css?v=3.0.4" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
    <link href="{{ asset('/') }}css/nucleo-icons.css" rel="stylesheet" />
    <link href="{{ asset('/') }}css/nucleo-svg.css" rel="stylesheet" />

    <style>
        .back-to-top {
            position: fixed;
            bottom: 20px;
            right: 20px;
            width: 40px;
            height: 40px;
            text-align: center;
            border-radius: 20%;
            opacity: 0;
            pointer-events: none;
            transition: opacity 0.3s ease-in-out;
        }

        .back-to-top i {
            line-height: 40px;
        }

        .back-to-top.active {
            opacity: 1;
            pointer-events: auto;
        }
    </style>

</head>

<body class="sb-nav-fixed">

    <div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="confirmModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="confirmModalLabel">Konfirmasi Logout</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Apakah Anda yakin ingin logout?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success" form="logoutForm">Logout</button>
                </div>
            </div>
        </div>
    </div>

    @include('layouts.navbar')
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            @include('layouts.sidebar')
        </div>
        <div id="layoutSidenav_content">
            <main>
                @isset($content)
                {{$content}}
                @endisset
            </main>
            @include('layouts.footer')
        </div>
    </div>

    <a href="#" class="back-to-top bg-dark text-light d-flex align-items-center justify-content-center">
        <i class="fa fa-arrow-up "></i>
    </a>


    <script>
        window.addEventListener('scroll', function() {
            var backToTopButton = document.querySelector('.back-to-top');
            if (window.scrollY >= 200) {
                backToTopButton.classList.add('active');
            } else {
                backToTopButton.classList.remove('active');
            }
        });

        document.querySelector('.back-to-top').addEventListener('click', function(event) {
            event.preventDefault();
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="/dashboard/js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous">
    </script>
    <script src="/dashboard/assets/demo/chart-area-demo.js"></script>
    <script src="/dashboard/assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="{{ asset('/') }}js/datatables-simple-demo.js"></script>
    <script src="{{ asset('/') }}js/core/popper.min.js"></script>
    <script src="{{ asset('/') }}js/core/bootstrap.min.js"></script>
    <script src="{{ asset('/') }}js/plugins/perfect-scrollbar.min.js"></script>
    <script src="{{ asset('/') }}js/plugins/smooth-scrollbar.min.js"></script>
    <script src="{{ asset('/') }}js/plugins/chartjs.min.js"></script>
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
            if (win && document.querySelector('#sidenav-scrollbar')) {
                var options = {
                damping: '0.5'
                }
                Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
            }
    </script>
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <script src="{{ asset('/') }}js/material-dashboard.min.js?v=3.0.4"></script>
    <script src="{{ asset('/') }}js/core/popper.min.js"></script>
    <script src="{{ asset('/') }}js/core/bootstrap.min.js"></script>
    <script src="{{ asset('/') }}js/plugins/perfect-scrollbar.min.js"></script>
    <script src="{{ asset('/') }}js/plugins/smooth-scrollbar.min.js"></script>
    <script src="{{ asset('/') }}js/plugins/chartjs.min.js"></script>

    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <script src="{{ asset('/') }}js/material-dashboard.min.js?v=3.0.4"></script>

    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
            damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>

    <script>
        function showConfirmationModal(event) {
                event.preventDefault(); // Mencegah aksi default

                $('#confirmModal').modal('show'); // Menampilkan modal
            }
    </script>
</body>

</html>