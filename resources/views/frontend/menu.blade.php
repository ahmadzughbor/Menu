<!DOCTYPE html>
<html lang="en">
@php
$assets = asset('frontEnd');
@endphp

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>حلويات ابو السعيد المختار</title>
  <meta content="حلويات ابو السعيد المختار" name="description">
  <meta content="حلويات ابو السعيد المختار" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/logo.png" rel="icon">
  <link href="assets/img/logo.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Raleway:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ $assets }}/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="{{ $assets }}/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="{{ $assets }}/assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="{{ $assets }}/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="{{ $assets }}/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="{{ $assets }}/assets/vendor/remixicon/remixicon.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ $assets }}/assets/css/main.css" rel="stylesheet">

</head>

<body class="page-portfolio">

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs d-flex align-items-center" style="background-image: url('{{asset('storage/images/' . $settings->background_image)}}');">
      <div class="container position-relative d-flex flex-column align-items-center">

        <img src="{{ $assets }}/assets/img/logo.png" alt>
      </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio pt-5">
      @yield('content')
      <div class="container" data-aos="fade-up">
        <div class="section-title">
          <span>{{__('MENU')}}</span>
          <h2>{{__('MENU')}}</h2>
        </div>
        <div class="portfolio-isotope" data-portfolio-filter="*" data-portfolio-layout="masonry" data-portfolio-sort="original-order">

          <div class="row gy-4 portfolio-container" data-aos="fade-up" data-aos-delay="300">
            @foreach($items as $item )
            <div class="col-lg-4 col-md-6 portfolio-item">
              @foreach($item->uploads as $photo)
              <a href="{{asset('storage/images/' .$photo->path)}}" data-gallery="{{$item->id}}" class="glightbox preview-link">
                  @endforeach
                  <img src="{{asset('storage/images/' . $item->cover)}}" class="img-fluid" alt><!-- cover img -->
                  <div class="portfolio-info">
                    <h4>{{$item->getTranslation('title', app()->getLocale())}}</h4>
                    <p>{{$item->getTranslation('description',  app()->getLocale())}}</p>
                    <!-- <h4>حلويات ساخنة</h4>
                  <p>حلويات دافئة ولذيذة ترضي الحواس.</p> -->
                  </div>
                </a>
            </div><!-- End Portfolio Item -->
            @endforeach


          </div><!-- End Portfolio Container -->

        </div>

      </div>
    </section><!-- End Portfolio Section -->

  </main><!-- End #main -->

  @include('layouts.frontEnd.footer')


  <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="{{ $assets }}/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="{{ $assets }}/assets/vendor/aos/aos.js"></script>
  <script src="{{ $assets }}/assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="{{ $assets }}/assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="{{ $assets }}/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>

  <!-- Template Main JS File -->
  <script src="{{ $assets }}/assets/js/main.js"></script>

</body>

</html>