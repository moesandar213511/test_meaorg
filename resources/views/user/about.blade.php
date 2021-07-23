@extends('user.site_user.user_master')
{{-- @section('title')
    About|{{$websiteinfo['website_name']}}
@endsection --}}
@section('content')

   <style>
    .breadcrumbs ul li {
    display: inline-block;
    position: relative;
    color: #08A8F1;
    font-size: 12px;
    font-weight: 600;

}
.breadcrumbs ul li:not(:last-child)::after {
    display: inline-block;
    position: relative;
    content: '/';
    margin-left: 6px;
    font-size: 12px;
    font-weight: 600;
    color: #FFFFFF;
    line-height: 0.75;

}
@media(min-width: 991px){
    header li a{
        font-size: 12px!important;
    }
}
@media(min-width: 991px) and (max-width: 1200px){
    .texts{
        top: 100px;
    }
}
@media(max-width: 991px){
    img.div{
        height:35vh!important;
        margin-top: 100px!important;
    }
    .custom-table{
        margin-right: 0px!important;
        margin-left: 0px!important;
 }
    h2{
        display: inline-block;
    }
    .whole-wrap{
        margin-top: 0px!important;
    }
    .custom-history{
        margin-top: 20px;
    }
    .section-top-border{
        margin-top: -80px;
    }
    .team-area{
        margin-top: -90px;
    }

}
   </style>
    <div class="text-center">
        <img src="{{asset('user/images/about.jpg')}}" alt="" class="img-fluid div" width="100%">
        <div class="div texts" style="position: relative;top: -100px; z-index: 100;">
            <h2 class="aab" style="color: #fff; margin-top: -100px;font-size: 48px;" >About Us</h2>
            <div class="breadcrumbs">
                <ul>
                    <li><a href="{{url('/')}}" style="color:#fff!important;">Home</a></li>
                    <li>About us</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="whole-wrap">
        <div class="container">

            <div class="section-top-border">
                <div class="row">
                     <div class="col-md-4">
                        <!-- <div class="banner-bg"></div> -->
                        <div id="demo" class="carousel slide" data-ride="carousel">
                          <!-- The slideshow -->
                          <div class="carousel-inner">
                            <div class="carousel-item active">
                              <img src="{{asset('user/images/mon1.JPG')}}" alt="Los Angeles" width="350px;" height="525px;">
                            </div>
                            <div class="carousel-item">
                              <img src="{{asset('user/images/mon_about.jpg')}}" alt="Chicago" width="350px;" height="525px;">
                            </div>
                            <div class="carousel-item">
                              <img src="{{asset('user/images/mon_about1.jpg')}}" alt="New York" width="350px;" height="525px;">
                            </div>
                          </div>
                        </div>
                     </div>
                    <div class="col-md-8  mt-sm-20 left-align-p">
                        <h3 class="mb-30 text-center custom-history">About Us</h3>
                        <p>is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Placeat quos vitae vel, voluptatibus!Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quos, laudantium reprehenderit provident voluptates minus incidunt nobis iure odit nihil atque totam impedit quidem accusantium aspernatur ipsum at! Quaerat, similique face</p>
                     <div class="row">
                        <div class="col-md-12">
                            <h3 class="mb-30 text-center custom-history">Our History</h3>
                            <p>is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Placeat quos vitae vel, voluptatibus!Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quos, laudantium reprehenderit provident voluptates minus incidunt nobis iure odit nihil atque totam impedit quidem accusantium aspernatur ipsum at! Quaerat, similique face</p>
                        </div>
                    </div>
                    </div>
                    
                    
                </div>

            </div>
        </div>
  </div>
    

    <!-- Team Area Starts -->
    <section class="team-area section-padding2">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-top text-center">
                        <h2>Our Member</h2>
                        <p>Who are in extremely love with eco friendly system.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-sm-6">
                    <div class="single-team mb-5 mb-lg-0">
                        <div class="team-img team-img1">
                            <div class="hover-state">
                                <ul>
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="team-footer text-center mt-4">
                            <h3>ethel davis</h3>
                            <h5>managing director (sales)</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="single-team mb-5 mb-lg-0">
                        <div class="team-img team-img2">
                            <div class="hover-state">
                                <ul>
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="team-footer text-center mt-4">
                            <h3>rodney cooper</h3>
                            <h5>creative art director (project)</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="single-team mb-5 mb-sm-0">
                        <div class="team-img team-img3">
                            <div class="hover-state">
                                <ul>
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="team-footer text-center mt-4">
                            <h3>dora walker</h3>
                            <h5>senior core developer</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="single-team">
                        <div class="team-img team-img4">
                            <div class="hover-state">
                                <ul>
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="team-footer text-center mt-4">
                            <h3>lena keller</h3>
                            <h5>creative content developer</h5>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-3 col-sm-6">
                    <div class="single-team mb-5 mb-lg-0">
                        <div class="team-img team-img1">
                            <div class="hover-state">
                                <ul>
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="team-footer text-center mt-4">
                            <h3>ethel davis</h3>
                            <h5>managing director (sales)</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="single-team mb-5 mb-lg-0">
                        <div class="team-img team-img2">
                            <div class="hover-state">
                                <ul>
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="team-footer text-center mt-4">
                            <h3>rodney cooper</h3>
                            <h5>creative art director (project)</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="single-team mb-5 mb-sm-0">
                        <div class="team-img team-img3">
                            <div class="hover-state">
                                <ul>
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="team-footer text-center mt-4">
                            <h3>dora walker</h3>
                            <h5>senior core developer</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="single-team">
                        <div class="team-img team-img4">
                            <div class="hover-state">
                                <ul>
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="team-footer text-center mt-4">
                            <h3>lena keller</h3>
                            <h5>creative content developer</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Team Area End -->


            <!-- End Sample Area -->
            
            <!-- Start Align Area -->
            <div class="whole-wrap">
                <div class="container">
                    <div class="section-top-border">
                        <h3 class="mb-30 title_color text-center">Table</h3>
                        <br>
                        <div class="progress-table-wrap">
                            <div class="progress-table">
                                <div class="table-head">
                                    <div class="serial">No</div>
                                    <div class="country">Name</div>
                                    <div class="visit">Position</div>
                                    <div class="percentage">Ph Number</div>
                                </div>
                                <div class="table-row">
                                    <div class="serial">01</div>
                                    <div class="country">John Smith</div>
                                    <div class="visit">Developer</div>
                                    <div class="percentage">09 991 199 991</div>
                                </div>
                                <div class="table-row">
                                    <div class="serial">02</div>
                                    <div class="country">John Smith</div>
                                    <div class="visit">Developer</div>
                                    <div class="percentage">09 991 199 991</div>
                                </div>
                                <div class="table-row">
                                    <div class="serial">03</div>
                                    <div class="country">John Smith</div>
                                    <div class="visit">Developer</div>
                                    <div class="percentage">09 991 199 991</div>
                                </div>
                                <div class="table-row">
                                    <div class="serial">04</div>
                                    <div class="country">John Smith</div>
                                    <div class="visit">Developer</div>
                                    <div class="percentage">09 991 199 991</div>
                                </div>
                                <div class="table-row">
                                    <div class="serial">05</div>
                                   <div class="country">John Smith</div>
                                    <div class="visit">Developer</div>
                                    <div class="percentage">09 991 199 991</div>
                                </div>
                                <div class="table-row">
                                    <div class="serial">06</div>
                                    <div class="country">John Smith</div>
                                    <div class="visit">Developer</div>
                                    <div class="percentage">09 991 199 991</div>
                                </div>
                                <div class="table-row">
                                    <div class="serial">07</div>
                                    <div class="country">John Smith</div>
                                    <div class="visit">Developer</div>
                                    <div class="percentage">09 991 199 991</div>
                                </div>
                                <div class="table-row">
                                    <div class="serial">08</div>
                                    <div class="country">John Smith</div>
                                    <div class="visit">Developer</div>
                                    <div class="percentage">09 991 199 991</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
            <!-- End Align Area -->

    <!-- Employee Area Starts -->
    <section class="employee-area section-padding">
       
    </section>
    <!-- Employee Area End -->
@endsection
