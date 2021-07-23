<div class="sidebar" data-color="purple" data-background-color="white" data-image="{{asset('images/admin_image//sidebar-1.jpg')}}">
    <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
    <div class="logo">
        <a href="{{url('/')}}" target="_blank" class="simple-text logo-normal">
            <img src="{{asset('images/logo-mea-admin.png')}}" alt="" width="80px" height="80px;">
        </a>
    </div>
 <div class="sidebar-wrapper">
        <ul class="nav">
        @if(Auth::check())
            @if(Auth::user()->type == 'admin')
            <li class="nav-item @if($url=="member") active @endif">
                <a class="nav-link" href="{{url('admin')}}">
                    <i class="material-icons">person</i>
                    <p>Member Account</p>
                </a>
            </li>
            <li class="nav-item @if($url=="company") active @endif">
                <a class="nav-link" href="{{url('admin/company')}}">
                    <i class="material-icons">book</i>
                    <p>Company</p>
                </a>
            </li>
            <li class="nav-item @if($url=="category") active @endif">
                <a class="nav-link" href="{{url('admin/category')}}">
                    <i class="material-icons">bubble_chart</i>
                    <p>Category</p>
                </a>
            </li>
            <li class="nav-item @if($url=="blog") active @endif">
                <a class="nav-link" href="{{url('admin/blog')}}">
                    <i class="material-icons">view_module</i>
                    <p>Blog</p>
                </a>
            </li>
            <li class="nav-item @if($url=="event") active @endif">
                <a class="nav-link" href="{{url('admin/event')}}">
                    <i class="material-icons">event</i>
                    <p>Event</p>
                </a>
            </li>
            <li class="nav-item @if($url=="ads") active @endif">
                <a class="nav-link" href="{{url('admin/ads')}}">
                    <i class="material-icons">list</i>
                    <p>Ads</p>
                </a>
            </li>
            <li class="nav-item @if($url=="contact_list") active @endif">
                <a class="nav-link" href="{{url('admin/contact_list')}}">
                    <i class="material-icons">content_paste</i>
                    <p>Contact List</p>
                </a>
            </li>
            <li class="nav-item @if($url=="gallery") active @endif">
                <a class="nav-link" href="{{url('admin/gallery')}}">
                    <i class="material-icons">content_paste</i>
                    <p>Gallery</p>
                </a>
            </li>
            @else
            <li class="nav-item @if($url=="company") active @endif">
                <a class="nav-link" href="{{url('member/company')}}">
                    <i class="material-icons">book</i>
                    <p>Member Company</p>
                </a>
            </li>
            <li class="nav-item @if($url=="member_profile") active @endif">
                <a class="nav-link" href="{{url('member/profile')}}">
                    <i class="material-icons">person</i>
                    <p>Member Profile</p>
                </a>
            </li>
            @endif
            @endif
            {{-- {{url('logout')}}             --}}
            <li class="nav-item">
            <a class="nav-link" href="{{url('/logout')}}">
                    <i class="material-icons">logout</i>
                    <p>Logout</p>
                </a>
            </li>
             <li class="nav-item">
                <a class="nav-link" href="">
                    <i class="material-icons"></i>
                    <p></p>
                </a>
            </li>
        </ul>
    </div>
</div>
