<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>WEB BLK</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500;600;700&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('assets/template/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('assets/template/css/style.css') }}" rel="stylesheet">
    @yield('style')
</head>

<body>
    <!-- Topbar Start -->
    @include('layouts.topbar')
    <!-- Topbar End -->


    <!-- Navbar Start -->
    @include('layouts.navbar')
    <!-- Navbar End -->


    <!-- Header Start -->
    @yield('header')
    <!-- Header End -->


    <!-- Content Start -->
    @yield('content')
    <!-- Content End -->


    <!-- Footer Start -->
    <div class="container-fluid position-relative overlay-top bg-dark text-white-50 py-5" style="margin-top: 90px;">
        <div class="container mt-5 pt-5">
            <div class="row">
                <div class="col-md-6 mb-5">
                    <a href="/" class="navbar-brand">
                        <h1 class="mt-n2 text-uppercase text-white">BLKK Ponpes Darul Falah</h1>
                    </a>
                    <p class="m-0">Kami hadir sebagai respons terhadap pesatnya perkembangan teknologi informasi dan kebutuhan pelajar untuk mengembangkan keterampilan yang dibutuhkan dalam dunia kerja.</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 mb-5">
                    <h3 class="text-white mb-4">Berhubungan</h3>
                    <p><i class="fa fa-map-marker-alt mr-2"></i>Cimanggu, Kec. Cisalak, Kabupaten Subang, Jawa Barat 41283</p>
                    <p><i class="fa fa-phone-alt mr-2"></i>0852-2050-2191</p>
                    <p><i class="fa fa-envelope mr-2"></i>blkponpesdarulfalah@gmail.com</p>
                    <div class="d-flex justify-content-start mt-4">
                        <a class="text-white mr-4" href="#"><i class="fab fa-2x fa-twitter"></i></a>
                        <a class="text-white mr-4" href="#"><i class="fab fa-2x fa-facebook-f"></i></a>
                        <a class="text-white mr-4" href="#"><i class="fab fa-2x fa-linkedin-in"></i></a>
                        <a class="text-white" href="#"><i class="fab fa-2x fa-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid bg-dark text-white-50 border-top py-4" style="border-color: rgba(256, 256, 256, .1) !important;">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-center text-md-left mb-3 mb-md-0">
                    <p class="m-0">Copyright &copy; <a class="text-white" href="#">BLKK Ponpes Darul Falah</a>. All Rights Reserved.
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary rounded-0 btn-lg-square back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets/template/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('assets/template/lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('assets/template/lib/counterup/counterup.min.js') }}"></script>
    <script src="{{ asset('assets/template/lib/owlcarousel/owl.carousel.min.js') }}"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('assets/template/js/main.js') }}"></script>
    <!-- Custom Script Page -->
    @yield('script')
</body>

</html>
