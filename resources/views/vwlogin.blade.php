@extends('vwMainTemplate')

@section('contenido')
</br>

<body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Login</h3></div>
                                    <div class="card-body">
                                        <form action='/login/verificar' method='POST'>
                                            @csrf
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="email" autofocus name="email" type="email" placeholder="name@example.com" />
                                                <label for="email">Correo del usuario</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="password" name="password" type="password" placeholder="Password" />
                                                <label for="password">Contraseña</label>
                                            </div>

                                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <a class="small" href="password.html">Olvido su contraseña?</a>

                                            </div>
                                            @foreach($errors->all() as $error)
                                                <li style="color:red">{{$error}}</li>
                                            @endforeach
                                            <br/>
                                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                            <div class="col-sm">
                                            </div>
                                            <div class="col-sm" style="margin-left:-20%">
                                            <input type="submit" class="btn btn-primary" value="Iniciar Sesión">
                                            </div>
                                            </div>

                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2022</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>


@endsection

