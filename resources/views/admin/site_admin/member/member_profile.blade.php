@extends('admin.layouts.site_admin.site_admin_design')
@section('title','Admin | Member')
@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <style>
        .imagePreview {
            width: 100%;
            height: 150px;
            background-position: center center;
            background:url('http://cliquecities.com/assets/no-image-e3699ae23f866f6cbdf8ba2443ee5c4e.jpg');
            background-color:#fff;
            background-size: cover;
            background-repeat:no-repeat;
            display: inline-block;
            /* box-shadow:0px -3px 6px 2px rgba(0,0,0,0.2); */
        }
        .upload_btn
        {
            display:block;
            border-radius:10px;
            /* box-shadow:0px 4px 6px 2px rgba(0,0,0,0.2); */
            margin-bottom: 15px;
        }
        .imgUp
        {
            margin-bottom:15px;
        }
    </style>
@endsection

@section('nav_bar_text')
    Member Profile
@endsection
@section('content')
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    
  {{-- @if(Session::has('success'))
    <script type="text/javascript">
    toastr.success("{{Session('success')}}");</script>
  @endif --}}
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">Member Profile</h4>
                            <!-- <p class="card-category"> Here is a subtitle for this table</p> -->
                        </div>
                        
                        
                         <form action="{{url('/update_member')}}" method="post" enctype="multipart/form-data">
                                {{csrf_field()}}  
                         <input type="hidden" name="id" value="{{$member_profile->id}}" id="id">
                            <div class="col-md-7 pt-2 pb-2 mx-auto card" style="margin-top:30px;">
                                    <div class="row">
                                        <div class="col-md-4">
                                        <img src="{{asset('upload/member/'.$member_profile->photo)}}" class="imagePreview" id="imgs"  style="width: 100%;height: 100px;">
                                    <label class="btn btn-md btn-success container-fluid rounded-0 m-0" for="edit_upload_photo">Upload</label>
                                    <input type="file" style="display:none;" id="edit_upload_photo" name="image" class="form-control package_photo" onchange="displaySelectedPhoto('edit_upload_photo','imgs')">
                                        </div>
                                    </div><br>                                               
                                    <div class="form-group">
                                        <label style="color:black;" for="update_name" class="col-form-label">Name:</label>
                                    <input type="text" value="{{$member_profile['name']}}" name="name" class="form-control" id="update_name">
                                    </div>

                                    <div class="form-group">
                                        <label style="color:black;" for="update_phone" class="col-form-label">Phone No:</label><br>
                                        <input type="tel" value="{{$member_profile['phone']}}" name="phone" class="form-control" id="update_phone">
                                
                                    </div><br>
                            
                                    <div class="form-group">
                                        <label style="color:black;" for="update_address" class="col-form-label">Address:</label><br>
                                        <textarea class="form-control" name="address" rows="4" id="update_address">{{$member_profile['address']}}</textarea> 
                                    </div>

                                     <div class="form-group">
                                        <label style="color:black;" for="update_education" class="col-form-label">Education</label><br>
                                        <input type="text" name="education" value="{{$member_profile['education']}}" class="form-control" id="update_education">
                                    </div><br>

                                    <div class="form-group">
                                        <label style="color:black;" for="update_detail" class="col-form-label">Detail:</label><br>
                                        <textarea class="form-control" name="detail" rows="4" id="update_detail">{{$member_profile['detail']}}</textarea>
                                    </div><br>

                                    <div class="form-group">
                                        <label style="color:black;" for="update_facebook" class="col-form-label">Facebook:</label><br>
                                        <input type="text" name="fb_link" value="{{$member_profile['fb_link']}}" class="form-control" id="update_facebook">
                                    </div><br>

                                    <div class="form-group">
                                        <label style="color:black;" for="update_twitter" class="col-form-label">Twitter:</label><br>
                                        <input type="text" name="tw_link" value="{{$member_profile['tw_link']}}" class="form-control" id="update_twitter">
                                    </div><br>

                                    <div class="form-group">
                                        <label style="color:black;" for="update_instagram" class="col-form-label">Instagram:</label><br>
                                       <input type="text" name="in_link" class="form-control" id="update_instagram" value="{{$member_profile['in_link']}}">
                                    </div><br>
                                    <input type="submit" name="submit" class="rounded-0 btn btn-md btn-info" value="Change">                          
                            </div>
                        </form>                    
                </div>  
            </div>               
        </div>
    </div>
</div>
@endsection