<header class="main-header clearfix">
    <div class="main-header__top clearfix">
        <div class="main-header__top-inner clearfix">
            <div class="main-header__top-left">
                <ul class="list-unstyled main-header__top-address">
                    <li>
                        <div class="icon">
                            <span class="icon-pin"></span>
                        </div>
                        <div class="text">
                            <p>{{ __('message.address') }}</p>
                        </div>
                    </li>
                    <li>
                        <div class="icon">
                            <span class="icon-email"></span>
                        </div>
                        <div class="text">
                            <p><a href="mailto:info@sysconsolution.com">info@sysconsolution.com</a></p>
                        </div>
                    </li>
                        <li>
                        <div class="icon">
                            <span class="icon-phone"></span>
                        </div>
                        <div class="text">
                            <p><a href="tel:+8801739979350">+(880) 1739979350</a></p>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="main-header__top-right">
                <div class="main-header__top-right-text">
                    <p><span>Now Hiring:</span> {{ __('message.welcome') }}</p>
                </div>
                <div class="main-header__top-right-social">
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-facebook"></i></a>
                    <a href="#"><i class="fab fa-pinterest-p"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
    </div>
    <nav class="main-menu clearfix">
        <div class="main-menu-wrapper clearfix">
            <div class="main-menu-wrapper-inner clearfix">
                <div class="main-menu-wrapper__left clearfix">
                    <div class="main-menu-wrapper__logo">
                        <a href="{{url('/')}}"><img src={{ asset('siteasset/images/resources/logo-1.png') }} alt=""></a>
                    </div>
                    <div class="main-menu-wrapper__main-menu">
                        <a href="#" class="mobile-nav__toggler"><i class="fa fa-bars"></i></a>
                        <ul class="main-menu__list">
                            <li class="dropdown current">
                                <a href="{{url('/')}}">{{ __('message.Home') }}</a>

                            </li>



                            <li class="dropdown">
                                <a href="{{url('/devolopment')}}">{{ __('message.Development') }}</a>

                                    <ul class="navbar-nav mega-menu">
                                        <li class="row my-4" style="text-align: center">
                                            <div class="col-md-6 col-lg-3 mb-3 mb-lg-0">
                                                 {{-- <label for="web Dev" > --}}

                                                     <a href="#" rel="noopener noreferrer" > <span class="ss"><i class="fa fa-globe"></i> Web Development</span></a>

                                                 {{-- </label> --}}

                                                 @forelse ($devsubcs as $dev )

                                                <a href="{{url('s-devolopment/'.$dev->p_url)}}" class="dropdown-item">{{$dev->category}}</a>

                                                @empty

                                                @endforelse




                                            </div>
                                            <div class="col-md-6 col-lg-3 mb-3 mb-lg-0">

                                                 {{-- <label for="web Dev" > --}}
                                                     <a href="http://" target="_blank" rel="noopener noreferrer" > <span class="ss"><i class="fa fa-shopping-bag"></i> E-Com. Development</span></a>

                                                 {{-- </label> --}}

                                                 @forelse ($devecoms as $dev )

                                                 <a href="{{url('s-devolopment/'.$dev->p_url)}}" class="dropdown-item">{{$dev->category}}</a>

                                                 @empty

                                                 @endforelse

                                             </div>
                                             <div class="col-md-6 col-lg-3 mb-3 mb-lg-0">

                                                {{-- <label for="web Dev" > --}}

                                                     <a href="http://" target="_blank" rel="noopener noreferrer" > <span class="ss"><i class="fa fa-cubes"></i> CMS Development</span></a>

                                                 {{-- </label> --}}
                                                 @forelse ($devcmss as $dev )

                                                 <a href="{{url('s-devolopment/'.$dev->p_url)}}" class="dropdown-item">{{$dev->category}}</a>

                                                 @empty

                                                 @endforelse

                                             </div>
                                             <div class="col-md-6 col-lg-3 mb-3 mb-lg-0">

                                                {{-- <label for="web Dev" > --}}

                                                     <a href="http://" target="_blank" rel="noopener noreferrer" > <span class="ss"><i class="fa fa-mobile"></i> Mobile Apps Dev.</span></a>

                                                 {{-- </label> --}}
                                                 @forelse ($devmobs as $dev )

                                                 <a href="{{url('s-devolopment/'.$dev->p_url)}}" class="dropdown-item">{{$dev->category}}</a>

                                                 @empty

                                                 @endforelse

                                             </div>
                                        </li>




                                    </ul>
                                        <style>
                                            .mega-menu{min-width: 800px !important;}
                                            .mega-menu2{min-width: 750px !important;}

                                            .ss{
                                                /* padding-top: 10px; */
                                                /* font-family: 'Times New Roman', Times, serif; */
                                                font-weight: 700;
                                                color: #227ece;
                                                font-size: 13px;
                                                text-align: center;
                                                font-family: Verdana, Geneva, Tahoma, sans-serif;
                                                transition: width 1s, height 3s;


                                            }
                                            /* div {
                                            width: 100px;
                                            height: 100px;
                                            background: red;
                                            transition: width 2s, height 4s;
                                            } */

                                            .ss:hover {
                                                font-weight: 900;
                                                color: #058d8d;
                                                font-size: 15px;
                                                text-align: center;
                                            }
                                        </style>


                            </li>

                            <li class="dropdown">
                                <a href="{{url('/dmarketing')}}">{{ __('message.dm') }}</a>

                                    <ul class="navbar-nav mega-menu2">
                                        <li class="row my-4" >
                                            <div class="col-md-6 col-lg-3 mb-3 mb-lg-0">
                                                {{-- <span class="ss"><i class="fa fa-shopping-bag"></i> E-Com. Development</span> --}}
                                                    <label for="web Dev">
                                                    <a href="http://"  rel="noopener noreferrer" > <span class="ss"  ><i class="	fas fa-poll"></i> SEO </span></a>
                                                 </label>

                                                    @foreach ($dmseos as $dmseo)



                                                     <a href="{{url('d-marketing/'.$dmseo->d_url)}}" class="dropdown-item" style="text-align: left; font-size: 13px;">{{$dmseo->category}}</a>
                                                     @endforeach





                                            </div>
                                            <div class="col-md-6 col-lg-3 mb-3 mb-lg-0">

                                                 <label for="web Dev" >
                                                     <a href="http://" target="_blank" rel="noopener noreferrer" > <span class="ss"><i class="fas fa-bullhorn"></i> SMM</span></a>

                                                 </label>

                                                 @foreach ($dmsmms as $dmsmm)



                                                     <a href="{{url('d-marketing/'.$dmsmm->d_url)}}" class="dropdown-item" style="text-align: center">{{$dmsmm->category}}</a>
                                                @endforeach

                                             </div>
                                             <div class="col-md-6 col-lg-3 mb-3 mb-lg-0">

                                                <label for="web Dev" >

                                                     <a href="http://" target="_blank" rel="noopener noreferrer" > <span class="ss" ><i class="fas fa-funnel-dollar"></i> Paid Marketing</span></a>

                                                 </label>

                                                 @foreach ($dmpaidms as $dmpaid)



                                                     <a href="{{url('d-marketing/'.$dmpaid->d_url)}}" class="dropdown-item" style="text-align: center">{{$dmpaid->category}}</a>
                                                @endforeach


                                             </div>
                                             <div class="col-md-6 col-lg-3 mb-3 mb-lg-0">

                                                {{-- <label for="web Dev" > --}}

                                                     <a href="#"  rel="noopener noreferrer" > <span class="ss" style="font-size: 14px; text-align: center;"><i class="	fas fa-check-square"></i>ORM </span></a>

                                                 {{-- </label> --}}
                                                 @foreach ($dmadvs as $dmadv)



                                                 <a href="{{url('d-marketing/'.$dmadv->d_url)}}" class="dropdown-item" style="text-align: left">{{$dmadv->category}}</a>
                                                @endforeach


                                             </div>
                                        </li>




                                    </ul>
                                        {{-- <style>
                                            /* .mega-menu{min-width: 990px !important;} */
                                            .sss{
                                                padding-top: 10px;
                                                font-family: 'Times New Roman', Times, serif;
                                                font-weight: 800;
                                                color: #428bca;
                                                font-size: 25px;
                                                text-align: center;



                                            }
                                        </style> --}}


                            </li>
                            {{-- <li class="dropdown">
                                <a href="{{url('/project')}}">{{ __('message.Project') }}</a>
                                <ul>
                                    <li><a href="{{url('/project')}}">Projects</a></li>

                                </ul>
                            </li> --}}
                            {{-- <li class="dropdown">
                                <a href="#">{{ __('message.News') }}</a>
                                <ul>
                                    <li><a href="{{url('/news')}}">{{ __('message.News') }}</a></li>
                                    <li><a href="news-details.html">News Details</a></li>
                                </ul>
                            </li> --}}
                            <li><a href="{{url('/about')}}">{{ __('message.About') }}</a></li>
                            <li class="dropdown">
                                <a href="{{url('/service')}}">{{ __('message.Service') }}</a>
                                <ul>
                                    <li><a href="{{url('/service')}}">Services</a></li>
                                    <li><a href="{{url('/contract-type')}}">Contract Type</a></li>
                                    <li><a href="{{url('/inquiry')}}">Inquiry Form</a></li>

                                    <li>
                                    <a href="{{url('/project')}}">{{ __('message.Project') }}</a></li>

                                </ul>
                            </li>
                            <li><a href="{{url('/contract-type')}}">Contract Type</a></li>



                        </ul>
                    </div>
                </div>
                <div class="main-menu-wrapper__right">
                    <div class="main-menu-wrapper__call">
                        <div class="main-menu-wrapper__call-icon">
                            <img src={{ asset('siteasset/images/shapes/phone-icon.png') }} alt="">
                        </div>
                        <div class="main-menu-wrapper__call-number">
                            <p>{{ __('message.ques') }}</p>
                            <h5><a href="tel:+8801739979350">Call:+(880) 1739979350</a></h5>
                        </div>
                    </div>
                    <div class="main-menu-wrapper__search-box-cart-box">
                        <a href="#" class="main-menu-wrapper__search search-toggler icon-magnifying-glass"></a>
                        <a href="contact.html" class="main-menu-wrapper__cart "></a>


                    </div>

                    <div class="dropdown">
                        <span class="btn btn-outline-dark dropdown-toggle btn-sm" data-bs-toggle="dropdown">
                            @if(Config::get('languages')[App::getLocale()]['display']=='BAN')
                            <img width="25" src="https://icons.iconarchive.com/icons/wikipedia/flags/256/BD-Bangladesh-Flag-icon.png">
                            @elseif(Config::get('languages')[App::getLocale()]['display']=='JAP')
                            <img width="25" src="https://icons.iconarchive.com/icons/icons-land/vista-flags/256/Japan-Flag-1-icon.png">
                            @else
                            <img width="25" src="https://icons.iconarchive.com/icons/icons-land/vista-flags/256/United-States-Flag-1-icon.png">
                            @endif
                            {{ Config::get('languages')[App::getLocale()]['display'] }}
                        </span>
                        <ul class="dropdown-menu">
                            {{-- <li><a class="dropdown-item" href="#">Link 1</a></li> --}}
                            @foreach (Config::get('languages') as $lang => $language)
                            @if ($lang != App::getLocale())
                            <li>
                                <a class="dropdown-item" href="{{ route('lang.switch', $lang) }}">

                                    @if($language['flag-icon']=='bn')
                                    <img width="25" src="https://icons.iconarchive.com/icons/wikipedia/flags/256/BD-Bangladesh-Flag-icon.png">
                                    @elseif($language['flag-icon']=='jp')
                                    <img width="25" src="https://icons.iconarchive.com/icons/icons-land/vista-flags/256/Japan-Flag-1-icon.png">
                                    @else
                                    <img width="25" src="https://icons.iconarchive.com/icons/icons-land/vista-flags/256/United-States-Flag-1-icon.png">

                                    @endif

                                    {{$language['display']}}
                                </a>
                            </li>
                            @endif
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</header>

<div class="stricky-header stricked-menu main-menu">
    <div class="sticky-header__content"></div><!-- /.sticky-header__content -->
</div>
