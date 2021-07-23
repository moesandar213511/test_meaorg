
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required Meta Tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Page Title -->
    <title>@yield('title')</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{asset('/user/images/logo-mea-admin.png')}}" type="image/x-icon">

    <!-- CSS Files -->
    <link rel="stylesheet" href="{{asset('user/css/animate-3.7.0.css')}}">
    {{--<link rel="stylesheet" href="{{asset('user/css/font-awesome-4.7.0.min.cs')}}">--}}
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <link rel="stylesheet" href="{{asset('user/fonts/flat-icon/flaticon.css')}}">
    {{--<link rel="stylesheet" href="{{asset('user/css/bootstrap-4.1.3.min.css')}}">--}}
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    

    <link rel="stylesheet" href='https://mmwebfonts.comquas.com/fonts/?font=pyidaungsu' />

    <link rel="stylesheet" href="{{asset('user/css/owl-carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('user/css/nice-select.css')}}">
    <link rel="stylesheet" href="{{asset('user/css/style.css')}}">
    {{-- <link rel="stylesheet" type="text/css" href="{{url('css/toastr.min.css')}}"> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    
    @yield('css')
</head>
<body>
 

    <!-- Header Area Starts -->
    @include('user.site_user.user_header')
    <!-- Header Area End -->
    @yield('content')
        <!-- Banner Area Starts -->

    <!-- Footer Area Starts -->
    @include('user.site_user.user_footer')
        <!-- Footer Area End -->
    <!-- Javascript -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
{{--    <script src="{{asset('user/js/vendor/bootstrap-4.1.3.min.js')}}"></script>--}}
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="{{asset('user/js/vendor/wow.min.js')}}"></script>
    <script src="{{asset('user/js/vendor/owl-carousel.min.js')}}"></script>
    <script src="{{asset('user/js/vendor/jquery.nice-select.min.js')}}"></script>
    <script src="{{asset('user/js/vendor/ion.rangeSlider.js')}}"></script>
    <script src="{{asset('user/js/main.js')}}"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
@yield('js')
</body>
</html>
<script>
              $(document).ready(function() {

            $("#go-top").hide();
                $(window).scroll(function () {
                    if ($(this).scrollTop() > 1) {
                        $('#go-top').fadeIn();
                    } else {
                        $('#go-top').fadeOut();
                    }
                });
                $('#go-top').click(function () {
                    $('body,html').animate({
                        scrollTop: 0
                    }, 800);
                    return false;
            });
                });
</script>