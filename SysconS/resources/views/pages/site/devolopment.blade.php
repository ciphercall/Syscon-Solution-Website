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
                    <li><a href="index.html">Home</a></li>
                    <li><span>/</span></li>
                    <li>{{$develops[0]->en_page_title}}</li>
                </ul>
                <h2>{{$develops[0]->en_page_title}}</h2>
            </div>
        </div>
    </section>
    <!--Page Header End-->
	<!--Service Details Start-->


    <section class="service-details">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-7">
                    <div class="service-details__right">
                        <div class="service-details__img">
                            <img src="{{ url('storage/filePhoto/' .$develops[0]->page_bg_photo) }}">
                        </div>
                        <div class="service-details__content">
                            <h3 class="service-details__title">
                                @if(App::isLocale('en'))
                                {!!$develops[0]->en_page_title!!}
                                @elseif(App::isLocale('bn'))
                                {!!$develops[0]->bn_page_title!!}
                                @else
                                {!!$develops[0]->jp_page_title!!}
                                @endif

                               </h3>
                            <p class="service-details__text">
                                @if(App::isLocale('en'))
                                {!!$develops[0]->en_page_details!!}
                                @elseif(App::isLocale('bn'))
                                {!!$develops[0]->bn_page_details!!}
                                @else
                                {!!$develops[0]->jp_page_details!!}
                                @endif
                           </p>

                        </div>
                        <div class="service-details__benefits">
                            <div class="row">
                                <div class="col-xl-6">
                                    <div class="service-details__benefits-text">
                                        <h3 class="service-details__benefits-title">Why would you accept this service?</h3>
                                        <p class="service-details__benefits-text">
                                            @if(App::isLocale('en'))
                                            {!!$develops[0]->benefits_text!!}
                                            @elseif(App::isLocale('bn'))
                                            {!!$develops[0]->benefits_text_bn!!}
                                            @else
                                            {!!$develops[0]->benefits_text_jp!!}
                                            @endif
                                           </p>
                                        <ul class="list-unstyled service-details__benefits-list">

                                            {{-- <li>
                                                <div class="icon">
                                                    <span class="fa fa-check"></span>
                                                </div>
                                                <div class="text">
                                                    <p>Laravel helps in developing high-functional websites. Laravel developers are well-familiar with the smarter tools and it boosts the performance of your site.</p>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="icon">
                                                    <span class="fa fa-check"></span>
                                                </div>
                                                <div class="text">
                                                    <p>Laravel comes up with a wide range of in-built libraries and a developer can easily get access to the libraries.</p>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="icon">
                                                    <span class="fa fa-check"></span>
                                                </div>
                                                <div class="text">
                                                    <p>Using Laravel, one can create IoT-based applications that secure connectivity to a wide range of networks. It provides support to different devices and sensors that help users to collect remote data. </p>
                                                </div>
                                            </li> --}}
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="service-details__benefits-img">
                                        <img src="{{ url('storage/filePhoto/' .$develops[0]->sevice_f_photo) }}" alt="">
                                    </div>
                                </div>
                                <div class="col-xl-12">

                                    <div class="text">
                                        <p class="">
                                            @if(App::isLocale('en'))
                                            {!!$develops[0]->dev_faq!!}
                                            @elseif(App::isLocale('bn'))
                                            {!!$develops[0]->dev_faq_bn!!}
                                            @else
                                            {!!$develops[0]->dev_faq_jp!!}
                                            @endif
                                              </p>
                                    </div>
                                    {{-- <div class="service-details__benefits-img">
                                        <p class="">{!!$develops[0]->dev_faq!!}  </p>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                        <div class="service-details__faq">
                            <div class="accrodion-grp faq-one-accrodion" data-grp-name="faq-one-accrodion">
                                <div class="accrodion active">
                                    <div class="accrodion-title">
                                        <h4>
                                            @if(App::isLocale('en'))
                                            {!!$develops[0]->en_sevice_fea!!}
                                            @elseif(App::isLocale('bn'))
                                            {!!$develops[0]->bn_sevice_fea!!}
                                            @else
                                            {!!$develops[0]->jp_sevice_fea!!}
                                            @endif
                                       </h4>
                                    </div>
                                    <div class="accrodion-content">
                                        <div class="inner">
                                            <p>
                                                @if(App::isLocale('en'))
                                                {!!$develops[0]->en_sevice_f_d!!}
                                                @elseif(App::isLocale('bn'))
                                                {!!$develops[0]->bn_sevice_f_d!!}
                                                @else
                                                {!!$develops[0]->jp_sevice_f_d!!}
                                                @endif
                                               </p>
                                        </div><!-- /.inner -->
                                    </div>
                                </div>
                                <div class="accrodion">
                                    <div class="accrodion-title">
                                        <h4>How to process the business IT solution?</h4>
                                    </div>
                                    <div class="accrodion-content" style="display: none;">
                                        <div class="inner">
                                            <p>There are many variations of passages of available but the majority
                                                have in that some form by injected randomised words which don’t look
                                                even as slightly believable now.</p>
                                        </div><!-- /.inner -->
                                    </div>
                                </div>
                                <div class="accrodion">
                                    <div class="accrodion-title">
                                        <h4>How to process the business IT solution?</h4>
                                    </div>
                                    <div class="accrodion-content" style="display: none;">
                                        <div class="inner">
                                            <p>There are many variations of passages of available but the majority
                                                have in that some form by injected randomised words which don’t look
                                                even as slightly believable now.</p>
                                        </div><!-- /.inner -->
                                    </div>
                                </div>
                                <div class="accrodion last-chiled">
                                    <div class="accrodion-title">
                                        <h4>How to process the business IT solution?</h4>
                                    </div>
                                    <div class="accrodion-content" style="display: none;">
                                        <div class="inner">
                                            <p>There are many variations of passages of available but the majority
                                                have in that some form by injected randomised words which don’t look
                                                even as slightly believable now.</p>
                                        </div><!-- /.inner -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-5">
                    <div class="service-details__sidebar">
                        <div class="service-details__sidebar-service">
                            <h4 class="service-details__sidebar-title">Web Development</h4>
                            <ul class="service-details__sidebar-service-list list-unstyled">
                                @forelse ($devsubcs as $dev )

                                <li><a href="{{url('s-devolopment/'.$dev->p_url)}}">{{$dev->category}} <span class="icon-right-arrow"></span></a>
                                </li>

                                @empty

                                @endforelse
                            </ul>
                        </div>
                        <div class="service-details__need-help">
                            <div class="service-details__need-help-bg" style="background-image: url({{ asset('siteasset/images/backgrounds/service-details-need-help-bg.jpg') }})">
                            </div>
                            <div class="service-details__need-help-bg-overly"></div>
                            <div class="service-details__need-help-icon">
                                <img src="{{ asset('siteasset/images/shapes/phone-icon.png') }}" alt="">
                            </div>
                            <h2 class="service-details__need-help-text-box">Get Professional Help to Solve <br> IT
                                Software Problems</h2>
                            <div class="service-details__need-help-contact">
                                <a href="+8801739979350">+(880) 1739979350</a>
                                <p>Call Anytime Our <br> to Experts</p>
                            </div>
                        </div>
                       <br>


                        <div class="sidebar__single sidebar__tags">
                            <h3 class="sidebar__title">Tags</h3>
                            <div class="sidebar__tags-list">

                            @foreach ($develops as $develop )
                            <a href="#" class="thm-btn sidebar__tags-btn">{{$develop->dev_tag}}</a>

                            @endforeach

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Service Details End-->


@endsection
