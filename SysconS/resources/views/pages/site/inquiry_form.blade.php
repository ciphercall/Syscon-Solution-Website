@extends('layout.site.home')
@section('pagecontent')

  <!--Page Header Start-->
  <section class="page-header">
    <div class="page-header-bg" style="background-image: url({{ asset('siteasset/images/backgrounds/page-header-bg.jpg
    ') }})">
    </div>
    <div class="page-header-bg-overly"></div>
    <div class="page-header-shape wow slideInRight" data-wow-delay="100ms" data-wow-duration="2500ms" style="background-image: url({{ asset('siteasset/images/shapes/page-header-shape.png') }})"></div>
    <div class="container">
        <div class="page-header__inner">
            <ul class="thm-breadcrumb list-unstyled">
                <li><a href="{{url('/')}}">{{ __('message.Home') }}</a></li>
                <li><span>/</span></li>
                <li>{{ __('message.inquiry') }}</li>
            </ul>
            <h2>{{ __('message.inquiry') }}</h2>
        </div>
    </div>
</section>
<!--Page Header End-->

<!--Contact Page Start-->

<section class="contact-page">
    <div class="container">
        <div class="row">
            @if($errors->any())
            <div class="alert alert-danger">
                <p><strong>Opps Something went wrong</strong></p>
                <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
                </ul>
            </div>
        @endif

        @if(session('success'))
            <div class="alert alert-success">{{session('success')}}</div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">{{session('error')}}</div>
        @endif
            <div class="col-xl-12 col-lg-12">
                <div class="contact-page__left">
                    <div class="section-title text-left">
                        {{-- <span class="section-title__tagline">{{ __('message.inquiry') }}</span> --}}
                        <h3 class="section-title__title">{{ __('message.inquiry') }}</h3>
                    </div>


                </div>
                <div class="contact-page__right">
                    {{-- <form  class="comment-one__form contact-form-validated" novalidate="novalidate"  enctype="multipart/form-data"  name="ajax-contact-form" id="ajax-contact-form" method="post" action="javascript:void(0)"> --}}
                        <form class="comment-one__form"  method="post" action="{{ route('inquirymsg.store') }}" enctype="multipart/form-data">
                            @csrf
                        <div class="row">

                            <div class="col-xl-6">
                            <label class="form-check-label" for="flexSwitchCheckDefault"><b>Company Name:</b></label>

                                <div class="comment-form__input-box">
                                    <input type="text" id="txtcom_name" placeholder="Company Name" name="txtcom_name">
                                </div>
                            </div>

                            <div class="col-xl-6">
                            <label class="form-check-label" for="flexSwitchCheckDefault"><b>Person In Charge:</b></label>

                                <div class="comment-form__input-box">
                                    <input type="text" placeholder="Person In Charge" name="txtp_in_charge" id="txtp_in_charge">
                                </div>
                            </div>
                            <div class="col-xl-6">
                            <label class="form-check-label" for="flexSwitchCheckDefault"><b>Phone Number:</b> </label>

                                <div class="comment-form__input-box">
                                    <input type="text" id="txtc_phone" placeholder="Phone Number" name="txtc_phone">
                                </div>
                            </div>
                            <div class="col-xl-6">
                            <label class="form-check-label" for="flexSwitchCheckDefault"><b>E-Mail:</b></label>

                                <div class="comment-form__input-box">
                                    <input type="email" placeholder="Email Address" name="txtc_email" id="txtc_email">
                                </div>
                            </div>
                            <label class="form-check-label" for="flexSwitchCheckDefault"><b>Development Target:</b></label><br>
                            <span style="padding-bottom: 15px;"></span>

                            <div class="col-xl-3">

                                <div class="comment-form__input-box">
                                    {{-- <input type="checkbox"  name="txtEmail" id="txtEmail"> --}}
                                    <input class="form-check-input" type="checkbox" id="Mobile" name="dev_target[]" value="Mobile system development">
                                    <label class="form-check-label" for="Mobile">Mobile system development</label>

                                </div>
                            </div>
                            <div class="col-xl-3">
                                <div class="comment-form__input-box">
                                    {{-- <input type="checkbox"  name="txtEmail" id="txtEmail"> --}}
                                    <input class="form-check-input" type="checkbox" id="Business"   name="dev_target[]" value="Business system development">
                                    <label class="form-check-label" for="Business">Business system development</label>

                                </div>
                            </div>
                            <div class="col-xl-3">
                                <div class="comment-form__input-box">
                                    {{-- <input type="checkbox"  name="txtEmail" id="txtEmail"> --}}
                                    <input class="form-check-input" type="checkbox" id="Smartphone"  name="dev_target[]" value="Smartphone application development">
                                    <label class="form-check-label" for="Smartphone">Smartphone app development</label>

                                </div>
                            </div>
                            <div class="col-xl-3">
                                <div class="comment-form__input-box">
                                    <input class="form-check-input" type="checkbox" id="Web"  name="dev_target[]" value="Web system development">
                                    <label class="form-check-label" for="Web">Web system development</label>


                                </div>
                            </div>

                            <div class="col-xl-3">

                                <div class="comment-form__input-box">
                                    {{-- <input type="checkbox"  name="txtEmail" id="txtEmail"> --}}
                                    <input class="form-check-input" type="checkbox" id="Homepage" name="dev_target[]" value="Homepage production / design">
                                    <label class="form-check-label" for="Homepage">Homepage production / design</label>

                                </div>
                            </div>
                            <div class="col-xl-3">
                                <div class="comment-form__input-box">
                                    {{-- <input type="checkbox"  name="txtEmail" id="txtEmail"> --}}
                                    <input class="form-check-input" type="checkbox" id="Software"   name="dev_target[]" value="Software Development">
                                    <label class="form-check-label" for="Software">Software Development</label>

                                </div>
                            </div>
                            <div class="col-xl-3">
                                <div class="comment-form__input-box">
                                    {{-- <input type="checkbox"  name="txtEmail" id="txtEmail"> --}}
                                    <input class="form-check-input" type="checkbox" id="Homepage management"  name="dev_target[]" value="Homepage management">
                                    <label class="form-check-label" for="Homepage management">Homepage management</label>

                                </div>
                            </div>
                            <div class="col-xl-3">
                                <div class="comment-form__input-box">
                                    <input class="form-check-input" type="checkbox" id="IT"  name="dev_target[]" value="IT / PC support">
                                    <label class="form-check-label" for="IT">IT / PC support</label>


                                </div>
                            </div>

                            <div class="col-xl-12">
                                <div class="comment-form__input-box">

                                    <input type="text"  name="" id="dev_target">


                                </div>
                            </div>
                        </div>
                        <div class="row">

                            <label class="form-check-label" for="flexSwitchCheckDefault"><b>Schedule:</b></label><br>
                            <span style="padding-bottom: 15px;"></span>
                            <div class="col-xl-3">
                                <div class="comment-form__input-box">

                                    <input class="form-check-input" type="checkbox" id="3 Months" name="txtschedule[]" value="With In 3 Months">
                                    <label class="form-check-label" for="3 Months">With In 3 Months</label>

                                </div>
                            </div>
                            <div class="col-xl-3">
                                <div class="comment-form__input-box">
                                    <input class="form-check-input" type="checkbox" id="6 Months" name="txtschedule[]" value="With In 6 Months">
                                    <label class="form-check-label" for="6 Months">With In 6 Months</label>

                                </div>
                            </div>

                            <div class="col-xl-3">
                                <div class="comment-form__input-box">
                                    <input class="form-check-input" type="checkbox" id="12 Months" name="txtschedule[]" value="With In 12 Months">
                                    <label class="form-check-label" for="12 Months">With In 12 Months</label>


                                </div>
                            </div>
                            <div class="col-xl-3">
                                <div class="comment-form__input-box">
                                    <input class="form-check-input" type="checkbox" id="Undecided" name="txtschedule[]" value="Undecided">
                                    <label class="form-check-label" for="Undecided">Undecided</label>

                                </div>
                            </div>
                            <div>

                            </div>
                            <span style="padding-bottom: 15px;"></span>

                            <div class="col-xl-12">
                            <label class="form-check-label" for="flexSwitchCheckDefault"><b>Content Of Inquiry:</b></label><br>

                                <div class="comment-form__input-box">
                                    <textarea name="txtcontent_inquiry" id="txtcontent_inquiry" placeholder="Write Message"></textarea>
                                </div>
                                <button type="submit" id="" class="thm-btn comment-form__btn">{{ __('message.send') }}</button>
                            </div>
                        </div>
                    </form>
                    <div class="result"></div><!-- /.result -->
                </div>
            </div>
        </div>
    </div>
</section>
<!--Contact Page End-->

<!--Contact Details End-->
<section class="contact-details">
    <div class="container">
        <div class="contact-details__inner">
            <div class="row">
                <div class="col-xl-4 col-lg-4">
                    <div class="contact-details__single">
                        <div class="contact-details__icon">
                            <span class="icon-map"></span>
                        </div>
                        <div class="contact-details__content">
                            <p class="contact-details__sub-title">{{ __('message.visitoo') }}</p>
                            <h5>{{ __('message.address') }}</h5>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4">
                    <div class="contact-details__single contact-details__single-2">
                        <div class="contact-details__icon">
                            <span class="icon-email-1"></span>
                        </div>
                        <div class="contact-details__content">
                            <p class="contact-details__sub-title">Send Email</p>
                            <h4><a href="mailto:needhelp@company.com">info@sysconsolution.com</a></h4>


                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4">
                    <div class="contact-details__single contact-details__single-3">
                        <div class="contact-details__icon">
                            <span class="icon-phone-call"></span>
                        </div>
                        <div class="contact-details__content">
                            <p class="contact-details__sub-title">{{ __('message.ca') }}</p>
                            <h4><a href="tel:+8801739979350">Free:+(880)1739979350</a></h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Contact Details End-->

<!--Google Map Start-->
<section class="contact-page-google-map" style="margin-top: 80px">

</section>
<!--Google Map End-->


@endsection


