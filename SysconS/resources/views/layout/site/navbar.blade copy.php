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
                            <p><a href="mailto:needhelp@company.com">info@sysconsolution.com</a></p>
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
                                <ul>
                                    <li>
                                        <a href="index.html">Home One</a>
                                    </li>
                                    <li><a href="index2.html">Home Two</a></li>
                                    <li class="dropdown">
                                        <a href="#">Header Styles</a>
                                        <ul>
                                            <li><a href="index.html">Header One</a></li>
                                            <li><a href="index.html">Header Two</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="{{url('/service')}}">{{ __('message.Service') }}</a>
                                <ul>
                                    <li><a href="{{url('/service')}}">Services</a></li>
                                    <li><a href="managed-it.html">Managed It</a></li>
                                    <li><a href="it-support.html">IT Support</a></li>
                                    <li><a href="it-consultancy.html">IT Consultancy</a></li>
                                    <li><a href="cloud-computing.html">Cloud Computing</a></li>
                                    <li><a href="cyber-security.html">Cyber Security</a></li>
                                    <li><a href="custom-software.html">Custom Software</a></li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#">{{ __('message.Project') }}</a>
                                <ul>
                                    <li><a href="{{url('/project')}}">Projects</a></li>
                                    <li><a href="project-details.html">Project Details</a></li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#">{{ __('message.News') }}</a>
                                <ul>
                                    <li><a href="{{url('/news')}}">{{ __('message.News') }}</a></li>
                                    <li><a href="news-details.html">News Details</a></li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="{{url('/devolopment')}}">{{ __('message.Development') }}</a>
                                <ul>
                                    <li><a href="services.html">Services</a></li>
                                    <li><a href="managed-it.html">Managed It</a></li>
                                    <li><a href="it-support.html">IT Support</a></li>
                                    <li><a href="it-consultancy.html">IT Consultancy</a></li>
                                    <li><a href="cloud-computing.html">Cloud Computing</a></li>
                                    <li><a href="cyber-security.html">Cyber Security</a></li>
                                    <li><a href="custom-software.html">Custom Software</a></li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="{{url('/dmarketing')}}">{{ __('message.dm') }} </a>
                                <ul>
                                    <li><a href="services.html">Services</a></li>
                                    <li><a href="managed-it.html">Managed It</a></li>
                                    <li><a href="it-support.html">IT Support</a></li>
                                    <li><a href="it-consultancy.html">IT Consultancy</a></li>
                                    <li><a href="cloud-computing.html">Cloud Computing</a></li>
                                    <li><a href="cyber-security.html">Cyber Security</a></li>
                                    <li><a href="custom-software.html">Custom Software</a></li>
                                </ul>
                            </li>
                            <li><a href="{{url('/about')}}">{{ __('message.About') }}</a></li>
                            <li><a href="{{url('/contact')}}">{{ __('message.Contact') }}</a></li>


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
                            <h5><a href="tel:+8801739979350">Free:+(880) 1739979350</a></h5>
                        </div>
                    </div>
                    <div class="main-menu-wrapper__search-box-cart-box">
                        <a href="#" class="main-menu-wrapper__search search-toggler icon-magnifying-glass"></a>
                        <a href="contact.html" class="main-menu-wrapper__cart icon-avatar"></a>


                    </div>

                    <div class="dropdown" >
                        <span class="btn btn-outline-dark dropdown-toggle btn-sm" data-bs-toggle="dropdown" >
                            {{ Config::get('languages')[App::getLocale()]['display'] }}
                        </span>
                        <ul class="dropdown-menu" >
                            {{-- <li><a class="dropdown-item" href="#">Link 1</a></li> --}}
                            @foreach (Config::get('languages') as $lang => $language)
                            @if ($lang != App::getLocale())
                            <li> <a class="dropdown-item" href="{{ route('lang.switch', $lang) }}">{{$language['display']}}</a></li>
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
