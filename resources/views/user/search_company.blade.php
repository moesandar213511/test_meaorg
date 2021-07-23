@extends('user.site_user.user_master')
@section('title')
    Company |{{$websiteinfo['website_name']}}
@endsection
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
    .jobs-area{
        margin-top: -130px;
    }
    
   
}
</style>
    <div class="text-center">
        <img src="{{asset('user/images/about.jpg')}}" alt="" class="img-fluid div" width="100%">
        <div class="div texts" style="position: relative;top: -100px; z-index: 100;">
            <h2 class="aab" style="color: #fff; margin-top: -100px;font-size: 48px;" >Company List</h2>
            <div class="breadcrumbs">
                <ul>
                    <li><a href="{{url('/')}}" style="color:#fff!important;">Home</a></li>
                    <li>Company List</li>
                </ul>
            </div>
        </div>
    </div>
    <section class="jobs-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    @foreach($paginate as $data)
                    <div class="single-job mb-4 d-lg-flex justify-content-between">
                        <div class=" col-lg-6 job-text">
                            <h4>{{$data['name']}}</h4>
                            <ul class="mt-4">
                               <ul class="mt-4">
                                <li class="mb-3"><h5><i class="fa fa-map-marker"></i> {{$data['address']}}</h5></li>
                                <li class="mb-3"><h5><i class="fa fa-phone"></i> {{$data['phone']}}</h5></li>
                                <li class="mb-3"><i class="fa fa-envelope"></i> {{$data['email']}}</li>
                            </ul>
                        </div>
                        <div class="col-lg-3 job-img align-self-center">
                            <img src="{{asset('upload/logo/'.$data['logo'])}}" alt="job" style="max-width: 100px;height:100px;">
                        </div>
                        
                        <div class="col-lg-3 job-btn align-self-center">
                            <a href="{{url('company/'.$data['id'])}}" class="third-btn">More Details</a>
                            
                        </div>
                    </div>
                   @endforeach

                   {{$paginate->links()}}

                </div>
                {{-- <div class="col-lg-3">
                    @foreach($ads as $ads_photos)
                    <div class="row main-content">
                         <div class="col-lg-12">
                             <a href="{{$ads_photos['link']}}">
                              <img src="{{$ads_photos['photo_url']}}" alt="" width="100%" height="200px">
                             </a>
                         </div>

                    </div>
                    @endforeach
                </div> --}}
                
               
            </div>
            
        </div>
    </section> 
@endsection