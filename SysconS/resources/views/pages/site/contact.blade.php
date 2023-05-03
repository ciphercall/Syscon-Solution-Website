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
                <li>{{ __('message.Contact') }}</li>
            </ul>
            <h2>{{ __('message.Contact') }}</h2>
        </div>
    </div>
</section>
<!--Page Header End-->

<!--Contact Page Start-->
<section class="contact-page">
    <div class="container">
        <div class="row">
            <div class="col-xl-4 col-lg-4">
                <div class="contact-page__left">
                    <div class="section-title text-left">
                        <span class="section-title__tagline">{{ __('message.cwus') }}</span>
                        <h3 class="section-title__title">{{ __('message.cm') }}</h3>
                    </div>
                    <p class="contact-page__text">{{ __('message.syscon-about') }}</p>
                    <div class="contact-page__social-list">
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-facebook"></i></a>
                        <a href="#"><i class="fab fa-pinterest-p"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-xl-8 col-lg-8">
                <div class="contact-page__right">
                    {{-- <form  class="comment-one__form contact-form-validated" novalidate="novalidate"  enctype="multipart/form-data"  name="ajax-contact-form" id="ajax-contact-form" method="post" action="javascript:void(0)"> --}}
                        <form class="comment-one__form contact-form-validated" name="ajax-contact-form" id="ajax-contact-form" method="post" >
                            @csrf
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="comment-form__input-box">
                                    <input type="text" id="txtName" placeholder="Full Name" name="txtName">
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="comment-form__input-box">
                                    <input type="email" placeholder="Email Address" name="txtEmail" id="txtEmail">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="comment-form__input-box">
                                    <textarea name="txtMessage" id="txtMessage" placeholder="Write Message"></textarea>
                                </div>
                                <button type="submit" id="submit" class="thm-btn comment-form__btn">{{ __('message.send') }}</button>
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
                            <h4><a href="tel:+8801739979350">Free:+(880) 1739979350</a></h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Contact Details End-->

<!--Google Map Start-->
<section class="contact-page-google-map">
    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d3648.4171932407708!2d90.39763214186387!3d23.874820649458968!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sbd!4v1647948949153!5m2!1sen!2sbd" width="1600" height="520" style="border:0;" allowfullscreen="" loading="lazy" class="contact-page-google-map__one" allowfullscreen=""></iframe>
</section>
<!--Google Map End-->


@endsection

@section('script')

<script>
    if ($("#ajax-contact-form").length > 0) {
    $("#ajax-contact-form").validate({
      rules: {
        txtName: {
        required: true,
        maxlength: 50
      },
      txtEmail: {
        required: true,
        maxlength: 60,
        email: true,
      },
      txtMessage: {
        required: true,
        maxlength: 500
      },
      },
      messages: {
        txtName: {
        required: "Please enter name",
        maxlength: "Your name maxlength should be 50 characters long."
      },
      txtEmail: {
        required: "Please enter valid email",
        email: "Please enter valid email",
        maxlength: "The email name should less than or equal to 50 characters",
      },

      txtMessage: {
        required: "Please enter description",
        maxlength: "Your description name maxlength should be 300 characters long."
      },
      },
      submitHandler: function(form) {
      $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });

      $('#submit').html('Please Wait...');
      $("#submit"). attr("disabled", true);

      $.ajax({
        url: "{{url('/contactmsg')}}",
        type: "POST",
        data: $('#ajax-contact-form').serialize(),
        success: function( response ) {
          $('#submit').html('Submit');
          $("#submit"). attr("disabled", false);
          alert('Your Message has been submitted successfully');
          document.getElementById("ajax-contact-form").reset();
        }
       });
      }
      })
    }
    </script>

@endsection

