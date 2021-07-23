@extends('user.site_user.user_master')
{{-- @section('title')
    {{$event['title']}} |{{$websiteinfo['website_name']}}
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
    h2{
        display: inline-block;
    }
    .whole-wrap{
        margin-top: 0px!important;
    }
    .blog-posts-area{
        margin-top: -120px;
    }
    .custom-sidebar{
      margin-top: 20px;
    }
   
    
   
}

</style>
    <div class="text-center">
        <img src="{{asset('user/images/about.jpg')}}" alt="" class="img-fluid div" width="100%">
        <div class="div texts" style="position: relative;top: -100px; z-index: 100;">
            <h2 class="aab" style="color: #fff; margin-top: -100px;font-size: 48px;" >Event</h2>
            <div class="breadcrumbs">
                <ul>
                    <li><a href="{{url('/')}}" style="color:#fff!important;">Home</a></li>
                    <li>Event-Detail</li>
                </ul>
            </div>
        </div>
    </div>
 
    
        <!-- <blog detail> -->

       <section class="blog-posts-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-8 post-list blog-post-list">
                <article class="post-course">
                    <div class="row">
                        <div class="col-md-4 col-sm-5">
                            <div class="content-pad single-event-meta">
                                <div class="item-thumbnail">
                                    <div>
                                        <img src="{{$event_single['photo_url']}}" alt="image" style="height:250px;" class="img-responsive">
                                    </div>
                                </div><!--/item-thumbnail-->
                            </div>
                        </div>

                        <div class="col-md-8">
                            <div class="content-pad single-course-detail">
                                <div class="course-detail">
                                <h2>{{$event_single['title']}}</h2><br>

                                    <div class="course-info row content-pad">
                                        <div class="col-md-6 col-sm-6 v1">
                                            <h4 class="text small-text" style="font-size: 13px!important">Date</h4>
                                            <p>{{$event_single['date']}}</p>
                                            <h4 class="text small-text" style="font-size: 13px!important">Address</h4>
                                            {{$event_single['location']}}
                                        </div>

                                        <div class="col-md-6 col-sm-6">
                                            <h4 class="text small-text" style="font-size: 13px!important">Time</h4>
                                            <p>{{$event_single['timing']}}</p>
                                        </div>
                                    </div><!--/course-info-->

                                    <div class="content-content">
                                        <h4>MORE DETAIL</h4>
                                        <div class="content-dropcap v1">
                                            <p>{!!$event_single['detail']!!}</p>
                                        </div>

                                        <div class="event-more-detail">
                                            <h6 class="text">Event Type</h6>
                                            <span class="ph-no">{{$event_single['category']}}</span><br><br><br> 
                                        </div>                           
                                    </div><!--/content-content-->
                                </div><!--/course-detail-->
                            </div><!--/single-content-detail-->         
                        </div>
                    </div>
                </article>
                    
                </div>
                <div class="col-lg-4 sidebar mt-5 mt-lg-0">
                        <div class="single-widget search-widget">
                           <form class="example" action="{{url('/search_event')}}" method="get" style="margin:auto;max-width:300px">
                                {{ csrf_field() }}
                            <input type="text" placeholder="Search Posts" name="search_event" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Search Events'" required>
                            <button type="submit"><i class="fa fa-search"></i></button>
                        </form>                       
                        </div>
    
        
                        <div class="single-widget recent-posts-widget">
                            <h4 class="title">Recent Events</h4>
                            <div class="blog-list ">
                                @foreach($recent_event as $data)
                                <div class="single-recent-post d-flex flex-row">
                                    <div class="recent-thumb">
                                        <img class="img-responsive" src="{{$data['photo_url']}}" width="100px" height="90px" alt="">
                                    </div>
                                    <div class="recent-details">
                                        <a href="{{url('/event/'.$data['id'])}}">
                                            <h4>
                                                {{$data['title']}}
                                            </h4>
                                        </a>
                                        <p>
                                            {{$data['date']}}
                                        </p>
                                    </div>
                                </div><br>   
                                @endforeach                             
                            </div>                              
                        </div>      

                        

                    </div>
            </div>
        </div>  
    </section>
    <!-- <end of blog detail> -->
@endsection