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
                <li>Projects</li>
            </ul>
            <h2>Projects</h2>
        </div>
    </div>
</section>
<!--Page Header End-->

<!--Projects Page Start-->
<section class="project-two project-page">
    <h2  style="text-align: center;font-size: 40px;
    font-weight: 800;
    line-height: 40px;
    margin-bottom: 25px;">Custom Software</h2>
    <div class="container">
        <div class="row">
            @forelse ($projects as $project)


            <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInLeft" data-wow-delay="100ms">
                <!--Project One Single-->
                <div class="project-one__single">
                    <div class="project-one__img">
                        <img src="{{ url('storage/filePhoto/'.$project->p_h_photo) }}" alt="{{$project->en_p_title}}">
                    </div>
                    <div class="project-one__content">
                        <p class="project-one__tagline">{{$project->p_name}}</p>

                        <h2 class="project-one__title"><a href="{{route('project-details',$project->id)}}">{{$project->en_p_title}}</a></h2>
                        <div class="project-one__arrow">
                            <a href="{{route('project-details',$project->id)}}"><span class="icon-right-arrow"></span></a>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInLeft" data-wow-delay="100ms">
                <!--Project One Single-->
                <div class="project-one__single">
                    <div class="project-one__img">
                        <img src="assets/images/resources/project-page-img-1.jpg" alt="">
                    </div>
                    <div class="project-one__content">
                        <p class="project-one__tagline">Cloud Services</p>
                        <h2 class="project-one__title"><a href="project-details.html">Smart Visions</a></h2>
                        <div class="project-one__arrow">
                            <a href="project-details.html"><span class="icon-right-arrow"></span></a>
                        </div>
                    </div>
                </div>
            </div>
            @endforelse
        </div>
    </div>
</section>
<!--Projects Page End-->


@endsection
