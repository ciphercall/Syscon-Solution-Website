@extends('layout.site.home')
@section('pagecontent')


 <!--Page Header Start-->
 <section class="page-header">
    <div class="page-header-bg" style="background-image: url({{ asset('siteasset/images/backgrounds/page-header-bg.jpg') }})">
    </div>
    <div class="page-header-bg-overly"></div>
    <div class="page-header-shape wow slideInRight" data-wow-delay="100ms" data-wow-duration="2500ms" style="background-image: url({{ asset('siteasset/images/shapes/page-header-shape.png') }})"></div>
    <div class="container">
        <div class="page-header__inner">
            <ul class="thm-breadcrumb list-unstyled">
                <li><a href="{{url('/')}}">Home</a></li>
                <li><span>/</span></li>
                <li>Contract Type</li>
            </ul>
            <h2>Contract Type</h2>
        </div>
    </div>
</section>
<!--Page Header End-->

        <!--Project Details Start-->
        <section class="project-details">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="project-details__img-box">
                            <img src="{{ asset('siteasset/images/contract.webp') }}" alt="">
                            <div class="project-details__details-box" >
                                <h2 style="text-align: center;font-weight: 800;color:rgb(13, 27, 75)">Contract Type</h2>

                            </div>
                        </div>
                        <div class="project-details__content">
                            <h4 style="font-weight: 800" class="icon"> <span class="icon-check"></span>  Contracted Development</h4>
                            <p class="project-details__text-1">Contracted development allows you to develop custom-made products without an in-house IT engineer in the company. You just explain your requirement and pay for the delivered product.</p>

                        </div>

                        <div class="project-details__content">
                            <h4 style="font-weight: 800" class="icon"> <span class="icon-check"></span>  Advantage</h4>
                            <p class="project-details__text-1">The advantage of outsourcing an IT project is that your project will not rely on your in-house IT engineer. The project will launch on time with less budget unless you make an additional request or change your requirement in the middle of the process. No hiring fee, no time-consuming, and no over-employment after the project.</p>

                        </div>
                        <div class="project-details__content">
                            <h4 style="font-weight: 800" class="icon"> <span class="icon-check"></span>  Development Flow</h4>
                            <p class="project-details__text-1"><img src="{{ asset('siteasset/images/9english-2-1024x83.png') }}" alt="" style="padding-top: 20px"></p>

                        </div>
                        <div class="project-details__content" >
                            <h4 style="font-weight: 800" class="icon"> <span class="icon-check"></span>  Assigned Task</h4>
                            <p class="project-details__text-1"><img src="{{ asset('siteasset/images/english-red-transfarent-1024x132.png') }}" alt="" style="padding-top: 20px"></p>

                        </div>
                        <div style="background-color: rgb(144, 233, 255);padding: 20px;border-radius: 20px">
                            <h2 style="text-align: center;font-weight: 800;color:rgb(13, 27, 75)">On-Demand Development</h2>

                        </div>
                        <div class="project-details__content">
                            <h4 style="font-weight: 800" class="icon"> <span class="icon-check"></span>On-Demand Despatch Development</h4>
                            <p class="project-details__text-1">On-demand despatch development allows you to manage the IT engineer assigned by JBC. JBC will assign a qualified IT engineers team based on your requirement. Those IT engineers will only work on your project from Bangladesh within the contract and you can manage their tasks. You will pay for the duration of the contract.</p>

                        </div>

                        <div class="project-details__content">
                            <h4 style="font-weight: 800" class="icon"> <span class="icon-check"></span>Advantage</h4>
                            <p class="project-details__text-1">On-demand despatch development will suitable for the companies who have It projects constantly managed by in-house IT team and want to bust IT engineers in both the short to medium term. Dedicated IT engineers will work on your project flexibly based on your management.</p>

                        </div>
                        <div class="project-details__content">
                            <h4 style="font-weight: 800" class="icon"> <span class="icon-check"></span>Development Flow</h4>
                            <p class="project-details__text-1"><img src="{{ asset('siteasset/images/e6-1024x111.png') }}" alt="" style="padding-top: 20px"></p>

                        </div>
                        <div class="project-details__content">
                            <h4 style="font-weight: 800" class="icon"> <span class="icon-check"></span> Assigned Task</h4>
                            <p class="project-details__text-1">You can manage the tasks for the assigned engineer based on the contract.</p>

                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--Project Details End-->

        <!--Similar Work Start-->
        <section class="simialr-work project-two">
            <div class="container">
                <div class="section-title text-center">
                    <span class="section-title__tagline">Checkout Recent Cases</span>
                    <h2 class="section-title__title">Technical Competence</h2>
                </div>
                <div class="row">



                        <div class="col-xl-3 col-lg-5">
                            <div class="service-details__sidebar">
                                <div class="service-details__sidebar-service">
                                    <h4 class="service-details__sidebar-title">OS</h4>
                                    <ul class="service-details__sidebar-service-list list-unstyled">
                                        <li class="current"><a href="managed-it.html">Managed IT <span class="icon-right-arrow"></span></a>
                                        </li>
                                        <li><a href="it-support.html">IT Support <span class="icon-right-arrow"></span></a>
                                        </li>
                                        <li><a href="it-consultancy.html">IT Consultancy <span class="icon-right-arrow"></span></a></li>
                                        <li><a href="cloud-computing.html">Cloud Computing <span class="icon-right-arrow"></span></a></li>
                                        <li><a href="cyber-security.html">Cyber Security <span class="icon-right-arrow"></span></a></li>
                                        <li><a href="custom-software.html">Custom Software <span class="icon-right-arrow"></span></a></li>
                                    </ul>
                                </div>

                            </div>
                        </div>

                        <div class="col-xl-3 col-lg-5">
                            <div class="service-details__sidebar">
                                <div class="service-details__sidebar-service">
                                    <h4 class="service-details__sidebar-title">Database</h4>
                                    <ul class="service-details__sidebar-service-list list-unstyled">
                                        <li class="current"><a href="managed-it.html">Managed IT <span class="icon-right-arrow"></span></a>
                                        </li>
                                        <li><a href="it-support.html">IT Support <span class="icon-right-arrow"></span></a>
                                        </li>
                                        <li><a href="it-consultancy.html">IT Consultancy <span class="icon-right-arrow"></span></a></li>
                                        <li><a href="cloud-computing.html">Cloud Computing <span class="icon-right-arrow"></span></a></li>
                                        <li><a href="cyber-security.html">Cyber Security <span class="icon-right-arrow"></span></a></li>
                                        <li><a href="custom-software.html">Custom Software <span class="icon-right-arrow"></span></a></li>
                                    </ul>
                                </div>

                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-5">
                            <div class="service-details__sidebar">
                                <div class="service-details__sidebar-service">
                                    <h4 class="service-details__sidebar-title">Language</h4>
                                    <ul class="service-details__sidebar-service-list list-unstyled">
                                        <li class="current"><a href="managed-it.html">Managed IT <span class="icon-right-arrow"></span></a>
                                        </li>
                                        <li><a href="it-support.html">IT Support <span class="icon-right-arrow"></span></a>
                                        </li>
                                        <li><a href="it-consultancy.html">IT Consultancy <span class="icon-right-arrow"></span></a></li>
                                        <li><a href="cloud-computing.html">Cloud Computing <span class="icon-right-arrow"></span></a></li>
                                        <li><a href="cyber-security.html">Cyber Security <span class="icon-right-arrow"></span></a></li>
                                        <li><a href="custom-software.html">Custom Software <span class="icon-right-arrow"></span></a></li>
                                    </ul>
                                </div>

                            </div>
                        </div>

                        <div class="col-xl-3 col-lg-5">
                            <div class="service-details__sidebar">
                                <div class="service-details__sidebar-service">
                                    <h4 class="service-details__sidebar-title">Framework</h4>
                                    <ul class="service-details__sidebar-service-list list-unstyled">
                                        <li class="current"><a href="managed-it.html">Managed IT <span class="icon-right-arrow"></span></a>
                                        </li>
                                        <li><a href="it-support.html">IT Support <span class="icon-right-arrow"></span></a>
                                        </li>
                                        <li><a href="it-consultancy.html">IT Consultancy <span class="icon-right-arrow"></span></a></li>
                                        <li><a href="cloud-computing.html">Cloud Computing <span class="icon-right-arrow"></span></a></li>
                                        <li><a href="cyber-security.html">Cyber Security <span class="icon-right-arrow"></span></a></li>
                                        <li><a href="custom-software.html">Custom Software <span class="icon-right-arrow"></span></a></li>
                                    </ul>
                                </div>

                            </div>
                        </div>
				</div>
            </div>
        </section>


        <!--Similar Work End-->
    <section class="simialr-work project-two">
        <div class="container">
            <div class="section-title text-center">
                    <span class="section-title__tagline">For Checkout</span>
                    <h2 class="section-title__title">Inquiry form</h2>
            </div>
                <div class="row">

                    <div class="col-xl-12 col-lg-8">
                            <div class="contact-page__right">


                                    <div class="row">
                                        <div class="col-xl-12">
                                            <a href="">
                                            <div class="comment-form__input-box" style="text-align: center">
                                                <a href="{{url('/inquiry')}}"  class="thm-btn comment-form__btn" style="text-align: center">Send Inquiry Information</a>
                                            </div>

                                        </div>
                                    </div>
                                <div class="result"></div>
                            </div>
                    </div>

				</div>
        </div>
    </section>

@endsection
