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
                <li>{{ __('message.about') }}</li>
            </ul>
            <h2>{{ __('message.about') }}</h2>
        </div>
    </div>
</section>
<!--Page Header End-->

<!--About Two Start-->
<section class="about-two">
    <div class="container">
        <div class="row">
            <div class="col-xl-6">
                <div class="about-two__left wow slideInLeft" data-wow-delay="100ms" data-wow-duration="2500ms">
                    <div class="about-two__img">
                        <img src={{ asset('siteasset/images/resources/about1.jpg') }} alt="">
                    </div>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="about-two__right">
                    <div class="section-title text-left">
                        <span class="section-title__tagline">Get to Know About us</span>
                        <h3 class="section-title__title">We Believe that We Can Solve IT Problems</h3>
                    </div>
                    <p class="about-two__text-1">{{ __('message.about_details') }}</p>
                    <p class="about-two__text-2">{{ __('message.sister_con') }}</p>
                    <p class="about-two__text-1">{{ __('message.sister_con_d') }}</p>
                    <p class="about-two__text-1">{{ __('message.sister_con_d2') }}</p>
                    <p class="about-two__text-1">{{ __('message.sister_con_d3') }}</p>



                    <div class="about-two__progress-wrap">
                        <div class="about-two__progress">
                            <div class="about-two__progress-box">
                                <div class="circle-progress" data-options='{ "value": 0.9,"thickness": 3,"emptyFill": "#eef3f7","lineCap": "square", "size": 138, "fill": { "color": "#42d9be" } }'>
                                </div><!-- /.circle-progress -->
                                <span>90%</span>
                            </div>
                            <div class="about-two__progress-content">
                                <h3>Successful Projects</h3>
                            </div>
                        </div>
                        <div class="about-two__progress">
                            <div class="about-two__progress-box">
                                <div class="circle-progress" data-options='{ "value": 0.7,"thickness": 3,"emptyFill": "#eef3f7","lineCap": "square", "size": 138, "fill": { "color": "#42d9be" } }'>
                                </div><!-- /.circle-progress -->
                                <span>70%</span>
                            </div><!-- /.about-five__progress-box -->
                            <div class="about-two__progress-content">
                                <h3>Problem Solved</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--About Two End-->

<!--Brand Two Start-->
<section class="brand-two">
    <div class="container">
        <div class="brand-two__inner">
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
                    "slidesPerView": 5
                }
            }}'>
                <div class="swiper-wrapper">
                    @foreach ($wbrands as $wbrand )

                    <div class="swiper-slide">
                        <img src="{{asset('storage/filePhoto/b_logo')}}/{{$wbrand->b_logo}}" alt="">
                    </div>
                    @endforeach


                </div>
            </div>
        </div>
    </div>
</section>
<!--Brand Two End-->

<!--Video One Start-->
<section class="video-one about-page-video">
    <div class="video-one-bg jarallax" data-jarallax="" data-speed="0.2" data-imgposition="50% 0%" style="background-image: url(assets/images/backgrounds/video-one-bg.jpg)"></div>
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
                    <h2 class="video-one__title">Trusted By The World's Best <br> Organizations</h2>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Video One End-->

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
<!--Team One Start-->
<section class="team-one about-page-team">
    <div class="container">
        <div class="section-title text-center">
            <span class="section-title__tagline">Our Leadership Team </span>
            <h2 class="section-title__title">Our Board Members</h2>
        </div>
        <div class="row">
            {{-- @foreach ($employees as $employee )


            <div class="col-xl-3 col-lg-6 col-md-6">
                <!--Team One Single-->
                <div class="team-one__single  wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1000ms">
                    <div class="team-one__img">
                        <img  src="{{asset('storage/filePhoto/thumbnail')}}/{{$employee->e_photo}}"  alt="">
                        <div class="team-one__social">
                            <a href="{{$employee->twitter_link}}"><i class="fab fa-twitter"></i></a>
                            <a href="{{$employee->fb_link}}"><i class="fab fa-facebook"></i></a>
                            <a href="{{$employee->linkdin_link}}"><i class="fab fa-linkedin-in"></i></a>
                            <a href="{{$employee->instagram_link}}"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                    <div class="team-one__content">
                        <h3 class="team-one__name">{{$employee->e_name}}</h3>
                        <p class="team-one__title">{{$employee->deg}}</p>
                    </div>
                </div>
            </div>
            @endforeach --}}
            <div class="col-xl-3 col-lg-6 col-md-6">
                <!--Team One Single-->
                <div class="team-one__single wow fadeInLeft" data-wow-delay="100ms" data-wow-duration="1000ms">
                    <div class="team-one__img">
                        <img src={{ asset('siteasset/boad_member/Md.Nazrul_Islam.jpg') }} alt="">
                        <div class="team-one__social">
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-facebook"></i></a>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                    <div class="team-one__content">
                        <h3 class="team-one__name">Md. Nazrul Islam</h3>
                        <p class="team-one__title">Chairman</p>
                    </div>
                </div>
            </div>
            {{-- C:\xampp\htdocs\syscon\syscon_solution\SysconS\public\siteasset\boad_member --}}
            <div class="col-xl-3 col-lg-6 col-md-6">
                <!--Team One Single-->
                <div class="team-one__single wow fadeInRight" data-wow-delay="0ms" data-wow-duration="1000ms">
                    <div class="team-one__img">
                        <img src={{ asset('siteasset/boad_member/masoud.webp') }} alt="">
                        <div class="team-one__social">
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-facebook"></i></a>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                    <div class="team-one__content">
                        <h3 class="team-one__name">Md. Masud Iqbal Chowdhury</h3>
                        <p class="team-one__title"> Director</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6">
                <!--Team One Single-->
                <div class="team-one__single wow fadeInRight" data-wow-delay="100ms" data-wow-duration="1000ms">
                    <div class="team-one__img">
                        <img src={{ asset('siteasset/boad_member/toslim.webp') }} alt="">
                        <div class="team-one__social">
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-facebook"></i></a>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                    <div class="team-one__content">
                        <h3 class="team-one__name">Md. Taslim Haque</h3>
                        <p class="team-one__title">Managing Director</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6">
                <!--Team One Single-->
                <div class="team-one__single wow fadeInRight" data-wow-delay="100ms" data-wow-duration="1000ms">
                    <div class="team-one__img">
                        <img src={{ asset('siteasset/boad_member/hadith.webp') }} alt="">
                        <div class="team-one__social">
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-facebook"></i></a>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                    <div class="team-one__content">
                        <h3 class="team-one__name">Abdul Hadit</h3>
                        <p class="team-one__title">Director</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Team One End-->
<!--Team One Start-->
<section class="team-one about-page-team">
    <div class="container">
        <div class="section-title text-center">
            <span class="section-title__tagline">Professional People</span>
            <h2 class="section-title__title">Meet the Experts</h2>
        </div>
        <div class="row">
            @foreach ($employees as $employee )


            <div class="col-xl-3 col-lg-6 col-md-6">
                <!--Team One Single-->
                <div class="team-one__single  wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1000ms">
                    <div class="team-one__img">
                        <img  src="{{asset('storage/filePhoto/thumbnail')}}/{{$employee->e_photo}}"  alt="">
                        <div class="team-one__social">
                            <a href="{{$employee->twitter_link}}"><i class="fab fa-twitter"></i></a>
                            <a href="{{$employee->fb_link}}"><i class="fab fa-facebook"></i></a>
                            <a href="{{$employee->linkdin_link}}"><i class="fab fa-linkedin-in"></i></a>
                            <a href="{{$employee->instagram_link}}"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                    <div class="team-one__content">
                        <h3 class="team-one__name">{{$employee->e_name}}</h3>
                        <p class="team-one__title">{{$employee->deg}}</p>
                    </div>
                </div>
            </div>
            @endforeach
            {{-- <div class="col-xl-3 col-lg-6 col-md-6">
                <!--Team One Single-->
                <div class="team-one__single wow fadeInLeft" data-wow-delay="100ms" data-wow-duration="1000ms">
                    <div class="team-one__img">
                        <img src={{ asset('siteasset/images/team/team-one-img-2.jpg') }} alt="">
                        <div class="team-one__social">
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-facebook"></i></a>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                    <div class="team-one__content">
                        <h3 class="team-one__name">Jessica Brown</h3>
                        <p class="team-one__title">IT Expert</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6">
                <!--Team One Single-->
                <div class="team-one__single wow fadeInRight" data-wow-delay="0ms" data-wow-duration="1000ms">
                    <div class="team-one__img">
                        <img src={{ asset('siteasset/images/team/team-one-img-3.jpg') }} alt="">
                        <div class="team-one__social">
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-facebook"></i></a>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                    <div class="team-one__content">
                        <h3 class="team-one__name">Mike Hardson</h3>
                        <p class="team-one__title">IT Expert</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6">
                <!--Team One Single-->
                <div class="team-one__single wow fadeInRight" data-wow-delay="100ms" data-wow-duration="1000ms">
                    <div class="team-one__img">
                        <img src={{ asset('siteasset/images/team/team-one-img-4.jpg') }} alt="">
                        <div class="team-one__social">
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-facebook"></i></a>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                    <div class="team-one__content">
                        <h3 class="team-one__name">Christine Eve</h3>
                        <p class="team-one__title">IT Expert</p>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
</section>
<!--Team One End-->

@endsection
