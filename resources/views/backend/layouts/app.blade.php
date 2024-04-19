<!DOCTYPE html>
<html lang="en">

    <head>
        <title>Propitech</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Favicons -->
        <link rel="icon" href="/backend/images/favicon.ico">

        <!-- Bootstrap Css -->
        <link href="{!! asset('/backend/css/bootstrap.min.css') !!}" rel="stylesheet" type="text/css" />-
        <!-- Icons Css -->
        <link href="{!! asset('/backend/css/icons.min.css') !!}" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="{!! asset('/backend/css/app.min.css') !!}" rel="stylesheet" type="text/css" />
        <link href='https://api.mapbox.com/mapbox-gl-js/v2.9.1/mapbox-gl.css' rel='stylesheet' />
        <link href="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/css/select2.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="{{ url('/backend/font-awesome/css/font-awesome.min.css') }}">
        <style>
            .bodyContenedor::-webkit-scrollbar {
                -webkit-appearance: none;
            }

            .bodyContenedor::-webkit-scrollbar:vertical {
                width:10px;
            }

            .bodyContenedor::-webkit-scrollbar-button:increment,.contenedor::-webkit-scrollbar-button {
                display: none;
            } 

            .bodyContenedor::-webkit-scrollbar:horizontal {
                height: 10px;
            }

            .bodyContenedor::-webkit-scrollbar-thumb {
                background-color: #545458f2;
                border-radius: 20px;
            }

            .bodyContenedor::-webkit-scrollbar-track {
                border-radius: 10px;  
            }
        </style>
        @toastr_css
        @yield('css')
    </head>

    <body data-sidebar="dark" class="bodyContenedor" >
        <!-- Begin page -->
        <div id="layout-wrapper">
            <header id="page-topbar">
                <div class="navbar-header">
                    <div class="d-flex">
                        <!-- LOGO -->
                        <div class="navbar-brand-box">
                            <a href="/home" class="logo logo-dark">
                                <span class="logo-sm">
                                    <img src="/img/logonico2.png" alt="" style="width: 100%; height: 40px;">
                                </span>
                                <span class="logo-lg">
                                    <img src="/img/logonico2.png" alt="" style="width: 90%; height: 60px;">
                                </span>
                            </a>

                            <a href="/home" class="logo logo-light">
                                <span class="logo-sm">
                                    <img src="/img/logonico2.png" alt="" style="width: 100%; height: 40px;">
                                </span>
                                <span class="logo-lg">
                                    <img src="/img/logonico2.png" alt="" style="width: 90%; height: 60px;" >
                                </span>
                            </a>
                        </div>

                        <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect" id="vertical-menu-btn">
                            <i class="fa fa-fw fa-bars"></i>
                        </button>
                    </div>

                    <div class="d-flex">
                        <div class="dropdown d-inline-block">
                            <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                @if($user->avatarImg)
                                <img class="rounded-circle header-profile-user" src="/backend//img/usuarios/{{ $user->avatarImg }}" alt="Header Avatar">
                                @else
                                <img class="rounded-circle header-profile-user" src="/backend/images/userTransparent.png" alt="Header Avatar">
                                @endif
                                <span class="d-none d-xl-inline-block ml-1">{{ $user->name }} {{ $user->apellido }}</span>
                                <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right">
                                <!-- item-->
                                <a class="dropdown-item" href="/users/edit/{{ $user->id }}"><i class="bx bx-user font-size-16 align-middle mr-1"></i> Editar Perfil</a>
                                <!--<a class="dropdown-item" href="#"><i class="bx bx-wallet font-size-16 align-middle mr-1"></i> My Wallet</a>
                                <a class="dropdown-item d-block" href="#"><span class="badge badge-success float-right">11</span><i class="bx bx-wrench font-size-16 align-middle mr-1"></i> Settings</a>
                                <a class="dropdown-item" href="#"><i class="bx bx-lock-open font-size-16 align-middle mr-1"></i> Lock screen</a>
                                <div class="dropdown-divider"></div>-->
                                <a class="dropdown-item text-danger" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" ><i class="bx bx-power-off font-size-16 align-middle mr-1 text-danger"></i> Logout</a>
                            </div>
                        </div>            
                    </div>
                </div>
            </header> <!-- ========== Left Sidebar Start ========== -->
            @include('backend.layouts.menu')
            @yield('content')
        </div>
        <!-- END layout-wrapper -->

        <!-- Right Sidebar -->
        <div class="right-bar">
            <div data-simplebar class="h-100">
                <div class="rightbar-title px-3 py-4">
                    <a href="javascript:void(0);" class="right-bar-toggle float-right">
                        <i class="mdi mdi-close noti-icon"></i>
                    </a>
                    <h5 class="m-0">Settings</h5>
                </div>

                <!-- Settings -->
                <hr class="mt-0" />
                <h6 class="text-center mb-0">Choose Layouts</h6>

                <div class="p-4">
                    <div class="mb-2">
                        <img src="/backend/images/layouts/layout-1.jpg" class="img-fluid img-thumbnail" alt="">
                    </div>
                    <div class="custom-control custom-switch mb-3">
                        <input type="checkbox" class="custom-control-input theme-choice" id="light-mode-switch" checked />
                        <label class="custom-control-label" for="light-mode-switch">Light Mode</label>
                    </div>
    
                    <div class="mb-2">
                        <img src="/backend/images/layouts/layout-2.jpg" class="img-fluid img-thumbnail" alt="">
                    </div>
                    <div class="custom-control custom-switch mb-3">
                        <input type="checkbox" class="custom-control-input theme-choice" id="dark-mode-switch" data-bsStyle="/css/bootstrap-dark.min.css" data-appStyle="css/app-dark.min.css" />
                        <label class="custom-control-label" for="dark-mode-switch">Dark Mode</label>
                    </div>
    
                    <div class="mb-2">
                        <img src="/backend/images/layouts/layout-3.jpg" class="img-fluid img-thumbnail" alt="">
                    </div>
                    <div class="custom-control custom-switch mb-5">
                        <input type="checkbox" class="custom-control-input theme-choice" id="rtl-mode-switch" data-appStyle="/css/app-rtl.min.css" />
                        <label class="custom-control-label" for="rtl-mode-switch">RTL Mode</label>
                    </div>

            
                </div>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div> <!-- end slimscroll-menu-->
        </div>
        <!-- /Right-bar -->

        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <!-- JAVASCRIPT -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script src="/backend/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="/backend/libs/metismenu/metisMenu.min.js"></script>
        <script src="/backend/libs/simplebar/simplebar.min.js"></script>
        <script src="/backend/libs/node-waves/waves.min.js"></script>

        <!-- App js -->
        <script src="/backend/js/app.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2/js/select2.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/i18n/es.js"></script>
        @jquery
        @toastr_js
        @toastr_render
        @yield('script')
    </body>

</html>