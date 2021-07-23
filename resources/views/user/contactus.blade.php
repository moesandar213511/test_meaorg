@extends('user.site_user.user_master')
{{-- @section('title')
    Contact |{{$websiteinfo['website_name']}}
@endsection --}}
@section('content')
    <!-- Map Area Starts -->
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

input[type="text"],
input[type="email"],
textarea{
    box-shadow: 0px 2px 2px #ccc;
}
.d-flex{
    margin-bottom: 20px;
}
</style>
    <div class="text-center">
        <img src="{{asset('user/images/about.jpg')}}" alt="" class="img-fluid div" width="100%" style="box-shadow: 0px 0px 5px #000;">
        <div class="div texts" style="position: relative;top: -100px; z-index: 100;">
            <h2 class="aab" style="color: #fff; margin-top: -100px;font-size: 48px;" >Contact Us</h2>
            <div class="breadcrumbs">
                <ul>
                    <li><a href="{{url('/')}}" style="color:#fff!important;">Home</a></li>
                    <li>Contact Us</li>
                </ul>
            </div>
        </div>
    </div>
    <br>
   

<br><br>
    
     <!-- Contact Form Starts -->
    <section class="contact-form section-padding3">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 mb-5 mb-lg-0">
                    <div class="d-flex">
                        <div class="into-icon">
                            <i class="fa fa-home"></i>
                        </div>
                        <div class="info-text">
                            <h4 style="font-size:15px!important;">No.(64/4),ShinSawPu Road, ZayeKyoYet, Mawlamyine.</h4>
                        </div>
                    </div>
                    <div class="d-flex">
                        <div class="into-icon">
                            <i class="fa fa-phone"></i>
                        </div>
                        <div class="info-text">
                            <h4 style="font-size:15px!important;">09 4550 69192</h4>
                            <p>Mon to Fri 9am to 6 pm</p>
                        </div>
                    </div>
                    <div class="d-flex">
                        <div class="into-icon">
                            <i class="fa fa-envelope-o"></i>
                        </div>
                        <div class="info-text">
                            <h4 style="font-size:15px!important;">Meamon.Mlm@Gmail.Com</h4>
                            <p>Send us your query anytime!</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9">
                <form action="{{url('/insert_contact')}}" method="post">
                        {{csrf_field()}}
                        {{-- @if(session('msg'))
                            <p class="alert alert-success">{{session('msg')}}</p>
                        @endif --}}
                        <div class="left">
                            <input type="text" name="name" placeholder="Enter your name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your name'" required>
                            <input type="email" name="email" placeholder="Enter email address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'" required>
                            <input type="text" name="subject" placeholder="Enter subject" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter subject'" required>
                        </div>
                        <div class="right">
                            <textarea name="message" cols="20" rows="7"  placeholder="Enter Message" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Message'" required></textarea>
                        </div>
                        <button type="submit" class="template-btn">contact now</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Form End -->
     <section>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d122445.67321007686!2d97.58914593232595!3d16.45388796046133!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30c2a8b3d95f5559%3A0x6fafc8c3a8dd3009!2sMawlamyine!5e0!3m2!1sen!2smm!4v1572579728203!5m2!1sen!2smm" width="100%" height="350" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
                </div>
            </div>
        </div>
    </section>
    <!-- Map Area End -->
@endsection


@section('js')
@if(Session::has('success'))
    <script type="text/javascript">
    toastr.success("{{Session('success')}}");</script>
  @endif
    {{-- <script>
        toastr.success('Delete blog data successful');
    </script> --}}
    @endsection

    