
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>MUPI -- Munshiganj Polytechnic Institute</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="Free HTML Templates" name="keywords" />
    <meta content="Free HTML Templates" name="description" />

    <!-- Favicon -->
    <link href="{{ asset('frontend') }}/assets/img/favicon.ico" rel="icon" />

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link
      href="https://fonts.googleapis.com/css2?family=Handlee&family=Nunito&display=swap"
      rel="stylesheet"
    />

    <!-- Font Awesome -->
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css"
      rel="stylesheet"
    />

    <!-- Flaticon Font -->
    <link href=" {{ asset('frontend') }}/assets/lib/flaticon/font/flaticon.css" rel="stylesheet" />

    <!-- Libraries Stylesheet -->
    {{-- <link href="{{ asset('frontend') }}/assets/css/style.min.css" rel="stylesheet" /> --}}
    @vite(['public/frontend/assets/css/style.min.css'])
    <link href="{{ asset('frontend') }}/assets/lib/lightbox/css/lightbox.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('frontend') }}/assets/css/style.css" rel="stylesheet" />
  </head>

  <body>
    <!-- Navbar Start -->
    <div class="header_top bg-primary">
      <div class="slider">
        <marquee class="text-light">
         WELCOME TO MUNSHIGANJ POLYTECHNIC INSTITUTE
      </marquee>
      </div>
  </div>
    <div class="container-fluid bg-light position-relative shadow">
      <nav
        class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0 px-lg-5"
      >
        <a
          href=""
          class="navbar-brand font-weight-bold text-secondary"
          style="font-size: 50px"
        >
          <img src="{{ asset('frontend') }}/assets/img/logo.jfif" alt="MUPI Logo" height="100px">
         
        </a>
        <button
          type="button"
          class="navbar-toggler"
          data-toggle="collapse"
          data-target="#navbarCollapse"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div
          class="collapse navbar-collapse justify-content-between"
          id="navbarCollapse"
        >
          <div class="navbar-nav font-weight-bold mx-auto py-0">
            <a href="{{ route('home') }}" class="nav-item nav-link active">Home</a>
            <div class="nav-item dropdown">
              <a
                href=""
                class="nav-link dropdown-toggle"
                data-toggle="dropdown"
                >Inovetion and Publication</a>
              <div class="dropdown-menu rounded-0 m-0">
                <a href="{{ route('teacher') }}" class="nav-item nav-link">Teachers</a>
               <a href="{{ route('student') }}" class="nav-item nav-link">student</a>
              </div>
            </div>
            <a href="{{ route('gallery') }}" class="nav-item nav-link">Gallery</a>
            <div class="nav-item dropdown">
              <a
                href=""
                class="nav-link dropdown-toggle"
                data-toggle="dropdown"
                >Addministration</a>
              <div class="dropdown-menu rounded-0 m-0">
                <a href="{{ route('office') }}" class="nav-item nav-link">Office Section</a>
                <a href="{{ route('registar') }}" class="nav-item nav-link">Registar Section</a>
                <a href="{{ route('library') }}" class="nav-item nav-link">Library Section</a>
                <a href="{{ route('store') }}" class="nav-item nav-link">Store Section</a>
                <a href="{{ route('account') }}" class="nav-item nav-link">Account Section</a>
                <a href="{{ route('security') }}" class="nav-item nav-link">Security Section</a>
              </div>
            </div>
            <a href="{{ route('notice') }}" class="nav-item nav-link">Notice</a>
            <a href="{{ route('routine') }}" class="nav-item nav-link">Routine</a>
            <div class="nav-item dropdown">
              <a
                href=""
                class="nav-link dropdown-toggle"
                data-toggle="dropdown"
                >About Us</a>
              <div class="dropdown-menu rounded-0 m-0">
                <a href="{{ route('message') }}" class="dropdown-item">Message Of Princepal</a>
                <a href="{{ route('department') }}" class="dropdown-item">Departments</a>
                <a href="{{ route('job') }}" class="dropdown-item">Job Seekers</a>
                <a href="{{ route('about') }}" class="dropdown-item">About</a>
              </div>
            </div>
            <a href="{{ route('contact') }}" class="nav-item nav-link">Contact</a>
          </div>
        </div>
      </nav>
    </div>
    <!-- Navbar End -->
    @yield('content')
    <!-- Footer Start -->
    <div
      class="container-fluid  text-white mt-5 py-5 px-sm-3 px-md-5"
    >
      <div class="row pt-5 full">
        <div class="col-lg-3 col-md-6 mb-5 name">
          <a
            href=""
            class="navbar-brand font-weight-bold text-primary m-0 mb-4 p-0"
            style="font-size: 40px; line-height: 40px"
          >
            <span class="text-white">Munshiganj Polytechnic <br> Institute</span>
          </a>
          <p>
            This is the most popular institute in bangladesh
          </p>
          <div class="d-flex justify-content-start mt-4">
            <a
              class="btn btn-outline-primary rounded-circle text-center mr-2 px-0"
              style="width: 38px; height: 38px"
              href="https://www.facebook.com/profile.php?id=100063615263897"
              ><i class="fab fa-facebook-f"></i
            ></a>
          </div>
        </div> 
        <div class="col-lg-3 col-md-6 mb-5 contact">
          <h3 class="text-primary mb-4">Get In Touch</h3>
          <div class="d-flex">
            <h4 class="fa fa-map-marker-alt text-primary"></h4>
            <div class="pl-3">
              <h5 class="text-white">Address</h5>
              <p>komlaghat, Mirkadim, Munshigan</p>
            </div>
          </div>
          <div class="d-flex">
            <h4 class="fa fa-envelope text-primary"></h4>
            <div class="pl-3">
              <h5 class="text-white">Email</h5>
              <p>mpiprincipal@gmail.com</p>
            </div>
          </div>
          <div class="d-flex">
            <h4 class="fa fa-phone-alt text-primary"></h4>
            <div class="pl-3">
              <h5 class="text-white">Phone</h5>
              <p>02-997731725</p>
            </div>
          </div>
        </div>
         {{-- <div class="col-lg-3 col-md-6 mb-5">
          <h3 class="text-primary mb-4">Newsletter</h3>
           <form action="">
            <div class="form-group">
              <input
                type="text"
                class="form-control border-0 py-4"
                placeholder="Your Name"
                required="required"
              />
            </div>
            <div class="form-group">
              <input
                type="email"
                class="form-control border-0 py-4"
                placeholder="Your Email"
                required="required"
              />
            </div>
            <div>
              <button
                class="btn btn-primary btn-block border-0 py-3"
                type="submit"
              >
                Submit Now
              </button>
            </div>
          </form>
          
        </div> --}}
        
      </div>
      <div
        class="container-fluid pt-5"
        style="border-top: 1px solid rgba(23, 162, 184, 0.2) ;"
      >
        <p class="m-0 text-center text-white">
          &copy;
          All Rights Reserved.
      </div>
    </div>
    <!-- Footer End -->

    <!-- Back to Top -->
    <a href="#" class="btn btn-primary p-3 back-to-top"
      ><i class="fa fa-angle-double-up"></i
    ></a>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('frontend') }}/assets/lib/easing/easing.min.js"></script>
    <script src="{{ asset('frontend') }}/assets/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="{{ asset('frontend') }}/assets/lib/isotope/isotope.pkgd.min.js"></script>
    <script src=" {{ asset('frontend') }}/assets/lib/lightbox/js/lightbox.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="{{ asset('frontend') }}/assets/mail/jqBootstrapValidation.min.js"></script>
    <script src="{{ asset('frontend') }}/assets/mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('frontend') }}/assets/js/main.js"></script>
  </body>
</html>
