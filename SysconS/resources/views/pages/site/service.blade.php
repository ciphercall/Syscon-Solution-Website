@extends('layout.site.home')
@section('pagecontent')

 <!--Page Header Start-->
 <section class="page-header">
    <div class="page-header-bg" style="background-image: url({{ asset('siteasset/images/backgrounds/page-header-bg.jpg') }})">
    </div>
    <div class="page-header-bg-overly"></div>
    <div class="page-header-shape wow slideInRight" data-wow-delay="100ms" data-wow-duration="2500ms" style="background-image: url({{ asset('siteasset/images/shapes/page-header-shape.png') }}"></div>
    <div class="container">
        <div class="page-header__inner">
            <ul class="thm-breadcrumb list-unstyled">
                <li><a href="{{url('/')}}">{{ __('message.Home') }}</a></li>
                <li><span>/</span></li>
                <li>{{ __('message.Service') }}</li>
            </ul>
            <h2>{{ __('message.Service') }}</h2>
        </div>
    </div>
</section>
<!--Page Header End-->

<!--Services Two Start-->
<section class="services-two">
    <div class="container">
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
<!--Services Two End-->

<!--Video One Start-->
<section class="video-one">
    <div class="video-one-bg jarallax" data-jarallax="" data-speed="0.2" data-imgposition="50% 0%" style="background-image: url({{ asset('siteassetimages/backgrounds/video-one-bg.jpg') }})"></div>
    <div class="video-one-bg-overly"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="video-one__inner">
                    <div class="video-one__video-link">
                        <a href="https://www.youtube.com/watch?v=Get7rqXYrbQ" class="video-popup">
                            <div class="video-one__video-icon">
                                <span class="icon-play-button"></span>
                                <i class="ripple"></i>
                            </div>
                        </a>
                    </div>
                    <h2 class="video-one__title">{{ __('message.Trusted By') }}</h2>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Video One End-->

<!--Help Start-->
<section class="help">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <ul class="help__box list-unstyled clearfix">
                    <li class="help__single help__box-one wow fadeInLeft" data-wow-delay="100ms">
                        <div class="help__box-one-content">
                            <h3 class="help__box-one-title">{{ __('message.Help') }}</h3>
                        </div>
                        <div class="help__box-one-img">
                            <img src="{{ asset('siteasset/images/resources/help-box-one-img-1.jpg') }}" alt="">
                        </div>
                    </li>
                    <li class="help__single help__box-two wow fadeInLeft" data-wow-delay="300ms">
                        <div class="help__box-two-content">
                            <div class="help__box-two-icon">
                                <span class="icon-learning"></span>
                            </div>
                            <h3 class="help__box-two-title"><a href="managed-it.html">{{ __('message.Management') }}</a></h3>
                            <p class="help__box-two-text">{{ __('message.IT management') }}</p>
                        </div>
                    </li>
                    <li class="help__single help__box-two wow fadeInLeft" data-wow-delay="600ms">
                        <div class="help__box-two-content">
                            <div class="help__box-two-icon">
                                <span class="icon-verify"></span>
                            </div>
                            <h3 class="help__box-two-title"><a href="cyber-security.html">{{ __('message.Cyber') }}</a>
                            </h3>
                            <p class="help__box-two-text">{{ __('message.Cybersecurity') }}</p>
                        </div>
                    </li>
                    <li class="help__single help__box-two help__box-last wow fadeInLeft" data-wow-delay="900ms">
                        <div class="help__box-two-content">
                            <div class="help__box-two-icon">
                                <span class="icon-cloud"></span>
                            </div>
                            <h3 class="help__box-two-title"><a href="cloud-computing.html">{{ __('message.Cloud') }}</a>
                            </h3>
                            <p class="help__box-two-text">{{ __('message.Cloud computing') }}</p>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>
<!--Help End-->

<!--Business Growth Start-->
<section class="business-growth business-growth-two">
    <div class="business-growth__top">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6">
                    <div class="business-growth__left">
                        <div class="section-title text-left">
                            <span class="section-title__tagline">{{ __('message.Experience') }}</span>
                            <h2 class="section-title__title">{{ __('message.Business Growth') }}
                            </h2>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6">
                    <div class="business-growth__right">
                        <p class="business-growth__right-text">{{ __('message.analysis') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="business-growth__bottom">
            <div class="row">
                <div class="col-xl-4 col-lg-4 wow fadeInLeft" data-wow-delay="100ms">
                    <!--Business Growth Single-->
                    <div class="business-growth__single">
                        <div class="business-growth__img">
                            <img src="{{ asset('siteasset/images/resources/business-growth-img-1.jpg') }}" alt="">
                        </div>
                        <div class="business-growth__content">
                            <h4 class="business-growth__title">
                                <a href="managed-it.html">{{ __('message.Perfect') }}</a>
                            </h4>
                            <p class="business-growth__text">{{ __('message.The solution') }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 wow fadeInUp" data-wow-delay="200ms">
                    <!--Business Growth Single-->
                    <div class="business-growth__single">
                        <div class="business-growth__img">
                            <img src="{{ asset('siteasset/images/resources/business-growth-img-2.jpg') }}" alt="">
                        </div>
                        <div class="business-growth__content">
                            <h4 class="business-growth__title">
                                <a href="contact.html">{{ __('message.Business') }}</a>
                            </h4>
                            <p class="business-growth__text">{{ __('message.business solution') }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 wow fadeInRight" data-wow-delay="300ms">
                    <!--Business Growth Single-->
                    <div class="business-growth__single">
                        <div class="business-growth__img">
                            <img src="{{ asset('siteasset/images/resources/business-growth-img-3.jpg') }}" alt="">
                        </div>
                        <div class="business-growth__content">
                            <h4 class="business-growth__title">
                                <a href="about.html">{{ __('message.Demands') }}</a>
                            </h4>
                            <p class="business-growth__text">{{ __('message.Perfect Solution') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="business-growth__find">
            <div class="row">
                <div class="col-lg-12">
                    <div class="business-growth__find-inner">
                        <p>IT services built specifically for your business. <a href="contact.html">Find Your
                                Solution</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Business Growth End-->


@endsection
