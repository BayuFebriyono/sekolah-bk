<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link
        href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap"
        rel="stylesheet">

    <title>Sistem Sekolah</title>
    <!--

TemplateMo 548 Training Studio

https://templatemo.com/tm-548-training-studio

-->
    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="{{ asset('landing_page/assets/css/bootstrap.min.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('landing_page/assets/css/font-awesome.css') }}">

    <link rel="stylesheet" href="{{ asset('landing_page/assets/css/templatemo-training-studio.css') }}">

</head>

<body>

    <!-- ***** Preloader Start ***** -->
    <div id="js-preloader" class="js-preloader">
        <div class="preloader-inner">
            <span class="dot"></span>
            <div class="dots">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </div>
    <!-- ***** Preloader End ***** -->


    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="index.html" class="logo">Sim<em> Sekolah</em></a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li class="scroll-to-section"><a href="#top" class="active">Home</a></li>
                            <li class="scroll-to-section"><a href="#features">About</a></li>
                            <li class="scroll-to-section"><a href="#our-classes">Classes</a></li>
                            <li class="scroll-to-section"><a href="#schedule">Schedules</a></li>
                            <li class="scroll-to-section"><a href="#contact-us">Contact</a></li>
                            @if (Auth::guard('guru')->guest() && Auth::guard('siswa')->guest())
                                <li class="main-button"><a href="{{ url('login_page') }}">Sign In</a></li>
                            @endif
                            @if (Auth::guard('guru')->check() || Auth::guard('siswa')->check())
                                <form action="/logout" method="POST">
                                    @csrf
                                    <li class="main-button d-inline"><button class="btn btn-danger" type="submit">SIGN
                                            OUT</button></li>
                                </form>
                            @endif


                        </ul>
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->

    <!-- ***** Main Banner Area Start ***** -->
    <div class="main-banner" id="top">
        <video autoplay muted loop id="bg-video">
            <source src="{{ asset('landing_page/Video Landing.mp4') }}" type="video/mp4" />
        </video>

        <div class="video-overlay header-text">
            <div class="caption">
                <h6>Build and make it better together</h6>
                <h2>Sistem Informasi Manajemen <em>Sekolah</em></h2>
                {{-- <div class="main-button scroll-to-section">
                    <a href="#features">Become a member</a>
                </div> --}}
            </div>
        </div>
    </div>
    <!-- ***** Main Banner Area End ***** -->

    <!-- ***** Features Item Start ***** -->
    <section class="section" id="features">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="section-heading">
                        <h2>Layanan <em>Tersedia</em></h2>
                        <img src="{{ asset('landing_page/assets/images/line-dec.png') }}" alt="waves">
                        <p>Dibawah ini beberapa program yang sudah kami support pada aplikasi web Sistem Sekolah</p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <ul class="features-items">
                        <li class="feature-item">
                            <div class="left-icon">
                                <img src="{{ asset('landing_page/mentoring.png') }}" alt="First One" height="80px">
                            </div>
                            <div class="right-content">
                                <h4>Bimbingan Konseling</h4>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique porro fugiat unde
                                    itaque!</p>
                                <a href="/login_page" class="text-button">Discover More</a>
                            </div>
                        </li>
                        <li class="feature-item">
                            <div class="left-icon">
                                <img src="{{ asset('landing_page/books.png') }}" alt="second one" height="80px">
                            </div>
                            <div class="right-content">
                                <h4>Perpustakaan</h4>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Inventore neque nobis qui
                                    quos quae cupiditate.</p>
                                <a href="#" class="text-button">Discover More</a>
                            </div>
                        </li>
                        <li class="feature-item">
                            <div class="left-icon">
                                <img src="{{ asset('landing_page/clue.png') }}" alt="third gym training" height="80px">
                            </div>
                            <div class="right-content">
                                <h4>Cooming Soon</h4>
                                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Iste ea, et cum aspernatur
                                    consequuntur ipsa.</p>
                                <a href="#" class="text-button">Discover More</a>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-6">
                    <ul class="features-items">
                        <li class="feature-item">
                            <div class="left-icon">
                                <img src="{{ asset('landing_page/clue.png') }}" alt="third gym training" height="80px">
                            </div>
                            <div class="right-content">
                                <h4>Cooming Soon</h4>
                                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Iste ea, et cum aspernatur
                                    consequuntur ipsa.</p>
                                <a href="#" class="text-button">Discover More</a>
                            </div>
                        </li>
                        <li class="feature-item">
                            <div class="left-icon">
                                <img src="{{ asset('landing_page/clue.png') }}" alt="third gym training"
                                    height="80px">
                            </div>
                            <div class="right-content">
                                <h4>Cooming Soon</h4>
                                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Iste ea, et cum aspernatur
                                    consequuntur ipsa.</p>
                                <a href="#" class="text-button">Discover More</a>
                            </div>
                        </li>
                        <li class="feature-item">
                            <div class="left-icon">
                                <img src="{{ asset('landing_page/clue.png') }}" alt="third gym training"
                                    height="80px">
                            </div>
                            <div class="right-content">
                                <h4>Cooming Soon</h4>
                                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Iste ea, et cum aspernatur
                                    consequuntur ipsa.</p>
                                <a href="#" class="text-button">Discover More</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Features Item End ***** -->

    <!-- ***** Call to Action Start ***** -->
    <section class="section" id="call-to-action">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="cta-content">
                        <h2>Don’t <em>think</em>, begin <em>today</em>!</h2>
                        <p>“Murid yang dipersenjatai dengan informasi akan senantiasa memenangkan pertempuran” - Meladee
                            McCarty</p>
                        <div class="main-button scroll-to-section">
                            <a href="#our-classes">Sign Up</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Call to Action End ***** -->



    <!-- ***** Footer Start ***** -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; 2020 Training Studio

                        - Designed by <a rel="nofollow" href="https://templatemo.com" class="tm-text-link"
                            target="_parent">TemplateMo</a><br>

                        Distributed by <a rel="nofollow" href="https://themewagon.com" class="tm-text-link"
                            target="_blank">ThemeWagon</a>

                    </p>

                    <!-- You shall support us a little via PayPal to info@templatemo.com -->

                </div>
            </div>
        </div>
    </footer>

    <!-- jQuery -->
    <script src="{{ asset('landing_page/assets/js/jquery-2.1.0.min.js') }}"></script>

    <!-- Bootstrap -->
    <script src="{{ asset('landing_page/assets/js/popper.js') }}"></script>
    <script src="{{ asset('landing_page/assets/js/bootstrap.min.js') }}"></script>

    <!-- Plugins -->
    <script src="{{ asset('landing_page/assets/js/scrollreveal.min.js') }}"></script>
    <script src="{{ asset('landing_page/assets/js/waypoints.min.js') }}"></script>
    <script src="{{ asset('landing_page/assets/js/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('landing_page/assets/js/imgfix.min.js') }}"></script>
    <script src="{{ asset('landing_page/assets/js/mixitup.js') }}"></script>
    <script src="{{ asset('landing_page/assets/js/accordions.js') }}"></script>

    <!-- Global Init -->
    <script src="{{ asset('landing_page/assets/js/custom.js') }}"></script>

</body>

</html>
