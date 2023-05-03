<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Syscon Solution LTD</title>
    <!-- favicons Icons -->
    <link rel="apple-touch-icon" sizes="180x180" href={{ URL::to('/siteasset/images/favicons/apple-touch-icon.png') }}>
    <link rel="icon" type="image/png' sizes="32x32" href={{ URL::to('/siteasset/images/favicons/favicon-32x32.png') }}>
    <link rel="icon" type="image/png' sizes="16x16" href={{ URL::to('/siteasset/images/favicons/favicon-16x16.png') }}>
    <link rel="manifest" href={{ URL::to('/siteasset/images/favicons/site.webmanifest') }}>
    <meta name="description" content="Izeetak HTML Template For IT Solutions Company">

    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
    {{-- <link href="../css2?family=Barlow:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet"> --}}

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
    <link href="https://fonts.maateen.me/solaiman-lipi/font.css" rel="stylesheet">
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}

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
       @yield('pagecontent')




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
                <a href="{{url('/')}}" aria-label="logo image"><img src={{ asset('siteasset/images/resources/footer-logo.png')}} width="155" alt=""></a>
            </div>
            <!-- /.logo-box -->
            <div class="mobile-nav__container"></div>
            <!-- /.mobile-nav__container -->

            <ul class="mobile-nav__contact list-unstyled">
                <li>
                    <i class="fa fa-envelope"></i>
                    <a href="mailto:needhelp@company.com">info@sysconsolution.com</a>
                </li>
                <li>
                    <i class="fa fa-phone-alt"></i>
                    <a href="tel:+8801739979350">Free:+(880) 1739979350</a>
                </li>
                <li>
                    <i class="fa fa-phone-alt"></i>
                    <select class="form-control Langchange ">
                        <option selected value="en" {{ session()->get('locale') == 'en' ? 'selected' : '' }}>ENG</option>
                        <option value="zhh" {{ session()->get('locale') == 'zhh' ? 'selected' : '' }}>JAP</option>
                        <option value="bn" {{ session()->get('locale') == 'bn' ? 'selected' : '' }}>BAN</option>
                    </select>
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
<!--Start of Tawk.to Script-->
<script type="text/javascript">
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
    var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
    s1.async=true;
    s1.src='https://embed.tawk.to/625a7b8a7b967b11798aff57/1g0on55on';
    s1.charset='UTF-8';
    s1.setAttribute('crossorigin','*');
    s0.parentNode.insertBefore(s1,s0);
    })();
    </script>
    <!--End of Tawk.to Script-->

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
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.79/jquery.form-validator.min.js" integrity="sha512-7+hQkXGIswtBWoGbyajZqqrC8sa3OYW+gJw5FzW/XzU/lq6kScphPSlj4AyJb91MjPkQc+mPQ3bZ90c/dcUO5w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> --}}
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js">

    </script> --}}
    @yield('script')


    <!-- template js -->
    <script src={{ URL::to('/siteasset/js/izeetak.js') }}></script>

</body>

</html>
