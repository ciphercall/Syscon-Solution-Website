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
                <li>Projects Details</li>
            </ul>
            <h2>Projects Details</h2>
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
                            <img src="{{ url('storage/filePhoto/'.$project[0]->p_b_photo) }}" alt="{{$project[0]->en_p_title}}">
                            <div class="project-details__details-box">
                                <ul class="project-details__details-info list-unstyled">
                                    <li>
                                        <h5 class="project-details__client">Clients:</h5>
                                        <p class="project-details__name">{{$project[0]->client}}</p>
                                    </li>
                                    <li>
                                        <h5 class="project-details__client">Category:</h5>
                                        <p class="project-details__name">{{$project[0]->p_name}}</p>
                                    </li>
                                    <li>
                                        <h5 class="project-details__client">Date:</h5>
                                        <p class="project-details__name">{{$project[0]->p_date}}</p>
                                    </li>
                                    <li>
                                        <div class="project-details__social-list">
                                            <a href="#"><i class="fab fa-twitter"></i></a>
                                            <a href="#" class="clr-fb"><i class="fab fa-facebook"></i></a>
                                            <a href="#" class="clr-dri"><i class="fab fa-pinterest-p"></i></a>
                                            <a href="#" class="clr-ins"><i class="fab fa-instagram"></i></a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="project-details__content">
                            <h2 class="project-details__title">{{$project[0]->en_p_title}}</h2>
                            <p class="project-details__text-1">{!!$project[0]->en_p_details!!}</p>

                        </div>
                        <ul class="list-unstyled project-details__list">
                            <li>
                                <div class="icon">
                                    <span class="icon-check"></span>
                                </div>
                                <div class="text">
                                    <p>{!!$project[0]->p_facility!!}</p>
                                </div>
                            </li>

                        </ul>
                        <div class="news-details__bottom">
                            <p class="news-details__tags">
                                <span>Tags</span>
                                <a href="#">{{$project[0]->p_tag}}</a>

                            </p>
                            <div class="news-details__social-list">
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fab fa-facebook"></i></a>
                                <a href="#"><i class="fab fa-pinterest-p"></i></a>
                                <a href="#"><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="project-details__pagination-box">
                            <ul class="project-details__pagination list-unstyled">
                                <li class="next">
                                    <a href="#" aria-label="Previous"><i class="icon-right-arrow"></i>Previous</a>
                                </li>
                                <li class="count"><a href="#"></a></li>
                                <li class="count"><a href="#"></a></li>
                                <li class="count"><a href="#"></a></li>
                                <li class="count"><a href="#"></a></li>
                                <li class="previous">
                                    <a href="#" aria-label="Next">Next<i class="icon-right-arrow"></i></a>
                                </li>
                            </ul>
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
                    <h2 class="section-title__title">Our Similar Work</h2>
                </div>
                <div class="row">
                    @forelse ($projects as $pro)


                    <div class="col-xl-4 col-lg-4">
                        <!--Project One Single-->
                        <div class="project-one__single">
                            <div class="project-one__img">
                                <img src="{{ url('storage/filePhoto/'.$pro->p_h_photo) }}" alt="{{$pro->en_p_title}}">
                            </div>
                            <div class="project-one__content">
                                <p class="project-one__tagline">{{$pro->p_name}}</p>
                                <h2 class="project-one__title"><a href="{{route('project-details',$pro->id)}}">{{$pro->en_p_title}}</a></h2>
                                <div class="project-one__arrow">
                                    <a href="{{route('project-details',$pro->id)}}"><span class="icon-right-arrow"></span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="col-xl-4 col-lg-4">
                        <!--Project One Single-->
                        <div class="project-one__single">
                            <div class="project-one__img">
                                <img src="#" alt="{{$pro->en_p_title}}">
                            </div>
                            <div class="project-one__content">
                                <p class="project-one__tagline">No Things is found</p>
                                <h2 class="project-one__title"><a href="#">No Things is found</a></h2>
                                <div class="project-one__arrow">
                                    <a href="#"><span class="icon-right-arrow"></span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforelse
                </div>
            </div>
        </section>
        <!--Similar Work End-->


@endsection
