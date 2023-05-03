<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Syscon Solution LTD</title>
    <!-- favicons Icons -->
    <link rel="apple-touch-icon" sizes="180x180" href={{ URL::to('/siteasset/images/favicons/apple-touch-icon.png') }}>
    <link rel="icon" type="image/png')}} sizes="32x32" href={{ URL::to('/siteasset/images/favicons/favicon-32x32.png')}}>
    <link rel="icon" type="image/png')}} sizes="16x16" href={{ URL::to('/siteasset/images/favicons/favicon-16x16.png')}}>
    <link rel="manifest" href={{ URL::to('/siteasset/images/favicons/site.webmanifest') }}>
    <meta name="description" content="Izeetak HTML Template For IT Solutions Company">

    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
    <link href="../css2?family=Barlow:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href={{ URL::to('/siteasset/vendors/bootstrap/css/bootstrap.min.css') }}>

    <link rel="stylesheet" href={{ URL::to('/siteasset/vendors/animate/animate.min.css') }}>
    <link rel="stylesheet" href={{ URL::to('/siteasset/vendors/animate/custom-animate.css') }}>
    <link rel="stylesheet" href= {{ URL::to('/siteasset/vendors/fontawesome/css/all.min.css') }}>
    <link rel="stylesheet" href= {{ URL::to('/siteasset/vendors/jarallax/jarallax.css') }}>
    <link rel="stylesheet" href= {{ URL::to('/siteasset/vendors/jquery-magnific-popup/jquery.magnific-popup.css') }}>
    <link rel="stylesheet" href={{ URL::to('/siteasset/vendors/nouislider/nouislider.min.css') }}>
    <link rel="stylesheet" href={{ URL::to('/siteasset/vendors/nouislider/nouislider.pips.css') }}>
    <link rel="stylesheet" href={{ URL::to('/siteasset/vendors/odometer/odometer.min.css') }}>
    <link rel="stylesheet" href={{ URL::to('/siteasset/vendors/swiper/swiper.min.css') }}>
    <link rel="stylesheet" href={{ URL::to('/siteasset/vendors/izeetak-icons/style.css') }}>
    <link rel="stylesheet" href={{ URL::to('/siteasset/vendors/tiny-slider/tiny-slider.min.css') }}>
    <link rel="stylesheet" href={{ URL::to('/siteasset/vendors/reey-font/stylesheet.css') }}>
    <link rel="stylesheet" href={{ URL::to('/siteasset/vendors/owl-carousel/owl.carousel.min.css') }}>
    <link rel="stylesheet" href={{ URL::to('/siteasset/vendors/owl-carousel/owl.theme.default.min.css') }}>
    <link rel="stylesheet" href={{ URL::to('/siteasset/vendors/twentytwenty/twentytwenty.css') }}>
    <link rel="stylesheet" href={{ URL::to('/siteasset/vendors/bxslider/jquery.bxslider.css') }}>
    <link rel="stylesheet" href={{ URL::to('/siteasset/vendors/bootstrap-select/css/bootstrap-select.min.css') }}>
    <link rel="stylesheet" href={{ URL::to('/siteasset/vendors/vegas/vegas.min.css') }}>
    <link rel="stylesheet" href={{ URL::to('/siteasset/vendors/jquery-ui/jquery-ui.css') }}>
    <link rel="stylesheet" href={{ URL::to('/siteasset/vendors/timepicker/timePicker.css') }}>

    <!-- template styles -->
   <link rel="stylesheet" href={{ URL::to('/siteasset/css/izeetak.css')}}>
    <link rel="stylesheet" href={{ URL::to('/siteasset/css/izeetak-responsive.css')}}>
</head>

<body>
    {{-- <div class="preloader">
        <img class="preloader__image" width="60" src={{ asset('siteasset/images/loader.png') }} alt="">
    </div> --}}
    <!-- /.preloader -->
    <div class="page-wrapper">

        @include("layout.site.navbar")
        {{-- @include("layout.erp.mainsidebar") --}}

      <!-- /.stricky-header -->

       <!-- Page Content -->
       {{-- @yield('sitepage') --}}

        <!--Main Slider Start-->
        <section class="main-slider">
            <div class="swiper-container thm-swiper__slider" data-swiper-options='{"slidesPerView": 1, "loop": true,
                        "effect": "fade",
                        "pagination": {
                            "el": "#main-slider-pagination",
                            "type": "bullets",
                            "clickable": true
                        },
                        "navigation": {
                            "nextEl": "#main-slider__swiper-button-next",
                            "prevEl": "#main-slider__swiper-button-prev"
                        },
                        "autoplay": {
                            "delay": 5000
                        }}'>
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="image-layer" style="background-image: url({{ asset('siteasset/images/backgrounds/main-slider-1-1.jpg') }});">
                        </div>
                        <div class="image-layer-overlay"></div>
                        <!-- /.image-layer -->
                        <div class="main-slider-shape-1"><img src={{ asset('siteasset/images/shapes/main-slider-shape-1.png') }} alt="">
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-8">
                                    <div class="main-slider__content">
                                        <h2>Better Solution at <br> Your Fingertips</h2>
                                        <p>We’ve One Mission to be the Best IT Software Company in UK</p>
                                        <a href="about.html" class="thm-btn">Discover More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="image-layer" style="background-image: url({{ asset('siteasset/images/backgrounds/main-slider-1-2.jpg') }});">
                        </div>
                        <div class="image-layer-overlay"></div>
                        <!-- /.image-layer -->
                        <div class="main-slider-shape-1"><img src={{ asset('siteasset/images/shapes/main-slider-shape-1.png') }}  alt="">
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-8">
                                    <div class="main-slider__content">
                                        <h2>Better Solution at <br> Your Fingertips</h2>
                                        <p>We’ve One Mission to be the Best IT Software Company in UK</p>
                                        <a href="about.html" class="thm-btn">Discover More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="image-layer" style="background-image: url({{ asset('siteasset/images/backgrounds/main-slider-1-3.jpg') }});">
                        </div>
                        <div class="image-layer-overlay"></div>
                        <!-- /.image-layer -->
                        <div class="main-slider-shape-1"><img src={{ asset('siteasset/images/shapes/main-slider-shape-1.png') }} alt="">
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-8">
                                    <div class="main-slider__content">
                                        <h2>Better Solution at <br> Your Fingertips</h2>
                                        <p>We’ve One Mission to be the Best IT Software Company in UK</p>
                                        <a href="about.html" class="thm-btn">Discover More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- If we need navigation buttons -->
                <div class="swiper-pagination" id="main-slider-pagination"></div>
                <div class="main-slider__nav">
                    <div class="swiper-button-prev" id="main-slider__swiper-button-next"><i class="icon-right-arrow icon-left-arrow"></i>
                    </div>
                    <div class="swiper-button-next" id="main-slider__swiper-button-prev"><i class="icon-right-arrow"></i>
                    </div>
                </div>
            </div>
        </section>
        <!--Main Slider End-->

        <!--Brand One Start-->
        <section class="brand-one">
            <div class="container">
                <div class="thm-swiper__slider swiper-container" data-swiper-options='{"spaceBetween": 100, "slidesPerView": 5, "autoplay": { "delay": 5000 }, "breakpoints": {
                    "0": {
                        "spaceBetween": 30,
                        "slidesPerView": 2
                    },
                    "375": {
                        "spaceBetween": 30,
                        "slidesPerView": 2
                    },
                    "575": {
                        "spaceBetween": 30,
                        "slidesPerView": 3
                    },
                    "767": {
                        "spaceBetween": 50,
                        "slidesPerView": 4
                    },
                    "991": {
                        "spaceBetween": 50,
                        "slidesPerView": 5
                    },
                    "1199": {
                        "spaceBetween": 100,
                        "slidesPerView": 6
                    }
                }}'>
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <img src={{ asset('siteasset/images/brand/brand-1-1.png') }} alt="">
                        </div><!-- /.swiper-slide -->
                        <div class="swiper-slide">
                            <img src={{ asset('siteasset/images/brand/brand-1-2.png') }} alt="">
                        </div><!-- /.swiper-slide -->
                        <div class="swiper-slide">
                            <img src={{ asset('siteasset/images/brand/brand-1-3.png') }} alt="">
                        </div><!-- /.swiper-slide -->
                        <div class="swiper-slide">
                            <img src={{ asset('siteasset/images/brand/brand-1-4.png') }} alt="">
                        </div><!-- /.swiper-slide -->
                        <div class="swiper-slide">
                            <img src={{ asset('siteasset/images/brand/brand-1-5.png') }} alt="">
                        </div><!-- /.swiper-slide -->
                        <div class="swiper-slide">
                            <img src={{ asset('siteasset/images/brand/brand-1-6.png') }} alt="">
                        </div><!-- /.swiper-slide -->
                        <div class="swiper-slide">
                            <img src={{ asset('siteasset/images/brand/brand-1-1.png') }} alt="">
                        </div><!-- /.swiper-slide -->
                        <div class="swiper-slide">
                            <img src={{ asset('siteasset/images/brand/brand-1-2.png') }} alt="">
                        </div><!-- /.swiper-slide -->
                        <div class="swiper-slide">
                            <img src={{ asset('siteasset/images/brand/brand-1-3.png') }} alt="">
                        </div><!-- /.swiper-slide -->
                        <div class="swiper-slide">
                            <img src={{ asset('siteasset/images/brand/brand-1-4.png') }} alt="">
                        </div><!-- /.swiper-slide -->
                        <div class="swiper-slide">
                            <img src={{ asset('siteasset/images/brand/brand-1-5.png') }} alt="">
                        </div><!-- /.swiper-slide -->
                        <div class="swiper-slide">
                            <img src={{ asset('siteasset/images/brand/brand-1-6.png') }} alt="">
                        </div><!-- /.swiper-slide -->
                    </div>
                </div>
            </div>
        </section>
        <!--Brand One End-->

        <!--Feature One Start-->
        <section class="feature-one">
            <div class="container">
                <div class="feature-one__top">
                    <div class="row">
                        <div class="col-xl-4 col-lg-4 wow fadeInUp" data-wow-delay="100ms">
                            <!--Feature One Single-->
                            <div class="feature-one__single">
                                <div class="feature-one__icon">
                                    <span class="icon-innovation"></span>
                                </div>
                                <div class="feature-one__text">
                                    <h3>IT Management</h3>
                                    <p>Lorem ipsum is simply of free text dolor.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 wow fadeInUp" data-wow-delay="200ms">
                            <!--Feature One Single-->
                            <div class="feature-one__single">
                                <div class="feature-one__icon">
                                    <span class="icon-cyber-security"></span>
                                </div>
                                <div class="feature-one__text">
                                    <h3>Cyber Security</h3>
                                    <p>Lorem ipsum is simply of free text dolor.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 wow fadeInUp" data-wow-delay="300ms">
                            <!--Feature One Single-->
                            <div class="feature-one__single">
                                <div class="feature-one__icon">
                                    <span class="icon-webpage"></span>
                                </div>
                                <div class="feature-one__text">
                                    <h3>PC Computing</h3>
                                    <p>Lorem ipsum is simply of free text dolor.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="feature-one__bottom">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="feature-one__bottom-inner">
                                <p>IT services built specifically for your business. <a href="services.html">Find Your
                                        Solution</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--Feature One End-->

        <!--About One Start-->
        <section class="about-one">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6">
                        <div class="about-one__left wow slideInLeft" data-wow-delay="100ms" data-wow-duration="2500ms">
                            <div class="about-one__img-box">
                                <div class="about-one__img">
                                    <img src={{ asset('siteasset/images/resources/about-one-img-1.jpg') }} alt="">
                                </div>
                                <div class="about-one__small-img">
                                    <img src={{ asset('siteasset/images/resources/about-one-small-img.jpg') }} alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="about-one__right">
                            <div class="section-title text-left">
                                <span class="section-title__tagline">Get to Know About us</span>
                                <h2 class="section-title__title">The Leading IT Solutions Company & Your Partner for
                                    Innovations</h2>
                            </div>
                            <p class="about-one__text">There are many variations of passages of Lorem Ipsum available,
                                but the majority have suffered alteration in some form, by injected humour, or
                                randomised words which don't look even.</p>
                            <div class="about-one__points-box">
                                <ul class="about-one__points list-unstyled">
                                    <li>
                                        <div class="icon">
                                            <span class="icon-check"></span>
                                        </div>
                                        <div class="text">
                                            <p>Take a look at our round up of the best shows</p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="icon">
                                            <span class="icon-check"></span>
                                        </div>
                                        <div class="text">
                                            <p>It has survived not only five centuries</p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="icon">
                                            <span class="icon-check"></span>
                                        </div>
                                        <div class="text">
                                            <p>Lorem Ipsum has been the ndustry standard dummy text</p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="about-one__it-solutions">
                                <div class="about-one__it-solutions-icon">
                                    <span class="icon-computer"></span>
                                </div>
                                <div class="about-one__it-solutions-text-box">
                                    <p class="about-one__it-solutions-text">We Run all Kinds of IT Solutions & Services
                                        <br> that Vow your Success</p>
                                </div>
                            </div>
                            <a href="about.html" class="about-one__btn thm-btn">Discover More</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--About One End-->

        <!--Services One Start-->
        <section class="services-one">
            <div class="container">
                <div class="section-title text-center">
                    <span class="section-title__tagline">Wide Range of Services</span>
                    <h2 class="section-title__title">What We’re Offering</h2>
                </div>
                <div class="row">
                    <div class="col-xl-4 col-lg-4 wow fadeInLeft" data-wow-delay="100ms">
                        <!--Services One Single-->
                        <div class="services-one__single">
                            <div class="services-one__icon">
                                <span class="icon-conversation"></span>
                            </div>
                            <h3 class="services-one__title">
                                <a href="it-consultancy.html">IT Consulting <br> Services</a>
                            </h3>
                            <p class="services-one__text">There are many variations of passages of lorem im available,
                                but majority suffered.</p>
                            <div class="services-one__arrow">
                                <a href="it-consultancy.html"><span class="icon-right-arrow"></span></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 wow fadeInUp" data-wow-delay="200ms">
                        <!--Services One Single-->
                        <div class="services-one__single">
                            <div class="services-one__icon">
                                <span class="icon-app-development"></span>
                            </div>
                            <h3 class="services-one__title">
                                <a href="custom-software.html">Software Dev <br> Services</a>
                            </h3>
                            <p class="services-one__text">There are many variations of passages of lorem im available,
                                but majority suffered.</p>
                            <div class="services-one__arrow">
                                <a href="custom-software.html"><span class="icon-right-arrow"></span></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 wow fadeInRight" data-wow-delay="100ms">
                        <!--Services One Single-->
                        <div class="services-one__single">
                            <div class="services-one__icon">
                                <span class="icon-cloud-storage"></span>
                            </div>
                            <h3 class="services-one__title">
                                <a href="cloud-computing.html">Cloud Computing <br> Services</a>
                            </h3>
                            <p class="services-one__text">There are many variations of passages of lorem im available,
                                but majority suffered.</p>
                            <div class="services-one__arrow">
                                <a href="cloud-computing.html"><span class="icon-right-arrow"></span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--Services One End-->

        <!--Share The Joy Start-->
        <section class="share-the-joy">
            <div class="share-the-joy__inner">
                <div class="share-the-joy-map" style="background-image: url(assets/images/shapes/share-the-joy-map.png)"></div>
                <div class="container">
                    <div class="row">
                        <div class="col-xl-7">
                            <div class="share-the-joy__left">
                                <h2 class="share-the-joy__title">Share the Joy of Achieving Glorious Moments & Climbing
                                    Up the Top</h2>
                                <a href="#" class="share-the-joy__btn thm-btn">Discover More</a>
                                <div class="share-the-joy__shape-1">
                                    <img src={{ asset('siteasset/images/shapes/share-the-joy-shape-1.png')}} alt="">
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-5">
                            <div class="share-the-joy__right">
                                <div class="share-the-joy__img-box">
                                    <div class="share-the-joy__img wow fadeInRight" data-wow-duration="1500ms">
                                        <img src={{ asset('siteasset/images/resources/share-the-joy-img-1.png')}} alt="" class="float-bob-2">
                                    </div>
                                    <div class="share-the-joy__trusted wow fadeIn" data-wow-duration="1500ms">
                                        <span class="icon-social-media"></span>
                                        <div class="share-the-joy__trusted__content">
                                            <p>Trusted by</p>
                                            <h3 class="odometer" data-count="8800">00</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--Share The Joy End-->

        <!--Project One Start-->
        <section class="project-one">
            <div class="container">
                <div class="section-title text-center">
                    <span class="section-title__tagline">Our Case Studies</span>
                    <h2 class="section-title__title">Explore Projects</h2>
                </div>
                <div class="project-one__carousel owl-theme owl-carousel">
                    <!--Project One Single-->
                    <div class="project-one__single">
                        <div class="project-one__img">
                            <img src={{ asset('siteasset/images/resources/project-one-img-1.jpg')}} alt="">
                        </div>
                        <div class="project-one__content">
                            <p class="project-one__tagline">Cloud Services</p>
                            <h2 class="project-one__title"><a href="project-details.html">Research & Energy</a></h2>
                            <div class="project-one__arrow">
                                <a href="project-details.html"><span class="icon-right-arrow"></span></a>
                            </div>
                        </div>
                    </div>
                    <!--Project One Single-->
                    <div class="project-one__single">
                        <div class="project-one__img">
                            <img src={{ asset('siteasset/images/resources/project-one-img-2.jpg')}} alt="">
                        </div>
                        <div class="project-one__content">
                            <p class="project-one__tagline">Cloud Services</p>
                            <h2 class="project-one__title"><a href="project-details.html">Research & Energy</a></h2>
                            <div class="project-one__arrow">
                                <a href="project-details.html"><span class="icon-right-arrow"></span></a>
                            </div>
                        </div>
                    </div>
                    <!--Project One Single-->
                    <div class="project-one__single">
                        <div class="project-one__img">
                            <img src={{ asset('siteasset/images/resources/project-one-img-3.jpg')}} alt="">
                        </div>
                        <div class="project-one__content">
                            <p class="project-one__tagline">Cloud Services</p>
                            <h2 class="project-one__title"><a href="project-details.html">Research & Energy</a></h2>
                            <div class="project-one__arrow">
                                <a href="project-details.html"><span class="icon-right-arrow"></span></a>
                            </div>
                        </div>
                    </div>
                    <!--Project One Single-->
                    <div class="project-one__single">
                        <div class="project-one__img">
                            <img src={{ asset('siteasset/images/resources/project-one-img-4.jpg')}} alt="">
                        </div>
                        <div class="project-one__content">
                            <p class="project-one__tagline">Cloud Services</p>
                            <h2 class="project-one__title"><a href="project-details.html">Research & Energy</a></h2>
                            <div class="project-one__arrow">
                                <a href="project-details.html"><span class="icon-right-arrow"></span></a>
                            </div>
                        </div>
                    </div>
                    <!--Project One Single-->
                    <div class="project-one__single">
                        <div class="project-one__img">
                            <img src={{ asset('siteasset/images/resources/project-one-img-1.jpg')}} alt="">
                        </div>
                        <div class="project-one__content">
                            <p class="project-one__tagline">Cloud Services</p>
                            <h2 class="project-one__title"><a href="project-details.html">Research & Energy</a></h2>
                            <div class="project-one__arrow">
                                <a href="project-details.html"><span class="icon-right-arrow"></span></a>
                            </div>
                        </div>
                    </div>
                    <!--Project One Single-->
                    <div class="project-one__single">
                        <div class="project-one__img">
                            <img src={{ asset('siteasset/images/resources/project-one-img-2.jpg')}} alt="">
                        </div>
                        <div class="project-one__content">
                            <p class="project-one__tagline">Cloud Services</p>
                            <h2 class="project-one__title"><a href="project-details.html">Research & Energy</a></h2>
                            <div class="project-one__arrow">
                                <a href="project-details.html"><span class="icon-right-arrow"></span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--Project One End-->

        <!--Improve One Start-->
        <section class="improve-one">
            <div class="improve-one-bg jarallax" data-jarallax="" data-speed="0.2" data-imgposition="50% 0%" style="background-image: url(assets/images/backgrounds/improve-one-bg.jpg)"></div>
            <div class="improve-one-bg-overly"></div>
            <div class="container">
                <div class="row">
                    <div class="col-xl-6">
                        <div class="improve-one__left wow slideInLeft" data-wow-delay="100ms" data-wow-duration="2500ms">
                            <div class="improve-one__img-box">
                                <div class="improve-one__img">
                                    <img src={{ asset('siteasset/images/resources/improve-one-img-1.jpg')}} alt="">
                                </div>
                                <div class="improve-one__project-complete">
                                    <p>8008 Projects are completed</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="improve-one__right">
                            <div class="section-title text-left">
                                <span class="section-title__tagline">IT Technology</span>
                                <h2 class="section-title__title">Improve and Innovate with Tech Trends</h2>
                            </div>
                            <ul class="list-unstyled improve-one__points">
                                <li>
                                    <div class="icon">
                                        <span class="icon-artificial-intelligence"></span>
                                    </div>
                                    <div class="text">
                                        <h3>Artificial Intelligence</h3>
                                        <p>There are many variations of passages of available but the majority have
                                            suffered alteration in some form injected </p>
                                    </div>
                                </li>
                                <li>
                                    <div class="icon">
                                        <span class="icon-ai"></span>
                                    </div>
                                    <div class="text">
                                        <h3>Augmented Reality</h3>
                                        <p>There are many variations of passages of available but the majority have
                                            suffered alteration in some form injected </p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--Improve One End-->

        <!--Testimonial One Start-->
        <section class="testimonial-one">
            <div id="particles-js"></div>
            <div class="container">
                <div class="row">
                    <div class="col-xl-4 col-lg-5">
                        <div class="testimonial-one__left">
                            <div class="section-title text-left">
                                <span class="section-title__tagline">Customers Feedbacks</span>
                                <h2 class="section-title__title">What They’re Talking About Company</h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-8 col-lg-7">
                        <div class="testimonial-one__right">
                            <div class="testimonial-one__carousel owl-theme owl-carousel">
                                <!--Testimonial One Single-->
                                <div class="testimonial-one__single">
                                    <div class="testimonial-one__client-info">
                                        <div class="testimonial-one__client-img">
                                            <img src={{ asset('siteasset/images/testimonial/testimonial-one-img-1.png')}} alt="">
                                        </div>
                                        <div class="testimonial-one__client-details">
                                            <h5 class="testimonial-one__client-name">Kevin Martin</h5>
                                            <p class="testimonial-one__client-title">Customer</p>
                                        </div>
                                    </div>
                                    <p class="testimonial-one__text">Lorem ipsum is simply free text dolor sit amet,
                                        consectetur notted adipisicing elit sed do eiusmod tempor incididunt ut labore
                                        et dolore text.</p>
                                    <div class="testimonial-one__quote">
                                        <span class="icon-right-quote"></span>
                                    </div>
                                </div>
                                <!--Testimonial One Single-->
                                <div class="testimonial-one__single">
                                    <div class="testimonial-one__client-info">
                                        <div class="testimonial-one__client-img">
                                            <img src={{ asset('siteasset/images/testimonial/testimonial-one-img-2.png')}} alt="">
                                        </div>
                                        <div class="testimonial-one__client-details">
                                            <h5 class="testimonial-one__client-name">Christine Eve</h5>
                                            <p class="testimonial-one__client-title">Customer</p>
                                        </div>
                                    </div>
                                    <p class="testimonial-one__text">Lorem ipsum is simply free text dolor sit amet,
                                        consectetur notted adipisicing elit sed do eiusmod tempor incididunt ut labore
                                        et dolore text.</p>
                                    <div class="testimonial-one__quote">
                                        <span class="icon-right-quote"></span>
                                    </div>
                                </div>
                                <!--Testimonial One Single-->
                                <div class="testimonial-one__single">
                                    <div class="testimonial-one__client-info">
                                        <div class="testimonial-one__client-img">
                                            <img src={{ asset('siteasset/images/testimonial/testimonial-one-img-3.png')}} alt="">
                                        </div>
                                        <div class="testimonial-one__client-details">
                                            <h5 class="testimonial-one__client-name">Jon Smith</h5>
                                            <p class="testimonial-one__client-title">Customer</p>
                                        </div>
                                    </div>
                                    <p class="testimonial-one__text">Lorem ipsum is simply free text dolor sit amet,
                                        consectetur notted adipisicing elit sed do eiusmod tempor incididunt ut labore
                                        et dolore text.</p>
                                    <div class="testimonial-one__quote">
                                        <span class="icon-right-quote"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--Testimonial One End-->

        <!--News One Start-->
        <section class="news-one">
            <div class="container">
                <div class="section-title text-center">
                    <span class="section-title__tagline">Direct from the Blog</span>
                    <h2 class="section-title__title">News & Articles</h2>
                </div>
                <div class="row">
                    <div class="col-xl-4 col-lg-4 wow fadeInLeft" data-wow-delay="100ms">
                        <!--News One Single-->
                        <div class="news-one__single">
                            <div class="news-one__img">
                                <img src={{ asset('siteasset/images/blog/news-one-img-1.jpg')}} alt="">
                                <a href="news-details.html">
                                    <span class="news-one__plus"></span>
                                </a>
                                <div class="news-one__date-box">
                                    <p>20 <br> Aug</p>
                                </div>
                            </div>
                            <div class="news-one__content">
                                <ul class="list-unstyled news-one__meta">
                                    <li><a href="news-details.html"><i class="far fa-user-circle"></i> by admin</a></li>
                                    <li><a href="news-details.html"><i class="far fa-comments"></i> 2 Comments</a>
                                    </li>
                                </ul>
                                <h3 class="news-one__title">
                                    <a href="news-details.html">What is Holding Back the IT Solution Industry?</a>
                                </h3>
                                <p class="news-one__text">Lorem ipsum is simply free text used by copytyping refreshing.
                                </p>
                                <div class="news-one__read-more">
                                    <a href="news-details.html" class="news-one__read-more-btn">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 wow fadeInUp" data-wow-delay="200ms">
                        <!--News One Single-->
                        <div class="news-one__single">
                            <div class="news-one__img">
                                <img src={{ asset('siteasset/images/blog/news-one-img-2.jpg')}} alt="">
                                <a href="news-details.html">
                                    <span class="news-one__plus"></span>
                                </a>
                                <div class="news-one__date-box">
                                    <p>20 <br> Aug</p>
                                </div>
                            </div>
                            <div class="news-one__content">
                                <ul class="list-unstyled news-one__meta">
                                    <li><a href="news-details.html"><i class="far fa-user-circle"></i> by admin</a></li>
                                    <li><a href="news-details.html"><i class="far fa-comments"></i> 2 Comments</a>
                                    </li>
                                </ul>
                                <h3 class="news-one__title">
                                    <a href="news-details.html">Leverage agile frameworks to provide a</a>
                                </h3>
                                <p class="news-one__text">Lorem ipsum is simply free text used by copytyping refreshing.
                                </p>
                                <div class="news-one__read-more">
                                    <a href="news-details.html" class="news-one__read-more-btn">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 wow fadeInRight" data-wow-delay="300ms">
                        <!--News One Single-->
                        <div class="news-one__single">
                            <div class="news-one__img">
                                <img src={{ asset('siteasset/images/blog/news-one-img-3.jpg')}} alt="">
                                <a href="news-details.html">
                                    <span class="news-one__plus"></span>
                                </a>
                                <div class="news-one__date-box">
                                    <p>20 <br> Aug</p>
                                </div>
                            </div>
                            <div class="news-one__content">
                                <ul class="list-unstyled news-one__meta">
                                    <li><a href="news-details.html"><i class="far fa-user-circle"></i> by admin</a></li>
                                    <li><a href="news-details.html"><i class="far fa-comments"></i> 2 Comments</a>
                                    </li>
                                </ul>
                                <h3 class="news-one__title">
                                    <a href="news-details.html">Bring to the table win-win survival strategies.</a>
                                </h3>
                                <p class="news-one__text">Lorem ipsum is simply free text used by copytyping refreshing.
                                </p>
                                <div class="news-one__read-more">
                                    <a href="news-details.html" class="news-one__read-more-btn">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--News One End-->

        <!--CTA One Start-->
        <section class="cta-one">
            <div class="cta-one__container">
                <div class="cta-one-bg" style="background-image: url({{ asset('siteasset/images/backgrounds/cta-one-bg.jpg')}})"></div>
                <div class="cta-one-overly"></div>
                <div class="container">
                    <div class="col-lg-12">
                        <div class="cta-one__inner">
                            <p class="cta-one__sub-title">Let’s Get Started Now</p>
                            <h2 class="cta-one__title">We’ll Help You Overcome Your <br> Technology Challenges</h2>
                            <a href="contact.html" class="cta-one__btn thm-btn">Discover More</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--CTA One End-->

        <!--Site Footer One Start-->
        @include("layout.site.footer")

        <!--Site Footer One End-->


    </div><!-- /.page-wrapper -->


    <div class="mobile-nav__wrapper">
        <div class="mobile-nav__overlay mobile-nav__toggler"></div>
        <!-- /.mobile-nav__overlay -->
        <div class="mobile-nav__content">
            <span class="mobile-nav__close mobile-nav__toggler"><i class="fa fa-times"></i></span>

            <div class="logo-box">
                <a href="index.html" aria-label="logo image"><img src={{ asset('siteasset/images/resources/footer-logo.png')}} width="155" alt=""></a>
            </div>
            <!-- /.logo-box -->
            <div class="mobile-nav__container"></div>
            <!-- /.mobile-nav__container -->

            <ul class="mobile-nav__contact list-unstyled">
                <li>
                    <i class="fa fa-envelope"></i>
                    <a href="mailto:needhelp@packageName__.com">needhelp@izeetak.com</a>
                </li>
                <li>
                    <i class="fa fa-phone-alt"></i>
                    <a href="tel:666-888-0000">666 888 0000</a>
                </li>
            </ul><!-- /.mobile-nav__contact -->
            <div class="mobile-nav__top">
                <div class="mobile-nav__social">
                    <a href="#" class="fab fa-twitter"></a>
                    <a href="#" class="fab fa-facebook-square"></a>
                    <a href="#" class="fab fa-pinterest-p"></a>
                    <a href="#" class="fab fa-instagram"></a>
                </div><!-- /.mobile-nav__social -->
            </div><!-- /.mobile-nav__top -->



        </div>
        <!-- /.mobile-nav__content -->
    </div>
    <!-- /.mobile-nav__wrapper -->

    <div class="search-popup">
        <div class="search-popup__overlay search-toggler"></div>
        <!-- /.search-popup__overlay -->
        <div class="search-popup__content">
            <form action="#">
                <label for="search" class="sr-only">search here</label><!-- /.sr-only -->
                <input type="text" id="search" placeholder="Search Here...">
                <button type="submit" aria-label="search submit" class="thm-btn">
                    <i class="icon-magnifying-glass"></i>
                </button>
            </form>
        </div>
        <!-- /.search-popup__content -->
    </div>
    <!-- /.search-popup -->

    <a href="#" data-target="html" class="scroll-to-target scroll-to-top"><i class="fa fa-angle-up"></i></a>


    <script src={{ URL::to('/siteasset/vendors/jquery/jquery-3.6.0.min.js') }}></script>
    <script src={{ URL::to('/siteasset/vendors/bootstrap/js/bootstrap.bundle.min.js') }}></script>
    <script src={{ URL::to('/siteasset/vendors/jarallax/jarallax.min.js') }}></script>
    <script src={{ URL::to('/siteasset/vendors/jquery-ajaxchimp/jquery.ajaxchimp.min.js') }}></script>
    <script src={{ URL::to('/siteasset/vendors/jquery-appear/jquery.appear.min.js') }}></script>
    <script src={{ URL::to('/siteasset/vendors/jquery-circle-progress/jquery.circle-progress.min.js') }}></script>
    <script src={{ URL::to('/siteasset/vendors/jquery-magnific-popup/jquery.magnific-popup.min.js') }}></script>
    <script src={{ URL::to('/siteasset/vendors/jquery-validate/jquery.validate.min.js') }}></script>
    <script src={{ URL::to('/siteasset/vendors/nouislider/nouislider.min.js') }}></script>
    <script src={{ URL::to('/siteasset/vendors/odometer/odometer.min.js') }}></script>
    <script src={{ URL::to('/siteasset/vendors/swiper/swiper.min.js') }}></script>
    <script src={{ URL::to('/siteasset/vendors/tiny-slider/tiny-slider.min.js') }}></script>
    <script src={{ URL::to('/siteasset/vendors/wnumb/wNumb.min.js') }}></script>
    <script src={{ URL::to('/siteasset/vendors/wow/wow.js') }}></script>
    <script src={{ URL::to('/siteasset/vendors/isotope/isotope.js') }}></script>
    <script src={{ URL::to('/siteasset/vendors/countdown/countdown.min.js') }}></script>
    <script src={{ URL::to('/siteasset/vendors/owl-carousel/owl.carousel.min.js') }}></script>
    <script src={{ URL::to('/siteasset/vendors/twentytwenty/twentytwenty.js') }}></script>
    <script src={{ URL::to('/siteasset/vendors/twentytwenty/jquery.event.move.js') }}></script>
    <script src={{ URL::to('/siteasset/vendors/bxslider/jquery.bxslider.min.js') }}></script>
    <script src={{ URL::to('/siteasset/vendors/bootstrap-select/js/bootstrap-select.min.js') }}></script>
    <script src={{ URL::to('/siteasset/vendors/vegas/vegas.min.js') }}></script>
    <script src={{ URL::to('/siteasset/vendors/jquery-ui/jquery-ui.js') }}></script>
    <script src={{ URL::to('/siteasset/vendors/timepicker/timePicker.js') }}></script>
    <script src={{ URL::to('/siteasset/vendors/particles/particles.min.js') }}></script>
    <script src={{ URL::to('/siteasset/vendors/particles/particles-config.js') }}></script>


    <script src="../maps/api/js?key=AIzaSyATY4Rxc8jNvDpsK8ZetC7JyN4PFVYGCGM"></script>


    <!-- template js -->
    <script src={{ URL::to('/siteasset/js/izeetak.js') }}></script>
</body>

</html>
