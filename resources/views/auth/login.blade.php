<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Login | Propitech</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesbrand" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="/backend/images/favicon.ico">

        <!-- Bootstrap Css -->
        <link href="/backend/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="/backend/css/icons.min.css" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="/backend/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

    </head>

    <body>
        <div class="home-btn d-none d-sm-block">
            <!--<a href="index.html" class="text-dark"><i class="fas fa-home h2"></i></a>-->
        </div>
        <div class="account-pages my-5 pt-sm-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card overflow-hidden">
                            <div class="bg-soft-primary">
                                <div class="row">
                                    <!--<div class="col-7">
                                        <div class="text-primary p-4">
                                            <h5 class="text-primary">Bienvenido !</h5>
                                        </div>
                                    </div>-->
                                    <div class="col-12">
                                        <div class="text-primary p-4" style="position: absolute">
                                            <h5 class="text" style="color: white">Bienvenido a NS Personalizado!</h5>
                                        </div>
                                        <img src="/img/breadcrumb-bg.jpg" alt="" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                            <div class="card-body pt-0" style="background-color: #c0c0ca;"> 
                                <!--<div>
                                    <a href="index.html">
                                        <div class="avatar-md profile-user-wid mb-4">
                                            <span class="avatar-title rounded-circle bg-light">
                                                <img src="images/logo.svg" alt="" class="rounded-circle" height="34">
                                            </span>
                                        </div>
                                    </a>
                                </div>-->
                                <div class="p-2">
                                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                                    @csrf
                                        <div class="form-group">
                                            <label for="username">Correo Electronico</label>
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                
                                        <div class="form-group">
                                            <label for="userpassword">Contraseña</label>
                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customControlInline">
                                            <label class="custom-control-label" for="customControlInline">Recordarme</label>
                                        </div>
                                        
                                        <div class="mt-3">
                                            <button class="btn btn-primary btn-block waves-effect waves-light" type="submit">Iniciar Sesion</button>
                                        </div>
            
                                        <div class="mt-4 text-center">
                                            <a href="#" class="text-muted"><i class="mdi mdi-lock mr-1"></i> Olvidaste tu contraseña? Comunicate con admin</a>
                                        </div>
                                    </form>
                                </div>
            
                            </div>
                        </div>
                        <div class="mt-5 text-center">
                            <!--<p>Don't have an account ? <a href="auth-register.html" class="font-weight-medium text-primary"> Signup now </a> </p>-->
                            <p>© 2024 NS Personalizado. Creado y Modificado <!-- <i class="mdi mdi-heart text-danger"></i>--> <a href="https://benjaminperez.cl">by Benjamin</a></p>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <!-- JAVASCRIPT -->
        <script src="/backend/libs/jquery/jquery.min.js"></script>
        <script src="/backend/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="/backend/libs/metismenu/metisMenu.min.js"></script>
        <script src="/backend/libs/simplebar/simplebar.min.js"></script>
        <script src="/backend/libs/node-waves/waves.min.js"></script>
        
        <!-- App js -->
        <script src="/backend/js/app.js"></script>
    </body>
</html>

