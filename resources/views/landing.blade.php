<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>PAUD Teratai Bukit Harapan</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <!-- App favicon -->
        <link rel="shortcut icon" href="landing/images/favicon.ico">

        <!-- Bootstrap core CSS -->
        <link rel="stylesheet" href="landing/css/bootstrap.min.css" type="text/css">

        <!--Material Icon -->
        <link rel="stylesheet" type="text/css" href="landing/css/materialdesignicons.min.css" />

        <!--pe-7 Icon -->
        <link rel="stylesheet" type="text/css" href="landing/css/pe-icon-7-stroke.css" />

        <!-- Magnific-popup -->
        <link rel="stylesheet" type="text/css" href="landing/css/magnific-popup.css">

        <!-- Custom  sCss -->
        <link rel="stylesheet" type="text/css" href="landing/css/style.css" />

    </head>

    <body>

        <!--Navbar Start-->
        <nav class="navbar navbar-expand-lg fixed-top navbar-custom sticky sticky-dark">
            <div class="container-fluid">
                <!-- LOGO -->
                <a class="logo text-uppercase" href="index.html">
                    {{-- <h5 class="mb-3 text-white">paud teratai bukit harapan</h5> --}}
                    <img src="{{ asset('images/paud2.png') }}" alt="logo" class="logo-light" height="48" />
                    {{-- <img src="landing/images/logo-dark.png" alt="" class="logo-dark" height="18" /> --}}
                </a>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="mdi mdi-menu"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <ul class="navbar-nav ml-auto navbar-center" id="mySidenav">
                        <li class="nav-item active">
                            <a href="/" class="nav-link">Home</a>
                        </li>


                        <li class="nav-item">
                            <a href="{{ route('login') }}" class="nav-link">Login</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Navbar End -->

        <!-- home start -->
        <section class="bg-home bg-gradient" id="home">
            <div class="home-center">
                <div class="home-desc-center">
                    <div class="container-fluid">
                        <div class="row align-items-center">
                            <div class="col-lg-6 col-sm-6">
                                <div class="home-title text-white">
                                    <h5 class="mb-3 text-white-50">Selamat Datang</h5>
                                    <h2 class="mb-4">PAUD Teratai Bukit Harapan</h2>
                                    {{-- <img src="{{ asset('/images/paud2.png') }}" class="img-fluid" alt="logo" style="width:200px; heigth:200px;"> --}}

                                    <div class="watch-video mt-5">
                                        <a href="{{ route('login') }}" class="btn btn-custom mr-4">Login <i class="mdi mdi-chevron-right ml-1"></i></a>
                                    </div>
                                    <br><br><br>
                                </div>
                            </div>
                            <div class="col-lg-5 offset-lg-1 col-sm-6">
                                <div class="home-img mo-mt-20">
                                    <img src="images/home-img.png" alt="" class="img-fluid mx-auto d-block">
                                </div>
                            </div>
                        </div>
                        <!-- end row -->

                    </div>
                    <!-- end container-fluid -->
                </div>
            </div>
        </section>
        <!-- home end -->

        <!-- footer start -->
        <footer class="footer bg-dark">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="text-center">
                            <div class="footer-logo mb-3">
                                <img src="images/logo-light.png" alt="" height="20">
                            </div>
                            <ul class="list-inline footer-list text-center mt-5">
                                <li class="list-inline-item"><a href="#">Home</a></li>
                                <li class="list-inline-item"><a href="#">About</a></li>
                                <li class="list-inline-item"><a href="#">Services</a></li>
                                <li class="list-inline-item"><a href="#">Clients</a></li>
                                <li class="list-inline-item"><a href="#">Pricing</a></li>
                                <li class="list-inline-item"><a href="#">Contact</a></li>
                            </ul>
                            <ul class="list-inline social-links mb-4 mt-5">
                                <li class="list-inline-item"><a href="#"><i class="mdi mdi-facebook"></i></a></li>
                                <li class="list-inline-item"><a href="#"><i class="mdi mdi-twitter"></i></a></li>
                                <li class="list-inline-item"><a href="#"><i class="mdi mdi-instagram"></i></a></li>
                                <li class="list-inline-item"><a href="#"><i class="mdi mdi-google-plus"></i></a></li>
                            </ul>
                            <p class="text-white-50 mb-4">2016 - 2019 © Adminto. Design by <a href="#" target="_blank" class="text-white-50">Coderthemes</a> </p>

                        </div>
                    </div>

                </div>

            </div>
        </footer>
        <!-- footer end -->

        <!-- Back to top -->
        <a href="#" class="back-to-top" id="back-to-top"> <i class="mdi mdi-chevron-up"> </i> </a>


        <!-- javascript -->
        <script src="landing/js/jquery.min.js"></script>
        <script src="landing/js/bootstrap.bundle.min.js"></script>
        <script src="landing/js/jquery.easing.min.js"></script>
        <script src="landing/js/scrollspy.min.js"></script>

        <!-- Magnific Popup -->
        <script src="landing/js/jquery.magnific-popup.min.js"></script>

        <!-- counter js -->
        <script src="landing/js/counter.int.js"></script>

        <!-- custom js -->
        <script src="landing/js/app.js"></script>
    </body>

</html>
