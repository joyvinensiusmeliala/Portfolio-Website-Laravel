<!DOCTYPE html>
<!-- upto 2 directory depth-->
<html lang="en-US">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Joy Vinensius Meliala</title>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="crossorigin"/>
    <link rel="preload" as="style" href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;700;800&amp;display=swap"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;700;800&amp;display=swap" media="print" onload="this.media='all'"/>
    <noscript>
      <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;700;800&amp;display=swap"/>
    </noscript>
    <link href="./css/font-awesome/css/all.min.css?ver=1.2.0" rel="stylesheet">
    <link href="./css/bootstrap-icons/bootstrap-icons.css?ver=1.2.0" rel="stylesheet">
    <link href="./css/bootstrap.min.css?ver=1.2.0" rel="stylesheet">
    <link href="./css/aos.css?ver=1.2.0" rel="stylesheet">
    <link href="./css/main.css?ver=1.2.0" rel="stylesheet">
    <noscript>
      <style type="text/css">
        [data-aos] {
            opacity: 1 !important;
            transform: translate(0) scale(1) !important;
        }
      </style>
    </noscript>
  </head>
  <body id="top">
    <header class="bg-light">
      <nav class="navbar navbar-expand-lg navbar-light bg-light" id="header-nav" role="navigation">
        <div class="container">
          <img class="avatar img-fluid mt-1" src="images/joy.jpg" width="50" height="50" />&nbsp;&nbsp;&nbsp;
          <a class="link-dark navbar-brand site-title mb-0" href="#">Joy Vinensius Meliala</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto me-2">
              <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
              <li class="nav-item"><a class="nav-link" href="#education">Education</a></li>
              <li class="nav-item"><a class="nav-link" href="#services">Services</a></li>
              <li class="nav-item"><a class="nav-link" href="#skills">Skills</a></li>
              <li class="nav-item"><a class="nav-link" href="#portfolio">Portfolio</a></li>
              <li class="nav-item"><a class="nav-link" href="#experience">Experience</a></li>
              <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
            </ul>
          </div>
        </div>
      </nav>
    </header>
    <div class="page-content">
      <div id="content">
<header>
  <div class="cover bg-light">
    <div class="container px-3">
      <div class="row">
        <div class="col-lg-6 p-2"><img class="img-fluid" src="images/illustrations/hello3.svg" alt="hello"/></div>
        <div class="col-lg-6">
          <div class="mt-5">
            <p class="lead text-uppercase mb-1">Hello!</p>
            <h1 class="intro-title marker" data-aos="fade-left" data-aos-delay="50">I’m Joy Vinensius Meliala</h1>
            <p class="lead fw-normal mt-3" data-aos="fade-up" data-aos-delay="100">IT Support & IT Programmer</p>
            <div class="social-nav" data-aos="fade-up" data-aos-delay="200">
              <nav role="navigation">
                <ul class="nav justify-content-left">
                  <li class="nav-item"><a class="nav-link" href="https://twitter.com/templateflip" title="Twitter"><i class="fab fa-twitter"></i><span class="menu-title sr-only">Twitter</span></a></li>
                  <li class="nav-item"><a class="nav-link" href="https://www.facebook.com/templateflip" title="Facebook"><i class="fab fa-facebook"></i><span class="menu-title sr-only">Facebook</span></a></li>
                  <li class="nav-item"><a class="nav-link" href="https://www.instagram.com/templateflip" title="Instagram"><i class="fab fa-instagram"></i><span class="menu-title sr-only">Instagram</span></a></li>
                  <li class="nav-item"><a class="nav-link" href="https://www.linkedin.com/" title="LinkedIn"><i class="fab fa-linkedin"></i><span class="menu-title sr-only">LinkedIn</span></a></li>
                  <li class="nav-item"><a class="nav-link" href="https://www.behance.net/templateflip" title="Behance"><i class="fab fa-behance"></i><span class="menu-title sr-only">Behance</span></a></li>
                </ul>
              </nav>
            </div>
            <ul class="nav justify-content-left">
            <div class="mt-3" data-aos="fade-up" data-aos-delay="200"><a class="btn btn-primary shadow-sm mt-1 hover-effect" href="#contact">Download Resume <i class="fas fa-download"></i></a></div> &nbsp;&nbsp;
            <div class="mt-3" data-aos="fade-up" data-aos-delay="200"><a class="btn btn-primary shadow-sm mt-1 hover-effect" href="#contact">Get In Touch <i class="fas fa-arrow-right"></i></a></div>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="wave-bg"></div>
</header>

{{--  <div class="section pt-4 px-3 px-lg-4">  --}}
    @yield('content')
    {{--  @include('partials.navbar')  --}}
    @stack('scripts')
{{--  </div>  --}}


@extends('frontend.layouts.footer')

</div>
    </div>
    <div id="scrolltop"><a class="btn btn-secondary" href="#top"><span class="icon"><i class="fas fa-angle-up fa-x"></i></span></a></div>
    <script src="./scripts/imagesloaded.pkgd.min.js?ver=1.2.0"></script>
    <script src="./scripts/masonry.pkgd.min.js?ver=1.2.0"></script>
    <script src="./scripts/BigPicture.min.js?ver=1.2.0"></script>
    <script src="./scripts/purecounter.min.js?ver=1.2.0"></script>
    <script src="./scripts/bootstrap.bundle.min.js?ver=1.2.0"></script>
    <script src="./scripts/aos.min.js?ver=1.2.0"></script>
    <script src="./scripts/main.js?ver=1.2.0"></script>
  </body>
</html>
