@extends('layout.user')

@section('content')
<!-- slider_area_start -->
<div class="slider_area ">
    <div class="single_slider d-flex align-items-center justify-content-center slider_bg_1">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-xl-6 col-md-6">
                    <div class="illastrator_png">
                        <img src="img/banner/edu_ilastration.png" alt="">
                    </div>
                </div>
                <div class="col-xl-6 col-md-6">
                    <div class="slider_info">
                        <h3>Learn your <br>
                            Favorite Course <br>
                            From Online</h3>
                        <a href="/courses" class="boxed_btn">Browse Our Courses</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- slider_area_end -->

<!-- about_area_start -->
<div class="about_area">
    <div class="container">
        <div class="row">
            <div class="col-xl-5 col-lg-6">
                <div class="single_about_info">
                    <h3>Over 7000 Tutorials <br>
                        from 20 Courses</h3>
                    <p>Our set he for firmament morning sixth subdue darkness creeping gathered divide our let god
                        moving. Moving in fourth air night bring upon you’re it beast let you dominion likeness open
                        place day great wherein heaven sixth lesser subdue fowl </p>
                    <a href="/courses" class="boxed_btn">Enroll a Course</a>
                </div>
            </div>
            <div class="col-xl-6 offset-xl-1 col-lg-6">
                <div class="about_tutorials">
                    <div class="courses">
                        <div class="inner_courses">
                            <div class="text_info">
                                <span>20+</span>
                                <p> Courses</p>
                            </div>
                        </div>
                    </div>
                    <div class="courses-blue">
                        <div class="inner_courses">
                            <div class="text_info">
                                <span>7638</span>
                                <p> Courses</p>
                            </div>

                        </div>
                    </div>
                    <div class="courses-sky">
                        <div class="inner_courses">
                            <div class="text_info">
                                <span>230+</span>
                                <p> Courses</p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- about_area_end -->

<!-- popular_courses_start -->
<div class="popular_courses">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="section_title text-center mb-100">
                    <h3>Popular Courses</h3>
                    <p>Your domain control panel is designed for ease-of-use and <br> allows for all aspects of your
                        domains.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="all_courses">
        <div class="container">
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <div class="row">
                        @foreach($courses as $course)
                        <div class="col-xl-4 col-lg-4 col-md-6">
                            <div class="single_courses">
                                <div class="thumb">
                                    <a href="/courses/{{ $course['id_course'] }}">
                                        <img src="uploads/{{ $course['gambar_course'] }}" alt="gambar_course" height="180px">
                                    </a>
                                </div>
                                <div class="courses_info">
                                    <span>{{ $course['kategori_course'] }}</span>
                                    <h3 class="mb-2"><a href="/courses/{{ $course['id_course'] }}">{{ $course['nama_course'] }}</a></h3>
                                    <p>{{ $course['keterangan_course'] }}</p>
                                    <div class="star_prise d-flex justify-content-between">
                                        <div class="star">
                                            <i class="flaticon-mark-as-favorite-star"></i>
                                            <span>{{ $course['rating_course'] }}</span>
                                        </div>
                                        <div class="prise">
                                            <span class="offer">{{ $course['harga_course'] }}</span>
                                            <span class="active_prise">
                                                Rp. {{ $course['harga_course'] }}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if ($loop->iteration == 6)
                        @break
                        @endif
                        @endforeach
                        <div class="col-xl-12">
                            <div class="more_courses text-center">
                                <a href="/courses" class="boxed_btn_rev">More Courses</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- popular_courses_end-->


<!-- testimonial_area_start -->
<div class="testimonial_area testimonial_bg_1 overlay">
    <div class="testmonial_active owl-carousel">
        <div class="single_testmoial">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="testmonial_text text-center">
                            <div class="author_img">
                                <img src="img/testmonial/author_img.png" alt="">
                            </div>
                            <p>
                                "Working in conjunction with humanitarian aid <br> agencies we have supported
                                programmes to <br>
                                alleviate.
                                human suffering.

                            </p>
                            <span>- Jquileen</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="single_testmoial">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="testmonial_text text-center">
                            <div class="author_img">
                                <img src="img/testmonial/author_img.png" alt="">
                            </div>
                            <p>
                                "Working in conjunction with humanitarian aid <br> agencies we have supported
                                programmes to <br>
                                alleviate.
                                human suffering.

                            </p>
                            <span>- Jquileen</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- testimonial_area_end -->

<!-- our_courses_start -->
<div class="our_courses">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="section_title text-center mb-100">
                    <h3>Our Course Speciality</h3>
                    <p>Your domain control panel is designed for ease-of-use and <br>
                        allows for all aspects of your domains.
                    </p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-3 col-md-6 col-lg-6">
                <div class="single_course text-center">
                    <div class="icon">
                        <i class="flaticon-art-and-design"></i>
                    </div>
                    <h3>Premium Quality</h3>
                    <p>
                        Your domain control panel is designed for ease-of-use <br> and <br>
                        allows for all aspects of
                    </p>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 col-lg-6">
                <div class="single_course text-center">
                    <div class="icon blue">
                        <i class="flaticon-business-and-finance"></i>
                    </div>
                    <h3>Premium Quality</h3>
                    <p>
                        Your domain control panel is designed for ease-of-use <br> and <br>
                        allows for all aspects of
                    </p>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 col-lg-6">
                <div class="single_course text-center">
                    <div class="icon">
                        <i class="flaticon-premium"></i>
                    </div>
                    <h3>Premium Quality</h3>
                    <p>
                        Your domain control panel is designed for ease-of-use <br> and <br>
                        allows for all aspects of
                    </p>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 col-lg-6">
                <div class="single_course text-center">
                    <div class="icon gradient">
                        <i class="flaticon-crown"></i>
                    </div>
                    <h3>Premium Quality</h3>
                    <p>
                        Your domain control panel is designed for ease-of-use <br> and <br>
                        allows for all aspects of
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- our_courses_end -->

<!-- subscribe_newsletter_Start -->
<div class="subscribe_newsletter">
    <div class="container">
        <div class="row">
            <div class="col-xl-6 col-lg-6">
                <div class="newsletter_text">
                    <h3>Subscribe Newsletter</h3>
                    <p>Your domain control panel is designed for ease-of-use and allows for all aspects of your</p>
                </div>
            </div>
            <div class="col-xl-5 offset-xl-1 col-lg-6">
                <div class="newsletter_form">
                    <h4>Your domain control panel is</h4>
                    <form action="#" class="newsletter_form">
                        <input type="text" placeholder="Enter your mail">
                        <button type="submit">Sign Up</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- subscribe_newsletter_end -->

<!-- our_latest_blog_start -->
<div class="our_latest_blog">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="section_title text-center mb-100">
                    <h3>Our Latest Blog</h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-4 col-md-4">
                <div class="single_latest_blog">
                    <div class="thumb">
                        <img src="img/latest_blog/1.png" alt="">
                    </div>
                    <div class="content_blog">
                        <div class="date">
                            <p>12 Jun, 2019 in <a href="#">Design tips</a></p>
                        </div>
                        <div class="blog_meta">
                            <h3><a href="#">Commitment to dedicated Support</a></h3>
                        </div>
                        <p class="blog_text">
                            Firmament morning sixth subdue darkness creeping gathered divide.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-4">
                <div class="single_latest_blog">
                    <div class="thumb">
                        <img src="img/latest_blog/2.png" alt="">
                    </div>
                    <div class="content_blog">
                        <div class="date">
                            <p>12 Jun, 2019 in <a href="#">Design tips</a></p>
                        </div>
                        <div class="blog_meta">
                            <h3><a href="#">Commitment to dedicated Support</a></h3>
                        </div>
                        <p class="blog_text">
                            Firmament morning sixth subdue darkness creeping gathered divide.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-4">
                <div class="single_latest_blog">
                    <div class="thumb">
                        <img src="img/latest_blog/3.png" alt="">
                    </div>
                    <div class="content_blog">
                        <div class="date">
                            <p>12 Jun, 2019 in <a href="#">Design tips</a></p>
                        </div>
                        <div class="blog_meta">
                            <h3><a href="#">Commitment to dedicated Support</a></h3>
                        </div>
                        <p class="blog_text">
                            Firmament morning sixth subdue darkness creeping gathered divide.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- our_latest_blog_end -->
@endsection