<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>SPK AHP | Login</title>
    <link rel="icon" type="image/x-icon" href="/beranda/assets/img/logo.png" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic"
        rel="stylesheet" type="text/css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.css" rel="stylesheet" />
    <link href="/beranda/assets/css/styles.css" rel="stylesheet" />

    <link rel="stylesheet" href="/login/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="/login/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <link rel="stylesheet" href="/login/dist/css/adminlte.min.css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body
    style="background-image: url('/beranda/assets/img/bg.jpg'); background-repeat: no-repeat; background-size: cover;">
    <header class="masthead">
        <div class="container px-4 px-lg-5 h-100">
            <div class="row row-cols-2 gx-4 gx-lg-5 h-100 align-items-center justify-content-center">
                <div class="col-lg-5 align-self-baseline">
                    <div class="card">
                        <div class="card-body login-card-body">
                            <div class="row justify-content-center text-center">
                                <div class="col-md-6">
                                    <img src="/beranda/assets/img/logo.png" width=120px />
                                </div>
                                <h4 class="text-info text-uppercase">PT. Indah Persada Tech</h4>
                                <h6 class="text-info text-uppercase">Login</h6>
                            </div>
                            <form action="/login" method="post">
                                @csrf
                                <label class="mt-4">Alamat Email</label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" name="email" placeholder="Alamat Email"
                                        value="{{ old('email') }}" required>
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                        </div>
                                    </div>
                                </div>
                                <label>Password</label>
                                <div class="input-group mb-3">
                                    <input type="password" class="form-control" name="password" id="passwordInput"
                                        placeholder="Password" required>
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span id="togglePassword" class="fas fa-eye-slash"
                                                onclick="togglePasswordVisibility()"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">

                                    <div class="col-6">
                                        <a href="/" class="btn btn-secondary btn-block btn-flat">
                                            <b> Batal</b>
                                        </a>
                                    </div>
                                    <div class="col-6">
                                        <button type="submit" class="btn btn-primary btn-block btn-flat">
                                            <b> Masuk</b>
                                        </button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <script src="/login/plugins/jquery/jquery.min.js"></script>
    <script src="/login/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/login/dist/js/adminlte.min.js"></script>
    <script src="/login/plugins/alert.js"></script>
    <script>
        function togglePasswordVisibility() {
            var passwordInput = document.getElementById("passwordInput");
            var togglePassword = document.getElementById("togglePassword");

            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                togglePassword.classList.remove("fa-eye-slash");
                togglePassword.classList.add("fa-eye");
            } else {
                passwordInput.type = "password";
                togglePassword.classList.remove("fa-eye");
                togglePassword.classList.add("fa-eye-slash");
            }
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.js"></script>
    <script src="/beranda/assets/js/scripts.js"></script>
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</body>

</html>
