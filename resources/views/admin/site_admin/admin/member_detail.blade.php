@extends('admin.layouts.site_admin.site_admin_design')
@section('title','Admin | Member Detail')
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
    Member Account Detail
@endsection
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                               <table class="table table-hovered">
                                    <tbody>
                                      <tr>
                                        <td><b>Photo</b></td>
                                        <td><img src="{{asset('upload/member/'.$member_detail['photo'])}}" width="200px" height=""></td>
                                      </tr>
                                      <tr>
                                        <td><b>Name</b></td>
                                        <td>{{$member_detail['name']}}</td>
                                      </tr>
                                      <tr>
                                        <td><b>Phone</b></td>
                                        <td>{{$member_detail['phone']}}</td>
                                      </tr>
                                      <tr>
                                        <td><b>Position</b></td>
                                        <td>{{$member_detail['position']}}</td>
                                      </tr>
                                      <tr>
                                        <td><b>Address</b></td>
                                        <td>{{$member_detail['address']}}</td>
                                      </tr>
                                      <tr>
                                        <td><b>Education</b></td>
                                        <td>{{$member_detail['education']}}</td>
                                      </tr>
                                      <tr>
                                        <td><b>Detail</b></td>
                                        <td>{{$member_detail['detail']}}</td>
                                      </tr>
                                      <tr>
                                        <td><b>Facebook</b></td>
                                        <td>{{$member_detail['fb_link']}}</td>
                                      </tr>
                                      <tr>
                                        <td><b>Twitter</b></td>
                                        <td>{{$member_detail['tw_link']}}</td>
                                      </tr>
                                      <tr>
                                        <td><b>Instagram</b></td>
                                        <td>{{$member_detail['in_link']}}</td>
                                      </tr>
                                    </tbody>
                                  </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection