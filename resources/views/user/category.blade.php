@extends('user.site_user.user_master')

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
    .category-area{
        margin-top: -110px;
    }
    
   
}

</style>
    <div class="text-center">
        <img src="{{asset('user/images/about.jpg')}}" alt="" class="img-fluid div" width="100%">
        <div class="div texts" style="position: relative;top: -100px; z-index: 100;">
            <h2 class="aab" style="color: #fff; margin-top: -100px;font-size: 48px;" >All Company</h2>
            <div class="breadcrumbs">
                <ul>
                    <li><a href="{{url('/')}}" style="color:#fff!important;">Home</a></li>
                    <li>Company</li>
                </ul>
            </div>
        </div>
    </div>
       <section class="category-area section-padding">
        <div class="container">

            <div class="row">
                @foreach($all_category as $data)
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
        </div>
    </section>
    <!-- Category Area End -->
@endsection