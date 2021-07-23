@extends('user.site_user.user_master')
{{-- @section('title')
    Event | {{$websiteinfo['website_name']}}
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
                    <li>Event</li>
                </ul>
            </div>
        </div>
    </div>
    
        <section class="blog-posts-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-8 post-list blog-post-list">
                    <div class="blog-listing">
                        @foreach($all_event as $data)
                        <div class="blog-item">
                            <div class="post-item blog-post-item">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <div class="content-pad">
                                            <div class="blog-thumbnail">
                                                <div class="item-thumbnail-gallery">
                                                    <div class="item-thumbnail">
                                                        <a href="{{url('/event/'.$data['id'])}}">
                                                                <img src="{{$data['photo_url']}}" alt="image">
                                                                <div class="thumbnail-hoverlay main-color-1-bg"></div>
                                                                <div class="thumbnail-hoverlay-cross"></div>
                                                                </a>
                                                            </div>
                                                        </div>            
                                                    </div><!--/blog-thumbnail-->
                                                    <div class="thumbnail-overflow hidden-xs hidden-sm">
                                                        
                                                    </div><!--/thumbnail-overflow-->
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-sm-12">
                                                <div class="content-pad">
                                                    <div class="item-content">
                                                        <h3 class="title"><a href="{{url('/event/{id}')}}" class="main-color-1-hover">{{$data['title']}}</a></h3>
                                                        {{-- <div class="item-excerpt blog-item-excerpt">
                                                            <p>{!!$data['date']!!}</p>
                                                        </div> --}}
                                                        <div class="item-meta blog-item-meta">                            <div class="event-time">Date :  {{$data['date']}}           </div>                             
                                                            <div class="event-time">Time :  {{$data['timing']}}</div>
                                                            <div class="event-place">Location : {{$data['location']}}</div>
                                                        </div>
                                                        <a class="button" href="{{url('/event/'.$data['id'])}}">DETAILS<i class="fa fa-angle-right"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!--/post-item-->
                                    </div>
                                </div><!-- /blog-item -->
                                @endforeach
                            </div><!-- /blog-listing -->
                        </div><!-- /col-md-9 -->
                         
                <div class="col-lg-4 sidebar">
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
@endsection