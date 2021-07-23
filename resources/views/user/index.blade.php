@extends('user.site_user.user_master')
@section('content')
<style>
    .single-job .job-btn .job-btn1 {
    margin-right: -40px;
}
@media(min-width: 1200px) and (min-width: 1200px){
    .nice-select{
    width: 300px!important;
    }
    #keyword{
        width: 300px!important;
    }
}
@media(max-width: 991px){
    .custom-slide{
       margin-top: 70px!important;
        }
        .search-area{
            margin-top: -50px!important;
        }
        #mission_vision{
            background-color: #fcfcfc!important;
        }
    }
@media(min-width: 991px){
    .border_right_rule{
        border-right: 1px solid #cecece;
    }
}
.custom-slide{
    margin-top: 115px!important;
}
</style>
     <!-- Banner Area Starts -->
   <section class="">
        <div class="">
            <div class="">
                <div class=" ">
                    <!-- <div class="banner-bg"></div> -->
                    <div id="demo" class="carousel slide" data-ride="carousel">
           
                  <!-- The slideshow -->
                  <div class="carousel-inner">
                    <div class="carousel-item active">
                      <img src="{{ asset('user/images/editmon.JPG
                      ') }}" alt="Los Angeles" width="100%">
                    </div>
                    <div class="carousel-item">
                      <img src="{{ asset('user/images/editmon.JPG
                      ') }}" alt="Chicago" width="100%">
                    </div>
                    <div class="carousel-item">
                      <img src="{{ asset('user/images/editmon.JPG
                      ') }}" alt="New York" width="100%">
                    </div>
                  </div>
                  
                
                  
                </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Banner Area End -->

    <!-- Search Area Starts -->
    <div class="search-area">
        <div class="search-bg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <form class="d-md-flex justify-content-between">
                            {{csrf_field()}}

                           <select>
                                <option value="1">Main Category</option>
                                <option value="2">Part Time</option>
                                <option value="3">Full Time</option>
                                <option value="4">Remote</option>
                                <option value="5">Office Job</option>
                            </select>
                            <input type="text" placeholder="Search Keyword" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Search Keyword'" required>
                            <input type="submit" class="template-btn" value="Search">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Search Area End -->
    <br><br>

    <section class="clearfix history">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 style="font-size: 20px; text-align: center;">Green Hackers Institute (GHI Myanmar)</h1>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <p style="font-size: 16px; text-align: center;" class="text-muted">
                                The Green Hackers Institute(GHI Myanmar)was established in 2019 to teach information technology and engineering with global standards.GHI Myanmar generates the knowledge to our student that to be competitive globally and to apply and stand that in their work with dignity.GHI Myanmar is committede to offering our students to ensure that their qualifications are competitive worldwide and that their work is dignified,with a focus on educational performance and results.</p>
                                <br>
                            <div class="sign text-center">
                                <img src="{{ asset('user/images/welcom_sign.png
                      ') }}" class="img-fluid" alt="welcom-img">
                            </div>
                            <br>
                            <div class="name">
                                 <h1 class="dr_name text-center">Dr. Aung Win Htut</h1>
                            </div>
                             <div class="name">
                                 <h1 class="dr_name text-center">Ph.D (Electrical Power) (MPEI)</h1>
                            </div>
                        </div>
                    </div>
                </div>
    </section>

        <section style="background-color: #ececec;padding-top: 50px;padding-bottom: 50px;margin-top: 50px;">
            <div class="container">
                <div class="col-md-6 pull-right">
                    <h3 class="h4">
                        Mission
                    </h3>
                     <ul>
                        <li><i class="fa fa-angle-right"></i> Encourage the growth of human resources as an innovative, skilled and ethical engineer and technician.Promote eduction in Myanmar.</li>
                        <br>
                        <li><i class="fa fa-angle-right"></i> Encourage the growth of human resources as an innovative, skilled and ethical engineer and technician.Promote eduction in Myanmar.</li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <h3 class="h4">
                        Vision
                    </h3>
                    <ul>
                        <li><i class="fa fa-angle-right"></i> Encourage the growth of human resources as an innovative, skilled and ethical engineer and technician.Promote eduction in Myanmar.</li>
                        <br>
                        <li><i class="fa fa-angle-right"></i> Encourage the growth of human resources as an innovative, skilled and ethical engineer and technician.Promote eduction in Myanmar.</li>
                    </ul>
                </div>
            </div>
        </section>

    

    <!-- Category Area Starts -->
    <section class="category-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-top text-center">
                        <h2>All Company Category</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($category_limit as $data)
                <div class="col-lg-3 col-md-6">
                    <div class="single-category text-center mb-4">
                        <img src="{{$data['logo_url']}}" alt="category">
                        <h4>{{$data['name']}}</h4>
                        <h5>{{$data['total_company']}} Companies</h5>
                    <a href="{{url('category/company/'.$data['id'])}}" class="more">More Details >>></a>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="more-job-btn mt-5 text-center">
                    <a href="{{url('/category')}}" class="template-btn">View All Category</a>
            </div>
        </div>
    </section>
    <!-- Category Area End -->

    <section class="aa">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="jobs-title">
                        <h2 style="text-align: center;">Latest News & Event</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="edu2_event_des">
                                <h4>Dec</h4>
                                <p>Lorem Lipsum Proin Gravide Nibh Vel Velit</p>
                                <ul class="post-option">
                                    <li>"By"<a href="#">Admin</a></li>
                                    <li>03/12/2015</li>
                                </ul>
                                <a href="#" class="secondary-btn">Read More</a>
                                <span>26</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <img src="{{ asset('user/images/1.jpg
                      ') }}">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-6 event-img">
                            <figure>
                                <img src="{{ asset('user/images/2.jpg
                      ') }}">
                            </figure>
                        </div>
                        <div class="col-md-6">
                            <div class="edu2_event_des text-right">
                                <h4>Dec</h4>
                                <p>Lorem Lipsum Proin Gravide Nibh Vel Velit</p>
                                <ul class="post-option">
                                    <li>"By"<a href="#">Admin</a></li>
                                    <li>03/12/2015</li>
                                    <li>21 comments</li>
                                </ul>
                                <a href="#" class="secondary-btn">Read More</a>
                                <span>26</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br><br>
            <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="edu2_event_des">
                                <h4>Dec</h4>
                                <p>Lorem Lipsum Proin Gravide Nibh Vel Velit</p>
                                <ul class="post-option">
                                    <li>"By"<a href="#">Admin</a></li>
                                    <li>03/12/2015</li>
                                    <li>21 comments</li>
                                </ul>
                                <a href="#" class="secondary-btn">Read More</span></a>
                                <span>26</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <img src="{{ asset('user/images/3.jpg
                      ') }}">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-6">
                            <img src="{{ asset('user/images/4.jpg
                      ') }}">
                        </div>
                        <div class="col-md-6">
                            <div class="edu2_event_des text-right">
                                <h4>Dec</h4>
                                <p>Lorem Lipsum Proin Gravide Nibh Vel Velit</p>
                                <ul class="post-option">
                                    <li>"By"<a href="#">Admin</a></li>
                                    <li>03/12/2015</li>
                                    <li>21 comments</li>
                                </ul>
                                <a href="#" class="secondary-btn">Read More</a>
                                <span>26</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
   <br><br>

   <section class="bb">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="jobs-title">
                        <h2 style="text-align: center;">Latest News & Event</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="text-center cc">
                                <img src="assets/images/new-1.jpg" width="100%">
                                <h1> Dec <small style="font-size: 16px;">26 <sup class="text-lowercase">th</sup></small></h1>
                                <p>Lorem Lipsum Proin Gravide Nibh Vel Velit</p>
                                <ul class="post-option text-center">
                                    <li>"By"<a href="#">Admin</a></li>
                                    <li>03/12/2015</li>
                                    <li>21 comments</li>
                                </ul>
                                <a href="#" class="secondary-btn">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="text-center cc">
                                <img src="assets/images/new-1.jpg" width="100%">
                                <h1> Dec <small style="font-size: 16px;">26 <sup class="text-lowercase">th</sup></small></h1>
                                <p>Lorem Lipsum Proin Gravide Nibh Vel Velit</p>
                                <ul class="post-option text-center">
                                    <li>"By"<a href="#">Admin</a></li>
                                    <li>03/12/2015</li>
                                    <li>21 comments</li>
                                </ul>
                                <a href="#" class="secondary-btn">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>

            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="text-center cc">
                                <img src="assets/images/new-1.jpg" width="100%">
                                <h1> Dec <small style="font-size: 16px;">26 <sup class="text-lowercase">th</sup></small></h1>
                                <p>Lorem Lipsum Proin Gravide Nibh Vel Velit</p>
                                <ul class="post-option text-center">
                                    <li>"By"<a href="#">Admin</a></li>
                                    <li>03/12/2015</li>
                                    <li>21 comments</li>
                                </ul>
                                <a href="#" class="secondary-btn">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>

            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="text-center cc">
                                <img src="assets/images/new-1.jpg" width="100%">
                                <h1> Dec <small style="font-size: 16px;">26 <sup class="text-lowercase">th</sup></small></h1>
                                <p>Lorem Lipsum Proin Gravide Nibh Vel Velit</p>
                                <ul class="post-option text-center">
                                    <li>"By"<a href="#">Admin</a></li>
                                    <li>03/12/2015</li>
                                    <li>21 comments</li>
                                </ul>
                                <a href="#" class="secondary-btn">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>

            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="text-center cc">
                                <img src="assets/images/new-1.jpg" width="100%">
                                <h1> Dec <small style="font-size: 16px;">26 <sup class="text-lowercase">th</sup></small></h1>
                                <p>Lorem Lipsum Proin Gravide Nibh Vel Velit</p>
                                <ul class="post-option text-center">
                                    <li>"By"<a href="#">Admin</a></li>
                                    <li>03/12/2015</li>
                                    <li>21 comments</li>
                                </ul>
                                <a href="#" class="secondary-btn">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
        </div>
    </section>
   <br><br>
    <!-- Jobs Area Starts -->
    <section class="jobs-area section-padding3">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="jobs-title">
                        <h2 style="text-align: center;">Popular Company</h2>
                    </div>
                </div>
            </div>
          
            <div class="row">
                <div class="col-md-8">
                    <div class="main-content">
                        <div class="single-content1">
                            <div class="single-job mb-4 d-lg-flex justify-content-between">
                                <div class="job-img align-self-center">
                                    <img src="{{ asset('user/images/job1.png ') }}" alt="job">
                                </div>
                                <div class="job-text">
                                    <h4>Assistant Executive</h4>
                                    <h5>Web Company</h5>
                                    <ul class="mt-4">
                                        <li class="mb-3"><h5><i class="fa fa-envelope"></i> info@Gmail.Com, <i class="fa fa-phone"></i> 09787652747</h5></li>
                                    </ul>
                                </div>
                                <div class="job-btn align-self-center">
                                    <a href="{{ url('/company/1') }}" class="third-btn job-btn1">More Detail</a>
                                </div>
                            </div>
                            <div class="single-job mb-4 d-lg-flex justify-content-between">
                                <div class="job-img align-self-center">
                                    <img src="{{ asset('user/images/job2.png') }}" alt="job">
                                </div>
                                <div class="job-text">
                                    <h4>Assistant Executive</h4>
                                    <h5>Web Company</h5>
                                    <ul class="mt-4">
                                        
                                        <li class="mb-3"><h5><i class="fa fa-envelope"></i> info@Gmail.Com, <i class="fa fa-phone"></i> 09787652747</h5></li>
                                        
                                        
                                    </ul>
                                </div>
                                <div class="job-btn align-self-center">
                                    <a href="#" class="third-btn job-btn1">More Detail</a>
                                </div>
                            </div>
                            <div class="single-job mb-4 d-lg-flex justify-content-between">
                                <div class="job-img align-self-center">
                                    <img src="{{ asset('user/images/job3.png') }}" alt="job">
                                </div>
                                <div class="job-text">
                                    <h4>Assistant Executive</h4>
                                    <h5>Web Company</h5>
                                    <ul class="mt-4">
                                        <li class="mb-3"><h5><i class="fa fa-envelope"></i> info@Gmail.Com, <i class="fa fa-phone"></i> 09787652747</h5></li>
                                    </ul>
                                </div>
                                <div class="job-btn align-self-center">
                                    <a href="#" class="third-btn job-btn1">More Detail</a>
                                </div>
                            </div>
                            <div class="single-job mb-4 d-lg-flex justify-content-between">
                               <div class="job-img align-self-center">
                                    <img src="{{ asset('user/images/job4.png') }}" alt="job">
                                </div>
                                <div class="job-text">
                                    <h4>Assistant Executive</h4>
                                    <h5>Web Company</h5>
                                    <ul class="mt-4">
                                       <li class="mb-3"><h5><i class="fa fa-envelope"></i> info@Gmail.Com, <i class="fa fa-phone"></i> 09787652747</h5></li>
                                    </ul>
                                </div>
                                <div class="job-btn align-self-center">
                                    <a href="#" class="third-btn job-btn1">More Detail</a>
                                </div>
                            </div>
                            <div class="single-job mb-4 d-lg-flex justify-content-between">
                               <div class="job-img align-self-center">
                                    <img src="{{ asset('user/images/job5.png') }}" alt="job">
                                </div>
                                <div class="job-text">
                                    <h4>Assistant Executive</h4>
                                    <h5>Web Company</h5>
                                    <ul class="mt-4">
                                       <li class="mb-3"><h5><i class="fa fa-envelope"></i> info@Gmail.Com, <i class="fa fa-phone"></i> 09787652747</h5></li>
                                    </ul>
                                </div>
                                <div class="job-btn align-self-center">
                                    <a href="#" class="third-btn job-btn1">More Detail</a>
                                </div>
                            </div>
                          
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="row main-content">
                        <div class="col-md-12">
                            <a href="https://www.facebook.com/" target="_blank">
                                <img src="{{ asset('user/images/ad.jpg') }}" alt="" width="100%">
                            </a>
                        </div>
                    </div>
                    <br>
                    <div class="row main-content">
                        <div class="col-md-12">
                            <a href="https://www.facebook.com/" target="_blank">
                                <img src="{{ asset('user/images/ad.jpg') }}" alt="" width="100%">
                            </a>                          
                        </div>
                    </div>
                    <br>
                    <div class="row main-content">
                        <div class="col-md-12">
                            <img src="{{ asset('user/images/ad.jpg') }}" alt="" width="100%">
                        </div>
                    </div>
                
                </div>
            </div>
            <div class="more-job-btn mt-5 text-center">
            <a href="{{url('/companies')}}" class="template-btn">View All Company</a>
            </div>
        </div>
    </section>
    <!-- Jobs Area End -->

     <!-- Download Area Starts -->
    <section class="download-area section-padding">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <div class="download-text">
                        <h2>Download the app your mobile today</h2>
                        <p class="py-3">Light earth also land can't. May you midst shall lights blessed in lights Have gathered image morning blessed grass him. Appear female rule all seas she'd winged</p>
                        <div class="download-button d-sm-flex flex-row justify-content-start">
                            <div class="download-btn mb-3 mb-sm-0 flex-row d-flex">
                                <i class="fa fa-apple" aria-hidden="true"></i>
                                <a href="#">
                                    <p>
                                        <span>Available</span> <br>
                                        on App Store
                                    </p>
                                </a>
                            </div>
                            <div class="download-btn dark flex-row d-flex">
                                <i class="fa fa-android" aria-hidden="true"></i>
                                <a href="#">
                                    <p>
                                        <span>Available</span> <br>
                                        on Play Store
                                    </p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 pr-0">
                    <div class="download-img"></div>
                </div>
            </div>
        </div>
    </section>
    <!-- Download Area End -->
@endsection

@section('js')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

    </script>
    @endsection
