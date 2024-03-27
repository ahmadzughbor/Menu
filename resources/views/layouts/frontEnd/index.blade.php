<!DOCTYPE html>
<html lang="en">
@php
$assets = asset('frontEnd');
@endphp

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>{{__('AppTitle')}}</title>
    <meta content="Abu Al Saeed sweets" name="description">
    <meta content="Abu Al Saeed sweets" name="keywords">

    <!-- Favicons -->

    <link href="{{asset('frontEnd/assets/img/logo.png')}}" rel="icon">
    <link href="{{asset('frontEnd/assets/img/logo.png')}}" rel="apple-touch-icon">

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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/css/nice-select.min.css" integrity="sha512-CruCP+TD3yXzlvvijET8wV5WxxEh5H8P4cmz0RFbKK6FlZ2sYl3AEsKlLPHbniXKSrDdFewhbmBK5skbdsASbQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />


    @if(app()->getLocale() == 'ar')
    <link href="{{ $assets }}/assets/css/style.rtl.css" rel="stylesheet">

    @endif
    <link href="{{ $assets }}/assets/css/main.css" rel="stylesheet">

    <!-- Template Main CSS File -->

</head>

<body class="page-portfolio">

    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <div class="breadcrumbs d-flex align-items-center" style="background-image: url({{asset('storage/images/' . $settings->background_image)}});">
            <div class="container position-relative text-center">
                <img src="{{asset('storage/images/' . $settings->app_logo)}}" alt="">
                <div class="row justify-content-center">
                    <div class="col-md-2 col-8">
                        <div class="nice-select w-100 form-control" tabindex="0">
                            <span class="current"> Choose a language </span>
                            <ul class="list">
                                <a href="{{route('frontend.index',[
                                    'locale'=> 'ar' 
                                    ])}}">
                                    <li data-value="" class="option ind li active"> Arabic </li>
                                </a>
                                <a href="{{route('frontend.index',[
                                    'locale'=> 'en' 
                                    ])}}">
                                    <li data-value="" class="option ind li active"> English </li>
                                </a>
                                <a href="{{route('frontend.index',[
                                    'locale'=> 'hb' 
                                    ])}}">
                                    <li data-value="" class="option ind li active"> Hebrew </li>
                                </a>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- End Breadcrumbs -->

        <!-- ======= Portfolio Section ======= -->
        <section class=" py-5 ">
            <div class="container" data-aos="fade-up">
                <div class="section-title">
                   
                </div>


                <div class="row justify-content-center my-5 ">
                    <div class="col-md-4 col-10">
                        <div class="text-center">
                            <a href="{{route('menu')}}" class="navigate-to-menu">{{$settings->getTranslation('navigate_menu', app()->getLocale())}}</a>
                            <!-- <a href="menu.html" class="navigate-to-menu-img">الانتقال الى المنيو</a> -->
                        </div>
                    </div>
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
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.0/dist/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/js/jquery.nice-select.min.js" integrity="sha512-NqYds8su6jivy1/WLoW8x1tZMRD7/1ZfhWG/jcRQLOzV1k1rIODCpMgoBnar5QXshKJGV7vi0LXLNXPoFsM5Zg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $(document).ready(function() {
            $('select').niceSelect();
        });
    </script>

    <!-- Template Main JS File -->
    <script src="{{ $assets }}/assets/js/main.js"></script>

</body>

</html>