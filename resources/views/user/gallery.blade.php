@extends('user.site_user.user_master')
{{-- @section('title')
    Gallery |{{$websiteinfo['website_name']}}
@endsection --}}
@section('content')

<style>
.main-menu ul li a{
    text-decoration:none;
}
.main-menu a:hover{
    text-decoration:none!inmportant;
}
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
   
    
   
}

</style>

 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.css">
    <div class="text-center">
        <img src="{{asset('user/images/about.jpg')}}" alt="" class="img-fluid div" width="100%">
        <div class="div texts" style="position: relative;top: -100px; z-index: 100;">
            <h2 class="aab" style="color: #fff; margin-top: -100px;font-size: 48px;" >Gallery</h2>
            <div class="breadcrumbs">
                <ul>
                    <li><a href="index.html" style="color:#fff!important;">Home</a></li>
                    <li>Gallery</li>
                </ul>
            </div>
        </div>
    </div>

<style>
    .gallery-block{
	padding-bottom: 60px;
	padding-top: 60px;
}

.gallery-block .heading{
    margin-bottom: 50px;
    text-align: center;
}

.gallery-block .heading h2{
    font-weight: bold;
    font-size: 1.4rem;
    text-transform: uppercase;
}

.gallery-block.cards-gallery h6 {
  font-size: 17px;
  font-weight: bold; 
}

.gallery-block.cards-gallery .card{
  transition: 0.4s ease; 
}

.gallery-block.cards-gallery .card img {
  box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.15); 
}

.gallery-block.cards-gallery .card-body {
  text-align: center; 
}

.gallery-block.cards-gallery .card-body p {
  font-size: 15px; 
}

.gallery-block.cards-gallery a {
  color: #212529; 
}

.gallery-block.cards-gallery a:hover {
  text-decoration: none; 
}

.gallery-block.cards-gallery .card {
  margin-bottom: 30px; 
  box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.15);
}

@media (min-width: 576px) {

	.gallery-block .transform-on-hover:hover {
	    transform: translateY(-10px) scale(1.02);
	    box-shadow: 0px 10px 10px rgba(0, 0, 0, 0.15) !important; 
	}
}
</style>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.css" />
 <section class="gallery-block cards-gallery">
        <div class="container">
            <div class="heading">
            
            </div>
            <div class="row">
                @foreach($galleries as $data)
                <div class="col-md-6 col-lg-4">
                    <div class="card border-0 transform-on-hover">
                        <a class="lightbox" href="{{asset('/upload/gallery/'.$data['photo'])}}">
                            <img src="{{asset('/upload/gallery/'.$data['photo'])}}" alt="Card Image" class="card-img-top" style="width:350px;height:220px;">
                        </a>
                        <div class="card-body">
                            <h6><a href="#">{{$data['name']}}</a></h6>
                            {{-- <p class="text-muted card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc quam urna.</p> --}}
                        </div>
                    </div>   
                </div>    
                @endforeach            
            </div>
            {{-- {{$paginate->links()}} --}}
        </div>
    </section>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.js"></script>
    <script>
        baguetteBox.run('.cards-gallery', { animation: 'slideIn'});
    </script>
    
    
@endsection

