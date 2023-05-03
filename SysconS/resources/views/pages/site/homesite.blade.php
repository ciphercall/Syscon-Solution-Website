@extends('layout.site.home')
@section('pagecontent')


<style>
    .box-title{
        margin-bottom: 1rem;
    text-align: center;

    }
    .box-ours{
        margin-bottom: 1rem;
    text-align: center;
    color: rgb(185, 238, 80);
        font-size: 55px;
        font-weight: 500;
    }
</style>
{{-- <h1 style="margin-top: 80px;"></h1> --}}
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
                                <h2>{{ __('message.syscon') }}
                                    {{-- Better Solution at <br> Your Fingertips --}}
                                </h2>
                                <p>{{ __('message.sysm') }}</p>
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
                                <h2>{{ __('message.syscon') }}</h2>
                                <p>{{ __('message.sysm') }}</p>
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
                                <h2>{{ __('message.syscon') }}</h2>
                                <p>{{ __('message.sysm') }}</p>
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
        <div class="thm-swiper__slider swiper-container" data-swiper-options='{"spaceBetween": 100, "slidesPerView": 3, "autoplay": { "delay": 5000 }, "breakpoints": {
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
        @foreach ($wbrands as $wbrand )


            <div class="swiper-wrapper">
                <div class="swiper-slide" >
                    <img src="{{asset('storage/filePhoto/b_logo')}}/{{$wbrand->b_logo}}" alt="">
                </div>
            </div>
        @endforeach

        </div>
    </div>
</section>
<!--Brand One End-->

<!--Feature One Start-->
<section class="feature-one">
    <div class="container">
        <div class="feature-one__top">
            <div class="row">
                <div class="box-title">
                    <span class="box-ours">{{ __('message.oservice') }}</span>




                </div>
                <div class="col-xl-4 col-lg-4 wow fadeInUp" data-wow-delay="200ms">
                    <!--Feature One Single-->
                    <div class="feature-one__single">

                        <div class="feature-one__text" style="text-align: center">
                            {{-- <div class="feature-one__icon"> --}}
                                <span style="width: 60px;height: 50px;"> <img src={{ asset('siteasset/svg/services-custom-software-development.svg') }} alt=""></span>
                            {{-- </div> --}}
                            <h3>{{ __('message.wsd') }}</h3>
                            {{-- <p>Lorem ipsum is simply of free text dolor.</p> --}}
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 wow fadeInUp" data-wow-delay="200ms">
                    <!--Feature One Single-->
                    <div class="feature-one__single">

                        <div class="feature-one__text" style="text-align: center">
                            {{-- <div class="feature-one__icon"> --}}
                                <span style="width: 60px;height: 50px;"> <img src={{ asset('siteasset/svg/services-outsourcing.svg') }} alt=""></span>
                            {{-- </div> --}}
                            <h3>{{ __('message.aivr') }}</h3>
                            {{-- <p>Lorem ipsum is simply of free text dolor.</p> --}}
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 wow fadeInUp" data-wow-delay="200ms">
                    <!--Feature One Single-->
                    <div class="feature-one__single">

                        <div class="feature-one__text" style="text-align: center">
                            {{-- <div class="feature-one__icon"> --}}
                                <span style="width: 60px;height: 50px;"> <img src={{ asset('siteasset/svg/services-web-application-development.svg') }} alt=""></span>
                            {{-- </div> --}}
                            <h3>{{ __('message.csd') }}</h3>
                            {{-- <p>Lorem ipsum is simply of free text dolor.</p> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="feature-one__top">
            <div class="row">
                <div class="col-xl-4 col-lg-4 wow fadeInUp" data-wow-delay="200ms">
                    <!--Feature One Single-->
                    <div class="feature-one__single">

                        <div class="feature-one__text" style="text-align: center">
                            {{-- <div class="feature-one__icon"> --}}
                                <span style="width: 60px;height: 50px;"> <img src={{ asset('siteasset/svg/services-software-product-development.svg') }} alt=""></span>
                            {{-- </div> --}}
                            <h3>{{ __('message.bsd') }}</h3>
                            {{-- <p>Lorem ipsum is simply of free text dolor.</p> --}}
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 wow fadeInUp" data-wow-delay="200ms">
                    <!--Feature One Single-->
                    <div class="feature-one__single">

                        <div class="feature-one__text" style="text-align: center">
                            {{-- <div class="feature-one__icon"> --}}
                                <span style="width: 60px;height: 50px;"> <img src={{ asset('siteasset/svg/services-cloud-migration.svg') }} alt=""></span>
                            {{-- </div> --}}
                            <h3>{{ __('message.smd') }}</h3>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 wow fadeInUp" data-wow-delay="200ms">
                    <!--Feature One Single-->
                    <div class="feature-one__single">

                        <div class="feature-one__text" style="text-align: center">
                            {{-- <div class="feature-one__icon"> --}}
                                <span style="width: 60px;height: 50px;"> <img src={{ asset('siteasset/svg/services-mobile-application-development.svg') }} alt=""></span>
                            {{-- </div> --}}
                            <h3>{{ __('message.sd') }}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="feature-one__top">
            <div class="row">
                <div class="col-xl-4 col-lg-4 wow fadeInUp" data-wow-delay="200ms">
                    <!--Feature One Single-->
                    <div class="feature-one__single">

                        <div class="feature-one__text" style="text-align: center">
                            {{-- <div class="feature-one__icon"> --}}
                                <span style="width: 60px;height: 50px;"> <img src={{ asset('siteasset/svg/services-offfshore-software-development1.svg') }} alt=""></span>
                            {{-- </div> --}}
                            <h3>{{ __('message.rs') }}</h3>
                            {{-- <p>Lorem ipsum is simply of free text dolor.</p> --}}
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 wow fadeInUp" data-wow-delay="200ms">
                    <!--Feature One Single-->
                    <div class="feature-one__single">

                        <div class="feature-one__text" style="text-align: center">
                            {{-- <div class="feature-one__icon"> --}}
                                <span style="width: 60px;height: 50px;"> <img src={{ asset('siteasset/svg/2.jpg') }} alt=""></span>
                            {{-- </div> --}}
                            <h3>{{ __('message.hpw') }}</h3>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 wow fadeInUp" data-wow-delay="200ms">
                    <!--Feature One Single-->
                    <div class="feature-one__single">

                        <div class="feature-one__text" style="text-align: center">
                            {{-- <div class="feature-one__icon"> --}}
                                <span style="width: 60px;height: 50px;"> <img src={{ asset('siteasset/svg/1.jpg') }} alt=""></span>
                            {{-- </div> --}}
                            <h3>{{ __('message.iosa') }}</h3>
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
                        <span class="section-title__tagline">{{ __('message.getto') }}</span>
                        <h2 class="section-title__title">{{ __('message.thelead') }}</h2>
                    </div>
                    <p class="about-one__text">{{ __('message.manyvari') }}</p>
                    <div class="about-one__points-box">
                        <ul class="about-one__points list-unstyled">
                            <li>
                                <div class="icon">
                                    <span class="icon-check"></span>
                                </div>
                                <div class="text">
                                    <p>{{ __('message.takealook') }}</p>
                                </div>
                            </li>
                            <li>
                                <div class="icon">
                                    <span class="icon-check"></span>
                                </div>
                                <div class="text">
                                    <p>{{ __('message.ithas') }}</p>
                                </div>
                            </li>
                            {{-- <li>
                                <div class="icon">
                                    <span class="icon-check"></span>
                                </div>
                                <div class="text">
                                    <p>Lorem Ipsum has been the ndustry standard dummy text</p>
                                </div>
                            </li> --}}
                        </ul>
                    </div>
                    <div class="about-one__it-solutions">
                        <div class="about-one__it-solutions-icon">
                            <span class="icon-computer"></span>
                        </div>
                        <div class="about-one__it-solutions-text-box">
                            <p class="about-one__it-solutions-text">{{ __('message.werun') }}
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
        <div class="share-the-joy-map" style="background-image: url({{ asset('siteasset/images/shapes/share-the-joy-map.png')}}"></div>
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
    <div class="improve-one-bg jarallax" data-jarallax="" data-speed="0.2" data-imgposition="50% 0%" style="background-image: url({{ asset('siteasset/images/backgrounds/improve-one-bg.jpg')}}"></div>
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
                        @foreach ($customers as $customer )

                        <div class="testimonial-one__single">
                            <div class="testimonial-one__client-info">
                                <div class="testimonial-one__client-img">
                                    <img src="{{asset('storage/filePhoto/thumbnail')}}/{{$customer->c_photo}}" alt="">
                                </div>
                                <div class="testimonial-one__client-details">
                                    <h5 class="testimonial-one__client-name">{{$customer->c_name}}</h5>
                                    <p class="testimonial-one__client-title">{{$customer->deg}}</p>
                                </div>
                            </div>
                            <p class="testimonial-one__text">{!! $customer->c_review !!}</p>
                            <div class="testimonial-one__quote">
                                <span class="icon-right-quote"></span>
                            </div>
                        </div>
                        @endforeach
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
<section class="brand-two">
    <div class="container">
        <div class="brand-two__inner">
            <div class="thm-swiper__slider swiper-container swiper-container-initialized swiper-container-horizontal" data-swiper-options="{&quot;spaceBetween&quot;: 100, &quot;slidesPerView&quot;: 5, &quot;autoplay&quot;: { &quot;delay&quot;: 5000 }, &quot;breakpoints&quot;: {
                &quot;0&quot;: {
                    &quot;spaceBetween&quot;: 30,
                    &quot;slidesPerView&quot;: 2
                },
                &quot;375&quot;: {
                    &quot;spaceBetween&quot;: 30,
                    &quot;slidesPerView&quot;: 2
                },
                &quot;575&quot;: {
                    &quot;spaceBetween&quot;: 30,
                    &quot;slidesPerView&quot;: 3
                },
                &quot;767&quot;: {
                    &quot;spaceBetween&quot;: 50,
                    &quot;slidesPerView&quot;: 4
                },
                &quot;991&quot;: {
                    &quot;spaceBetween&quot;: 50,
                    &quot;slidesPerView&quot;: 5
                },
                &quot;1199&quot;: {
                    &quot;spaceBetween&quot;: 100,
                    &quot;slidesPerView&quot;: 5
                }
            }}">
                <div class="swiper-wrapper" style="transform: translate3d(-1270px, 0px, 0px); transition-duration: 0ms;">
                    <div class="swiper-slide" style="width: 154px; margin-right: 100px;">
                        <img src="{{ asset('siteasset/images/resources/images/brand/brand-2-2.png')}}" alt="">
                    </div><!-- /.swiper-slide -->
                    <div class="swiper-slide" style="width: 154px; margin-right: 100px;">
                        <img src="{{ asset('siteasset/iimages/brand/brand-2-2.png')}}" alt="">
                    </div><!-- /.swiper-slide -->
                    <div class="swiper-slide" style="width: 154px; margin-right: 100px;">
                        <img src="{{ asset('siteasset/images/brand/brand-2-3.png')}}" alt="">
                    </div><!-- /.swiper-slide -->
                    <div class="swiper-slide" style="width: 154px; margin-right: 100px;">
                        <img src="{{ asset('siteasset/images/brand/brand-2-4.png')}}" alt="">
                    </div><!-- /.swiper-slide -->
                    <div class="swiper-slide swiper-slide-prev" style="width: 154px; margin-right: 100px;">
                        <img src="assets/images/brand/brand-2-5.png" alt="">
                    </div><!-- /.swiper-slide -->
                    <div class="swiper-slide swiper-slide-active" style="width: 154px; margin-right: 100px;">
                        <img src="assets/images/brand/brand-2-1.png" alt="">
                    </div><!-- /.swiper-slide -->
                    <div class="swiper-slide swiper-slide-next" style="width: 154px; margin-right: 100px;">
                        <img src="assets/images/brand/brand-2-2.png" alt="">
                    </div><!-- /.swiper-slide -->
                    <div class="swiper-slide" style="width: 154px; margin-right: 100px;">
                        <img src="assets/images/brand/brand-2-3.png" alt="">
                    </div><!-- /.swiper-slide -->
                    <div class="swiper-slide" style="width: 154px; margin-right: 100px;">
                        <img src="assets/images/brand/brand-2-4.png" alt="">
                    </div><!-- /.swiper-slide -->
                    <div class="swiper-slide" style="width: 154px; margin-right: 100px;">
                        <img src="assets/images/brand/brand-2-5.png" alt="">
                    </div><!-- /.swiper-slide -->
                </div>
            <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span></div>
        </div>
    </div>
</section>
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

@endsection


