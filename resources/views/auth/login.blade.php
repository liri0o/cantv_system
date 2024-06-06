<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
        <link rel="stylesheet" href="{{asset('assets/estilo.css')}}">
</head>

<body>
    <form method="POST" action="#">
        @csrf

        <section class="h-100 gradient-form">
            <div class="container py-5 h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-xl-10">
                        <div class="card rounded-1 text-gray-100">
                            <div class="row g-0">
                                <div class="col-lg-6">
                                    <div class="card-body p-md-5 mx-md-4">

                                        <div class="text-center">
                                            <img src="{{ asset('logo/cantv.jpg') }}"
                                                style="width: 185px;" alt="logo">
                                        </div>

                                        <form>
                                            <p>Porfavor introduce tu usuario y contraseña</p>

                                            <div data-mdb-input-init class="form-outline mb-4 mt-4">
                                                <input type="email" id="form2Example11" class="form-control"
                                                    placeholder="Phone number or email address" />
                                                <label class="form-label" for="form2Example11">correo</label>
                                            </div>

                                            <div data-mdb-input-init class="form-outline mb-4">
                                                <input type="password" id="form2Example22" class="form-control" />
                                                <label class="form-label" for="form2Example22">contraseña</label>
                                            </div>

                                            <div class="text-center pt-1 mb-5 pb-1">
                                                <a href="{{ route('dashboard') }}">Login</a>
                                            </div>

                                            <div class="d-flex align-items-center justify-content-center pb-4">
                                                <p class="mb-0 me-2">Aun no tines cuenta?</p>
                                                <a class="link-offset-2 link-underline link-underline-opacity-0" href="{{ route('register') }}">Registrate</a>
                                            </div>

                                        </form>

                                    </div>
                                </div>
                                <div class="col-lg-6 d-flex align-items-center gradient-custom-2" style="background: linear-gradient(
                                    45deg,
                                    hsla(168, 85%, 52%, 0.7),
                                    hsla(263, 88%, 45%, 0.7) 100%
                                  );">
                                    <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </form>

    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>
</body>

</html>
